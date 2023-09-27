<?php

namespace App\Auth\Services;

use App\Entity\Classes;
use App\Entity\Participants;
use App\Entity\User;
use App\Repository\ClassesRepository;
use App\Repository\ParticipantsRepository;
use App\Repository\UserRepository;

class ManageClassService
{
    public ClassesRepository $classesRepository;
    public UserRepository $userRepository;
    public ParticipantsRepository $participantsRepository;
    public function __construct(ClassesRepository $classesRepository, UserRepository $userRepository, ParticipantsRepository $participantsRepository){
        $this->classesRepository = $classesRepository;
        $this->userRepository = $userRepository;
        $this->participantsRepository = $participantsRepository;
    }


    public function findClasses(String $email):string
    {
        $founduser = $this->userRepository->findBy(array('email' => $email));
        if($founduser){
            $classesfound = $this->participantsRepository->findBy(array('Users' => $founduser[0]));
            if($classesfound){
                return ['email' => $classesfound->getId()];
            }else{
                return ['class' => null];
            }
        }else{
            return 'usuario no encontrado';
        }
    }
}