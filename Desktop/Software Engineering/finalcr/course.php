<?php
    include_once("adb.php");
    
    class course extends adb {
        
        function course(){}
        
        function getCourses() {
            $query = "SELECT course_id, course_title, academic_year, semester FROM courses";
            if (!$this->query($query)) {
                return false;
            }
            return true;
        }
        
        function addCourse($cid, $ctitle, $cobj, $cdesc, $acyr, $semester) {
            $query = "INSERT INTO courses SET course_id='$cid', course_title='$ctitle', course_objectives='$cobj', course_description='$cdesc', semester='$semester', academic_year='$acyr'";
            if (!$this->query($query)) {
                return false;
            }return true;
        }
    }
if (isset($_REQUEST['cmd'])) {
    $obj = new course();
    $cid = ($_REQUEST['cc']);
    $ctitle = ($_REQUEST['ct']);
    $cobj = ($_REQUEST['co']);
    $cdesc = ($_REQUEST['cd']);
    $acyr = ($_REQUEST['ay1'])."/".($_REQUEST['ay2']);
    $semester = ($_REQUEST['sem']);
    
    if (!$obj->addCourse($cid, $ctitle, $cobj, $cdesc, $acyr, $semester)){
        echo "Error".mysql_error();
    } else {
        header("location: index.php");
    }
}
?>