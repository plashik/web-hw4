<?php
    $xml = simplexml_load_file("data/products.xml") or die("Error: Cannot create object");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css\style.css">
    <title>Авторские букеты</title>
</head>
<body>
    <header class="header">
        
        <div class="menu__btn">Меню</div>
        <div class="header__item">Каталог</div>
        <div class="header__item">Доставка и оплата</div>
        <div class="header__item">Отзывы</div>
        <div class="header__item">Спецпредложения</div>
        <div class="header__item">Контакты</div>
        <div class="header__item">Корзина</div>
    </header>

    <section class="intro">
        <div class="intro__item">
            <div>
                <h2 class="intro__header">Авторские букеты <br><i>в Петербурге</i></h2>
                <p class="intro__text">Оригинальные свежие букеты <br>с доставкой по всему городу</p>
            </div>
            <div class="intro__btn">
                <div class="btn">Смотреть каталог</div>
            </div>
        </div>
        <div class="intro__item">
            <img src="img\main.svg">        
        </div>
    </section>

    <section class="icons">
        <div class="icon__item">
            <img class="svg__icon" src="img\truck_icon.svg">
            <div class="icon__item__desc">
                <h5 class="icon__item__desc__title">Быстрая доставка</h5>
                <p class="icon__item__desc__text">Можем собрать букет и передать его в доставку всего за час.</p>
            </div>
        </div>
        <div class="icon__item">
            <img class="svg__icon" src="img\bouquet.svg">
            <div class="icon__item__desc">
                <h5 class="icon__item__desc__title">Всегда свежие цветы</h5>
                <p class="icon__item__desc__text">Тщательно следим за состоянием цветов, а опытные флористы отбирают для букетов каждый цветок.</p>
            </div>
        </div>
        <div class="icon__item">
            <img class="svg__icon" src="img\camera.svg">
            <div class="icon__item__desc">
                <h5 class="icon__item__desc__title">Отправляем фото цветов</h5>
                <p class="icon__item__desc__text">Перед доставкой сделаем фотографию букета и отправим вам.</p>
            </div>
        </div>
    </section>

    <section class="popular__section">
        <h3 class="popular__name">Популярные букеты</h3>
        <?php
        foreach ($xml->product as $product) 
        {
        ?>
            
            <div class = "popular__item" id = "item_id">
                <div class="popular__description">
                    <p class="popular__text"><?= $product->name ?></p>
                    <p class="icon__item__desc__text"><?= $product->text ?></p>
                    <p class="icon__item__desc__text"><?= $product->size ?></p>
                    <p class="popular__text"><?= $product->price ?></p>
                    <div class="popular__btn">
                    <a class = "btn" href="index.php?id=<?= $product['id']?>">Подробнее</a>
                    </div>
                </div>
                <img class="popular__image" src="<?= $product->img ?>">

            </div>
        <?php
        }
        ?>
        <a class = "btn" href="create.php">Добавить новый продукт</a>
    </section>

    <section class="discount__section">
        <div class="discount__desc">
            <h3 class="discount__header">Скидка 10%<br>на первый заказ</h3>
            <p class="discount__text">Если заказываете у нас букет впервые — при оформлении заказа введите промокод «Botanika2021» и получите скидку 10%.</p>
        </div>
        <img class="discount__image" src="img/discount.svg">
    </section>

    <section class="reviews__section">
        <h3 class="review__header">Отзывы</h3>
        <div class="reviews">
            <div class="review">
                <p class="review_text">Всё очень понравилось! Быстрое оформление заказа, выбор удобного времени доставки. Всем большое спасибо!</p>
                <p class="review_name">Марина</p>
            </div>
            <div class="review">
                <p class="review_text">Внимательные флористы, вежливые. Магазин находится прям рядом с метро. Букет очень понравился, буду ещё заказывать!</p>
                <p class="review_name">Татьяна</p>
            </div>
            <div class="review">
                <p class="review_text">Выбор букетов на любой вкус и цену. Бывают хорошие скидки, а флористы всегда помогут и точно соберут красивый букет!</p>
                <p class="review_name">Ольга</p>
            </div>
        </div>
    </section>
    <footer class="footer">
        <div class="footer__flex">
            <div class="footer__item">Каталог</div>
            <div class="footer__item">Доставка и оплата</div>
            <div class="footer__item">Отзывы</div>
            <div class="footer__item">Спецпредложения</div>
            <div class="footer__item">Контакты</div>
        </div>
    </footer>
</body>
</html>