<?php

function getMenu($category){
    $filename = '../dinasadmin/json/menu.json';
    $data = file_get_contents($filename);
    $json = json_decode($data,true);

    foreach($json as $menu){
        if(strtolower($menu['category']) == $category){
            echo '
                <div class="col-sm-6 col-lg-3 col-xxl-3">
                    <div class="card card-shadow card-tilt">
                    <img
                        src="/dinasadmin/images/menu/'.$menu['img'].'"
                        class="card-img-top"
                        alt="'.$menu['name'].'"
                    />
                    <div class="card-body">
                        <h5 class="card-title nowrap">'.$menu['name'].'</h5>
                        <p class="card-text">'.$menu['caption'].'</p>
                        <div class="d-flex">
                            <h6 class="price">Rs '.$menu['price'].'</h6>
                        </div>
                    </div>
                    </div>
                </div>
            ';
        }
    }
}

function getMenuList($category){
    $filename = '../dinasadmin/json/menu.json';
    $data = file_get_contents($filename);
    $json = json_decode($data,true);

    $items = array();
    foreach($json as $menu){
        if(strtolower($menu['category']) == $category){
            array_push($items, $menu['name']);
        }
    }
    $list = implode(' - ', $items);
    echo $list;
}