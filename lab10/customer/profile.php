<?php
    include_once($_SERVER["DOCUMENT_ROOT"]."/check_url.php");
    global $roles;
?>
<html lang="en">
    <div class="d-flex flex-column text-white">
        <div class="d-flex flex-row">
            <h1 class="flex-grow-1"><?php echo $user->firstName." ".$user->lastName; ?></h1>
            <h3 class=""><?php echo $roles[$user->role]; ?></h3>
        </div>
        <form class="d-flex flex-row" method="post" action="authorization.php">
            <div class="flex-grow-1"></div>
            <input type="submit" class="w-50 btn-primary form-control form-control-lg text-white border-white" value="Выйти">
        </form>
    </div>
</html>