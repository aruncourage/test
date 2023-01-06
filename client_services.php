<?php
ini_set('display_errors', 1);
error_reporting(E_ALL && ~E_NOTICE);

require_once('lib/query.php');
require_once('lib/table-config.php');
require_once('common/common.php');

$query = new Query();
$common = new Common();

$offerCollection = $query->selectAll(OFFER_TABLE);
$scheduleCollection = $query->selectAll(SCHEDULES_TABLE);

$getOfferData = $common->twocolumnFormat($offerCollection);
$getScheduleData = $common->twocolumnFormat($scheduleCollection); 

$fname = trim($_POST['fname']);
$lname = trim($_POST['lname']);
$cname  = trim($_POST['cname']);
$webaddress = trim($_POST['webaddress']);
$email = trim($_POST['email']);
$cphone = trim($_POST['cphone']);

if($_POST['checkValidate'] == 'true' && (($fname != "") && ($lname != "") && ($cname != "") && ($webaddress != "") && ($email != "") && ($cphone != ""))) {
    try {
        $fields = ['clnt_master_fname','clnt_master_lname','clnt_master_company','clnt_master_website','clnt_master_email','clnt_master_phone'];
    $values = [$fname,$lname,$cname,$webaddress,$email,$cphone];
    $clientMasterId = $query->insertToAllFieldsMaster(CLINET_MASTER, $fields, $values);
    $service_letter = '';
    $photo1='';
    $photo2='';
    $video='';
    $servicesId ='';
    $schedule_services='';

    if(isset($_FILES['image'])){
        $common->uploadFile('image');
        $service_letter = $_FILES['image']['name']; 
    }

    if(isset($_FILES['photo'])){
        $common->uploadFile('photo'); 
        $photo1 = $_FILES['photo']['name'];
    }

    if(isset($_FILES['photo2'])) {
        $common->uploadFile('photo2'); 
        $photo2 = $_FILES['photo2']['name']; 
    }
    
    if(!empty($_POST['video'])) {
        $video = trim($_POST['video']);     
     }
   
    if(!empty($_POST['services'])) {
        $servicesId = implode(",",$_POST['services']);        
     }
     if(!empty($_POST['schedule_services'])) {
        $schedule_services = trim($_POST['schedule_services']);        
     }
    $clientServiceName='client Services';
    $clientServiceFields  = ['client_master_id','client_request_video_link','request_letter_file','client_request_photo_1','client_request_photo_2','services_id','schedule_services','services_name'];
    $clientServiceValues = [$clientMasterId, $video, $service_letter, $photo1, $photo2, $servicesId,$schedule_services,$clientServiceName];
    $query->insertToAllFiedsServices(CLINET_MASTER_SERVICE_REQUESTS, $clientServiceFields, $clientServiceValues);

    } catch (Throwable $t) {
        // Executed only in PHP 7, will not match in PHP 5.x
        echo "we encountered some error: " + $t;
    } 
  
} else if($_POST['checkValidate'] == 'true'){
    echo "Please ensure to fill in all required fields.";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
 
<!-- Copyright © 2022 - Arthur Anderson Financial Services - All Right Reserved -->

<title>Arthur Anderson Financial Services</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta https-equiv="Content-Language" content="en"/>
    <meta name="keywords" content="Financial, Financial Services, Bookkeeping, Bookkeeping Services, Certified Bookkeeping Services, Accounting, Accounting Services, Business, Business Services, website design, website development, website maintenance" />
    <meta name="description" content="Arthur Anderson Financial Services" />
    <meta name="robots" content="index, follow" />
	<link rel="icon" type="image/icon" href="images/favicon.png">	
	<link rel="stylesheet" type="text/css" href="css/original_style.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	<link rel="stylesheet" type="text/css" href="css/slick.min.css">
	<link rel="stylesheet" type="text/css" href="css/mmenu.css">

<style type="text/css">
#Green {
	color: #005B00;
}
#Blue {
	color: #00F;
}
#DeepGreen {
	color: #00753A;
}
</style>
</head>

<body>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/62f8306f37898912e962dbcc/1gacnqd7s';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();

function clientForm() {
            let form = document.getElementById("form1");
            form.submit();
            alert("Data stored in database!");
        }
const actualBtn = document.getElementById('actual-btn');
const fileChosen = document.getElementById('file-chosen');
actualBtn.addEventListener('change', function(){
  fileChosen.textContent = this.files[0].name
})
</script>
<!--End of Tawk.to Script-->

<div class="wrapper">

	<!-- HEADER -->
	<header class="header">
		<div class="container">
			<div class="header-row">
				<div class="hleft">
					<a href="#menu" class="toggle">
						<span></span>
					</a>
					<a class="logo" href="index.html"><img src="images/aafs4u.png" title="Aafs4u.com" alt="Aafs4u.com" width="197" height="81"></a></div>
				<div class="hright">
					<nav class="header-nav">
						<ul class="nav-link">
							<li><a class="active" href="index.html">home</a></li>
						<!--	<li><a href="#">about us</a></li>  -->
                         <li><a href="about-us.html">About Us</a></li>
							<li><a href="client_services.html">Financial Services</a></li>
							<li><a href="staffing_opportunities.html">Staffing Opportunities</a></li>
							<li><a href="sitemap_new.html">Site Map</a></li>
                            <li><a href="questions_comments.html">Contact Us</a></li>
						</ul>						
					</nav>
					<nav id="menu" style="display: none;">
					<ul>
							<li><a href="index.html">Home</a></li>
						<!--	<li><a href="#">About us</a></li>    -->
                         <li><a href="about-us.html">About Us</a></li>
							<li><a href="client_services.html">Financial Services</a></li>
							<li><a href="staffing_opportunities.html">Staffing Opportunities</a></li>
							<li><a href="sitemap.html">Site Map</a></li>
							<li><a href="under_development_login.html" class="mobile-clink">Account Login</a></li>
						</ul>
					</nav>	
					<div class="hc-btn"><a href="under_development_login.html" class="header-butn">Account Login</a></div>					
				</div>
			</div>
		</div>
	</header>
    
    
   <!-- 
     <ul>
            <li><a href="https://www.aafs4u.com" class="current">Home</a></li>
            <li><a href="https://www.aafs4u.com/about_us.html">About Us</a></li>
            <li><a href="https://www.aafs4u.com/client_services.html" target="_blank">Client Services</a></li>
            <li><a href="https://www.aafs4u.com/staffing_opportunities.html" target="_blank">Staffing Opportunities</a></li>
            <li><a href="https://www.aafs4u.com/news_letter.html">Newsletter</a></li>         
            <li><a href="https://www.aafs4u.com/contact_us.html">Contact Us</a></li>
             <li><a href="https://www.aafs4u.com/sitemap.html">Site Map</a></li>
    </ul> 
    -->

     <img src="images2/aafs_service_page_banner.jpg" title="financialservices" alt="Client Services" width="1920" height="350">

    <!-- PAGE TITLE -->
 <!--   <section class="page-title-section">
        <div class="container">
            <div class="mp-title">
              <!--  <h1>AAFS Client Services</h1>-->
      <!--      </div>
        </div> 
 <!--   </section> -->

    <!-- CONTENT -->
    <section class="sto-wrapper typography">
        <div class="container">
            <div>

                <h2>Financial and Business Services For Our Clients:</h2>
                <div>
                    <figure>
                    <img src="images2/request_financial_services_385.jpg" title="client services" alt="Client Services" width="674" height="385">

                    </figure>
                    <div>
                        <p align="justify">We are a new company brought about by the emergence of the Covid virus and expanding new technologies. Our firm provides new startup companies, small and medium size businesses with the flexibility to have all their financial services controlled from one central location.<br /><br />
      
Our firm is an online e-Commerce information technology based company that utilizes state-of-the-art applications to provide the highest quality of professional services that are available in today’s sophisticated business markets. <br /><br />
       
We primarily cater to new start-up businesses and to small established companies. We understand that no matter what the size of a business, all companies have operating responsibilities that they must cover and that they must manage effectively for their business to function efficiently; for it to secure stability; achieve high-profit margins, and for it to achieve consistent growth and success.  <br /><br />

 With the advent of these new emerging technologies, a small business owner can actually control their business from a hand held, mobile smart phone, tablet or laptop computer.<br /><br />
  
How is this possible?  Arthur Anderson Financial Services in affiliation with Intuit QuickBooks Online can setup an account for you that will integrate and configure various software applications that will enable you to control your business.  You can directly control as much or as little as you want. <br /><br />

<img style="float: right; padding:0px 0px 0px 50px;"  src="images2/business-services.jpg" title="businessservices" alt="Business Services" width="570" height="335">

Our firm employs certified bookkeepers and other financial and legal professionals that can do the work for you, a team of diversified business specialists (Team Members), skilled in numerous areas of financial services, business operations, and administrative functions, and are ready to work for you. <br /><br />

Our technology is amazing. You can easily delegate selected functions to your assigned Team Members (TMs), who will function as your employees, and you can conveniently check and monitor their work. And, you have the flexibility to easily make changes in your Team Member staff should you desire. 
      
We do, however, employ a central core management team that oversees and monitors the work of all our Team Members and Client Accounts to assure quality control.  Should you decide you want to change a Team Member, a simple email or phone call is all it takes.  <br /><br />


<strong id="Blue">Listed below is a menu of the services our Firm offers.</strong> <br /><br />

All services provided are performed by carefully selected, fully vetted and background checked business professionals with verified credentials. 


<!--
<img style="float: right; padding:0px 0px 0px 50px;"  src="images2/buisness-services_banner.jpg" title="Friendship" alt="Virtual Advisior" width="1920" height="500">

-->

                        <div class="knowledge-form">
                            <div class="form-title">
                                <h3 id="Purple">What Do Small and Medium Size Businesses Need in Their Operating Life Cycle To Achieve Success:</h3>
                            </div>
                            <h5 id="Green"><strong>Select Your Desired Financial or Business Service(s) Here</strong>:</h5>

                            <form action="client_services.php" id="client_services" method="POST" id="form1" enctype="multipart/form-data">
                            <input type="hidden" name="checkValidate" value="true" />
                                <div class="form-check-row">
                                    <div class="form-lcol">     

                                    <?php
                                     foreach ($getOfferData[0] as $key => $value) {
                                    $id = 'check'.$value['services_id'];
                                    $checked = $value['client_services_default_value'] ? 'checked' : '';
                                    ?>
                                    <label class="checkbox" for='<?php echo $id ?>'>
                                      <?php 
                                     echo $value['services_name'];
                                    ?>
                                              <input type="checkbox" id='<?php echo $id ?>' name='services[]' value="<?php echo $value['services_id']?>" <?php echo $checked?>>
                                              <span class="checkmark"></span>
                                            </label>
                                   
                                    <?php 
                                     }
                                    ?>
                                    </div>
                                    <div class="form-rcol">
                                        <div>
                                        <?php
                                     foreach ($getOfferData[1] as $key => $value) {
                                    $id = 'check'.$value['services_id'];
                                    $checked = $value['client_services_default_value'] ? 'checked' : '';
                                    ?>
                                    <label class="checkbox" for='<?php echo $id ?>'>
                                      <?php 
                                     echo $value['services_name'];
                                    ?>
                                              <input type="checkbox" id='<?php echo $id ?>' name='services[]' value="<?php echo $value['services_id']?>" <?php echo $checked?>>
                                              <span class="checkmark"></span>
                                            </label>
                                   
                                    <?php 
                                     }
                                    ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-subtitle">
                                    <h5>(Client) - Please Select Your Desired Service(s) Project Schedule Here:</h5>
                                </div>
                                <div class="form-check-row">
                                    <div class="form-lcol">
                                        <div>
                                        <?php
                                    foreach ($getScheduleData[0] as $key => $value) {
                                    $id = 'service-type'.$value['project_schedules_id'];
                                    
                                    ?>
                                    <input type="radio" id="schedule_services" name="schedule_services" value='<?php echo $value['project_schedules_id'] ?>'>
                                            <label for='<?php echo $id ?>'> <strong><?php echo $value['schedules_name'] ?></strong></label><br>                                              
                                              <span class="checkmark"></span>
                                            </label>
                                            <br/>
                                    <?php 
                                     }
                                    ?>

                                        </div>
                                    </div>
                                    <div class="form-rcol">
                                        <div>
                                        <?php
                                    foreach ($getScheduleData[1] as $key => $value) {
                                    $id = 'service-type'.$value['project_schedules_id'];
                                    
                                    ?>
                                    <input type="radio" id="schedule_services" name="schedule_services" value='<?php echo $value['project_schedules_id'] ?>'>
                                            <label for='<?php echo $id ?>'> <strong><?php echo $value['schedules_name'] ?></strong></label><br>                                              
                                              <span class="checkmark"></span>
                                            </label>
                                            <br/>
                                    <?php 
                                     }
                                    ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-subtitle">
                                    <h5>Client Submittal Inquire For Services</h5>
                                </div>
                                <div class="frow">
                                    <div class="flcol">
                                            <div class="f-field">
                                                <label for="fname">First name:</label><br>
                                            <input type="text" id="fname" name="fname" class="form-control">
                                        </div>
                                    </div>
                                    <div class="frcol">
                                            <div class="f-field">
                                                <label for="lname">Last name:</label><br>
                                            <input type="text" id="lname" name="lname" class="form-control">
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="frow">
                                    <div class="flcol">
                                            <div class="f-field">
                                            <label for="cname">Company Name:</label><br>
                                            <input type="text" id="cname" name="cname" class="form-control">
                                        </div>
                                    </div>
                                    <div class="frcol">
                                            <div class="f-field">
                                            <label for="webaddress">Website Address:</label><br>
                                            <input type="text" id="webaddress" name="webaddress" class="form-control">
                                        </div>
                                    </div>
                                </div>
                           
                            <div class="frow">
                                    <div class="flcol">
                                            <div class="f-field">
                                            <label for="emailaddress">Email Address:</label><br>
                                            <input type="text" id="email" name="email" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="frcol">
                                            <div class="f-field">
                                            <label for="webaddress">Contact Phone No:</label><br>
                                            <input type="text" id="cphone" name="cphone" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                
                                  <div class="frow">
                                    <div class="flcol">
                                            <div class="f-field">
                                            <label for="videolink">Your Video Link</label><br>
                                            <input type="text" id="video" name="video" class="form-control">
                                        </div>
                                    </div>
                                
                                
                                <div class="frow">
                                    <div class="flcol">
                                            <div class="f-field">
                                            <label for="myfile">Upload Services Request Letter &nbsp;&nbsp;(describe your needs in detail.)</label><br>
                                            <!-- actual upload which is hidden -->
                                                <!-- <input type="file" name="image" /> -->
                                                <input type="file" id="actual-btn" hidden name="image" />

                                                <!-- our custom upload button -->
                                                <label for="actual-btn" class="browse-file">Choose File</label>

                                                <!-- name of file chosen -->
                                                <span id="file-chosen">No file chosen</span>
                                        </div>
                                      </div>
                                    </div>
   
                                          <div class="frcol">
                                            <div class="f-field">
                                            <label for="myfile">Upload Photo 1</label><br>
                                            <!-- actual upload which is hidden -->
                                            <input type="file" id="actual-btn1" hidden name="photo"/>

                                                <!-- our custom upload button -->
                                                <label for="actual-btn1" class="browse-file">Choose File</label>

                                                <!-- name of file chosen -->
                                                <span id="file-chosen">No file chosen</span>
                                        </div>
                                    </div>
                                
                                <div class="frcol">
                                            <div class="f-field">
                                            <label for="myfile">Upload Photo 2</label><br>
                                            <!-- actual upload which is hidden -->
                                            <input type="file" id="actual-btn2" hidden name="photo2"/>

                                                <!-- our custom upload button -->
                                                <label for="actual-btn2" class="browse-file">Choose File</label>

                                                <!-- name of file chosen -->
                                                <span id="file-chosen">No file chosen</span>
                                        </div>
                                    </div>
                                
                               
                                    
                                    <div class="frcol">
                                            
                                    </div>
                                </div>

                            
                                <div class="form-butn">

                              
                                    <button class="butn" type="submit"  value="Submit" onclick="clientForm()">Submit</button>
                                </div>
                                <b class="notice">You will receive a confirmation acknowledgment of your request by email.<br /> 

</b>
                            </form>
                        </div>
                        <p><strong id="Blue">Special Note For Our Clients:</strong> &nbsp;&nbsp; A National Security/Background Check is processed on the identity of all active AAFS  Team Members. &nbsp;Additionally, any AAFS TM that has Bookkeeping access to a Client’s Credit and Bank Accounts works under a <a href="https://www.arthurandersonfinancialservices.com/fiduciary.html" title="Fidelity Bond" target="_blank">Fidelity/Surety Bond</a> to insure  fiduciary responsibilities and client security.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
              

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="footer-row">
            
            <div class="footer-f-col">
            
                    <a class="footer-logo"><img src="images2/AAFSL_EIS.jpg" title="" alt="" width="375" height="118"></a>
                   <!-- <a class="footer-logo" href="index.html"><img src="images2/AAFSL1.jpg" title="Aafs4u.com" alt="Aafs4u.com" width="150" height="87"></a>
                <div class="footer-s-col">
                    <h3 class="footer-title" >Arthur Anderson Financial Services</h3>
                    <a class="footer-logo" href="index.html"><img src="images/aafs4u-footer.png" title="Aafs4u.com" alt="Aafs4u.com" width="194" height="79"></a>  -->
                    
                    <p align="justify">Our firm  has been primarily designed and structured to provide the essential components that a small to medium size business needs to maintain stability, and to achieve higher levels of profitability and success. <p> <strong>Were here to offer our assistance.</strong> </p>

                    
              </div>
      
        <!--        <div class="footer-s-col">
                    <h3 class="footer-title">Contact</h3>
                    <ul class="contact-list">
                        <li class="location">123 Lorem Ipsum, is simply dummy text</li>
                        <li class="contact"><a href="tel:+0001112222">+000-111-2222</a></li>
                        <li class="mail"><a href="mailto:arthur@aafs4u.com">arthur@aafs4u.com</a></li>
                    </ul>
                </div>
                
                -->

                
                <div class="footer-t-col">
                    <h3 class="footer-title">Useful Links:</h3>
                    <div class="link-row">
                        <div class="left-col">
                            <ul class="footer-link">
                                <li><a href="https://www.arthurandersonfinancialservices.com/request_services.html">Submit an Inquiry For Services</a></li>
                                <li><a href="https://www.arthurandersonfinancialservices.com/submit_resume.html">Submit Resume</a></li>
                                <li><a href="https://www.arthurandersonfinancialservices.com/learning.html">Learning & Certifications</a></li>
                                <li><a href="https://www.arthurandersonfinancialservices.com/compensation_structure.html">Compensation Structure</a></li>
                                <li><a href="https://www.arthurandersonfinancialservices.com/video_how_to_use_qbo_online_accountant.html">About QuickBooks Online Accountant</a></li>
                                
                            </ul>
                        </div>
                        
                        
                       <div class="right-col">
							<ul class="footer-link">

                                <li>&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://www.arthurandersonfinancialservices.com/video_how_to_use_qbo_online_accountant.html">Benefits of Using<br />&nbsp;&nbsp;&nbsp;&nbsp;QuickBools Online</a></li>
                                <li>&nbsp;&nbsp;&nbsp; <a href="https://www.arthurandersonfinancialservices.com/questions_comments.html">Questions & Comments</a></li>
								<li>&nbsp;&nbsp;&nbsp; <a href="https://www.arthurandersonfinancialservices.com/under_development_learning.html">Terms & Conditions</a></li>
								<li>&nbsp;&nbsp;&nbsp; <a href="https://www.arthurandersonfinancialservices.com/under_development_privacy.html">Privacy Policy</a></li>
							</ul>
					  </div>
					</div>
				</div>
                
                <!-------  News Letter   ----->

                
                <div class="footer-ft-col">
                    <h3 class="footer-title">Newsletter</h3>
                    <p>Sign up to receive our newsletter<br />and news alerts - <strong>Stay Informed !!</strong> </p>
                    <a href="https://www.arthurandersonfinancialservices.com/news_letter_2.html" title="Sign up to received newsletter & alerts" target="_blank"><img src="images2/register_today.jpg" width="200" height="58" align="center" /></a> 
                    
                <!--    <form class="newsletter"> 
                        <input type="email" name="email" class="form-control"  placeholder="Enter your email address">
                        <button type="submit" class="form-btn"><img src="images/newsletter.png" title="submit" alt="submit" width="23" height="22"></button>
                     </form>  -->

                </div>
            </div>
            
            <section class="sto-wrapper typography">
        <div class="container">
            <div>
            
               <footer class="footer">
        <div class="container">
            <div class="footer-row">
            
         <!--   <div class="footer-f-col"> -->
            <p><h3 id="DeepGreen"><Strong>What Are The Top Reasons For A Businesse's Success or Failure?</Strong></h3></p>                    
<img src="images2/financial_planning_banner.jpg" title="Financial Analysis" alt="Financial Analysis" width="1535" height="400">
</div></div>

</div></div>

            <div class="footer-bottom">
                <div class="bottom-left">
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Copyright © 2022 Arthur Anderson Financial Services - All Rights Reserved</p>
                </div>
                <div class="bottom-right">
                    <ul class="footer-social">
                        <li><a href="#" class="facebook-img" target="_blank"></a></li>
                        <li><a href="#" class="twitter-img" target="_blank"></a></li>
                        <li><a href="#" class="linkedin-img" target="_blank"></a></li>
                        <li><a href="#" class="insta-img" target="_blank"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    

</div>

<script src="js/jquery.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/mmenu.js"></script>
<script src="js/script.js"></script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/62f8306f37898912e962dbcc/1gacnqd7s';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->  <!--  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  -->

</body>
</html>