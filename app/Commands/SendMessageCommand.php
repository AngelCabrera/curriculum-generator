<?php

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;
use App\Models\Message;
use Swift_Message;
use Swift_Mailer;
use Swift_SmtpTransport;

class SendMessageCommand extends Command
{
    protected static $defaultName = 'app:send-mail';

    protected function configure()
    {
        $this
            // the short description shown while running "php bin/console list"
            ->setDescription('Creates a new user.')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('This command allows you to create a user...')
        ;
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $pendingMessage = Message::where('sent', false)->first();
        
        if ($pendingMessage) {
            $transport = (new Swift_SmtpTransport(getenv('SMTP_HOST'), getenv('SMTP_PORT')))
                ->setUsername(getenv('SMTP_USER'))
                ->setPassword(getenv('SMTP_PASSWORD'));

            $mailer = new Swift_Mailer($transport);


            $message = (new Swift_Message('Wonderful Subject'))
                ->setFrom(['contact@curriculum.com' => 'Angel Cabrera'])
                ->setTo([$pendingMessage['email'], 'soyangelcabrera@gmail.com' => $pendingMessage['name']])
                ->setBody($pendingMessage['message']);
        }

        $result = $mailer->send($message);
    }
}
