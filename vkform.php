<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VK post</title>
</head>
<body>
<form action="vk_api_wall.php" method="post" enctype="multipart/form-data" >
    <table>
        <tr>

                <td>
                    <label>Выбирете изображение:
                    <input type="file" name="image">
                    </label>
                </td>
        </tr>
        <tr>
            <td>
                <label>Введите id пользователя vk
                    <input type="text" name="user_id">
                </label>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Загрузить">
            </td>
        </tr>
    </table>
</form>
</body>
</html>
