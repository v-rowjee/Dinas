<?php
ob_start();
$active = "profile"; 
include 'includes/header.php';
include 'config/db_connect.php';

if(isset($_SESSION['rid'])){

    $sql = "SELECT * FROM reservation WHERE id = ?";
    $query = $conn->prepare($sql);
    $query->execute([$_SESSION['rid']]);
    $res = $query->fetch(PDO::FETCH_ASSOC);
}

if(isset($_POST['delete'])){
    $sql_d = "DELETE FROM users WHERE id = ?";
    $query_d = $conn->prepare($sql_d);
    $query_d->execute([$_SESSION['id']]);

    header('location: includes/logout.php');
}

$username = $_SESSION['username'];
$password_old = '';
$password_new = '';
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$phone = $_SESSION['phone'];

?>

<main style="padding: 100px 0;">
    <div class="container">
        <div class="row justify-content-around g-3">
            <!-- USER DETAILS -->
            <div class="col-12 col-lg-6">
                <div class="card bg-grey shadow p-3" data-aos="fade-right">
                    <h2 class="ps-3">User Details</h2>
                    <div class="card-body">
                        <form action="" method="post" id="form-profile">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control mb-3" maxlength="16" pattern="[a-zA-Z0-9\._-]+" name="username" value="<?php echo $username ?>" required>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control mb-3" maxlength="24" pattern="[a-zA-Z\s]+" name="name" value="<?php echo $name ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <label class="form-label">Email</label>
                                    <input type="mail" class="form-control mb-3" name="email" value="<?php echo $email ?>" required>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control mb-3" pattern="[0-9\s\.]+" maxlength="16" name="phone" value="<?php echo $phone ?>">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control mb-3" maxlength="16" name="password_old" value="<?php echo $password_old ?>" required>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <label class="form-label">New Password</label>
                                    <input type="password" class="form-control mb-3" maxlength="16" name="password_new" value="<?php echo $password_new ?>">
                                </div>
                            </div>
                            <hr>
                            <p class="msg text-center" id="msg"></p>
                            <div class="row mt-4">
                                <div class="col-4">
                                    <button type="submit" name="delete" class="btn btn-danger w-100">Delete</button>
                                </div>
                                <div class="col-4">
                                    <button id="cancel" class="btn btn-secondary w-100">Cancel</button>
                                </div>
                                <div class="col-4">
                                    <button id="save" class="btn btn-primary w-100">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- LHS -->
            <div class="col-12 col-lg-4">
                <!-- RESERVATION -->
                <div class="card bg-grey shadow p-3" data-aos="fade-left">
                    <h2 class="ms-2">Current Reservation</h2>
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

                <div class="card bg-grey shadow p-3 mt-5" data-aos="fade-left">
                    <h2 class="ms-2">See You Soon!</h2>
                    <div class="card-body">
                        <a href="includes/logout.php" class="nowrap btn btn-primary mt-3">Sign Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    $('#cancel').click((e)=>{
        e.preventDefault()
        window.location.href = "/dinas/"
    })
    $('#save').click((e)=>{
        e.preventDefault()
        var p_old = $('#form-profile input[name="password_old"]').val().trim()
        var p_new = $('#form-profile input[name="password_new"]').val().trim()

        if(p_old === ''){
            $('#msg').html('Enter your password to continue')
        }
        else if(!p_old === '' && p_new === ''){
            $('#msg').html('New password should be filled')
        }
        else{
            $.ajax({
                url: "ajax/profile-update.php",
                method: "POST",
                data: $('#form-profile').serialize(),
                success: (data)=>{
                    $('#msg').html(data)
                }
            })
        }
    })
</script>

<?php 
include 'includes/footer.php';
ob_end_flush();
?>