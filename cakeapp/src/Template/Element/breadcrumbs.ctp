<?php if(isset($crumbs) && $crumbs): ?>
<nav aria-label="breadcrumb">

    <?= $this->Html->getCrumbList([
        "class" => "breadcrumb",
        "lastClass" => "breadcrumb-item",
        "separator" => ">"
        ]
        , "Bridge"
        ); ?>
</nav>
<?php endif; ?>
