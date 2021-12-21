<?php include 'layouts/header.php';
 
if(isset($_GET['imageid'])){
    $imageid = $_GET['imageid'];
    $delete = $pack->removeImg($imageid);
	echo $delete;
	
}
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">All Employee</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item">Employee</li>
        <li class="breadcrumb-item active" aria-current="page">All Employee</li>
    </ol>
    </div>
    <a class="btn btn-success" href="createimages.php">Create New Image</a>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">All Employee</h6>
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
                        <th>Caption</th>
                        <th>Image</th>
                      
                        <th></th>
                    </tr>
                </thead>
                </thead>
                <tbody>
                    <?php
                        $i = 0;
                        $view = $emp->viewimage();
                        foreach($view as $value){
                    ?>
                    <tr>
                        <td><?php echo $i+=1; ?></td>
                       <td><?php echo $value['caption']; ?></td>
                        <td><img style="height: 60px; width: 60px;" src="<?php echo $value['image_link']; ?>" alt=""> </td>
                  
                        <td>
                            <a href="up_image.php?imageid=<?php echo $value['image_id'] ;?>" class="btn btn-sm btn-info">Update</a>
 
                            <a href="?imageid=<?php echo $value['image_id'] ;?>" class="btn btn-sm btn-danger">Delete</a>
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