<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Http\Controllers\Controller;
use App\Events\RedisEvent;
use App\Models\User;
use Notification;
use Carbon\Carbon;


class SocketController extends Controller
{

    public function index(Request $request, $id)
    {
        $key = $id . '+' . (auth()->user()->id);
        $key1 = (auth()->user()->id) . '+' . $id;
        $receive = $id;
        $receiver = User::find($id);
        $name = auth()->user()->name;
        \App\Models\Notification::where('key', $key)->update(['read_at' => Carbon::now()]);

        $messages = Message::where('key', $key)->orWhere('key', $key1)->get();

        return view('site.messages', compact('messages', 'receive', 'key', 'key1', 'name', 'key_check', 'receiver'));
    }


    public function postSendMessage(Request $request)
    {

        $request->merge([
            'sender_id' => auth()->user()->id,
        ]);
        $messages = Message::create($request->all());
        $receiver = User::find($request->receiver_id);
        $key = (auth()->user()->id) . '+' . $request->receiver_id;
        Notification::send($receiver, new \App\Notifications\MessageNotification($messages));
        \App\Models\Notification::orderBy('created_at', 'DESC')->first()->update(['key' => $key]);
        event(
            $e = new RedisEvent($messages)
        );

        return redirect()->back();
    }
}