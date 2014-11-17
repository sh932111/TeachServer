<?php
function insertUniversityData($link) {
	
	// $str = "";
	// $file = "../lib/ulist.xlsx";
	// $objPHPExcel = PHPExcel_IOFactory::load($file);
	// $objPHPExcel->setActiveSheetIndex(0);
	// $sheet = $objPHPExcel->getActiveSheet();
	// $highestRow = $sheet->getHighestRow(); // 取得總行數
	// $highestColumn = $sheet->getHighestColumn(); // 取得總列數
	// for($j = 2;$j <= $highestRow; $j++) {
	// 	for($k = 'A';$k <= $highestColumn; $k++) {
	// 		$str .= $objPHPExcel->getActiveSheet()->getCell("$k$j")->getValue().'\\';
	// 	}
	// 	$strs = explode("\\",$str);
	// 	$sql = "INSERT INTO universityTable(name,phone,fax,address,url) VALUES('$strs[0]','$strs[1]','$strs[2]','$strs[3]','$strs[4]')";
	// 	if(!mysql_query($sql,$link)) {
	// 		return false;
	// 	}
	// 	$str = "";
	// }

}


function registerUser($link,$table_name,$name,$username,$password,$cellphone,$email,$department,$department_id,$create_time,$update_time) {
	$action = sprintf("INSERT INTO `$table_name`(
		`name`,`username`,`password`,`cellphone`,`email`,`department`,`department_id`,`create_time`,`update_time`) 
		VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s')",
		$name,$username,$password,$cellphone,$email,$department,$department_id,$create_time,$update_time);
	return mysql_query($action,$link);
}

function insertTeachCourse($link,$table_name,$course_id,$course_name,$outline,$create_time,$update_time) {
	$action = sprintf("INSERT INTO `$table_name`(
		`course_id`,`course_name`,`outline`,`create_time`,`update_time`) 
		VALUES ('%s','%s','%s','%s','%s')",
		$course_id,$course_name,$outline,$create_time,$update_time);
	return mysql_query($action,$link);
}

function insertAllCourse($link,$table_name,$name,$username,$department,$department_id,$course_id,$course_name,$outline,$create_time,$update_time) {
	$action = sprintf("INSERT INTO `$table_name`(
		`name`,`username`,`department`,`department_id`,
		`course_id`,`course_name`,`outline`,`create_time`,`update_time`) 
		VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s')",
		$name,$username,$department,$department_id,$course_id,$course_name,$outline,$create_time,$update_time);
	return mysql_query($action,$link);
}

function insertClientCourse($link,$table_name,$course_id,$course_name,$outline,$create_time,$t_name,$t_username) {
	$action = sprintf("INSERT INTO `$table_name`(
		`course_id`,`name`,`username`,`course_name`,`outline`,`create_time`) 
		VALUES ('%s','%s','%s','%s','%s','%s')",
		$course_id,$t_name,$t_username,$course_name,$outline,$create_time);
	return mysql_query($action,$link);
}

?>