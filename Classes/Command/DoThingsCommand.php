<?php
declare(strict_types=1);

namespace DIX\Test\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

use TYPO3\CMS\Core\Utility\GeneralUtility;

use Symfony\Component\Mime\Address;
use TYPO3\CMS\Core\Mail\FluidEmail;
use TYPO3\CMS\Core\Mail\Mailer;


class DoThingsCommand extends Command
{
    
    const TESTEMAIL = 'markus.kappe@gmail.com'; // anpassen!!!! adapt!
    
    /**
     * Configure the command by defining the name, options and arguments
     */
    protected function configure()
    {
        $this->setDescription('TEST')
           ->setHelp('Test');
    }

    /**
     * Executes the command for showing sys_log entries
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $io->title($this->getDescription());

 
        $email = GeneralUtility::makeInstance(FluidEmail::class);
        $email
            ->to(self::TESTEMAIL)
            ->format('plain')
            ->setTemplate('Testest');

        GeneralUtility::makeInstance(Mailer::class)->send($email);



        $io->writeln('Write something');
        return 0;
    }
}