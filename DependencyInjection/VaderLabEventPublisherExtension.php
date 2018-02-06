<?php

namespace VaderLab\EventPublisherBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class VaderLabEventPublisherExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $eventPubCnf = $config['event_publisher'];
        $container->setParameter('vaderlab.event_publisher.websocket_uri', $eventPubCnf['websocket_uri']);
        $container->setParameter('vaderlab.event_publisher.api_key', $eventPubCnf['api_key']);

        $services = $eventPubCnf['service'];

        $container->setParameter(
            'vaderlab.event_publisher.service.notification_service',
            $services['notification_service']
        );

        $container->setParameter(
            'vaderlab.event_publisher.service.publisher_service',
            $services['publisher_service']
        );
    }

    public function getAlias()
    {
        return 'vaderlab';
    }
}
