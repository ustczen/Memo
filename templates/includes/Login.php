<?php if (empty($user)):?>
    <form method="post" class="userForm">
        <h1>Memo</h1>
        <input type="text" name="name" placeholder="Name" />
        <input type="password" name="password" placeholder="Password" />
        <input type="submit" value="Login" class="btn" />
        <br />
        <a href="?page=register">Register</a>
        <?php if (isset($_POST['name']) || isset($_POST['password'])): ?>
            <div class="error"><strong>Login failed!</strong> Incorrect username or password.</div>
        <?php endif; ?>
    </form>
<?php else: ?>
<form method="post" class="logout" />
    Hello, <?php echo $user->name; ?>!
    <input type="hidden" name="name" value="" />
    <input type="hidden" name="password" value="" />
    <input type="submit" value="Logout" class="btn" />
</form>
<?php endif; ?>