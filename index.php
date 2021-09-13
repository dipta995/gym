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
                        <li class="nav-item"><a class="nav-link" href="#about" style="color: red">About</a></li>
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
                <div class="masthead-subheading">Welcome To Our Studio!</div>
                <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="#package">Tell Me More</a>
            </div>
        </header>
        <!-- Package-->
        <section  class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Package</h2>
                    <h3 class="section-subheading text-muted">Choose Your Package Here</h3>
                </div>
                <div class="row text-center">
                <?php
                    $viewpack = $pack->viewPackage();
                    foreach($viewpack as $value){
                ?>
                    <div class="col-md-4">
                        <h4 class="my-3"><?php echo $value['pack_name'];?></h4>
                        <p class="text-muted"><?php echo $value['details'];?></p>
                        <p class="text-muted">Month- <?php echo $value['month'];?></p>
                        <p class="text-muted">Price- <?php echo $value['price'];?>(tk)</p>
                        <p class="text-muted">Discount- <?php echo $value['discount'];?>(%)</p>
                        <a href="applyPackage.php?package_id=<?php echo $value['package_id'] ?>"><button class="btn btn-primary text-uppercase" type="submit">Buy</button></a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>

        <!-- <div class="container">
            <div class="section-title text-center">
                <h1><span>Choose A Plans</span></h1>
            </div>
            <div class="table-responsive">
                <table class="table pricing-table text-center">
                    <thead>
                        <tr>
                            <td class="pattern-4">
                                
                            </td>
                            <td class="pattern-3">
                                <h4>Package 1</h4>
                                <span>Quarterly</span>
                                <p>3 Months Plan</p>
                            </td>
                            <td class="pattern-5">
                                <h4>Package 2</h4>
                                <span>Half Yearly</span>
                                <p>6 Months Plann</p>
                            </td>
                            <td class="pattern-6">
                                <h4>Package 3</h4>
                                <span>Yearly</span>
                                <p>Yearly plan</p>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <p>Subscription Plans</p>
                            </td>
                            <td>
                                <p>3 Month Subscription</p>
                            </td>
                            <td>
                                <p>6 Month Subscription</p>
                            </td>
                            <td>
                                <p>Year Subscription</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Personal Trainers</p>
                            </td>
                            <td>
                                <p>Self Directed Trainers</p>
                            </td>
                            <td>
                                <p>Personal Trainers</p>
                            </td>
                            <td>
                                <p>High Profestional Trainers</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Individual lockers</p>
                            </td>
                            <td>
                                <p>---</p>
                            </td>
                            <td>
                                <p>---</p>
                            </td>
                            <td>
                                <p>---</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Registration Fees</p>
                            </td>
                            <td>
                                <p>2,500/BDT</p>
                            </td>
                            <td>
                                <p>2,500/BDT</p>
                            </td>
                            <td>
                                <p>2,500/BDT</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Monthly Fee (3)</p>
                            </td>
                            <td>
                                <p>6,000/BDT</p>
                            </td>
                            <td>
                                <p>12,000/BDT</p>
                            </td>
                            <td>
                                <p>24,000/BDT</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Total</p>
                            </td>
                            <td>
                                <p>8,500/BDT</p>
                            </td>
                            <td>
                                <p>14,500/BDT</p>
                            </td>
                            <td>
                                <p>26,500/BDT</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Discount</p>
                            </td>
                            <td>
                                <p>1,500/BDT</p>
                            </td>
                            <td>
                                <p>4,500/BDT</p>
                            </td>
                            <td>
                                <p>9,500/BDT</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Payable</p>
                            </td>
                            <td>
                                <p>7,000/BDT</p>
                            </td>
                            <td>
                                <p>10,000/BDT</p>
                            </td>
                            <td>
                                <p>17,000/BDT</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Fitness Assessment</p>
                            </td>
                            <td>
                                <p><img src="img/icon/open-icon.png" alt="Awesome Image"></p>
                            </td>
                            <td>
                                <p><img src="img/icon/open-icon.png" alt="Awesome Image"></p>
                            </td>
                            <td>
                                <p><img src="img/icon/open-icon.png" alt="Awesome Image"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Free Wifi </p>
                            </td>
                            <td>
                                <p><img src="img/icon/open-icon.png" alt="Awesome Image"></p>
                            </td>
                            <td>
                                <p><img src="img/icon/open-icon.png" alt="Awesome Image"></p>
                            </td>
                            <td>
                                <p><img src="img/icon/open-icon.png" alt="Awesome Image"></p>
                            </td>
                        </tr>
                        <tr class="button-row">
                            <td></td>
                            <td><a href="#" class="flip-flop-btn"><span data-hover="Subscribe Now">Join Now</span></a></td>
                            <td><a href="#" class="flip-flop-btn"><span data-hover="Subscribe Now">Join Now</span></a></td>
                            <td><a href="#" class="flip-flop-btn"><span data-hover="Subscribe Now">Join Now</span></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> -->
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Portfolio</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 1-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/1.jpg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Threads</div>
                                <div class="portfolio-caption-subheading text-muted">Illustration</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 2-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/2.jpg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Explore</div>
                                <div class="portfolio-caption-subheading text-muted">Graphic Design</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 3-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal3">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/3.jpg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Finish</div>
                                <div class="portfolio-caption-subheading text-muted">Identity</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                        <!-- Portfolio item 4-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/4.jpg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Lines</div>
                                <div class="portfolio-caption-subheading text-muted">Branding</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">
                        <!-- Portfolio item 5-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal5">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/5.jpg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Southwest</div>
                                <div class="portfolio-caption-subheading text-muted">Website Design</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <!-- Portfolio item 6-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal6">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/6.jpg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Window</div>
                                <div class="portfolio-caption-subheading text-muted">Photography</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About-->
        <section class="page-section" id="about">
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
        </section>
        <!-- Team-->
        <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/1.jpg" alt="..." />
                            <h4>Parveen Anand</h4>
                            <p class="text-muted">Lead Designer</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/2.jpg" alt="..." />
                            <h4>Diana Petersen</h4>
                            <p class="text-muted">Lead Marketer</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/3.jpg" alt="..." />
                            <h4>Larry Parker</h4>
                            <p class="text-muted">Lead Developer</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p></div>
                </div>
            </div>
        </section>
        <!-- Clients-->
        <div class="py-5">
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
        </div>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Contact Us</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- Name input-->
                                <input class="form-control" id="name" type="text" placeholder="Your Name *" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <div class="form-group">
                                <!-- Email address input-->
                                <input class="form-control" id="email" type="email" placeholder="Your Email *" data-sb-validations="required,email" />
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <div class="form-group mb-md-0">
                                <!-- Phone number input-->
                                <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <!-- Message input-->
                                <textarea class="form-control" id="message" placeholder="Your Message *" data-sb-validations="required"></textarea>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                        </div>
                    </div>
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center text-white mb-3">
                            <div class="fw-bolder">Form submission successful!</div>
                            To activate this form, sign up at
                            <br />
                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                        </div>
                    </div>
                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                    <!-- Submit Button-->
                    <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">Send Message</button></div>
                </form>
            </div>
        </section>
        <?php include 'layouts/footer.php';?>