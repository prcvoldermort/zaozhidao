<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Mailgun\Mailgun;
use PhpImap\Mailbox;

class MailController extends Controller
{
    //测试mailgun邮件发送API
    public function testMailgun() {
        $mgClient = new Mailgun('key-679717d32e7b8a049c7484433f5ec8f1');
        $domain = "mg.zhangyuan.win";

        $result = $mgClient->sendMessage($domain,
            array(
                'from' => 'zhangyuan@zhangyuan.win',
                'to' => '13759113589@139.com',
                'subject' => 'Hello zhang yuan',
                'text' => 'Congratulations zhang yuan, you just sent an email with Mailgun!  You are truly awesome! '
            ));
    }

    //测试laravel发送邮件
    public function testSendmail() {
        Mail::to('13759113589@139.com')->send(new TestMail());
    }

    //测试接收邮件
    public function testReceivemail() {
        $mailbox = new Mailbox('{imap.139.com:993/imap/ssl}','13759113589@139.com','zy85163589',public_path().'/emails');

        //Read all messages into an array
        $mailsIds = $mailbox->searchMailbox('TEXT "1234"');
        if (!$mailsIds) {
            die('Mailbox is empty');
        }

        $maxId=max($mailsIds);

        $mail = $mailbox->getMail($maxId);

        $plainMailTest=$mail->textPlain;

        $responseText = strstr($plainMailTest,'------------------ Original ------------------',true);
        var_dump(trim($responseText));

        //以下是处理附件的程序
        echo "\n\n\n\n\n";
        var_dump($mail->getAttachments());
    }
}
