<?php include 'layouts/header.php';

if(isset($_GET['delid'])){
    $delid = $_GET['delid'];
    $delete = $food->deleteFood($delid);
	echo $delete;
	
}
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">All Package</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item">Food</li>
        <li class="breadcrumb-item active" aria-current="page">Create Food</li>
      
    </ol>
    
    </div>
<a class="btn btn-success" href="create_food.php">Create New Menu</a>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Food Menu</h6>
            </div>
            <div class="table-responsive">
                <div>
                    <?php 
                        // if(isset($delete)){
                        //     echo $delete;
                        // }
                    ?>
                </div>
                <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Age Limit</th>
                        <th>menu Details</th>
                   
                        <th>Action</th>
                    </tr>
                </thead>
                </thead>
                <tbody>
                    <?php
                        $i = 0;
                        $view = $food->viewFood();
                        foreach($view as $value){
                    ?>
                    <tr>
                        <td><?php echo $i+1; ?></td>
                        <td><?php echo $value['age_limit']; ?></td>
                        <td><?php echo $value['menu']; ?></td>
                     
                        <td>
                            <a href="edit_food.php?foodid=<?php echo $value['id'] ;?>" class="btn btn-sm btn-info">Edit</a>
                            <a href="?delid=<?php echo $value['id'] ;?>" class="btn btn-sm btn-danger">Delete</a>
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