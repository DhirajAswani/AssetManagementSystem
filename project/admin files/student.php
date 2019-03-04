<?php

include_once('includes/bootstrap.php');
$studentdept = "";
$teacherdept = "";
$labdept = "";
$branch="";
$user_id="";
 $deleteStudents="";
if(isset($_GET['studentbranch'])){
   $studentdept .= $_GET['studentbranch']; 
}
if(isset($_GET['teacherbranch'])){
   $teacherdept .= $_GET['teacherbranch']; 
}
if(isset($_GET['labbranch'])){
   $labdept.= $_GET['labbranch']; 
}
if(isset($_GET['branch'])){
   $branch.= $_GET['branch']; 
}
if(isset($_GET['user_id'])){
   $user_id.= $_GET['user_id']; 
}
//if(isset($_POST['deleteStudent'])){
//   $deleteStudents.= $_POST['deleteStudent']; 
//}
//$teacherdept = $_GET['teacherbranch'];
?>


<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ela Admin - HTML5 Admin Template</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
   
    
    <!-- page level plugin css -->

    <!-- page level plugin css -->
    <link rel="stylesheet" href="assets/datatables/dataTables.bootstrap4.css">


    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

    </style>
</head>

<body>
    <!-- Left Panel -->
        <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">Users</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Students</a>
                        <ul class="sub-menu children dropdown-menu">                            
                            <li name="studentbranch"><i class="fa fa-puzzle-piece"></i><a href="student.php?studentbranch=IT">IT</a></li>
                            <li name="studentbranch"><i class="fa fa-id-badge"></i><a href="student.php?studentbranch=CMPN" name="branch">CMPN</a></li>
                            <li name="studentbranch"><i class="fa fa-bars"></i><a href="student.php?studentbranch=INSTRUMENTAL" name="branch">INSTRUMENTAL</a></li>

                            <li name="studentbranch"><i class="fa fa-id-card-o"></i><a href="student.php?studentbranch=EXTC" name="branch">EXTC</a></li>
                            <li name="studentbranch"><i class="fa fa-exclamation-triangle"></i><a href="student.php?studentbranch=ETRX">ETRX</a></li>
                            
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Teachers</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li name="teacherbranch"><i class="fa fa-puzzle-piece"></i><a href="student.php?teacherbranch=INFT">INFT</a></li>
                            <li name="teacherbranch"><i class="fa fa-id-badge"></i><a href="student.php?teacherbranch=CMPN">CMPN</a></li>
                            <li name="teacherbranch"><i class="fa fa-bars"></i><a href="student.php?teacherbranch=NSTRUMENTAL">INSTRUMENTAL</a></li>

                            <li name="teacherbranch"><i class="fa fa-id-card-o"></i><a href="student.php?teacherbranch=EXTC">EXTC</a></li>
                            <li name="teacherbranch"><i class="fa fa-exclamation-triangle"></i><a href="student.php?teacherbranch=ETRX">ETRX</a></li>
                           
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Lab Assistants</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li name="labbranch"><i class="fa fa-puzzle-piece"></i><a href="student.php?labbranch=INFT">INFT</a></li>
                            <li name="labbranch"><i class="fa fa-id-badge"></i><a href="student.php?labbranch=CMPN">CMPN</a></li>
                            <li name="labbranch"><i class="fa fa-bars"></i><a href="student.php?labbranch=INSTRUMENTAL">INSTRUMENTAL</a></li>

                            <li name="labbranch"><i class="fa fa-id-card-o"></i><a href="student.php?labbranch=EXTC">EXTC</a></li>
                            <li name="labbranch"><i class="fa fa-exclamation-triangle"></i><a href="student.php?labbranch=ETRX">ETRX</a></li>
                           
                        </ul>
                    </li>
                    
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Accountants</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">XYZ</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">PQR</a></li>
                            <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">...</a></li>
                            
                           
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>DPO</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">XYZ</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">PQR</a></li>
                            <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">...</a></li>
                            
                           
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>CPO</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">XYZ</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">PQR</a></li>
                            <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">...</a></li>
                            
                           
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>HOD</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">XYZ</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">PQR</a></li>
                            <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">...</a></li>
                            
                           
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Principal</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">XYZ</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">PQR</a></li>
                            
                           
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Store Managers</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">XYZ</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">PQR</a></li>
                            <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">...</a></li>
                            
                           
                        </ul>
                    </li>

                    <li class="menu-title">Assets</li><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Categories</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="font-fontawesome.html">Stationary</a></li>
                            <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">Electric</a></li>
                            <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">Furniture</a></li>
                            <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">IOT Components</a></li>
                            <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">...</a></li>
                            <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">...</a></li>
                            <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">header footer left side same but right side content change for each and every asset </a></li>
                        </ul>
                    </li>
                    
                    
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>   
    
    <div id="right-panel" class="right-panel">
      <?php
       include_once("includes/layouts/header.php");
        
//          include_once("includes/layouts/rightpanel.php");
        ?>
    
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
      
    
        
        <?php
        
        $db=new Database();
                $conn=$db->getConnection();
                $student=new Student($conn);
               
                  $result=$student->studentsOfDepartment($studentdept);
                $results_count=count($result);
          
                
                
        
        ?>
        
        
        
<!--Students info-->
     <?php  
        if($studentdept!=null){
            
       
        ?>
         <div id="data-table" >
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Name</th>

                                            <th scope="col">Email</th>
                                            <th scope="col">Contact</th>
                                            <th scope="col">Branch</th>

                                            <th scope="col">Division</th>
                                            <th scope="col">Roll no</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                for($i = 0; $i < $results_count; $i = $i+1)
                                 {
                          ?>
                                            <tr>
                                                <th scope='row'>
                                                    <?php echo $result[$i]['name'] ?>
                                                </th>
                                                <th scope='row'>
                                                    <?php echo $result[$i]['email'] ?>
                                                </th>

                                                <th scope='row'>
                                                    <?php echo $result[$i]['contact'] ?>
                                                </th>
                                                <th scope='row'>
                                                    <?php echo $result[$i]['branch'] ?>
                                                </th>
                                                <th scope='row'>
                                                    <?php echo $result[$i]['division'] ?>
                                                </th>
                                                <th scope='row'>
                                                    <?php echo $result[$i]['roll_no'] ?>
                                                </th>

                                               <th scope='row'>
                                               
                                               
                                               <a href="?studentbranch=<?php echo $result[$i]['branch'];?>&user_id=<?php echo $result[$i]['user_id'];  ?>"class="edit fa fa-pencil btn btn-primary"  data-toggle='modal' id="editStudents"></a>
                                                 
                                                </th>
                                                <th scope='row'>
                                                    <a  href="deleteusers.php?studentbranch=<?php echo $result[$i]['branch'];?>&user_id=<?php echo $result[$i]['user_id'];  ?>" class="fa fa-trash btn btn-danger" ></a>
                                                </th>
                                            </tr>
    <div class="modal fade" id="StudentEdit" role="dialog">
    <div class="modal-dialog">
    
   <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Edit Students</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" action="update.php" method="post">
           <div class="form-group">
         <input type="hidden" id="edit_category_id" name="user_id" class="form-control"  value="<?php echo $result[$i]['user_id'];?>"> </div>

            <div class="form-group">
              <label for="name"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input name="name" type="text" class="form-control" id="Student_name" placeholder="User_Name" value="<?php echo $result[$i]['name'];?>">
            </div>
              <div class="form-group">
              <label for="email"><span class="glyphicon glyphicon-user"></span> Email</label>
              <input name="email" type="text" class="form-control" id="Student_email" placeholder="Email" value="<?php echo $result[$i]['email'];?>">
            </div>
              <div class="form-group">
              <label for="contact"><span class="glyphicon glyphicon-user"></span> Contact</label>
              <input name="contact" type="text" class="form-control" id="Student_contact" placeholder="Contact" value="<?php echo $result[$i]['contact'];?>">
            </div>
            <div class="form-group">
              <label for="branch"><span class="glyphicon glyphicon-user"></span> Branch</label>
              <input name="branch" type="text" class="form-control" id="Student_branch" placeholder="branch" value="<?php echo $result[$i]['branch'];?>">
            </div>
            <div class="form-group">
              <label for="division"><span class="glyphicon glyphicon-user"></span> Division</label>
              <input name="division" type="text" class="form-control" id="Student_Division" placeholder="division" value="<?php echo $result[$i]['division'];?>">
            </div>
            <div class="form-group">
              <label for="rollno"><span class="glyphicon glyphicon-user"></span> Roll no</label>
              <input name="rollno" type="text" class="form-control" id="Student_Rollno" placeholder="Roll no" value="<?php echo $result[$i]['roll_no'];?>">
            </div>
            
              <button type="submit" name="studentsubmit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Save Changes</button>
          </form>
        </div>
        
      </div>
      
      </div>
        </div>
                                            <?php } ?>


                                    </tbody>
                                </table>

                            </div>
                    <?php }?>
                    
                
                        
                           <?php

                

                





?>

        
       <?php
                $teacher=new Student($conn);
               
                  $res_teacher=$teacher->teachersOfDepartment($teacherdept);
                $res_teacher_count=count($res_teacher);
          
                
                
        
        ?>
        
        <?php
        if($teacherdept!=null)
        {
   ?>
       <div id="data-table teacher-data"  >
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Name</th>

                                            <th scope="col">Email</th>
                                            <th scope="col">Contact</th>
                                            <th scope="col">Branch</th>

                                            
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                for($i = 0; $i < $res_teacher_count; $i = $i+1)
                                 {
                          ?>
                                            <tr>
                                                <th scope='row'>
                                                    <?php echo $res_teacher[$i]['name'] ?>
                                                </th>
                                                <th scope='row'>
                                                    <?php echo $res_teacher[$i]['email'] ?>
                                                </th>

                                                <th scope='row'>
                                                    <?php echo $res_teacher[$i]['contact'] ?>
                                                </th>
                                                <th scope='row'>
                                                   <?php echo $res_teacher[$i]['branch'] ?>
                                                </th>
                                                

                                                <th scope='row'>
                                                     <a href="?studentbranch=<?php echo $result[$i]['branch'];?>&user_id=<?php echo $result[$i]['user_id'];  ?>"class="edit fa fa-pencil btn btn-primary"  data-toggle='modal' id="editTeachers"></a>
                                                </th>
                                                <th scope='row'>
                                                   <a  href="deleteusers.php?teacherbranch=<?php echo $res_teacher[$i]['branch'];?>&user_id=<?php echo $res_teacher[$i]['user_id'];  ?>" class="fa fa-trash btn btn-danger" ></a>
                                                </th>
                                        </tr>
                                             <div class="modal fade" id="TeacherEdit" role="dialog">
    <div class="modal-dialog">
    
   <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Edit Teachers</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" action="update.php" method="post">
           <div class="form-group">
         <input type="hidden" id="edit_teacher_id" name="user_id" class="form-control"  value="<?php echo $res_teacher[$i]['user_id'];?>"> </div>

            <div class="form-group">
              <label for="name"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input name="name" type="text" class="form-control" id="Teacher_name" placeholder="User_Name" value="<?php echo $res_teacher[$i]['name'];?>">
            </div>
              <div class="form-group">
              <label for="email"><span class="glyphicon glyphicon-user"></span> Email</label>
              <input name="email" type="text" class="form-control" id="Teacher_email" placeholder="Email" value="<?php echo $res_teacher[$i]['email'];?>">
            </div>
              <div class="form-group">
              <label for="contact"><span class="glyphicon glyphicon-user"></span> Contact</label>
              <input name="contact" type="text" class="form-control" id="Teacher_contact" placeholder="Contact" value="<?php echo $res_teacher[$i]['contact'];?>">
            </div>
            <div class="form-group">
              <label for="branch"><span class="glyphicon glyphicon-user"></span> Branch</label>
              <input name="branch" type="text" class="form-control" id="Teacher_branch" placeholder="branch" value="<?php echo $res_teacher[$i]['branch'];?>">
            </div>
            
            
            
              <button type="submit" name="teachersubmit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Save Changes</button>
          </form>
        </div>
        
      </div>
      
      </div>
        </div>
                     
                                                
                                            <?php } ?>


                                    </tbody>
                                </table>

                            </div>
            <?php } ?> 
            
            
            
<!--            labassigned-->
       <?php
        
       
                $lab_assistant=new Student($conn);
               
                  $res_lab_assistant=$lab_assistant->labsOfDepartment($labdept);
                $res_lab_assistant_count=count($res_lab_assistant);
          
                
                
        
        ?>
        <?php
        if($labdept!=null)
        {
   ?>
       <div id="data-table "  >
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Name</th>

                                            <th scope="col">Email</th>
                                            <th scope="col">Contact</th>
                                            <th scope="col">Branch</th>
                                             <th scope="col">Lab Assigned</th>

                                            
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                for($i = 0; $i < $res_lab_assistant_count; $i = $i+1)
                                 {
                          ?>
                                            <tr>
                                                <th scope='row'>
                                                    <?php echo $res_lab_assistant[$i]['name'] ?>
                                                </th>
                                                <th scope='row'>
                                                    <?php echo $res_lab_assistant[$i]['email'] ?>
                                                </th>

                                                <th scope='row'>
                                                    <?php echo $res_lab_assistant[$i]['contact'] ?>
                                                </th>
                                                <th scope='row'>
                                                    <?php echo $res_lab_assistant[$i]['branch'] ?>
                                                </th>
                                                 <th scope='row'>
                                                    <?php echo $res_lab_assistant[$i]['lab_assigned'] ?>
                                                </th>

                                               
                                                <th scope='row'>
                                                   <a href="?studentbranch=<?php echo $result[$i]['branch'];?>&user_id=<?php echo $result[$i]['user_id'];  ?>"class="edit fa fa-pencil btn btn-primary"  data-toggle='modal' id="editLabs"></a>
                                                </th>
                                                <th scope='row'>
                                                  <a  href="deleteusers.php?labbranch=<?php echo $res_lab_assistant[$i]['branch'];?>&user_id=<?php echo $res_lab_assistant[$i]['user_id'];  ?>" class="fa fa-trash btn btn-danger" ></a>

                                            </tr>
                                             <div class="modal fade" id="LabEdit" role="dialog">
    <div class="modal-dialog">
    
   <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Edit Lab Assistants</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" action="update.php" method="post">
           <div class="form-group">
         <input type="hidden" id="edit_teacher_id" name="user_id" class="form-control"  value="<?php echo $res_lab_assistant[$i]['user_id'];?>"> </div>

            <div class="form-group">
              <label for="name"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input name="name" type="text" class="form-control" id="Lab_name" placeholder="User_Name" value="<?php echo $res_lab_assistant[$i]['name'];?>">
            </div>
              <div class="form-group">
              <label for="email"><span class="glyphicon glyphicon-user"></span> Email</label>
              <input name="email" type="text" class="form-control" id="Lab_email" placeholder="Email" value="<?php echo $res_lab_assistant[$i]['email'];?>">
            </div>
              <div class="form-group">
              <label for="contact"><span class="glyphicon glyphicon-user"></span> Contact</label>
              <input name="contact" type="text" class="form-control" id="Lab_contact" placeholder="Contact" value="<?php echo $res_lab_assistant[$i]['contact'];?>">
            </div>
            <div class="form-group">
              <label for="branch"><span class="glyphicon glyphicon-user"></span> Branch</label>
              <input name="branch" type="text" class="form-control" id="Lab_branch" placeholder="branch" value="<?php echo $res_lab_assistant[$i]['branch'];?>">
            </div>
            <div class="form-group">
              <label for="branch"><span class="glyphicon glyphicon-user"></span>Lab Assigned</label>
              <input name="labassigned" type="text" class="form-control" id="Lab_assigned" placeholder="Lab Assigned" value="<?php echo $res_lab_assistant[$i]['lab_assigned'];?>">
            </div>
            
            
            
              <button type="submit" name="labsubmit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Save Changes</button>
          </form>
        </div>
        
      </div>
      
      </div>
        </div>
                     
                                            <?php } ?>


                                    </tbody>
                                </table>

                            </div>
            <?php } ?> 
        <!-- /.content -->
        

        <div class="clearfix " style="height: 360px;"></div>
        <!-- Footer -->
        <?php
//            Helper::sectionYield('footer');
        
        include_once('includes/layouts/footer.php');
        
        ?>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

  <!-- Scripts -->
     <!-- bootstrap core javascript -->
     <script src="assets/jquery/jquery.min.js"></script>
     <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
     <script src="assets/jquery-easing/jquery.easing.min.js"></script>
    <!-- page level plugin javascript -->
    <script src="assets/datatables/jquery.dataTables.js"></script>
    <script src="assets/datatables/dataTables.bootstrap4.js"></script>

    <!-- demo scripts for this page -->
    <script src="assets/js/demo/datatables-demo.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="assets/js/init/fullcalendar-init.js"></script>
    <script>
        
    </script>
    <script>
$(document).ready(function(){
  $("#editStudents").click(function(){
//     $("#editModal").load("fetchusers.php#myModal") ;  
    $("#StudentEdit").modal();
  });
});
</script>
<script>
$(document).ready(function(){
  $("#editTeachers").click(function(){
//     $("#editModal").load("fetchusers.php#myModal") ;  
    $("#TeacherEdit").modal();
  });
});
</script>
<script>
$(document).ready(function(){
  $("#editLabs").click(function(){
//     $("#editModal").load("fetchusers.php#myModal") ;  
    $("#LabEdit").modal();
  });
});
</script>
<!--
    <script>
$(document).ready(function(){
  
  $("#editStudents").click(function(){
        window.alert("hi");
    $("#editModal").show();
  });
});
</script>
-->
    <!--Local Stuff-->
    <script>
        jQuery(document).ready(function($) {
            "use strict";

            // Pie chart flotPie1
            var piedata = [
                { label: "Desktop visits", data: [[1,32]], color: '#5c6bc0'},
                { label: "Tab visits", data: [[1,33]], color: '#ef5350'},
                { label: "Mobile visits", data: [[1,35]], color: '#66bb6a'}
            ];

            $.plot('#flotPie1', piedata, {
                series: {
                    pie: {
                        show: true,
                        radius: 1,
                        innerRadius: 0.65,
                        label: {
                            show: true,
                            radius: 2/3,
                            threshold: 1
                        },
                        stroke: {
                            width: 0
                        }
                    }
                },
                grid: {
                    hoverable: true,
                    clickable: true
                }
            });
            // Pie chart flotPie1  End
            // cellPaiChart
            var cellPaiChart = [
                { label: "Direct Sell", data: [[1,65]], color: '#5b83de'},
                { label: "Channel Sell", data: [[1,35]], color: '#00bfa5'}
            ];
            $.plot('#cellPaiChart', cellPaiChart, {
                series: {
                    pie: {
                        show: true,
                        stroke: {
                            width: 0
                        }
                    }
                },
                legend: {
                    show: false
                },grid: {
                    hoverable: true,
                    clickable: true
                }

            });
            // cellPaiChart End
            // Line Chart  #flotLine5
            var newCust = [[0, 3], [1, 5], [2,4], [3, 7], [4, 9], [5, 3], [6, 6], [7, 4], [8, 10]];

            var plot = $.plot($('#flotLine5'),[{
                data: newCust,
                label: 'New Data Flow',
                color: '#fff'
            }],
            {
                series: {
                    lines: {
                        show: true,
                        lineColor: '#fff',
                        lineWidth: 2
                    },
                    points: {
                        show: true,
                        fill: true,
                        fillColor: "#ffffff",
                        symbol: "circle",
                        radius: 3
                    },
                    shadowSize: 0
                },
                points: {
                    show: true,
                },
                legend: {
                    show: false
                },
                grid: {
                    show: false
                }
            });
            // Line Chart  #flotLine5 End
            // Traffic Chart using chartist
            if ($('#traffic-chart').length) {
                var chart = new Chartist.Line('#traffic-chart', {
                  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                  series: [
                  [0, 18000, 35000,  25000,  22000,  0],
                  [0, 33000, 15000,  20000,  15000,  300],
                  [0, 15000, 28000,  15000,  30000,  5000]
                  ]
              }, {
                  low: 0,
                  showArea: true,
                  showLine: false,
                  showPoint: false,
                  fullWidth: true,
                  axisX: {
                    showGrid: true
                }
            });

                chart.on('draw', function(data) {
                    if(data.type === 'line' || data.type === 'area') {
                        data.element.animate({
                            d: {
                                begin: 2000 * data.index,
                                dur: 2000,
                                from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                                to: data.path.clone().stringify(),
                                easing: Chartist.Svg.Easing.easeOutQuint
                            }
                        });
                    }
                });
            }
            // Traffic Chart using chartist End
            //Traffic chart chart-js
            if ($('#TrafficChart').length) {
                var ctx = document.getElementById( "TrafficChart" );
                ctx.height = 150;
                var myChart = new Chart( ctx, {
                    type: 'line',
                    data: {
                        labels: [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul" ],
                        datasets: [
                        {
                            label: "Visit",
                            borderColor: "rgba(4, 73, 203,.09)",
                            borderWidth: "1",
                            backgroundColor: "rgba(4, 73, 203,.5)",
                            data: [ 0, 2900, 5000, 3300, 6000, 3250, 0 ]
                        },
                        {
                            label: "Bounce",
                            borderColor: "rgba(245, 23, 66, 0.9)",
                            borderWidth: "1",
                            backgroundColor: "rgba(245, 23, 66,.5)",
                            pointHighlightStroke: "rgba(245, 23, 66,.5)",
                            data: [ 0, 4200, 4500, 1600, 4200, 1500, 4000 ]
                        },
                        {
                            label: "Targeted",
                            borderColor: "rgba(40, 169, 46, 0.9)",
                            borderWidth: "1",
                            backgroundColor: "rgba(40, 169, 46, .5)",
                            pointHighlightStroke: "rgba(40, 169, 46,.5)",
                            data: [1000, 5200, 3600, 2600, 4200, 5300, 0 ]
                        }
                        ]
                    },
                    options: {
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            intersect: false
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        }

                    }
                } );
            }
            //Traffic chart chart-js  End
            // Bar Chart #flotBarChart
            $.plot("#flotBarChart", [{
                data: [[0, 18], [2, 8], [4, 5], [6, 13],[8,5], [10,7],[12,4], [14,6],[16,15], [18, 9],[20,17], [22,7],[24,4], [26,9],[28,11]],
                bars: {
                    show: true,
                    lineWidth: 0,
                    fillColor: '#ffffff8a'
                }
            }], {
                grid: {
                    show: false
                }
            });
            // Bar Chart #flotBarChart End
        });
    </script>
   
    
        
    
   
</body>
</html>
