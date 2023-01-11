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
    <title>Новый продукт</title>
</head>

<body>
    <header>
        <a id = "back" href = "list.php"> <span>Назад</span> </a>
    </header>

    <div class = "island" id = "create_island">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $text = $_POST['text'];
            $size = $_POST['size'];
            $price = $_POST['price'];
            $img = $_POST['img'];

            $xml = simplexml_load_file("data/products.xml") or die("Error: Cannot create object");

            $task = $xml->addChild('product', '');
            $task->addChild('name', $name);
            $task->addChild('text', $text);
            $task->addChild('size', $size);
            $task->addChild('price', $price);
            $task->addChild('img', $img);
            $nid = $xml->count();
            $task->addAttribute('id', $nid);

            $xml->saveXML('data/products.xml');
            $link = "index.php?id=$nid";
            header('location: '.$link);
        }
        ?>

        <form method="POST" action="create.php">
            <div> <input type = "text" name = "name" required placeholder = "Название"/> </div>
            <div> <input type = "text" name = "text" required placeholder = "Описание"/> </div>
            <div> <input type = "text" name = "size"  placeholder = "Размер"/> </div>
            <div> <input type = "text" name = "price" required placeholder = "Цена"/> </div>
            <div> <input type = "text" name = "img" placeholder = "Ссылка на фото"/> </div>
            <div> <input id = "create_button" type = "submit" value = "Добавить" /> </div>
        </form>
    </div>
</body>

</html>