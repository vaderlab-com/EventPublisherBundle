<?php
/**
 * Created by PhpStorm.
 * User: kost
 * Date: 06.02.18
 * Time: 12:32
 */

namespace VaderLab\EventPublisherBundle\Service\Action;


use Symfony\Component\DependencyInjection\ContainerInterface;

class NotificationServiceFactory
{
    /**
     * @var string
     */
    private $serviceName;

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * NotificationServiceFactory constructor.
     * @param ContainerInterface $container
     * @param string $serviceName
     */
    public function __construct(ContainerInterface $container, string $serviceName)
    {
        $this->container    = $container;
        $this->serviceName  = $serviceName;
    }

    /**
     * @return NotificationServiceInterface
     */
    public function create() : NotificationServiceInterface
    {
        return $this->container->get($this->serviceName);
    }
}