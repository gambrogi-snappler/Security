<?php

namespace Snappminds\Security\Bundle\UserBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('snappminds_security_user');

        $rootNode
            ->children()
            ->arrayNode('templates')
                ->addDefaultsIfNotSet()
                ->children()
                    ->scalarNode('parent')->defaultValue('SnappmindsUtilsBluesBundle:Default:layout.html.twig')->cannotBeEmpty()->end()
                    ->scalarNode('browse')->defaultValue('SnappmindsSecurityUserBundle:User:browse.html.twig')->cannotBeEmpty()->end()
                    ->scalarNode('insert')->defaultValue('SnappmindsSecurityUserBundle:User:insert.html.twig')->cannotBeEmpty()->end()
                    ->scalarNode('update')->defaultValue('SnappmindsSecurityUserBundle:User:update.html.twig')->cannotBeEmpty()->end()
                    ->scalarNode('form')->defaultValue('SnappmindsUtilsABMBundle:ABM:form.html.twig')->cannotBeEmpty()->end()
                    ->scalarNode('grid_theme')->defaultValue('SnappmindsUtilsABMBundle:Grid:blocks.html.twig')->cannotBeEmpty()->end()
                ->end()
            ->end()                
            ->arrayNode('roles')
                ->useAttributeAsKey('name')
                ->prototype('scalar')->end()                
                ->defaultValue( array( 'ROLE_USER' => 'Usuario',  'ROLE_ADMIN' => 'Administrador' ) )->end()
            ->end() 
            ->children()
            ->scalarNode('user_class')->defaultValue('Snappminds\Security\Bundle\UserBundle\Entity\User')->cannotBeEmpty()->end()
            ->scalarNode('user_type_class')->defaultValue('Snappminds\Security\Bundle\UserBundle\Form\UserType')->cannotBeEmpty()->end();
        
        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        return $treeBuilder;
    }
}
