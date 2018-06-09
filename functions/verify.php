<?php

function test_video($url) {
$var = trim(shell_exec("wget --tries=2 --connect-timeout=60 --read-timeout=60 --dns-timeout=60 --timeout=60 -S --spider $url  2>&1 | grep 'HTTP/1.1 200 OK';"));

if(!empty($var)) { 
return 1;
} else {
return 0;
}


}