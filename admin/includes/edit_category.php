<!-- The Update/Edit category Form -->
<form action="" method="post">
    <div class="form-group">
        <label for="cat_title">Update Category</label>
        <?php
        // Updating a Category
        if(isset($_GET['edit'])){
            $cat_id = $_GET['edit'];

            $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
            $select_categories_id = mysqli_query($connection, $query);
            
            while ($row = mysqli_fetch_assoc($select_categories_id)){
                $cat_title = $row['cat_title'];
        ?>
            <input type="text" value="<?php echo $cat_title ?>" name="cat_title" placeholder="Enter new category" class="form-control">

        <?php }} ?>

        <?php
            if(isset($_POST['update_category'])){
                $edit_cat_title = $_POST['cat_title'];
                $query = "UPDATE categories SET cat_title = '{$edit_cat_title}' WHERE cat_id = {$cat_id}";
                $update_query = mysqli_query($connection, $query);

                if(!$update_query){
                    die("Query Failed " . mysqli_error($connection));
                }
               
            }

        ?>

    </div> <!-- .form-group from text -->

    <div class="form-group">
        <input type="submit" name="update_category" class="btn btn-primary" value="Update Category">
    </div>
</form>