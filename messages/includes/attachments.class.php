<?php

	/*
	* File Attachment
	* Generic file attachment class (this just manipulates strings that points to a real file)
	* Paulo Regina
	* Version 1.0 - August 2014
	* www.pauloreg.com
	*
	* Note: This class was created specific to be used with this system
	*/
	
	class Attachment
	{
		private $image_prefix = 'photoAttachment-';
		private $file_prefix = 'fileAttachment-';
		public $urlPath = '';
		public $filePath = '';
		
		private function attach($prefix, $attachment)
		{
			$search = '['.$prefix;
			
			$rep_1 = str_replace($search, '', $attachment);
			$rep_2 = str_replace(']', '', $rep_1);
			
			return $rep_2;
		}
		
		public function attached_image($attachement)
		{
			$file = $this->attach($this->image_prefix, $attachement);	
			if(file_exists($this->filePath.$file))
			{
				return '<a href="'.$this->urlPath.$file.'" data-lightbox="img-'.time().'"><img class="img-responsive" src="'.$this->urlPath.$file.'" alt="Image" /></a>';	
			} else {
				return '<p class="alert alert-info">This file does not exist anymore</p>';	
			}
		}
		
		public function attached_file($attachement)
		{
			$file = $this->attach($this->file_prefix, $attachement);
			
			$extension = pathinfo($file, PATHINFO_EXTENSION);
			
			if(file_exists($this->filePath.$file))
			{
				switch($extension)
				{
					case "txt":
						$result = '
						<img src="img/file-types/text.png" alt="[text file attachment]" />
						<p style="width: 128px; margin: 0;" align="center"><a href="'.$this->urlPath.$file.'">'.$file.'</a></p>
						';
					break;
					
					case "xls":
					case "xlsx":
						$result = '
						<img src="img/file-types/excel.png" alt="[excel file attachment]" />
						<p style="width: 128px; margin: 0;" align="center"><a href="'.$this->urlPath.$file.'">'.$file.'</a></p>
						';
					break;
					
					case "doc":
					case "docx":
						$result = '
						<img src="img/file-types/word.png" alt="[word file attachment]" />
						<p style="width: 128px; margin: 0;" align="center"><a href="'.$this->urlPath.$file.'">'.$file.'</a></p>
						';
					break;
					
					case "ppt":
					case "pptx":
						$result = '
						<img src="img/file-types/powerpoint.png" alt="[powerpoint file attachment]" />
						<p style="width: 128px; margin: 0;" align="center"><a href="'.$this->urlPath.$file.'">'.$file.'</a></p>
						';
					break;
					
					case "pdf":
						$result = '
						<img src="img/file-types/pdf.png" alt="[pdf file attachment]" />
						<p style="width: 128px; margin: 0;" align="center"><a href="'.$this->urlPath.$file.'">'.$file.'</a></p>
						';
					break;
					
					case "zip":
						$result = '
						<img src="img/file-types/zip.png" alt="[zip file attachment]" />
						<p style="width: 128px; margin: 0;" align="center"><a href="'.$this->urlPath.$file.'">'.$file.'</a></p>
						';
					break;
					
					default:
						$result = '<p class="alert alert-info">This file does not exist anymore</p>';
					break;
				}
			} else {
				$result = '<p class="alert alert-info">This file does not exist anymore</p>';	
			}
			
			return $result;
		}
		
		public function attachments($attachment)
		{
			if(stripos($attachment, $this->image_prefix) !== false)
			{
				return $this->attached_image($attachment);
			} elseif(stripos($attachment, $this->file_prefix)) {
				return $this->attached_file($attachment);	
			}
			
			return $attachment;
		}
			
	}
	
	$attach = new Attachment();
	$attach->urlPath = rtrim($base_url, '/').'/'.'/user-uploads/';
	$attach->filePath = $_SERVER['DOCUMENT_ROOT'].$base_root.'/user-uploads/';
?>