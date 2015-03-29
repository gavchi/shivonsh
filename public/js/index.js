function showPicByHash(){
    var hash = location.hash.substr(1);
    console.log(hash);
}
function initFancy(){
    var fancyoptions = {
        beforeLoad : function(){
        var url= $(this.element).attr('href');
        this.href = url.substr(1)
        }
    };
    //for admin
    if($(".artwork .art").length){
        $(".artwork .art").fancybox();
    }else{
        $(".artwork").fancybox(
            fancyoptions
        );
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
    showPicByHash();
});