<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $body = $_POST["body"];

    try{
        require_once "dbh.inc.php";

        $query = "INSERT INTO feedbacks (name, email, feedback) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$name, $email, $body]);
        $pdo = null;

        header("Location: ../feedback.php");
        die();
    } catch(PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

} else {
    header("Location: ../index.php");
}