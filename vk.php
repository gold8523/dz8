<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form enctype="multipart/form-data" action="<?php $vk[0]; ?>" method="post">
    <table>
        <tr>
            <td>Добавьте фотографию:</td>
            <td>
                <input type="hidden" name="MAX_FILE_SIZE" value="3145728" />
                <input type="file" name="photo"/>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="action" value="Загрузить"/>
            </td>
        </tr>
    </table>
</form>

</body>
</html>