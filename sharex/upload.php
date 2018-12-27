<?php

# I use a mac myself so i can't test out this script
# Credits for the script:
# https://github.com/Inteliboi/ShareX-Custom-Upload/blob/master/upload.php

$tokens = array("token"); # You can add more since it's an array

function RandomString($length) {
    $keys = array_merge(range(0,9), range('a', 'z'));
 
    for($i=0; $i < $length; $i++) {
        $key .= $keys[mt_rand(0, count($keys) - 1)];
    }
    return $key;
}
 
if(isset($_POST['secret'])) {
    if(in_array($_POST['secret'], $tokens)) {
        $filename = RandomString(3);
        $target_file = $_FILES["sharex"]["name"];
        $fileType = pathinfo($target_file, PATHINFO_EXTENSION);

        if (move_uploaded_file($_FILES["sharex"]["tmp_name"], "files/".$filename.'.'.$fileType)) {
            $json->status = "OK";
            $json->errormsg = "";
            $json->url = $filename . '.' . $fileType;
        }
            else echo 'File upload failed - CHMOD/Folder doesn\'t exist?';
    }
    else echo 'Invalid Secret Key';
}
else echo "No post data recieved";
//Sends json
echo(json_encode($json));
?>