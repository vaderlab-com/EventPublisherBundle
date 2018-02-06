<?php
/**
 * Created by PhpStorm.
 * User: kost
 * Date: 05.02.18
 * Time: 16:47
 */

namespace VaderLab\EventPublisherBundle\Service;


interface PublishClientInterface
{
    public function isConnected(): bool;

    /**
     * @return bool
     * @throws \WebSocket\BadOpcodeException
     * @throws \Exception
     */
    public function connect(): bool;

    public function receive(): ?string;

    public function disconnect(): void;

    /**
     * @param string $action
     * @param array|null $data
     * @throws \Exception
     * @throws \WebSocket\BadOpcodeException
     */
    public function publish(string $action, array $data = null): void;
}