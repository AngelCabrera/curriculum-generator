<?php 

namespace App\Controllers;

use Zend\Diactoros\ServerRequest;
use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;
use Zend\Diactoros\Response\RedirectResponse;
use App\Models\Message;

class ContacController extends BaseController
{
    public function getContactAction()
    {
        return $this->renderHTML('contact/index.twig');
    }

    public function postContactAction(ServerRequest $request)
    {
        $requestData = $request->getParsedBody();
        $message = new Message();
        $message->name=$requestData['name'];
        $message->email=$requestData['email'];
        $message->message=$requestData['message'];
        $message->sent = false;
        $message->save();
        

        return new RedirectResponse('/curriculum-generator/contact');
    }
}