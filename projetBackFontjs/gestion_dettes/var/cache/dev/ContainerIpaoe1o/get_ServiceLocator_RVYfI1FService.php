<?php

namespace ContainerIpaoe1o;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_RVYfI1FService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.rVYfI1F' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.rVYfI1F'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'articleRepository' => ['privates', '.errored.hmkRBPQ', NULL, 'Cannot determine controller argument for "App\\Controller\\ArticleController::listArticlesWithLowStock()": the $articleRepository argument is type-hinted with the non-existent class or interface: "App\\Controller\\ArticleRepository". Did you forget to add a use statement?'],
        ], [
            'articleRepository' => '?',
        ]);
    }
}
