<?php include 'layouts/header.php';?>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="index.php">GYM</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#services" style="color: red">Package</a></li>
                        <li class="nav-item"><a class="nav-link" href="#portfolio" style="color: red">Portfolio</a></li>
                        
                        <li class="nav-item"><a class="nav-link" href="#team" style="color: red">Team</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact" style="color: red">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" style="color: red">
                        <?php
                            if(isset($_GET['logout']) && isset($_GET['logout']) == 'logout'){
                                session_destroy();
                                header('Location:index.php');
                            }else if(isset($_SESSION['loginauth']) == 'user'){
                                 ?>
                                </a></li>
                                <li class="nav-item"><a class="nav-link" href="profile.php" style="color: red"><b>Profile</b></a></li>
                                <li class="nav-item"><a class="nav-link" href="?logout=logout" style="color: red"><b>Log out</b></a></li>
                            <?php }else{ ?>
                                <li class="nav-item"><a class="nav-link" href="register.php" style="color: red">Register/ Login</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
        
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Welcome To Our Gym</div>
                <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
               <!--  <a class="btn btn-primary btn-xl text-uppercase" href="#package">Tell Me More</a> -->
            </div>
        </header>
        <!-- Package-->
        <br>

    <h3 style="text-align:center;">Our Packages</h3>
					<?php
                    $viewpack = $pack->viewPackage();
                    foreach($viewpack as $value){
                ?>
<div id="services" class="columns">
  <ul class="price">
    <li class="header"><?php echo $value['pack_name'];?></li>
    <li class="grey"><?php echo $value['price'];?> tk / <?php echo $value['month'];?> Months</li>
    <li><?php echo $value['discount'];?>(%)</li>
    
    <li><?php echo $value['details'];?></li>
    <li class="grey"><a href="applyPackage.php?package_id=<?php echo $value['package_id'] ?>" class="button">Buy Now</a></li>
  </ul>
  
</div>
 <?php } ?>
 <br>
 <br>
       <style>
* {
  box-sizing: border-box;
}

.columns {
  float: left;
  width: 33.3%;
  padding: 8px;
}

.price {
  list-style-type: none;
  border: 1px solid #eee;
  margin: 0;
  padding: 0;
  -webkit-transition: 0.3s;
  transition: 0.3s;
}

.price:hover {
  box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
}

.price .header {
  background-color: #111;
  color: white;
  font-size: 25px;
}

.price li {
  border-bottom: 1px solid #eee;
  padding: 20px;
  text-align: center;
}

.price .grey {
  background-color: #eee;
  font-size: 20px;
}

.button {
  background-color: #04AA6D;
  border: none;
  color: white;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  font-size: 18px;
}

@media only screen and (max-width: 600px) {
  .columns {
    width: 100%;
  }
}
</style>
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Image Galary</h2>
                    <h3 class="section-subheading text-muted">Our Memoriable Activity</h3>
                </div>
                <div class="row">
                    <?php 
                    
                    $images = $emp->viewimage();
                    foreach ($images as $val => $imgval) {
                 
                    ?>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 1-->
                        <div class="portfolio-item">
                            <a class="#" data-bs-toggle="modal" href="#portfolioModals<?php echo $val; ?>">
                             
                                <img style="height:400px; width:415px;" class="img-fluid" src="admin/<?php echo $imgval['image_link']; ?>" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading"><?php echo $imgval['caption']; ?></div>
                                <div class="portfolio-caption-subheading text-muted"><?php echo $imgval['caption_two']; ?></div>
                            </div>
                        </div>
                    </div>
                    <?php }  ?>
                    
                    
                    
                </div>
            </div>
        </section>
        <!-- About-->
        <!-- <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">About</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <ul class="timeline">
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/1.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>2009-2011</h4>
                                <h4 class="subheading">Our Humble Beginnings</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/2.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>March 2011</h4>
                                <h4 class="subheading">An Agency is Born</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/3.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>December 2015</h4>
                                <h4 class="subheading">Transition to Full Service</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/4.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>July 2020</h4>
                                <h4 class="subheading">Phase Two Expansion</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>
                                Be Part
                                <br />
                                Of Our
                                <br />
                                Story!
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </section> -->
        <!-- Team-->
        <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Our Instructor</h2>
                    <h3 class="section-subheading text-muted">Our Experts are ready For Support</h3>
                </div>
                <div class="row">
                    <?php
                     $data = $emp->trainer();
                     foreach ($data as $key => $value) {
                   
                     
                    
                    ?>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <a href="viewemployee.php?empid=<?php echo $value['emp_id'];?>">
                            <img class="mx-auto rounded-circle" src="admin/<?php echo $value['emp_image'];?>" alt="..." />
                            <h4><?php echo $value['emp_name'];?></h4>
                            <p class="text-muted">
               
                
              <?php  if ($value['total_rat'] ==NULL || $value['hit'] ==NULL) {
                  for ($i=0; $i < 5; $i++) { 
                      echo '<span style="color:#444;" class="fa fa-star"></span>';
                      }
              }else{ $count = round($value['total_rat']/$value['hit']);
                  for ($i=0; $i < $count; $i++) { 
                      echo '<span style="color: orange;" class="fa fa-star checked"></span>';
                      }
                      for ($i=0; $i < 5- $count; $i++) { 
                       echo '<span style="color:#444;" class="fa fa-star"></span>';
                      }
              } ?>
              <style>
              .checked {
                color: orange;
              }
              </style></p>

                             
                        </a>
                        </div>
                    </div>
                  <?php } ?>
                   
                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Please Send Fedback or Complain or any good sugesion</p></div>
                </div>
            </div>
        </section>
        <!-- Clients-->
       <!--  <div class="py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/microsoft.svg" alt="..." /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/google.svg" alt="..." /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/facebook.svg" alt="..." /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/ibm.svg" alt="..." /></a>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Contact Us</h2>
                     
                     <?php
                        if (isset($_POST['contactus'])) {
                            $cont->sendcontact($_POST);
                        }
                     ?>
                </div>
                <form id="contactForm" action="" method="post">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- Name input-->
                                <input class="form-control" id="name" type="text" placeholder="Your Name *" name="name" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <div class="form-group">
                                <!-- Email address input-->
                                <input class="form-control" id="email" type="email" placeholder="Your Email *" name="email" data-sb-validations="required,email" />
                                
                            </div>
                            <div class="form-group mb-md-0">
                                <!-- Phone number input-->
                                <input class="form-control" id="phone" type="number" min="1" placeholder="Your Phone *" name="phone" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <!-- Message input-->
                                <textarea class="form-control" id="message" placeholder="Your Message *" name="message" data-sb-validations="required"></textarea>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                        </div>
                    </div>
                 
                    <!-- Submit Button-->
                    <div class="text-center"><button name="contactus" class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit">Send Message</button></div>
                </form>
            </div>
        </section>
        <?php include 'layouts/footer.php';?>