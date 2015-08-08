<?php
/**
 *
 * @author Selim Fraoua <sfraoua@gmail.com>
 */

namespace AppBundle\Command;


use AppBundle\Document\Muscle;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class populateDBCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('app:db:populate')
            ->setDescription('Populate DB with random')
            ->addArgument('entity', InputArgument::REQUIRED, 'Sets the entity that you want to populate', null)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $dm = $this->getContainer()->get('doctrine_mongodb.odm.document_manager');

        switch($input->getArgument('entity')){
            case 'muscle':
                for($i=1; $i<=15;$i++){
                    $muscle = new Muscle();
                    $muscle->setNameFr('Name '.$i.' FR');
                    $muscle->setNameEn('Name '.$i.' En');
                    $muscle->setDescriptionFr('Description '.$i.' FR');
                    $muscle->setDescriptionEn('Description '.$i.' En');
                    $dm->persist($muscle);
                }
                break;
        }
                    $dm->flush();
        $output->writeln(sprintf('Database populated with 15 random <info>%s</info> .', $input->getArgument('entity').'s'));
    }
}