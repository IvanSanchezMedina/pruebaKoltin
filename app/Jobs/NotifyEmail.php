<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailMessages;
use App\Models\User;
use App\Models\Message;
use App\Models\Conversation;
class NotifyEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $users = User::all();
        $readMessages =0;
        $unreadMessages =0;

        foreach ($users as $user) {
            $name=$user->name;
            $conversations= Message::where('receiver_id',$user->id)->with('conversation','useer')->get();
            foreach ($conversations as $conversation) {

                    // foreach ($conversation as $message) {
                        if($conversation->read == 1){
                            $readMessages ++;
                        }else{
                            $unreadMessages ++;
                        }

                // }

            }

            $email_model= Mail::to($user->email)->send(new MailMessages($readMessages,$unreadMessages,$conversations,$name));

            $readMessages =0;
            $unreadMessages =0;
        }

    }
}
