<?php
include 'header.php';

require 'archon/contactus/classes/contactusDAL.php';
$contactus_db=new contactusDAL(include('dbConfig.php'));
$contactuss=$contactus_db->Find(1);
$contactus=null;
foreach ($contactuss as $key => $value) {
    $contactus=$value;
}

require 'archon/contactus_user/classes/contactus_userDAL.php';
require 'archon/contactus_user/classes/contactus_userBAL.php';
$contactus_user_db=new contactus_userDAL(include('dbConfig.php'));
$contactus_user=new contactus_userBAL();


if (isset($_POST['submit'])) {
    $contactus_user->userName=$_POST['userName'];
    $contactus_user->email=$_POST['email'];
    $contactus_user->website=$_POST['website'];
    $contactus_user->message=$_POST['message'];
    
    $contactus_user_db->Add($contactus_user);
    $contactus_user=new contactus_userBAL();
    echo "<script type='text/javascript'>alert('Send!')</script>";
}
?>

<div class="top-bg" >
    <img src="img/splash-top.png" class="splash-top" alt>
    <div class="page-title zoomIn animated text-white">Contact Us</div>
</div>

<!-- page content -->
<div class="page-content">
		<div class="grid-row">
			<div id="content" role="main">
				<div class="title">
					<span class="main-title">CONTACT</span><span class="slash-icon">/<i class="fa fa-angle-double-right"></i></span><h5>GET IN TOUCH WITH US</h5>
				</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse consectetur at mi non vulputate. Etiam malesuada arcu massa, ut rhoncus lorem lacinia ac. Donec porttitor velit non lacus venenatis pellentesque. Nam convallis nisl vel consectetur sagittis. Etiam cursus adipiscing purus id aliquet. Nulla sit amet tortor eget est ornare interdum. In vehicula ipsum turpis, et hendrerit arcu dapibus at. Sed malesuada dapibus ante, ac rhoncus risus dictum sed.</p>
                <br>
                <div class="grid-col-row clear">
					<div class="grid-col grid-col-3 sidebar">
						<div class="contacts">
							<div class="">
								<i class="fa  fa-globe"></i>
								<div class="contact-content" style="margin-top: -20px;margin-bottom: 32px;" >
									<strong>Where we are:</strong>
									<p><?php echo $contactus['address'] ?></p>
								</div>
							</div>
							<div class="">
								<i class="fa fa-phone"></i>
								<div class="contact-content" style="margin-top: -20px;margin-bottom: 32px;">
									<strong>Customer Care:</strong>
									<p>
                                        <a href="tel:<?php echo $contactus['phoneNo'] ?>"><?php echo $contactus['phoneNo'] ?></a>
                                    </p>
								</div>
							</div>
							<div class="">
								<i class="fa fa-envelope-o"></i>
								<div class="contact-content" style="margin-top: -20px;margin-bottom: 32px;" >
                                    <strong>General Email:</strong>
                                    <p>
                                        <a href="mailto:<?php echo $contactus_result['email'] ?>"><?php echo $contactus['email'] ?>
                                    </p>
								</div>
							</div>
							<div class="">
								<i class="fa  fa-power-off"></i>
								<div class="contact-content" style="margin-top: -20px;margin-bottom: 32px;">
									<strong>Work Time:</strong>
									<p><?php echo $contactus['workTime'] ?></p>
								</div>
							</div>
							<!-- <div class="last">
								<i class="fa fa-share-alt"></i>
								<div class="contact-content">
									<strong>Follow us:</strong>
									<a href="#" class="contact-round"><i class="fa fa-twitter"></i></a>
									<a href="#" class="contact-round"><i class="fa fa-facebook"></i></a>
									<a href="#" class="contact-round"><i class="fa fa-skype"></i></a>
									<a href="#" class="contact-round"><i class="fa fa-rss"></i></a>
									<a href="#" class="contact-round"><i class="fa fa-linkedin"></i></a>
								</div>
							</div> -->
						</div>	
					</div>
					<div class="grid-col grid-col-9">
						<div class="composer">
							<div class="info-boxes error-message" id="feedback-form-errors">
								<div class="info-box-icon"><i class="fa fa-times"></i></div>
								<strong>Error box</strong><br />
								<div class="message"></div>
							</div>
							<div class="info-boxes confirmation-message" id="feedback-form-success">
								<div class="info-box-icon"><i class="fa fa-check"></i></div>
								<strong>Confirmation box</strong><br />Vestibulum sodales pellentesque nibh quis imperdiet
								<div class="close-button"><i class="fa fa-times"></i></div>
							</div>
						</div>
						<div class="email_server_responce"></div>
						<form  method="post" id="feedback-form" class="message-form clear">
                        
                               
                        <p class="message-form-author">
                                <label for="author">Your Name <span class="required">*</span></label>
                                <input type="text" name="userName" value="<?php echo $contactus_user->userName;?>" required />
							</p>
							<p class="message-form-email">
                                <label for="email">Your E-mail <span class="required">*</span></label>
                                <input type="email" name="email" value="<?php echo $contactus_user->email;?>" required />
							</p>
							<p class="message-form-website">
                                <label for="website">Your Website <span class="required">*</span></label>
                                <input type="url" name="website" value="<?php echo $contactus_user->website;?>" required />
							</p>
							<p class="message-form-message">
                                <label for="message">Your Messege</label>
								<textarea id="message" name="message" cols="45" rows="10" aria-required="true" required> <?php echo $contactus_user->message;?></textarea>
							</p>
							<p class="form-submit rectangle-button green medium" style="float:right">
								<input name="submit" type="submit" id="submit" value="Send" >
							</p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/ page content -->

<?php include 'footer.php'; ?>
	