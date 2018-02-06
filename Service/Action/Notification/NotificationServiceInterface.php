<?php
/**
 * Created by PhpStorm.
 * User: kost
 * Date: 06.02.18
 * Time: 12:29
 */

namespace VaderLab\EventPublisherBundle\Service\Action;


interface NotificationServiceInterface
{
    public function notify(array $recipients, string $type, array $data): void;
}