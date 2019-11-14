<?php 
/** Fenom template 'test.tpl' compiled at 2019-11-08 08:08:54 */
return new Fenom\Render($fenom, function ($var, $tpl) {
?><!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        
    <?php
/* test.tpl:5: {$title} */
 echo (isset($var["title"]) ? $var["title"] : null); ?> / <?php
/* test.tpl:5: {parent} */
 ?>Тестовые уроки на bezumkin.ru

    </title>
    
        <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    
</head>
<body>


    <?php
/* _base.tpl:24: {include '_navbar.tpl'} */
 $tpl->getStorage()->getTemplate('_navbar.tpl')->display($var); ?>


<div class="container">
    <div class="row">
        <div class="col-md-10">
            
                <?php
/* _base.tpl:31: {if $longtitle != ''} */
 if((isset($var["longtitle"]) ? $var["longtitle"] : null) != '') { ?>
                    <h3><?php
/* _base.tpl:32: {$longtitle} */
 echo (isset($var["longtitle"]) ? $var["longtitle"] : null); ?></h3>
                <?php
/* _base.tpl:33: {elseif $pagetitle != ''} */
 } elseif((isset($var["pagetitle"]) ? $var["pagetitle"] : null) != '') { ?>
                    <h3><?php
/* _base.tpl:34: {$pagetitle} */
 echo (isset($var["pagetitle"]) ? $var["pagetitle"] : null); ?></h3>
                <?php
/* _base.tpl:35: {/if} */
 } ?>
                <?php
/* _base.tpl:36: {$content} */
 echo (isset($var["content"]) ? $var["content"] : null); ?>
            
        </div>
        <div class="col-md-2">
            
                Сайдбар
            
        </div>
    </div>
</div>
</body>
<footer>
    
        <script src="/assets/js/jquery.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
        <script src="/assets/js/main.js"></script>
    
</footer>
</html><?php
}, array(
	'options' => 2176,
	'provider' => false,
	'name' => 'test.tpl',
	'base_name' => 'test.tpl',
	'time' => 1538131422,
	'depends' => array (
  0 => 
  array (
    '_base.tpl' => 1573172521,
    'test.tpl' => 1538131422,
  ),
),
	'macros' => array(),

        ));
