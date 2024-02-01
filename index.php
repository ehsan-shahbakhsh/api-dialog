<?php

class Dialog
{
    private array $baseAPI = [
        'ok' => false,
        'status' => 400,
        'result' => []
    ];

    public function __construct()
    {
        http_response_code(200);
        $this->baseAPI['status'] = 200;
        $this->baseAPI['ok'] = true;
        $data = json_decode(
            file_get_contents("data.json"),
            true
        );
        $this->baseAPI['result'] = [
            'dialog' => $data[array_rand($data)]
        ];
    }

    public function __toString(): string
    {
        return json_encode($this->baseAPI);
    }
}
echo new Dialog;