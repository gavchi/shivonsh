function startFancy(selector){
    $(function () {
        $(selector).fancybox({
            openEffect: 'elastic',
            closeEffect: 'elastic',
            preload: 0,
            beforeLoad : function(){
                var url= '/i/full/'+$(this.element).attr('href');
                this.href = url;
            },
            afterLoad: function (links) {
                location.hash = links.href.substring(8);
                this.title = '<ul class="social_i">' +
                '<li><a href="http://www.facebook.com/sharer.php?s=100&p[url]=http://'+location.host+'/art/image/'+$(this.element).attr('href')+'&p[images][0]=http://'+location.host+'/i/'+$(this.element).attr('href')+'" class="fb" target="_blank"></a></li>' +
                '<li><a href="http://www.tumblr.com/share?url=http://'+location.host+'/art/image/'+$(this.element).attr('href')+'" class="tb" target="_blank"></a></li>' +
                '<li><a href="http://twitter.com/share?url=http://'+location.host+'/art/image/'+$(this.element).attr('href')+'&text=artwork by @shivonsh&related=shivonsh" class="tw" target="_blank"></a></li>' +
                '<li><a href="http://vkontakte.ru/share.php?url=http://'+location.host+'/art/image/'+$(this.element).attr('href')+'&image=http://'+location.host+'/i/'+$(this.element).attr('href')+'" class="vk" target="_blank"></a></li>' +
                '</ul>';
            },
            afterClose: function () {
                location.hash = '';
            }
        });
        if(location.hash){
            $(selector+'[href="' + location.hash.substring(1) + '"]').trigger('click');
        }
    });
}
function initFancy(){
    //for admin
    if($(".artwork .art").length){
        startFancy('.artwork .art');
    }else{
        startFancy('.artwork');
    }
}
function initMasonry(){
    var $container = $('.gallery');
    // initialize

    $container.imagesLoaded(function(){
        $container.masonry({
            itemSelector: '.artwork',
            columnWidth: 445
        });
    });

    $container.infinitescroll({
            navSelector  : '.pager',    // селектор контейнера для навигации по старинцам
            nextSelector : '.pager li a[rel="next"]',  // селектор для навигации
            itemSelector : '.artwork',     // селектор блоков, к которым применяются эффекты
            donetext  : 'Больше нет страниц для загрузки!',
            loadingImg : 'http://i.imgur.com/6RMhx.gif', // изображение ajaxljader
            debug: true, // выводит ошибки на консоль
        },
        // вызываем Masonry
        function( newElements ) {
            var $newElems = $( newElements );
            // запускаем эффекты только после полной загрузки изображений
            $newElems.imagesLoaded(function(){
                $container.masonry( 'appended', $newElems, true );
            });
        }
    );

    /*
    $('img').imagesLoaded(function(){
        $container.masonry({
            columnWidth: 445,
            itemSelector: '.artwork'
        });
    });*/
    /*
    $container.imagesLoaded(function () {
        $container.masonry({
            columnWidth: 445,
            itemSelector: ".artwork"
        });
    });*/
}
$(function() {
    initFancy();
    initMasonry();
});