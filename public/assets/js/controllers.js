/**
 * INSPINIA - Responsive Admin Theme
 *
 */
/**
 * MainCtrl - controller
 */
var headline_cm = function($http, token = "ABESDFGdsfogpdsseornsldfkjhgoef", api = 'b714f12698014cf4aac6cd930ab5ffae') {
    return $http.get('https://newsapi.org/v2/sources?language=en&country=cm&apiKey=' + api);
};
var api = 'b714f12698014cf4aac6cd930ab5ffae';

function MainCtrl(newsAPIservice, userAPIservice, $scope, $log) {
    $this = this;
    this.main_article = {};
    this.articles = [];
    this.sources = [];
    this.headlines = [];
    this.heroes = [];
    this.villans = [];
    this.localnews = [];
    this.latestnews = [];
    this.employees = [];
    this.projects = []; // projects
    this.query = "";
    this.source = ""; // Info source 
    this.scopes = [{
        "id": 2,
        "url": "https://fr.allafrica.com/tools/headlines/rdf/cameroon/headlines.rdf",
        "name": "Cameroun - fr"
    }, {
        "id": 9,
        "url": "https://allafrica.com/tools/headlines/rdf/cameroon/headlines.rdf",
        "name": "Cameroon - en"
    }, {
        "id": 6,
        "url": "https://www.journalducameroun.com/feed/",
        "name": "Journal du Cameroun"
    }, {
        "id": 1,
        "url": "https://allafrica.com/tools/headlines/rdf/aid/headlines.rdf",
        "name": "Aid & Assistance"
    }, {
        "id": 10,
        "url": "https://fr.allafrica.com/tools/headlines/rdf/aid/headlines.rdf",
        "name": "Aide & Assistance / Coopération"
    }, {
        "id": 3,
        "url": "https://allafrica.com/tools/headlines/rdf/latest/headlines.rdf",
        "name": "Latest"
    }, {
        "id": 4,
        "url": "https://allafrica.com/tools/headlines/rdf/africa/headlines.rdf",
        "name": "Africa"
    }, {
        "id": 5,
        "url": "http://africanarguments.org/feed/",
        "name": "African Arguments"
    }, {
        "id": 7,
        "url": "https://news.google.com/news/rss/search/section/q/giz+Cameroun%3Fgl=FR&hl=fr&ned=fr",
        "name": 'GIZ Cameroun'
    }, {
        "id": 8,
        "url": "https%3A%2F%2Fnews.google.com%2Fnews%2Frss%2Fsearch%2Fsection%2Fq%2Fgiz%2BCameroun%3Fned%3Dfr%26gl%3DFR%26hl%3Dfr",
        "name": 'GIZ 2 Cameroun'
    }, ];
    $scope.scopes = [{
        "id": 2,
        "url": "https://fr.allafrica.com/tools/headlines/rdf/cameroon/headlines.rdf",
        "name": "Cameroun - fr"
    }, {
        "id": 9,
        "url": "https://allafrica.com/tools/headlines/rdf/cameroon/headlines.rdf",
        "name": "Cameroon - en"
    }, {
        "id": 6,
        "url": "https://www.journalducameroun.com/feed/",
        "name": "Journal du Cameroun"
    }, {
        "id": 1,
        "url": "https://allafrica.com/tools/headlines/rdf/aid/headlines.rdf",
        "name": "Aid & Assistance"
    }, {
        "id": 10,
        "url": "https://fr.allafrica.com/tools/headlines/rdf/aid/headlines.rdf",
        "name": "Aide & Assistance / Coopération"
    }, {
        "id": 3,
        "url": "https://allafrica.com/tools/headlines/rdf/latest/headlines.rdf",
        "name": "Latest"
    }, {
        "id": 4,
        "url": "https://allafrica.com/tools/headlines/rdf/africa/headlines.rdf",
        "name": "Africa"
    }, {
        "id": 5,
        "url": "http://africanarguments.org/feed/",
        "name": "African Arguments"
    }, {
        "id": 7,
        "url": "https://news.google.com/news/rss/search/section/q/giz+Cameroun%3Fgl=FR&hl=fr&ned=fr",
        "name": 'GIZ Cameroun'
    }, {
        "id": 8,
        "url": "https%3A%2F%2Fnews.google.com%2Fnews%2Frss%2Fsearch%2Fsection%2Fq%2Fgiz%2BCameroun%3Fned%3Dfr%26gl%3DFR%26hl%3Dfr",
        "name": 'GIZ 2 Cameroun'
    }, ];
    this.getNewsUpdates = function() {
        //var _source = MainCtrl.source ;
        // newsAPIservice.updateNews(url).then(function(response) {
        //     MainCtrl.status  = response.status;
        //     // $scope.latestnews = $this.latestnews = response.items;
        //     $scope.headlines = $this.headlines = response.items;
        //     //MainCtrl.latestnews = response.items;
        //     $log.log("updates", MainCtrl.latestnews);
        //     console.log("Status:", response.status);
        //     console.info("Total:", response.totalResults);
        //     //MainCtrl.articles = [];
        // }, function() {
        //     //$scope.weatherDescription = "Could not obtain data";
        //     MainCtrl.status = response.status;
        //     $scope.latestnews = [];
        //     MainCtrl.latestnews = [];
        //     //console.log("Status:", response.status);
        //     //console.info("Total:", response.totalResults);
        //     MainCtrl.articles = [];
        // });
        console.log("Change Source to :", MainCtrl.source);

        // Alt Method: 
        newsAPIservice.updateNews(MainCtrl.source).success(function(response) {
            MainCtrl.status  = response.status;
            // $scope.latestnews = $this.latestnews = response.items;
            $scope.headlines = $this.headlines = response.items;
            //MainCtrl.latestnews = response.items;
            $log.log("updates", MainCtrl.latestnews);
            console.log("Status:", response.status);
            console.info("Total:", response.totalResults);
            //MainCtrl.articles = [];
            //$scope.apply();
        }).error(function() {
            //$scope.weatherDescription = "Could not obtain data";
            MainCtrl.status = response.status;
            $scope.latestnews = [];
            MainCtrl.latestnews = [];
            //console.log("Status:", response.status);
            //console.info("Total:", response.totalResults);
            MainCtrl.articles = [];
        });
    };

    this.updateUserlist = function(){
        var project = $this.source.title;
        $log.info("Update User list" + 'ID:' + project);
        // newsAPIservice.updateNews(url).then(function(response) {
        //     MainCtrl.status = response.status;
        //     $scope.latestnews = response.items;
        //     MainCtrl.latestnews = response.items;
        //     $log.log("updates", MainCtrl.latestnews);
        //     console.log("Status:", response.status);
        //     console.info("Total:", response.totalResults);
        //     //MainCtrl.articles = [];
        // }, function() {
        //     //$scope.weatherDescription = "Could not obtain data";
        //     MainCtrl.status = response.status;
        //     $scope.latestnews = [];
        //     MainCtrl.latestnews = [];
        //     //console.log("Status:", response.status);
        //     //console.info("Total:", response.totalResults);
        //     MainCtrl.articles = [];
        // });

        userAPIservice.getEmployees(project).success(function(response) {
            //response.setHeader("Access-Control-Allow-Origin", "*");
            $this.status = response.status;
            $scope.employees = response.giz_employees // response.employees; //
            $this.employees =  response.giz_employees;  //response.employees;  //

            $scope.projects = $this.projects = response.giz_projects;
            //console.log("Status:", response.status);
            //$log.info("Employees:", response);
        });
    }; 

    this.userName = 'Demo user';
    this.helloText = 'NewsFeed App #2019.09';
    this.descriptionText = 'It is an application skeleton for a typical AngularJS web app. You can use it to quickly bootstrap your angular webapp projects and dev environment for these projects.';
    
    newsAPIservice.getHeadlines().success(function(response) {
        MainCtrl.status = response.status;
        $scope.headlines = $this.headlines = response.articles;
        console.log("Status:", response.status);
        //console.info("Total:", response.totalResults);

        MainCtrl.articles = [];
    }).error(function(response) {
        MainCtrl.status = response.status;
        $scope.headlines = $this.headlines = [];
        //console.log("Status:", response.status);
        //console.info("Total:", response.totalResults);

        MainCtrl.articles = [];
    }); 
    
    // Methode Async 
    /*
    newsAPIservice.getHeadlines().then(function(response) {
        $this.status = response.status;
        $scope.headlines = $this.headlines = response.articles;
        console.log("Status:", response.status);
        console.info("Total:", response.totalResults);
        $this.articles = [];
    }, function() {
        //$scope.weatherDescription = "Could not obtain data";
        $this.status = false;
        $scope.headlines = $this.headlines = [];
        //console.log("Status:", response.status);
        //console.info("Total:", response.totalResults);
        $this.articles = [];
    }); */ 
    newsAPIservice.getHeroes().then(function(response) {
        $this.status = response.status;
        $scope.heroes = $this.heroes = response;
        // console.log("Status:", response.status);
        // console.info("Total:", response.length);
        $this.articles = [];
    }, function(response) {
        //$scope.weatherDescription = "Could not obtain data";
        $this.status = response.status;
        $scope.heroes = $this.heroes = [];
        //console.log("Status:", response.status);
        //console.info("Total:", response.totalResults);
        $this.articles = [];
    });
    
    /*
    *
    *
    newsAPIservice.updateNews().then(function(response) {
        $this.status = response.status;
        $scope.localnews = $this.localnews = response.items;
        console.log("Status:", response.status);
        console.info("Total:", response.totalResults);
        $this.articles = [];
    }, function() {
        //$scope.weatherDescription = "Could not obtain data";
        $this.status = false;
        $scope.localnews = $this.localnews = [];
        //console.log("Status:", response.status);
        //console.info("Total:", response.totalResults);
        $this.articles = [];
    }); */

    // Update newslist : 
    newsAPIservice.updateNews().success(function(response) {
        MainCtrl.status = response.status;
        $scope.headlines = $this.headlines = response.items;
        $scope.localnews = $this.localnews = response.items;
        console.log("Status:", response.status);
        console.info("Total:", response.totalResults);

        //MainCtrl.articles = [];
    }).error(function(response) {
        MainCtrl.status = response.status;
        $scope.headlines = $this.headlines = [];
        //console.log("Status:", response.status);
        //console.info("Total:", response.totalResults);

        MainCtrl.articles = [];
    }); 
    //MainCtrl.scopes = newsAPIservice.updateNewsScopes();
    newsAPIservice.getLatestNews("GIZ Ghana").success(function(response) {
        $this.status = response.status;
        $scope.latestnews = response.articles;
        $this.latestnews = response.articles;
        $scope.main_article = response.articles[0];
        $this.main_article = response.articles[0];
        console.log("Status:", response.status);
        //console.info("Total:", response.length);
    });
    userAPIservice.getEmployees().success(function(response) {
        //response.setHeader("Access-Control-Allow-Origin", "*");
        $this.status = response.status;
        $scope.employees = response.giz_employees // response.employees; //
        $this.employees =  response.giz_employees;  //response.employees;  //

        $scope.projects = $this.projects = response.giz_projects;
        //console.log("Status:", response.status);
        //$log.info("Employees:", response);
    });
}

function truncateCtrl($scope){

    $scope.truncateOptions = {
        watch: 'window'
    };

    $scope.truncateOptions2 = {
        watch: 'window',
        ellipsis: ' ///...'
    };

    $scope.truncateOptions3 = {
        watch: 'window',
        wrap: 'letter'
    }

}
angular.module('coopapp')
    .controller('MainCtrl', MainCtrl)
    .controller('truncateCtrl', truncateCtrl);