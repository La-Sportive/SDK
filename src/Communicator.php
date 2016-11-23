<?php

namespace LaSportive\SDK;

use LaSportive\SDK\Exception\ConfigurationFileNotFoundException;
use LaSportive\SDK\Gateway\DefaultGateway;
use LaSportive\SDK\Model\TransactionModelInterface;
use Symfony\Component\Yaml\Yaml;

class Communicator
{
    /**
     * @var string
     */
    protected $configurationFilePath;

    /**
     * @var DefaultGateway
     */
    protected $gateway;

    /**
     * Loader constructor.
     */
    public function __construct()
    {
        $this->configurationFilePath = realpath(__DIR__ . '/Resources/default.yml');
    }

    /**
     * Init communicator component from a configuration file
     *
     * @throws ConfigurationFileNotFoundException If configuration file is not found
     */
    public function init()
    {
        if (!file_exists($this->getConfigurationFilePath())) {
            throw new ConfigurationFileNotFoundException(
                'Configuration file not found in path : "' . $this->getConfigurationFilePath() . '"'
            );
        }

        // Parsing YAML configuration
        $entrypointDefinitions = Yaml::parse(file_get_contents($this->getConfigurationFilePath()));

        // Getting FQDN definitions
        $entrypointManagerFQDN = $entrypointDefinitions['manager'];
        $entrypointDefinitionFactoryFQDN = $entrypointDefinitions['factories']['entrypoint'];
        $responseFactoryFQDN = $entrypointDefinitions['factories']['response'];
        $collectionFactoryFQDN = $entrypointDefinitions['factories']['collection'];
        $adapterFQDN = $entrypointDefinitions['adapter'];

        // Creating instances fromFQDN
        $entrypointManager = new $entrypointManagerFQDN(new $entrypointDefinitionFactoryFQDN());
        $adapter = new $adapterFQDN(new $responseFactoryFQDN());
        $collectionFactory = new $collectionFactoryFQDN();

        // Loading entrypoints
        foreach ($entrypointDefinitions['entrypoints'] as $entrypointUid => $entrypointDefinition) {
            $entrypointManager->createFromDefinition($entrypointUid, $entrypointDefinition);
        }

        $adapter->setUri($entrypointDefinitions['uri']);

        $this->gateway = new DefaultGateway(
            $adapter,
            $entrypointManager,
            $collectionFactory
        );
    }

    /**
     * Save a transaction to be processed as cashback
     *
     * @param $token
     *
     * @param TransactionModelInterface $transaction
     */
    public function commitTransaction($token, TransactionModelInterface $transaction)
    {
        $this->gateway->call(
            'transaction.commit',
            [
                'token' => $token,
                'exeternal_reference' => $transaction->getExternalReference(),
                'cashback_reference' => $transaction->getCashbackReference(),
                'label' => $transaction->getLabel(),
                'amount' => (int) $transaction->getAmount()
            ]
        );
    }

    /**
     * Get configuration file for SDK Initialization
     *
     * @return string
     */
    public function getConfigurationFilePath()
    {
        return $this->configurationFilePath;
    }

    /**
     * Set a configuration file for SDK Initialization
     *
     * @param string $configurationFilePath
     *
     * @return Communicator
     */
    public function setConfigurationFilePath($configurationFilePath)
    {
        $this->configurationFilePath = $configurationFilePath;

        return $this;
    }
}
