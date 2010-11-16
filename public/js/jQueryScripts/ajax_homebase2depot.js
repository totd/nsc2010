/*
async Ч асинхронность запроса, по умолчанию true
cache Ч вкл/выкл кэширование данных браузером, по умолчанию true
contentType Ч по умолчанию Ђapplication/x-www-form-urlencodedї
data Ч передаваемые данные Ч строка иль объект
dataFilter Ч фильтр дл€ входных данных
dataType Ч тип данных возвращаемых в callback функцию (xml, html, script, json, text, _default)
global Ч тригер Ч отвечает за использование глобальных AJAX Event'ов, по умолчанию true
ifModified Ч тригер Ч провер€ет были ли изменени€ в ответе сервера, дабы не слать еще запрос, по умолчанию false
jsonp Ч переустановить им€ callback функции дл€ работы с JSONP (по умолчанию генерируетс€ на лету)
processData Ч по умолчанию отправл€емые данный заворачиваютс€ в объект, и отправл€ютс€ как Ђapplication/x-www-form-urlencodedї, если надо иначе Ч отключаем
scriptCharset Ч кодировочка Ч актуально дл€ JSONP и подгрузки JavaScript'ов
timeout Ч врем€ таймаут в миллисекундах
type Ч GET либо POST
url Ч url запрашиваемой страницы
 */
 function addClickHandlers(Homebase_id) {
  // $(".d_homebase_ID_item").click(function() {
        $.get("/ajax/homebase/get-Depot-List/",{id:Homebase_id}, function(data){
            $('#d_depot_ID option').remove();
            $('#d_depot_ID').append(""+data+"");
        })
  // })
 }
 
/*
 function addClickHandlers() {
   $("#d_depot_ID", this).click(function() {
     $.ajax("/ajax/homebase/get-Depot-List/",{id:$('select#d_homebase_ID option')}, function(data){
           alert("s\sdsad");
        $('#d_depot_ID').remove();
        $('#d_depot_ID').append(""+data+"");
       })
   });
 }*/
// $(document).ready(addClickHandlers);
