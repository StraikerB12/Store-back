<?php

namespace App\Service;


class VkService
{

    protected $token;
    protected $id_grup;

    public function __construct($token, $id_grup)
    {
        $this->token = $token;
        $this->id_grup = $id_grup;
    }

    public function getPosts($offset, $count)
    {
        $get = array(
            'access_token' => $this->token,
            'v' => '5.131',
            'owner_id' => $this->id_grup,
            'count' => $count,
            'offset' => $offset,
        );

        $response = file_get_contents("https://api.vk.com/method/wall.get?" . http_build_query($get, '', '&'));

        return json_decode($response);
    }
}