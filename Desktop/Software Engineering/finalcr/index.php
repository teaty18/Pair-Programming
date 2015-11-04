<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>HomePage || Course Repository</title>
        <link href="css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="script/jquery-2.1.3.min.js"></script>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap-theme.css" type="text/css"/>
        <script src="script/bootstrap.js" type="text/javascript"></script>
    </head>
    <body style="font-family: Comic Sans MS">
        <table style="margin-left: auto; margin-right: auto;">
            <tr>
                <td colspan="2" id="pageheader">
                    <h3>COURSE REPOSITORY<span class="fa-stack"><i class="fa fa-square-o fa-stack-2x fa-spin"></i><i class="fa fa-book fa-stack-1x"></i></span></h3>
                </td>
            </tr>
            <tr>
                <td id="mainnav">
                    <div class="menuitem"><i class="fa fa-book">&emsp;</i>Courses<!--&LeftTriangle;--></div>
                    <div class="menuitem"><i class="fa fa-university">&emsp;</i>Departments<!--&LeftTriangle;--></div>
                    <!--
                    <div class="menuitem">menu 3</div>
                    <div class="menuitem">menu 4</div>
                    -->
                </td>
                <td id="content">
                    <div id="divPageMenu">
                        <span class="menuitem" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus">&emsp;</i>Add Course</span>
                        <!--<div class="menuitem" style="display: inline">page menu 2</div>
                        <div class="menuitem" style="display: inline">page menu 3</div>-->
                        &emsp;&emsp13;
                        <br><input type="search" placeholder="Search" id="txtSearch"/>
                        <button id="btnSearch"><i class="fa fa-search"></i><span>&emsp;Search</span></button>
                    </div><br>
                    <div id="divStatus" class="status">
                        <br><!--status message-->
                    </div>
                    <div id="divContent">
                        <br><!--Content space
                        <span class="clickspot">click here </span>-->
                        <table id="tableExample" class="reportTable" width="100%" border="0">
                            <thead class="header">
                                <th>course id</th>
                                <th>course name</th>
                                <th>semester</th>
                                <th>academic year</th>
                                <th>action</th>
                            </thead>
                            <tbody>
                                <?php
                                    include_once ("course.php");
                                    $obj = new course();
                                    if (!$obj->getCourses()) {
                                        echo mysql_errno()." ".mysql_error();
                                        exit();
                                    }
                                    while ($row = $obj->fetch()){
                                        echo "<tr>";
                                        echo "<td>".$row['course_id']."</td>";
                                        echo "<td>".$row['course_title']."</td>";
                                        echo "<td>".$row['semester']."</td>";
                                        echo "<td>".$row['academic_year']."</td>";
                                        echo "<td style='text-align:center'>
                                                <a href='#'><i class='fa fa-info-circle' title='View'></i></a>&emsp;
                                                <a href='#'><i class='fa fa-pencil' title='Edit'></i></a>&emsp;
                                                <a href='#'><i class='fa fa-trash' title='Delete'></i></a>
                                            </td>";
                                        echo "</tr>";   
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add Course</h4>
                    </div>
                    <div class="modal-body">
                        <form action="course.php" id="addCourse" method="get">
                            <table border="0">
                                <tr><td>Course ID</td><td><input type="text" name="cc" placeholder="e.g. CS 323" required></td></tr>
                                <tr><td>Course Title</td><td><input type="text" name="ct" placeholder="e.g Marketing" required></td></tr>
                                <tr><td>Course Description</td><td><textarea name="cd" placeholder=""></textarea></td></tr>
                                <tr><td>Course Objectives</td><td><textarea name="co" placeholder=""></textarea></td></tr>
                                <tr><td>Academic Year</td><td><input type="text" name="ay1" placeholder="" required>/<input type="text" name="ay2" placeholder="" required></td></tr>
                                <tr><td>Semester</td>
                                    <td>
                                        <select name="sem">
                                            <option></option>
                                            <option value="Spring">Spring</option>
                                            <option value="Fall">Fall</option>
                                            <option value="Summer">Summer</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                            <input type="hidden" value="1" name="cmd">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <!--<input type="hidden" value="1">-->
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" name="send" form="addCourse" class="btn btn-primary">
                        <!--
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                        -->
                    </div>
                </div>
            </div>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
