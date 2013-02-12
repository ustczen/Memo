<?php include "includes/Login.php"; ?>
<h1>Memo</h1>
<?php if (!empty($data['memos'])): ?>
    <?php foreach($data['memos'] as $memo): ?>
        <div class="well memo">
            <div class="memoContent">
                <h3><?php echo $memo->name; ?></h3>
                <p><?php echo $memo->content; ?></p>
                <div class="controls">
                    <button class="btn editMemo"><i class="icon icon-edit"></i></button>
                    <button class="btn"><i class="icon icon-trash"></i></button>
                </div>
            </div>
            <form method="post" class="memoForm">
                <input type="hidden" name="id" value="<?php echo $memo->id; ?>" />
                <input type="text" name="name" placeholder="Name" value="<?php echo $memo->name; ?>" />
                <textarea name="content" placeholder="Content" rows="3"><?php echo $memo->content; ?></textarea>
                <input type="submit" value="Save" class="btn" />
                <input type="reset" value="Cancel" class="btn closeEdit" />
            </form>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<div class="well memo">
    <h3>Make a new memo:</h3>
    <form method="post" class="memoForm">
        <input type="text" name="name" placeholder="Name" />
        <textarea name="content" placeholder="Content" rows="3"></textarea>
        <input type="submit" value="Save" />
    </form>
</div>