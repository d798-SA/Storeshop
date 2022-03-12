<?php
class Upload
{
    protected $uploadDir;
    protected $defaultUploadDir = 'uploads';
    public $file;
    public $fileName;
    public $filePath;
    protected $rootDir;
    protected $errors = [];

    protected function validate()
    {
        if (!$this->isMimeAllowed()) {
            array_push(
                $this->errors,
                'الصور المسموح بها هي 
            jpg , png , gif'
            );
        } elseif (!$this->isSizeAllowed()) {
            array_push($this->errors, 'نأسف الصوره أكبر من 10 ميقا');
        };

        return $this->errors;
    }

    protected function createUploadDir()
    {
        if (!is_dir($this->uploadDir)) {
            umask(0);

            if (!mkdir($this->uploadDir, 0777, true)) {
                die('Failed to create directories...');
            }
        }

        return true;
    }


    public function upload()
    {

        $this->fileName = time() . $this->file['name'];
        $this->filePath .= '/' . $this->fileName;

        if ($this->validate()) {
            return $this->errors;
        } elseif (!$this->createUploadDir()) {
            return $this->errors;
        } elseif (!move_uploaded_file($this->file['tmp_name'], $this->uploadDir . '/' . $this->fileName)) {
            array_push($this->errors, 'Error uploading your file');
        }

        return $this->errors;
    }




    public function __construct($uploadDir, $rootDir = false)
    {
        if ($rootDir) {
            $this->rootDir = $rootDir;
        } else {
            $this->rootDir = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'phpFinllyProect';
        }
        $this->filePath = $uploadDir;
        $this->uploadDir = $this->rootDir . '/' . $uploadDir;
    }







    protected function isMimeAllowed()
    {
        $allowed = [
            "jpg" => "image/jpeg",
            "png" => "image/png",
            "gif" => "image/gif",

        ];
     //   print_r($this->file['tmp_name']);
        $fileType = mime_content_type($this->file['tmp_name']);

        if (!in_array($fileType, $allowed)) {
            return false;
        };

        return true;
    }


    protected function isSizeAllowed()
    {
        $maxFileSize = 10 * 1024 * 1024;

        $fileSize = $this->file['size'];

        if ($fileSize > $maxFileSize) {
            return false;
        }

        return true;
    }
}

// filter String 

class Filter
{
    public $str;
    public $email;

    public function filteremail($email)
    {
        $email = filter_var(trim($email), FILTER_SANITIZE_EMAIL);

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            if (empty($email)) {
                return false;
            };

            return $email;
        } else {
            return false;
        }
    }

    public function filterstring($str)
    {
        $str = filter_var(trim($str), FILTER_SANITIZE_STRING);

        if (empty($str)) {
            return false;
        } else {
            return $str;
        };
    }
}

//    public function __construct($str){
//         $str = filter_var(trim($str) , FILTER_SANITIZE_STRING);

//         return $this->str = $str;
//     }
// };