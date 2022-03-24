<?php
ob_start();
$active = "profile"; 
include 'includes/header.php';

$username = $_SESSION['username'];
$password = '';
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$phone = $_SESSION['phone'];

?>

<main style="margin: 100px 0;">
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-12 col-md-6">
                <div class="card bg-dark p-3">
                    <div class="card-header">
                        <h2>User Details</h2>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control mb-3" value="<?php echo $username ?>">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label">New Password</label>
                                    <input type="text" class="form-control mb-3" value="<?php echo $password ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control mb-3" value="<?php echo $name ?>">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control mb-3" value="<?php echo $phone ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label">Email</label>
                                    <input type="mail" class="form-control mb-5" value="<?php echo $email ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <button type="submit" class="btn btn-danger w-100">Delete</button>
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-secondary w-100">Cancel</button>
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary w-100">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php 
include 'includes/footer.php';
ob_end_flush();
?>