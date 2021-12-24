<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../resources/css/app.css">
    <title>Document</title>
</head>
<body>
    <div class="content-section">
        <div class="content-wrap">
            <div class="like-logo">
                Вы уверены, что хотите изменить статус пропуска на "Готов"?
            </div>
            <div class="status-confirm">
                <form method="post">
                    @csrf
                    <input type="hidden" value="yes" name="answer">
                    <input type="submit" value="ДА">
                </form>
                <form method="post">
                    @csrf
                    <input type="hidden" value="no" name="answer">
                    <input type="submit" value="НЕТ">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
