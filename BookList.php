<?php
require 'db.php';
$sql = 'SELECT books.BookId,categories.CategoryName,authors.AuthorName,publishers.PublisherName,
books.BookName,books.BookDescription,books.BookPrice,books.BookStatus,books.BookISBN,books.BookNumPages 
 FROM books,authors,categories,publishers
 WHERE books.CategoryID=categories.CategoryID 
 AND books.AuthorID=authors.AuthorID 
 AND books.PublisherID=publishers.PublisherID';


$statement = $connection->prepare($sql);
$statement->execute();
$books = $statement->fetchAll(PDO::FETCH_OBJ);
?>


 



<?php require 'header.php'; ?>
<?php require 'navbar.php'; ?>

<div class="container-fluid">
  <div class="card mt-5">
    <div class="card-header">
      <h2>ข้อมูลหนังสือ</h2>
      <a href="add.php" class='btn btn-info'>เพิ่มหนังสือ</a>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
            <!-- ชื่อที่จะเเสดงในตาราง -->
          <th>ชื่อหนังสือ</th>
          <th>ผู้แต่ง</th>
          <th>ประเภทหนังสือ</th>
          <th>สำนักพิมพ์</th>
          <th>คำอธิบายหนังสือ</th>
          <th>ราคา</th>
          <th>สถานะการขาย</th>
        </tr>
        <?php foreach($books as $books): ?>
          <tr>
            
             <!-- สร้างใชื่อห้เหมือนในฐานข้อมูล -->
            <td><?= $books->BookName; ?></td> 
            <td><?= $books->AuthorName; ?></td> 
            <td><?= $books->CategoryName; ?></td> 
            <td><?= $books->PublisherName; ?></td>  
            <td><?= $books->BookDescription; ?></td> 
            <td><?= $books->BookPrice; ?></td> 
            <td><?= $books->BookStatus; ?></td>   
            <td>
              <a href="edit.php?id=<?= $books->booksname?>" class="btn btn-info">แก้ไข</a>
              <a onclick="return confirm('ต้องการลบหรือไม่?')" 
              href="delete.php?id=<?= $books->booksname?>" class='btn btn-danger'>ลบ</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>




<?php require 'footer.php'; ?>
