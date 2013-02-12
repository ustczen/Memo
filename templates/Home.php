<?php include "includes/Login.php"; ?>
<h1>Memo</h1>
<?php if (!empty($data['memos'])): ?>
    <?php foreach($data['memos'] as $memo): ?>
        <div class="well memo">
            <div class="">
                <h3><?php echo $memo->name; ?></h3>
                <p><?php echo $memo->content; ?></p>
                <i class="icon icon-edit"></i>
                <i class="icon icon-trash"></i>
            </div>
            <form method="post" class="newMemo">
                <input type="hidden" name="id" value="<?php echo $memo->id; ?>" />
                <input type="text" name="name" placeholder="Name" value="<?php echo $memo->name; ?>" />
                <textarea name="content" placeholder="Content" rows="3"><?php echo $memo->content; ?></textarea>
                <input type="submit" value="Save" />
                <input type="reset" value="Cancel" />
            </form>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<div class="well memo">
    <h3>Make a new memo:</h3>
    <form method="post" class="newMemo">
        <input type="text" name="name" placeholder="Name" />
        <textarea name="content" placeholder="Content" rows="3"></textarea>
        <input type="submit" value="Save" />
    </form>
</div>