<html>

<head>
    <title>Display Grid Through Code Igniter</title>
</head>

<body>
    Records Found: <?php echo $numOfRows[0]['count']; ?>
    <br><br>
    <table border=1>
        <tr>
            <td>S.No </td>
            <td>User Name</td>
            <td>Password</td>
        </tr>
        <?php foreach ($contents as $users) { ?>
            <tr>
                <td><?php echo $users['userId']; ?>
                <td><?php echo $users['userName']; ?></td>
                <td><?php echo $users['password']; ?></td>
            </tr>
        <?php } ?>
    </table>
    <?php if (strlen($pagination)) { ?>
        Pages: <?php echo $pagination;
            } ?>
</body>

</html>