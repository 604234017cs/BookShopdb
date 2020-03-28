<?php
require 'db.php';
$booksname = $_GET['name'];
$sql = 'DELETE FROM books WHERE booksname=?';
$statement = $connection->prepare($sql);
if ($statement->execute([$booksname])) {
  header("Location: books/BookList.php");
}