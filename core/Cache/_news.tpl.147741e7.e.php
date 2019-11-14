<?php 
/** Fenom template '_news.tpl' compiled at 2019-11-08 03:22:07 */
return new Fenom\Render($fenom, function ($var, $tpl) {
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
   } } ?><?php
}, array(
	'options' => 2176,
	'provider' => false,
	'name' => '_news.tpl',
	'base_name' => '_news.tpl',
	'time' => 1572845519,
	'depends' => array (
  0 => 
  array (
    '_news.tpl' => 1572845519,
  ),
),
	'macros' => array(),

        ));
