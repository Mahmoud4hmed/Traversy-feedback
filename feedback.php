<?php

  try {
    require_once "includes/dbh.inc.php";

    $query = "SELECT feedback FROM feedbacks";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $feedbacks = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $pdo = null;

  } catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Leave Feedback</title>
</head>
<body>
  <nav class="navbar navbar-expand-sm navbar-light bg-light mb-4">
    <div class="container">
      <a class="navbar-brand" href="index.php">Traversy Media</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
           <a class="nav-link" href="/feedback/index.php">Home</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="/feedback/feedback.php">Feedback</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="/feedback/about.php">About</a>
         </li>
        </ul>
      </div>
  </div>
</nav>

<main>
  <div class="container d-flex flex-column align-items-center">
   
    <h2>Feedback</h2>

    <?php
      foreach($feedbacks as $feedback) {
        echo '<div class="card my-3 w-75">
          <div class="card-body text-center">
            ' . $feedback["feedback"] . '
          </div>
        </div>';
        
      }
      
    ?>

  </div>
</main>

<footer class="text-center mt-5">
  Copyright &copy; 2024
</footer>
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>



