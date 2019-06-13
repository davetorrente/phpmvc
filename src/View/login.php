<?php
    require_once('./../Controller/UserController.php');
    $user->login();
?>
<form method="post">
    <label>Username</label>
    <input type="text" name="username">
    <label>Password</label>
    <input type="password" name="password">
    <button type="submit" name="login">Submit</button>
</form>