<?php
require "../engineHeader.php";

try {

	$validate = validate::getInstance();

	if (!$validate->integer($_GET['MYSQL']['id'])) {
		throw new Exception("Invalid Subject Provided.");
	}

	if (($subjectInfo = array_shift(subjects::get($_GET['MYSQL']['id']))) === FALSE) {
		throw new Exception("Error retrieving subject information");
	}
	else if (is_empty($subjectInfo)) {
		throw new Exception("Subject not found.");
	}

	$localvars->set("subjectsPage", $_GET['MYSQL']['id']);

	$localvars->set("databaseHeading",(!is_empty($subjectInfo['name']))?$subjectInfo['name']:"Invalid Subject");
	$localvars->set("subjectGuideDisplay",(!is_empty($subjectInfo['url']))?"inline-block":"none");
	$localvars->set("subjectGuideLink",(!is_empty($subjectInfo['url']))?$subjectInfo['url']:"");

	$dbObject  = new databases;
	$databases = $dbObject->getBySubject($_GET['MYSQL']['id']);
	$localvars->set("databases",lists::databases($databases));
}
catch(Exception $e) {
	
	errorHandle::errorMsg($e->getMessage());
	$localvars->set("prettyPrint",errorHandle::prettyPrint());

}

$localvars->set("letters",lists::letters());

templates::display('header'); 
?>

<!-- Page Content Goes Below This Line -->

{local var="prettyPrint"}

{local var="letters"}

<div style="clear:both;"></div>
<a href="{local var="subjectGuideLink"}" class="button" style="display: {local var="subjectGuideDisplay"}">Subject Guide</a>
<div style="clear:both;"></div>

<div class="database-content-holder">

{local var="databases"}

</div>

<!-- Page Content Goes Above This Line -->

<?php
templates::display('footer'); 
?>