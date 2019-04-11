<?php 

  require ('header.php'); 

    $user_sql = "SELECT * FROM contact";
    $user_result = $db->select($user_sql);


?>



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

                  <h4>All Messages</h4>
                  <hr>
            
                  <div class="x_content">



                     <table id="datatable" class="table table-striped jambo_table bulk_action">
                            <thead>
                              <tr>
                                
                                <th>Person Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Action</th>

                              </tr>
                            </thead>

                            <?php foreach ($user_result as $key) {?>

                          <tr>
                          
                            <td><b><?php echo $key['name']; ?></b></td>
                            <td><?php echo $key['email']; ?></td>
                            <td><?php echo $key['subject']; ?></td>
                            <td><?php echo $key['message']; ?></td>

                            <td><a href="mailto: <?php echo $key['email']; ?>">
                              <button style="height:100%; width:100%;" type="button" name="replyBtn" id="replyBtn" class="fa fa-envelope btn btn-success"></button>
                              </a>
                              </td>
                          
                            



                            
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