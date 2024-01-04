<?php
error_reporting(0);

$jwt = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1IjoiNjI0ZjkzMDllNWM0NDE3ZjhhYTc0NjNiOTMxNjIzMjAiLCJkIjoiN2FlMzhmNTQwOTc5NGUyZTlmZjA2M2UzMTYwMmViOTEiLCJyIjoic2EiLCJwIjoiZnJlZSIsImEiOiJmaW5kZXIuaW8iLCJsIjoidXMxIiwiZXhwIjoxNzA2OTUxMjEyfQ.rBhmjgNMDfxIonjMhjmHnOADEvMQXvn9N5YonB4L5co';
$domain = trim($_GET['domain']);
if($domain == ''){
    die();
}
$curl_get = curl_get();
echo $curl_get;

function curl_get()
{
    global $jwt;
    global $domain;
    $datapost = curl_init();
    $headers = [
        'Accept: */*',
        'Accept-Language: en',
        'Authorization: Bearer ' . $jwt,
        'Origin: https://app.finder.io',
        'Referer: https://app.finder.io/',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36'
    ];
    curl_setopt($datapost, CURLOPT_URL, 'https://v14-backend-finder-domain-search.earth.infinity-api.net/domain/search?index=finderio&query_type=search&where_condition=domain=\'' . urlencode($domain) . '\'&limit=50&offset=0');
    curl_setopt($datapost, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($datapost, CURLOPT_HTTPHEADER, $headers);
    return curl_exec($datapost);
}
?>
