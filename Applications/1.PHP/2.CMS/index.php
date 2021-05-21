<?php include 'header.php'; ?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- post-container -->
                    <div class="post-container">
                        <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href="single.php"><img src="images/post-format.jpg" alt=""/></a>
                                </div>
                                <div class="col-md-8">
                                <?php
                                   include 'admin/config.php';
                                    $limit = 3;


                                    if(isset($_GET['page'])){
                                        $page=$_GET['page'];
                                    }else{
                                        $page=1;
                                    }

                                    $offset=($page-1)*$limit;
                                    $sql = "SELECT * FROM post as p left join category  as c on p.category=c.category_id LEft join user as u ON u.user_id=p.author  order by post_id DESC limit $offset,$limit";
                                        $result = mysqli_query($con, $sql) or die('Query Failed');
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <div class="inner-content clearfix">
                                        <h3><a href='single.php'><?= $row['title']?></a></h3>
                                        <div class="post-information">
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <a href='category.php'>PHP</a>
                                            </span>
                                            <span>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <a href='author.php'>Admin</a>
                                            </span>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                01 Nov, 2019
                                            </span>
                                        </div>
                                        <p class="description">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua....
                                        </p>
                                        <a class='read-more pull-right' href='single.php'>read more</a>
                                    </div>
                                </div>
                            </div>
                            <?php }}else{ "<h2>No Records Found </h2>";}?>
                        </div>
                     
                      <?php   
                       $sql1 = "SELECT * FROM post order by post_id DESC";
                        $result1 = mysqli_query($con, $sql1) or die('Query Failed');
                        if (mysqli_num_rows($result1) > 0)
                            $total_records = mysqli_num_rows($result1);
                        
                        $total_pages = ceil($total_records / $limit);
                        echo ' <ul class="pagination admin-pagination">'; 
                        if($page>1){
                            echo '<li><a href="index.php?page='.($page - 1).'">Prev</a></li>'; 
                        }
                        for ($i = 1; $i <= $total_pages; $i++) {
                            if($i==$page){
                                $active='class="active"';
                            }else{
                                $active='';
                            }

                            echo '<li '.$active.'><a href="index.php?page='.$i.'">'.$i.'</a></li>';
                        }

                        if($total_pages >$page){
                            echo '<li><a href="index.php?page='.($page + 1).'">Next</a></li>';
                        }
                        echo '</ul>';
                    ?>
                    </div><!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
