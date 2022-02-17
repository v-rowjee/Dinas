<?php $active= 'menu'; include_once 'includes/header.php' ?>
    <!--Container Main start-->
    <div class="container py-3">
      <h2>Menu</h2>
      <p>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae
        deleniti ad cum sit atque? Facilis laborum enim quod, quos ducimus iure
        voluptate! Deleniti voluptatum quia neque atque quaerat vel sed.
      </p>
      </br>
      <div class="row g-5 me-1">
      <?php  
        include_once '../includes/db_connect.php';
        $sql = "SELECT * FROM menu ORDER BY categorie DESC";
        $query = $conn->prepare($sql);
        $query->execute();

        while($item = $query->fetch(PDO::FETCH_ASSOC)){
            echo '
                <div class="col-sm-6 col-lg-3 col-xxl-3">
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