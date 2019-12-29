<?php include_once('../layouts/super_admin_header.php') ?>

    <!-- Content -->


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Users</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List of Users</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th><i class="fa fa-sort-numeric-up-alt"></i> No.</th>
                            <th><i class="fa fa-user"></i> Name</th>
                            <th><i class="fa fa-user-tag"></i> Username</th>
                            <th><i class="fa fa-building"></i> Hostel</th>
                            <th><i class="fa fa-id-card"></i> Room no</th>
                            <th><i class="fa fa-mobile"></i> Mobile</th>
                            <th><i class="fa fa-mail-bulk"></i> Email</th>
                            <th><i class="fa fa-users-cog"></i> Actions</th>

                        </tr>
                        </thead>

                        <tbody>
                        <?php



                        $sql = "SELECT u.id, u.first_name, u.last_name, u.username, h.name, u.room_no, u.phone,u.email
                                FROM users AS u 
                                LEFT JOIN	hostel AS h
                                ON h.id = u.hostel_id";

                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            /** @var TYPE_NAME $row */
                            $i=1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                $row_id = $row['id'];

                                echo "<tr>";

                                echo "<td>" . $i . "</td>";
                                echo "<td>" . $row["first_name"] . "</td>";
                                echo "<td>" . $row['username'] . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['room_no'] . "</td>";
                                echo "<td>" . $row['phone'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";

                                echo "<td class='text-center'>" . "<a class=\"btn btn-sm btn-outline-danger\" onclick=\"return confirm('tem certeza que deseja apagar?');\" href='delete_user?id=$row_id'> <i class=\"fa fa-fw fa-trash\"> </i></a>". " - "
                                    . "<a class='btn btn-sm btn-outline-primary' data-toggle='modal' href='#edit_user$row_id'> <i class='fa fa-pencil-alt'> </i> </a>" ."</td>";
                                ?>

                                <div class="modal fade " id="edit_user<?php echo$row_id; ?>"  data-id="<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="edit_hostel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="edit_category">Editing User -<span class="font-bold"> <?php echo $row['first_name']; ?></span></h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="" action="edit_user" method="POST" >

                                                    <input hidden class="form-control" name="id_user" value="<?php echo $row['id']; ?>"><br>

                                                    <div class="form-group row">
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <label for="first_name"> First Name</label>
                                                            <input class="form-control" name="first_name" value="<?php echo $row['first_name']; ?>"><br>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label for="last_name"> Last Name</label>
                                                            <input class="form-control" name="last_name" value="<?php echo $row['last_name']; ?>"><br>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <label for="room_no"> Room No.</label>
                                                            <input class="form-control" name="room_no" value="<?php echo $row['room_no']; ?>"><br>
                                                        </div>

                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <label for="phone"> Mobile Phone </label>
                                                            <input class="form-control" name="phone" value="<?php echo $row['phone']; ?>"><br>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label for="email"> Email </label>
                                                            <input class="form-control" name="email" value="<?php echo $row['email']; ?>"><br>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <label for="username"> Username </label>
                                                            <input class="form-control" name="username" value="<?php echo $row['username']; ?>"><br>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label for="password"> New Password </label>
                                                            <input class="form-control" name="password" placeholder="New Password"><br>
                                                        </div>
                                                    </div>

                                                    <button  type="submit" class="btn btn-primary btn-user btn-block">
                                                        <i class="fa fa-check"> </i>  Update
                                                    </button>
                                                </form>

                                            </div>

                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <?php

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

<?php include_once('../layouts/super_admin_footer.php') ?>