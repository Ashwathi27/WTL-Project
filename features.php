<?php include ('config/comconn.php');
    session_start(); ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>COMPARATOR | CATEGORIES</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="assets/css/agency.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" style="background-color: #222;">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.php">COMPARATOR</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="">Hello ! <?php  echo $_SESSION['ses_u_name'];  ?></a>
            </li>
            <li class="nav-item">
              <form action="wishlist.php">
              <button class="btn btn-md btn-primary btn-block" name="wishlist" style="margin-right: 8px;margin-top:5px" type="submit">View Wishlist</button>
            </form>
            </li>
            <li class="nav-item">
              <form action="logout.php">
              <button class="btn btn-md btn-primary btn-block" name="logout" style="margin-left: 8px;margin-top: 5px" type="submit">LOGOUT</button>
            </form>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <div class="row" style="margin-top: 150px;">

        <div class="col-lg-3" style="vertical-align: center">

          <h1 class="my-4"> </h1>
          <div class="list-group" style="font-size: 30px">
            <a href="categories.php?cat=Laptop" class="list-group-item">Laptops</a>
            <a href="categories.php?cat=Mobile" class="list-group-item">Mobiles</a>
            <a href="categories.php?cat=Tablet" class="list-group-item">Tablets</a>
          </div>
          <div>
            <div class="dropdown show">
              <br><br><br>
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Your Budget
  </a>
<?php
          include ('config/comconn.php');
          $price="";
          if ($_SERVER['REQUEST_METHOD']=='GET') {
            if (Key_Exists("Price",$_GET) && Key_Exists("cat",$_GET)) {
              $price=$_GET['Price'];
              $cat=$_GET['cat'];
            }
            $result=mysqli_query($comconn,"SELECT * FROM $cat where Price<=$price;");

          }
          if ($cat=="Laptop") {
        ?>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="features.php?Price=10000&cat=<?= $cat?>"> below Rs. 10,000</a>
    <a class="dropdown-item" href="features.php?Price=20000&cat=<?= $cat?>"> below Rs. 20,000</a>
    <a class="dropdown-item" href="features.php?Price=30000&cat=<?= $cat?>"> below Rs. 30,000 </a>
    <a class="dropdown-item" href="features.php?Price=40000&cat=<?= $cat?>"> below Rs. 40,000</a>
    <a class="dropdown-item" href="features.php?Price=60000&cat=<?= $cat?>"> below Rs. 60,000</a>

  </div>
  <?php
  }
  else if($cat=="Mobile")
  {
  ?>
   <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="features.php?Price=5000&cat=<?= $cat?>"> below Rs. 5,000</a>
    <a class="dropdown-item" href="features.php?Price=10000&cat=<?= $cat?>"> below Rs. 10,000</a>
    <a class="dropdown-item" href="features.php?Price=20000&cat=<?= $cat?>"> below Rs. 20,000 </a>
    <a class="dropdown-item" href="features.php?Price=30000&cat=<?= $cat?>"> below Rs. 30,000 </a>
    <a class="dropdown-item" href="features.php?Price=40000&cat=<?= $cat?>"> below Rs. 40,000</a>
    <a class="dropdown-item" href="features.php?Price=60000&cat=<?= $cat?>"> below Rs. 60,000</a>
  </div>
  <?php
  }
    elseif ($cat=="Tablet") {
  ?>
   <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="features.php?Price=15000&cat=<?= $cat?>"> below Rs. 15,000</a>
    <a class="dropdown-item" href="features.php?Price=30000&cat=<?= $cat?>"> below Rs. 30,000</a>
    <a class="dropdown-item" href="features.php?Price=45000&cat=<?= $cat?>"> below Rs. 45,000 </a>
    <a class="dropdown-item" href="features.php?Price=60000&cat=<?= $cat?>"> below Rs. 60,000</a>
    <a class="dropdown-item" href="features.php?Price=75000&cat=<?= $cat?>"> below Rs. 75,000</a>
  </div>
  <?php
    }
  ?>
</div>
          </div>
        </div>
        <!-- /.col-lg-3 -->
        <div class="col-lg-9">
          <h5>Click on Product Name to Compare Prices</h5><br>
          <div class="row">
            <?php
            while(($row=mysqli_fetch_assoc($result))==true)
            {
              $prodname=$row['Name'];
              $res=mysqli_query($comconn,"SELECT ProdImg FROM Products where ProdName='$prodname';");
              $img=mysqli_fetch_row($res);
            ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="<?= $img[0] ?>"><img class="card-img-top" src="<?= $img[0] ?>" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="compare.php?prod=<?= $row['Name']?>"><?= $row['Name']?></a>
                  </h4>
                    <?php
                    foreach($row as $x => $x_value) {
                      if($x!="MobID" && $x!="Name")
                        echo "<b>".$x . "</b> : " . $x_value;
                        echo "<br>";
                    }
                    ?>
                </div>
                <div class="card-footer">
                  <small class="text-muted"><a href="wishlist.php?prod=<?= $row['Name']?>"><i class="fa fa-heart" aria-hidden="true"></i>Add to wishlist</a></small>
                </div>
              </div>
            </div>
            <?php
            }
            ?>
          </div>
          <!-- /.row -->
                    <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <center><img class="d-block img-fluid" src="assets/img/logos/amazon-logo.jpg" alt="First slide"></center>
              </div>
              <div class="carousel-item">
                <center><img class="d-block img-fluid" src="assets/img/logos/flipkart-logo.jpg" alt="Second slide"></center>
              </div>
              <div class="carousel-item">
                <center><img class="d-block img-fluid" src="assets/img/logos/snapdeal-logo.png" alt="Third slide"></center>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
    <!-- Bootstrap core JavaScript -->
    <script src="assets/jquery/jquery.min.js"></script>
    <script src="assets/popper/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="assets/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="assets/js/jqBootstrapValidation.js"></script>
    <script src="assets/js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="assets/js/agency.min.js"></script>

  </body>

</html>
