<?php
require_once '../includes/db.php';

if(
    isset($_GET['filmID']) &&
    isset($_GET['commenter']) &&
    isset($_GET['comment'])
  ) {
    $filmID = $_GET['filmID'];
    $commenter = $_GET['commenter'];
    $comment = $_GET['comment'];

    $query = "
      INSERT INTO comments
        (film_id, commenter_name, comment)
      VALUES
        ($filmID, '$commenter', '$comment'); 
    ";

    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);

    return $result;

  }
