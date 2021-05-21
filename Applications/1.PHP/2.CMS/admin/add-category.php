<?php include "header.php"; 
if($_SESSION['user_role']=='0'){

    header('location:post.php');
} 

if (isset($_POST['save'])) {
    include "config.php";
   $cat = mysqli_real_escape_string($con, $_POST['cat']);
    
   $sql = "SELECT * FROM category Where category_name='$cat'";
    $result = mysqli_query($con, $sql) or die('Query Failed. ' . mysqli_error());
    if (mysqli_num_rows($result) > 0) {
        echo "<p style='color:red,text-align:center;margin:10px 0px;'>Category Already Exist</p>";
    } else {
        $sql1 = "INSERT INTO category values(null,'$cat',0)";
        $resul1 = mysqli_query($con, $sql1) or die('Query Failed. ' . mysqli_error($con));
        header('location:add-category.php');
    }
}

?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add New Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form action="" method="POST" autocomplete="off">
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat" class="form-control" placeholder="Category Name" required>
                      </div>
                      <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                  </form>
                  <!-- /Form End -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
