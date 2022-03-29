<?php
ob_start();
$active = "profile"; 
include 'includes/header.php';
include 'includes/db_connect.php';

if(isset($_SESSION['rid'])){

    $sql = "SELECT * FROM reservation WHERE id = ?";
    $query = $conn->prepare($sql);
    $query->execute([$_SESSION['rid']]);
    $res = $query->fetch(PDO::FETCH_ASSOC);
}
$msg='';

$username = $_SESSION['username'];
$password = '';
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$phone = $_SESSION['phone'];

if(isset($_POST['delete'])){
    $sql_d = "DELETE FROM users WHERE id = ?";
    $query_d = $conn->prepare($sql_d);
    $query_d->execute([$_SESSION['id']]);

    header('location: includes/logout.php');

}else if(isset($_POST['cancel'])){
    header('location: profile.php');

}else if(isset($_POST['save'])){

    $msg = '';
    
    $username = strtolower($_POST['username']);
    $password = $_POST['password'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    if($username == '') $msg="Username required";
    if($name == '') $msg="Name required";
    if($email == '') $msg="Email required";
    if($phone == '') $msg="Phone required";

    if($msg == ''){
        if(empty($_POST['password'])){
            $sql_u = "UPDATE users SET username = :username, name = :name, phone = :phone, email = :email WHERE id = :id";
            $query_u = $conn->prepare($sql_u);
            $query_u->execute([
                ':username' => $username,
                ':name' => $name,
                ':email' => $email,
                ':phone' => $phone,
                ':id' => $_SESSION['id']
            ]);
        }else{
            $hashed_password = password_hash($password,PASSWORD_DEFAULT);
            $sql_u = "UPDATE users SET username = :username, name = :name, phone = :phone, email = : email, password = :password WHERE id = :id";
            $query_u = $conn->prepare($sql_u);
            $query_u->execute([
                ':username' => $username,
                ':name' => $name,
                ':email' => $email,
                ':phone' => $phone,
                ':password' => $hashed_password,
                ':id' => $_SESSION['id']
            ]);
        }

        header('location: includes/logout.php');
    }
    
}

?>

<main style="margin: 100px 0;">
    <div class="container">
        <div class="row justify-content-around g-3">
            <!-- USER DETAILS -->
            <div class="col-12 col-md-6">
                <div class="card bg-grey shadow p-3">
                    <h2 class="ps-3">User Details</h2>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control mb-3" maxlength="16" name="username" value="<?php echo $username ?>" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label">New Password</label>
                                    <input type="text" class="form-control mb-3" name="password" value="<?php echo $password ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control mb-3" name="name" value="<?php echo $name ?>" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control mb-3" name="phone" value="<?php echo $phone ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label">Email</label>
                                    <input type="mail" class="form-control mb-3" name="email" value="<?php echo $email ?>" required>
                                </div>
                            </div>
                            <p class="msg text-center"><?php echo $msg ?></p>
                            <div class="row">
                                <div class="col-4">
                                    <button type="submit" name="delete" class="btn btn-danger w-100">Delete</button>
                                </div>
                                <div class="col-4">
                                    <button type="submit" name="cancel" class="btn btn-secondary w-100">Cancel</button>
                                </div>
                                <div class="col-4">
                                    <button type="submit" name="save" class="btn btn-primary w-100">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- RESERVATION -->
            <div class="col-12 col-md-4 ">
                <div class="card bg-grey shadow p-3">
                    <h2 class="mx-auto">Current Reservation</h2>
                    <?php if(isset($_SESSION['rid'])){ ?>
                        <div class="card-body">
                            <p class="gold"><i class="fa-solid fa-star mx-2"></i>ID <?php echo $res['id'] ?></p>
                            <p><i class="fa-solid fa-calendar-days mx-2"></i>Date <?php echo $res['date'] ?></p>
                            <p><i class="fa-solid fa-clock mx-2"></i>Time <?php echo $res['time'] ?> pm</p>
                            <p><i class="fa-solid fa-people-group mx-2"></i>Party Size  <?php echo $res['party_size'] ?></p>
                            <a href="reservation.php" class="nowrap btn btn-primary mt-3">View Reservation</a>
                        </div>
                    <?php }else{ ?>
                        <div class="card-body">
                            <a href="reservation.php" class="nowrap btn btn-primary mt-3">Make a Reservation</a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php 
include 'includes/footer.php';
ob_end_flush();
?>