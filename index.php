<?php  
    require_once('inc/common.inc.php');

    


    const SERVER = "imap.mail.ru";
    const USERNAME = "supermega1@mail.ru";
    const PASSWORD = "1234567";

    $client = getClient(SERVER, USERNAME, PASSWORD);
    createEventInCalendar($client);
 
    

    echo "hello";
