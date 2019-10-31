<!doctype html>
<html>
<head>
    <title>Home Page</title>
</head>
<body>
    <div>
        <?php
            foreach ($users as $user){
                echo '<br>
                        <a href="http://localhost:8080/users/view/' . $user->id . '">' . $user->username . '</a> - 
                        <a href="http://localhost:8080/users/getUpdate/' . $user->id . '">Edit</a> - 
                        <a href="http://localhost:8080/users/delete/' . $user->id . '">Delete</a>';
            }
        ?>
    </div>
    <form action="http://localhost:8080/users/create" method="POST">
        Username:<br>
        <input type="text" name="username">
        <br>
        First name:<br>
        <input type="text" name="firstname">
        <br>
        Last name:<br>
        <input type="text" name="lastname">
        <br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>