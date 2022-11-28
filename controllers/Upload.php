<?php
class Upload
{
    // upload only image from explorer
    public static function uploadImage()
    // {
    // }
    {
        // open file explorer
        if (isset($_FILES['image'])) {
            // get file name
            $fileName = $_FILES['image']['name'];
            // get file size
            $fileSize = $_FILES['image']['size'];
            // get file type
            $fileType = $_FILES['image']['type'];
            // get file temp
            $fileTemp = $_FILES['image']['tmp_name'];
            // get file error
            $fileError = $_FILES['image']['error'];
            // get file extension
            $fileExt = explode('.', $fileName);
            // get file extension in lowercase
            $fileActualExt = strtolower(end($fileExt));
            // allowed file extension
            $allowed = array('jpg', 'jpeg', 'png');
            // check if file extension is allowed
            if (in_array($fileActualExt, $allowed)) {
                // check if file error is 0
                if ($fileError === 0) {
                    // check if file size is less than 5mb
                    if ($fileSize < 5000000) {
                        // create new file name
                        $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                        // set file destination
                        $fileDestination = '../assets/images/' . $fileNameNew;
                        // move file to destination
                        move_uploaded_file($fileTemp, $fileDestination);
                        // return file name
                        return $fileNameNew;
                    } else {
                        // return error message
                        return "Your file is too big!";
                    }
                } else {
                    // return error message
                    return "There was an error uploading your file!";
                }
            } else {
                // return error message
                return "You cannot upload files of this type!";
            }
        }
    }
}
