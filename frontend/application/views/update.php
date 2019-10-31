<!doctype html>
<html>
<head>
    <title>Home Page</title>
</head>
<body>
    <form action="http://localhost:8080/users/update" method="POST">
        Username:<br>
        <input type="text" name="username">
        <br>
        First name:<br>
        <input type="text" name="firstname">
        <br>
        Last name:<br>
        <input type="text" name="lastname">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>