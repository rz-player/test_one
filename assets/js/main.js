/**
 * Created by Tom on 11/4/2019.
 */
//НеСтарый ли браузер? определяем, есть ли у браузера нужный нам функционал:
var oldBrowser = !(window.history && history.pushState);
if (!oldBrowser) {
    // Добавляем в историю текущую страницу при первом открытии раздела
    history.replaceState({pagination: window.location.href}, '');
    // Все свои данные мы добавляем в историю с ключом pagination,
    // чтобы потом его можно было проверить и понять — это именно наши данные.
}

// Выделяем непосредственно загрузку страницы в отдельную функцию loadPage, чтобы можно было вызывать её из любого места скрипта:
function loadPage(href) {
    var wrapper = $('#news-wrapper');
    // Для индикации работы через ajax делаем элемент-обёртку полупрозрачным
    wrapper.css('opacity', .5);
    console.log('#news-wrapper -start loading -set opacity -to 0.5');

    // Запрашиваем страницу через ajax
    $.ajax({
        dataType: 'json',
        url: href,
        cache: false,
        success: function(res) {
            // При получении любого ответа делаем обёртку обратно непрозрачной
            wrapper.css('opacity', 1);
            console.log('#news-wrapper -finish loading -set opacity -to 1');
            if (res.success) {
                // Меняем содержимое элементов
                // новости
                $('#news-items').html(res.data['items']);
                // постраничная навигация
                $('#news-pagination').html(res.data['pagination']);
            }
            // Ответ с ошибкой и в массиве данных указан адрес перенаправления
            else if (res.data['redirect']) {
                // Редиректим пользователя
                window.location = res.data['redirect'];
            }
            // Иначе пишем ошибку в консоль и больше ничего не делаем
            else {
                console.log(res);
            }
        }
    });
}


// Обработчик нажатия кнопок постраничной навигации
$('#news-wrapper').on('click', '#news-pagination a', function() {
    var href = $(this).attr('href'); // Определяем ссылку
    // Пустые ссылки не обрабатываем
    if (href != '') {
        // Если браузер не старый - добавляем адрес страницы ему в историю
        if (!oldBrowser) {
            window.history.pushState({pagination: href}, '', href);
        }
        // И загружаем её
        loadPage(href);
    }

    // В любом случае не даём перейти по ссылке - у нас же тут ajax пагинация
    return false;
});

// Обработчик на нажатие кнопок взад-вперёд в браузере popstate:
$(window).on('popstate', function(e) {
    // Проверяем данные внутри события, и если там наш pagination
    if (e.originalEvent.state && e.originalEvent.state['pagination']) {
        // То загружаем сохранённую страницу
        loadPage(e.originalEvent.state['pagination']);
    }
});