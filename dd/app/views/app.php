<?php view('layouts/app.php', true, $this); ?>
    <style>
        .credits:before {
            content: "<?=__('created by')?> danidoble";
        }
    </style>
    <div class="bg-gray-100 min-h-screen">
        <div class="grid place-items-center min-h-screen">
            <?php if (!isset($_SESSION['user'])): ?>
            <div class="absolute right-8 top-6">
                <a href="<?= route('') ?>"
                   class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-blue-300 bg-white text-sm font-medium text-indigo-500 hover:bg-blue-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500"><?= __('Home') ?></a>
                <a href="<?= route('login') ?>"
                   class="relative inline-flex items-center px-2 py-2 border border-blue-300 bg-white text-sm font-medium text-indigo-500 hover:bg-blue-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500"><?= __('Login') ?></a>
                <a href="<?= route('register') ?>"
                   class="-ml-px relative inline-flex items-center px-2 py-2 rounded-r-md border border-blue-300 bg-white text-sm font-medium text-indigo-500 hover:bg-blue-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500"><?= __('Register') ?></a>
            </div>
            <?php else: ?>
                <div class="absolute right-8 top-6">
                    <form method="POST" action="<?= route('logout') ?>">
                        <?= csrf('logout') ?>
                        <a href="<?= route('logout') ?>"
                           class="relative inline-flex items-center px-2 py-2 rounded-md border border-blue-300 bg-white text-sm font-medium text-indigo-500 hover:bg-blue-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500"
                           onclick="event.preventDefault(); this.closest('form').submit();"><?= __('Logout') ?></a>
                    </form>
                </div>
            <?php endif; ?>
            <div class="text-center">
                <h1 class="text-4xl text-gray-600"><?= env('APP_NAME', 'Double Site') ?> <?= __('Default page') ?></h1>
                <h2 class="text-base font-normal text-gray-700">
                    <?= __('Well! you already have the bases. Now it\'s your turn, build something with love') ?>
                </h2>
                <h2 class="text-3xl">&#10084;</h2>

                <?php if (isset($_SESSION['user']['name'])): ?>
                    <h2 class="text-sm text-gray-600">
                        <?= __('Welcome') ?> <?= $_SESSION['user']['name'] . ' ' . $_SESSION['user']['last_name'] ?>
                    </h2>
                <?php endif; ?>
                <div>
                    <?php view('layouts/alerts.php', true, $this); ?>
                </div>

            </div>
        </div>
        <a href="https://github.com/danidoble/site" target="_blank" rel="noopener"
           class="credits text-gray-600 absolute bottom-2 left-2 text-xs"></a>
    </div>
<?php view('layouts/end_app.php'); ?>