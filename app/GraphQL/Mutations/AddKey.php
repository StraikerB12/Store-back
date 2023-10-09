<?php

namespace App\GraphQL\Mutations;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

use App\Models\MediaKey;

final class AddKey
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $method = $args['input']['type'];

        try { 
            return $this->$method($args['input']['data']);
        } catch(QueryException $ex){ 
            Log::error($ex->getMessage());
            return [
                'type' => $args['input']['type'],
                'error' => $ex->getMessage(),
            ];
        }
    }


    public function VK(string $data){

        $dataJson = MediaKey::where('type', 'VK')->value('data');
        
        if(!$dataJson){
            $objectData = json_decode($data);
            $objectSave = [
                'id' => $objectData['id'],
                'secretKey' => $objectData['secretKey'],
                'serviceKey' => $objectData['serviceKey'],
                'timeKey' => null
            ];
            MediaKey::where('type', 'VK')->update(['data' => json_encode($objectSave)]);
        }

        return [ 'type' => 'VK' ];

    }
}
