<?php 
  session_start();
  include('includes/config.php');
  error_reporting(0);
?> 

<!DOCTYPE HTML>
  <html lang="en">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Ride Ease | Blog </title>
  <!--Bootstrap -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="assets/css/style1.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
  <link href="assets/css/slick.css" rel="stylesheet">
  <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
  <link href="assets/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
  <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 
  </head>

  <body>

<?php include('includes/colorswitcher.php');?>

<?php include('includes/header.php');?>

<section class="page-header blog_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Our Blog</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>Our Blog</li>
      </ul>
    </div>
  </div>
  <div class="dark-overlay"></div>
</section>

<section class="our_blog">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 col-md-8"> 
        <article class="article_wrap">
  <?php 
  $sql = "SELECT Blog.*,blog.BlogTitle,blog.id as bid from Blog order by id desc limit 6";
  $query = $dbh -> prepare($sql);
  $query->execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);
  $cnt=1;
  if($query->rowCount() > 0)
  {
  foreach($results as $result)
  {  ?>  
          <div class="article_img"> 
            <img src="assets/images/<?php echo htmlentities($result->Blogimage);?>" alt="image">
            <div class="articale_header">
              <h2><?php echo htmlentities($result->BlogTitle);?></h2>
              <div class="article_meta">
                <ul>
                  <li><i class="fa fa-calendar-check-o" aria-hidden="true"></i><?php echo htmlentities($result->Year);?></li>
                  <li><i class="fa fa-tags" aria-hidden="true"></i> <?php echo htmlentities($result->BlogType);?> </li>
                  <li><i class="fa fa-comment" aria-hidden="true"></i> <?php echo htmlentities($result->Comment);?></li>
                  <li><i class="fa fa-eye" aria-hidden="true"></i><?php echo htmlentities($result->Views);?></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="article_info">
            <p><?php echo htmlentities($result->BlogInfo);?> </p>
            <a href="blog-details.php" class="btn">Read More <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a> </div>
        </article>
    
    <?php }} ?>
  </div>

  <aside class="col-lg-3 col-md-4">
        <div class="sidebar_widget">
          <div class="widget_heading">
            <h5>Search Blog</h5>
          </div>
          <div class="blog_search">
            <form action="#" method="get">
              <input class="form-control" name="#" type="text" placeholder="Search...">
              <button type="submit" class="search_btn"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
          </div>
        </div>
        <div class="sidebar_widget">
          <div class="widget_heading">
            <h5>Popular Posts</h5>
          </div>
          <div class="popular_post">
            <ul>
              <li>
                <div class="popular_post_img"> <a href="#"><img src="assets/images/200x200.jpg" alt="image"></a> </div>
                <div class="popular_post_title"> <a href="#">At vero eos et accusamus et iusto odio dignissimos.</a> </div>
              </li>
              <li>
                <div class="popular_post_img"> <a href="#"><img src="assets/images/200x200.jpg" alt="image"></a> </div>
                <div class="popular_post_title"> <a href="#">On the other hand, we denounce with righteous.</a> </div>
              </li>
              <li>
                <div class="popular_post_img"> <a href="#"><img src="assets/images/200x200.jpg" alt="image"></a> </div>
                <div class="popular_post_title"> <a href="#">But I must explain to you how all this mistaken idea.</a> </div>
              </li>
              <li>
                <div class="popular_post_img"> <a href="#"><img src="assets/images/200x200.jpg" alt="image"></a> </div>
                <div class="popular_post_title"> <a href="#">Nor again is there anyone who loves or pursues.</a> </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="sidebar_widget">
          <div class="widget_heading">
            <h5>Categories</h5>
          </div>
          <div class="categories_list">
            <ul>
              <li><a href="#">Trends</a></li>
              <li><a href="#">The Works</a></li>
              <li><a href="#">Hand Wash</a></li>
              <li><a href="#">General</a></li>
              <li><a href="#">Business</a></li>
              <li><a href="#">Auto Detail</a></li>
              <li><a href="#">Motorbikes</a></li>
              <li><a href="#">Compacts</a></li>
              <li><a href="#">Vans & Trucks</a></li>
              <li><a href="#">Buy a car</a></li>
              <li><a href="#">Sell your Car</a></li>
              <li><a href="#">Car Land</a></li>
              <li><a href="#">Car Showrooms</a></li>
            </ul>
          </div>
        </div>
        <div class="sidebar_widget">
          <div class="widget_heading">
            <h5>Tag Widget</h5>
          </div>
          <div class="tag_list">
            <ul>
              <li><a href="#">Trends</a></li>
              <li><a href="#">The Works</a></li>
              <li><a href="#">Auto Detail</a></li>
              <li><a href="#">Motorbikes</a></li>
              <li><a href="#">Compacts</a></li>
              <li><a href="#">Buy a car</a></li>
              <li><a href="#">Vans & Trucks</a></li>
              <li><a href="#">Car Land</a></li>
              <li><a href="#">Sell your Car</a></li>
              <li><a href="#">Sedans</a></li>
            </ul>
          </div>
        </div>
      </aside>
      <!--/Side-bar--> 

</section>


<?php include('includes/footer.php');?>

<div id="back-top" class="back-top"> 
  <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> 
</div>

<?php include('includes/login.php');?>

<?php include('includes/registration.php');?>

<?php include('includes/forgotpassword.php');?>

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>
</html>