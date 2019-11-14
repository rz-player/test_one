<?php 
/** Fenom template '_pagination.tpl' compiled at 2019-11-08 03:22:07 */
return new Fenom\Render($fenom, function ($var, $tpl) {
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
</nav><?php
}, array(
	'options' => 2176,
	'provider' => false,
	'name' => '_pagination.tpl',
	'base_name' => '_pagination.tpl',
	'time' => 1572845231,
	'depends' => array (
  0 => 
  array (
    '_pagination.tpl' => 1572845231,
  ),
),
	'macros' => array(),

        ));
