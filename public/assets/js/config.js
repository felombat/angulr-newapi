/**
 * INSPINIA - Responsive Admin Theme
 *
 * Inspinia theme use AngularUI Router to manage routing and views
 * Each view are defined as state.
 * Initial there are written state for all view in theme.
 *
 */
function config($stateProvider, $urlRouterProvider, $ocLazyLoadProvider) {
    $urlRouterProvider.otherwise("/index/main");

    $ocLazyLoadProvider.config({
        // Set to true if you want to see what and when is dynamically loaded
        debug: false
    });

    $stateProvider

        .state('index', {
            abstract: true,
            url: "/index",
            templateUrl: "views/common/content.html",
        })
        .state('index.main', {
            url: "/main",
            templateUrl: "views/main.html",
            data: { pageTitle: 'Example view' }
        })
        .state('index.minor', {
            url: "/minor",
            templateUrl: "views/minor.html",
            data: { pageTitle: 'Example view' }
        })
        .state('index.announcements', {
            url: "/announcements",
            templateUrl: "views/announcements.html",
            data: { pageTitle: 'Example view' }
        })
        .state('index.events', {
            url: "/events",
            templateUrl: "views/events.html",
            data: { pageTitle: 'Example view' }
        })
        .state('index.users', {
            url: "/users",
            templateUrl: "views/users2.html",
            data: { pageTitle: 'Users view' }
        })
}
angular
    .module('coopapp')
    .config(config)
    .run(function($rootScope, $state) {
        $rootScope.$state = $state;
    });
