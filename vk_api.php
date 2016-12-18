<?php
//echo  1;
$token = 'c21989fb788405d092a0a558d578176577e3bf921d110680382be6c92af016b583fb04bee2c35685c7af0';

//https://oauth.vk.com/authorize?client_id=5780232&display=page&redirect_uri=http://dz8/vk_api.php&scope=friends,photos,wall&response_type=token&v=5.60

$upl = file_get_contents('https://api.vk.com/method/photos.getUploadServer?album_id=239145223&access_token=' . $token . '&v=5.60');
$upl = json_decode($upl);
$url = $upl->response->upload_url;


$fname = dirname(__FILE__) . '/photos1/more.jpg';
$cfile = new CURLFile($fname, 'image/jpg', 'more.jpg');
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
echo "<br><pre>";
$photo = json_decode($result);

foreach ($photo as $item) {
    $phot [] = $item;
}
print_r($phot);
$photos = stripcslashes($phot[1]);

$vksave = file_get_contents('https://api.vk.com/method/photos.saveWallPhoto?photo=' . $photos . '&server=' . $photo->server . '&hash=' . $photo->hash . '&access_token=' . $token);

print_r($vksave);