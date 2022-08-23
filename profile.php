    
    <?php include 'layouts/header.php'; ?>

	<!-- Home -->

	<div class="home">
		<div class="background_image" style="background-image:url(images/about_page.jpg)"></div>
		<div class="overlay"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content">
							<div class="home_title"><span>GymPLANET</span> Profile</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    <!-- About -->

	<div class="about">
		<div class="container about_container">
			<div class="row">
				<div class="col-lg-4">
					<div class="about_content">
						<div class="section_title_container">
							<div class="section_title">Profile</div>
						</div>
						<?php 
                        $birth="";
                        $view = $login->checkprofile();
                        foreach($view as $value){ 
                        ?> 
                        <hr>
                        <img style="margin-top 10px;height: 100px; width: 100px;margin-left:70px;border-radius: 50px;border: 2px solid #ffc800;" src=" <?php echo $value['image']; ?>" alt="">
                        <br><br>
                        <p>
                            <b>Name:</b> <?php echo $value['first_name']." ".$value['last_name']; ?><br>        
                            <b>Email Address:</b> <?php echo $value['email']; ?><br>
                            <b>Date of Birth:</b> <?php echo $birth = $value['dob']; ?><br>
                            <b>Gender:</b> <?php echo $value['gender']; ?><br>
                            <b>Mobile:</b> <?php echo $value['mobile']; ?><br>
                            <b>Parmanent Address:</b> <?php echo $value['address']; ?>
                            <div class="button about_button"><a href="edit.php">Edit Profile</a></div>
                        </p>
                        <?php } ?>
					</div>
				</div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">My Order</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>SL</th>                               
                                            <th>Package Name</th>                                 
                                            <th>Month/Price</th>
                                            <th>Final Price</th>                                    
                                            <th>Discount</th>
                                            <th>Expire at</th>                              
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
                                            <td><?php echo $value['month'].' Month/'. $value['price']; ?> BDT</td>
                                            <td><?php echo $value['price']-($value['price']*($value['discount']/100)); ?> BDT</td>
                                            <td><?php echo $value['discount']; ?>%</td>
                                            <td><?php echo $effectiveDate = date('Y-m-d', strtotime("+".$value['month']." months", strtotime($value['created_at']))); ?></td>
                                            <td>
                                                <?php $date=date("Y-m-d"); ?>
        
                                                <?php
                                                    if($value['status']==0){
                                                        echo "<span style='color:red;'>Pending</span> "; 
                                                        echo "<a class='btn btn-danger' href=?delorder=".$value['order_id'].">Cancel</a>";
                                                    }else{
                                                        if ($effectiveDate< $date) {
                                                            echo "<p style='color:red;'>expired</p>";
                                                        }else{                                       
                                                            echo "<p style='color:blue;'>Running</p>";                                         
                                                            echo "<a class='btn btn-success btn-sm text-white'>Paid</a>";
                                                            echo "<a class='btn btn-danger btn-sm' href=idcard.php?orderid=".$value['order_id']." >Id Card</a>";
                                                        }
                                                    }
                                                ?>
    
                                            </td>
                                        </tr>
                                        <?php } } else { echo "<th></th><th></th><th></th><th> No result found</th>"; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
			    </div>
		    </div>
	    </div>
    </div>
    
	<!-- Footer -->

	<?php include 'layouts/footer.php'; ?>