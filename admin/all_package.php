<?php include 'layouts/header.php';
 
if(isset($_GET['delPackage'])){
    $delPackage = $_GET['delPackage'];
    $delete = $pack->deletePackage($delPackage);
	echo $delete;
	
}
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">All Package</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item">Package</li>
        <li class="breadcrumb-item active" aria-current="page">All Package</li>
    </ol>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">All Package</h6>
            </div>
            <div class="table-responsive">
                <div>
                    <?php 
                        if(isset($delete)){
                            echo $delete;
                        }
                    ?>
                </div>
                <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Package Name</th>
                        <th>Details</th>
                        <th>Month</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                </thead>
                <tbody>
                    <?php
                        $i = 0;
                        $view = $pack->viewPackage();
                        foreach($view as $value){
                    ?>
                    <tr>
                        <td><?php echo $i+1; ?></td>
                        <td><?php echo $value['pack_name']; ?></td>
                        <td><?php echo $value['details']; ?></td>
                        <td><?php echo $value['month']; ?></td>
                        <td><?php echo $value['price']; ?></td>
                        <td><?php echo $value['discount']; ?></td>
                        <td>
                            <a href="edit_package.php?packageid=<?php echo $value['package_id'] ;?>" class="btn btn-sm btn-info">Edit</a>
                            <a href="?delPackage=<?php echo $value['package_id'] ;?>" class="btn btn-sm btn-danger">Delete</a>
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
<?php include 'layouts/footer.php';?>