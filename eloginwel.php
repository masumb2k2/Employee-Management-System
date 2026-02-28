<?php 
$id = (isset($_GET['id']) ? $_GET['id'] : '');
require_once ('process/dbh.php');
$sql1 = "SELECT * FROM employee where id = '$id'";
$result1 = mysqli_query($conn, $sql1);
$employeen = mysqli_fetch_array($result1);
$empName = ($employeen['firstName']);

$sql = "SELECT id, firstName, lastName,  points FROM employee, rank WHERE rank.eid = employee.id order by rank.points desc";
$sql1 = "SELECT pname, duedate FROM project WHERE eid = $id and status = 'Due'";

$sql2 = "Select * From employee, employee_leave Where employee.id = $id and employee_leave.id = $id order by employee_leave.token";

$sql3 = "SELECT * FROM salary WHERE id = $id";

$result = mysqli_query($conn, $sql);
$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);
$result3 = mysqli_query($conn, $sql3);
?>

<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title >Employee Panel | Employee Management System</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<link href="modern.css" rel="stylesheet" media="all">
</head>
<body>

<header>
<nav>
<h1 style="color: #ffffff;">Employee Management System</h1>
<ul id="navli">
<li><a class="homered" href="eloginwel.php?id=<?php echo $id?>">HOME</a></li>
<li><a class="homeblack" href="myprofile.php?id=<?php echo $id?>">My Profile</a></li>
<li><a class="homeblack" href="empproject.php?id=<?php echo $id?>">My Projects</a></li>
<li><a class="homeblack" href="applyleave.php?id=<?php echo $id?>">Apply Leave</a></li>
<li><a class="homeblack" href="elogin.html">Log Out</a></li>
</ul>
</nav>
</header>
 
<div class="divider"></div>
<div class="page-wrapper">
<div class="animate-slideup">
<!-- Leaderboard Section -->
<div class="card">
<div class="card-header">
<h2><i class="fas fa-trophy"></i> Employee Leaderboard</h2>
</div>
<div class="card-body">
<table>
<tr>
<th>Seq.</th>
<th>Emp. ID</th>
<th>Name</th>
<th>Points</th>
</tr>
<?php
$seq = 1;
while ($employee = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<td>".$seq."</td>";
echo "<td>".$employee['id']."</td>";
echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
echo "<td>".$employee['points']."</td>";
echo "</tr>";
$seq+=1;
}
?>
</table>
</div>
</div>

<!-- Due Projects Section -->
<div class="card">
<div class="card-header">
<h2><i class="fas fa-tasks"></i> Due Projects</h2>
</div>
<div class="card-body">
<table>
<tr>
<th>Project Name</th>
<th>Due Date</th>
</tr>
<?php
while ($employee1 = mysqli_fetch_assoc($result1)) {
echo "<tr>";
echo "<td>".$employee1['pname']."</td>";
echo "<td>".$employee1['duedate']."</td>";
echo "</tr>";
}
?>
</table>
</div>
</div>

<!-- Salary Status Section -->
<div class="card">
<div class="card-header">
<h2><i class="fas fa-money-bill-wave"></i> Salary Status</h2>
</div>
<div class="card-body">
<table>
<tr>
<th>Base Salary</th>
<th>Bonus</th>
<th>Total Salary</th>
</tr>
<?php
while ($employee = mysqli_fetch_assoc($result3)) {
echo "<tr>";
echo "<td>".$employee['base']."</td>";
echo "<td>".$employee['bonus']." %</td>";
echo "<td>".$employee['total']."</td>";
echo "</tr>";
}
?>
</table>
</div>
</div>

<!-- Leave Status Section -->
<div class="card">
<div class="card-header">
<h2><i class="fas fa-calendar-alt"></i> Leave Status</h2>
</div>
<div class="card-body">
<table>
<tr>
<th>Start Date</th>
<th>End Date</th>
<th>Total Days</th>
<th>Reason</th>
<th>Status</th>
</tr>
<?php
while ($employee = mysqli_fetch_assoc($result2)) {
$date1 = new DateTime($employee['start']);
$date2 = new DateTime($employee['end']);
$interval = $date1->diff($date2);

echo "<tr>";
echo "<td>".$employee['start']."</td>";
echo "<td>".$employee['end']."</td>";
echo "<td>".$interval->days."</td>";
echo "<td>".$employee['reason']."</td>";
echo "<td>".$employee['status']."</td>";
echo "</tr>";
}
?>
</table>
</div>
</div>
</div>
</div>
</body>
</html>
