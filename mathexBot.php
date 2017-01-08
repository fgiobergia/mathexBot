<?php

$token = '123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11';
$picsURL = 'https://hostname/images/';

$data = json_decode(file_get_contents('php://input'), true); // used for fetching the json structure

/* prepare reply: a single picture */
$photo = array();
$photo['type'] = 'photo';
$photo['id'] = (string)intval($data['inline_query']['id']);


$picName = $photo['id'];
$garbage = ""; // won't be really needed (output from exec())
$retValue = 0; // return value (if != 0, the script failed)
$query = escapeshellarg($data['inline_query']['query']);

exec("./tex2jpg.sh {$query} {$picName}", $garbage, $retValue);

if ($retValue != 0) {
    $picName = "error";
}
$photo['photo_url'] = "{$picsURL}{$picName}.jpg";
$photo['thumb_url'] = $photo['photo_url']; // use the photo as thumbnail (could be improved)

$reply['inline_query_id'] = $photo['id'];
$reply['results'] = array($photo);


$url = "https://api.telegram.org/bot{$token}/answerInlineQuery?inline_query_id={$photo['id']}&results=".urlencode(json_encode(array($photo)));
file_get_contents($url);
?>

