<?php declare(strict_types=1);
namespace App\Auth\Services;

use App\Entity\Classes;
use App\Entity\User;
use App\Repository\ClassesRepository;
use App\Repository\UserRepository;

class CreateClassService{
    public ClassesRepository $classesRepository;
    public UserRepository $userRepository;
    public function __construct(ClassesRepository $classesRepository, UserRepository $userRepository){
        $this->classesRepository = $classesRepository;
        $this->userRepository = $userRepository;
    }
    public function createClass(String $email, String $name):string
    {
        $user = new User($email);
        $class = new Classes($user,$name);
        $found = $this->userRepository->findBy(array('email' => $email));
        if($found){
            $class ->setCreator($found[0]);
            $class->setClassCode($this->createClassCode($this->classesRepository));
            $this->classesRepository->save($class,true);
            return $class->getClassCode();
        }else{
            return '';
        }
    }
    public function createClassCode(ClassesRepository $classesRepository): string
    {
        $found = true;
        while($found == true){
            $length = 10;
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $chLength = strlen($characters);
            $code = '';
            for($i = 0 ; $i < $length ; $i++){
                $code .= $characters[random_int(0,$chLength -1)];
            }
            $found = $this->classesRepository->findBy(array('classCode' => $code));
        }
        return $code;
    }
}
