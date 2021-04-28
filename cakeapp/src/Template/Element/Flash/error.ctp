<?php

/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = nl2br($message);
}

?>
<div class="row">
    <div class="alert alert-danger ml-4" onclick="this.classList.add('hidden');"><?= $message ?></div>
</div>
<br clear=all />