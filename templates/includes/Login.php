<?php
global $user;
if (empty($user)):?>
    <form method="post">
        <input type="text" name="name" placeholder="Name" />
        <input type="password" name="password" placeholder="Password" />
        <input type="submit" value="Login" />
        <br />
        <a href="?page=register">Or register</a>
    </form>
<?php else: ?>
Hello, <?php echo $user->name; ?>!
<?php endif; ?>