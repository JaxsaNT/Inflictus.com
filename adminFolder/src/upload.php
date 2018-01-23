<?php
namespace Normann;
class upload {
    private $target_dir;
    private $file2upload;
    private $id;
    private $error = array();
    
    function getTarget_dir() {
        return $this->target_dir;
    }

    function getFile2upload() {
        return $this->file2upload;
    }

    function getId() {
        return $this->id;
    }

    function setTarget_dir($target_dir) {
        $this->target_dir = $target_dir;
    }

    function setFile2upload($file2upload) {
        $this->file2upload = $file2upload;
    }

    function setId($id) {
        $this->id = $id;
    }
        
    public function upload() {
        $this->file2upload['name'] = pathinfo($this->file2upload['name'])['filename'] . $this->id . "." . pathinfo($this->file2upload['name'])['extension'];
        $target_file = $this->target_dir . basename($this->file2upload["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        $check = getimagesize($this->file2upload["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $this->error[] = "File is not an image.";
            $uploadOk = 0;
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $this->error[] = "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($this->file2upload["size"] > 500000) {
            $this->error[] = "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            $this->error[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $this->error[] = "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            $newName = $file_name . "2";
            if (move_uploaded_file($this->file2upload["tmp_name"], $target_file)) {
                return basename($this->file2upload["name"]);
            } else {
                $this->error[] = "Sorry, there was an error uploading your file.";
            }
        }
    }
            
    public function error(){
        if(!empty($this->error)){
            return $this->error;
        }
    }
}
