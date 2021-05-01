<!doctype html>
<html lang="<?= env('APP_LANG', 'en') ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>500 <?= __('Server error') ?></title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: 'Nunito', sans-serif;
        }

        .bg-gray-100 {
            background-color: #F3F4F6;
        }

        .grid {
            display: grid;
        }

        .place-center {
            place-items: center;
        }

        .min-h-100vh {
            min-height: 100vh;
        }

        .text-xl {
            font-size: 2rem;
        }

        .text-gray-600 {
            color: #4B5563;
        }
    </style>
</head>
<body class="bg-gray-100">
<div class="grid place-center min-h-100vh text-xl text-gray-600">
    500 | <?= __('Server error') ?>
</div>
</body>
</html>