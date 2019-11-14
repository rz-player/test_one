{*Пишем чанк _navbar.tpl*}
<nav class="navbar navbar-default">
    <div class="navbar-header">
        <a class="navbar-brand" href="/">Course 3</a>
    </div>
    <ul class="nav navbar-nav">
        {*Мы вызываем из Controller.php метод getMenu(),  : -в нём просто массив(ы) с заполненными значениями.*}
        {set $pages = $_controller->getMenu()}
        {foreach $pages as $name => $page}
            {*Проверяя {$_controller->name} всегда можно понять, на какой страницы мы находимся и отметить этот пункт в панели активным.
                name - публичное свойство, в каждом контроллере.
            *}
            {if $_controller->name == $name}
                <li class="active">
                    <a href="#" style="cursor: default;" onclick="return false;">{$page.title}</a>
                </li>
            {else}
                <li><a href="{$page.link}">{$page.title}</a></li>
            {/if}
        {/foreach}
    </ul>
</nav>