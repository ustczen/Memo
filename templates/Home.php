<?php include "includes/Login.php"; ?>
<h1>Memo</h1>
<?php if (!empty($data['memos'])): ?>
    <?php foreach($data['memos'] as $memo): ?>
        <div class="well memo">
            <h3><?php echo $memo->name; ?></h3>
            <p><?php echo $memo->content; ?></p>
        </div>
    <?php endforeach; ?>
<?php endif; ?>