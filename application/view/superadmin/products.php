<?php include_once('../layouts/super_admin_header.php') ?>


    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List of Products</h6>
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
                            <th><i class="fa fa-user"></i> Published By</th>
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
                                ON p.category_id=cat.id ORDER BY id Desc";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            /** @var TYPE_NAME $row */
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                $row_id = $row['id'];
                                echo "<tr>";
                                $row_id = $row['id'];

                                echo "<td>" . $i . "</td>";
                                echo "<td>" . $row["name"] . "</td>";
                                echo "<td>" . $row['price'] . "</td>";
                                echo "<td>" . $row['category'] . "</td>";
                                echo "<td>" . $row['username'] . "</td>";
//                                echo "<td>" . $row['created_at'] . "</td>";
                                /** @var TYPE_NAME $ */
                                echo "<td class='text-center'>" . '<img class="img-responsive " width="90px" src="assets/products/' . $row['filename'] . '">' . "</td>";
//                                echo "<td>" . $row['email'] . "</td>";
//
                                echo "<td class='text-center'>" . "<a class=\"btn btn-sm btn-outline-danger\" 
                                  onclick=\"return confirm('tem certeza que deseja apagar?');\" href='delete_product?id=$row_id'>
                                   <i class=\"fa fa-fw fa-trash\"> </i></a>" . "</td>";
                                echo "</tr>";
                                $i++;
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


<?php include_once('../layouts/super_admin_footer.php') ?>