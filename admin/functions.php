<?php

function confrmQuery($result) {
    global $connection;
    if (!$result) {
        die("Query Failed. " . mysqli_error($connection));
    }
}
// Adding category
function insert_categories(){
    global $connection;
    if(isset($_POST['submit'])){
        $cat_title = $_POST['cat_title'];
        if($cat_title == '' || empty($cat_title)){
            echo "Please fill in a category";
        }

        else {
            $query = "INSERT INTO categories(cat_title) VALUE('{$cat_title}')";
            $insert_cat = mysqli_query($connection, $query);
            if($insert_cat) {
                echo "Sucessfully added a new category";
            }
            else {
                echo "Query Failed " .mysqli_error($connection); 
            }
        }

    }  
}

function findAllCategories() {
    global $connection;

    $query = "SELECT * FROM categories";
    $select_categories_sidebar = mysqli_query($connection, $query);
    
    while ($row = mysqli_fetch_assoc($select_categories_sidebar)){
        $cat_title = $row['cat_title'];
        $cat_id = $row['cat_id'];

        echo "<tr>";
        echo "<td>{$cat_id}
        </td>";
        echo "<td>{$cat_title}
        </td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Update</a></td>";
        echo "</tr>";
        
    }
}

function deleteCategory() {
    global $connection;

    if(isset($_GET['delete'])){
        $del_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$del_cat_id}";
        $delete_query = mysqli_query($connection, $query);
        header("location: categories.php");
    }
}

?>