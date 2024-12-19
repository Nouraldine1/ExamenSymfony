<?php

namespace ContainerL1IO2gx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_ZOhv0cfService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.ZOhv0cf' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.ZOhv0cf'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'request' => ['privates', '.errored.ZVK.5v1', NULL, 'Cannot determine controller argument for "App\\Controller\\ArticleController::createArticle()": the $request argument is type-hinted with the non-existent class or interface: "App\\Controller\\Request". Did you forget to add a use statement?'],
            'articleRepository' => ['privates', '.errored.I17N.KM', NULL, 'Cannot determine controller argument for "App\\Controller\\ArticleController::createArticle()": the $articleRepository argument is type-hinted with the non-existent class or interface: "App\\Controller\\ArticleRepository". Did you forget to add a use statement?'],
        ], [
            'request' => '?',
            'articleRepository' => '?',
        ]);
    }
}
