<?php

use Opis\JsonSchema\{
    Validator,
    ValidationResult,
    Errors\ErrorFormatter,
};

// function to get menu cards of a category
function getMenu($category){

    $json = getData();  // function to get all menu from DB in json format

    $data = json_decode($json,false);   // Convert JSON into PHP object

    foreach($data as $menu){
        if(strtolower($menu->category) == $category){
            echo '
                <div class="col-sm-6 col-lg-3 col-xxl-3">
                    <div class="card card-shadow card-tilt">
                    <img
                        src="/dinasadmin/images/menu/'.$menu->img.'"
                        class="card-img-top"
                        alt="'.$menu->name.'"
                    />
                    <div class="card-body">
                        <h5 class="card-title nowrap">'.$menu->name.'</h5>
                        <p class="card-text">'.$menu->caption.'</p>
                        <div class="d-flex">
                            <h6 class="price">Rs '.$menu->price.'</h6>
                        </div>
                    </div>
                    </div>
                </div>
            ';
        }
    }
}

// function to get a list of menu names for a category
function getMenuList($category){

    $json = getData();

    $data = json_decode($json,false);

    $items = array();
    foreach($data as $menu){
        if(strtolower($menu->category) == $category){
            array_push($items, $menu->name);
        }
    }
    $list = implode(' - ', $items);
    echo $list;
}

// function to get all menu from DB in json format
function getData(){

    require 'config/db_connect.php';

    $sql = "SELECT * FROM menu";
    $query = $conn->prepare($sql);
    $query->execute();
    $array_result = $query->fetchAll(PDO::FETCH_ASSOC);

    $data = json_encode($array_result, JSON_NUMERIC_CHECK);

    // $data = JSONSchemaValidator($data);

    return $data;
}

function JSONSchemaValidator($json){
    // Create a new validator
    $validator = new Validator();

    // Register our schema
    $validator->resolver()->registerFile(
        'http://localhost/schema/menu.json', 
        '/schema/menu.json'
    );

    $data = json_decode($json);

    /** @var ValidationResult $result */
    $result = $validator->validate($data, 'http://localhost/schema/menu.json');

    if ($result->isValid()) {
        // echo "Valid", PHP_EOL;
        return $json;
    } else {
        // Print errors
        print_r((new ErrorFormatter())->format($result->error()));
        return $json;
    }

    return $json;
}