<!--
* INSPINIA - Responsive Admin Theme
* Version 2.5
*
-->

<!DOCTYPE html>
<html ng-app="coopapp">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Page title set in pageTitle directive -->
        <title page-title></title>

        <!-- Font awesome -->
        <!-- <link href="font-awesome/css/font-awesome.css" rel="stylesheet"> -->

        <!-- Bootstrap and Fonts -->
        <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->

        <!-- Main Inspinia CSS files -->
        <!-- <link href="css/animate.css" rel="stylesheet"> -->
        <!-- <link id="loadBefore" href="css/style.css" rel="stylesheet"> -->

        <?php echo Asset::css(array(
            'bootstrap.min.css',
            'font-awesome.min.css',
            'animate.css',
            'style.css',
            //'plugins/toastr/toastr.min.css',
        )); ?>

    </head>

    <!-- ControllerAs syntax -->
    <!-- Main controller with serveral data used in Inspinia theme on diferent view -->
    <body ng-controller="MainCtrl as main" class="md-skin">

    <!-- Main view  -->
    <div ui-view></div>

    <?php echo Asset::js(array(
    //  Mainly scripts 
    // 'jquery-3.1.1.min.js',
    //  'plugins/toastr/toastr.min.js',

    // jQuery and Bootstrap -->
    'jquery/jquery-2.1.1.min.js',
    'plugins/jquery-ui/jquery-ui.js',
    'bootstrap/bootstrap.min.js',

    // MetsiMenu -->
    'plugins/metisMenu/jquery.metisMenu.js',

    // SlimScroll -->
    'plugins/slimscroll/jquery.slimscroll.min.js',

    // Peace JS -->
    'plugins/pace/pace.min.js',

    // Custom and plugin javascript -->
    'inspinia.js',

    // Main Angular scripts-->
    'angular/angular.min.js',
    'plugins/oclazyload/dist/ocLazyLoad.min.js',
    'ui-router/angular-ui-router.min.js',
    'bootstrap/ui-bootstrap-tpls-1.1.2.min.js',

    // Anglar App Script -->
    'app.js',
    'config.js',
    'directives.js',
    'controllers.js',
    'services.js'
    )); ?>

    </body>
</html>