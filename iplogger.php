<?php
$date = (new DateTime())->setTimeZone(new DateTimeZone('Europe/Malta'))->format('Y-m-d H:i:s');

function getBrowser() {

    global $user_agent;

    $browser        =  "Unknown Browser";

    $browser_array  =  array(
                            '/msie/i'      =>  'Internet Explorer',
                            '/firefox/i'    =>  'Firefox',
 '/Mozilla/i' => 'Mozila',
 '/Mozilla/5.0/i'=> 'Mozila',
                            '/safari/i'    =>  'Safari',
                            '/chrome/i'    =>  'Chrome',
                            '/edge/i'      =>  'Edge',
                            '/opera/i'      =>  'Opera',
 '/OPR/i'        =>  'Opera',
                            '/netscape/i'  =>  'Netscape',
                            '/maxthon/i'    =>  'Maxthon',
                            '/konqueror/i'  =>  'Konqueror',
 '/Bot/i' => 'BOT Browser',
 '/Valve Steam GameOverlay/i'  =>  'Steam',
                            '/mobile/i'    =>  'Handheld Browser'
                        );

    foreach ($browser_array as $regex => $value) { 

        if (preg_match($regex, $user_agent)) {
            $browser    =  $value;
        }

    }

    return $browser;

}
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
$country = $details->country;
$user_browser  =  getBrowser();

$ip='TimeStemp: ' . $date . ' - ' . 'User Browser: ' . $user_browser . ' - ' . 'User Country: ' . $country . ' - ' . 'IP: ' . $_SERVER['REMOTE_ADDR']."\n";


$myFile = "IP Logs.txt";
