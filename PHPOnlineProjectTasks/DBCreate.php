<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title></title>
<meta name="" content="">
</head>
<body bgcolor="#66FFFF">

<?php

/* FUNCTIONS TO CONNECT TO MySQL DATABASE, CREATE SKILLMATCH DATABASE, CREATE AND POPULATE DATABASE TABLES
*/

//FUNCTION TO CONNECT TO MySQL DATABASE BEFORE CREATING SKILLMATCH DATABASE

//define GLOBAL variables to hold connection strings


function CreateDB() {
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "SkillMatch";
	$conn = "";
	//connect to MySQL without $dbname
	try {
	//connection string
	$conn = new PDO("mysql:host=$servername",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//provide feedback about connection
	print "\nConnected to MySQL DB successfully.";	
	}catch (PDOException $e){
		
		//provide error message
		print "\nconnection to MySQL DB failed: ".$e->getMessage();
	}

	//Create SkillMatch database	
	try{
		//prepare query to create SkillMatch DB
		$dbquery = $conn->prepare("CREATE DATABASE `$dbname`; CREATE USER '$username'@'$servername' IDENTIFIED BY '$password'; GRANT ALL ON `$dbname`.* TO '$username'@'$servername'; FLUSH PRIVILEGES");

	//use error mode to catch any errors
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//execute query
	$dbquery->execute();
	//provide some feedback if successful
	 print "\nSkillMatch DB was successfully created.";

	}catch (PDOException $e){
		
		//provide error message
		print "\nCreating SkillMatch DB failed: ".$e->getMessage();
	}
}


//Create Tables
function CreateTables() {
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "SkillMatch";
	$conn = "";
	//Connect to MySQL DB again with SkillMatch database name
	try {	
	$conn = new PDO("mysql:host=$servername;dbname=$dbname; Charset=utf8",$username,$password);

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//provide feedback about connection
	print "\nConnected to MySQL DB successfully.";
		
	}
	catch (PDOException $e){
		
		//provide error message
		print "\nconnection to MySQL DB failed: ".$e->getMessage();
	}

	//Create Tables	
	try{
	//prepare employee table query
	$tblEmployee = $conn->prepare("CREATE TABLE employee (EmployeeID INT(3) UNSIGNED NOT NULL, EmployeeName VARCHAR(30) NOT NULL, PRIMARY KEY(EmployeeID))");

	//prepare skill table query
	$tblSkill = $conn->prepare("CREATE TABLE skill (SkillID INT(3) UNSIGNED NOT NULL, SkillName VARCHAR(50) NOT NULL, PRIMARY KEY(SkillID))");

	//prepare task table query
	$tblTask = $conn->prepare("CREATE TABLE task (TaskID INT(3) UNSIGNED NOT NULL, TaskName VARCHAR(50) NOT NULL, PRIMARY KEY(TaskID))");

	//prepare empskill table query
	$tblEmpSkill = $conn->prepare("CREATE TABLE empskill (EmpSkillID INT(3) UNSIGNED NOT NULL, EmployeeID INT(3) UNSIGNED NOT NULL, SkillID INT(3) UNSIGNED NOT NULL, PRIMARY KEY(EmpSkillID), FOREIGN KEY(EmployeeID) REFERENCES employee(EmployeeID), FOREIGN KEY(SkillID) REFERENCES skill(SkillID))");

	//prepare empskill table query
	$tblTaskSkill = $conn->prepare("CREATE TABLE taskskill (TaskSkillID INT(3) UNSIGNED NOT NULL, TaskID INT(3) UNSIGNED NOT NULL, SkillID INT(3) UNSIGNED NOT NULL, PRIMARY KEY(TaskSkillID), FOREIGN KEY(TaskID) REFERENCES task(TaskID), FOREIGN KEY(SkillID) REFERENCES skill(SkillID))");


	//use error mode to catch any errors
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//execute queries to create tables
	$tblEmployee->execute();
	$tblSkill->execute();
	$tblTask->execute();
	$tblEmpSkill->execute();
	$tblTaskSkill->execute();

	//provide some feedback to user
	print "\nThe 5 tables for SkillMatch database have been successfully created.";
	}

	catch (PDOException $e){
		
		//provide error message
		print "\nCreating SkillMatch tables failed: ".$e->getMessage();
	}
}


//Insert data into the options table
function InsertData() {
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "SkillMatch";
	$conn = "";
	//Connect to MySQL DB again with SkillMatch database name
	try {	
	$conn = new PDO("mysql:host=$servername;dbname=$dbname; Charset=utf8",$username,$password);

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//provide feedback about connection
	print "\nConnected to MySQL DB successfully.";
		
	}
	catch (PDOException $e){
		
		//provide error message
		print "\nconnection to MySQL DB failed: ".$e->getMessage();
	}

	//prepare a query to insert all the values at once
	try{
	//begin transaction
	$conn->beginTransaction();

	//SQL INSERT statements

	//Employee Table
	$conn->exec("INSERT INTO employee(EmployeeID, EmployeeName) VALUES('100','Josh Williams')");
	$conn->exec("INSERT INTO employee(EmployeeID, EmployeeName) VALUES('101','Amy Seaton')");
	$conn->exec("INSERT INTO employee(EmployeeID, EmployeeName) VALUES('102','Joseph Chandler')");
	$conn->exec("INSERT INTO employee(EmployeeID, EmployeeName) VALUES('103','Shane Burklow')");
	$conn->exec("INSERT INTO employee(EmployeeID, EmployeeName) VALUES('104','Emily Bush')");
	$conn->exec("INSERT INTO employee(EmployeeID, EmployeeName) VALUES('105','Victor Ephanor')");
	$conn->exec("INSERT INTO employee(EmployeeID, EmployeeName) VALUES('106','Melissa Batts')");
	$conn->exec("INSERT INTO employee(EmployeeID, EmployeeName) VALUES('107','Jose Smith')");
	$conn->exec("INSERT INTO employee(EmployeeID, EmployeeName) VALUES('108','Jonathan Pasco')");
	$conn->exec("INSERT INTO employee(EmployeeID, EmployeeName) VALUES('109','Craig Brett')");
	$conn->exec("INSERT INTO employee(EmployeeID, EmployeeName) VALUES('110','Beth Sewell')");
	$conn->exec("INSERT INTO employee(EmployeeID, EmployeeName) VALUES('111','Erin Robbins')");
	$conn->exec("INSERT INTO employee(EmployeeID, EmployeeName) VALUES('112','Peter Yarbrough')");
	$conn->exec("INSERT INTO employee(EmployeeID, EmployeeName) VALUES('113','Mary Smith')");
	$conn->exec("INSERT INTO employee(EmployeeID, EmployeeName) VALUES('114','Chris Kattan')");
	$conn->exec("INSERT INTO employee(EmployeeID, EmployeeName) VALUES('115','Anna Summers')");
	$conn->exec("INSERT INTO employee(EmployeeID, EmployeeName) VALUES('116','Maria Ellis')");
	$conn->exec("INSERT INTO employee(EmployeeID, EmployeeName) VALUES('117','Surgena Kilby')");
	$conn->exec("INSERT INTO employee(EmployeeID, EmployeeName) VALUES('118','Lary Bender')");

	//Skill Table
	$conn->exec("INSERT INTO skill(SkillID, SkillName) VALUES('200','Project Manager')");
	$conn->exec("INSERT INTO skill(SkillID, SkillName) VALUES('201','Systems Analyst II')");
	$conn->exec("INSERT INTO skill(SkillID, SkillName) VALUES('202','COBOL II')");
	$conn->exec("INSERT INTO skill(SkillID, SkillName) VALUES('203','Oracle DBA')");
	$conn->exec("INSERT INTO skill(SkillID, SkillName) VALUES('204','System Analyst I')");
	$conn->exec("INSERT INTO skill(SkillID, SkillName) VALUES('205','DB Designer I')");
	$conn->exec("INSERT INTO skill(SkillID, SkillName) VALUES('206','COBOL I')");
	$conn->exec("INSERT INTO skill(SkillID, SkillName) VALUES('207','Technical Writer')");

	//Task Table
	$conn->exec("INSERT INTO task(TaskID, TaskName) VALUES('400','Initial interview')");
	$conn->exec("INSERT INTO task(TaskID, TaskName) VALUES('401','Database design')");
	$conn->exec("INSERT INTO task(TaskID, TaskName) VALUES('402','System design')");
	$conn->exec("INSERT INTO task(TaskID, TaskName) VALUES('403','Database implementation')");
	$conn->exec("INSERT INTO task(TaskID, TaskName) VALUES('404','System coding and testing')");
	$conn->exec("INSERT INTO task(TaskID, TaskName) VALUES('405','System documentation')");
	$conn->exec("INSERT INTO task(TaskID, TaskName) VALUES('406','Final evaluation')");
	$conn->exec("INSERT INTO task(TaskID, TaskName) VALUES('407','System and data loading')");
	$conn->exec("INSERT INTO task(TaskID, TaskName) VALUES('408','Sign-off')");

	//EmpSkill Table
	$conn->exec("INSERT INTO empskill(EmpSkillID, EmployeeID, SkillID) VALUES('300','100','200')");
	$conn->exec("INSERT INTO empskill(EmpSkillID, EmployeeID, SkillID) VALUES('301','101','200')");
	$conn->exec("INSERT INTO empskill(EmpSkillID, EmployeeID, SkillID) VALUES('302','102','201')");
	$conn->exec("INSERT INTO empskill(EmpSkillID, EmployeeID, SkillID) VALUES('303','103','201')");
	$conn->exec("INSERT INTO empskill(EmpSkillID, EmployeeID, SkillID) VALUES('304','104','201')");
	$conn->exec("INSERT INTO empskill(EmpSkillID, EmployeeID, SkillID) VALUES('305','105','202')");
	$conn->exec("INSERT INTO empskill(EmpSkillID, EmployeeID, SkillID) VALUES('306','106','202')");
	$conn->exec("INSERT INTO empskill(EmpSkillID, EmployeeID, SkillID) VALUES('307','107','203')");
	$conn->exec("INSERT INTO empskill(EmpSkillID, EmployeeID, SkillID) VALUES('308','108','203')");
	$conn->exec("INSERT INTO empskill(EmpSkillID, EmployeeID, SkillID) VALUES('309','109','204')");
	$conn->exec("INSERT INTO empskill(EmpSkillID, EmployeeID, SkillID) VALUES('310','110','204')");
	$conn->exec("INSERT INTO empskill(EmpSkillID, EmployeeID, SkillID) VALUES('311','111','204')");
	$conn->exec("INSERT INTO empskill(EmpSkillID, EmployeeID, SkillID) VALUES('312','112','205')");
	$conn->exec("INSERT INTO empskill(EmpSkillID, EmployeeID, SkillID) VALUES('313','113','205')");
	$conn->exec("INSERT INTO empskill(EmpSkillID, EmployeeID, SkillID) VALUES('314','114','206')");
	$conn->exec("INSERT INTO empskill(EmpSkillID, EmployeeID, SkillID) VALUES('315','115','206')");
	$conn->exec("INSERT INTO empskill(EmpSkillID, EmployeeID, SkillID) VALUES('316','116','206')");
	$conn->exec("INSERT INTO empskill(EmpSkillID, EmployeeID, SkillID) VALUES('317','117','207')");
	$conn->exec("INSERT INTO empskill(EmpSkillID, EmployeeID, SkillID) VALUES('318','118','207')");


	//TaskSkill Table
	$conn->exec("INSERT INTO taskskill(TaskSkillID, TaskID, SkillID) VALUES ('500','400','200')");
	$conn->exec("INSERT INTO taskskill(TaskSkillID, TaskID, SkillID) VALUES ('501','400','201')");
	$conn->exec("INSERT INTO taskskill(TaskSkillID, TaskID, SkillID) VALUES ('502','400','205')");
	$conn->exec("INSERT INTO taskskill(TaskSkillID, TaskID, SkillID) VALUES ('503','401','205')");
	$conn->exec("INSERT INTO taskskill(TaskSkillID, TaskID, SkillID) VALUES ('504','402','201')");
	$conn->exec("INSERT INTO taskskill(TaskSkillID, TaskID, SkillID) VALUES ('505','402','204')");
	$conn->exec("INSERT INTO taskskill(TaskSkillID, TaskID, SkillID) VALUES ('506','403','203')");
	$conn->exec("INSERT INTO taskskill(TaskSkillID, TaskID, SkillID) VALUES ('507','404','202')");
	$conn->exec("INSERT INTO taskskill(TaskSkillID, TaskID, SkillID) VALUES ('508','404','203')");
	$conn->exec("INSERT INTO taskskill(TaskSkillID, TaskID, SkillID) VALUES ('509','404','206')");
	$conn->exec("INSERT INTO taskskill(TaskSkillID, TaskID, SkillID) VALUES ('510','405','207')");
	$conn->exec("INSERT INTO taskskill(TaskSkillID, TaskID, SkillID) VALUES ('511','406','200')");
	$conn->exec("INSERT INTO taskskill(TaskSkillID, TaskID, SkillID) VALUES ('512','406','201')");
	$conn->exec("INSERT INTO taskskill(TaskSkillID, TaskID, SkillID) VALUES ('513','406','202')");
	$conn->exec("INSERT INTO taskskill(TaskSkillID, TaskID, SkillID) VALUES ('514','406','205')");
	$conn->exec("INSERT INTO taskskill(TaskSkillID, TaskID, SkillID) VALUES ('515','407','200')");
	$conn->exec("INSERT INTO taskskill(TaskSkillID, TaskID, SkillID) VALUES ('516','407','201')");
	$conn->exec("INSERT INTO taskskill(TaskSkillID, TaskID, SkillID) VALUES ('517','407','202')");
	$conn->exec("INSERT INTO taskskill(TaskSkillID, TaskID, SkillID) VALUES ('518','407','205')");
	$conn->exec("INSERT INTO taskskill(TaskSkillID, TaskID, SkillID) VALUES ('519','408','200')");


	//use error mode to catch any errors
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//commit transactions

	$conn->commit();

	//prvovide some feedback
	print "\nRecords inserted into the 5 tables of the SkillMatch DB successfully.";
	}

	catch (PDOException $e){
		
		//rollback transaction if error
		$conn->rollBack();
		print "\nInserting records into the 5 tables of the SkillMatch DB failed: ".$e->getMessage();
	}
}


//========================================

	
?>


<br />
<div align="center">
<h2>Online Project Task-Employee Skill Match DB Creating</h2>

<form action="DBCreate.php" method="POST">
<select name="project_task">
  <option >Select a Project Task</option>
  <option value="Create Database">Create Database</option>
  <option value="Create Tables">Create Tables</option>
  <option value="Insert Data">Insert Data</option>
</select> <br /> <br />
<input type="submit" name="submit" value="Get Matching Employees"> <br /> 

</form>

<br /> <br />
<?php
	//DISPLAY RESULTS HERE]
	if(isset($_POST['submit'])) {
		try {
			$choice=$_POST['project_task'];
			if($choice == "Create Database") {
				CreateDB();
			}elseif ($choice == "Connect to Skillmatch DB") {
				DBConnect();
			}elseif ($choice == "Create Tables") {
				CreateTables();
			}elseif ($choice == "Insert Data") {
				InsertData();
			}
		}catch(Exception $e) {
			echo($e);
		}
	}
?>
</div>
</body>
</html>