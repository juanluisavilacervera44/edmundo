<?php declare(strict_types=1);

namespace App\Auth\Security;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
interface PasswordHasherInterface {
    public function hashPasswordUser(PasswordAuthenticatedUserInterface $user, string $password):string;
    public function isPasswordValid(PasswordAuthenticatedUserInterface $user, string $password):bool;
}

?>