<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 08/11/2016
 * Time: 16:44
 */
namespace LaSportive\SDK\Model;

use LaSportive\SDK\Entity\Transaction;

interface TransactionModelInterface
{
    /**
     * Set transaction ID
     *
     * @param int $id
     *
     * @return Transaction
     */
    public function setId($id);

    /**
     * Get transaction ID
     *
     * @return int
     */
    public function getId();

    /**
     * Get the reference of this transaction
     *
     * @return string
     */
    public function getReference();

    /**
     * Set a reference to this transaction
     *
     * @param string $reference
     *
     * @return Transaction
     */
    public function setReference($reference);

    /**
     * Get the external reference of this transaction
     *
     * @return string
     */
    public function getExternalReference();

    /**
     * Set the external reference of this transaction
     *
     * @param string $externalReference
     *
     * @return Transaction
     */
    public function setExternalReference($externalReference);

    /**
     * Get the label of this transaction
     *
     * @return string
     */
    public function getLabel();

    /**
     * Get the label of this transaction
     *
     * @param string $label
     *
     * @return Transaction
     */
    public function setLabel($label);

    /**
     * Get transaction amount
     *
     * @return int
     */
    public function getAmount();

    /**
     * Set transaction amount
     *
     * @param int $amount
     *
     * @return Transaction
     */
    public function setAmount($amount);

    /**
     * @return string
     */
    public function getCashbackReference();

    /**
     * @param string $cashbackReference
     * @return Transaction
     */
    public function setCashbackReference($cashbackReference);
}
