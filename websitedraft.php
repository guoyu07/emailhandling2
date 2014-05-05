<?php 
/* Interface for Emaillog project that include one tab for showing Emails and one Tab for showing the students who Email have sent to them
There is search ability to shows the Emails whoe sent to specific student*/
session_start(); 
$jsonData= $_SESSION['jsontext'];
$jsonArr = json_decode($jsonData);
//echo '<br /><a href="application.php">page 1</a>';
//print_r( $jsonArr );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" " ">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>BaharsCoolEmailthing.com</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
</head>
<body>
<!-- Header -->
<div id="header">
	<div class="shell">
		<!-- Logo + Top Nav -->
		<div id="top">
			<h1><a href="#">EmailLog</a></h1>
			<div id="top-navigation">
				Welcome <a href="#"><strong>Administrator</strong></a>
				<span>|</span>
				<a href="#">Help</a>
				<span>|</span>
				<a href="#">Profile Settings</a>
				<span>|</span>
				<a href="#">Log out</a>
			</div>
		</div>
		<!-- End Logo + Top Nav -->
		
		<!-- Main Nav -->
		<div id="navigation">
			<ul>
			    <li><a href="#" class="active"><span>All Emails</span></a></li>
			    <li><a href="StudentLog.php"><span>Student Log</span></a></li>
			    <li><a href="#"><span>Drafts</span></a></li>
			    <li><a href="#"><span>Sent Messages</span></a></li>
			    <li><a href="#"><span>Inbox</span></a></li>
			    <li><a href="#"><span>Bounced Emails</span></a></li>
			</ul>
		</div>
		<!-- End Main Nav -->
	</div>
</div>
<!-- End Header -->

<!-- Container -->
<div id="container">
	<div class="shell">
		
		<!-- Small Nav -->
		<div class="small-nav">
			<a href="#">D</a>
			<span>&gt;</span>
			Current Email
		</div>
		<!-- End Small Nav -->
		
		<!-- Message OK -->		
		<div class="msg msg-ok">
			<p><strong>Your file was uploaded succesifully!</strong></p>
			<a href="#" class="close">close</a>
		</div>
		<!-- End Message OK -->		
		
		<!-- Message Error -->
		<div class="msg msg-error">
			<p><strong>You must select a file to upload first!</strong></p>
			<a href="#" class="close">close</a>
		</div>
		<!-- End Message Error -->
		<br />
		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
			<div id="content">
				
				<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Current Email</h2>
						<div class="right">
							<label>search Email</label>
							<input type="text" class="field small-field" />
							<input type="submit" class="button" value="search" />
						</div>
					</div>
					<!-- End Box Head -->	

					<!-- Table -->

					<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th width="13"><input type="checkbox" class="checkbox" /></th>
								<th>Title</th>
								<th>Status</th>
								<th>Date</th>
								<th>Added by</th>
								<th width="110" class="ac">Content Control</th>
							</tr>
							
								
								
								
								<?php
								$count = 0;
								$phpArray = json_decode($jsonData, true);
								foreach ($phpArray as $key => $value)
								{ 
									if($count % 2)
										echo '<tr>';
									else
										echo'<tr class="odd">';
										
									$count = $count +1;	
									
									//echo $count;
									echo '<td><input type="checkbox" class="checkbox" /></td>
									<td><h3><a>';
									
									echo '<br /><a href="application.php?ID=';
									echo $key;
									echo '">';
									echo  $phpArray[$key]['subject'];
									echo ' </a>';
									
									echo '</a></h3></td>
									<td>Sent</td>
									 <td>03.06.2014</td>
									 <td><a href="#">Administrator</a></td>
									 <td><a href="#" class="ico del">Delete</a><a href="#" class="ico edit">Edit</a></td>
									 </tr>';
								}
								?>  

						</table>
										
						<!-- Pagging -->
						<div class="pagging">
							<div class="left">Showing 1-12 of 44</div>
							<div class="right">
								<a href="#">Previous</a>
								<a href="#">1</a>
								<a href="#">2</a>
								<a href="#">3</a>
								<a href="#">4</a>
								<a href="#">245</a>
								<span>...</span>
								<a href="#">Next</a>
								<a href="#">View all</a>
							</div>
						</div>
						<!-- End Pagging -->
						
					</div>
					<!-- Table -->
					
				</div>
				<!-- End Box -->
				
				<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2>Add New Email</h2>
					</div>
					<!-- End Box Head -->
					
					<form action="Draft9.php" method="get">

						<!-- Form -->
						<div class="form">
								<p>
									<span class="req">max 100 symbols</span>
									<label>Email Title <span>(Required Field)</span></label>
									<input type="text" name="subject" class="field size1" />
								</p>
								<p>
									<span class="req">max 100 symbols</span>
									<label>Email TO List <span>(Required Field)</span></label>
									<input type="text" name="tolist" class="field size1" />
								</p>
							   </p>	
								<label>Email ID <span>(Required Field)</span></label>
								<input type="text" name="emailID" ><br>
								</p>
								<p class="inline-field">
									<label>Date</label>
									<select class="field size2">
										<option value="">23</option>
									</select>
									<select class="field size3">
										<option value="">July</option>
									</select>
									<select class="field size3">
										<option value="">2009</option>
									</select>
								</p>
								
								<p>
									
									<span class="req">max 100 symbols</span>
									<label>Content <span>(Required Field)</span></label>
									
									<textarea class="field size1" name="body" rows="10" cols="30"></textarea>
									
								</p>	
							
						</div>
						<!-- End Form -->
						
						<!-- Form Buttons -->
						<div class="buttons">
							<input type="button" class="button" value="preview" />
							<input type="submit" class="button" value="submit" />
						</div>
						<!-- End Form Buttons -->
					</form>
				</div>
				<!-- End Box -->

			</div>
			<!-- End Content -->
			
			<!-- Sidebar -->
			<div id="sidebar">
				
				<!-- Box -->
				<div class="box">
					
					<!-- Box Head -->
					<div class="box-head">
						<h2>Management</h2>
					</div>
					<!-- End Box Head-->
					
					<div class="box-content">
						<a href="#" class="add-button"><span>Add new Email</span></a>
						<div class="cl">&nbsp;</div>
						
						<p class="select-all"><input type="checkbox" class="checkbox" /><label>select all</label></p>
						<p><a href="#">Delete Selected</a></p>
						
						<!-- Sort -->
						<div class="sort">
							<label>Sort by</label>
							<select class="field">
								<option value="">Title</option>
							</select>
							<select class="field">
								<option value="">Date</option>
							</select>
							<select class="field">
								<option value="">Author</option>
							</select>
						</div>
						<!-- End Sort -->
						
					</div>
				</div>
				<!-- End Box -->
			</div>
			<!-- End Sidebar -->
			
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
</div>
<!-- End Container -->

<!-- Footer -->
<div id="footer">
	<div class="shell">
		<span class="left"></span>
		<span class="right">
			<a href="images/footer.gif" target="_blank" title=""></a>
		</span>
	</div>
</div>
<!-- End Footer -->
	
</body>
</html>