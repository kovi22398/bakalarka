<?php 

session_start();

$active='Cart';

include("includes/db.php");
include("functions/functions.php");

?>

<?php 

if(isset($_GET['pro_id'])){
    
    $product_id = $_GET['pro_id'];
    
    $get_product = "select * from products where product_id='$product_id'";
    
    $run_product = mysqli_query($con,$get_product);
    
    $row_products = mysqli_fetch_array($run_product);
    
    $pro_title = $row_products['product_title'];
    
    $pro_price = $row_products['product_price'];
    
    $pro_desc = $row_products['product_desc'];
    
    $pro_img1 = $row_products['product_img1'];
    
    $pro_img2 = $row_products['product_img2'];
    
    $pro_img3 = $row_products['product_img3'];
    
}

?>

<?php add_cart(); ?>




<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zahrady Rosina</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/icon16x16.png">
    
</head>
<body>
   
   <div id="top"><!-- Top Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="col-md-6 offer"><!-- col-md-6 offer Begin -->
               
               <a href="#" class="btn btn-success btn-sm">
                   
                   <?php 
                   
                   if(!isset($_SESSION['customer_email'])){
                       
                       echo "Vitajte";
                       
                   }else{
                       
                       echo $_SESSION['customer_email'] . "";
                       
                   }
                   
                   ?>
                   
               </a>
               
           </div><!-- col-md-6 offer Finish -->
           
           <div class="col-md-6"><!-- col-md-6 Begin -->
               
               <ul class="menu"><!-- cmenu Begin -->
                   
                   <li>
                       <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                       
                                echo "<a href='cart.php'> Ísť do Košíku </a>";

                               }else{

                                echo " <a href='customer/my_account.php'> Môj účet </a> ";

                               }
                           
                           ?>
                   </li>
                   <li>
                       <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                       
                                echo "<a href='customer_register.php'> Registrácia </a>";

                               }else{

                                echo " <a href='cart.php'> Ísť do Košíku </a> ";

                               }
                           
                           ?>
                   </li>
                   <li>                           
                           <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                       
                                echo "<a href='checkout.php'> Prihlásiť </a>";

                               }else{

                                echo " <a href='logout.php'> Odhlásiť </a> ";

                               }
                           
                           ?>
                   </li>
                   
               </ul><!-- menu Finish -->
               
           </div><!-- col-md-6 Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- Top Finish -->
   <div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="navbar-header"><!-- navbar-header Begin -->
               
               <a href="index.php" class="navbar-brand home"><!-- navbar-brand home Begin -->
                   
                   <img src="images/logo.png" alt="Zahradnictvo Rosina" class="hidden-xs">
                   <img src="images/logo-mobile.png" alt="Zahradnictvo Rosina Mobile" class="visible-xs">
                   
               </a><!-- navbar-brand home Finish -->
               
           </div><!-- navbar-header Finish -->
           
           <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Begin -->
               
               <div class="padding-nav"><!-- padding-nav Begin -->
                   
                   <ul class="nav navbar-nav left"><!-- nav navbar-nav left Begin -->
                       
                       <li class="<?php if($active=='Home') echo"active"; ?>">
                           <a href="index.php">Domov</a>
                       </li>
                       <li class="<?php if($active=='Shop') echo"active"; ?>">
                           <a href="shop.php">Obchod</a>
                       </li>
                       <li class="<?php if($active=='Account') echo"active"; ?>">
                           
                           <?php 
                           
                           if(isset($_SESSION['customer_email'])){
                               
                               echo"<a href='customer/my_account.php'>Môj účet</a>";
                               
                           }
                           
                           ?>
                           
                       </li>
                       <li class="<?php if($active=='Cart') echo"active"; ?>">
                           
                           <?php 
                           
                           if(isset($_SESSION['customer_email'])){
                               
                               echo"<a href='cart.php'>Košík</a>";
                               
                           }
                           
                           ?>

                       </li>
                       <li class="<?php if($active=='Contact') echo"active"; ?>">
                           <a href="contact.php">Kontakt</a>
                       </li>
                       
                   </ul><!-- nav navbar-nav left Finish -->
                   
               </div><!-- padding-nav Finish -->
               
               <a href="cart.php" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary Begin -->
                   
                   <i class="fa fa-shopping-cart"></i>
                   
                   <span><?php items(); ?> | </span>
                   
                   <i class="fa fa-money"></i>
                   
                   <span><?php total_price(); ?></span>
                   
                   
               </a><!-- btn navbar-btn btn-primary Finish -->
               
           </div><!-- navbar-collapse collapse Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- navbar navbar-default Finish -->
   
   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Domov</a>
                   </li>
                   <li>
                       <a href="shop.php">Obchod</a>
                   </li>
                   <li> <?php echo $pro_title; ?> </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
           <div class="col-md-12"><!-- col-md-12 Begin -->
               <div id="productMain" class="row"><!-- row Begin -->
                   <div class="col-sm-6"><!-- col-sm-6 Begin -->
                       <div id="mainImage"><!-- #mainImage Begin -->
                           <div id="myCarousel" class="carousel slide" data-ride="carousel"><!-- carousel slide Begin -->
                               <ol class="carousel-indicators"><!-- carousel-indicators Begin -->
                                   <li data-target="#myCarousel" data-slide-to="0" class="active" ></li>
                                   <li data-target="#myCarousel" data-slide-to="1"></li>
                                   <li data-target="#myCarousel" data-slide-to="2"></li>
                               </ol><!-- carousel-indicators Finish -->
                               
                               <div class="carousel-inner">
                                   <div class="item active">
                                       <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="Product 3-a"></center>
                                   </div>
                                   <div class="item">
                                       <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="Product 3-b"></center>
                                   </div>
                                   <div class="item">
                                       <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="Product 3-c"></center>
                                   </div>
                               </div>
                               
                               <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control Begin -->
                                   <span class="glyphicon glyphicon-chevron-left"></span>
                                   <span class="sr-only">Previous</span>
                               </a><!-- left carousel-control Finish -->
                               
                               <a href="#myCarousel" class="right carousel-control" data-slide="next"><!-- right carousel-control Begin -->
                                   <span class="glyphicon glyphicon-chevron-right"></span>
                                   <span class="sr-only">Next</span>
                               </a><!-- right carousel-control Finish -->
                               
                           </div><!-- carousel slide Finish -->
                       </div><!-- mainImage Finish -->

                   </div><!-- col-sm-6 Finish -->
                   
                   <div class="col-sm-6"><!-- col-sm-6 Begin -->
                       <div class="box"><!-- box Begin -->
                           <h1 class="text-center"> <?php echo $pro_title; ?> </h1>
                           
                           
                           
                           <form action="details.php?add_cart=<?php echo $product_id; ?>" class="form-horizontal" method="post"><!-- form-horizontal Begin -->
                               <div class="form-group"><!-- form-group Begin -->
                                   <label for="" class="col-md-5 control-label">Množstvo</label>
                                   
                                   <div class="col-md-7"><!-- col-md-7 Begin -->
                                          <select name="product_qty" id="" class="form-control"><!-- select Begin -->
                                           <option>1</option>
                                           <option>2</option>
                                           <option>3</option>
                                           <option>4</option>
                                           <option>5</option>
                                           </select><!-- select Finish -->
                                   
                                    </div><!-- col-md-7 Finish -->
                                   
                               </div><!-- form-group Finish -->
                               
                               <?php 


                                        echo "

                                            <p class='price'>

                                            PRICE: € $pro_price

                                            </p>

                                        ";

                               
                               ?>
                               
                               <p class="text-center buttons"><button class="btn btn-primary i fa fa-shopping-cart"> Pridať do košíku</button></p>
                               
                               
                               
                           </form><!-- form-horizontal Finish -->
                           
                       </div><!-- box Finish -->
                       
                       <div class="row" id="thumbs"><!-- row Begin -->
                           
                           <div class="col-xs-4"><!-- col-xs-4 Begin -->
                               <a data-target="#myCarousel" data-slide-to="0"  href="#" class="thumb"><!-- thumb Begin -->
                                   <img src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="product 1" class="img-responsive">
                               </a><!-- thumb Finish -->
                           </div><!-- col-xs-4 Finish -->
                           
                           <div class="col-xs-4"><!-- col-xs-4 Begin -->
                               <a data-target="#myCarousel" data-slide-to="1"  href="#" class="thumb"><!-- thumb Begin -->
                                   <img src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="product 2" class="img-responsive">
                               </a><!-- thumb Finish -->
                           </div><!-- col-xs-4 Finish -->
                           
                           <div class="col-xs-4"><!-- col-xs-4 Begin -->
                               <a data-target="#myCarousel" data-slide-to="2"  href="#" class="thumb"><!-- thumb Begin -->
                                   <img src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="product 4" class="img-responsive">
                               </a><!-- thumb Finish -->
                           </div><!-- col-xs-4 Finish -->
                           
                       </div><!-- row Finish -->
                       
                   </div><!-- col-sm-6 Finish -->
                   
                   
               </div><!-- row Finish -->
               
               <div class="box" id="details"><!-- box Begin -->
                       
                       <h4>Informácie o produkte</h4>
                   
                   <p>
                       
                       <?php echo $pro_desc; ?>
                       
                   </p>
                       
                       <hr>
                   
               </div><!-- box Finish -->
               
               <div id="row same-heigh-row"><!-- #row same-heigh-row Begin -->
                   <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Begin -->
                       <div class="box same-height headline"><!-- box same-height headline Begin -->
                           <h3 class="text-center">Produkty ktoré Vás môžu zaujimať</h3>
                       </div><!-- box same-height headline Finish -->
                   </div><!-- col-md-3 col-sm-6 Finish -->
                   
                   <?php 
                   
                    $get_products = "select * from products order by rand() LIMIT 0,3";
                   
                    $run_products = mysqli_query($con,$get_products);
                   
                   while($row_products=mysqli_fetch_array($run_products)){
                       
                    $pro_id = $row_products['product_id'];
        
                    $pro_title = $row_products['product_title'];
                    
                    $pro_price = $row_products['product_price'];
                    
                    $pro_img1 = $row_products['product_img1'];
                    
                    $category_id = $row_products['category_id'];
            
                    $get_category = "select * from categories where category_id='$category_id'";
            
                    $run_category = mysqli_query($db,$get_category);
            
                    $row_category = mysqli_fetch_array($run_category);
            
                    $category_title = $row_category['category_title'];
        
                        $product_price = "  € $pro_price  ";
            
                    
                    echo "
                    
                    <div class='col-md-3 col-sm-6 center-responsive'>
                    
                        <div class='product'>
                        
                            <a href='details.php?pro_id=$pro_id'>
                            
                                <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                            
                            </a>
                            
                            <div class='text'>
            
                            <center>
                            
                                <p class='btn btn-primary'> $category_title </p>
                            
                            </center>
                            
                                <h3>
                        
                                    <a href='details.php?pro_id=$pro_id'>
            
                                        $pro_title
            
                                    </a>
                                
                                </h3>
                                
                                <p class='price'>
                                
                                $product_price
                                
                                </p>
                                
                                <p class='button'>
                                
                                    <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
            
                                        Detaily
            
                                    </a>
                                
                                    <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
            
                                        <i class='fa fa-shopping-cart'></i> Pridať do košíka
            
                                    </a>
                                
                                </p>
                            
                            </div>
                        
                        </div>
                    
                    </div>
                    
                    ";
                       
                   }
                   
                   ?>
                   
               </div><!-- #row same-heigh-row Finish -->
               
           </div><!-- col-md-12 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
   
   <?php 
    
    include("includes/footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>
