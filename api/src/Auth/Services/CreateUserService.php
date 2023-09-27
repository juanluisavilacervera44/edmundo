<?php declare(strict_types=1);
namespace App\Auth\Services;

use App\Auth\Security\PasswordHasherInterface;
use Symfony\Component\HttpFoundation\Response;
use App\Auth\Security\SymfonyPasswordHasher;
use App\Entity\User;
use App\Repository\UserRepository;

class CreateUserService
{
    public PasswordHasherInterface $passwordHasher;
    public UserRepository $userRepository;

    public function __construct(PasswordHasherInterface $passwordHasher, UserRepository $userRepository)
    {
        $this->passwordHasher = $passwordHasher;
        $this->userRepository = $userRepository;
    }

    public function createUser(String $email, String $pwd):Array
    {
        $user = new User($email);
        $password = $this->passwordHasher->hashPasswordUser($user, $pwd);
        $user->setPassword($password);
        $found = $this->userRepository->findBy(array('email' => $email));
        if(!$found){
            $this->userRepository->save($user,true);
            return ['email' => $user->getEmail(), 'id' => $user->getId()];
        }else{
            return ['email' => null, 'id' => null];
        }
    }

}