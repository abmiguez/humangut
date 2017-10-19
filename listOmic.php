<?php include('tools/head.php'); ?>

	<div ng-controller="AppCtrl" layout="column" ng-cloak>

		<button type="button" class="btn btn-default" ng-click="showFilters= (!showFilters)">Show filters</button>
		
		<?php include ('tools/filtersTools.php'); ?>
		<ul class="nav nav-tabs tabsGut" ng-show="!filterSearchActiveTool">
			<li ng-repeat="(key, value) in results.dataInfo">
		        <a data-toggle="tab" ng-href="#{{key}}"> {{value.nameFamily}}</a>
		    </li>
		</ul>
		<div class="tab-content">
		    <div ng-repeat="(key, value) in results.dataInfo" 
		    	 id="{{key}}" class="tab-pane fade in active">
		    	
			  	<div ng-show="results.successInfo">

		  			<h2 ng-show="!filterSearchActiveTool"> {{ value.message }} </h2>
			  		<h2 ng-show="filterSearchActiveTool"> {{ resultsFilterTypeMessageTool }} results have been found</h2>
			  		

			  		<table class="table table-bordered">
						<thead>
							<tr>
								<th ng-show="tableTool">Tool</th>
								<th ng-show="tableOsInfrastructure">OS Infrastructure</th>
								<th ng-show="tablePublicPrivate">Public/Private</th>
								<th ng-show="tableLanguage">Language</th>
								<th ng-show="tableInputs">Inputs</th>
								<th ng-show="tableOutputs">Outputs</th>
								<th ng-show="tableMainFeatures">Main Features</th>
								<th ng-show="tableToolPurpose">Purpose</th>
								<th ng-show="tableToolStatus">Status</th>
								
							</tr>
						</thead>
						<tbody  ng-show="!filterSearchActiveTool">
							<tr ng-repeat="info in value.info" >
								<td ng-show="tableTool">
									<a ng-href="{{ info.url }}" target="_blank"> {{ info.tool }}  </a>
								</td>
								<td ng-show="tableOsInfrastructure"> {{ info.osInfrastructure }} </td>
								<td ng-show="tablePublicPrivate"> {{ info.publicPrivate }} </td>
								<td ng-show="tableLanguage"> {{ info.language }} </td>
								<td ng-show="tableInputs"> {{ info.inputs }} </td>
								<td ng-show="tableOutputs"> {{ info.outputs }} </td>
								<td ng-show="tableMainFeatures"> {{ info.mainFeatures }} </td>
								<td ng-show="tableToolPurpose"> {{ info.purpose }} </td>
								<td ng-show="tableToolStatus"> 

									<div ng-show="info.status == 1">
										<img src="images/on.svg" />
									</div>
									<div ng-show="info.status == 0">
										<img src="images/off.svg" />
									</div>
								</td>
								
							</tr>
						</tbody>
						<tbody ng-show="filterSearchActiveTool">
								
							<tr ng-repeat="filteredTool in resultsFilterTypeTool">
								<td ng-show="tableTool">
									<a ng-href="{{ filteredTool.url }}" target="_blank"> 
										{{ filteredTool.tool }}  
									</a>
								</td>
								
								<td ng-show="tableOsInfrastructure"> {{ info.osInfrastructure }} </td>
								<td ng-show="tablePublicPrivate"> {{ filteredTool.publicPrivate }} </td>
								<td ng-show="tableLanguage"> {{ filteredTool.language }} </td>
								<td ng-show="tableInputs"> {{ filteredTool.inputs }} </td>
								<td ng-show="tableOutputs"> {{ filteredTool.outputs }} </td>
								<td ng-show="tableMainFeatures"> {{ filteredTool.mainFeatures }} </td>
								<td ng-show="tableToolPurpose"> {{ filteredTool.purpose }} </td>
								<td ng-show="tableToolStatus"> 

									<div ng-show="filteredTool.status == 1">
										<img src="images/on.svg" />
									</div>
									<div ng-show="filteredTool.status == 0">
										<img src="images/off.svg" />
									</div>
								</td>

							</tr>
						</tbody>
					</table>

				 </div><!-- ng show database -->
			  	<div ng-show="!results.successInfo"> Loading....</div>


		    </div><!-- end of tab content tool -->
		    
		</div><!-- end of tab -->


	</div></div></div>
<?php include('tools/footer.php'); ?>
