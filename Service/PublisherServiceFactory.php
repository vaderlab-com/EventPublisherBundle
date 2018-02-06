<?php
/**
 * Created by PhpStorm.
 * User: kost
 * Date: 06.02.18
 * Time: 12:56
 */

namespace VaderLab\EventPublisherBundle\Service;


use Symfony\Component\DependencyInjection\ContainerInterface;

class PublisherServiceFactory
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
     * PublisherServiceFactory constructor.
     * @param ContainerInterface $container
     * @param string $serviceName
     */
    public function __construct(ContainerInterface $container, string $serviceName)
    {
        $this->container = $container;
        $this->serviceName = $serviceName;
    }

    /**
     * @return PublishClientInterface
     */
    public function create(): PublishClientInterface
    {
        return $this->container->get($this->serviceName);
    }
}