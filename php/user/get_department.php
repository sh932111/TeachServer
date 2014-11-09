<?php
$department = array("資工系","資管系","電通系","兒家系");
$department_id = array("ID1","ID2","ID3","ID4");
$list["department"] = $department;
$list["department_id"] = $department_id;

$data["data"] = $list;
echo json_encode($data);
exit();

?>