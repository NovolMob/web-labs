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
        <form class="my-3 d-flex flex-row" method="post">
            <label for="name"> Название магазина:</label>
            <input class="bg-dark text-white form-control form-control-lg mx-3" type="text" name="shopName" value="<?php echo $user->shopName; ?>" required>
            <input class="w-25 form-control form-control-lg border-white btn-primary" type="submit" name="method" value="Сохранить">
        </form>
        <form class="d-flex flex-row" method="post" action="authorization.php">
            <div class="flex-grow-1"></div>
            <input type="submit" class="w-50 btn-primary form-control form-control-lg text-white border-white" value="Выйти">
        </form>
    </div>
</html>