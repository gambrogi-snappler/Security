<?php

namespace Snappminds\Security\Bundle\UserBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class SnappmindsSecurityUserExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
        
        $container->setParameter('snappminds_security_user.roles', $config['roles']);
        $container->setParameter('snappminds_security_user.templates.form', $config['templates']['form']);
        $container->setParameter('snappminds_security_user.templates.insert', $config['templates']['insert']);
        $container->setParameter('snappminds_security_user.templates.update', $config['templates']['update']);
        $container->setParameter('snappminds_security_user.templates.browse', $config['templates']['browse']);
        $container->setParameter('snappminds_security_user.templates.parent', $config['templates']['parent']);
        $container->setParameter('snappminds_security_user.templates.grid_theme', $config['templates']['grid_theme']);
        
    }
}
