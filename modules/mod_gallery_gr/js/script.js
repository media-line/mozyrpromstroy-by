jQuery(document).ready(function() {
    function galleryHandler () {
        jQuery('.gallery-slick').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            prevArrow: '<div class="prev-arrow arrow"><i class="icon-next"></i></div>',
            nextArrow: '<div class="next-arrow arrow"><i class="icon-next"></i></div>',
        });    

        jQuery(".fancybox-gallery").fancybox();        
    }

    galleryHandler();
});