<?php declare(strict_types=1);
namespace App\Auth\Services;

use App\Entity\Classes;
use App\Entity\User;
use App\Entity\Participants;
use App\Repository\ClassesRepository;
use App\Repository\UserRepository;
use App\Repository\ParticipantsRepository;

class JoinClassService{
    public ClassesRepository $classesRepository;
    public UserRepository $userRepository;
    public ParticipantsRepository $participantsRepository;
    public function __construct(ClassesRepository $classesRepository, UserRepository $userRepository, ParticipantsRepository $participantsRepository){
        $this->classesRepository = $classesRepository;
        $this->userRepository = $userRepository;
        $this->participantsRepository = $participantsRepository;
    }
    public function joinClass(String $email, String $code):bool
    {
        $user = new User($email);
        $foundUser = $this->userRepository->findBy(array('email' => $email));
        $foundClass = $this->classesRepository->findBy(array('classCode'=>$code));
        if($foundClass && $foundUser){
            $found = $this->participantsRepository->findBy(array('Users'=>$foundUser[0], 'Classes'=>$foundClass[0]));
            if(!$found){
                $participant = new Participants();
                $participant->setClasses($foundClass[0]);
                $participant->setUsers($foundUser[0]);
                $this->participantsRepository->save($participant,true);
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

}
