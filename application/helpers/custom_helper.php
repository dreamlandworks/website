<?php

defined('BASEPATH') OR ('No direct script access allowed');

// define('FIREBASEKEY','AIzaSyCKEfuVM38j-mj7ZPijX5RAw1oFJj-b9LA'); //AIzaSyD9txqR2an5VyaW8_okh-IIbt9bfmpI0v0



    //send notification by user side  to nurse,doctor,ambulence

   	function send_notification($data=array(),$fcm_id){  

        if(!isset($fcm_id))

        {

            $data['fcm_id']='xxsx';

        }

       

        $fields=array(
            "to"  => $fcm_id,
           // "to"  => "cfTfpc51xx8:APA91bETqYPuOHIgGxJw85cr6ROosAr-a0He42yE6KbX9qE80KkOxy9cEzvPXZ6HnCpbwXsKnink5e249rpfNPU5oNsIO4qkcfMpvo0un1RtIu_aMHnmcNJ9w7KnXTENKkN2udV-9m82",
            "data"=> $data
        );
        $url = 'https://fcm.googleapis.com/fcm/send';
        $headers = array(
			'Content-Type:application/json',
			'Authorization: key='.'AAAAnBzxeco:APA91bF5izo3fu3zy4_ebuQbZdPbymo36HHH-TwyCk5W-XJ-KmYpIBXez-2alzVYo6w_3tiulroCZr7IiKso1vSl1sQRst5WEjIc5CidgbKaUN_TjZMrQRg-e1_CxKnlojqtoaKrD0oY',
			'Content-Type: application/json'
        );

        // Open connection

        $ch = curl_init();

        // Set the url, number of POST vars, POST data

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Disabling SSL Certificate support temporarly

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        // Execute post

        $result = curl_exec($ch);

        //print_r($result);die;

        if ($result === FALSE) {

            die('Curl failed: ' . curl_error($ch));

        }

        // Close connection

        curl_close($ch);

        return $result;

    }



    function send_notification_on_tripD($data=array()){

        $body='This body of notification';

        $type='This body of notification';

        $title='Title of notification';

        $icon='myIcon';/*Default Icon*/

        $sound='mySound';/*Default sound*/

        $fcm_id='';

        $extra=array();

        extract($data);

            

        $notification = array(

            'message'  => $message,

            'type'=>$type

        );

        

        $fields = array(

            'to'        => $fcm_id,

            'notification'  => $notification,

            'data'  => $extra

        );



        $headers = array(

            'Authorization: key='.FIREBASEKEY,

            'Content-Type: application/json'

        );

            

            #Send Reponse To FireBase Server    

        $ch = curl_init();

        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );

        curl_setopt( $ch,CURLOPT_POST, true );

        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );

        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );

        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );

        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );

        $result = curl_exec($ch );

        curl_close( $ch );

        return $result;

    }

    

    // Save Notification..

    

    function save_notification($data=''){

        $obj = & get_instance();

	    return $obj->User_Model->insertAllData('notifications', $data);	    

    }

    

    // Save Url Picture

    function save_pic($url){

    	$imgName = randomstr(15);

    	

    	$content = file_get_contents($url);

    	if(file_put_contents('images/profile/'.$imgName.'.jpg', $content)){

    		return $imgName.'.jpg';

    	}else{

    		return false;

    	}

    }

    

    function randomstr($length='')

{

	$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $charactersLength = strlen($characters);

    $randomString = '';

    for ($i = 0; $i < $length; $i++) {

        $randomString .= $characters[rand(0, $charactersLength - 1)];

    }

    return $randomString;

}

