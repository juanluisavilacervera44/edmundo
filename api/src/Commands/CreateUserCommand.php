<?php declare(strict_types=1);

namespace App\Commands;

use App\Auth\Services\CreateUserService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

    #[AsCommand(
        name: 'app:create-user',
        description: 'Creates a new user.',
        hidden: false
    )]
    class CreateUserCommand extends Command
    {
        protected  $createUserService;
        public function __construct(CreateUserService $createUser)
        {
            $this->createUserService = $createUser;
            parent::__construct();
        }

        public function execute(InputInterface $input, OutputInterface $output): int
        {

            $email = $input->getArgument('email');
            $passwrd = $input->getArgument('passwrd');
            $user = $this->createUserService->createUser($email,$passwrd);
            if($user['email'] != null){
                $output->writeln(sprintf('User [%s] has been created', $user['email']));
            }else{
                $output->writeln(sprintf('User [%s] already exists',$email));
            }
            return Command::SUCCESS;
        }
        protected function configure(): void
        {
            $this
                ->setHelp('This command allows you to create a user...')
                ->addArgument('email', InputArgument::REQUIRED, 'Email: ')
                ->addArgument('passwrd', InputArgument::REQUIRED, 'Password: ')
            ;
        }
    }
?>