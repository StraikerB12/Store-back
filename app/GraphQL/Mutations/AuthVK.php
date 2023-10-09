<?php

namespace App\GraphQL\Mutations;

final class AuthVK
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $get = array(
            'client_id' => '51746034',
            'client_secret' => 'XrODPbMjmzhBgvDQ3qqF',
            'redirect_uri' => $args['redirect_uri'],
            'code' => $args['code'],
        );

        $response = file_get_contents("https://oauth.vk.com/access_token?" . http_build_query($get, '', '&'));
        
        return json_decode($response);
    }
}