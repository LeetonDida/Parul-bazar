<?php session_start();?>
<?php include_once('../layouts/header.php') ?>


    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h3 class="h3 mb-0 text-gray-800">  List of my Ads</h3>

                    <a href="new-product" class=" d-sm-inline-block btn btn-sm btn-outline-primary" ><i class="fas fa-plus fa-sm"></i> New Ad</a>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th><i class="fa fa-list-ol"></i> No</th>
                            <th><i class="fa fa-box-open"></i> Name</th>
                            <th><i class="fa fa-coins"></i> Price</th>
                            <th><i class="fa fa-boxes"></i> Category</th>
<!--                            <th><i class="fa fa-calendar-day"></i> Created at</th>-->
                            <th><i class="fa fa-image"></i> Image</th>
                            <th><i class="fa fa-cogs"></i> Actions</th>


                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql = "SELECT p.id ,p.name,p.price,p.description,p.created_at, p.pur_year,p.filename,p.user_id,u.username,cat.category
                                FROM products AS p 
                                LEFT JOIN	users AS u
                                ON p.user_id=u.id
                                RIGHT JOIN	 categories AS cat
                                ON p.category_id=cat.id ORDER BY p.id Desc";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            /** @var TYPE_NAME $row */
                            while ($row = mysqli_fetch_assoc($result)) {
                                $row_id = $row['id'];
                                echo "<tr>";
                                $row_id = $row['id'];

                                echo "<td>" . $row["id"] . "</td>";
                                echo "<td>" . $row["name"] . "</td>";
                                echo "<td>" . $row['price'] . "</td>";
                                echo "<td>" . $row['category'] . "</td>";
//                                echo "<td>" . $row['created_at'] . "</td>";
                                /** @var TYPE_NAME $ */
                                echo "<td class='text-center'>".'<img class="img-responsive " width="90px" src="assets/products/'.$row['filename'].'">'."</td>";
//                                echo "<td>" . $row['email'] . "</td>";
//
                                echo "<td class='text-center'>" . "<a class=\"btn btn-sm btn-outline-danger\" onclick=\"return confirm('tem certeza que deseja apagar?');\" href='delete_product?id=$row_id'> <i class=\"fa fa-fw fa-trash\"> </i></a>" . " - " . "<a class='btn btn-sm btn-outline-primary' href='#'> <i class='fa fa-pencil-alt'> </i> </a>" . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "0 results";
                        }

                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->


<?php include_once('../layouts/footer.php') ?>