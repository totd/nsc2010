$(function() {
    $("#attachFile").imgPreview({
        containerID: 'imgPreviewWithStyles',
        imgCSS: {
            // Limit preview size:
            height: 200
        },
        // When container is shown:
        onShow: function(link){
            // Animate link:
            $(link).stop().animate({opacity:0.4});
            // Reset image:
            $('img', this).stop().css({opacity:0});
        },
        // When image has loaded:
        onLoad: function(){
            // Animate image
            $(this).animate({opacity:1}, 300);
        },
        // When container hides:
        onHide: function(link){
            // Animate link:
            $(link).stop().animate({opacity:1});
        }
    });
});

