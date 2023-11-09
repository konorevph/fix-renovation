<?php
    require_once("components/header.php");
    require_once("components/interaction-elements.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/main-page.css">
    <?php
        Header::linkCss();
        InteractionElements::linkCss();
    ?>

</head>

<body>
    <?php
        $header = new Header();
        $header->addNavItem("about-as", "О нас", "/#");
        $header->addNavItem("contacts", "Контакты", "/#");
        echo ($header);
    ?>
    <section id="main-screen">
        <div class="main-info">
            <h1>Ремонт квартир <br> в типовых домах</h1>
            <p>Готовый дизайн-проект, работы и материалы<br> за 3 месяца от 610 т.р.</p>
            <?php echo new MainButton("launch-information-btn", "Узнайте о запуске первым"); ?>
            <span>Старт весной 2016</span>

            <?php echo new IconLink("scroll-link", "/#", "Листайте вниз, <br> чтобы ничего не упустить") ?>
        </div>
        <aside>
            <button class="play-btn">
                <?php include('img/icons/play.svg'); ?>
                <p>Смотреть видео</p>
            </button>
        </aside>
    </section>
</body>

</html>