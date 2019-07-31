<?php

    use garethp\ews\API;
    use garethp\ews\API\Enumeration;

    function getClient($server, $username, $password)
    {
        return API::withUsernameAndPassword($server, $username, $password);
    }

    function createEventInCalendar($api)
    {
        //Get the folder to save the event to
        $folder = $api->getFolderByDistinguishedId('calendar');
        //Create our event
        $item = array('CalendarItem'=>array(
            'Start' => (new \DateTime('8:00 AM'))->format('c'),
            'Subject' => 'The Event Subject'
        ));
        //Set our options
        $options = array(
            'SendMeetingInvitations' => Enumeration\CalendarItemCreateOrDeleteOperationType::SEND_TO_NONE,
            'SavedItemFolderId' => array(
                'FolderId' => array('Id' => $folder->getFolderId()->getId())
            )
        );
        //Send the request
        $items = $api->createItems($item, $options);
    }