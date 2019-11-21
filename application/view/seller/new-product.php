<?php session_start(); ?>
<?php include_once('../layouts/header.php') ?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create the Product!</h1>
                        </div>

                        <form class="user">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control" required maxlength="50" id="productName"
                                           placeholder="Name of product" name="name">
                                </div>
                                <div class="col-sm-6">
                                    <select name="category_id" class="form-control " id="category">
                                        <option value="">--Category--</option>
                                        <?php global $categories; ?>
                                        <?php foreach ($categories as $category) { ?>
                                            <option value="<?php echo $category["id"]; ?>"><?php echo $category["value"]; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">₹</span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="price" maxlength="10" required name="price" aria-label="Amount (to the nearest dollar)" value="<?php echo $price; ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control" required maxlength="4" id="purchaseYear"
                                           placeholder="Year" required name="pur_year" >
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Description" id="productDescription" required name="description"
                                          rows="3"></textarea>
                            </div>


                            <div class="form-group">
                                    <label for="product_photo">Select a photo</label>
                                    <input type="file" class="form-control-file" name="file_upload" required /><br />
                                Max image size should be less than 5 MB.</p>
                            </div>

                            <button class="btn btn-primary btn-block"  type="submit" href=""><i class="fa fa-upload "> </i>
                                Upload Product</button>

                            <hr>
                            <a  class="btn btn-danger btn-block" href="home"><i class="fa fa-window-close text-white "> </i>
                                Cancel</a>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include_once('../layouts/super_admin_footer.php') ?>
