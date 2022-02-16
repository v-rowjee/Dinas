<?php 
  ob_start();
  $active = "register";
  include 'includes/header.php';
  include 'includes/navbar.php';

  if(isset($_SESSION['id'])){
    header('location: index.php?id='.$_SESSION['id']);
    die();
  }
  
  else{

    require "includes/db_connect.php";


    $username = $password = $name = $email = $phone = "";
    $usernameErr = $passwordErr = $nameErr = $emailErr = $phoneErr = "";
    
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        //validating username
        if(empty($_POST['username']))
            $usernameErr = "* Username is required";
        else{
            $usernameErr = "";
            $username = filter($_POST['username']);

            if(!preg_match("/^[a-zA-Z0-9]+$/",$username)){
              $usernameErr = "* Only letters and numbers allowed";
              $passwordErr = "* Required field";
          }
        }
            
    
        // validating password
        if(empty($_POST['password']))
            $passwordErr = "* Password is required";
        else{
          $passwordErr = "";
          $password = filter($_POST['password']);
        }
    
    
        // validating name
        if(empty($_POST['name']))
            $nameErr = "* Required field";
        else{
            $nameErr = "";
            $name = filter($_POST['name']);
            if(!preg_match("/^[a-zA-Z\s\'.-]+$/",$name)){
                $nameErr = "* Only letters and white space allowed";
            }
        }
    
        // validating email
        if(empty($_POST['email']))
            $emailErr = "* Required field";
        else{
            $emailErr = "";
            $email = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
        }
        // validating phone
        if(empty($_POST['phone']))
            $phoneErr = "* Required field";
        else{
            $phoneErr = "";
            $phone = filter($_POST['phone']);
            if(!preg_match("/[\+\s0-9]{7,}/",$phone))
                $phoneErr = "* Invalid format";
        }
            
        // Checking if username available
        $check_sql = "SELECT * FROM users WHERE username = ?";
        $handler = $conn->prepare($check_sql);
        $handler->execute([$username]);   
        
        if($handler->rowCount()>0){
          $usernameErr = "* Username already exists";
    
        }else{
    
            if($usernameErr=="" && $passwordErr=="" && $nameErr=="" && $emailErr=="" && $phoneErr==""){ // if no error
    
              // encrypting password
              $password = password_hash($password,PASSWORD_DEFAULT);

                $sql = "INSERT INTO users (username,password,name,email,phone) VALUES (:username,:password,:name,:email,:phone)";
                $statement = $conn->prepare($sql);
    
                $statement->execute([
                    ':username' => $username,
                    ':password' => $password,
                    ':name' => $name,
                    ':email' => $email,
                    ':phone' => $phone
                ]);
        
                header('location: login.php?u='.$username);
                die();
            }
        }
    }
    $conn == null;
  }
    
  function filter($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
  }
    
?>

<main style="margin: 100px 0;">
<div class="container">
  <div class="row justify-content-around gx-5">
    <div class="col-12 col-lg-5">
      <h2 style="font-size: 4rem;">Register</h2><hr>
      <h6 class="mt-5">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque sunt
        voluptas veritatis explicabo temporibus iusto, tempore officiis
        repudiandae quae laborum obcaecati accusamus possimus eos sed beatae
        recusandae maiores quasi porro tempora.
      </h6>
      <!-- <a
        class="btn btn-outline-secondary mb-4"
        href="&lt;?php echo $client->createAuthUrl() ?>"
      >
        Sign in with google
      </a> -->
    </div>
    <div class="col-12 col-lg-5">
    <form class="needs-validation mt-3" novalidate action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <div class="mb-5">
          <label for="username" class="form-label">Username</label>
          <input
            type="text"
            class="form-control <?php if(isset($_POST['submit'])){if($usernameErr=="")echo "is-valid"; else echo "is-invalid";} ?>"
            name="username"
            maxlength="16"
            value="<?php echo $username ?>"
          />
          <div class="invalid-feedback"><?php echo $usernameErr?></div>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input
            type="password"
            class="form-control password <?php if(isset($_POST['submit'])){if($passwordErr=="")echo "is-valid"; else echo "is-invalid";}?>"
            id="password_"
            name="password"
            value="<?php echo $password ?>"
          />
          <div class="invalid-feedback"><?php echo $passwordErr ?></div>
        </div>
        <div class="mb-5 form-check">
          <input type="checkbox" class="form-check-input" id="checkbox_"/>
          <label class="form-check-label" for="checkbox"
            >Show password</label
          >
        </div>

        <hr>

        <div class="my-5">
          <label for="name" class="form-label">Name</label>
          <input
            type="text"
            class="form-control <?php if(isset($_POST['submit'])){if($nameErr=="")echo "is-valid"; else echo "is-invalid";}?>"
            name="name"
            value="<?php echo $name ?>"
          />
          <div class="invalid-feedback"><?php echo $nameErr ?></div>
        </div>

        <div class="mb-5">
          <label for="email" class="form-label">Email</label>
          <input
            type="email"
            class="form-control <?php if(isset($_POST['submit'])){if($emailErr=="")echo "is-valid"; else echo "is-invalid";}?>"
            name="email"
            value="<?php echo $email ?>"
          />
          <div class="invalid-feedback"><?php echo $emailErr ?></div>
        </div>

        <div class="mb-5">
          <label for="phone" class="form-label">Mobile Phone</label>
          <input
            type="tel"
            class="form-control <?php if(isset($_POST['submit'])){if($passwordErr=="")echo "is-valid"; else echo "is-invalid";}?>"
            name="phone"
            value="<?php echo $phone ?>"
          />
          <div class="invalid-feedback"><?php echo $phoneErr ?></div>
        </div>

        <button
          type="submit"
          name="submit"
          class="g-recaptcha btn btn-primary text-dark w-100"
        >
          Register
        </button>
      </form>
    </div>
  </div>
</div>
</main>

<?php 
include 'includes/footer.php';
ob_end_flush();
?>
