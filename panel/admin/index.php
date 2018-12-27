<?php
    session_start();

    if ($_SESSION['state'] !== true) {
        echo "No acces allowed.";
        return;
    }
    $file_types = file_get_contents("file_types.json");
    $file_types = json_decode($file_types, true);

        function scan_dir($dir, $icon_lib) {
            $temp = [];
            $dir = scandir($dir);
            
            for ($i = 0; $i < sizeof($dir); $i++) {
                
                $e = $dir[$i];
                if ($e == "." || $e == "..");
                else {
                    $type = explode(".", $e);
                    $icon_lib[$type[1]]['filename'] = $e;
                    array_push($temp, $icon_lib[$type[1]]);
                }
            }
            return $temp;
        }
        $dir_results = scan_dir('../../files', $file_types);

        // Include stylesheet
        echo '<link rel="stylesheet" href="../css/admin.css">';
        for ($i = 0; $i < sizeof($dir_results); $i++) {
            $e = $dir_results[$i];
            $file_type = explode('.', $e['filename'])[1];

            echo "<div class='file'><img src='icons/" . $file_type . ".png'><a href='../../files/" . $e['filename'] . "'target='_blank' class='filename'>" . $e['filename'] . "</a></div></br></br>";
        }
?>