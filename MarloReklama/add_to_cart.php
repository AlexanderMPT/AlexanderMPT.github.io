<!DOCTYPE html>
<html>

<head>
    <title>Видео как фон</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <div class="wrapper">
        <?php
        session_start(); // Инициализация сессии

        // Проверяем, если массив "cart" не существует в сессии, создаем его
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        // Подключение к базе данных - замените данными вашего сервера
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "marlodatabase";

        // Создание соединения
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['add_to_cart'])) {
                $service = isset($_POST['service']) ? $_POST['service'] : '';
                $image = isset($_POST['image']) ? $_POST['image'] : '';

                // Добавляем выбранную услугу в массив "cart" в сессии
                $_SESSION['cart'][] = array(
                    'service' => $service,
                    'image' => $image
                );

                // Добавление товара в таблицу "products" в базе данных
                $stmt = $conn->prepare("INSERT INTO products (name_product, img_photo) VALUES (?, ?)");
                $stmt->bind_param("ss", $service, $image);

                if ($stmt->execute()) {
                    // echo "New record created successfully";
                } else {
                    echo "Error: " . $stmt->error;
                }
            }
        }


        foreach ($_SESSION['cart'] as $item) {
            echo "<div class='cart__wrap'>";
            if (isset($item['image']) && isset($item['service'])) {
                echo "<p class='cart__name'><img src='" . $item['image'] . "' alt='" . $item['service'] . "' width='50px'> " . $item['service'] . "</p>";
            }
            echo "</div>";
        }

        // Закрываем соединение с базой данных
        $conn->close();
        ?>
    </div>


</body>