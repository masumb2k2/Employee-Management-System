<!DOCTYPE html>
<html>

<head>
   

    <!-- Title Page-->
    <title>Add Employee | Employee Management System</title>

    <!-- Modern CSS -->
    <link href="modern.css" rel="stylesheet" media="all">

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <header>
        <nav>
            <h1>EMS</h1>
            <ul id="navli">
                <li><a class="homeblack" href="aloginwel.php">HOME</a></li>
                <li><a class="homered" href="addemp.php">Add Employee</a></li>
                <li><a class="homeblack" href="viewemp.php">View Employee</a></li>
                <li><a class="homeblack" href="assign.php">Assign Project</a></li>
                <li><a class="homeblack" href="assignproject.php">Project Status</a></li>
                <li><a class="homeblack" href="salaryemp.php">Salary Table</a></li> 
                <li><a class="homeblack" href="empleave.php">Employee Leave</a></li>
                <li><a class="homeblack" href="alogin.html">Log Out</a></li>
            </ul>
        </nav>
    </header>
    
    <div class="divider"></div>




    <div class="page-wrapper">
        <div class="animate-slideup">
            <div class="card">
                <div class="card-header">
                    <h2>Add New Employee</h2>
                </div>
                <div class="card-body">
                    <h3 style="margin-bottom: 25px;">Employee Information</h3>
                    <form action="process/addempprocess.php" method="POST" enctype="multipart/form-data">


                        

                        <div class="row row-space">
                            <div class="col-2">
                                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">First Name</label>
                                <div class="input-group">
                                     <input class="input--style-1" type="text" placeholder="Enter first name" name="firstName" required="required">
                                </div>
                            </div>
                            <div class="col-2">
                                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Last Name</label>
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="Enter last name" name="lastName" required="required">
                                </div>
                            </div>
                        </div>





                        <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Email</label>
                        <div class="input-group">
                            <input class="input--style-1" type="email" placeholder="Enter email address" name="email" required="required">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Birthday</label>
                                <div class="input-group">
                                    <input class="input--style-1" type="date" placeholder="Select birthdate" name="birthday" required="required">
                                </div>
                            </div>
                            <div class="col-2">
                                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Gender</label>
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender">
                                            <option disabled="disabled" selected="selected">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Contact Number</label>
                        <div class="input-group">
                            <input class="input--style-1" type="number" placeholder="Enter contact number" name="contact" required="required" >
                        </div>

                        <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">NID (National ID)</label>
                        <div class="input-group">
                            <input class="input--style-1" type="number" placeholder="Enter NID" name="nid" required="required">
                        </div>

                        
                        <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Address</label>
                         <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Enter address" name="address" required="required">
                        </div>

                        <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Department</label>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Enter department" name="dept" required="required">
                        </div>

                        <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Degree</label>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Enter degree" name="degree" required="required">
                        </div>

                        <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Salary</label>
                        <div class="input-group">
                            <input class="input--style-1" type="number" placeholder="Enter salary" name="salary">
                        </div>

                        <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Profile Picture</label>
                        <div class="input-group">
                            <input class="input--style-1" type="file" placeholder="Upload profile picture" name="file">
                        </div>







                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>

</html>
<!-- end document-->
