<?php
require 'db.php';
$sql = 'SELECT * FROM books WHERE booksname=?';
$statement = $connection->prepare($sql);
$booksname = $statement->fetch(PDO::FETCH_OBJ);

$message = '';
if (isset($_POST['booksname']) && isset($_POST['booksname']) && isset($_POST['bookdescription']) && isset($_POST['bookprice']) && isset($_POST['[bookstatus'])){
    $booksname = $_POST['booksname'];
    $authorname = $_POST['authorname'];
    $categoryname = $_POST['categoryname']; 
    $publishername = $_POST['publishername']; 
    $bookprice = $_POST['bookprice']; 
    $bookstatus = $_POST['bookstatus']; 
    $sql = "UPDATE customer SET authorname=?, categoryname=?, publishername=?,bookdescription=?, bookprice=?, bookstatus=?  WHERE booksname=?";
    $statement = $connection->prepare($sql);
    if($statement->execute([$booksname,  $authorname, $categoryname, $publishername,$bookdescription, $bookprice, $bookstatus]))   {
        $message = 'แก้ไขข้อมูลหนังสือสำเร็จ';
        header("Location: books/booklist.php");
    }
}
?>

<?php require 'header.php'; ?>
<?php require 'navbar.php'; ?>

<div class="container">
  <div class = "card mt-4">
    <div class = "card-header">
    <h2>แก้ไขข้อมูลหนังสือ</h2>
    </div>
    <div class = "card-body">
    <?php if(!empty($message)): ?>
    <div class = "alert alert-success">
    <?= $message; ?>
    </div>
    <?php endif; ?>

      <form method="post">        
        <div class="form-group">
          <label for="">ชื่อหนังสือ</label>
          <input value="<?= $books->booksname; ?>" type="text" name="booksname" id="booksname" class="form-control" placeholder = 'ชื่อหนังสือ'  required ></div>
        <div class="form-group">
        <label for="">ผู้แต่ง</label>
            <select name=">authorname" id=">authorname" class="form-control" placeholder = 'ผู้แต่ง' required >
                <option value="">ผู้แต่ง</option>
                <option value="1">Haruki Murakami</option>
                <option value="2">Malcolm Gladwell</option>
                <option value="3">Meg Jay</option>
                <option value="4">นายแพทย์จางเหวินหง</option>
                <option value="5">Charles Duhigg</option>
                <option value="6">Higashino Keigo</option>
                <option value="7">Matthew Walker</option>
            </select></div>

        <div class="form-group"> 
          <label for="">ประเภทหนังสือ</label>
            <select name=">categoryname" id=">categoryname" class="form-control" placeholder = 'ประเภทหนังสือ' required >
                <option value="">ประเภทหนังสือ</option>
                <option value="1">นิยาย</option>
                <option value="2">จิตวิทยา/พัฒนาตนเอง</option>
                <option value="3">อาหารและสุขภาพ</option>
            </select></div>

        <div class="form-group">
          <label for="">สำนักพิมพ์</label>
          <select name=">publishername" id=">publishername" class="form-control" placeholder = 'ผู้แต่ง' required >
                <option value="">สำหนักพิมพ์</option>
                <option value="1">สำนักพิมพ์กำมะหยี</option>
                <option value="2">สำนักพิมพ์วิเสิร์น</option>
                <option value="3">สำนักพิมพ์ Amarin Health</option>
                <option value="4">น้ำพุสำนักพิมพ์</option>
                <option value="5">บุ๊คสเคป</option>
            </select></div>

            
        <div class="form-group">
          <label for="">คำอธิบายหนังสือ</label>
          <input value="<?= $books->bookdescription; ?>" type="textarea" name="bookdescription" id="bookdescription" class="form-control" placeholder = 'คำอธิบายหนังสือ' required ></div>
       
        <div class="form-group">
          <label for="">ราคา</label>
          <input value="<?= $books->bookprice; ?>" type="textbox" name="bookprice" id="bookprice" class="form-control" placeholder = 'ราคา THB' required ></div>   
          
          <div class="form-group">
        <label for="">สถานะการขาย</label>   
          <input type="radio" name="[name]" value="[ปกติ]">ปกติ
          <input type="radio" name="[name]" value="[เลิกจำหน่าย]">เลิกจำหน่าย
          </div>    
        
        <div class="form-group">
           <button type="submit" class="btn btn-info">บันทึกการแก้ไขข้อมูลหนังสือ</button></div>
      </form>
    </div>
  </div>
</div>

<?php require 'footer.php'; ?>