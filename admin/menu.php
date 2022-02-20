<?php 
$active= 'menu';
include_once 'includes/header.php';
if(!isset($_GET['id'])){
?>
  <!--Container Main start-->
  <div class="container py-3">
    <div class="d-flex align-items-center align-middle">

      <div class="me-auto">
        <h2>Menu</h2>
      </div>

      <!-- SEARCH BAR -->
      <?php
      include_once '../includes/db_connect.php';
      $search = "";
      $msg = "";
      if(isset($_POST['search-menu'])){
        $msg = "";

        $search = $_POST['search-input'];
        $sql = "SELECT * FROM menu WHERE name LIKE :search_name OR category = :search_cat ";
        $query = $conn->prepare($sql);
        $query->bindValue(':search_name', '%' . $search . '%');
        $query->bindParam(':search_cat',$search);
        $query->execute();

        if($query->rowCount() == 0){
          $msg = '<p class="msg ms-0">No Search Result for: "'.$search.'"</p>';
        }
      }
      else{
        $sql = "SELECT * FROM menu ORDER BY category DESC";
        $query = $conn->prepare($sql);
        $query->execute();
      }
      ?>
      <!-- SEARCH BAR -->
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
        <div class="input-group me-3">
          <input type="text" name="search-input" class="form-control" placeholder="Search item" value="<?php echo $search ?>">
          <button type="submit" name="search-menu" class="input-group-text" title="Search">
            <i class='bx bx-search'></i>
          </button>
        </div>

        <button type="submit" name="search-reset" class="input-group-text" title="Reset">
          <i class='bx bx-refresh'></i>
        </button>
      </form>
              
    </div>

    <!-- ITEMS -->
    <div class="row g-4 mt-3">
    <?php  

      echo $msg;

      while($item = $query->fetch(PDO::FETCH_ASSOC)){
          echo '
              <div class="col-sm-6 col-md-4 col-lg-3">
                <a href="menu.php?id='.$item['id'].'" class="card-link">
                  <div class="card shadow">
                    <img
                        src="../images/menu/'.$item['img'].'"
                        class="card-img-top"
                        alt="'.$item['name'].'"
                    />
                    <div class="card-img-overlay">
                      <p class="item-cat">'.$item['category'].'</p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">'.$item['name'].'</h5>
                        <p class="card-text">'.$item['caption'].'</p>
                        <h6 class="price">Rs '.$item['price'].'</h6>

                        <a href="menu.php?id='.$item['id'].'" class="btn btn-primary">
                          Edit <i class="bx bxs-edit-alt"></i>
                        </a>

                    </div>
                  </div>
                </a>
              </div>
          ';
      }
    ?>
    </div>
    
  </div>
  <!--Container Main end-->
<?php 
}else{
  include 'includes/menu_edit.php';
}
include 'includes/footer.php';
?>