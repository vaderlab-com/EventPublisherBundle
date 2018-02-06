<?php
/**
 * Created by PhpStorm.
 * User: kost
 * Date: 06.02.18
 * Time: 12:14
 */

namespace VaderLab\EventPublisherBundle\Service\Action\Notification;

use VaderLab\EventPublisherBundle\Service\PublishClientInterface;

class NotificationService implements NotificationServiceInterface
{

    const A_NOTIFY = 'notify';

    /**
     * @var PublishClientInterface
     */
    private $client;

    /**
     * NotificationService constructor.
     * @param PublishClientInterface $client
     */
    public function __construct(PublishClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * {@inheritdoc}
     */
    public function notify(array $recipients, string $type, array $data): void
    {
        foreach ($recipients as $recipient) {
            $this->_send($recipient, $type, $data);
        }
    }

    /**
     * @param int $recipient
     * @param string $type
     * @param array $data
     * @throws \Exception
     * @throws \WebSocket\BadOpcodeException
     */
    protected function _send(int $recipient, string $type, array $data): void
    {
        $msg = [
            'user_id'   => $recipient,
            'message'   => [
                'type'      => $type,
                'data'      => $data,
            ],
        ];

        $this->client->publish(self::A_NOTIFY, $msg);
    }
}