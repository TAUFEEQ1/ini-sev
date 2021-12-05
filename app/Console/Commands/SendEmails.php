<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\Subscriber;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send {emails*} {--post_id=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Post to subscribers';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $emails = $this->argument('emails');
        $post_id = $this->option('post_id');
        $post = Post::find($post_id);
        Mail::send(array(), ["emails"=>$emails,"post"=>$post], function ($message) use ($emails,$post) {
            $message->to($emails)
              ->subject($post->title)
              ->from("reports@inisev.com")
              ->setBody($post->description, 'text/html');
          });
    }
}
