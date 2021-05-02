<?php view('layouts/app.php', true, $this); ?>

    <div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <?php if (!isset($_SESSION['user'])): ?>
            <div class="absolute right-8 top-6">
                <a href="<?= route('') ?>"
                   class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-blue-300 bg-white text-sm font-medium text-indigo-500 hover:bg-blue-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500"><?= __('Home') ?></a>
                <a href="<?= route('login') ?>"
                   class="relative inline-flex items-center px-2 py-2 border border-blue-300 bg-white text-sm font-medium text-indigo-500 hover:bg-blue-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500"><?= __('Login') ?></a>
                <a href="<?= route('register') ?>"
                   class="-ml-px relative inline-flex items-center px-2 py-2 rounded-r-md border border-blue-300 bg-white text-sm font-medium text-indigo-500 hover:bg-blue-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500"><?= __('Register') ?></a>
            </div>
        <?php endif; ?>
        <div class="max-w-md w-full space-y-8 bg-white p-6 rounded-md shadow-md">
            <div>
                <img class="mx-auto h-28 w-auto" src="<?= BASE_URL ?>/public/img/app/dd.jpg"
                     alt="Workflow">
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    <?= __('Register') ?>
                </h2>
            </div>
            <div>
                <?php view('layouts/alerts.php', true, $this); ?>
            </div>
            <form class="space-y-6" action="<?= route('register') ?>" method="POST">
                <?= csrf('register') ?>

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">
                        <?= __('Name') ?>
                    </label>
                    <div class="mt-1">
                        <input id="name" name="name" type="text" autocomplete="name" required
                               class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>
                <div>
                    <label for="last_name" class="block text-sm font-medium text-gray-700">
                        <?= __('Last name') ?>
                    </label>
                    <div class="mt-1">
                        <input id="last_name" name="last_name" type="text" autocomplete="name"
                               class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        <?= __('Email address') ?>
                    </label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" autocomplete="email" required
                               class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        <?= __('Password') ?>
                    </label>
                    <div class="mt-1">
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                               class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>


                <div>
                    <button type="submit"
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <?= __('Sign in') ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
<?php view('layouts/end_app.php'); ?>