<?php declare(strict_types=1);

namespace App\Auth\Security;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

class SymfonyPasswordHasher implements PasswordHasherInterface
{
    public function __construct(
        private readonly UserPasswordHasherInterface $passwordHasher
    )
    {

    }

    public function hashPasswordUser(PasswordAuthenticatedUserInterface $user, string $password) : string
    {
        return $this->passwordHasher->hashPassword($user,$password);
    }

    public function isPasswordValid(PasswordAuthenticatedUserInterface $user, string $password) : bool
    {
        return $this->passwordHasher->isPasswordValid($user,$password);
    }
}

?>