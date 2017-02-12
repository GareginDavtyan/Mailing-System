<?php
include '../connectDB.php';
include '../core/Model.php';
include '../models/Queue.php';
include '../models/Email.php';
include '../models/MailSent.php';
include '../models/User.php';
include '../models/Template.php';

$queue = new Queue();

// getting list of emails from queue
$mails_to_send = $queue->getMails();

if(!$mails_to_send){
    echo "There is no messages  in the queue";
    die;
}

$send_count = 0;

foreach ($mails_to_send as $item) {
    if(!$item['id_user'] || !$item['id_template']){
        continue;
    }
    $id_queue = $item['id'];
    $id_session = $item['id_session'];
    $id_user = $item['id_user'];
    $id_template = $item['id_template'];

    // sending email to user
    $email = new Email($id_session, $id_user, $id_template);
    $send = $email->sendEmail();

    // adding email info to `mail_sent` table
    if($send){
        $add = MailSent::addToSent($id_session, $id_user, $id_template);
    }

    // changing sending status
    if(!$send || !$add){
        $queue->notSenging($id_queue);
        continue;
    }

    // removeing this email from queue
    $queue->removeFromQueue($id_queue);

    $send_count ++;
}


// final result
echo "Select " . count($mails_to_send) . " users, \n";
echo $send_count . " mails have been sent";
die;