<div class="userForm">
    <h2>Register</h2>
    <?php if (!$data['registered']): ?>
        <p>
            Fill in your user-name and password to register as a user.
        </p>
        <form method="post">
            <input type="text" name="name" placeholder="Name" />
            <input type="password" name="password" placeholder="Password" />
            <input type="submit" value="Register" class="btn" />
            <br />
            <a href=".">Login here if you already have registered</a>
        </form>
    <?php else: ?>
        <div class="alert alert-success">A new user has been created!</div>
    <?php endif; ?>
</div>