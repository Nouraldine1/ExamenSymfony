<?php

namespace ContainerL1IO2gx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_ZHioGBService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.Z_HioGB' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.Z_HioGB'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'request' => ['privates', '.errored.ZMs9isy', NULL, 'Cannot determine controller argument for "App\\Controller\\PaiementController::createPayment()": the $request argument is type-hinted with the non-existent class or interface: "App\\Controller\\Request". Did you forget to add a use statement?'],
            'detteRepository' => ['privates', '.errored.kGevQbz', NULL, 'Cannot determine controller argument for "App\\Controller\\PaiementController::createPayment()": the $detteRepository argument is type-hinted with the non-existent class or interface: "App\\Controller\\DetteRepository". Did you forget to add a use statement?'],
            'paiementRepository' => ['privates', '.errored.WRt6xRt', NULL, 'Cannot determine controller argument for "App\\Controller\\PaiementController::createPayment()": the $paiementRepository argument is type-hinted with the non-existent class or interface: "App\\Controller\\PaiementRepository". Did you forget to add a use statement?'],
        ], [
            'request' => '?',
            'detteRepository' => '?',
            'paiementRepository' => '?',
        ]);
    }
}
