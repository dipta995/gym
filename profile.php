<?php 
include 'layouts/header.php';
include 'layouts/nav.php';
?>

        
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper" style="padding-top: 100px;">
    <div class="row">
   
        <div class="col-md-4">
            <h6 class="m-0 font-weight-bold text-primary">My Profile</h6>
         
            <div class="card">
              
                 
            <?php 
            $birth="";
                 $view = $login->checkprofile();
                 foreach($view as $value){ 
            ?>
            
             <img style="margin-top 10px;height: 100px; width: 100px;margin-left:70px;border-radius: 50px;border: 2px solid #ffc800;" src=" <?php echo $value['image']; ?>" alt="">
                <span><b>Name:</b> <?php echo $value['first_name']." ".$value['last_name']; ?></span>
                 
                <span><b>Email Address:</b> <?php echo $value['email']; ?></span>
                <span><b>Date of Birth:</b> <?php echo $birth = $value['dob']; ?></span>
                <span><b>Gender:</b> <?php echo $value['gender']; ?></span>
                <span><b>Mobile:</b> <?php echo $value['mobile']; ?></span>
                <span><b>Parmanent Address:</b> <?php echo $value['address']; ?></span>
        <a style="float: right;" href="edit.php">edit</a>       
<?php } ?>

            </div>
             
        </div>
        <div class="col-lg-8 mb-4">
            <!-- Simple Tables -->
            <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">My Order</h6>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                         
                            <th>Package Name</th>
                           
                            <th>Month/Price</th>
                            <th>Final Price</th>
                            
                            <th>Discount</th>
                            <th>Expair at</th>
                           
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($_GET['delorder'])) {
                       echo $remove = $pack->removeorder($_GET['delorder']);


                    }
                $i = 0;
                $view = $pack->viewOrder();
                $count = mysqli_num_rows($view);
                if ($count>0) {
                foreach($view as $value){ 
                    $i++;
            ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                 
                    
                            <td><?php echo $value['pack_name']; ?></td>
                            <td><?php echo $value['month'].' Month ||'. $value['price']; ?> Taka</td>
                        <td><?php echo $value['price']-($value['price']*($value['discount']/100)); ?> Taka</td>
                            <td><?php echo $value['discount']; ?>%</td>
                            <td><?php echo $effectiveDate = date('Y-m-d', strtotime("+".$value['month']." months", strtotime($value['created_at']))); ?></td>
                         <td>
                          <?php $date=date("Y-m-d");
                             if ($effectiveDate< $date) {
								
                                echo "<p style='color:red;'>expaired</p>";
                            }else{ 
                                
                                echo "<p style='color:blue;'>Running</p>"; ?>
 
                                <?php
                                    if($value['status']==0){
                                        echo "<span style='color:red;'>Pending</span> "; 
                                        echo "<a class='btn btn-danger' href=?delorder=".$value['order_id']." >Cancell</a>";
                                    }else{
                                        echo "<span style='color:green;'>Paid</span>";
                                        echo "<a class='btn btn-danger' href=idcart.php?orderid=".$value['order_id']." >Id Cart</a>";
                                    }
                                ?>
                            </td>
                            
                            
                           <?php  } ?>  
                        </tr>
                        <?php }}else{ echo "<th></th><th></th><th></th><th> No result foud</th>"; } ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
            <div class="card">
                <h4>Food Menu</h4>
            <?php 
          $date = new DateTime($birth);
          $now = new DateTime();
          $interval = $now->diff($date);
          // $interval->y;
            
                 $dataget = $food->myfoodmenu($interval->y);
                 $counts = mysqli_num_rows($dataget);
                if ($counts>0) {
                 foreach($dataget as $values){ 
            ?>
                 <span><b>Ages:</b> <?php echo $values['age_limit']; ?></span>
                 <?php echo $values['menu']; ?>
<?php }}else{ echo "<th></th><th></th><th></th><th> No result foud</th>"; } ?>
            </div>
            </div>
            </div>
            
        </div>
    </div>
</div>
<!---Container Fluid-->
<?php include 'layouts/footer.php';?>