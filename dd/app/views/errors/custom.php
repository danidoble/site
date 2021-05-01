<!doctype html>
<html lang="<?= env('APP_LANG', 'en') ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 <?= __('Not Found') ?></title>
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

        .text-center {
            text-align: center;
        }

        .credits {
            position: absolute;
            bottom: 5px;
            left: 5px;
            font-size: 0.7rem;
        }

        .credits:before {
            content: "<?=__('created by')?> danidoble";
        }

        .text-base {
            font-size: 1rem;
        }

        .font-normal {
            font-weight: normal;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>
<body class="bg-gray-100">
<div class="min-h-100vh">
    <div class="grid place-center min-h-100vh">
        <div class="text-center">
            <h1 class="text-xl text-gray-600">Error</h1>
            <h2 class="text-base font-normal">
                <?= $err->msg ?>
            </h2>
            <h2 class="text-base font-normal"><?=__('Error code')?>. <?= $err->code ?></h2>
            <h2 class="text-base font-normal">
                <?= $err->details ?>
            </h2>
            <br>
            <h2 class="text-base font-normal">
                <?= $err->note ?>
            </h2>
        </div>
    </div>
</div>
</body>
</html>