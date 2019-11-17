<?php include_once ('../layouts/header.php') ?>
<?php include_once ('../layouts/pagination.php') ;
$product_id=$_GET['id'];
?>



    <!-- Content -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->


        <!-- Content Row -->
        <div class="row">

            <?php

            $sql = "SELECT p.id ,p.name,p.price,p.description,p.created_at, p.pur_year,p.filename,p.user_id,u.username,h.name, u.room_no, u.phone, u.email, cat.category
                                FROM products AS p 
                                LEFT JOIN	users AS u
                                ON p.user_id=u.id
                                RIGHT JOIN	 categories AS cat
                                ON p.category_id=cat.id
                                Left JOIN	 hostel AS h
                                ON u.hostel_id=h.id
                                where p.id=$product_id";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                /** @var TYPE_NAME $row */
                while ($row = mysqli_fetch_assoc($result)) {
                    $row_id = $row['id'];
                    ?>

                    <div class="col-xl-12 col-md-12 col-xs-12">
                        <div class="card border-0 shadow <?php if($row['category']=="Other"){ echo 'border-left-success';}?>">
                            <!-- Card image -->
                            <div class="row">
                            <div class="col-lg-6">
                                <a data-toggle="modal" data-target="#product-image" href="#"">
                                    <img class=" card-img-top rounded-top product-view-img" src="<?php echo 'assets/products/'.$row['filename'] ?>" alt="Card image cap">
                                </a>

                            </div>
                            <div class="col-lg-6">
                                <div class="card-body  rounded-bottom">
                                    <p class="card-text   d-block text-dark font-weight-bold"><?php echo $row['category'] ?></p>
                                    <!-- Title -->
                                    <p  class="h1 card-title text-info font-weight-bold font"><?php echo $row['name'] ?></p>
                                    <!-- Description -->
                                    <p class="text-dark "><i class="fa fa-align-justify">  </i> <?php echo $row['description'] ?></p>

                                    <p class="text-dark"><i class="fa fa-money-bill">  </i>  ₹ <?php echo $row['price'] ?></p>
                                    <p class="mb-1 text-dark"><i class="fa fa-calendar-day"> </i> Year
                                        <span class="amount"> <?php echo $row['pur_year'] ?></span></p>

                                    <hr>


                                    <ul class="list-unstyled d-sm-flex  justify-content-between mb-3 text-center ">
                                        <li class="font-weight-bold text-dark">
                                           <i class="fa fa-user"> </i> <span class="amount"><?php echo $row['username'] ?></span>
                                        </li>
                                        <li class="font-weight-bold text-dark">
                                          <i class="fa fa-map-marker-alt"> </i> <span class="amount"><?php echo $row['name'] ?></span> -     <span class="amount"><?php echo $row['room_no'] ?></span>
                                        </li>




                                        <li class="font-weight-bold text-dark">
                                            <span class="social text-muted">  <a href="whatsapp://send?text=Hey There, I'm Interested in your product, <?php echo $product->name; ?>, that you posted on ParulBazar!&phone=+91<?php echo  $row['phone'] ?>" > <i class="  text-success"> W'App </i> </a></span>
                                        </li>
                                        <li class="font-weight-bold text-dark">
                                            <span class="social text-muted font-15  "> <a href="tel:<?php echo $row['phone'] ?>,91"  class="text-dark "> <i class=" fa fa-phone font-weight-bold font-icon text-info ">  </i></a> </span>
                                        </li>
                                        <li class="font-weight-bold text-dark">

                                            <span class="social  font-15  "> <a href="sms:91<?php echo $row['phone'] ?>?body=Hey%20There%20<?php echo $row['username']; ?>,%20I%20am%20Interested%20in%20your%20product%20-><?php echo $row['name']; ?>.%20I%20saw%20it%20on%20ParulBazar" class="text-info "> <i class="fa fa-sms text-primary font-icon"></i> </a></span>
                                        </li>
                                    </ul>


                                </div>
                            </div>
                            </div>



                            <!-- Card content -->

                        </div>
                    </div>
                    <div class="modal fade" id="product-image" tabindex="-1" role="dialog" aria-labelledby="product-image" aria-hidden="true">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><?php echo $row['name']; ?> </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <img class="img-responsive card-img text-center" src="<?php echo 'assets/products/' . $row['filename'] ?>" />

                            </div>
                        </div>
                    </div>


                    <?php
                }
            } else {
                echo "0 results";
            }

            ?>



        </div>
        <!-- Content Row -->

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->




<?php include_once ( '../layouts/footer.php') ?>