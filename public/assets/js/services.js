// api News Key :: b714f12698014cf4aac6cd930ab5ffae


/* Services */


// Demonstrate how to register services
// angular.module('coopapp')
//     //Get all Top Headlines in Cameroon
//     .service('headlines_cm', function($http, token = "ABESDFGdsfogpdsseornsldfkjhgoef", api = 'b714f12698014cf4aac6cd930ab5ffae'){
//         return $http.get('https://newsapi.org/v2/sources?language=en&country=cm&apiKey='+api);
//     });

angular.module('coopapp')
    .factory('newsAPIservice', function($http) {
  
        let APIkey = 'b714f12698014cf4aac6cd930ab5ffae';
        let main = document.querySelector('main');
        let sourceSelector = document.querySelector('#sourceSelector');
        let defaultSource = 'https://fr.allafrica.com/tools/headlines/rdf/cameroon/headlines.rdf'; //'techcrunch';
        var $newfeed = $('#newsfeed');
        var $bookfeed = $('#booksfeed');
        // https://api.rss2json.com/v1/api.json?rss_url=https%3A%2F%2Fallafrica.com%2Ftools%2Fheadlines%2Frdf%2Fcameroon%2Fheadlines.rdf&api_key=huaukeg55vyyubsldc3omqueahorzf84k6dqcnnz
        
        var url = 'https://api.rss2json.com/v1/api.json?rss_url=https%3A%2F%2Fallafrica.com%2Ftools%2Fheadlines%2Frdf%2Fcameroon%2Fheadlines.rdf&' +
                      'api_key=huaukeg55vyyubsldc3omqueahorzf84k6dqcnnz';
        
        // var itbooksUrl = 'http://it-ebooks-api.info/v1/search/progressive%20app'
        
        var req = new Request(url);
        fetch(req)
        .then(function(response) {
            //response.setHeader("Access-Control-Allow-Origin", "*");
            console.log(
                response.json()
            );
        });

        

        var newsAPI= {};

  
      newsAPI.getSources = function() {
        return $http({
          method: 'GET', 
          url: 'https://newsapi.org/v2/sources?language=en&country=cm&apiKey=b714f12698014cf4aac6cd930ab5ffae'
        });
      };

      newsAPI.updateNewsScopes = function updateNewsScopes(){
            var scopes  =[
                {"id":2, "url":"https://fr.allafrica.com/tools/headlines/rdf/cameroon/headlines.rdf", "name":"Cameroun - fr"},
                {"id":9, "url":"https://allafrica.com/tools/headlines/rdf/cameroon/headlines.rdf", "name":"Cameroon - en"},
                {"id":6, "url":"https://www.journalducameroun.com/rss/", "name":"Journal du Cameroun"},
                {"id":1, "url":"https://allafrica.com/tools/headlines/rdf/aid/headlines.rdf", "name":"Aid & Assistance"}, 
                {"id":10, "url":"https://fr.allafrica.com/tools/headlines/rdf/aid/headlines.rdf", "name":"Aide & Assistance / Coopération"},
                
                {"id":3, "url":"https://allafrica.com/tools/headlines/rdf/latest/headlines.rdf", "name":"Latest"},
                {"id":4, "url":"https://allafrica.com/tools/headlines/rdf/africa/headlines.rdf", "name":"Africa"},
                {"id":5, "url":"http://africanarguments.org/feed/", "name":"African Arguments"},
                {"id":7, "url":"https://news.google.com/news/rss/search/section/q/giz+Cameroun%3Fgl=FR&hl=fr&ned=fr", "name":'GIZ Cameroun'},
                {"id":8, "url":"https%3A%2F%2Fnews.google.com%2Fnews%2Frss%2Fsearch%2Fsection%2Fq%2Fgiz%2BCameroun%3Fned%3Dfr%26gl%3DFR%26hl%3Dfr" , "name":'GIZ 2 Cameroun'},
            ];
        
            sourceSelector.innerHTML = scopes.map(src => `<option value="${src.url}">${src.name}</option>`).join('\n');
        
            $(".card-body img").css({
                width: '100%',
                height: 'auto'
            });
        };  
  
      newsAPI.getHeadlines = function(country_id) {
          country_id = country_id || 'us' ;
        return $http({
          method: 'GET', 
          //url: 'http://ergast.com/api/f1/2013/drivers/'+ id +'/driverStandings.json?callback=JSON_CALLBACK'
          url : 'https://newsapi.org/v2/top-headlines?country='+country_id+'&apiKey='+'b714f12698014cf4aac6cd930ab5ffae'
        });
      };

      newsAPI.getLatestNews = function(topics) {
        topics = topics || 'GIZ+in+cameroon' ;
        return $http({
            method: 'GET', 
            //url: 'http://ergast.com/api/f1/2013/drivers/'+ id +'/driverStandings.json?callback=JSON_CALLBACK'
            url : 'https://newsapi.org/v2/everything?q='+topics+'&apiKey='+'b714f12698014cf4aac6cd930ab5ffae'
        });
        };
   
        newsAPI.getHeroes = function(hero_id) {
            hero_id = hero_id || '';
            return $http({
                method: 'GET',
                //url: 'http://ergast.com/api/f1/2013/drivers/'+ id +'/driverStandings.json?callback=JSON_CALLBACK'
                url : 'http://localhost:7627/heroes/'+ hero_id
            });
        };

        newsAPI.getVillans = function(villian_id) {
            villian_id = villian_id || '';
            return $http({
                method: 'GET',
                //url: 'http://ergast.com/api/f1/2013/drivers/'+ id +'/driverStandings.json?callback=JSON_CALLBACK'
                url : 'http://localhost:7627/villains/'+ villian_id
            });
        };

        newsAPI.updateNews = function(newssource = defaultSource){
            //const res = await fetch('https://newsapi.org/v1/articles?' +
            //'country=us&' +
            //`source=${newssource}&` +
            //'apiKey=b714f12698014cf4aac6cd930ab5ffae');
        
            var url = encodeURI('https://api.rss2json.com/v1/api.json?' + 
            `rss_url=${(newssource)}&` +
            'api_key=huaukeg55vyyubsldc3omqueahorzf84k6dqcnnz' + 
            '&order_by=pubDate&count=20');

            return $http({
                method: 'GET', 
                //url: 'http://ergast.com/api/f1/2013/drivers/'+ id +'/driverStandings.json?callback=JSON_CALLBACK'
                url : url 
              });
        
            //const res = await fetch(url);
        
            //const json = await res.json();
        
            //main.innerHTML = json.articles.map(createArticle).join('\n');
            //$newfeed.find('.row').html(json.articles.map(createArticle));
            //$newfeed.find('.row').html(json.items.map(createArticle));
            
        
        };
  
        // http://localhost/matjupweb/
        newsAPI.getItemsByCat = function() {
            //cat_id = cat_id || 0 ;
            return $http({
            method: 'JSON', 
            //url: 'http://ergast.com/api/f1/2013/drivers/'+ id +'/driverStandings.json?callback=JSON_CALLBACK'
            url : AppHelper.baseUrl + 'index.php/quotation/get_items_by_cat/' 
            });
        };
    
        newsAPI.getItemDetails = function(id) {
            return $http({
            method: 'JSON', 
            //url: 'http://ergast.com/api/f1/2013/drivers/'+ id +'/driverStandings.json?callback=JSON_CALLBACK'
            url : AppHelper.baseUrl + 'index.php/quotation/get_items/'+ id 
            });
        };
    
        newsAPI.getPricingDetails = function(id) {
            return $http({
            method: 'JSONP', 
            url: 'http://ergast.com/api/f1/2013/drivers/'+ id +'/results.json?callback=JSON_CALLBACK'
            });
        };
    
        return newsAPI;
    })
    
    .factory('userAPIservice', function($http){

        var userAPI = {};

        userAPI.getEmployees = function(projectname = 'GIZ'){
            return $http({
                method: 'GET',
                //dataType: 'jsonp',
                //headers: {'Authorization': 'Token token=xxxxYYYYZzzz'}
                //headers: {"Access-Control-Allow-Origin":  "*"},
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                url : "http://localhost/miniapps/public/api/orgchart/" + projectname
            });
        };

        return userAPI;
    });


