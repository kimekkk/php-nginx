<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Отзывы пользователей</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-4">
        <h2 class="mb-4">Отзывы пользователей</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Имя</th>
                    <th>Оценка</th>
                    <th>Комментарий</th>
                    <th>Дата</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once 'connect.php';
                $stmt = $pdo->query("SELECT * FROM feedback ORDER BY created_at DESC");
        
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $date = new DateTime($row['created_at']);
                    $formattedDate = $date->format('d.m.Y H:i');
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['rating']) ?></td>
                        <td><?= htmlspecialchars($row['comment']) ?></td>
                        <td><?= htmlspecialchars($formattedDate) ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="index.php" class="btn btn-outline-secondary">Добавить отзыв</a>
    </div>
</body>
</html>