<?php
function response(string $status, string $message, bool $error) : string {
    $array = [
        'statusCode' => $status,
        'message' => $message,
        'error' => $error
    ];
    return json_encode($array);
}
