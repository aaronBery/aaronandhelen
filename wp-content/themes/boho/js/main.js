requirejs.config({
    //By default load any module IDs from js/lib
    baseUrl: '/wp-content/themes/boho/js/lib'
    ,paths: {
        app: '../app'
        ,jquery: '//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min'
        ,facebox: 'facebox'
    }
    ,shim: {
        'facebox': {
            deps: ['jquery']
            //,exports: 'facebox'
        }
    }
});
