{*шаблон, который мы расширяем*}
{extends '_base.tpl'}

{*переопределяем блок content, помещая всё стандартное содержимое в div с классом jumbotron.*}
{block 'content'}
    <div class="jumbotron">
        {parent}
       {* {parent} указывает, что мы используем именно содержимое родительского блока, а в нём у нас прописана вставка {$pagetitle} и {$content}.*}
    </div>
{/block}