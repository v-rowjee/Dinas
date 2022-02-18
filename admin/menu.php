<?php $active= 'menu'; include_once 'includes/header.php' ?>
    <!--Container Main start-->
    <div class="container py-3">
      <div class="d-flex align-items-center align-middle">

        <div class="me-auto">
          <h2>Menu</h2>
        </div>

        <?php
        include_once '../includes/db_connect.php';
        $search = "";
        $msg = "";
        if(isset($_POST['search-menu'])){
          $msg = "";

          $search = $_POST['search-input'];
          $sql = "SELECT * FROM menu WHERE name LIKE :search_name OR categorie = :search_cat ";
          $query = $conn->prepare($sql);
          $query->bindValue(':search_name', '%' . $search . '%');
          $query->bindParam(':search_cat',$search);
          $query->execute();

          if($query->rowCount() == 0){
            $msg = '<p class="msg ms-0">No Search Result for: "'.$search.'"</p>';
          }
        }
        else{
          $sql = "SELECT * FROM menu ORDER BY categorie DESC";
          $query = $conn->prepare($sql);
          $query->execute();
        }
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
          <div class="input-group me-3">
            <input type="text" name="search-input" class="form-control" placeholder="Search item" value="<?php echo $search ?>">
            <button type="submit" name="search-menu" class="input-group-text" title="Search">
              <i class='bx bx-search'></i>
            </button>
          </div>

          <button type="submit" name="search-refresh" class="input-group-text me-3" title="Refresh">
            <i class='bx bx-refresh'></i>
          </button>
        </form>
                
      </div>

      <div class="row g-4 mt-3">
      <?php  

        echo $msg;

        while($item = $query->fetch(PDO::FETCH_ASSOC)){
            echo '
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card">
                    <img
                        src="../images/'.$item['img'].'"
                        class="card-img-top"
                        alt="'.$item['name'].'"
                    />
                    <div class="card-body">
                        <h5 class="card-title">'.$item['name'].'</h5>
                        <p class="card-text">'.$item['caption'].'</p>
                        <h6 class="price">Rs '.$item['price'].'</h6>
                        <a href="#" class="btn btn-primary">Edit</a>
                    </div>
                    </div>
                </div>
            ';
        }
      ?>
      </div>
      
    </div>
    <!--Container Main end-->
<?php include 'includes/footer.php' ?>