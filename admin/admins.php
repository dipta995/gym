<?php include 'layouts/header.php';

if (isset($_GET['deladmin'])) {
    $deladmin = $_GET['deladmin'];
    $delete = $create->deleteAdmin($deladmin);
    echo $delete;
}
?>

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Admin Details</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item active" aria-current="page">Admin Details</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Admin Details</h6>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>SL No.</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $i = 0;
                            $view = $create->adminList();
                            foreach ($view as $value) {
                            ?>
                                <tr>
                                    <td><?php echo $i += 1; ?></td>
                                    <td><?php echo $value['first_name']; ?></td>
                                    <td><?php echo $value['last_name']; ?></td>
                                    <td><?php echo $value['admin_email']; ?></td>
                                    <td><?php echo $value['phone']; ?></td>
                                    <td>
                                        <?php
                                        if ($value['admin_status'] == '0') {
                                            echo "Super Admin";
                                        } elseif ($value['admin_status'] == '1') {
                                            echo "Admin";
                                        } else {
                                            echo "Role Not found!";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="viewadmin.php?adminid=<?php echo $value['admin_id']; ?>" class="btn btn-sm btn-info">View</a>

                                        <?php if ($status == 0 || $adminid == $value['admin_id']) { ?>
                                            <a href="update_admin.php?adminid=<?php echo $value['admin_id']; ?>" class="btn btn-sm btn-success">Update</a>
                                            <?php if ($status == 0) { ?>
                                                <a onclick="return confirm('Are you sure to Delete?');" href="?deladmin=<?php echo $value['admin_id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                                            <?php } ?>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
</div>
<!---Container Fluid-->
<?php include 'layouts/footer.php'; ?>