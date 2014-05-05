<?php  
session_start();
 class Message  
{  
    // Class properties and methods go here  
	 public $Subject = "help";  
	 public $Body = "Body";	 
	 public $Messageid = 1234;  
	 public $today = array();
	
	public function getDate()  
    {  
		
        return $this->today;  
    } 
     public function getSubject()  
    {  
        return $this->Subject . "<br />";  
    }  
	 public function getMessageid()  
    {  
        return $this->Messageid . "<br />";  
    } 
	 public function getBody()  
    {  
        return $this->Body . "<br />";
    } 
     public function setMessageid($newval)  
    {  
        $this->Messageid = $newval;  
    }  	
     public function setBody($newval)  
    {  
        $this->Body = $newval;  
    }  	
     public function setSubject($newval)  
    {  
        $this->Subject = $newval;  
    }  	
	  public function setDate()  
    {  
		$today = getdate();
		/*print_r($today);*/
        $this->today = $today;  
	
    }
}   

class Draft  extends Message
{  
    // Class properties and methods go here  
	 public $TemplateId = 1;  
	 public $Date=array();
	 public $TemplateBody = "Body";	 
	 public $SendTo=array();
	public  $DraftTime = array();

public function getDate()  
    {  
		
        return $this->DraftTime;  
    } 
public function getSendTo()  
    {  
        return $this->SendTo ;  
    }  
public function setSendTo($newval)  
    {  
		
        $this->SendTo = $newval;  
    }
	
 public function gettemplateId()  
    {  
        return $this->TemplateId . "<br />";  
    }  
public function setTemplateId($newval)  
    {  
        $this->TemplateId = $newval;  
    }
public function gettemplateBody()  
    {  
        return $this->TemplateBody . "<br />";  
    }  
public function setTemplateBody($newval)  
    {  
        $this->TemplateBody = $newval;  
    }	
	
public function SendEmail()
{
	//echo '<p>before</p>';
	require_once 'lib/swift_required.php';
	//echo '<p>after</p>';
	$to=$this->getSendTo();
	print_r( $to);
	
// Create the Transport
$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
  ->setUsername('bahar.ah13@gmail.com')
  ->setPassword('inampass1')
  ;
// Create the Mailer using your created Transport
$mailer = Swift_Mailer::newInstance($transport);

$message = Swift_Message::newInstance($this->getSubject())
  ->setFrom(array('bahar.ah13@gmail.com' => 'Bahar'))
  ->setTo($this->getSendTo())
  ->setBody($this->gettemplateBody())
  ;
  $numSent = $mailer->send($message);
   printf("Sent %d messages\n", $numSent);
   $result = $mailer->send($message);
}	
 public function setDate()  
    {  
		$DraftTime = getdate();
		/*print_r($today);*/
        $this->DraftTime = $DraftTime;  
	
    }   
 
}  
class database  extends Draft
{
	 public function insertDatabase($input1,$input2,$input3,$input4,$input5)  
    {  
		
		$conn = pg_pconnect("host=localhost dbname=Message user=postgres password=inampass1")
		or die('Could not connect: ' . pg_last_error());;
		if (!$conn)
		{
		echo "An error connection occurred.\n";
		exit;
		}
		//echo pg_dbname();

		
	//	$input = "ws";
		
/*		$sql =<<<EOF
        INSERT INTO test
        VALUES ('$input');
EOF;
*/
/*
$sql =<<<EOF
     CREATE TABLE student2(
    BannerID INT      NOT NULL,
    emailaddress  TEXT   PRIMARY KEY       NOT NULL
            
);
EOF;
 $ret = pg_query($conn, $sql);
   if(!$ret){
      echo pg_last_error($conn);
   } else {
      echo "Table created successfully\n";
   }
  */ 
/*
$sql =<<<EOF
     CREATE TABLE sentemail(
    ID INT      NOT NULL,
    emailaddress  TEXT   PRIMARY KEY       NOT NULL
            
);
EOF;
 $ret = pg_query($conn, $sql);
   if(!$ret){
      echo pg_last_error($conn);
   } else {
      echo "Table created successfully\n";
   }
  
  */
	//	$sql = "INSERT INTO emailtemplatelog (id,subject,body,status) VALUES ('$input1','$input2','$input3','$input4')";
$ret = pg_query($conn, $sql);
   if(!$ret){
      echo pg_last_error($conn);
   } else {
      echo "Records created successfully\n";
   }	
   
   		//$sql = "INSERT INTO sentemail (ID,emailaddress) VALUES ('$input1','$input5')";
$ret = pg_query($conn, $sql);
   if(!$ret){
      echo pg_last_error($conn);
   } else {
      echo " sentemail Records created successfully\n";
   }
   
		 $sql =<<<EOF
         SELECT * from emailtemplatelog;
EOF;
$ret = pg_query($conn, $sql);
   if(!$ret){
      echo pg_last_error($conn);
      exit;
   }
   
   $jsonArr = array();
   $count = 1;
 while($row = pg_fetch_row($ret)){
 // {   "u1":{ "user":"John", "age":22, "country":"United States" } }
	$jsonArr["u".$count] = array('ID'=>$row[0],'subject'=>$row[1],'body'=>$row[2],'status'=>$row[3]);
	
  //    echo "ID = ". $row[0] . "\n";
  //    echo "subject = ". $row[1] ."\n";
  //    echo "body = ". $row[2] ."\n";
  //    echo "status =  ".$row[3] ."\n\n";
	  
	  $count++;
   }
  
    //  echo json_encode($jsonArr);  
	 
	  
//	  echo 'Welcome to page #1';
$stringtest=json_encode($jsonArr);
$_SESSION['jsontext'] = $stringtest;
//*****************************
 $sql2 =<<<EOF
         SELECT * from sentemail;
EOF;
 /*$sql2 =<<<EOF
DELETE FROM emai WHERE emailaddress = 'heyy'
EOF;
*/
$ret2 = pg_query($conn, $sql2);
   if(!$ret2){
      echo pg_last_error($conn);
      exit;
   }
   
   $jsonArr2 = array();
   $count2 = 1;
 while($row2 = pg_fetch_row($ret2)){
 // {   "u1":{ "user":"John", "age":22, "country":"United States" } }
	$jsonArr2["u2".$count2] = array('ID'=>$row2[0],'emailaddress'=>$row2[1]);
	
    //  echo "ID = ". $row2[0] . "\n";
     // echo "emailaddress = ". $row2[1] ."\n";
   
	  
	  $count2++;
   }
  
     // echo json_encode($jsonArr2);
$stringtest2=json_encode($jsonArr2);
$_SESSION['jsontext2'] = $stringtest2;

//*****************************	

echo $_GET["SearchItem"]; 
$user=$_GET["SearchItem"];
 $sql3 =<<<EOF
         SELECT subject,body,status,emailtemplatelog.id from sentemail,emailtemplatelog
		 WHERE sentemail.emailaddress='$user' and emailtemplatelog.id= sentemail.id
	 ;
EOF;

$ret3 = pg_query($conn, $sql3);
   if(!$ret3){
      echo pg_last_error($conn);
      exit;
   }
    
   $jsonArr3 = array();
   $count3 = 1;
 while($row3 = pg_fetch_row($ret3)){
 // {   "u1":{ "user":"John", "age":22, "country":"United States" } }
	$jsonArr3["u3".$count3] = array('subject'=>$row2[0],'body'=>$row2[1],'status'=>$row2[2],'id'=>$row2[3]);
	
      echo "---subject = ". $row3[0] . "\n";
      echo "---body = ". $row3[1] ."\n";
	  echo "---status = ". $row3[2] ."\n";
	  echo "---id = ". $row3[3] ."\n";
	  $count3++;
   }
  
     // echo json_encode($jsonArr3);
$stringtest3=json_encode($jsonArr3);
$_SESSION['jsontext3'] = $stringtest3;

//if($user)
//header( 'Location: applicationofsearch.php' );




//********************************
 pg_close($dbconn);	
	}   
}


// Works if session cookie was accepted
//echo '<br /><a href="my_json_list2.php">page 2</a>';


$obj = new Draft;  
$to = array();
//$obj->setSendTo(array("bahar.appalachianstate@gmail.com" )); // Set a new one
$obj->setSendTo(array($_GET["tolist"] )); // Set a new one
$to=$obj->getSendTo();
print_r(array_values($to));
//echo count($to);
/*$obj->setDate(); // Set a new one  
$today=$obj->getDate();
print_r($today);
*/
$obj->setMessageid($_GET["emailID"]);
$obj->setBody($_GET["body"]);
$obj->setSubject($_GET["subject"]);

//echo $obj->SendEmail(); // Get the property value  

$databaseobj = new database; 
//foreach ($to as &$value) {
$databaseobj->insertDatabase(155,$obj->getSubject(),$obj-> gettemplateBody(),'bonunnnnce',$value);
//}
//echo "foo is $subject";
//echo '<p>heeeeeeeeeee</p>';


//$databaseobj->insertDatabase($_GET["emailID"],$_GET["subject"],$_GET["body"],'bonunnnnce',$_GET["tolist"]);


//echo $_GET["body"]; 
//echo $_GET["SearchItem"]; 
//$user-data='$_GET["SearchItem"]';


?>