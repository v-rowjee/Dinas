<?php 
$active = "sign-in";
include 'includes/header.php';
include 'includes/navbar.php';

if(isset($_SESSION['id']))
  header('location: index.php?id='.$_SESSION['id']);

$username = $password = "";
$usernameErr = $passwordErr = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

  require "includes/db_connect.php";

    // validating username
    if(empty($_POST['username']))
        $usernameErr = "* Required field";
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
        $passwordErr = "* Required field";
    else{
      $passwordErr = "";
      $password = filter($_POST['password']);
    }


    if($usernameErr=="" && $passwordErr==""){ // if no error...

        $sql = "SELECT * FROM users WHERE username = :username";
        $statement = $conn->prepare($sql);

        $statement->bindParam(':username',$username);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if (isset($user['username'])) {    // if username exist

            $hashed_password = $user['password'];

            if (password_verify($password,$hashed_password)) { // if password correct
                
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['phone'] = $user['phone'];
                $_SESSION['is-admin'] = $user['is-admin'];

                if($user['is_admin']=='yes') // admin
                    header('location: admin/dashboard.html');
                else // normal user
                    header('location: index.php?id='.$user['id']);

            } else
                $passwordErr = "* Invalid password";
        } else{
          $usernameErr = "* Username does not exists";
          $passwordErr = "* Required field";
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
      <h2 style="font-size: 4rem;">Login</h2><hr>
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
    <div class="col-12 col-lg-5 ">
      <form
        id="login-form"
        class="needs-validation mt-3"
        novalidate
        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
        method="POST"
      >
        <div class="mb-5">
          <label for="username" class="form-label">Username</label>
          <input
            type="text"
            class="form-control <?php if(isset($_POST['submit'])){if($usernameErr=="")echo "is-valid"; else echo "is-invalid";} ?>"
            name="username"
            maxlength="16"
            value="<?php echo $username; if(isset($_GET['u'])) echo $_GET['u'] ?>" 
          />
          <div class="invalid-feedback"><?php echo $usernameErr ?></div>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input
            type="password"
            class="form-control password <?php if(isset($_POST['submit'])){if($passwordErr=="")echo "is-valid"; else echo "is-invalid";} ?>"
            id="password"
            name="password"
          />
          <div class="invalid-feedback"><?php echo $passwordErr ?></div>
        </div>
        <div class="mb-5 form-check">
          <input type="checkbox" class="form-check-input" id="checkbox" />
          <label class="form-check-label" for="checkbox">Show password</label>
        </div>
        <button
          type="submit"
          name="submit"
          class="btn btn-primary text-dark w-100"
        >
          Login
        </button>
      </form>
    </div>
  </div>
</div>
</main>

<?php include 'includes/footer.php' ?>
