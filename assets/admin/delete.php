<?php
session_start();
error_reporting(0);
include('includes/config.php');


$eid=$_GET['del'];
if (empty($eid) || $eid == '' || $eid == null) {
	header('location:manageemployee.php');
}
else{
	$del = mysqli_query($con, "DELETE FROM employee_tb where EmpID = '$eid'") or die(mysqli_error($con));
	if ($del) {
		$succ_msg = 'RECORD DELETED SUCCESSFULLY';
		
                $_SESSION['suc_msg'] =   '<div class ="alert alert-success"><strong>'.$succ_msg.'</strong></div>';
		header('location:manageemployee.php');
	}
	else{
			$succ_msgx = 'NOT DELETED';
		
		$_SESSION['er_msg'] = '<div class ="alert alert-danger"><strong>'.$succ_msgx.'</strong></div>';

		header('location:manageemployee.php');
	}

}

?>