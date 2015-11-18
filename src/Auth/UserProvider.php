<?php namespace Ordercloud\Laravel\Auth;

use Exception;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\UserProviderInterface;
use Ordercloud\Services\UserService;

class UserProvider implements UserProviderInterface
{
    /**
     * @var UserService
     */
    private $users;

    public function __construct(UserService $users)
    {
        $this->users = $users;
    }

    public function retrieveById($identifier)
    {
        $user = $this->users->getUser($identifier);

        return new AuthenticatableUser($user);
    }

    public function retrieveByToken($identifier, $token)
    {
        throw new Exception('Not supported');
    }

    public function retrieveByCredentials(array $credentials)
    {
        throw new Exception('Not supported');
    }

    public function updateRememberToken(UserInterface $user, $token)
    {
        // this is always called - never used - do nothing
    }

    public function validateCredentials(UserInterface $user, array $credentials)
    {
        throw new Exception('Not supported');
    }
}
