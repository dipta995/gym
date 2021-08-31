<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="index.php">GYM</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="index.php" style="color: red">Home</a></li>
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