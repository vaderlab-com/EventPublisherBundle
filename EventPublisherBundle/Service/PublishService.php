<?php
/**
 * Created by PhpStorm.
 * User: kost
 * Date: 05.02.18
 * Time: 16:47
 */

namespace VaderLab\EventPublisherBundle\Service;


use WebSocket\Client;

class PublishService implements PublishClientInterface
{

    /**
     * @var Client
     */
    private $client;

    /**
     * @var string
     */
    private $connUri;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * PublishService constructor.
     * @param string $connUri
     * @param string $apiKey
     * @throws \Exception
     * @throws \WebSocket\BadOpcodeException
     * @throws \Exception
     */
    public function __construct(string $connUri, string $apiKey)
    {
        $this->connUri = $connUri;
        $this->apiKey = $apiKey;

        $this->connect();
    }

    public function isConnected(): bool
    {
        return $this->client ? $this->client->isConnected() : false;
    }

    /**
     * @return bool
     * @throws \WebSocket\BadOpcodeException
     * @throws \Exception
     */
    public function connect(): bool
    {
        $this->client = new Client($this->connUri);
        $this->client->send($this->apiKey);

        $ok = $this->receive();
        if($ok !== 'OK') {
            throw new \Exception('Publish service error: ' . $ok);
        }

        return true;
    }

    public function receive(): string
    {
        return $this->client->receive();
    }

    public function disconnect(): void
    {
        if(!$this->client || !$this->client->isConnected()) {
            return;
        }

        $this->client->close();
    }

    /**
     * @param string $event
     * @param array|null $data
     * @throws \WebSocket\BadOpcodeException
     */
    public function publish(string $event, array $data = null): void
    {
        $this->client->send(json_encode([
            'action'    => $event,
            'data'      => $data,
        ]));
    }
}