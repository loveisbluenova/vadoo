<?php
	
	/*****************************************************************************************
	*
	*	Secure Image Uploader
	*
	*	Author: Paulo Regina
	*	Version: 1.0 - October 2013
	*	
	*   Modified to be compatible with uploadify
	******************************************************************************************/
	
	class SecureImageUploader
	{
		########################################################################################
		#### Properties
		########################################################################################
		
		// Upload Path
		public $uploadPath;
		
		// Allowed Images MIME
		private $allowed_files = array("application/octet-stream"); // -> uploadify issue
		
		// Errors From $_FILES['error']
		public $upload_errors = array(
			UPLOAD_ERR_OK => 'No Errors',
			UPLOAD_ERR_INI_SIZE => 'Current file is too large for the server',
			UPLOAD_ERR_FORM_SIZE => 'File is larger than 20MB',
			UPLOAD_ERR_PARTIAL => 'Partially Uploaded',
			UPLOAD_ERR_NO_FILE => 'No File Selected',
			UPLOAD_ERR_NO_TMP_DIR => 'No Temporary Directory',
			UPLOAD_ERR_CANT_WRITE => 'Cannot Write To Disk (Check Permission)',
			UPLOAD_ERR_EXTENSION => 'File upload stopped by extension'
		);
		
		// SecureImageUploader Class Internal Return Messages
		private $messages = array(
			'NOT_ALLOWED' => 'File is not allowed to be uploaded',
			'UPLOAD_FAILED' => 'Failed to upload file',
			'BROKEN_IMAGE' => 'Please upload a valid image file',
			'UPLOAD_OK' => 'Successfully uploaded file'
		);
		
		########################################################################################
		#### Methods
		########################################################################################
		
		////////////////////////////////////////////
		// Validate Image
		////////////////////////////////////////////
		private function validate_image($moved_file)
		{
			return getimagesize($moved_file);
		}
		
		///////////////////////////////////////////////////////
		// Check Image Integrity
		///////////////////////////////////////////////////////
		private function check_image_integrity($fileName, $str)
		{
			$lines = file($fileName);
			foreach($lines as $lineNumber => $line) 
			{
				if(strpos($line, $str) !== false) 
				{
					return $line;
				}
			}
			return -1;
		}
		
		/////////////////////////////////////////
		// Upload Image
		/////////////////////////////////////////
		public function upload_image($file_image, $timestamp)
		{
			$tmp_file = $file_image['tmp_name'];
			$target_file = basename($file_image['name']);
			
			$targetDir = $this->uploadPath . $timestamp . $target_file;
			
			// Upload only allowed extension
			if(!in_array($file_image['type'], $this->allowed_files)) 
			{
				return $this->messages['NOT_ALLOWED'];
			} else {
			
			   $moved_file = move_uploaded_file($tmp_file, $targetDir);
			   
			   if($moved_file)
			   {
				   // validate image (not by their extension) and check integrity if not valid remove it
				   $validate_file = $this->validate_image($targetDir);
				   
				   if(is_array($validate_file) && !empty($validate_file))
				   {
						if($this->check_image_integrity($targetDir, '<?php') !== -1)
						{
							unlink($targetDir);
					   		return $this->messages['BROKEN_IMAGE']; 		
						} else {
							return $this->messages['UPLOAD_OK']; 	
						}
				   } else {
					   unlink($targetDir);
					   return $this->messages['NOT_ALLOWED']; 
				   }
				   
			   } else {
					return $this->messages['UPLOAD_FAILED'];	   
			   }			  
			}
		}
			
	}
	
?>