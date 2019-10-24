<html>
<head>
<title>Database 1 Customer Enrollment Form</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div id="main">
<h1>Database 1 Lab Assignment Week 2</h1>

<h3>Student: Bates</h3>
<div id="formbody">
<h2>Customer Enrollment Form</h2>
<hr/>
<form action="" method="post">
  <label>First Name :</label>
    <input type="text" name="c_first_name" id="fname" required="required"/><br /><br />
  <label>Last Name :</label>
    <input type="text" name="c_last_name" id="lname" required="required"/><br/><br />
  <label>Email :</label>
    <input type="email" name="c_email" id="email" required="required"/>
  <label>Email Opt In :</label>
    <input type = "hidden" name="c_email_opt_in" value="false"/>
    <input type="checkbox" name="c_email_opt_in" id="email_opt" checked/><br /><br />
  <label>Phone :</label>
    <input type="tel" name="c_phone" id="phone" required="required"/>
  <label>SMS Opt In :</label>
    <input type = "hidden" name="c_sms_opt_in" value="false"/>
    <input type="checkbox" name="c_sms_opt_in" id="phone_opt" checked/><br /><br />
  <label>Address Line 1 :</label>
    <input type="text" name="c_addr1" id="addr1" required="required"/><br />
  <label>Address Line 2 :</label>
    <input type="text" name="c_addr2" id="addr2"/><br />
  <label>City :</label>
    <input type="text" name="c_city" id="city" required="required"/><br />
  <label>State :</label>
    <input type="text" name="c_state" id="state" required="required"/><br />
  <label>Zip :</label>
    <input type="text" name="c_zip" id="zip" required="required"/><br/><br />
  <label>Gender :</label><br />
    <input type="radio" name="c_gender" value="F" checked> Female<br />
    <input type="radio" name="c_gender" value="M"> Male<br />
    <input type="radio" name="c_gender" value="O"> Other<br /><br />
  <label>Birthdate :</label>
    <input type="date" name="c_birth_date" id="bdate" required="required"/><br /><br />
  <label>What is your quest? </label>
    <select name="c_quest">
      <option disabled selected value> -- choose wisely -- </option>
      <option value="To seek the Holy Grail">To seek the Holy Grail</option>
      <option value="To insert a row into my PostgreSQL database">To insert a row into a PostgreSQL database</option>
      <option value="Why is this on a customer form?">Why is this on a customer form?</option>
      <option value="To boldy go where no one has gone before">To boldy go where no one has gone before</option>
      <option value="other">other</option>
    </select> <br / ><br />
  <input type="submit" value=" Submit " name="submit"/><br />
</form>
</div>

</div>
<?php

if(isset($_POST["submit"])){

try {
$dbh = new PDO("pgsql:host=YOURENDPOINT.YOURREGION.rds.amazonaws.com;dbname=customer",YOURUSERNAME,"YOURPASSWORD");

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line
$sql = "INSERT INTO customer (first_name, last_name, email, email_opt_in, phone, sms_opt_in, addr1, addr2, city, state, zip, gender, birth_date, quest)
VALUES ('".$_POST["c_first_name"]."','".$_POST["c_last_name"]."','".$_POST["c_email"]."','".$_POST["c_email_opt_in"]."','".$_POST["c_phone"]."','".$_POST["c_sms_opt_in"]."','".$_POST["c_addr1"]."','".$_POST["c_addr2"]."','".$_POST["c_city"]."','".$_POST["c_state"]."','".$_POST["c_zip"]."','".$_POST["c_gender"]."','".$_POST["c_birth_date"]."','".$_POST["c_quest"]."')";
if ($dbh->query($sql)) {$_POST = array();
echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";
}
else{
echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
}
$dbh = null;
}
catch(PDOException $e)
{
echo $e->getMessage();
}

}
?>
</body>
</html>
