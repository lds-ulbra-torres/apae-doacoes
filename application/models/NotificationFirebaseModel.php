<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class NotificationFirebaseModel extends CI_Model {
    
    public $message;
    public $topic;
    public $notificationPush;
    public $servidor = 'https://fcm.googleapis.com/fcm/send';
    public $google_api_key = 'AIzaSyDuhxm7OVNJlcWeeu5J46Z1hYio7woV7V4';
    public $headers;
    
    public function sendNotification(){
    
        $this->headers = array(
            'Authorization: key=' . $this->google_api_key,
            'Content-Type: application/json'
        );

        $notificationPush = array(
            "to" => "/topics/".$this->topic,
            "priority" => "high",
            "notification" => $this->message,
            "data" => $this->message
        );
        return $this->openConnection($notificationPush);
    }

    private function openConnection( $notificationPush ){     
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->servidor);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($notificationPush));
        $result = curl_exec($ch);
        curl_close($ch);
        $id = json_decode($result, true);
        if ($result === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
}