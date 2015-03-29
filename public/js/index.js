function startFancy(selector){
    $(function () {
        $(selector).fancybox({
            transitionIn: 'elastic',
            transitionOut: 'elastic',
            titlePosition: 'inside',
            preload: 0,
            beforeLoad : function(){
                var url= '/i/full/'+$(this.element).attr('href');
                this.href = url;
            },
            afterLoad: function (links) {
                location.hash = links.href.substring(8);
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
    $('img').load(function(){
        $container.masonry({
            columnWidth: 445,
            itemSelector: '.artwork'
        });
    });
    $container.masonry({
        columnWidth: 445,
        itemSelector: '.artwork'
    });
}
$(document).ready(function() {
    initFancy();
    initMasonry();
});