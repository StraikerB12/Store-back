<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class LoadPostsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
        Log::info('__construct');

        // $jobs = [];
        // foreach ($blocks as $key => $value) {
        //     $jobs[] = new ObjectJob($key, $value);
        // }
        // $batch = Bus::batch($jobs)->dispatch();

        // $batch = Bus::findBatch($id);

        // ->allowFailures()->dispatch();
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
    }
}
