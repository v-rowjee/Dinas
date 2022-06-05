<?php 
ob_start();
$active = "sign-in";
include 'includes/header.php';

if(isset($_SESSION['id'])){
  header('location: index.php');
  die();
}

include 'config/g_auth.php';

$username = $password = "";
$usernameErr = $passwordErr = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

  require 'config/db_connect.php';

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

        $sql = "SELECT * FROM users WHERE username = ?";
        $statement = $conn->prepare($sql);
        $statement->execute([$username]);

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if (isset($user['username'])) {    // if username exist

            $hashed_password = $user['password'];

            if (password_verify($password,$hashed_password)) { // if password correct
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['phone'] = $user['phone'];
                $_SESSION['is_admin'] = $user['is_admin'];
                header('location: index.php');
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

<main style="padding: 100px 0;">
<div class="container">
  <div class="row justify-content-around gx-5">
    <div class="col-12 col-lg-5" data-aos="fade-right">
      <h2 style="font-size: 4rem;">Login</h2><hr>
      <h6 class="mt-5">
        Welcom back! To keep connected with us please login with your
        personal information by username and password.
      </h6>
      <h6 class="pt-3">No account yet? <a href="register.php">Create a new account now</a></h6>
      <a
        class="btn btn-outline-secondary my-4"
        href="<?php echo $client->createAuthUrl() ?>"
      >
        Sign in with google
      </a>
    </div>
    <div class="col-12 col-lg-5" data-aos="fade-left">
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
            pattern="[a-zA-Z0-9\._-]+"
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
            maxlength="16"
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

<?php 
include 'includes/footer.php';
ob_end_flush();
?>
