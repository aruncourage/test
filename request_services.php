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
    $requestServiceName='Request Services';
    $clientServiceFields  = ['client_master_id','client_request_video_link','request_letter_file','client_request_photo_1','client_request_photo_2','services_id','schedule_services','services_name'];
    $clientServiceValues = [$clientMasterId, $video, $service_letter, $photo1, $photo2, $servicesId,$schedule_services,$requestServiceName];
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
    <meta name="keywords" content="Financial, Financial Services, Bookkeeping, Bookkeeping Services, Certified Bookkeeping Services, Accounting, Accounting Services, Business, Business Services" />
    <meta name="description" content="Arthur Anderson Financial Services" />
    <meta name="robots" content="index, follow" />
	<link rel="icon" type="image/icon" href="images/favicon.png">	
	<link rel="stylesheet" type="text/css" href="css/rqt_style.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	<link rel="stylesheet" type="text/css" href="css/slick.min.css">
	<link rel="stylesheet" type="text/css" href="css/mmenu.css">

<style type="text/css">
#Blue {
	color: #00F;
}
#Blue {
	color: #00F;
}
#Green {
	color: #006432;
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
    

    <!-- PAGE TITLE -->
    <section class="page-title-section">
        <div class="container">
            <div class="mp-title">
                <h1>AAFS Client Services</h1>
            </div>
        </div>
    </section>

    <!-- CONTENT -->
    <section class="sto-wrapper typography">
        <div class="container">
            <div>
                <h2>Submit An Inquiry For Services To Help Manage Your Business</h2>
                <div>
                    <figure>
                     <img src="images2/request_financial_services_355.jpg" title="Staffingopportunities" alt="Staffingopportunities" width="674" height="360">
                       
                       
                    </figure>
                    <div>
                        <p align="justify">We primarily cater to new start-up businesses and small established companies. We understand that no matter what the size of a business, all companies are going to have operating responsibilities that they must cover, and that they must effectively manage for their business to function efficiently; for it to secure stability; achieve high-profit margins, and for it to achieve consistent growth and success.
                        <br /><br /> 
                        
                        We have an online staff of highly professional skilled specialists that possess expertise in diverse areas of business operations, accounting, finance, administrative, tax liabilities, legal issues, website design, and advertising and marketing. 
                         <br /><br /> 
                        
                        
These are the most common areas where business owners seek assistance to keep their business stable and profitable.

 <br /><br /> 
 
In many cases, business owners are not fully aware of all the intricate components involved in making a business successful, so were here to help when possible. </p>



<strong id="Blue">Listed below is a menu of the services our Firm offers.</strong> <br /><br />

All services provided are performed by carefully selected, fully vetted and background checked business professionals with verified credentials. 
                        <div class="knowledge-form">
                            <div class="form-title">
                                <h3 id="Purple">What Do Small and Medium Size Businesses Need in Their Operating Life Cycle To Achieve Success:</h3>
                            </div>
                            <h5 id="Green"><strong>Select Your Desired Financial or Business Service(s) Here</strong>:</h5>
                            <form action="request_services.php" id="client_services" method="POST" id="form1" enctype="multipart/form-data">
                            <input type="hidden" name="checkValidate" value="true" />
                                <!-- <div class="form-check-row">
                                    <div class="form-lcol">
                                        <div>
                                            <label class="checkbox" for="check1">AAFS TMs That Work on My Project Must Have a Background Check
                                              <input type="checkbox" id="check1" name="check1" checked="checked">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check2">AAFS Windows 10/11 File Explorer, MS Office 360, MS Word & Excel
                                              <input type="checkbox" id="check2" name="check2" checked="checked">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check3">AAFS Migration From QuickBooks Desktop to QuickBooks Online
                                              <input type="checkbox" id="check3" name="check3">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check4">AAFS Migration From Other Bookkeeping Apps To QuickBooks Online
                                              <input type="checkbox" id="check4" name="check4">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check5">QBSOL Accountant Month to Month Certified GL Bookkeeping Services
                                              <input type="checkbox" id="check5" name="check5" checked="checked"> 
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check6">QBSOL Bank Account & Credit Card Reconciliation Reports
                                              <input type="checkbox" id="check6" name="check6">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check7">QBSOL Customer Profiles-Monthly Billing & Accounts Receivable Mgmt
                                              <input type="checkbox" id="check7" name="check7">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check8">QBSOL Vendor Profiles - Monthly Bill Paying & Accounts Payable Mgmt
                                              <input type="checkbox" id="check8" name="check8">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check9">QBSOL Monthly Payroll Processing - Tax Report Filings & Deposits
                                              <input type="checkbox" id="check9" name="check9">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check10">QBSOL Bookkeeping - Training & Support
                                              <input type="checkbox" id="check10" name="check10">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check11">QBSOL Monthly Financial Statements - Presentation & Consultation
                                              <input type="checkbox" id="check11" name="check11">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check12">QBSOL Monthly Cash Flow & Budget Reports
                                              <input type="checkbox" id="check12" name="check12">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check13">QBSOL Monthly Cost of Sales Reports
                                              <input type="checkbox" id="check13" name="check13">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check14">QBSOL Monthly Inventory Control & Reports
                                              <input type="checkbox" id="check14" name="check14">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check15">QBSOL Monthly Expense Reports
                                              <input type="checkbox" id="check15" name="check15">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check16">QBSOL Monthly Department Cost Reports
                                              <input type="checkbox" id="check16" name="check16">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check17">QBSOL Monthly Job or Project or Cost Reports
                                              <input type="checkbox" id="check17" name="check17">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check18">AAFS Capital Assets and Depreciation Schedules
                                              <input type="checkbox" id="check18" name="check18">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check19">AAFS Business and Asset Security & Strategies
                                              <input type="checkbox" id="check19" name="check19">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check20">AAFS Fiduciary, Nondisclosure & Other Contractual Agreements Anal
                                              <input type="checkbox" id="check20" name="check20">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check21">AAFS Business Insurance Coverage/Policies & Claim processing
                                              <input type="checkbox" id="check21" name="check21">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check22">AAFS Writing, Articles, Periodicals, Newsletters & Proof Reading
                                              <input type="checkbox" id="check22" name="check22">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check23">AAFS Website Design, Development, SEO & Hosting
                                              <input type="checkbox" id="check23" name="check23">
                                              <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-rcol">
                                        <div>
                                            <label class="checkbox" for="check24">AAFS Windows 10/11 & Android Operating System Config
                                              <input type="checkbox" id="check24" name="check24">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check25">AAFS Computer Programming, Hardware & Software Config
                                              <input type="checkbox" id="check25" name="check25">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check26">AAFS Information Technology and Equipment Upgrades
                                              <input type="checkbox" id="check26" name="check26">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check27">AAFS Credit Analysis & Enhancement of Credit Ratings
                                              <input type="checkbox" id="check27" name="check27"  checked="checked">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check28">AAFS Loan Analysis, Loan & Line of Credit Procurement
                                              <input type="checkbox" id="check28" name="check28">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check29">AAFS Debt Analysis, Debt Management & Cost Control
                                              <input type="checkbox" id="check29" name="check29">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check30">AAFS Business Operations Analysis & Strategies
                                              <input type="checkbox" id="check30" name="check30">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check31">AAFS Business Growth Opportunities & Strategies
                                              <input type="checkbox" id="check31" name="check31">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check32">AAFS Tax Planning and Tax Preparation & Filing
                                              <input type="checkbox" id="check32" name="check32">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check33">AAFS CPA - Certified Audits & Financial Statements
                                              <input type="checkbox" id="check33" name="check33">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check34">AAFS Advertising and Marketing Campaigns
                                              <input type="checkbox" id="check34" name="check34">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check35">AAFS Promotions, Sponsorships & Name Recognition Ads
                                              <input type="checkbox" id="check35" name="check35">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check36">AAFS Commercial Artwork and Graphic Design
                                              <input type="checkbox" id="check36" name="check36">
                                              <span class="checkmark"></span>
                                            </label>
                                            
                                          <label class="checkbox" for="check37">AAFS Photography & Videographer, Commercial & Ad Videos
                                              <input type="checkbox" id="check37" name="check37">
                                              <span class="checkmark"></span>
                                            </label>
                                            
                                          <label class="checkbox" for="check38">AAFS Start-up Company Consultation
                                              
                                            <input type="checkbox" id="check38" name="check38">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check39">AAFS Business Plans, Capitalization & Budgeting
                                              <input type="checkbox" id="check39" name="check39">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check40">AAFS Paralegal Services - Licensed Paralegal
                                              <input type="checkbox" id="check40" name="check40">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check41">AAFS Fictitious Name, Sole Proprietorship, LLC, Corp Filings
                                              <input type="checkbox" id="check41" name="check41">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check42">AAFS Legal Services - Licensed Lawyer/Attorney
                                              <input type="checkbox" id="check42" name="check42">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check43">AAFS Insurance Specialist-Licensed Insurance Agent
                                              <input type="checkbox" id="check43" name="check43">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check44">AAFS Financial Investment-Licensed Financial Advisor
                                              <input type="checkbox" id="check44" name="check44">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check45">AAFS Business Partnership Opportunities & Structures
                                              <input type="checkbox" id="check45" name="check45">
                                              <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox" for="check46">AAFS Bankruptcy Analysis & Filings
                                              <input type="checkbox" id="check46" name="check46">
                                              <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="form-check-row">
                                    <div class="form-lcol">     

                                    <?php
                                     foreach ($getOfferData[0] as $key => $value) {
                                    $id = 'check'.$value['services_id'];
                                    $checked = $value['request_service_default_value'] ? 'checked' : '';
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
                                    $checked = $value['request_service_default_value'] ? 'checked' : '';
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
                                <!-- <div class="form-check-row">
                                    <div class="form-lcol">
                                        <div>
                                            <input type="radio" id="services" name="services" value="Service type 1">
                                            <label for="catagory1"> <strong>One Time Single Selected Service Project</strong></label><br>                                              
                                              <span class="checkmark"></span>
                                            </label>
                                            <br />
                                           <input type="radio" id="services" name="services" value="Service type 2">
                                            <label for="catagory2"> <strong>One Time Multiple Selected Service Projects</strong></label><br>
                                              <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-rcol">
                                        <div>
                                            <input type="radio" id="services" name="services" value="Service type 3">
                                            <label for="catagory2"> <strong>Monthly Single Selected Service Project</strong></label><br>
                                              <span class="checkmark"></span>
                                              <br />
                                            </label>
                                            <input type="radio" id="services" name="services" value="Service type 4">
                                            <label for="catagory2"> <strong>Monthly Multiple Selected Service Project</strong></label><br>
                                              <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div> -->
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
                                            <label for="myfile">Upload Services Request Letter</label><br>
                                            <!-- actual upload which is hidden -->
                                                <input type="file" id="actual-btn" hidden/>

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
                                                <input type="file" id="actual-btn" hidden/>

                                                <!-- our custom upload button -->
                                                <label for="actual-btn" class="browse-file">Choose File</label>

                                                <!-- name of file chosen -->
                                                <span id="file-chosen">No file chosen</span>
                                        </div>
                                    </div>
                                
                                <div class="frcol">
                                            <div class="f-field">
                                            <label for="myfile">Upload Photo 2</label><br>
                                            <!-- actual upload which is hidden -->
                                                <input type="file" id="actual-btn" hidden/>

                                                <!-- our custom upload button -->
                                                <label for="actual-btn" class="browse-file">Choose File</label>

                                                <!-- name of file chosen -->
                                                <span id="file-chosen">No file chosen</span>
                                        </div>
                                    </div>
                                
                               
                                    
                                    <div class="frcol">
                                            
                                    </div>
                                </div>
                                <div class="form-butn">
                                    <!-- <button class="butn" type="submit" form="form1" value="Submit">Submit</button> -->
                                    <button class="butn" type="submit"  value="Submit" onclick="clientForm()">Submit</button>
                                </div>
                                <b class="notice">You will receive a confirmation acknowledgment of your request by email.<br /> 

</b>
                            </form>
                        </div>
                        <p><strong id="Blue">A Special Note For Our Clients:</strong> &nbsp;&nbsp; A National Security/Background Check is processed on the identity of all active AAFS  Team Members. &nbsp;Additionally, any AAFS TM that has Bookkeeping access to a Client’s Credit and Bank Accounts works under a Fidelity/Surety Bond to insure  fiduciary responsibilities and client security.</p>
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
                                <li><a href="http://www.arthurandersonfinancialservices.com/compensation_structure.html">Compensation Structure</a></li>
                                <li><a href="https://www.arthurandersonfinancialservices.com/movie_qba_video.html">About QuickBooks Online Accountant</a></li>
                            </ul>
                        </div>
                        
                        
                        <div class="right-col">
                            <ul class="footer-link">
                                
                                <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="https://www.arthurandersonfinancialservices.com/under_development_blog.html">Blog</a></li>
                                <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="https://www.arthurandersonfinancialservices.com/under_development_learning.html">Terms And Conditions</a></li>
                                <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="https://www.arthurandersonfinancialservices.com/under_development_privacy.html">Privacy policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-------  News Letter   ----->
                
                <div class="footer-ft-col">
                    <h3 class="footer-title">Newsletter</h3>
                    <p>Sign up to receive our newsletter<br />and news alerts - <strong>Stay Informed !!</strong> </p>
                    <a href="https://www.arthurandersonfinancialservices.com/news_letter.html" title="Sign up to received newsletter & alerts" target="_blank"><img src="images2/register_today.jpg" width="200" height="58" align="center" /></a> 
                    
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
            <p><h3 id="DeepGreen"><Strong>Formulate Your Strategy To Achieve Success</Strong></h3></p>                    
<img src="images2/business_strategies_banner.jpg" title="Aboutimg" alt="Aboutimg" width="1535" height="400">
</div></div>

</div></div>
            
            
            <div class="footer-bottom">
                <div class="bottom-left">
                    <p>Copyright © 2022 Arthur Anderson Financial Services - All Rights Reserved</p>
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
    </footer>

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