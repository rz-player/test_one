<?php 
/** Fenom template 'home.tpl' compiled at 2019-11-08 03:22:05 */
return new Fenom\Render($fenom, function ($var, $tpl) {
?><!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Тестовые уроки на bezumkin.ru
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
            
    <div class="jumbotron">
        <?php
/* home.tpl:7: {parent} */
 ?>
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
	'name' => 'home.tpl',
	'base_name' => 'home.tpl',
	'time' => 1538129680,
	'depends' => array (
  0 => 
  array (
    '_base.tpl' => 1573172521,
    'home.tpl' => 1538129680,
  ),
),
	'macros' => array(),

        ));
