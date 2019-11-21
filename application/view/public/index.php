<?php 
session_start(); 
?>
<?php include_once('../layouts/header.php') ?>
<?php include_once('../layouts/pagination.php') ?>


    <!-- Content -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h3 class="h3 mb-0 text-gray-800"> All products</h3>
                    <form action="search" method="post">
                        <div class="p-1 bg-light rounded rounded-pill shadow-sm ">
                            <div class="input-group">
                                <input type="search" name="search" placeholder="What're you searching for?"
                                       aria-describedby="button-addon1" class="form-control border-0 bg-light">
                                <div class="input-group-append">
                                    <button id="button-addon1" name="submit" type="submit"
                                            class="btn btn-link text-primary"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Page Heading -->
            <div class="card-body">
            <!-- Content Row -->
            <div class="row">


                <?php

                $sql = "SELECT p.id ,p.name,p.price,p.description,p.created_at, p.pur_year,p.filename,p.user_id,u.username,cat.category
                                FROM products AS p 
                                LEFT JOIN	users AS u
                                ON p.user_id=u.id
                                RIGHT JOIN	 categories AS cat
                                ON p.category_id=cat.id ORDER BY id Desc LIMIT $offset, $no_of_records_per_page";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    /** @var TYPE_NAME $row */
                    while ($row = mysqli_fetch_assoc($result)) {
                        $row_id = $row['id'];
                        ?>

                        <div class="col-xl-3 col-md-4 col-xs-6 mb-4">
                            <div class="card border-0 shadow <?php if ($row['category'] == "Other") {
                                echo 'border-left-success';
                            } ?>">
                                <!-- Card image -->
                                <div class="view ">

                                    <a href="view-product?id=<?php echo $row_id ?>">
                                        <img class="card-img-top rounded-top product-img"
                                             src="<?php echo 'assets/products/' . $row['filename'] ?>"
                                             alt="Card image cap">
                                    </a>
                                </div>

                                <!-- Card content -->
                                <div class="card-body  rounded-bottom">
                                    <p class="card-text small mb-2 d-block text-dark font-weight-bold"><?php echo $row['category'] ?></p>
                                    <!-- Title -->
                                    <p class="h5 card-title text-info font-weight-bold font"><?php echo $row['name'] ?></p>
                                    <!-- Description -->
                                    <p class="text-description"><?php echo $row['description'] ?></p>
                                    <hr>
                                    <dv class="price">
                                        <!--                            <p class="mb-1 font-weight-bold text-dark"><i class="fa fa-money-bill"> </i> Price</p>-->
                                        <span class="amount">₹ <?php echo $row['price'] ?></span>
                                    </dv>
                                    <ul class="list-unstyled d-flex justify-content-between mb-3 text-center small">

                                        <li class="funded">
                                            <p class="mb-1 font-weight-bold text-dark"><i class="fa fa-user"> </i>
                                                Publisher</p>
                                            <span class="amount"><?php echo $row['username'] ?></span>
                                        </li>
                                        <li class="year">
                                            <p class="mb-1 font-weight-bold text-dark"><i
                                                        class="fa fa-calendar-day"> </i> Year</p>
                                            <span class="amount"><?php echo $row['pur_year'] ?></span>
                                        </li>
                                    </ul>
                                    <!-- end: progress bard -->
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
            </div>
            <div class="col-lg-12 text-center">
                <ul class=" pagination">
                    <li class="page-item"><a class="page-link" href="?pageno=1">First</a></li>
                    <li class="<?php if ($pageno <= 1) {
                        echo 'page-item disabled';
                    } ?>">
                        <a class="page-link" href="<?php if ($pageno <= 1) {
                            echo '#';
                        } else {
                            echo "?pageno=" . ($pageno - 1);
                        } ?>">Prev</a>
                    </li>
                    <li class="<?php if ($pageno >= $total_pages) {
                        echo 'disabled';
                    } ?> page-item">
                        <a class="page-link" href="<?php if ($pageno >= $total_pages) {
                            echo '#';
                        } else {
                            echo "?pageno=" . ($pageno + 1);
                        } ?>">Next</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
                </ul>
            </div>
            <!-- Content Row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->


<?php include_once('../layouts/footer.php') ?>