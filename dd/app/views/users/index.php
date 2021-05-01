<?php
view('layouts/app.php', true, $this);
foreach ($this->sharedData()->users as $user): ?>
    <div style="width: 100vw;padding: 10px;margin: 10px; background-color: ghostwhite">
        <?= $user ?>
    </div>
<?php endforeach;
view('layouts/end_app.php');