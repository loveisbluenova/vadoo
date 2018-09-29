<?php
/*
	Uploadify
	Copyright (c) 2012 Reactive Apps, Ronnie Garcia
	Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
	
	Re-write by Paulo Regina
	Version 1.0
	www.pauloreg.com
	
*/

include('../connection.php');

include('secureImageUploader.class.php');

$uploader = new SecureImageUploader();

// Define a destination
$targetFolder = $base_root.'/user-uploads/'; // Relative to the root
$uploader->uploadPath = $_SERVER['DOCUMENT_ROOT'].$targetFolder;

$timestamp = $_POST['timestamp'];

$verifyToken = md5('S4lt' . $timestamp);

if (!empty($_FILES) && $_POST['token'] == $verifyToken) 
{
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
	$targetFile = rtrim($targetPath,'/') . '/' . $timestamp . $_FILES['Filedata']['name'];

	// Validate the file type
	$fileTypes = array('zip','pdf','doc','ppt','xls','txt','docx','xlsx','pptx'); // File extensions excluding images
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	
	// Image File Types					
	if($_POST['upType'] == 'images')
	{
		$response = $uploader->upload_image($_FILES['Filedata'], $timestamp);
		if($response == 'No Errors')
		{
			echo '1';
		} else {
			echo $response;	
		}	
	} 
	
	// Files File Types
	if($_POST['upType'] == 'files') 
	{
		// Files File Types
		if (in_array($fileParts['extension'], $fileTypes)) 
		{
			move_uploaded_file($tempFile, $targetFile);
			echo '1';
		} else {
			echo 'Invalid file type.';
		}	
	}
	
}
?>