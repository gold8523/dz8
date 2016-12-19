<?php

$token = '421771ec8254fc088e652ba4aeb56ccfb7abc3b3317bb120954b90f3c6cfc7653c0b4bfe3760bc960c668';

//https://oauth.vk.com/authorize?client_id=5780232&display=page&redirect_uri=http://dz8/vkform.php&scope=friends,photos,wall&response_type=token


$upl = file_get_contents('https://api.vk.com/method/photos.getWallUploadServer?access_token=' . $token . '&v=5.60');
$upl = json_decode($upl);
$url = $upl->response->upload_url;




$fname = $image['tmp_name'];
$cfile = new CURLFile($fname, 'image/jpg', 'ozero.jpg');
$file = [
    'photo' => $cfile
];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER,array('Content-Type: multipart/form-data'));
curl_setopt($ch, CURLOPT_POSTFIELDS, $file);

$result = curl_exec ($ch);

if ($result === FALSE) {
    echo "Error sending " . $fname .  " " . curl_error($ch);
    curl_close ($ch);
}else{
    curl_close ($ch);
    echo  "Result: " . $result;
}

$photo = json_decode($result);

$photos = stripslashes($photo->photo);

$vksave = file_get_contents('https://api.vk.com/method/photos.saveWallPhoto?photo=' . $photos . '&server=' . $photo->server . '&hash=' . $photo->hash . '&access_token=' . $token);

$post_photo = json_decode($vksave);
echo "<br><pre>";
var_dump($post_photo);
echo "<br>";
$post_wall = file_get_contents('https://api.vk.com/method/wall.post?owner_id=' . $post_photo->response[0]->owner_id . '&access_token=' . $token . '&attachments=' . $post_photo->response[0]->id);
var_dump($post_wall);