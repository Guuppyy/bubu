<?php
$servername = "localhost";
$username = "root"; // Замените на ваше имя пользователя
$password = "1234"; // Замените на ваш пароль
$dbname = "my_database";

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Получаем данные книги
$sql = "SELECT title, image FROM books WHERE id = 1"; // Замените на нужный ID
$result = $conn->query($sql);
$book = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title><?php echo htmlspecialchars($book['title'], ENT_QUOTES); ?></title>
</head>
<body>
<h1><?php echo htmlspecialchars($book['title'], ENT_QUOTES); ?></h1>
<div class="book">
    <img src="../images/<?php echo htmlspecialchars($book['image'], ENT_QUOTES); ?>"
         alt="<?php echo htmlspecialchars($book['title'], ENT_QUOTES); ?>"
         width="200" height="150">
</div>
<script src="../js/script.js"></script>
</body>
</html>