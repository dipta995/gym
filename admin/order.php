<?php include 'layouts/header.php';
 
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Order</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item">Order</li>
        <li class="breadcrumb-item active" aria-current="page">Order</li>
    </ol>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Order</h6>
            </div>
            <div class="table-responsive">
                <div>
                    <?php 
                        
                    ?>
                </div>
                <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>User Name</th>
                        <th>User Mobile</th>
                        <th>Package Name</th>
                  
                        <th>Month/price</th>
                        <th>Price</th>
                     
                 
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_GET['confirm'])) {
                        echo $confirm = $pack->confirmorder($_GET['confirm']);
                        
 
                     }
                        $i = 0;
                        $view = $pack->viewOrderadmin();
                        foreach($view as $value){
                    ?>
                    <tr>
                        <td><?php echo $i+1; ?></td>
                        <td><?php echo $value['first_name']; ?></td>
                        <td><?php echo $value['mobile']; ?></td>
                        <td><?php echo $value['pack_name']; ?></td>
                
                        <td><?php echo $value['month'].' Month ||'. $value['price']; ?> Taka</td>
                        <td><?php echo $value['price']-($value['price']*($value['discount']/100)); ?> Taka</td>

                       
                        <td>
                        <?php if ($value['status']==0) { ?>
                            <a href="?confirm=<?php echo $value['order_id']; ?>" class="btn btn-sm btn-info">Confirm</a>
                            
                      <?php   }elseif($value['status']==1){ echo "Confirm"; } ?>
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