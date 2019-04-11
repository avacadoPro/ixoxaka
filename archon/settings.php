<?php 
  require ('header.php'); 

  if(isset($_POST['submit'])){

    $name      = $_POST['name'];
    $email     = $_POST['email'];
    $password  = $_POST['password'];
    $contact   = $_POST['contact'];

    $sql = "UPDATE users SET name='$name', email='$email', password='$password', contact='$contact' WHERE id='$user_id'";
    $result = $db->query($sql);

    $_SESSION['name']      = $name;
    $_SESSION['email']     = $email;
    $_SESSION['password']  = $password;
    $_SESSION['contact']   = $contact;

  }

?>



        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <!-- <h4>Profile Settings</h4> -->
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                 <!--  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div> -->
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <h4>Profile Settings</h4>
                  <hr>


                  <div class="x_content">


                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="settings" method="POST" enctype="multipart/form-data">


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="name" value="<?php echo $name; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email" value="<?php echo $email; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Agent-name">Password  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="password" name="password" value="<?php echo $password; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Agent-name">Contact  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="contact" name="contact" value="<?php echo $contact; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                     
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
             
                          <button type="submit" id="save" name="submit" class="btn btn-success">Submit</button>
                          
                        </div>
                      </div>

                    </form>
                     <div class="ln_solid"></div>


                  </div>

                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->







<?php require ('footer.php'); ?>