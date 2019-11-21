<?php include_once('../layouts/super_admin_header.php') ?>


    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h3 class="h3 mb-0 text-gray-800">  List of Hostel</h3>

                    <a href="#" class=" d-sm-inline-block btn btn-sm btn-outline-primary"  data-toggle="modal" data-target="#create_hostel"><i class="fas fa-plus fa-sm"></i> New Hostel</a>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th><i class="fa fa-list-ol"></i> No</th>
                            <th><i class="fa fa-building"></i> Hostel</th>
                            <th><i class="fa fa-cogs"></i> Actions</th>


                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql = "SELECT *
                                FROM hostel ORDER BY id Desc";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            /** @var TYPE_NAME $row */
                            $i=1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                $row_id = $row['id'];

                                echo "<tr>";

                                echo "<td>" . $i . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
//
                                echo "<td class='text-center'>" . "<a class=\"btn btn-sm btn-outline-danger\" onclick=\"return confirm('tem certeza que deseja apagar?');\" href='delete_hostel?id=$row_id'> <i class=\"fa fa-fw fa-trash\"> </i></a>" . " - 
                                " . "<a class='btn btn-sm btn-outline-primary'data-toggle='modal' href='#edit_hostel$row_id'> <i class='fa fa-pencil-alt'> </i> </a>" . "</td>";
                                echo "</tr>";
                                ?>

                                <div class="modal fade  " id="edit_hostel<?php echo$row_id; ?>"  data-id="<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="edit_hostel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="edit_category">Editing Hostel Name - <?php $row['id'] ?></h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="" action="edit_hostel" method="POST" >

                                                    <input hidden class="form-control" name="id" value="<?php echo $row['id']; ?>">
                                                    <input class="form-control" name="name" value="<?php echo $row['name']; ?>"><br>
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
    <!-- End of Main Content -->



<?php include_once('../layouts/super_admin_footer.php') ?>

<div class="modal fade" id="create_hostel" tabindex="-1" role="dialog" aria-labelledby="create_hostel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Creating Hostel</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="" action="create_hostel" method="POST" >
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <input type="text" name="name" class="form-control form-control-user" id="name" placeholder="Name of Hostel">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        <i class="fa fa-check"> </i>  Create
                    </button>
                </form>

            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button
            </div>
        </div>
    </div>
</div>

