<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>
    <a href="" title="Все" id="dow" class="tabs__btn active">Загрузить Фото</a> /
    <a href="" title="Все" id="dow_news" class="tabs__btn active">Загрузить Новости КТЦ</a>
    <p id="data">
        <br><br>
    <script>
        $(function(){
            $('#dow').click(function(e){

                var id = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16], i = 0;
                (function updateInfo(i) {
                    if (i == id.length) {
                        return;
                    }
                    $.ajax({
                        type: "POST",
                        url: "/download/download_photo.php",
                        data: {
                            "id": i*10,
                        },
                        dataType: "html"
                    }).then(function() {
                        $('#data').append('item_ID ' + (i+1) + ' из ' + id.length + '(по 10 альбомов),   ');
                        updateInfo(i + 1);
                    });
                })(0);
                e.preventDefault();
            });
        });
    </script>
        <script>
            $(function(){
                $('#dow_news').click(function(e){

                    var id = [1,2,3,4], i = 0;
                    (function updateInfo(i) {
                        if (i == id.length) {
                            return;
                        }
                        $.ajax({
                            type: "POST",
                            url: "/download/download_news.php",
                            data: {
                                "id": i*20,
                            },
                            dataType: "html"
                        }).then(function(data) {
                            if(data == 0) {
                                $('#data').append('id ' + (i+1) + '(по 5 новостей),   ');
                                updateInfo(i + 1);
                            }
                            if(data == 1){
                                alert('Загрузка завершена!');
                            }
                        });
                    })(0);
                    e.preventDefault();
                });
            });
        </script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>