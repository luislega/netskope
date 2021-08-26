<?php
require_once '../includes/db.php';

$queryComments = "
  SELECT
    *
  FROM
    comments
  ORDER BY
    id DESC
";

$commentsResult = $mysqli->query($queryComments) or die($mysqli->error.__LINE__);

$comments = [];

if ($commentsResult->num_rows > 0) {
  while($row = $commentsResult->fetch_assoc()) {
    if(!isset($comments['film_id_'.$row['film_id']]))
      $comments['film_id_'.$row['film_id']] = [];
    
    $comments['film_id_'.$row['film_id']][] = [
      'comment' => [
        'commenter' => $row['commenter_name'],
        'comment' => $row['comment'],
      ]
    ];
  }
}

$queryFilms = "
  SELECT
    *
  FROM films
";

$filmsResult = $mysqli->query($queryFilms) or die($mysqli->error.__LINE__);

$films = [];

if ($filmsResult->num_rows > 0) {
  while($row = $filmsResult->fetch_assoc()) {
    $row['comments'] = $comments['film_id_'.$row['id']];
    $films[] = $row;
  }
}

echo $json_response = json_encode($films);
