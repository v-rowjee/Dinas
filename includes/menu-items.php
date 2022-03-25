<?php  
    include 'includes/db_connect.php';
    
    $sql = "SELECT * FROM menu WHERE category = ?";
    $query = $conn->prepare($sql);
    $query->execute([$category]);

    // array to store menu item name
    $items = array();

    while($menu = $query->fetch(PDO::FETCH_ASSOC)){
        
        if($active == 'menu'){
            echo '
                <div class="col-sm-6 col-lg-3 col-xxl-3">
                    <div class="card card-shadow">
                    <img
                        src="images/menu/'.$menu['img'].'"
                        class="card-img-top"
                        alt="'.$menu['name'].'"
                    />
                    <div class="card-body">
                        <h5 class="card-title nowrap">'.$menu['name'].'</h5>
                        <p class="card-text">'.$menu['caption'].'</p>
                        <div class="d-flex">
                            <h6 class="price">Rs '.$menu['price'].'</h6>
                            <a href="#" class="btn btn-outline-primary px-3 ms-auto card-cart"><i class="fa-solid fa-bag-shopping"></i></a>
                        </div>
                    </div>
                    </div>
                </div>
            ';
            
        }else if($active == 'index')
            array_push($items, $menu['name']); // store in array
    }
    if($active == 'index'){
        $list = implode(' - ', $items);
        echo $list;
    }