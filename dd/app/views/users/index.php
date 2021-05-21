<?php view('layouts/app.php', true, $this); ?>
<div class="bg-gray-50 min-h-screen w-full">
    <div class="relative bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="flex justify-between items-center border-b-2 border-gray-100 py-6 md:justify-start md:space-x-10">
                <div class="flex justify-start lg:w-0 lg:flex-1">
                    <a href="#">
                        <span class="sr-only">danidoble</span>
                        <img class="h-8 w-auto sm:h-10" src="<?= BASE_URL ?>/public/img/app/dd.jpg" alt="danidoble">
                    </a>
                </div>
                <nav class="flex space-x-10">
                    <a href="#" class="text-xl font-medium text-gray-500 hover:text-gray-900">
                        <?=__('User List')?>
                    </a>
                </nav>
            </div>
        </div>
    </div>

    <div class="mx-auto max-w-7xl">
        <ul class="divide-y divide-gray-200">
            <?php foreach ($this->sharedData()->users as $user): ?>
                <li class="py-4 px-3 flex bg-gray-200 my-2 rounded-md">
                    <img class="h-10 w-10 rounded-full"
                         src="<?=($user->profile_photo_path !== null ? $user->profile_photo_path : str_replace('{{user_name}}',urlencode($user->name . ' ' . $user->last_name),env('APP_API_IMAGE')))?>"
                         alt="<?=$user->name . ' ' . $user->last_name?>">
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-900"><?= mb_convert_case($user->name . ' ' . $user->last_name,MB_CASE_TITLE,'UTF-8') ?></p>
                        <p class="text-sm text-gray-500"><?=$user->email?></p>
                        <p class="text-xs text-gray-500"><?=__('Created at')?> <?=diffForHumans($user->created_at)?></p>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<?php view('layouts/end_app.php');