<?php include('includes/header.php'); ?>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include('includes/nav.php'); ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Heading -->
                        <h1 class="page-header">
                            Welcome to admin
                            <small>Author</small>
                        </h1>

                        <div class="col-xs-6">
                            
                            <!-- Adding new Category -->
                            <?php insert_categories(); ?>

                            <!-- The Add Category Form -->
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Add Category</label>
                                    <input type="text" name="cat_title" placeholder="Enter new category" class="form-control">
                                </div>

                                <div class="form-group">
                                    <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
                                </div>
                            </form>

                            <!-- The Update category -->
                            <?php 
                                if(isset($_GET['edit'])) {
                                    $cat_id = $_GET['edit'];

                                    include "includes/edit_category.php";
                                }
                            
                            
                            ?>


                        </div> <!-- Add Category Form -->

                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <?php 
                                    // Displaying all Categories
                                      findAllCategories();
                                    ?>

                                    <?php 
                                    // Deleting Category
                                        deleteCategory();
                                    ?>

                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include('includes/footer.php'); ?>