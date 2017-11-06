var app = angular.module('humanGut', []);
app.controller('AppCtrl',function($scope, $http) {
    $scope.filterSearchActiveTool = false;

    $scope.filterSearchActive = false;
    $scope.numberShowData = 5;

    $scope.showData = function(index){
        //var show = false;
        //if(index < $scope.numberShowData)
        //{
            show = true;
       // }
        return show;
    };

    // Filters Tool Information
    $scope.tableTool = true;
    $scope.tableFamily = true;
    $scope.tableOsInfrastructure = true;
    $scope.tablePublicPrivate = true;
    $scope.tableLanguage = true;
    $scope.tableInputs = false;
    $scope.tableOutputs = false;
    $scope.tableMainFeatures = false;
    $scope.tableToolPurpose = false;
    $scope.tableToolStatus = true;


    $scope.dataCategoryTool =  [
      {value: 'tool', name: 'Tool'},
      {value: 'family', name: 'Family'},
      {value: 'osInfrastructure', name: 'Os Infrastructure'},
      {value: 'publicPrivate', name: 'Public/Private'},
      {value: 'inputs', name: 'Inputs'},
      {value: 'outputs', name: 'Outputs'},
      {value: 'mainFeatures', name: 'Main Features'},
      {value: 'purpose', name: 'Purpose'}
    ];


        
    //function search in form 
    $scope.searchFilterTool = function(criteria){
        
        var idType = $scope.typeSearchFilterTools;
        
        
        if ( $scope.categorySearchFilterTools != undefined)
        {
            $scope.resultsFilterTypeTool = [];
            var j = 0;
            $scope.filterSearchActiveTool = true;
            tools = $scope.results.dataInfo[idType].info;
            if( criteria != "")
            {
                
                switch($scope.categorySearchFilterTools) {
                    case "tool":
                        
                        lengthTools = Object.keys(tools).length;
                        for( var i=0; i<lengthTools ; i++)
                        {

                            typeTool = tools[i].tool.toLowerCase();
                            criteria = criteria.toLowerCase();
                            if( typeTool.indexOf( criteria ) != -1)
                            {
                                
                                $scope.resultsFilterTypeTool[j] = tools[i];
                                j++;
                            }
                        }
                        $scope.resultsFilterTypeMessageTool =  Object.keys($scope.resultsFilterTypeTool).length;                    
                        break;

                    case "family":
                        lengthTools = Object.keys(tools).length;
                        for( var i=0; i<lengthTools ; i++)
                        {

                            typeTool = tools[i].family.toLowerCase();
                            criteria = criteria.toLowerCase();
                            if( typeTool.indexOf( criteria ) != -1)
                            {
                                
                                $scope.resultsFilterTypeTool[j] = tools[i];
                                j++;
                            }
                        }
                        $scope.resultsFilterTypeMessageTool =  Object.keys($scope.resultsFilterTypeTool).length;                    
                        break;

                    case "osInfrastructure":
                        lengthTools = Object.keys(tools).length;
                        for( var i=0; i<lengthTools ; i++)
                        {

                            typeTool = tools[i].osInfrastructure.toLowerCase();
                            criteria = criteria.toLowerCase();
                            if( typeTool.indexOf( criteria ) != -1)
                            {
                                
                                $scope.resultsFilterTypeTool[j] = tools[i];
                                j++;
                            }
                        }
                        $scope.resultsFilterTypeMessageTool =  Object.keys($scope.resultsFilterTypeTool).length;                    
                        break;

                    case "publicPrivate":
                        lengthTools = Object.keys(tools).length;
                        for( var i=0; i<lengthTools ; i++)
                        {

                            typeTool = tools[i].publicPrivate.toLowerCase();
                            criteria = criteria.toLowerCase();
                            if( typeTool.indexOf( criteria ) != -1)
                            {
                                
                                $scope.resultsFilterTypeTool[j] = tools[i];
                                j++;
                            }
                        }
                        $scope.resultsFilterTypeMessageTool =  Object.keys($scope.resultsFilterTypeTool).length;                    
                        break;

                    case "inputs":
                        lengthTools = Object.keys(tools).length;
                        for( var i=0; i<lengthTools ; i++)
                        {

                            typeTool = tools[i].inputs.toLowerCase();
                            criteria = criteria.toLowerCase();
                            if( typeTool.indexOf( criteria ) != -1)
                            {
                                
                                $scope.resultsFilterTypeTool[j] = tools[i];
                                j++;
                            }
                        }
                        $scope.resultsFilterTypeMessageTool =  Object.keys($scope.resultsFilterTypeTool).length;                    
                        break;

                    case "outputs":
                        lengthTools = Object.keys(tools).length;
                        for( var i=0; i<lengthTools ; i++)
                        {

                            typeTool = tools[i].outputs.toLowerCase();
                            criteria = criteria.toLowerCase();
                            if( typeTool.indexOf( criteria ) != -1)
                            {
                                
                                $scope.resultsFilterTypeTool[j] = tools[i];
                                j++;
                            }
                        }
                        $scope.resultsFilterTypeMessageTool =  Object.keys($scope.resultsFilterTypeTool).length;                    
                        break;

                    case "mainFeatures":
                        lengthTools = Object.keys(tools).length;
                        for( var i=0; i<lengthTools ; i++)
                        {

                            typeTool = tools[i].mainFeatures.toLowerCase();
                            criteria = criteria.toLowerCase();
                            if( typeTool.indexOf( criteria ) != -1)
                            {
                                
                                $scope.resultsFilterTypeTool[j] = tools[i];
                                j++;
                            }
                        }
                        $scope.resultsFilterTypeMessageTool =  Object.keys($scope.resultsFilterTypeTool).length;                    
                        break;

                    case "purpose":
                        lengthTools = Object.keys(tools).length;
                        for( var i=0; i<lengthTools ; i++)
                        {

                            typeTool = tools[i].purpose.toLowerCase();
                            criteria = criteria.toLowerCase();
                            if( typeTool.indexOf( criteria ) != -1)
                            {
                                
                                $scope.resultsFilterTypeTool[j] = tools[i];
                                j++;
                            }
                        }
                        $scope.resultsFilterTypeMessageTool =  Object.keys($scope.resultsFilterTypeTool).length;                    
                        break;


                    default:
                        console.log("error");
                }// end of switch
                
            }else{
                $scope.resultsFilterTypeTool = tools;
                $scope.filterSearchActiveTool = false;
            }
        }else{
            
            $scope.filterSearchActiveTool = false;
        }// end of if category selected

        
    }
    
    // END OF FUNCTION SEARCH
     $http.get("listScriptTool.php")
    .then(function(response) {
        console.log(response)
        $scope.results = response.data;
       
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
