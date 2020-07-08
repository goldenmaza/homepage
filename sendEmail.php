<?php

    /**
     * sendEmail.php
     *
     * This class is used for sending an e-mail.
     * 
     * @package      Homepage
     * @author       Mats Richard Hellstrand
     * @copyright    Copyright (c) 2015-2025, Alpheria
     * @license      TODO: http://
     * @link         TODO: http://
     * @since        July 8th, 2020 - Version 1.1
     */
    // ===========================================================================

    require_once("configuration.php");

    $formText        =   $_GET['formText'];
    $formArray       =   explode(',', $formText);
    $host            =   $sendTo;
    $crnl            =   '\r\n';

    if (!empty($formArray)) {
        $name        =  $formArray[2];
        $email       =  $formArray[3];
        $subject     =  $name . ' wanna talk about: ' . $formArray[1];
        $message     =  strip_tags($formArray[0], '');

        $headers     =  '';
        $headers    .=  'Date: ' . date('D, j M Y H:i:s O') . $crnl;
        $headers    .=  'From: ' . $name . '<' . $email . '>' . $crnl;
        $headers    .=  'Return-Path: ' . $email . $crnl;
        $headers    .=  'Sender: ' . $email . $crnl;
        $headers    .=  'Reply-To: ' . $email . $crnl;
        $headers    .=  'Message-ID: ' . md5(uniqid(time())) . '@' . $_SERVER['SERVER_NAME'] . $crnl;
        $headers    .=  'X-Priority: 3' . $crnl;
        $headers    .=  'X-Mailer: Goldenmaza\'s Custom PHP Mail Script' . $crnl;
        $headers    .=  'MIME-Version: 1.0' . $crnl;
        $headers    .=  'Content-Type: text/plain; charset=utf-8' . $crnl;
        $headers    .=  'Content-Transfer-Encoding: 8bit' . $crnl;

        mail($host, $subject, $message, $headers);
    }

?>
