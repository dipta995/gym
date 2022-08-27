<?php
include 'layouts/header.php';
include 'layouts/nav.php';

?>
<!-- Home -->

<div class="home">
    <div class="background_image" style="background-image:url(images/index.jpg)"></div>
    <div class="overlay"></div>
    <div class="home_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="home_content text-center">
                        <div class="home_title">Get fit with us</div>
                        <div class="home_subtitle">Pilates, Yoga, Fitness, Spinning & many more</div>
                        <div class="button home_button ml-auto mr-auto"><a href="register.php">Join Now</a></div>
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
            <div class="col-lg-12">
                <div class="about_content">
                    <div class="section_title_container">
                        <div class="section_title">About <span>Gym Planet</span></div>
                    </div>
                    <div class="text_highlight">Etiam commodo justo nec aliquam feugiat. Donec a leo eget eget augue porttitor sollicitudin augue porttitor sollicitudin.</div>
                    <div class="about_text">
                        <p style="text-align:justify;">Morbi sed varius risus, vitae molestie lectus. Donec id hendrerit velit, eu fringilla neque. Etiam id finibus sapien. Donec sollicitudin luctus ex non pharetra. Aenean lobortis ut leo vel porta. Maecenas ac vestibulum lectus. Cras nulla urna, lacinia ut tempor facilisis, congue dignissim tellus. Maecenas ac vestibulum lectus. Cras nulla urna, lacinia ut tempor facilisis, congue dignissim tellus. Phasellus sit amet justo ullamcorper, elementum ipsum nec.</p>
                    </div>
                    <div class="button about_button"><a href="register.php">Join Now</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="about_background">
    </div>
</div>

<!-- Testimonials -->

<div class="testimonials">
    <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/testimonials.jpg" data-speed="0.8"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section_title_container">
                    <div class="section_title">Testimonials</div>
                </div>

                <!-- Testimonial -->
                <div class="test test_1 d-flex flex-row align-items-start justify-content-start">
                    <div>
                        <div class="test_image"><img src="images/test_1.jpg" alt=""></div>
                    </div>
                    <div class="test_content">
                        <div class="test_name"><a href="#">Diane Smith</a></div>
                        <div class="test_title">client</div>
                        <div class="test_text">
                            <p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna.</p>
                        </div>
                        <div class="rating rating_4 test_rating"><i></i><i></i><i></i><i></i><i></i></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">

                <!-- Testimonial -->
                <div class="test d-flex flex-row align-items-start justify-content-start">
                    <div>
                        <div class="test_image"><img src="images/test_2.jpg" alt=""></div>
                    </div>
                    <div class="test_content">
                        <div class="test_name"><a href="#">Diane Smith</a></div>
                        <div class="test_title">client</div>
                        <div class="test_text">
                            <p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna.</p>
                        </div>
                        <div class="rating rating_4 test_rating"><i></i><i></i><i></i><i></i><i></i></div>
                    </div>
                </div>

                <!-- Testimonial -->
                <div class="test d-flex flex-row align-items-start justify-content-start">
                    <div>
                        <div class="test_image"><img src="images/test_3.jpg" alt=""></div>
                    </div>
                    <div class="test_content">
                        <div class="test_name"><a href="#">Diane Smith</a></div>
                        <div class="test_title">client</div>
                        <div class="test_text">
                            <p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna.</p>
                        </div>
                        <div class="rating rating_4 test_rating"><i></i><i></i><i></i><i></i><i></i></div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row test_button_row">
            <div class="col text-center">
                <div class="button test_button"><a href="register.php">Join Now</a></div>
            </div>
        </div>
    </div>
</div>

<!-- Gallery -->

<div class="gallery">
    <!-- Gallery Slider -->
    <div class="gallery_slider_container">
        <div class="owl-carousel owl-theme gallery_slider">

            <!-- Slide -->
            <div class="owl-item"><img src="images/gallery_3.jpg" alt=""></div>

            <!-- Slide -->
            <div class="owl-item"><img src="images/gallery_4.jpg" alt=""></div>

            <!-- Slide -->
            <div class="owl-item"><img src="images/gallery_5.jpg" alt=""></div>

            <!-- Slide -->
            <div class="owl-item"><img src="images/gallery_1.jpg" alt=""></div>

            <!-- Slide -->
            <div class="owl-item"><img src="images/gallery_2.jpg" alt=""></div>

        </div>
    </div>
</div>

<!-- Services -->

<div class="services">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title_container">
                    <div class="section_title">Our Packages</div>
                </div>
            </div>
        </div>
        <div class="row services_row">

            <?php
            $viewpack = $pack->viewPackage();
            foreach ($viewpack as $value) {
            ?>
                <!-- Service -->
                <div class="col-xl-4 col-md-6 service_col">
                    <div class="service">
                        <div class="service_title_container d-flex flex-row align-items-center justify-content-start">
                            <div>
                                <div class="service_icon"><img src="admin/<?php echo $value['image'] ?>" alt=""></div>
                            </div>
                            <div class="service_title"><?php echo $value['pack_name']; ?></div>
                        </div>
                        <div class="service_text">
                            <p style="text-align:center ;"><?php echo $value['price']; ?> BDT / <?php echo $value['month']; ?> Months</p>
                            <p style="text-align:center ;"><?php echo $value['discount']; ?>(%) Discount</p>
                            <p><?php echo $value['details']; ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<!-- Products -->

<div class="blog">
    <div class="blog_overlay"></div>
    <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/blog.jpg" data-speed="0.8"></div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class=" d-flex flex-row align-items-start justify-content-start">
                    <div class="section_title_container">
                        <div class="section_title">Products</div>
                    </div>
                    <div class="all_posts_link ml-auto"><a href="products.php">View all Products</a></div>
                </div>
            </div>
        </div>
        <div class="row blog_row">
            <?php
                $view = $product->viewProduct();
                foreach ($view as $value) {
            ?>
            <!-- Product Post -->
            <div class="col-lg-4 blog_col">
                <div class="blog_post" style="text-align:center;">
                    <div class="blog_post_image"><img src="admin/<?php echo $value['image'] ?>" alt=""></div>
                    <div class="blog_post_title"><a href="#"><?php echo $value['name'];?></a></div>
                    <div class="blog_post_date"><a href="#"><?php echo $value['selling_price'];?> BDT </a></div>
                    <div class="blog_post_text">
                        <p><?php echo $value['description'];?></p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php
include 'layouts/footer.php';
?>