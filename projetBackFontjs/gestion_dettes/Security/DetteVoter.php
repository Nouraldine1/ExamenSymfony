<?php

namespace App\Security;

use App\Entity\Dette;
use App\Entity\Utilisateur;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class DetteVoter extends Voter
{
    private const VIEW = 'VIEW';

    protected function supports(string $attribute, $subject): bool
    {
        return $attribute === self::VIEW && $subject instanceof Dette;
    }
    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();

        if (!$user instanceof UserInterface) {
            return false;
        }

        /** @var Dette $dette */
        $dette = $subject;

        if ($attribute === self::VIEW) {
            return $this->canView($dette, $user);
        }
        return false;
    }
    private function canView(Dette $dette, Utilisateur $user): bool
    {
        if (in_array($user->getRole(), ['ROLE_ADMIN', 'ROLE_BOUTIQUIER'])) {
            return true;
        }
        if ($user->getRole() === 'ROLE_CLIENT') {
            return $dette->getClient()->getId() === $user->getId();
        }

        return false;
    }
}