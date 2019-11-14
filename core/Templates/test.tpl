{*просто заменит тег title . Здесь мы добавляем свой заголовок страницы к стандартному, через косую.*}
{extends '_base.tpl'}

{block 'title'}
    {$title} / {parent}
{/block}