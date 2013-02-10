<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Memo</title>
    </head>
    <body>
        <?php include $this->template.".php"; ?>
        
        <?php
        if (isset($data['errors'])):
            foreach($data['errors'] as $error):
        ?>
                <div class="error"><?php echo $error; ?></div>
        <?php
            endforeach;
        endif;
        ?>
        
    </body>
</html>
