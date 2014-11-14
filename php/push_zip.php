<?php
$fileid = $_POST["username"];
$myfile = $_POST["filename"];
$mypath = $_POST["foldername"];

$folder = $mypath."/".$fileid."/";
$upload = $folder . basename($_FILES['file1']['name']);

if(!move_uploaded_file($_FILES['file1']['tmp_name'], $upload))
{
	echo "move_uploaded_file error!";
	exit;
}

//設定上傳之壓縮檔案權限
if(!chmod($upload, 0777))
{
	echo "chmod error!";
}

include("lib/pclzip.lib.php");
//解壓縮檔案並設定權限
$archive = new PclZip($upload);

if($archive->extract(PCLZIP_OPT_PATH, $folder, PCLZIP_OPT_SET_CHMOD, 0777) == 0)
{
	echo "PclZip extract error!";
	exit;
}

//設定解壓縮後資料夾權限
$path = pathinfo($upload);
$filename = $path['filename'];
$filename = $folder . $filename . "/";
if(!chmod($filename, 0777))
{
	echo "chmod error!";
	exit;
}

unlink($upload);
rename($filename, $folder.$myfile."/"); 

?>