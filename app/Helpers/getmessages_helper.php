<?php
function getmessages($loggedid)
{
    $db = db_connect();
    $sql = "SELECT * FROM hw_messages WHERE to_user = ?";
    $query = $db->query($sql,  $loggedid);
    $messages = [];
    

    if ($query) {
        $while = $query->getResult();


        foreach ($while as $key => $result) {
            $messageid = $result->id;
            $loggedid =  $loggedid;

            $sql = "SELECT * FROM hw_readed_messages WHERE user = ? AND msg = ?";
            $query = $db->query($sql, [$loggedid, $messageid]);
            if (count($query->getResult()));
            array_push($messages, $result);
        }
    }

    $sql = "SELECT * FROM hw_messages WHERE reply_to_user = ?";
    $query = $db->query($sql,  $loggedid);

    if ($query) {
        $while = $query->getResult();


        foreach ($while as $key => $result) {
            $messageid = $result->id;
            $loggedid =  $loggedid;

            $to_user = $result->to_user;
            if ($to_user != $loggedid) {
                $sql = "SELECT * FROM hw_readed_messages WHERE user = ? AND msg = ?";
                $query = $db->query($sql, [$loggedid, $messageid]);
                if (count($query->getResult()));
                
                array_push($messages, $result);
            }
        }
    }
    usort($messages, function($a, $b) { //Sort the array using a user defined function
        return $a->created_at > $b->created_at ? -1 : 1; //Compare the scores
    });  
    return $messages;
}
