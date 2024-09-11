<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paginated Users</title>
    <style>
        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>

    <h2 style="text-align:center;">Paginated Users</h2>

    <?php if (!empty($users)) : ?>
    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>User Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
            <tr>
                <td><?= $user['userId'] ?></td>
                <td><?= $user['userName'] ?></td>
                <td><?= $user['password'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <div style="text-align:center;">
        <p>Page <?= $current_page ?> of <?= $total_pages ?></p>

        <!-- Pagination Links -->
        <a href="?page=<?= $current_page - 1 ?>" <?= $current_page <= 1 ? 'style="pointer-events: none; color: grey;"' : '' ?>>Previous</a>
        <a href="?page=<?= $current_page + 1 ?>" <?= $current_page >= $total_pages ? 'style="pointer-events: none; color: grey;"' : '' ?>>Next</a>
    </div>

    <?php else : ?>
    <p style="text-align:center;">No users found.</p>
    <?php endif; ?>

</body>
</html>
