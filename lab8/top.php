<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="fixed-top">
        <div class="container-fluid">
            <div class="row top-bar">
                <div class="col-12">
                    <a href="#" class="text-white">
                        <span class="mr-2 text-white icon-envelope-open-o"></span>
                        <span class="d-none d-md-inline-block"><?php echo $contact_email; ?></span>
                    </a>

                    <span class="mx-md-2 d-inline-block"></span>

                    <a href="#" class="text-white">
                        <span class="mr-2 text-white icon-phone"></span>
                        <span class="d-none d-md-inline-block"><?php echo $contact_number; ?></span>
                    </a>

                    <div class="float-right">
                        <a href="#" class="text-white">
                            <span class="mr-2 text-white icon-vk"></span> 
                        </a>
                        <span class="mx-md-2 d-inline-block"></span>
                        <a href="#" class="text-white">
                            <span class="mr-2 text-white icon-odnoklassniki"></span>
                        </a>
                    </div>
                </div>
            </div>

            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="#"><img src="img/logo.png" width="60"><?php echo $site_name; ?></a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        
                        <?php
                            foreach ($nav_items as $title => $href) {
                                if ($cur_page == $title) {
                                    echo "<li class=\"nav-item\"><a class=\"nav-link active\" href=\"$href\">$title</a></li>";
                                } else {
                                    echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"$href\">$title</a></li>";
                                }
                            }
                        ?>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</body>
</html>