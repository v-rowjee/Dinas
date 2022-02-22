<?php 
include 'db_connect.php';

$sql = "SELECT * FROM menu WHERE id = ?";
$query = $conn->prepare($sql);
$query -> execute([$_GET['id']]);
$item = $query->fetch(PDO::FETCH_ASSOC);

if($query->rowCount() == 0)
  header('location: menu.php');

// error message
$msg = '';

// UPDATE ITEM
if(isset($_POST['save'])){

  // include 'includes/upload.php';

  // validation for all input

  $sql2 = "UPDATE menu SET name = :name , price = :price , caption = :desc , category = :category , img = :img WHERE id = :id";
  $query2 = $conn->prepare($sql2);
  $query2->execute([
    ':id' => $item['id'],
    ':name' => $_POST['name'],
    ':price' => $_POST['price'],
    ':desc' => $_POST['desc'],
    ':category' => $_POST['category'],
    ':img' => $_POST['img']
  ]);
  $msg = "Record saved";
  $sql = "SELECT * FROM menu WHERE id = ?";
  $query = $conn->prepare($sql);
  $query -> execute([$_GET['id']]);
  $item = $query->fetch(PDO::FETCH_ASSOC);
}
// DELETE ITEM
else if(isset($_POST['delete'])){
  $sql3 = "DELETE FROM menu WHERE id = ?";
  $query3 = $conn->prepare($sql3);
  $query3->execute([$_GET['id']]);

  header('location: menu.php');
}
// CANCEL CHANGES
else if(isset($_POST['cancel'])){
  header('location: menu.php');
}

$conn==null;

?>
  <!--Container Main start-->
  <div class="container py-3">
      <div class="row align-items-center" style="height: calc(100vh-2rem);">
        <div class="col-12 col-lg-5 ">
          <img src="../images/menu/<?php echo $item['img'] ?>" class="img-edit" style="transform: scale(0.8);" alt="...">
        </div>
        <div class="col-12 col-lg-7">
          <form action="" method="post" class="row gy-4 mx-5">
            <div class="col-12 col-sm-6">
              <h2 class="d-inline">Item <?php echo $item['id'] ?></h2>
            </div>
            <div class="col-12 col-sm-6 text-end">
              <p class="msg m-0 pt-2"><?php echo $msg ?></p>
            </div>
            <div class="col-12 col-lg-6">
              <label class="form-label" for="">Name</label>
              <input type="text" name="name" class="form-control" value="<?php echo $item['name'] ?>">
            </div>
            <div class="col-12 col-lg-6">
              <label class="form-label" for="">Price</label>
              <input type="number" name="price" class="form-control" value="<?php echo $item['price'] ?>">
            </div>
            <div class="col-12">
              <label class="form-label" for="">Description</label>
              <textarea class="form-control" name="desc" style="height: 4rem;"><?php echo $item['caption'] ?></textarea>
            </div>
            <div class="col-12 col-lg-6">
              <label class="form-label" for="">Category</label>
              <input type="text" name="category" class="form-control" value="<?php echo $item['category'] ?>">
            </div>
            <div class="col-12 col-lg-6 mb-5">
              <label class="form-label" for="">Image URL</label>
              <input type="text" name="img" class="form-control" value="<?php echo $item['img'] ?>">
            </div>
            <div class="col-4"><button type="submit" name="delete" class="btn btn-danger w-100"><i class='bx bx-trash'></i></button></div>
            <div class="col-4"><button type="submit" name="cancel" class="btn btn-primary w-100"><i class='bx bx-x'></i></button></div>
            <div class="col-4"><button type="submit" name="save" class="btn btn-primary w-100"><i class='bx bxs-save'></i></button></div>
      
          </form>
          
        </div>
      </div>
  </div>
  <!--Container Main end-->

