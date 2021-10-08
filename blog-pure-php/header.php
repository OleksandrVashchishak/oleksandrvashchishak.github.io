<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=yes" name="viewport">
    <title>The Golden Offer</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <?php include_once "./templates/functions.php"; ?>
</head>

<body>
    <div id="outer-wrapper">
        <header id="header-wrapper">
            <div class="main-header">
                <div class="header-inner show">
                    <div class="header-header flex-c">
                        <div class="container row-x1">
                            <div class="header-items">
                                <div class="flex-left">
                                    <span class="mobile-menu-toggle" href="#"></span>
                                    <div class="main-logo section">
                                        <div class="widget Image">
                                            <a class="logo-img" href="/?lang=<?php echo $domainLocale; ?>">
                                                <img alt="Magspot Simple" src="img/logo.svg">
                                                <span>The golden offer</span>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                                <div class="magspot-main-menu section">
                                    <div class="widget PageList show-menu">
                                        <ul class="main-nav" id="main-nav">
                                            <li class="has-sub">
                                                <a href="#"> <img src="img/country/<?php echo $domainLocale; ?>-flag.svg" alt="<?php echo $domainLocale; ?>"></a>
                                                <ul class="sub-menu sm-1">
                                                    <li><a href="<?php echo $linkUrl ?>/?lang=es"> <img src="img/country/es-flag.svg" alt="es"></a> </li>
                                                    <li><a href="<?php echo $linkUrl ?>/?lang=it"> <img src="img/country/it-flag.svg" alt="it"></a> </li>
                                                    <li><a href="<?php echo $linkUrl ?>/?lang=de"> <img src="img/country/de-flag.svg" alt="de"></a> </li>
                                                    <li><a href="<?php echo $linkUrl ?>/?lang=uk"> <img src="img/country/uk-flag.svg" alt="uk"></a> </li>
                                                    <li><a href="<?php echo $linkUrl ?>/?lang=fr"> <img src="img/country/fr-flag.svg" alt="fr"></a> </li>
                                                </ul>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>