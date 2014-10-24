<?php
namespace Video\CommonBundle\Tools;
use Symfony\component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
class FileUpload
{
	/**
        * @Assert\File(maxSize="500M",
        *     mimeTypes ="video/mp4",
        *     mimeTypesMessage = "Please upload a valid mp4"
        *                              )
        */
       private $file;
	/**
     	 * Sets file.
     	 *
     	 * @param UploadedFile $file
     	 */
    	public function setFile(UploadedFile $file = null)
   	{
        		$this->file = $file;
    	}

    	/**
     	 * Get file.
     	 *
     	 * @return UploadedFile
      	 */
   	public function getFile()
    	{ 
        		return $this->file;
    	}
      public function getFileName(){
                      return $this->getFile()->getClientOriginalName();
      }
      public function getFileSize(){
                      $file_size;
                      $size=$this->getFile()->getSize();
                      if($size>=1000000){
                        $size=round($size/1000000,2);
                        $file_size=$size."MB";
                      }
                      else if($size>=1000){
                        $size=round($size/1000,2);
                        $file_size=$size."KB";
                      }
                      else
                      {
                        $file_size=$size."B";
                      }
                      return $file_size;
      }
      public function getFileType(){
                      return $this->getFile()->getMimeType();
      }
      public function getUploadPath(){
                  $uplod_path="bundles/videoweb/video/";
                  return $uplod_path;
      }
      public function uploadFile($index){
        $upload_name= $this->getFileName();
        if($index!=0)$upload_name=$upload_name."(".$index.")";
        try {
                $this->getFile()->move(
                          $this->getUploadPath(),
                          $upload_name
                    );
        } catch (Exception $e) {
          print $e->getMessge();
          exit();
        }
      }
      public function getUploadUrl($index){
        $upload_url= $this->getUploadPath().$this->getFileName();
        if($index!=0)$upload_url=$upload_url."(".$index.")";
        return $upload_url;
      }
}
 ?>