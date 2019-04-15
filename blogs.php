<?php
include 'header.php';

require 'archon/blog/classes/blogDAL.php';
$blogs_db=new blogDAL(include('dbConfig.php'));
$blogs=$blogs_db->LoadAll();


?>

<div class="top-bg" >
    <img src="img/splash-top.png" class="splash-top" alt>
    <div class="page-title zoomIn animated text-white">Blogs</div>
</div>

  <section id="blog" class="padding-section">
        <div class="blog-head">
            <div class="grid-row">
                <div class="grid-col-row clear position">
                    <div class="grid-col">
                        <div class="title">
                            <span class="main-title">BLOG</span>
                            <span class="slash-icon">/</span><br />
                            LATEST FROM<br />OUR BLOG
                        </div>
                    </div>
                    <div class="grid-col grid-col-8 clear bottom">
                        <div class="years"><a href="blog-fullwidth.html">2018</a></div>
                        <div class="slash">/</div>
                        <!--<div class="years"><a href="blog-fullwidth.html">2015</a></div>
                                <div class="slash">/</div>
                                <div class="years"><a href="blog-fullwidth.html">2014</a></div> !-->
                    </div>
                </div>
            </div>
        </div>
        <div class="blog-content">
            <div class="grid-row">
                <div class="blog">

                    <?php foreach ($blogs as $key => $value) { if($key<6) {?>
                    <div class="item clear">
                        <!-- <div class="date-round" style="opacity: 0.2;">
                                    <div class="date-mounth">
                                        <span>17</span>
                                        <p>Oct</p>
                                    </div>
                                </div> -->
                        <div class="media-block <?php echo ($key % 2 == 0) ? "left" : "right" ?>-block">
                            <?php
                                    echo ($key % 2 == 0) ? '<img id="splash-4" src="img/splash-4.png" alt>' : ''
                                    ?>
                            <div class="picture">
                                <!-- <div class="hover-effect">
                                            
                                        </div>
                                        <div class="link-cont">
                                            <a href="blog-single-post.html" class="cws-slide-left fa fa-share-alt"></a>
                                            <a href="images/11.jpg" class="fancy fa fa-search"></a>
                                            <a href="blog-single-post.html" class="cws-slide-right fa fa-heart"></a>
                                        </div> -->
                                <img src="<?php echo './archon/' . $value['image'] ?>"
                                    style="height:400px;width:auto;float:<?php echo ($key % 2 == 0) ? "right" : "left" ?>" />
                                <div class="canvas">
                                    <!-- <div class="grad"></div> -->
                                </div>
                            </div>
                        </div>

                        <div class="item-header"><br><br>
                            <h2> <?php echo $value['title'] ?></h2>
                        </div>
                        <div class="content">
                            <p> <?php echo $value['content'] ?></p>
                        </div>
                        <div class="post-info clear">
                            <span><i class="fa fa-calendar"></i><?php echo " Posted ".$value['dateofcreation']." by ".$value['arthor']; ?></span>
                            <!-- <span><i class="fa fa-edit"></i> Admin</span>
                                    <span><i class="fa fa-comment"></i> 2 Coments</span>
                                    <span><i class="fa fa-bookmark"></i> Audio</span> -->
                            <a class="button" href="blog.php?id=<?php echo $value['id'];?>">/ READ MORE</a>
                        </div>
                    </div>
                    <?php } } ?>


                </div>
            </div>
        </div>
    </section>




<?php include 'footer.php'; ?>
	