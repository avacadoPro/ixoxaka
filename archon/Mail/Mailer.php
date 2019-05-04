<?php
require_once "Mail.php";
class Mailer
{
    public function send($to, $subject, $body)
    {
        $from = 'testing@cms.qa'; //change this to your email address
        
        $headers = array(
            'From' => $from,
            'To' => $to,
            'Subject' => $subject
        );

        $smtp = Mail::factory('smtp', array(
                'host' => 'mail.cms.qa',
                'port' => '465',
                'auth' => true,
                'username' => 'contact@cms.qa', //your gmail account
                'password' => 'user123456' // your password
            ));

        // Send the mail
        $mail = $smtp->send($to, $headers, $body);

    }

    public function sendme( $subject, $body)
    {
        $from = 'testing@cms.qa'; //change this to your email address
        
        $headers = array(
            'From' => $from,
            'To' => $from,
            'Subject' => $subject
        );

        $smtp = Mail::factory('smtp', array(
            'host' => 'mail.cms.qa',
            'port' => '465',
            'auth' => true,
            'username' => 'contact@cms.qa', //your gmail account
            'password' => 'user123456' // your password
        ));
        // Send the mail
        $mail = $smtp->send($from, $headers, $body);

    }

}
