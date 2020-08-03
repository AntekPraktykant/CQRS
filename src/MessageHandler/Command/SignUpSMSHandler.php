<?php

namespace App\MessageHandler\Command;


use App\Message\Command\SignUpSMS;

class SignUpSMSHandler
{
    public function __invoke(SignUpSMS $signUpSMS)
    {
        sleep(10);
        var_dump($signUpSMS);
    }
}