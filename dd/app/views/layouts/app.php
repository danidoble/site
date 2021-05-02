<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= isset($_th->sharedData()->title) ? $_th->sharedData()->title : '' ?>
        | <?= env('APP_NAME', 'Double Site') ?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="<?= mix('/css/app.css') ?>">
</head>
<body>

