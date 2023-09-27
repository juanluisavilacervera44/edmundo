<?php declare (strict_types=1);

namespace App\Commands;

use App\Auth\Services\CreateClassService;
use App\Auth\Services\JoinClassService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:join-class',
    description: 'Join a class as a participant.',
    hidden: false
)]
class JoinClassCommand extends Command
{
    protected  $joinClassService;
    public function __construct(JoinClassService $joinClassService)
    {
        $this->joinClassService = $joinClassService;
        parent::__construct();
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {

        $email = $input->getArgument('email');
        $code = $input->getArgument('code');
        $result = $this->joinClassService->joinClass($email,$code);
        if($result){
            $output->writeln(sprintf('You successfully joined class [%s]', $code));
        }else{
            $output->writeln(sprintf('You can´t join class [%s]; either the class does not exist or you are a participant already',$code));
        }
        return Command::SUCCESS;
    }
    protected function configure(): void
    {
        $this
            ->setHelp('This command allows you to participate in a class as an user...')
            ->addArgument('email', InputArgument::REQUIRED, 'Email: ')
            ->addArgument('code', InputArgument::REQUIRED, 'Code: ')
        ;
    }
}
?>
