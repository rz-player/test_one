<!DOCTYPE html>
<html lang="en">
{*Шаблоны, которые будем использовать только в других шаблонах, называем: _с подчёркивания. *_base.tpl*}

{*Все части шаблона, которые можно будет переопределить в дочерних, мы оборачиваем в {block 'имя'}. Так получаются блоки:
title — заголовок страницы
content — содержимое
sidebar — сайдбар справа, пока пустой
css — подключаемые стили css
js — подключаемые скрипты*}
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        {block 'title'}Тестовые уроки на bezumkin.ru{/block}
    </title>
    {block 'css'}
        <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    {/block}
</head>
<body>
{* подключаем вывод navbar через шаблон _navbar.tpl *}
{block 'navbar'}
    {include '_navbar.tpl'}
{/block}

<div class="container">
    <div class="row">
        <div class="col-md-10">
            {block 'content'}
                {if $longtitle != ''}
                    <h3>{$longtitle}</h3>
                {elseif $pagetitle != ''}
                    <h3>{$pagetitle}</h3>
                {/if}
                {$content}
            {/block}
        </div>
        <div class="col-md-2">
            {block 'sidebar'}
                Сайдбар
            {/block}
        </div>
    </div>
</div>
</body>
<footer>
    {block 'js'}
        <script src="/assets/js/jquery.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
        <script src="/assets/js/main.js"></script>
    {/block}
</footer>
</html>