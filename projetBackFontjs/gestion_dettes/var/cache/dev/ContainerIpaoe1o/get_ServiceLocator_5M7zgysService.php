<?php

namespace ContainerIpaoe1o;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_5M7zgysService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.5M7zgys' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.5M7zgys'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'detteRepository' => ['privates', '.errored.QB7hWVd', NULL, 'Cannot determine controller argument for "App\\Controller\\DetteController::listDebtsByClient()": the $detteRepository argument is type-hinted with the non-existent class or interface: "App\\Controller\\DetteRepository". Did you forget to add a use statement?'],
        ], [
            'detteRepository' => '?',
        ]);
    }
}
