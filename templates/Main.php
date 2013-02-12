<?php 
global $user;
?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Memo</title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet" />
    </head>
    <body>
        <?php include $this->template.".php"; ?>
        
        <?php
        if (isset($data['errors'])):
            foreach($data['errors'] as $error):
        ?>
                <div class="alert alert-error"><?php echo $error; ?></div>
        <?php
            endforeach;
        endif;
        ?>
        <script src="js/jquery.js"></script>
        <script src="js/app.js"></script>
    </body>
</html>
