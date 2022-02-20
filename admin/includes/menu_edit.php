<?php 
include '../includes/db_connect.php';

$sql = "SELECT * FROM menu WHERE id = ?";
$query = $conn->prepare($sql);
$query -> execute([$_GET['id']]);
$item = $query->fetch(PDO::FETCH_ASSOC);

// error message
$msg = "";

// UPDATE ITEM
if(isset($_POST['save'])){

  // include 'includes/upload.php';

  $sql2 = "UPDATE menu SET name = :name , price = :price , caption = :desc , category = :category, img = :img WHERE id = :id";
  $query2 = $conn->prepare($sql2);
  $query2->execute([
    ':id' => $_GET['id'],
    ':name' => $_POST['name'],
    ':price' => $_POST['price'],
    ':desc' => $_POST['desc'],
    ':category' => $_POST['category'],
    ':img' => $_POST['img']
  ]);
  $msg = "Record saved";
}
// DELETE ITEM
else if(isset($_POST['delete'])){
  $sql3 = "DELETE FROM menu WHERE id = ?";
  $query3 = $conn->prepare($sql3);
  $query3->execute([$_GET['id']]);
}

?>
  <!--Container Main start-->
  <div class="container py-3">
      <div class="row h-75 g-4 mt-2">
        <div class="col-12 col-md-6  align-self-center">
          <img src="../images/menu/<?php echo $item['img'] ?>" class="img-edit" alt="...">
        </div>
        <div class="col-12 col-md-6 align-items-center">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="row g-5 mx-5">
            <div class="col-6">
              <a href="menu.php" class="btn btn-primary"><i class='bx bx-chevron-left'></i></a>
              <h2 class="btn btn-primary" style="opacity: 1;">Item ID <?php echo $item['id'] ?></h2>
            </div>
            <div class="col-6 text-end">
              <button type="submit" name="delete" class="btn btn-danger text-dark"><i class='bx bx-trash'></i></button>
              <button type="submit" name="save" class="btn btn-primary ms-2">Save</button>
            </div>
            <div class="col-6">
              <label class="form-label" for="">Name</label>
              <input type="text" name="name" class="form-control" value="<?php echo $item['name'] ?>">
            </div>
            <div class="col-6">
              <label class="form-label" for="">Price</label>
              <input type="number" name="price" class="form-control" value="<?php echo $item['price'] ?>">
            </div>
            <div class="col-12">
              <label class="form-label" for="">Description</label>
              <textarea class="form-control" name="desc" style="height: 4rem;"><?php echo $item['caption'] ?></textarea>
            </div>
            <div class="col-6">
              <label class="form-label" for="">Category</label>
              <input type="text" name="category" class="form-control" value="<?php echo $item['category'] ?>">
            </div>
            <div class="col-6">
              <label class="form-label" for="">Image URL</label>
              <input type="text" name="img" class="form-control" value="<?php echo $item['img'] ?>">
            </div>
          </form>
          <div class="msg mx-5"><?php echo $msg ?></div>
        </div>
      </div>
  </div>
  <!--Container Main end-->
<?php include 'includes/footer.php' ?>

