<?php if (!$data['registered']): ?>
    <form method="post">
        <input type="text" name="name" placeholder="Name" />
        <input type="password" name="password" placeholder="Password" />
        <input type="submit" value="Register" />
    </form>
<?php else: ?>
    <h2>Thank you for registering!</h2>
<?php endif; ?>
