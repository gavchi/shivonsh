function initFancy(){
    //for admin
    if($(".artwork .art").length){
        $(".artwork .art").fancybox();
    }else{
        $(".artwork").fancybox();
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