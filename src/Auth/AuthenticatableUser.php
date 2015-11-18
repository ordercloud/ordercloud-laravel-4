<?php namespace Ordercloud\Laravel\Auth;

use Illuminate\Auth\UserInterface;
use Ordercloud\Entities\Users\User as OrdercloudUser;
use Ordercloud\OrdercloudException;

class AuthenticatableUser extends OrdercloudUser implements UserInterface
{
    public function __construct(OrdercloudUser $user)
    {
        parent::__construct(
            $user->getId(),
            $user->isEnabled(),
            $user->getUsername(),
            $user->getFacebookId(),
            $user->getProfile(),
            $user->getGroups(),
            $user->getOrganisations()
        );
    }

    public function getAuthIdentifier()
    {
        return $this->getId();
    }

    public function getAuthPassword()
    {
        throw new OrdercloudException('Should not be authenticating on this app, use OAuth.');
    }

    public function getRememberToken()
    {
        throw new OrdercloudException('Not supported.');
    }

    public function setRememberToken($value)
    {
        // This is called on logout, since we do not support remember me functionality - do nothing
    }

    public function getRememberTokenName()
    {
        throw new OrdercloudException('This provider does not have a remember me "column".');
    }
}
