<?php view('layouts/app.php', true, $this); ?>
    <style>
        .credits:before {
            content: "<?=__('created by')?> danidoble";
        }
    </style>
    <div class="bg-gray-100 min-h-screen">
        <div class="grid place-items-center min-h-screen">
            <div class="text-center">
                <h1 class="text-4xl text-gray-600"><?= env('APP_NAME', 'Double Site') ?> <?= __('Default page') ?></h1>
                <h2 class="text-base font-normal text-gray-700">
                    <?= __('Well! you already have the bases. Now it\'s your turn, build something with love') ?>
                </h2>
                <h2 class="text-3xl">&#10084;</h2>
            </div>
        </div>
        <a href="https://github.com/danidoble/site" target="_blank" rel="noopener" class="credits text-gray-600 absolute bottom-2 left-2 text-xs"></a>
    </div>
<?php view('layouts/end_app.php'); ?>