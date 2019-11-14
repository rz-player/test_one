<?php 
/** Fenom template '_navbar.tpl' compiled at 2019-10-22 09:06:26 */
return new Fenom\Render($fenom, function ($var, $tpl) {
?>
<nav class="navbar navbar-default">
    <div class="navbar-header">
        <a class="navbar-brand" href="/">Course 3</a>
    </div>
    <ul class="nav navbar-nav">
        
        <?php
/* _navbar.tpl:8: {set $pages = $_controller->getMenu()} */
 $var["pages"]=$var["_controller"]->getMenu(); ?>
        <?php $t4a75dfa5_1 = (isset($var["pages"]) ? $var["pages"] : null); if(is_array($t4a75dfa5_1) && count($t4a75dfa5_1) || ($t4a75dfa5_1 instanceof \Traversable)) {
  foreach($t4a75dfa5_1 as $var["name"] => $var["page"]) { ?>
            
            <?php
/* _navbar.tpl:13: {if $_controller->name == $name} */
 if((isset($var["_controller"]->name) ? $var["_controller"]->name : null) == (isset($var["name"]) ? $var["name"] : null)) { ?>
                <li class="active">
                    <a href="#" style="cursor: default;" onclick="return false;"><?php
/* _navbar.tpl:15: {$page.title} */
 echo (isset($var["page"]["title"]) ? $var["page"]["title"] : null); ?></a>
                </li>
            <?php
/* _navbar.tpl:17: {else} */
 } else { ?>
                <li><a href="<?php
/* _navbar.tpl:18: {$page.link} */
 echo (isset($var["page"]["link"]) ? $var["page"]["link"] : null); ?>"><?php
/* _navbar.tpl:18: {$page.title} */
 echo (isset($var["page"]["title"]) ? $var["page"]["title"] : null); ?></a></li>
            <?php
/* _navbar.tpl:19: {/if} */
 } ?>
        <?php
/* _navbar.tpl:20: {/foreach} */
   } } ?>
    </ul>
</nav><?php
}, array(
	'options' => 2176,
	'provider' => false,
	'name' => '_navbar.tpl',
	'base_name' => '_navbar.tpl',
	'time' => 1571724385,
	'depends' => array (
  0 => 
  array (
    '_navbar.tpl' => 1571724385,
  ),
),
	'macros' => array(),

        ));
