function showPicByHash(){
    var hash = location.hash.substr(1);
    console.log(hash);
}
function initFancy(){
    var bigPic = $(this).attr('href');
    console.log(bigPic);
    var fancyoptions = {href:bigPic};
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