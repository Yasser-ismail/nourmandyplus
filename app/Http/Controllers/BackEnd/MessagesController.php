<?php

namespace App\Http\Controllers\BackEnd;


use App\Http\Requests\BackEnd\Messages\StoreRequest;
use App\Mail\ReplayContact;
use App\Models\Message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class MessagesController extends BackEndController
{

    public function __construct(Message $model)
    {
        parent::__construct($model);
    }

    public function replycontact(StoreRequest $request) {
        $message = Message::findOrFail($request->id);
        $replyMessage = $request->message;

        Mail::send(new ReplayContact($message, $replyMessage));

        Session::flash('replied', 'Your Message has been sent');
        return redirect()->route('messages.edit', ['id'=>$message->id]);

    }
}
