<div class="menu-filters" ng-show="showFilters">
	<div class="selectTables">
		<span class="firstFilter"> Data Repositories</span>
			<div class="titleFilters"> Filters Data </div>
			<br/>
			<div class="filersMenu">
				<ul class="listFilters">
					
					<li>
						<input type="checkbox" id="typeData" ng-model="tableType"  indeterminate="true" ng-indeterminate-value="true" /> 
						<label for="typeData">Type</label>
					</li>
					<li>
						<input type="checkbox" id="webServiceData" ng-model="tableWebService"  indeterminate="true" ng-indeterminate-value="true" />
						<label for="webServiceData">  Web Service </label>
					</li>
					<li>
						<input type="checkbox" id="repositoryData" ng-model="tableRepository"  indeterminate="true" ng-indeterminate-value="true" />
						<label for="repositoryData">  Repository </label>
					</li>
					<li>
						<input type="checkbox" id="volumeData" ng-model="tableVolume"  indeterminate="true" ng-indeterminate-value="true" />
						<label for="volumeData">  Volume </label>
					</li>
					<li>
						<input type="checkbox" id="downloadableData" ng-model="tableDownloadable"  indeterminate="true" ng-indeterminate-value="true" />
						<label for="downloadableData">  Downloadable </label>
					</li>
					<li>
						<input type="checkbox" id="purposeData" ng-model="tablePurpose"  indeterminate="true" ng-indeterminate-value="true"/>
						<label for="purposeData">  Purpose </label>
					</li>
					<li>
						<input type="checkbox" id="statusData" ng-model="tableStatus"  indeterminate="true" ng-indeterminate-value="true"/>
						<label for="statusData">  Status </label>
					</li>
				</ul>
				<label>
					<span class="titleSelectFilter">Search in Category:</span>
					<form class="form-inline searchTypeFilter">
						<select class="form-control" ng-model="categorySearchFilterData" >
							<option value="" selected> Select type </option>
							<option ng-repeat="category in dataCategory" value="{{ category.value }}">{{ category.name }}</option>
						</select>
						<input class="form-control input-sm" type="text" ng-model="criteria" ng-change="searchFilterData(criteria)">
					</form>
				</label>

			</div>
		
	</div>
	
</div>