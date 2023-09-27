<?php declare (strict_types=1);

namespace App\Commands;

use App\Auth\Services\CreateClassService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:create-class',
    description: 'Creates a new class.',
    hidden: false
)]
class CreateClassCommand extends Command
{
    protected  $createClassService;
    public function __construct(CreateClassService $createClass)
    {
        $this->createClassService = $createClass;
        parent::__construct();
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {

        $email = $input->getArgument('email');
        $name = $input->getArgument('name');
        $code = '';
        $code = $this->createClassService->createClass($email,$name);
        if($code != ''){
            $output->writeln(sprintf('Class [%s] has been created', $code));
        }else{
            $output->writeln(sprintf('Class [%s] already exists',$code));
        }
        return Command::SUCCESS;
    }
    protected function configure(): void
    {
        $this
            ->setHelp('This command allows you to create a user...')
            ->addArgument('email', InputArgument::REQUIRED, 'Email: ')
            ->addArgument('name', InputArgument::REQUIRED, 'Name: ')
        ;
    }
}
?>
