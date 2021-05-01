<?php view('layouts/app.php', true, $this); ?>

    <div style="width: 100vw;padding: 10px;margin: 10px; background-color: ghostwhite">
        <?= $this->sharedData()->user ?>
    </div>

<?php view('layouts/end_app.php'); ?>