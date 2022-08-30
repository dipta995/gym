<?php include 'layouts/header.php';

if (isset($_POST['submit'])) {
    echo "<script> window.location='index.php'; </script>";
}
?>

<?php
$status = $_SESSION['admin_status'];
$adminid = $_SESSION['admin_id'];
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-right justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Admin Profile</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Admin</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <?php
                        $query = "select * from admin_table where admin_status = $status AND admin_id = $adminid";
                        $view = $create->select($query);
                        if ($view) {
                            while ($value = $view->fetch_assoc()) {

                        ?>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" value="<?php echo $value['first_name'] . " " . $value['last_name']; ?>">
                                </div>

                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input readonly name="admin_email" type="email" class="form-control" value="<?php echo $value['admin_email']; ?>">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">+8801</span>
                                    </div>
                                    <input value="<?php echo substr($value['phone'], 5); ?>" type="number" min=0 class="form-control" placeholder="" name="phone" aria-label="Username" aria-describedby="basic-addon1">
                                </div>

                                <div class="form-group">
                                    <label>Role</label>
                                    <div name="admin_status" type="text" class="form-control">
                                        <?php
                                        if ($value['admin_status'] == '0') {
                                            echo "Super Admin";
                                        } elseif ($value['admin_status'] == '1') {
                                            echo "Admin";
                                        } else {
                                            echo "Role Not found!";
                                        }
                                        ?>
                                    </div>
                                </div>
                        <?php }
                        } ?>
                        <button type="submit" name="submit" class="btn btn-primary">OK</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<!---Container Fluid-->
<?php include 'layouts/footer.php'; ?>