<?php
namespace Acme;

use Symfony\Component\Console\{
    Command\Command,
    Input\InputInterface,
    Input\InputArgument,
    Output\OutputInterface,
    Output\Output,
    Input\InputOption
};

class AddCommand extends Command {

    public function configure () {

        $this->setName('add')
             ->setDescription('Add a new task')
             ->addArgument('description', InputArgument::REQUIRED, 'Please enter a description of the task.');
    }

    public function execute(InputInterface $input, OutputInterface $output) {
        $description = $input->getArgument('description');
    }
}
