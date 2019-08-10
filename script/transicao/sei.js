$(function(){
    'use stritc';
    var $page = $('#container'),
    options = {
        debug: true,
        prefetch: true,
        cacheLength: 2,
        onStart: {
            duration:250,
            render: function($container){
                $container.addClass('is-exiting');
                smoothState.restartCSSAnimation();
            }
        },
        OnReady:{
            duration:0,
            render: function($container, $newContent){
                $container.removeClass('is-exiting');
                $container.html($newContent);
            }
        }
    },
    smoothState= $page.smoothState(options).data('smoothState');

});