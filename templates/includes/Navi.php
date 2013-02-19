<div class="navbar navbar-static-top">
  <div class="navbar-inner">
    <ul class="nav">
      <li <?php if ($_GET['page'] == ''): ?> class="active" <?php endif; ?>>
          <a href=".">Notes</a>
      </li>
      <?php if ($user->admin): ?>
        <li <?php if (isset($_GET['page']) && $_GET['page'] == 'users'): ?> class="active" <?php endif; ?>>
            <a href="?page=users">Users</a>
        </li>
      <?php endif; ?>
    </ul>
  </div>
</div>