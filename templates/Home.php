<?php include "includes/Login.php"; ?>

<?php if (!empty($user)): ?>
    <div class="col narrow">
        <a href="." class="categoryEntry <?php if (!isset($_GET['category'])): ?>active<?php endif; ?>">
            All
        </a>

        <?php if (!empty($data['categories'])): ?>
            <?php
                navi($data['categories']);
            ?>
        <?php endif; ?>

        <hr />

        <ul>
            <li class="categoryEntry entry">
                <div class="entryContent">
                    <button class="btn editEntry">Add a category <i class="icon-plus"></i></button>
                </div>
                <form action=".<?php if (!empty($_GET['category'])){
                    echo '?category='.(int)$_GET['category'];
                }?>" method="post" class="entryForm">
                    <input type="text" name="category_name" placeholder="Name" />
                    <input type="submit" value="Save" class="btn" />
                    <input type="reset" value="Cancel" class="btn closeEdit" />
                </form>
            </li>
        </ul>

    </div>

    <div class="col wide">
        <?php if (!empty($data['memos'])): ?>
            <?php foreach($data['memos'] as $memo): ?>
                <div class="well entry">
                    <div class="entryContent">
                        <p><strong><?php echo $memo->name; ?></strong></p>
                        <p><?php echo $memo->content; ?></p>
                        <span class="controls">
                        <button class="btn editEntry"><i class="icon-edit"></i></button>
                        <a href="?delete=<?php echo $memo->id; ?>" class="btn"><i class="icon-trash"></i></a>
                    </div>
                    <form method="post" class="entryForm">
                        <input type="text" name="name" placeholder="Name" value="<?php echo $memo->name; ?>" />
                        <textarea name="content" placeholder="Content" rows="3"><?php echo $memo->content; ?></textarea>
                        <input type="submit" value="Save" class="btn" />
                        <input type="reset" value="Cancel" class="btn closeEdit" />
                    </form>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <div class="well entry">
            <span class="entryContent">
                <button class="btn editEntry">Add a note <i class="icon-plus"></i></button>
            </span>
            <form action=".<?php if (!empty($_GET['category'])){
                    echo '?category='.(int)$_GET['category'];
            }?>" method="post" class="entryForm">
                <input type="text" name="name" placeholder="Name" />
                <textarea name="content" placeholder="Content" rows="3"></textarea>
                <input type="submit" value="Save" class="btn" />
                <input type="reset" value="Cancel" class="btn closeEdit" />
            </form>
        </div>
    </div>
<?php endif; ?>

<?php
function navi($elems, $orig = false){
    if ($orig === false) $orig = $elems;
    global $printed;
    foreach($elems as $cat):
        if (in_array($cat->id, $printed)) continue; ?>
        <ul>
            <li class="categoryEntry entry <?php if (isset($_GET['category']) && $_GET['category'] == $cat->id): ?>active<?php endif; ?>">
                <span class="entryContent">
                    <a href="?category=<?php echo $cat->id; ?>" class="wideLink">
                        <?php echo $cat->name; ?>
                    </a>
                    <span class="controls">
                        <span class="btn editEntry"><i class="icon-edit"></i></span>
                        <a href="?delete_category=<?php echo $cat->id; ?>" class="btn"><i class="icon-trash"></i></a>
                    </span>
                </span>
                <form method="post" class="entryForm">
                    <input type="hidden" name="id" value="<?php echo $cat->id; ?>" />
                    <input type="text" name="category_name" placeholder="Name" value="<?php echo $cat->name; ?>" />
                    <input type="submit" value="Save" class="btn" />
                    <input type="reset" value="Cancel" class="btn closeEdit" />
                </form>
            </li>
            <?php
            navi(getChildren($orig, $cat->id), $orig);
            array_push($printed, $cat->id);
            ?>
        </ul>
    <?php endforeach;
}

function getChildren($elems, $id){
    $children = array();
    foreach($elems as $cat){
        if ($cat->parentId == $id){
            array_push($children, $cat);
        }
    }
    return $children;
}