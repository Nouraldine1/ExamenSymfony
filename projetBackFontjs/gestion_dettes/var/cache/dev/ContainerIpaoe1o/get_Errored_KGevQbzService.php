<?php

namespace ContainerIpaoe1o;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_Errored_KGevQbzService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.errored.kGevQbz' shared service.
     *
     * @return \App\Controller\DetteRepository
     */
    public static function do($container, $lazyLoad = true)
    {
        throw new RuntimeException('Cannot determine controller argument for "App\\Controller\\PaiementController::createPayment()": the $detteRepository argument is type-hinted with the non-existent class or interface: "App\\Controller\\DetteRepository". Did you forget to add a use statement?');
    }
}
