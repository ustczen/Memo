<?php include "includes/Navi.php"; ?>

<div class="wrapper">
    <?php include "includes/Login.php"; ?>

    <?php if (!empty($user) && !empty($data['users'])): ?>

            <ul>
                <?php foreach($data['users'] as $usr): ?>
                    <li class="categoryEntry entry">
                        <?php echo $usr->name; ?>
                        <span class="controls">
                            <?php if (!$usr->admin): ?>
                                <a href="?page=users&promote_user=<?php echo $usr->id; ?>" class="btn"><i class="icon-star-empty"></i></a>
                            <?php else: ?>
                                <a href="?page=users&demote_user=<?php echo $usr->id; ?>" class="btn"><i class="icon-star"></i></a>
                            <?php endif; ?>
                            <a href="?page=users&delete_user=<?php echo $usr->id; ?>" class="btn"><i class="icon-trash"></i></a>
                        </span>
                    </li>
                <?php endforeach; ?>
            </ul>

    <?php endif; ?>
</div>