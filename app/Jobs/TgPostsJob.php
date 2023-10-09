<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TgPostsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //

        // $user_id = 210700286;
        // $request_params = array(
        // 'user_id' => $user_id,
        // 'fields' => 'bdate',
        // 'v' => '5.52',
        // 'access_token' => '533bacf01e11f55b536a565b57531ac114461ae8736d6506a3'
        // );
        // $get_params = http_build_query($request_params);
        // $result = json_decode(file_get_contents('https://api.vk.com/method/users.get?'. $get_params));
        // echo($result -> response[0] -> bdate);
    }
}
