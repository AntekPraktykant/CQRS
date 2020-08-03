<?php

namespace App\MessageHandler\Command;


use App\Message\Command\SignUpSMS;

class SignUpSMSHandler
{
    public function __invoke(SignUpSMS $signUpSMS)
    {
        sleep(2);
        var_dump($signUpSMS);
    }
}