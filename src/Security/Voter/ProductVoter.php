<?php

namespace App\Security\Voter;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use App\Entity\Product;
use Perform\UserBundle\Entity\User;

class ProductVoter extends Voter
{
    protected function supports($attribute, $subject)
    {
        return $subject instanceof Product || $subject === 'product';
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();
        if (!$user instanceof User) {
            return false;
        }

        if ($attribute === 'VIEW') {
            return true;
        }

        // all other actions available to Arkwright only
        return in_array('ROLE_ADMIN', $user->getRoles(), true);
    }
}
