<?php

namespace App;

use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

/**
 * Class Mailer
 * @package App
 */
class Mailer
{
    protected static $instance;
    protected $mailer;
    protected $emailFrom;
    protected $emailTo;

    /**
     * Mailer constructor.
     */
    public function __construct()
    {
        $config = Config::instance();
        $this->emailFrom = $config->data['email']['name'];
        $this->emailTo = $config->data['adminEmail']['name'];

        $transport = (new Swift_SmtpTransport
        ($config->data['email']['host'], $config->data['email']['port']))
            ->setUsername($config->data['email']['login'])
            ->setPassword($config->data['email']['password'])
            ->setEncryption('SSL');
        $this->mailer = new Swift_Mailer($transport);

    }

    /**
     * @return Mailer
     */
    public static function instance(): self
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @param string $text
     */
    public function send(string $text)
    {
        $message = (new Swift_Message('Server message'))
            ->setFrom([$this->emailFrom => 'Server'])
            ->setTo([$this->emailTo => 'Admin'])
            ->setBody($text);

        $this->mailer->send($message);


    }
}
