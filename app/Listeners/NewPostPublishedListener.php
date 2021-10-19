<?php

namespace App\Listeners;

use App\Events\NewPostPublished;
use App\Mail\NewPost;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class NewPostPublishedListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(NewPostPublished $event)
    {
        $lastest_post = $event->post;
        $subscribers = $event->subscribers;
        foreach ($subscribers as $email) {
            \Mail::to($email)->send(new NewPost($lastest_post));
        }
    }
}