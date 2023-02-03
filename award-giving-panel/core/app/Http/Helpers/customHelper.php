<?php

namespace App\Http\Helpers;

use Mail;

if (!function_exists('sendMail')) {

	function sendMailFunction($toAddress, $toAddress_holder_name, $adminName, $name, $email, $mobile, $userMessage)
	{
	  	Mail::send('user.mail', compact('name', 'email', 'mobile', 'userMessage'), function($message) use ($toAddress, $toAddress_holder_name, $adminName) {

            $message->to($toAddress, $toAddress_holder_name)->subject
            ('Meena Media Award Query - '.Carbon::now()->format('d/m/Y H:i:s'));
            $message->from('alreadyConfiguredIn.env@file.com', $adminName);

        });
	}	
}

?>