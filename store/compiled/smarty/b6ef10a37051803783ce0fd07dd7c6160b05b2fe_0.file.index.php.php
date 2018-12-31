<?php
/* Smarty version 3.1.33, created on 2018-09-23 09:09:34
  from '/var/www/justifyframe.com/views/index.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ba7584ef03033_38550150',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b6ef10a37051803783ce0fd07dd7c6160b05b2fe' => 
    array (
      0 => '/var/www/justifyframe.com/views/index.php',
      1 => 1537693773,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ba7584ef03033_38550150 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Justify framework</title>

    <link rel="stylesheet" href="web/css/main.css">
    <link rel="stylesheet" href=@/web/css/adaptive.css">
    <link rel="stylesheet" href="/web/libs/bootstrap/bootstrap.min.css">
</head>
    <body>
        <div class="wrapper">
            <div class="content">
                <div class="navbar navbar-inverse">
                    <div class="container">
                        <div class="navbar-header">
                            <a href="/" class="navbar-brand">Justify</a>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="container">
                        <div class="starter-template">
                            <h1>Welcome!</h1>
                            <p class="lead">
                                You successful installed
                                <?php echo '<?=';?> $frameworkName <?php echo '?>';?>
                                <?php echo '<?=';?> $frameworkVersion <?php echo '?>';?>!
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h2>Example</h2>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum explicabo id illo inventore
                                    ipsam magni
                                    non nulla omnis quisquam vero? Corporis debitis eius esse ipsam ipsum iusto perferendis
                                    tenetur
                                    voluptatem!
                                </p>
                            </div>
                            <div class="col-md-4">
                                <h2>About</h2>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum explicabo id illo inventore
                                    ipsam magni
                                    non nulla omnis quisquam vero? Corporis debitis eius esse ipsam ipsum iusto perferendis
                                    tenetur
                                    voluptatem!
                                </p>
                            </div>
                            <div class="col-md-4">
                                <h2>Contacts</h2>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum explicabo id illo inventore
                                    ipsam magni
                                    non nulla omnis quisquam vero? Corporis debitis eius esse ipsam ipsum iusto perferendis
                                    tenetur
                                    voluptatem!
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <footer>
                <hr>
                <div class="container">
                    <p>&copy; <?php echo '<?=';?> $frameworkName <?php echo '?>';?> <?php echo '<?=';?> date('Y') <?php echo '?>';?></p>
                </div>
            </footer>
        </div>
    </body>
</html><?php }
}
