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
<div class="alert alert-danger w-100" onclick="this.classList.add('hidden');"><?= $message ?></div>
<br clear=all />