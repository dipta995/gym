<?php include 'layouts/header.php';

if (isset($_GET['contactid'])) {
    $contactid = $_GET['contactid'];
    echo $cont->deleteContact($contactid);
}
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Contact List</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Contact</li>
            <li class="breadcrumb-item active" aria-current="page">Contact List</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Contact List</h6>
                </div>
                <div class="table-responsive">
                    <div>
                        <?php
                        if (isset($delete)) {
                            echo $delete;
                        }
                        ?>
                    </div>
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            $viewdata = $cont->viewContact();
                            foreach ($viewdata as $value) {
                            ?>
                                <tr>
                                    <td><?php echo $i += 1; ?></td>
                                    <td><?php echo $value['name']; ?></td>
                                    <td><?php echo $value['email']; ?></td>
                                    <td><?php echo $value['phone']; ?></td>
                                    <td><?php echo $value['message']; ?></td>
                                    <?php if ($status == 0) { ?>
                                        <td>
                                            <a href="?contactid=<?php echo $value['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    <?php } ?>
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