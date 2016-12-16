<?php
//echo  1;
$token = '41a6032dab484dfd6b9ba2bcd3d3a7957ad11b1a4c5806ab3a8128eb6accbbdbfd1013df07dc7bc26f9e3';

//https://oauth.vk.com/authorize?client_id=5780232&display=page&redirect_uri=http://dz8/vk_api.php&scope=photos&response_type=token&v=5.60


$upl = file_get_contents('https://api.vk.com/method/photos.getWallUploadServer?access_token=41a6032dab484dfd6b9ba2bcd3d3a7957ad11b1a4c5806ab3a8128eb6accbbdbfd1013df07dc7bc26f9e3s://api.vk.com/method/photos.getUploadServer?album_id=239145223&access_token=41a6032dab484dfd6b9ba2bcd3d3a7957ad11b1a4c5806ab3a8128eb6accbbdbfd1013df07dc7bc26f9e3');
$upl = json_decode($upl);

foreach ($upl as $value) {
    foreach ($value as $item) {
        $vk [] = $item;
    }
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $vk[0]);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST,
$file = [
//    'photo' => "@" . '/photos1/pes.jpg'
];

curl_setopt($ch, CURLOPT_POSTFIELDS, $file);
$response = curl_exec($ch);
$ph = json_decode($response);
print_r($ph);
//include 'vk.php';