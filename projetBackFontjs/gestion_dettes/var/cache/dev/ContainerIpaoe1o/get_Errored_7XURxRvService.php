<?php

namespace ContainerIpaoe1o;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_Errored_7XURxRvService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.errored.7XURxRv' shared service.
     *
     * @return \App\Controller\PaiementRepository
     */
    public static function do($container, $lazyLoad = true)
    {
        throw new RuntimeException('Cannot determine controller argument for "App\\Controller\\PaiementController::listPaymentsByDebt()": the $paiementRepository argument is type-hinted with the non-existent class or interface: "App\\Controller\\PaiementRepository". Did you forget to add a use statement?');
    }
}
