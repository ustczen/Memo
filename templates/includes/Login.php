<?php
global $user;
if (empty($user)):?>
    <form method="post">
        <input type="text" name="name" placeholder="Name" />
        <input type="password" name="password" placeholder="Password" />
        <input type="submit" value="Login" class="btn" />
        <br />
        <a href="?page=register">Register</a>
    </form>
<?php else: ?>
Hello, <?php echo $user->name; ?>!
<form method="post" />
    <input type="hidden" name="name" value="" />
    <input type="hidden" name="password" value="" />
    <input type="submit" value="Logout" class="btn" />
</form>
<?php endif; ?>