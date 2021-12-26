<?php
    include_once($_SERVER["DOCUMENT_ROOT"]."/check_url.php");
    if (!isset($user)) {
        include_once($_SERVER['DOCUMENT_ROOT']."/authenfication.php");
    }
    include_once($_SERVER["DOCUMENT_ROOT"]."/managers/order_manager.php");
    include_once($_SERVER["DOCUMENT_ROOT"]."/managers/product_manager.php");
    include_once($_SERVER["DOCUMENT_ROOT"]."/managers/shop_manager.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Магазин</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="style/main.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php
    $folder = $user->role;
    ?>
    <div class="p-4 d-flex flex-row" >
        <div class="block bg-dark me-4" style="width: 60%;">
            <?php include_once($folder."/content.php"); ?>
        </div>
        <div class="" style="width: 40%;">
            <div class="block bg-dark mb-4 p-3 ">
                <?php include_once($folder."/profile.php"); ?>
            </div>
            <div class="block bg-dark p-3">
                <?php include_once($folder."/under_profile.php"); ?>
            </div>
        </div>
    </div>
</body>
</html>