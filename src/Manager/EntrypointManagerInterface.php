<?php

namespace LaSportive\SDK\Manager;

use LaSportive\SDK\Entity\Entrypoint;

interface EntrypointManagerInterface
{
    /**
     * Return all entrypoints
     *
     * @return Entrypoint[]
     */
    public function getAll();

    /**
     * Fetch an entrypoint from it's UID
     *
     * @param $uid
     *
     * @return Entrypoint
     */
    public function getByUid($uid);

    /**
     * Create an entrypoint from an array of definition
     *
     * @param $uid
     * @param array $definition
     *
     * @return Entrypoint
     */
    public function createFromDefinition($uid, array $definition);

    /**
     * Create an entrypoint
     *
     * @param $uid
     *
     * @return Entrypoint
     */
    public function create($uid);

    /**
     * Update an entrypoint
     *
     * @param Entrypoint $entrypoint
     *
     * @return Entrypoint
     */
    public function update(Entrypoint $entrypoint);

    /**
     * Delete an entrypoint
     *
     * @param Entrypoint $entrypoint
     */
    public function delete(Entrypoint $entrypoint);
}
