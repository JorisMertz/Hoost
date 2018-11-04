<?php
$path = "img/";
$domain = "https://thiqq.life/";
$panel = "panel.php";

$str = $_SERVER['QUERY_STRING'];
$agent = $_SERVER['HTTP_USER_AGENT'];

function randomINT() {
    return str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT);
}
function randomRGB(){
    return randomINT() . randomINT() . randomINT();
}

function endsWith($t, $s) {
    $length = strlen($s);
    if ($length == 0) {return true;}
    return (substr($t, -$length) === $s);
}

if (!empty($_GET)) {
if (strpos($agent, 'Discordbot') !== false || strpos($agent, 'Twitterbot') !== false) {
echo '<head><title>' . $str. '</title><meta content="summary_large_image" name="twitter:card"><meta content="' . $str . '" property="og:title"><meta content="#' . randomRGB() . '"name="theme-color"><meta content="' . $domain . $path . $str. '"name="twitter:image:src"></head>';
}
else {
    if (endsWith($str, "png")) {header("Content-type: image/png");}
    if (endsWith($str, "gif")) {header("Content-type: image/gif");}
    if (endsWith($str, "mp4")) {header("Content-type: video/mp4");}
    echo readfile($path.$str);
} return;
} else {
    if (file_exists($panel)) {
    header('Location: ' . $panel);
    } else {
    echo "Unable to attach to panel";
    return;
    }
}
?>
