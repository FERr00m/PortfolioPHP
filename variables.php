<?

function queryInDB($db, $table) {
  $stmt = $db->prepare("SELECT * FROM $table");
  $stmt->execute();
  return $stmt;
}

$aboutData = queryInDB($dbh, 'about')->fetch();
$educationData = queryInDB($dbh, 'education');
$langData = queryInDB($dbh, 'languages');
$interestData = queryInDB($dbh, 'interest');
$aboutCareer = queryInDB($dbh, 'aboutcareer')->fetch();
$career = queryInDB($dbh, 'career');
$projects = queryInDB($dbh, 'projects');
$skills = queryInDB($dbh, 'skills');