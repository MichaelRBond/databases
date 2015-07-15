<?php

$localvars = localvars::getInstance();
$localvars->set("currentStatus",status::build());

$localvars->set("resourceTypes",lists::resourceTypes());

// Figure out which popular databases we need.
$dbObject = new databases;
if ($localvars->get("subjectsPage")) {
	$popularDatabases = topPickDBs::getTopPicksForSubject($localvars->get("subjectsPage"));
}
else {
	$popularDatabases = $dbObject->getByType("popular");
}

$alumniDBs = count($dbObject->getByType("alumni"));
$newDBs    = count($dbObject->getByType("newDatabase"));
$trialDBs  = count($dbObject->getByType("trialDatabase"));

$localvars->set("popular",lists::popular($popularDatabases));


?>

<div id="sidebar">
	<div id="facets">
		<h2>Narrow Your Results</h2>
		<ul>
			<?php if (count($popularDatabases)) { ?>
			<li>
				<span class="facets-header">Start Here / Top Picks<span class="facetToggle">+</span></span>
				{local var="popular"}
			</li>
			<?php } ?>
			<?php if ($alumniDBs || $newDBs || $trialDBs) { ?>
			<li><span class="facets-header">Types of Databases<span class="facetToggle">+</span></span>

				<ul>
					<?php if ($alumniDBs) { ?>
					<li><a href="{local var="databaseHome"}/type/alumni/">Alumni</a><i class="fa fa-angle-right"></i></li>
					<?php } ?>
					<?php if ($newDBs) { ?>
					<li><a href="{local var="databaseHome"}/type/new/">New</a><i class="fa fa-angle-right"></i></li>
					<?php } ?>
					<?php if ($trialDBs) { ?>
					<li><a href="{local var="databaseHome"}/type/trial/">Trial</a><i class="fa fa-angle-right"></i></li>
					<?php } ?>
				</ul>
			</li>
			<?php } ?>
			<li><span class="facets-header">Resource Types<span class="facetToggle">+</span></span>

				{local var="resourceTypes"}
			</li>
		</ul>
	</div>
</div>