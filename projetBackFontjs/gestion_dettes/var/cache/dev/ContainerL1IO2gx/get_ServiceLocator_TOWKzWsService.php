<?php

namespace ContainerL1IO2gx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_TOWKzWsService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.TOWKzWs' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.TOWKzWs'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'detteRepository' => ['privates', '.errored.2DTF3qw', NULL, 'Cannot determine controller argument for "App\\Controller\\DetteController::listDebtsByStatus()": the $detteRepository argument is type-hinted with the non-existent class or interface: "App\\Controller\\DetteRepository". Did you forget to add a use statement?'],
        ], [
            'detteRepository' => '?',
        ]);
    }
}
