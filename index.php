<?php
    require_once("components/header.php");
    require_once("components/interaction-elements.php");
    require_once("components/slider.php");
    require_once("components/form.php");
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
        ImgSlider_1::linkCss();
        MainForm::linkCss();
    ?>

</head>

<body>
    <?php
        $header = new Header();
        $header->addNavItem("about-as", "О нас", "/#", "");
        $header->addNavItem("contacts", "Контакты", "/#", "/img/icons/contacts.svg");
        echo ($header);
    ?>
    <section id="main-screen">
        <h1>Ремонт квартир <br> в типовых домах</h1>
        <h4>Готовый дизайн-проект, работы и материалы<br> за 3 месяца от 610 т.р.</h4>
        <?php echo new MainButton("launch-information-btn", "Узнайте о запуске первым"); ?>
        <p>Старт весной 2016</p>
        <?php echo new IconLink("scroll-link", "/#extra-info-contaier", "Листайте вниз, <br> чтобы ничего не упустить", "/img/icons/down-arrows.svg") ?>

        <aside>
            <button class="play-btn">
                <?php include('img/icons/play.svg'); ?>
                <p>Смотреть видео</p>
            </button>
        </aside>
    </section>

    <ul id="extra-info-contaier">
        <?php echo new textPairBlock("FIX Ремонт — это легко", "Готовые проекты, проверенные материалы и умелые руки", 0, "li") ?>
        <?php echo new textPairBlock("Опытная команда", "Команда проектировщиков и строителей со стажем<br>работы более 6 лет", 1, "li") ?>
        <?php echo new textPairBlock("Типовые дизайн-проекты", "Три стиля чистовой отделки «под ключ» и спектр<br>дополнительных услуг", 1, "li") ?>
        <?php echo new textPairBlock("Фиксированная смета", "Никаких дополнительных расходов во время ремонта.<br>Расчет стоимости при заключении договора", 1, "li") ?>
        <?php echo new textPairBlock("Срок работ", "3 месяца", 2, "li") ?>
    </ul>

    <?php  
        $slider = new ImgSlider_1();
        $slider->addHeader("3 стиля интерьера", "Скандинавский, классический и эко-стиль");
        $slider->addItem("", "/img/interiors/slider_1.jpg", "/img/interiors/slider_1@2x.jpg", "/img/interiors/slider_1@3x.jpg", "Кафельная плитка<br>в ванной комнате<br>в скандинавском стиле");
        $slider->addItem("", "/img/interiors/slider_2.jpg", "/img/interiors/slider_2@2x.jpg", "/img/interiors/slider_2@3x.jpg", "some text");
        $slider->addItem("", "/img/interiors/slider_3.jpg", "/img/interiors/slider_3@2x.jpg", "/img/interiors/slider_3@3x.jpg", "some text");
        echo $slider;
    ?>

    <section id="form-container">
        <?php
            $form = new MainForm("POST", "", "Узнайте о запуске сервиса первым");
            $form->addInput("name", "Имя и фамилия*", "text", true);
            $form->addInput("mail", "E-mail адрес*", "text", true);
            $form->addInput("tel", "Телефон", "text", false);
            $form->setBtnText("Подписаться");
            $form->setSignature("* Обязательные для заполнения поля", "/#", "Политика конфиденциальности");
            echo $form;
        ?>
    </section>
</body>
<?php ImgSlider_1::linkJs(); ?>
</html>