<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-post.php">add post</a>
              </div>
              <div class="col-md-12">
               <?php
               include 'config.php';
                $limit = 3;


                if(isset($_GET['page'])){
                    $page=$_GET['page'];
                }else{
                    $page=1;
                }

                $offset=($page-1)*$limit;
                
                if($_SESSION['user_role']==1){
                  $sql = "SELECT * FROM post as p left join category  as c on p.category=c.category_id LEft join user as u ON u.user_id=p.author  order by post_id DESC limit $offset,$limit";
                }elseif($_SESSION['user_role']==0){
                  $sql = "SELECT * FROM post as p left join category  as c on p.category=c.category_id LEft join user as u ON u.user_id=p.author where p.author={$_SESSION['user_id']}  order by post_id DESC limit $offset,$limit";
                }



                 
                $result = mysqli_query($con, $sql) or die('Query Failed');
                if (mysqli_num_rows($result) > 0) {


                ?>
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                           <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td class='id'><?= $row['post_id'] ?></td>
                                <td><?= $row['title'] ?></td>
                                <td><?= $row['category_name'] ?></td>
                                <td><?= $row['post_date'] ?></td>
                                <td><?= $row['username'] ?></td>
                                <td class='edit'><a href='update-post.php?id=<?= $row['post_id'] ?>'><i
                                            class='fa fa-edit'></i></a></td>
                                <td class='delete'><a href='delete-post.php?id=<?= $row['post_id'] ?>&catid=<?= $row['category'] ?>'><i
                                            class='fa fa-trash-o'></i></a></td>
                            </tr>
                        <?php } ?>
                       
                      </tbody>
                  </table>
                   <?php }
                
                    $sql1 = "SELECT * FROM post order by post_id DESC";
                    $result1 = mysqli_query($con, $sql1) or die('Query Failed');
                    if (mysqli_num_rows($result1) > 0)
                        $total_records = mysqli_num_rows($result1);
                    
                    $total_pages = ceil($total_records / $limit);
                    echo ' <ul class="pagination admin-pagination">'; 
                    if($page>1){
                        echo '<li><a href="post.php?page='.($page - 1).'">Prev</a></li>'; 
                    }
                    for ($i = 1; $i <= $total_pages; $i++) {
                        if($i==$page){
                            $active='class="active"';
                        }else{
                            $active='';
                        }

                        echo '<li '.$active.'><a href="post.php?page='.$i.'">'.$i.'</a></li>';
                    }

                    if($total_pages >$page){
                        echo '<li><a href="post.php?page='.($page + 1).'">Next</a></li>';
                    }
                    echo '</ul>';

                ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
