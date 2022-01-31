<?php  
    include_once 'includes/db_connect.php';
    $sql = "SELECT * FROM menu WHERE categorie = :cat";
    $query = $conn->prepare($sql);
    $query->bindParam(':cat',$categorie);

    $query->execute();
    
    $rows = $query->rowCount();

    while($menu = $query->fetch(PDO::FETCH_ASSOC)){
        echo '
        <div class="col-sm-6 col-lg-3 col-xxl-3">
            <div class="card">
            <img
                src="images/'.$menu['img'].'"
                class="card-img-top"
                alt="..."
            />
            <div class="card-body">
                <h5 class="card-title">'.$menu['name'].'</h5>
                <p style="font-size: 0.8rem" class="card-text readMore">'.$menu['caption'].'</p>
                <h6 class="price">Rs '.$menu['price'].'</h6>
                <a href="#" class="btn btn-primary">Buy now</a>
            </div>
            </div>
        </div>
        ';
    }