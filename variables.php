<?

function queryInDB($connect, $table) {
  return $connect->query("SELECT * FROM $table");
}

$aboutData = queryInDB($dbh, 'about')->fetch();
$educationData = queryInDB($dbh, 'education');
$langData = queryInDB($dbh, 'languages');
$interestData = queryInDB($dbh, 'interest');
$aboutCareer = queryInDB($dbh, 'aboutcareer')->fetch();
$career = queryInDB($dbh, 'career');
$projects = queryInDB($dbh, 'projects');
$skills = queryInDB($dbh, 'skills');