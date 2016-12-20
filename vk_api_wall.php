<?php

$token = 'c27cf017c68d3dbb548716991d9a561b1ec84f6c420d1972c78b426ca49ba1dd0c27a48e8877fb13262bc';
//https://oauth.vk.com/authorize?client_id=5780232&display=page&redirect_uri=http://oauth.vk.com/blank.html&scope=friends,photos,wall&response_type=token

if (!empty($_FILES['image']['name'])) {
    if ($_FILES['image']['type'] != "image/gif" && $_FILES['image']['type'] != "image/jpeg"
        && $_FILES['image']['type'] != "image/png"
    ) {
        echo 'Выберете изображение формата jpeg, png или gif.';
    }
}
$image = $_FILES['image'];
$user = $_POST['user_id'];
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

//if ($result === FALSE) {
//    echo "Error sending " . $fname .  " " . curl_error($ch);
//    curl_close ($ch);
//}else{
//    curl_close ($ch);
//    echo  "Result: " . $result;
//}

$photo = json_decode($result);

$photos = stripslashes($photo->photo);

$vksave = file_get_contents('https://api.vk.com/method/photos.saveWallPhoto?photo=' . $photos . '&server=' . $photo->server . '&hash=' . $photo->hash . '&access_token=' . $token);

$post_photo = json_decode($vksave);

$post_wall = file_get_contents('https://api.vk.com/method/wall.post?owner_id=' . $user . '&access_token=' . $token . '&attachments=' . $post_photo->response[0]->id);
$post_wall = json_decode($post_wall);

if ($post_wall->response->post_id > 0) {
    echo "Изображение ушпешно опубликовано: id поста " . $post_wall->response->post_id;
} else {
    echo 'Ошибка укажите id пользователя';
}