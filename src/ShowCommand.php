<?php

namespace Acme;

use Symfony\Component\Console\{
    Command\Command,
    Input\InputInterface,
    Input\InputArgument,
    Output\OutputInterface,
    Output\Output
};
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Helper\Table;

class ShowCommand extends Command {

    private $database;

    function __construct(DatabaseAdapter $database){
        $this->database = $database;
        parent::__construct();
    }

    public function configure () {

        $this->setName('show')
             ->setDescription('Show all tasks,');
            //  ->addArgument('name', InputArgument::REQUIRED, 'Please enter your name')
            //  ->addOption('greeting', null, InputOption::VALUE_OPTIONAL, 'Can override the default greeting', 'Glad to see you');

    }

    public function execute(InputInterface $input, OutputInterface $output) {
        $this->showTasks($output);

    }
    
    private function showTasks(OutputInterface $output){
       
        if ( ! $tasks = $this->database->fetchAll('tasks')) {
            return $output->writeln('<info>No tasks at the moment</info>');
        }
        $table = new Table($output);
        $table->setHeaders(['ID', 'Description'])
              ->setRows($tasks)
              ->render();
    }

}