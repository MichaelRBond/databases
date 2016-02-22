<?php

require "engineHeader.php";

$localvars->set("subjects",lists::subjects());

$localvars = localvars::getInstance();
$localvars->set("adminDisplay","display:none;");
$localvars->set("letters",lists::letters());

$dbObject  = new databases;
$databases = $dbObject->getByType(array("newDatabase","trialDatabase"));

$localvars->set("highlighted_databases",lists::databases($databases));

templates::display('header'); 

?>

<style>
.sticky-header {
	display: none;
}
</style>

<!-- Homepage Content -->
<h2>Database Search</h2>
<div id="searchBox">
	<form class="search-wrap" method="get" action="/databases/search/" id="dbn_form">
		<label for="dbn" class="hidelabel">Label</label>
		<input id="dbn" name='q' type='text' placeholder="Databases by Name..." class="search-field" size="21" maxlength="120" />
		<button class="search-button"><i class="fa fa-search"></i>Search</button>
	</form>
</div>

<h2>Databases by Title</h2>
{local var="letters"}

<?php recurseInsert("leftnav.php","php") ?>

<div style="clear:both;"></div>

<h2>Databases by Subject</h2>
{local var="subjects"}

<!-- <script type="text/javascript" src="http://s3.amazonaws.com/new.cetrk.com/pages/scripts/0008/8415.js"> </script> -->

<?php
templates::display('footer'); 
?>