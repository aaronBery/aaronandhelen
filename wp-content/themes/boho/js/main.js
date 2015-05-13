requirejs.config({
    //By default load any module IDs from js/lib
    baseUrl: '/wp-content/themes/boho/js/lib'
    ,paths: {
        app: '../app'
        ,jquery: '//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min'
        ,angular: 'http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min'
        ,facebox: 'facebox'
    }
    ,shim: {
        'facebox': {
            deps: ['jquery']
            //,exports: 'facebox'
        }
        ,'angular': {
            exports: 'angular'
        }
    }
});
