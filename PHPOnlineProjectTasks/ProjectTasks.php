<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title></title>
<meta name="" content="">
</head>
<body bgcolor="#66FFFF">

<br />
<div align="center">
	<h2>Online Project Task-Employee Skill Matching System</h2>

	<form action="ProjectTasks.php" method="POST">
	<select name="project_task">
	  <option >Select a Project Task</option>
	  <option value="Initial interview">Initial interview</option>
	  <option value="Database design">Database design</option>
	  <option value="System Design">System design</option>
	  <option value="Database implementation">Database implementation</option>
	  <option value="System coding and testing">System coding and testing</option>
	  <option value="System documentation">System documentation</option>
	  <option value="Final evaluation">Final evaluation</option>
	  <option value="System and data loading">System and data loading</option>
	  <option value="Sign-off">Sign-off</option> 
	</select> <br /> <br />
	<input type="submit" name="submit" value="Get Matching Employees"> <br /> 

	</form>

	<br /> <br />
	<table bgcolor="#FFFF99" border="1" cellpadding="5">
	<tr>
		<th>Selected Project Task</th><th>Required Skills</th><th>Matching Employees</th> 
	</tr>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "SkillMatch";
		$conn = "";
		try {	
		$conn = new PDO("mysql:host=$servername;dbname=$dbname; Charset=utf8",$username,$password);

		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//provide feedback about connection
		print "Connected to MySQL DB successfully.<br/>";
			
		}
		catch (PDOException $e){
			
			//provide error message
			print "connection to MySQL DB failed: ".$e->getMessage()."<br/>";
		}
		//DISPLAY RESULTS HERE]
		if(isset($_POST['submit'])){
			try{
				$choice=$_POST['project_task'];
				$query=$conn->prepare("select `task`.`TaskName`, `skill`.`SkillName`, `employee`.`EmployeeName` from `task` inner join `taskskill` on `taskskill`.`TaskID`=`task`.`TaskID` inner join `skill` on `skill`.`SkillID`=`taskskill`.`SkillID` inner join `empskill` on `empskill`.`SkillID`=`taskskill`.`SkillID` inner join `employee` on `employee`.`EmployeeID`=`empskill`.`EmployeeID` where `task`.`TaskName`='".$choice."'");
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$query->execute();
				$result=$query->fetchAll(PDO::FETCH_ASSOC);
				for($i=0;$i<count($result);$i++){
					echo "<tr><td>".$result[$i]['TaskName']."</td><td>".$result[$i]['SkillName']."</td><td>".$result[$i]['EmployeeName']."</td></tr>";
				}
				echo "Information Retrieved Successfully!";
			}catch(PDOException $ex){
				echo "Information Retrieved Unsuccessfully!: ".$ex;
			}
		}
	?>
	</table>
</div>

</body>
</html>