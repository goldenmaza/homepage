<?php

	/**
	 * sendEmail.php
	 *
	 * This class is used for sending an e-mail.
	 * 
	 * @package				Homepage
	 * @author				Richard M. Hellstrand
	 * @copyright			Copyright (c) 2015-2017, Alpheria
	 * @license				http://www.alpheria.com/about/license.html
	 * @link				http://www.alpheria.com
	 * @since				June 5th, 2017 - Version 1.0
	 */
	 
	// ===========================================================================

	$formText 	 = 	  $_GET['formText'];
	$formArray 	 = 	  explode(',', $formText);
	$host 		 = 	  "public@hellstrand.org";

	if (!empty($formArray[0]) && !empty($formArray[1]) && !empty($formArray[2]) && !empty($formArray[3])) {
		$name 		 = 	  $formArray[0];
		$email 		 = 	  $formArray[1];
		$subject 	 = 	  $name . " wanna talk about: " . $formArray[2];
		$message 	 = 	  strip_tags($formArray[3], '');

		$headers 	 = 	  "";
		$headers 	.= 	  "Date: " . date('D, j M Y H:i:s O') . "\r\n";
		$headers 	.= 	  "From: " . $name . "<" . $email . ">\r\n";
		$headers 	.= 	  "Return-Path: " . $email . "\r\n";
		$headers 	.= 	  "Sender: " . $email . "\r\n";
		$headers 	.= 	  "Reply-To: " . $email . "\r\n";
		$headers 	.= 	  "Message-ID: " . md5(uniqid(time())) . "@" . $_SERVER['SERVER_NAME'] . "\r\n";
		$headers 	.= 	  "X-Priority: 3" . "\r\n";
		$headers 	.= 	  "X-Mailer: Alpheria's Custom PHP Mail Script" . "\r\n";
		$headers 	.= 	  "MIME-Version: 1.0" . "\r\n";
		$headers 	.= 	  "Content-Type: text/plain; charset=utf-8" . "\r\n";
		$headers 	.= 	  "Content-Transfer-Encoding: 8bit" . "\r\n";

		mail($host, $subject, $message, $headers);
	}

?> 