<?php
namespace Video\CommonBundle\Tools;
use Symfony\component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
class FileUpload
{

       protected $file;
       protected $base_upload_path;
       protected $upload_path;

       public function __construct($base_upload_path){
                    $this->base_upload_path=$base_upload_path;
                    $this->upload_path=$this->base_upload_path;
       }
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
      public function setUploadPath($path=""){
                 $this->upload_path=$this->base_upload_path.$path;
      }
      public function getUploadPath(){
                  return $this->upload_path;
      }
      public function uploadFile($index=0){
        $file_name= explode('.', $this->getFileName());
        if($index!=0)$upload_name=$file_name[0]."(".$index.").".$file_name[1];
        else $upload_name=$this->getFileName();
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
      public function getUploadUrl($index=0){
        $file_name= explode('.', $this->getFileName());
        if($index!=0)$upload_url=$this->getUploadPath().$file_name[0]."(".$index.").".$file_name[1];
        else $upload_url=$this->getUploadPath().$this->getFileName();
        return $upload_url;
      }
}
 ?>