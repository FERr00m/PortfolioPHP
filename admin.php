<?

session_start();

if (!$_SESSION['login'] || !$_SESSION['password'] || $_POST['exit']) {
  session_destroy();
  header('Location: login.php');
  die();
} else {
  
  require 'db.php';

  if (count($_POST) > 0) {
    header('Location: admin.php');
  }

  $comments = $dbh->query("SELECT * FROM comments WHERE moderation='new'");

}

?>



<h1>Привет, <?=$_SESSION['login']?></h1>
<form method="post">
  <input type="submit" value="exit" name="exit">
</form>


<h2>Комменты для редакции</h2>

<form method="post">
  <? foreach ($comments as $comment): ?>
  <select name="<?=$comment['id']?>" id="<?=$comment['id']?>">
    <?
      if ($_SESSION['login'] == 'admin') {
        echo '<option value="ok">OK</option>';
        echo '<option value="rejected">rejected</option>';
      } else {
        echo '<option value="rejected">rejected</option>';
      }
      
    ?>
    
  </select>
  <label for="<?=$comment['id']?>"><?=$comment['comment']?></label><br>
  <? endforeach;?>
  <button>Moderate</button>
</form>

<?
foreach ($_POST as $id => $checked) {
  if ($checked == 'ok') {
    $dbh->query("UPDATE comments SET moderation='ok' WHERE id=$id");
  } else {
    $dbh->query("UPDATE comments SET moderation='rejected' WHERE id=$id");
  }
}

?>