<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>BLASTMU</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="One page parallax responsive HTML Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Bingo HTML Template v1.0">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset( 'assets/img/favicon.png')  }}" />

  <!-- CSS
  ================================================== -->
  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="{{ asset( 'assets/css/themefisher-font/style.css')  }}">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{{ asset( 'assets/css/bootstrap/bootstrap.min.css')  }}">
  <!-- Lightbox.min css -->
  <link rel="stylesheet" href="{{ asset( 'assets/css/lightbox2/css/lightbox.min.css')  }}">
  <!-- animation css -->
  <link rel="stylesheet" href="{{ asset( 'assets/css/animate/animate.css')  }}">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="{{ asset( 'assets/css/slick/slick.css')  }}">
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{ asset( 'assets/css/css/style.css')  }}">

</head>
<body id="body">

<!--
Fixed Navigation
==================================== -->
<header class="navigation fixed-top sticky-header">
    <!-- main nav -->
    <nav class="navbar navbar-expand-lg navbar-light">
      <!-- logo -->
      <a class="navbar-brand logo" href="">
      </a>
      <!-- /logo -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
        aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>


      <div class="collapse navbar-collapse" id="">
		  <!-- Flash message section -->
			@if(session('error'))
			<div class="container">
				<div class="alert alert-danger">
				{{ session('error') }}
				</div>
			</div>
			@endif
        <ul class="navbar-nav ml-auto text-center">
            <a class="nav-link" href="{{ '/' }}"></a>
          </li>
            <div>
                <a href="{{ '/login' }}" class="btn-logout rounded-pill ">Login</a>
            </div>
        </ul>
      </div>
    </nav>
    <!-- /main nav -->
  </div>
</header>
<!--
End Fixed Navigation
==================================== -->

 <!--
Welcome Slider
==================================== -->
<div class="hero-slider">
	<div class="slider-item th-fullpage hero-area" style="{{ 'background-image: url(assets/img/slider/slider-bg-1.jpg)' }};">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">Crafting Digital <br>
						Experience</h1>
					<p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">Lorem ipsum dolor sit amet,
						consectetur adipisicing elit. Quod, <br> veritatis tempore nostrum id
						officia quaerat eum corrupti, <br> ipsa aliquam velit.</p>
				</div>
			</div>
		</div>
	</div>
</div>


<!--
Start About Section
==================================== -->
<section class="service-2 section">
  <div class="container">
    <div class="row justify-content-center">

      <div class="col-lg-6">
        <!-- section title -->
        <div class="title text-center">
          <h2>What Do We Offer</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur
            adipisicing elit. Voluptates, earum. </p>
          <div class="border"></div>
        </div>
        <!-- /section title -->
      </div>
    </div>
    <div class="row">

      <div class="col-md-4 text-center d-none d-md-block">
        <img loading="lazy" src='{!! asset('assets/img/about/member.jpg') !!}' class="img-fluid inline-block" alt="">
      </div>
      <div class="col-md-8">
        <div class="row text-center">
          <div class="col-md-6 col-sm-6">
            <div class="service-item">
              <i class="tf-ion-ios-alarm-outline"></i>
              <h4>Time Management</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae risus nec dui venenatis.</p>
            </div>
          </div><!-- END COL -->
          <div class="col-md-6 col-sm-6">
            <div class="service-item">
              <i class="tf-ion-ios-briefcase-outline"></i>
              <h4>Marketing Ideas</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae risus nec dui venenatis.</p>
            </div>
          </div><!-- END COL -->
          <div class="col-md-6 col-sm-6">
            <div class="service-item">
              <i class="tf-ion-ios-email-outline"></i>
              <h4>Mail Support</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae risus nec dui venenatis.</p>
            </div>
          </div><!-- END COL -->
          <div class="col-md-6 col-sm-6">
            <div class="service-item">
              <i class="tf-ion-ios-locked-outline"></i>
              <h4>Secure System</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae risus nec dui venenatis.</p>
            </div>
          </div><!-- END COL -->
        </div>
      </div>
    </div> <!-- End row -->
  </div> <!-- End container -->
</section> <!-- End section -->

<!--
Start About Section
==================================== -->
<section class="about-2 section" id="about">
	<div class="container">
		<div class="row justify-content-center">
			<!-- section title -->
			<div class="col-lg-6">
				<div class="title text-center">
					<h2>We Are Bingo Agency</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam reprehenderit accusamus labore iusto,
						aut, eum itaque illo totam tempora eius.</p>
					<div class="border"></div>
				</div>
			</div>
			<!-- /section title -->
		</div>

		<div class="row">

			<div class="col-md-6 mb-4 mb-md-0">
				<img loading="lazy" src='{!! asset('assets/img/about/about-2.png') !!}' class="img-fluid" alt="">
			</div>
			<div class="col-md-6">
				<ul class="checklist">
					<li>Donec sed odio dui. Aenean eu leo quam. Pellentesque ornare sem laca quam venenatis vestibulum.</li>
					<li>Aenean quam. Pellentesque ornare sem laca quam venenatis vestibulum.</li>
					<li>Donec sed odio dui. Aenean eu leo quam. Pellentesque ornare sem laca quam venenatis vestibulum.</li>
					<li>Etiam porta sem multipage evint landing magna mollis euismod a pharetra augue.</li>
					<li>Aenean quam. Pellentesque ornare sem laca quam venenatis vestibulum.</li>
				</ul>
				<a href="about.html" class="btn btn-main mt-20">Learn More</a>
			</div>
		</div> <!-- End row -->
	</div> <!-- End container -->
</section> <!-- End section -->

<!--
Start Call To Action
==================================== -->
<section class="call-to-action section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-8 text-center">
				<h2>Let's Create Something Together</h2>
				<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicudin bibendum auctor, nisi elit consequat ipsum,
					nesagittis sem nid elit. Duis sed odio sitain elit.</p>
				<a href="contact.html" class="btn btn-main">Contact Us</a>
			</div>
		</div> <!-- End row -->
	</div> <!-- End container -->
</section> <!-- End section -->

<!--
Start Counter Section
==================================== -->
<section class="counter-wrapper section-sm">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-8 text-center">
				<div class="title">
					<h2>Award-Winning Agency</h2>
					<p>Vestibulum nisl tortor, consectetur quis imperdiet bibendum, laoreet sed arcu. Sed condimentum iaculis ex, in faucibus lorem accumsan non. Donec mattis tincidunt metus. Morbi sed tortor a risus luctus dignissim.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<!-- first count item -->
			<div class="col-md-3 col-sm-6 col-xs-6 text-center ">
				<div class="counters-item">
					<i class="tf-ion-ios-alarm-outline"></i>
					<div>
						<span class="counter" data-count="150">0</span>
					</div>
					<h3>Happy Clients</h3>
				</div>
			</div>
			<!-- end first count item -->

			<!-- second count item -->
			<div class="col-md-3 col-sm-6 col-xs-6 text-center ">
				<div class="counters-item">
					<i class="tf-ion-ios-analytics-outline"></i>
					<div>
						<span class="counter" data-count="130">0</span>
					</div>
					<h3>Projects completed</h3>
				</div>
			</div>
			<!-- end second count item -->

			<!-- third count item -->
			<div class="col-md-3 col-sm-6 col-xs-6 text-center ">
				<div class="counters-item">
					<i class="tf-ion-ios-compose-outline"></i>
					<div>
						<span class="counter" data-count="99">0</span>
					</div>
					<h3>Positive feedback</h3>

				</div>
			</div>
			<!-- end third count item -->

			<!-- fourth count item -->
			<div class="col-md-3 col-sm-6 col-xs-6 text-center ">
				<div class="counters-item kill-border">
					<i class="tf-ion-ios-bolt-outline"></i>
					<div>
						<span class="counter" data-count="250">0</span>
					</div>
					<h3>Cups of Coffee</h3>
				</div>
			</div>
			<!-- end fourth count item -->
		</div> <!-- end row -->
	</div> <!-- end container -->
</section> <!-- end section -->

<!-- Start Testimonial
=========================================== -->
		
	<section class="testimonial section" id="testimonial">
		<div class="container">
			<div class="row">				
				<div class="col-lg-12">
					<!-- testimonial wrapper -->
					<div class="testimonial-slider">
						<!-- testimonial single -->
						<div class="item text-center">
							<i class="tf-ion-chatbubbles"></i>
							<!-- client info -->
							<div class="client-details">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum nulla, soluta dolorum. Eos earum, magni asperiores, unde corporis labore, enim, voluptatum officiis voluptates alias natus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, officia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, quia?</p>
							</div>
							<!-- /client info -->
							<!-- client photo -->
							<div class="client-thumb">
								<img loading="lazy" src='{!! asset('assets/img//client-logo/clients-1.jpg') !!}' class="img-fluid" alt="">
							</div>
							<div class="client-meta">
								<h3>William Martin</h3>
								<span>CEO , Company Name</span>
							</div>
							<!-- /client photo -->
						</div>
						<!-- /testimonial single -->
				
						<!-- testimonial single -->
						<div class="item text-center">
							<i class="tf-ion-chatbubbles"></i>
							<!-- client info -->
							<div class="client-details">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum nulla, soluta dolorum. Eos earum, magni asperiores, unde corporis labore, enim, voluptatum officiis voluptates alias natus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, officia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, quia?</p>
							</div>
							<!-- /client info -->
							<!-- client photo -->
							<div class="client-thumb">
								<img loading="lazy" src='{!! asset('assets/img/client-logo/clients-2.jpg') !!}'class="img-fluid" alt="">
							</div>
							<div class="client-meta">
								<h3>Emma Harrison</h3>
								<span>CEO , Company Name</span>
							</div>
							<!-- /client photo -->
						</div>
						<!-- /testimonial single -->
					
						<!-- testimonial single -->
						<div class="item text-center">
							<i class="tf-ion-chatbubbles"></i>
							<!-- client info -->
							<div class="client-details">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum nulla, soluta dolorum. Eos earum, magni asperiores, unde corporis labore, enim, voluptatum officiis voluptates alias natus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, officia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, quia?</p>
							</div>
							<!-- /client info -->
							<!-- client photo -->
							<div class="client-thumb">
								<img loading="lazy" src='{!! asset('assets/img/client-logo/clients-3.jpg') !!}' class="img-fluid" alt="">
							</div>
							<div class="client-meta">
								<h3>Alexander Lucas</h3>
								<span>CEO , Company Name</span>
							</div>
							<!-- /client photo -->
						</div>
						<!-- /testimonial single -->
					</div>
				</div> 		<!-- end col lg 12 -->
			</div>	    <!-- End row -->
		</div>       <!-- End container -->
	</section>    <!-- End Section -->

<!--
Start Blog Section
=========================================== -->
<section class="blog" id="blog">
	<div class="container">
		<div class="row justify-content-center">
			<!-- section title -->
			<div class="col-xl-6 col-lg-8">
				<div class="title text-center ">
					<h2> Latest <span class="color">Posts</span></h2>
					<div class="border"></div>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus facere accusamus, reprehenderit libero inventore nam.</p>
				</div>
			</div>
			<!-- /section title -->
		</div>

		<div class="row">
			<!-- single blog post -->
			<article class="col-lg-4 col-md-6">
				<div class="post-item">
					<div class="media-wrapper">
						<img loading="lazy" src='{!! asset('assets/img/blog/post-1.jpg') !!}'alt="amazing caves coverimage" class="img-fluid">
					</div>

					<div class="content">
						<h3><a href="single-post.html">Reasons to Smile</a></h3>
						<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf
							moon officia aute, non skateboard dolor brunch.</p>
						<a class="btn btn-main" href="single-post.html">Read more</a>
					</div>
				</div>
			</article>
			<!-- /single blog post -->

			<!-- single blog post -->
			<article class="col-lg-4 col-md-6">
				<div class="post-item">
					<div class="media-wrapper">
						<img loading="lazy" src='{!! asset('assets/img/blog/post-2.jpg') !!}'alt="amazing caves coverimage" class="img-fluid">
					</div>

					<div class="content">
						<h3><a href="single-post.html">A Few Moments</a></h3>
						<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf
							moon officia aute, non skateboard dolor brunch.</p>
						<a class="btn btn-main" href="single-post.html">Read more</a>
					</div>
				</div>
			</article>
			<!-- end single blog post -->

			<!-- single blog post -->
			<article class="col-lg-4 col-md-6">
				<div class="post-item">
					<div class="media-wrapper">
						<img loading="lazy" src='{!! asset('assets/img/blog/post-3.jpg') !!}'alt="amazing caves coverimage" class="img-fluid">
					</div>

					<div class="content">
						<h3><a href="single-post.html">Hints for Life</a></h3>
						<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf
							moon officia aute, non skateboard dolor brunch.</p>
						<a class="btn btn-main" href="single-post.html">Read more</a>
					</div>
				</div>
			</article>
			<!-- end single blog post -->
		</div> <!-- end row -->
	</div> <!-- end container -->
</section> <!-- end section -->

<footer id="footer" class="bg-one">
  <div class="top-footer">
    <div class="container">
      <div class="row justify-content-around">
        <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
          <h3>about</h3>
          <p>Integer posuere erat a ante venenati dapibus posuere velit aliquet. Fusce dapibus, tellus cursus commodo, tortor mauris sed posuere.</p>
        </div>
        <!-- End of .col-sm-3 -->

        <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
        </div>
        <!-- End of .col-sm-3 -->

        <div class="col-lg-2 col-md-6 mb-5 mb-md-0">
        </div>
        <!-- End of .col-sm-3 -->

        <div class="col-lg-3 col-md-6">
          <ul>
            <li>
              <h3>Connect with us Socially</h3>
            </li>
            <li><a href="{{ asset( 'https://www.facebook.com/themefisher/')  }}">Facebook</a></li>
            <li><a href="{{ asset( 'https://www.twitter.com/themefisher/')  }}">Twitter</a></li>
            <li><a href="{{ asset( 'https://www.youtube.com/channel/UCx9qVW8VF0LmTi4OF2F8YdA')  }}">Youtube</a></li>
            <li><a href="{{ asset( 'https://www.github.com/themefisher/')  }}">Github</a></li>
          </ul>
        </div>
        <!-- End of .col-sm-3 -->

      </div>
    </div> <!-- end container -->
  </div>
</footer> <!-- end footer -->


<!-- end Footer Area
========================================== -->

<!-- 
    Essential Scripts
    =====================================-->
<!-- Main jQuery -->
<script src="{{ asset( 'assets/css//jquery/jquery.min.js')  }}"></script>

<!-- Bootstrap4 -->
<script src="{{ asset( 'assets/css/bootstrap/bootstrap.min.js')  }}"></script>
<!-- Parallax -->
<script src="{{ asset( 'assets/css/parallax/jquery.parallax-1.1.3.js')  }}"></script>
<!-- lightbox -->
<script src="{{ asset( 'assets/css/lightbox2/js/lightbox.min.js')  }}"></script>
<!-- Owl Carousel -->
<script src="{{ asset( 'assets/css/slick/slick.min.js')  }}"></script>
<!-- filter -->
<script src="{{ asset( 'assets/css/filterizr/jquery.filterizr.min.js')  }}"></script>
<!-- Smooth Scroll js -->
<script src="{{ asset( 'assets/css/smooth-scroll/smooth-scroll.min.js')  }}"></script>
<!-- Google Map -->
<script src="{{ asset( 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU')  }}"></script>
<script src="{{ asset( 'assets/css/google-map/gmap.js')  }}" ></script>

<!-- Custom js -->
<script src="{{ asset( 'assets/js/script.js')  }}"></script>

</body>

</html>
