<?php

namespace VaderLab\EventPublisherBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('vaderlab');

        $rootNode
            ->children()
                ->arrayNode('event_publisher')
                ->children()
                    ->scalarNode('websocket_uri')
                        ->defaultValue('wss://events.vaderlab.com/')
                        ->example('wss://events.vaderlab.com/')
                        ->info('Websocket url for the publish notifications for customers')
                        ->end()
                    ->scalarNode('api_key')
                        ->isRequired()
                        ->info('Get your api_key from the https://www.vaderlab.com/en/api_key/')
                        ->end()
                ->end();

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        return $treeBuilder;
    }
}
