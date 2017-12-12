var app = angular.module('humanGut', []);
app.controller('AppCtrl',function($scope, $http) {

    $scope.filterSearchActiveTool = false;
    // Filters Data repositories
    $scope.tableType = true;
    $scope.tableWebService = true;
    $scope.tableRepository = true;
    $scope.tableVolume = false;
    $scope.tableDownloadable = false;
    $scope.tablePurpose = false;
    $scope.tableStatus = true;

    $scope.filterSearchActive = false;
    $scope.numberShowData = 5;

    $scope.dataCategory = [
      {value: 'type', name: 'Type'},
      {value: 'webService', name: 'Web Service'},
      {value: 'repository', name: 'Repository'},
      {value: 'volume', name: 'Volume'},
      {value: 'downloadable', name: 'Downloadable'},
      {value: 'purpose', name: 'Purpose'}
    ];


    $scope.showData = function(index){
        //var show = false;
        //if(index < $scope.numberShowData)
        //{
            show = true;
       // }
        return show;
    };


    //function search in form 
    $scope.searchFilterData = function(criteria){
        if ( $scope.categorySearchFilterData != undefined)
        {

            $scope.resultsFilterType = [];
            var j = 0;
            $scope.filterSearchActive = true;
            repositories = $scope.results.dataRepositories.repositories;
            if( criteria != "")
            {
                switch($scope.categorySearchFilterData) {
                    case "type":

                        lengthRespositories = Object.keys(repositories).length;
                        for( var i=0; i<lengthRespositories ; i++)
                        {

                            typeRpositories = repositories[i].type.toLowerCase();
                            criteria = criteria.toLowerCase();
                            if( typeRpositories.indexOf( criteria ) != -1)
                            {
                                $scope.resultsFilterType[j] = repositories[i];
                                j++;
                            }
                        }
                        $scope.resultsFilterTypeMessage =  Object.keys($scope.resultsFilterType).length;                    
                        break;

                    case "webService":

                        lengthRespositories = Object.keys(repositories).length;
                        for( var i=0; i<lengthRespositories ; i++)
                        {

                            typeRpositories = repositories[i].webService.toLowerCase();
                            criteria = criteria.toLowerCase();
                            if( typeRpositories.indexOf( criteria ) != -1)
                            {
                                $scope.resultsFilterType[j] = repositories[i];
                                j++;
                            }
                        }
                        $scope.resultsFilterTypeMessage =  Object.keys($scope.resultsFilterType).length;                                        
                        break;

                    case "repository":

                        lengthRespositories = Object.keys(repositories).length;
                        for( var i=0; i<lengthRespositories ; i++)
                        {

                            typeRpositories = repositories[i].repository.toLowerCase();
                            criteria = criteria.toLowerCase();
                            if( typeRpositories.indexOf( criteria ) != -1)
                            {
                                $scope.resultsFilterType[j] = repositories[i];
                                j++;
                            }
                        }
                        $scope.resultsFilterTypeMessage =  Object.keys($scope.resultsFilterType).length;                                        
                        break;
                   
                   case "volume":

                        lengthRespositories = Object.keys(repositories).length;
                        for( var i=0; i<lengthRespositories ; i++)
                        {

                            typeRpositories = repositories[i].volume.toLowerCase();
                            criteria = criteria.toLowerCase();
                            if( typeRpositories.indexOf( criteria ) != -1)
                            {
                                $scope.resultsFilterType[j] = repositories[i];
                                j++;
                            }
                        }
                        $scope.resultsFilterTypeMessage =  Object.keys($scope.resultsFilterType).length;                                        
                        break;
                   
                   case "downloadable":

                        lengthRespositories = Object.keys(repositories).length;
                        for( var i=0; i<lengthRespositories ; i++)
                        {

                            typeRpositories = repositories[i].downloadable.toLowerCase();
                            criteria = criteria.toLowerCase();
                            if( typeRpositories.indexOf( criteria ) != -1)
                            {
                                $scope.resultsFilterType[j] = repositories[i];
                                j++;
                            }
                        }
                        $scope.resultsFilterTypeMessage =  Object.keys($scope.resultsFilterType).length;                    
                        break;
                    
                    default:
                        console.log("error");
                }// end of switch
                
            }else{
                $scope.resultsFilterType = repositories;
            }
        }else{
            $scope.filterSearchActive = false;
        }// end of if category selected
        
    }
    
    // END OF FUNCTION SEARCH
    $http.get("listScriptRepo.php")
    .then(function(response) {
        console.log(response)
        $scope.results = response.data;
    });

    $http.get("threadUpdateRepo.php")
    .then(function(response) {
        console.log(response)
       

    });
   
    /*
    $scope.numberShowtools = 5;
    console.log($scope.numberShowtools)
    $scope.showTools = function(index){
        var show = false;
       
        if(index < $scope.numberShowtools)
        {
            show = true;
        }
        
        return show;
    };*/



});
