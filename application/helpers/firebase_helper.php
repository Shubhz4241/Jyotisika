<?php
defined('BASEPATH') OR exit('No direct script access allowed');


function firebaseTest() {
    echo "Firebase Helper Loaded Successfully";
    exit;
}

function firebaseRequest($path, $data = [], $method = 'PUT') {
    $firebase_url = 'https://manasvichatapp-41f59-default-rtdb.firebaseio.com/';
    $url = $firebase_url . $path . '.json';

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

    $result = curl_exec($ch);
    curl_close($ch);

    return json_decode($result, true);
}
