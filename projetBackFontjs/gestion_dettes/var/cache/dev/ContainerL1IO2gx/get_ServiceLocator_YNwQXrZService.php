<?php

namespace ContainerL1IO2gx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_YNwQXrZService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.YNwQXrZ' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.YNwQXrZ'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'request' => ['privates', '.errored.AuD.fXw', NULL, 'Cannot determine controller argument for "App\\Controller\\DetteController::createDebt()": the $request argument is type-hinted with the non-existent class or interface: "App\\Controller\\Request". Did you forget to add a use statement?'],
            'detteRepository' => ['privates', '.errored.O34uDQo', NULL, 'Cannot determine controller argument for "App\\Controller\\DetteController::createDebt()": the $detteRepository argument is type-hinted with the non-existent class or interface: "App\\Controller\\DetteRepository". Did you forget to add a use statement?'],
            'articleRepository' => ['privates', '.errored.XyIM.3i', NULL, 'Cannot determine controller argument for "App\\Controller\\DetteController::createDebt()": the $articleRepository argument is type-hinted with the non-existent class or interface: "App\\Controller\\ArticleRepository". Did you forget to add a use statement?'],
        ], [
            'request' => '?',
            'detteRepository' => '?',
            'articleRepository' => '?',
        ]);
    }
}
