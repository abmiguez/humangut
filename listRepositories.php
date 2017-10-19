<?php include('tools/head.php'); ?>

	<div ng-controller="AppCtrl" layout="column" ng-cloak>
		<button type="button" class="btn btn-default" ng-click="showFilters= (!showFilters)">Show filters</button>
		
		<?php include ('tools/filtersRepositories.php'); ?>
		<ul class="nav nav-tabs tabsGut">
			<li class="active"><a data-toggle="tab" href="#data">Data Repositories</a></li>
		</ul>
		<div class="tab-content">
		    
			<div id="data" class="tab-pane fade in active">
		    	<div ng-show="results.successRepositories">
		  		<h2 ng-show="!filterSearchActive"> {{ results.dataRepositories.message }} </h2>
		  		<h2 ng-show="filterSearchActive"> {{ resultsFilterTypeMessage }} results have been found</h2>
		  		

		  		<table class="table table-bordered">
					<thead>
						<tr>
							<th ng-show="tableRepository">Repository</th>
							<th ng-show="tableType">Type</th>
							<th ng-show="tableWebService">Web Service</th>
							<th ng-show="tableVolume">Volume</th>
							<th ng-show="tableDownloadable">Downloadable</th>
							<th ng-show="tablePurpose">Purpose</th>
							<th ng-show="tableStatus">Status</th>
						</tr>
					</thead>
					<tbody>
						<div ng-show="!filterSearchActive">
							<tr ng-repeat="repository in results.dataRepositories.repositories" ng-show="showData($index)">

								<td ng-show="tableRepository"> 
									<a ng-href="{{repository.url}}" target="_blank">
										{{ repository.repository }} 
									</a>
								</td>
								<td ng-show="tableType"> {{ repository.type }} </td>
								<td ng-show="tableWebService"> {{ repository.webService }} </td>
								<td ng-show="tableVolume"> {{ repository.volume }} </td>
								<td ng-show="tableDownloadable"> {{ repository.downloadable }} </td>
								<td ng-show="tablePurpose"> {{ repository.purpose }} </td>

								<td ng-show="tableStatus"> 
									<div ng-show="repository.status == 1">
										<img src="images/on.svg" />
									</div>
									<div ng-show="repository.status == 0">
										<img src="images/off.svg" />
									</div>
								</td>
							</tr>
						</div>
						<div ng-show="filterSearchActive">
							<tr ng-repeat="repository in resultsFilterType" ng-show="showData($index)">
								<td ng-show="tableRepository"> {{ repository.repository }} </td>
								<td ng-show="tableType"> {{ repository.type }} </td>
								<td ng-show="tableWebService"> {{ repository.webService }} </td>
								<td ng-show="tableVolume"> {{ repository.volume }} </td>
								<td ng-show="tableDownloadable"> {{ repository.downloadable }} </td>
								<td ng-show="tablePurpose"> {{ repository.purpose }} </td>
								<td ng-show="tableStatus"> 
									<div ng-show="repository.status == 1">
										<img src="images/on.svg" />
									</div>
									<div ng-show="repository.status == 0">
										<img src="images/off.svg" />
									</div>
								</td>
							</tr>
						</div>
					</tbody>
				</table>

		 		</div>
	  			<div ng-show="!results.successRepositories"> Loading...</div>
	  			<!-- END OF SHOW DATA REPOSITORIES -->
		    </div><!-- div end of tab contesnt datas -->

		    
		</div><!-- end of tab -->


	</div></div></div>
<?php include('tools/footer.php'); ?>
