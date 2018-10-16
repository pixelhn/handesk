<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Attachment;

class RequesterCommentsController extends Controller
{
    public function store($public_token)
    {
        $ticket = Ticket::findWithPublicToken($public_token);
        $comment = $ticket->addComment(null, request('body'), $this->getNewStatus());

        if ($comment && request()->hasFile('attachment')) {
            Attachment::storeAttachmentFromRequest(request(), $comment);
        }

        return back();
    }

    private function getNewStatus()
    {
        if (request('solved')) {
            return Ticket::STATUS_SOLVED;
        }
        if (request('reopen')) {
            return Ticket::STATUS_OPEN;
        }

        return null;
    }
}
