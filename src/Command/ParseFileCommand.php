<?php

namespace App\Command;
use App\Service\JsonParser;
use App\Service\XMLParser;
use App\Interface\ParserInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Doctrine\ORM\EntityManagerInterface;



// the name of the command is what users type after "php bin/console"
#[AsCommand(
    name: 'app:parse-file',
    description: 'Parses a new file.',
    hidden: false,
    aliases: ['app:parse-file']
)]
class ParseFileCommand extends Command
{
    public function __construct(private readonly EntityManagerInterface $entityManager){
        parent::__construct();
    }

    protected function configure(): void
    {
        //set arguments Input (path to the file), target (target where data is to be saved)
        $this
            // the command description shown when running "php bin/console list"
            ->setDescription('Parse a new file.')
            // the command help shown when running the command with the "--help" option
            ->setHelp('This command allows you to push data from the file to a database...')
            ->addArgument('input', InputArgument::REQUIRED, 'Pass the parameter.')
            ->addArgument('target', InputArgument::REQUIRED, 'Pass the parameter.');
    }
    
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $log = new Logger('command');
        $log->pushHandler(new StreamHandler(dirname(__FILE__, 3).'/var/log/errorLog', Level::Warning));

        $target = $input->getArgument('target');
        $input = $input->getArgument('input');

        try {
            if ($target !== 'mysql' && $target !== 'sqlite'){
                throw new \Exception('Given Target ' . $target . ' is not supported.');
            }      
            $path_parts = pathinfo($input);
    
            if ($path_parts['extension'] !== 'xml' && $path_parts['extension'] !== 'json'){
                throw new \Exception('Given Input type ' . $input . ' is not supported.');
            }    
    
            $parser = $this->getFileParser($path_parts['extension']);
    
            $parser->readFromFile($input, $target);
    
            $output->writeln('Parsed input '.$input. ' and saved to '.$target . ' target');
    
        }catch(\Exception $e){
            $log->error($e->getMessage());
            throw $e;
        }
        return Command::SUCCESS;
    }

    /**
     * Returns the correct File parser according to the extension of the file
     * @return ParserInterface
     */
    protected function getFileParser($extension): ParserInterface {
        return match($extension){
            'xml' => new XMLParser($this->entityManager),
            'json' => new JsonParser($this->entityManager),
        };
    }
}
