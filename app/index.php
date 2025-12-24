<?php
require_once 'connect.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $rating = (int)$_POST['rating'];
    $comment = trim($_POST['comment']);

    if ($name && $rating >= 1 && $rating <= 5) {
        $stmt = $pdo->prepare("INSERT INTO feedback (name, rating, comment) VALUES (?, ?, ?)");
        $stmt->execute([$name, $rating, $comment]);
        $message = "Отзыв успешно добавлен!";
    } else {
        $message = "Ошибка: заполните все поля корректно.";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Обратная связь </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-4">
        <?php if ($message): ?>
            <div class="alert">
                <?= $message ?>
            </div>
        <?php endif; ?>

        <h2 class="mb-4">Обратная связь</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Ваше имя:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="productRating" class="form-label">Оцените (1–5):</label>
                <select class="form-select" id="productRating" name="rating" required>
                    <option value="5">5 - Отлично</option>
                    <option value="4">4 - Хорошо</option>
                    <option value="3">3 - Удовлетворительно</option>
                    <option value="2">2 - Неудовлетворительно</option>
                    <option value="1">1 - Плохо</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="comment" class="form-label">Комментарий:</label>
                <textarea class="form-control" id="comment" name="comment" rows="4" placeholder="Ваши мысли ..."></textarea>
            </div>

            <button type="submit" class="btn btn-success">Отправить отзыв</button>
        </form>
        <br>
        <a href="reviews.php" class="btn btn-outline-primary">Посмотреть все отзывы</a>
    </div>
</body>
</html>