<?php
    session_start();

    if ($_SESSION['state'] !== true) {
        echo "No acces allowed.";
        return;
    }
    $file_types = file_get_contents("file_types.json");
    $file_types = json_decode($file_types, true);
    //echo json_encode($file_types);
        function scan_dir($dir, $icon_lib) {
            $temp = [];
            $dir = scandir($dir);
            
            for ($i = 0; $i < sizeof($dir); $i++) {
                
                $e = $dir[$i];
                if ($e == "." || $e == "..");
                else {
                    $type = explode(".", $e);
                    //  return $icon_lib[$type[1]];
                    $icon_lib[$type[1]]['filename'] = $e;
                    array_push($temp, $icon_lib[$type[1]]);
                }
                //echo $dir[$i];
            }
            return $temp;
        }
        $dir_results = json_encode(scan_dir('../../files', $file_types));

        // Handle directory results here:

?>