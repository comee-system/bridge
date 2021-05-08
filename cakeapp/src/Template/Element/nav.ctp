<nav>
    <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
        <?php
            $active1 = $active2 = "";
            if($this->request->getParam('action') === "room" ) $active1 = "active";
            if($this->request->getParam('action') === "staff" ) $active2 = "active";
        ?>
        <a class="nav-link <?= $active1 ?>" data-bs-toggle="tab" href="/mypage/room/1" role="tab" aria-controls="nav-home" aria-selected="true">管理者</a>
        <!--
        <a class="nav-link <?= $active2 ?>" data-bs-toggle="tab" href="/mypage/room/staff/1" role="tab" aria-controls="nav-profile" aria-selected="false">担当者</a>
        -->
    </div>
</nav>
