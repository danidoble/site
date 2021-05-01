<?php view('layouts/app.php', true, $this); ?>
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
    <div class="bg-gray-100 min-h-100vh">
        <div class="grid place-center min-h-100vh">
            <div class="text-center">
                <h1 class="text-xl text-gray-600"><?= env('APP_NAME', 'Double Site') ?> <?= __('Default page') ?></h1>
                <h2 class="text-base font-normal">
                    <?= __('Well! you already have the bases. Now it\'s your turn, build something with love') ?>
                </h2>
                <h2 class="text-xl">&#10084;</h2>
            </div>
        </div>
        <a href="https://github.com/danidoble/site" target="_blank" rel="noopener" class="credits text-gray-600"></a>
    </div>
<?php view('layouts/end_app.php'); ?>