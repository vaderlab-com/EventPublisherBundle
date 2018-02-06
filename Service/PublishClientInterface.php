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

    const TYPE_NOTIFY = 'notify';

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
     * @param string $type
     * @param array|null $data
     * @param int $user_id
     * @param string $event
     * @throws \Exception
     * @throws \WebSocket\BadOpcodeException
     */
    public function publish(string $type, int $user_id, array $data = null, string $event = self::TYPE_NOTIFY): void;
}