<?php
//echo  1;
$token = '41a6032dab484dfd6b9ba2bcd3d3a7957ad11b1a4c5806ab3a8128eb6accbbdbfd1013df07dc7bc26f9e3';

//https://oauth.vk.com/authorize?client_id=5780232&display=page&redirect_uri=http://dz8/vk_api.php&scope=photos&response_type=token&v=5.60


$upl = file_get_contents('https://api.vk.com/method/photos.getWallUploadServer?owner_id=2696830&access_token=41a6032dab484dfd6b9ba2bcd3d3a7957ad11b1a4c5806ab3a8128eb6accbbdbfd1013df07dc7bc26f9e3s://api.vk.com/method/photos.getUploadServer?album_id=239145223&access_token=41a6032dab484dfd6b9ba2bcd3d3a7957ad11b1a4c5806ab3a8128eb6accbbdbfd1013df07dc7bc26f9e3');
$upl = json_decode($upl);

$url = $upl->response->upload_url;


$fname = dirname(__FILE__) . '/photos1/rif.jpg';
$cfile = new CURLFile($fname, 'image/jpg');
$file = [
    'photo' => $cfile
];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER,array('Content-Type: multipart/form-data'));
//$cfile = curl_file_create('photos1/pes.jpg', 'image/jpg', 'pes.jpg');
curl_setopt($ch, CURLOPT_POSTFIELDS, $file);

$result = curl_exec ($ch);

if ($result === FALSE) {
    echo "Error sending " . $fname .  " " . curl_error($ch);
    curl_close ($ch);
}else{
    curl_close ($ch);
    echo  "Result: " . $result;
}

//$ph = json_decode($result);
//print_r($ph->photo);
//$a = stripslashes($ph->photo);
//print_r($a);