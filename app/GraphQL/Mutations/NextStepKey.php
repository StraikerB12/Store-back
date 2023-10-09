<?php

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\Log;

final class NextStepKey
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        Log::info($args);
    }
}
