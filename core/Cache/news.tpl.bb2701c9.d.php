<?php 
/** Fenom template 'news.tpl' compiled at 2019-11-08 03:22:05 */
return new Fenom\Render($fenom, function ($var, $tpl) {
?><!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        
    <?php
/* news.tpl:3: {$title} */
 echo (isset($var["title"]) ? $var["title"] : null); ?> / <?php
/* news.tpl:3: {parent} */
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
/* news.tpl:6: {if $items} */
 if((isset($var["items"]) ? $var["items"] : null)) { ?>
        <div id="news-wrapper">
            <div id="news-items">
                <?php
/* news.tpl:9: {insert '_news.tpl'} */
 ?><?php $t8776a0a0_1 = (isset($var["items"]) ? $var["items"] : null); if(is_array($t8776a0a0_1) && count($t8776a0a0_1) || ($t8776a0a0_1 instanceof \Traversable)) {
  foreach($t8776a0a0_1 as $var["item"]) { ?>
    <div class="news">
        <h3><a href="/news/<?php
/* _news.tpl:3: {$item.alias} */
 echo (isset($var["item"]["alias"]) ? $var["item"]["alias"] : null); ?>"><?php
/* _news.tpl:3: {$item.pagetitle} */
 echo (isset($var["item"]["pagetitle"]) ? $var["item"]["pagetitle"] : null); ?></a></h3>
        <p><?php
/* _news.tpl:4: {$item.text} */
 echo (isset($var["item"]["text"]) ? $var["item"]["text"] : null); ?></p>
        <?php
/* _news.tpl:5: {if $item.cut} */
 if((isset($var["item"]["cut"]) ? $var["item"]["cut"] : null)) { ?>
            <a href="/news/<?php
/* _news.tpl:6: {$item.alias} */
 echo (isset($var["item"]["alias"]) ? $var["item"]["alias"] : null); ?>" class="btn btn-default">Читать далее &rarr;</a>
        <?php
/* _news.tpl:7: {/if} */
 } ?>
    </div>
<?php
/* _news.tpl:9: {/foreach} */
   } } ?><?php ?>
            </div>
            <div id="news-pagination">
                <?php
/* news.tpl:12: {if $pagination} */
 if((isset($var["pagination"]) ? $var["pagination"] : null)) { ?>
                    <?php
/* news.tpl:13: {insert '_pagination.tpl'} */
 ?><nav>
    <ul class="pagination">
        <?php $t5617b633_1 = (isset($var["pagination"]) ? $var["pagination"] : null); if(is_array($t5617b633_1) && count($t5617b633_1) || ($t5617b633_1 instanceof \Traversable)) {
  foreach($t5617b633_1 as $var["page"] => $var["type"]) { ?>
            <?php
/* _pagination.tpl:14: {/switch} */
 $t5617b633_2 = strval((isset($var["type"]) ? $var["type"] : null));
if($t5617b633_2 == 'first') {
?>
                <li><a href="/news/">&laquo;</a></li>
            <?php
} elseif($t5617b633_2 == 'last') {
?>
                <li><a href="/news/<?php
/* _pagination.tpl:8: {$page} */
 echo (isset($var["page"]) ? $var["page"] : null); ?>/">&raquo;</a></li>
            <?php
} elseif($t5617b633_2 == 'less') {
?>
            <?php
} elseif($t5617b633_2 == 'more') {
?>
            <?php
} elseif($t5617b633_2 == 'current') {
?>
                <li class="active"><a href="/news/<?php
/* _pagination.tpl:11: {$page} */
 echo (isset($var["page"]) ? $var["page"] : null); ?>/"><?php
/* _pagination.tpl:11: {$page} */
 echo (isset($var["page"]) ? $var["page"] : null); ?></a></li>
            <?php
} else {
?>
                <li><a href="/news/<?php
/* _pagination.tpl:13: {$page} */
 echo (isset($var["page"]) ? $var["page"] : null); ?>/"><?php
/* _pagination.tpl:13: {$page} */
 echo (isset($var["page"]) ? $var["page"] : null); ?></a></li>
            <?php
}
unset($t5617b633_2) ?>
        <?php
/* _pagination.tpl:15: {/foreach} */
   } } ?>
    </ul>
</nav><?php ?>
                <?php
/* news.tpl:14: {/if} */
 } ?>
            </div>
        </div>
    <?php
/* news.tpl:17: {else} */
 } else { ?>
        <a href="/news/">← Назад</a>
        <?php
/* news.tpl:19: {parent} */
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
            
    <?php
/* news.tpl:20: {/if} */
 } ?>


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
	'name' => 'news.tpl',
	'base_name' => 'news.tpl',
	'time' => 1572845159,
	'depends' => array (
  0 => 
  array (
    '_news.tpl' => 1572845519,
    '_pagination.tpl' => 1572845231,
    '_base.tpl' => 1573172521,
    'news.tpl' => 1572845159,
  ),
),
	'macros' => array(),

        ));
