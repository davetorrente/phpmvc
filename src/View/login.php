<?php
    require_once('./../Controller/UserController.php');
    $user->login();
?>
<form method="post">
    <?php if (isset($user->session->message) && !empty($user->session->message)) : ?>
        <span>
            <?php foreach ($user->session->message as $message) : ?>
                <?php echo $message; ?>
            <?php endforeach; ?>
        </span>
    <?php endif; ?>
    <label>Username</label>
    <input type="text" name="username" value="<?= isset($_POST['username']) ? $_POST['username'] : '' ; ?>">
    <label>Password</label>
    <input type="password" name="password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ; ?>">
    <button type="submit" name="login">Submit</button>
</form>