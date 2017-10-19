<div class="menu-filters" ng-show="showFilters">
	<div class="selectTables">
		<span class="firstFilter">Tool Information</span>
			<div class="titleFilters"> Filters Tools </div>
			<div class="filersMenu">
				<ul class="listFilters">
					<li>
						<input type="checkbox" id="tableTool" ng-model="tableTool"  indeterminate="true" ng-indeterminate-value="true"/>
						<label for="tableTool"> Tool</label>
					</li>
					<li>
						<input type="checkbox" id="tableOsInfrastructure" ng-model="tableOsInfrastructure"  indeterminate="true" ng-indeterminate-value="true"/>
						<label for="tableOsInfrastructure"> Os infrastructure</label>
					</li>
					<li>
						<input type="checkbox" id="tablePublicPrivate" ng-model="tablePublicPrivate"  indeterminate="true" ng-indeterminate-value="true"/>
						<label for="tablePublicPrivate"> Public/Private</label>
					</li>
					<li>
						<input type="checkbox" id="tableLanguage" ng-model="tableLanguage"  indeterminate="true" ng-indeterminate-value="true"/>
						<label for="tableLanguage"> Language</label>
					</li>
					<li>
						<input type="checkbox" id="tableInputs" ng-model="tableInputs"  indeterminate="true" ng-indeterminate-value="true"/>
						<label for="tableInputs"> Inputs</label>
					</li>
					<li>
						<input type="checkbox" id="tableOutputs" ng-model="tableOutputs"  indeterminate="true" ng-indeterminate-value="true"/>
						<label for="tableOutputs"> Outpus</label>
					</li>
					<li>
						<input type="checkbox" id="tableMainFeatures" ng-model="tableMainFeatures"  indeterminate="true" ng-indeterminate-value="true"/>
						<label for="tableMainFeatures"> Main Features</label>
					</li>
					<li>
						<input type="checkbox" id="tableToolPurpose" ng-model="tableToolPurpose"  indeterminate="true" ng-indeterminate-value="true"/>
						<label for="tableToolPurpose"> Purpose</label>
					</li>
					<li>
						<input type="checkbox" id="tableToolStatus" ng-model="tableToolStatus"  indeterminate="true" ng-indeterminate-value="true"/>	
						<label for="tableToolStatus"> Status</label>
					</li>
				</ul>
				<label>
					<span class="titleSelectFilter">Search in Category:</span>
					<form class="form-inline searchTypeFilter">
						<select class="form-control" ng-model="typeSearchFilterTools" >
							<option value="" selected> Select type </option>
							<option ng-repeat="(key, value) in results.dataFamilies.family" 
									value="{{ key }}">
									{{ value.name }}
							</option>
						</select>
						<select class="form-control" ng-model="categorySearchFilterTools" >
							<option value="" selected> Select Category </option>
							<option ng-repeat="categoryTool in dataCategoryTool" value="{{ categoryTool.value }}">{{ categoryTool.name }}</option>
						</select>

						<input class="form-control input-sm" type="text" ng-model="criteriaTool" ng-change="searchFilterTool(criteriaTool)">
					</form>
				</label>
			</div>
	</div>
	
</div>