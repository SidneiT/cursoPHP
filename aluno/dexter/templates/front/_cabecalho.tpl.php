<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Dexter Logística™</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="<?php echo $path?>css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo $path?>css/bootstrap-responsive.css" rel="stylesheet">
        <script src="<?php echo $path?>js/jquery.js"></script>
        <script src="<?php echo $path?>js/bootstrap.js"></script>
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <div class="navbar">
                <div class="navbar-inner">
                    <a class="brand" href="index.php">Dexter Logística™</a>
                    <ul class="nav">
                        <?php foreach($items_menu as $item): ?>
                        <li>
                    		<a href="<?php echo $item->link; ?>"><?php echo $item->descricao; ?></a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            
            <?php echo View\Mensagem::get(); ?>