<?php

$token = 'b81b990945d868f3fd867d0fa18497397f09cf745c60d66e10a73af414b0583cdb8560e5f9c73bead35f9';

//https://oauth.vk.com/authorize?client_id=5780232&display=page&redirect_uri=http://dz8/vk_api.php&scope=friends,photos,wall,offline&response_type=token&v=5.60

$upl = file_get_contents('https://api.vk.com/method/photos.getWallUploadServer?access_token=' . $token . '&v=5.60');
$upl = json_decode($upl);
$url = $upl->response->upload_url;
//print_r($upl);



$fname = dirname(__FILE__) . '/photos1/clash.jpg';
$cfile = new CURLFile($fname, 'image/jpg', 'rif.jpg');
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

//if ($result === FALSE) {
//    echo "Error sending " . $fname .  " " . curl_error($ch);
//    curl_close ($ch);
//}else{
//    curl_close ($ch);
//    echo  "Result: " . $result;
//}
echo "<br><pre>";
$photo = json_decode($result);

$photos = stripslashes($photo->photo);

$vksave = file_get_contents('https://api.vk.com/method/photos.saveWallPhoto?user_id=2696839&photo=' . $photos . '&server=' . $photo->server . '&hash=' . $photo->hash . '&access_token=' . $token);
echo "<br>";
var_dump($vksave);
echo "<br>";
$post_photo = json_decode($vksave);

$post_wall = file_get_contents('https://api.vk.com/method/wall.post?attachments=' . $post_photo->response[0]->id . '&owner_id=-' . $post_photo->response[0]->owner_id . '&access_token=' . $token);
var_dump($post_wall);