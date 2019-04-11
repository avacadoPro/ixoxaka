<?php 

  require ('header.php'); 

  $user_sql = "SELECT * FROM services";
  $user_result = $db->select($user_sql);


      if (isset($_POST['submit'])) {

        $filetmp     = $_FILES["image"]["tmp_name"];
        $filename    = $_FILES["image"]["name"];
        $baseurl     = __DIR__."/";
        $url         = "images/services_images/";
        $filepath    = $url.$filename;
      
        $name        = $_POST['name'];
        $description = $_POST['description'];

        $sql = "INSERT INTO services (name, image, description) VALUES ('$name', '$filepath', '$description')";

        $result = $db->query($sql);
        move_uploaded_file($filetmp, $filepath);

        $user_result = $db->select($user_sql);

    }

?>


<script>
  
  function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(150);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }


</script>



        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <h4>Add New Service</h4>
                  <hr>
            
                  <div class="x_content">
                    

                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo $page; ?>" method="POST" enctype="multipart/form-data">



                       <div class="form-group">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <img style="margin-left: 350px;height:150px; width: 150px;" src="images/default.png" alt="" id="image"> <br> <br>
                         <input style="padding-left: 350px" type="file" name="image" accept="image/*" onchange="readURL(this)">
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="name" placeholder="Social Media" class="form-control col-md-7 col-xs-12" required="">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Agent-name">Description  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="description" name="description" placeholder="About Service" class="form-control col-md-7 col-xs-12" required="">
                        </div>
                      </div>

                    <!--   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Agent-name">Price  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="price" name="price" placeholder="$5" class="form-control col-md-7 col-xs-12" required="">
                        </div>
                      </div> -->
                      <!-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Agent-name">Class Start  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="time" id="start" name="start" class="form-control col-md-7 col-xs-12" required="">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Agent-name">Class End  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="time" id="end" name="end" class="form-control col-md-7 col-xs-12" required="">
                        </div>
                      </div> -->

                     
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
             
                          <button type="submit" id="save" name="submit" class="btn btn-success">Submit</button>
                          
                        </div>
                      </div>

                    </form>
                     <!-- <div class="ln_solid"></div> -->



                     <table id="datatable" class="table table-striped jambo_table bulk_action">
                            <thead>
                              <tr>
                                
                                <th>Image</th>
                                <th>Position</th>
                                <th>Description</th>

                              </tr>
                            </thead>

                            <?php foreach ($user_result as $key) {?>

                          <tr>
                          
                            <td><img src="<?php echo $key['image']; ?>" alt="<?php echo $key['name']; ?>" style="width: 100px"></td>
                            <td><?php echo $key['name']; ?></td>
                             <td><?php echo $key['description']; ?></td>

                            <!-- <td><a href="helper?action=delete_domain&id=<?php echo $key['id']; ?>"> -->
                              <!-- <button style="height:100%; width:100%;" type="button" name="replyBtn" id="replyBtn" class="fa fa-trash btn btn-danger"></button> -->
                              <!-- </a> -->
                              <!-- </td> -->
                          
                            



                            
                          </tr>

                        <?php } ?>

                      </table> 



                  </div>

                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->







<?php require ('footer.php'); ?>