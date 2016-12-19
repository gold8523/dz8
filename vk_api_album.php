<?php
$token = '421771ec8254fc088e652ba4aeb56ccfb7abc3b3317bb120954b90f3c6cfc7653c0b4bfe3760bc960c668';

//https://oauth.vk.com/authorize?client_id=5780232&display=page&redirect_uri=http://dz8/vkform.php&scope=friends,photos,wall&response_type=token


if (!empty($_FILES['image']['name'])) {
    if ($_FILES['image']['type'] != "image/gif" && $_FILES['image']['type'] != "image/jpeg"
        && $_FILES['image']['type'] != "image/png"
    ) {
        echo 'Выберете изображение формата jpeg, png или gif.';
    }
}
$image = $_FILES['image'];
$user = $_POST['user_id'];

function get_url($token) {
    $upl = file_get_contents('https://api.vk.com/method/photos.getUploadServer?album_id=239145223&access_token=' . $token . '&v=5.60');
    return $upl;
}

$getUrl = json_decode(get_url($token));
$url = $getUrl->response->upload_url;

$fname = $image['tmp_name'];
$cfile = new CURLFile($fname, 'image/jpg', 'ozero.jpg');
$file = [
    'file1' => $cfile
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
}else {
    curl_close($ch);
    echo "Result: " . $result;
}
$photo = json_decode($result);
$photos = stripslashes($photo->photos_list);

$vksave = file_get_contents('https://api.vk.com/method/photos.save?photos_list=' . $photos . '&server=' . $photo->server .'&aid=' . $photo->aid . '&hash=' . $photo->hash . '&access_token=' . $token);
