<?php
function headers() {
  return array(
      "Authorization: key= ",
      "Content-Type: application/json",
      "project_id: cake-studio-f29a1"

  );
}
 function send_single_notification($fcm_token, $notification, $data, $priority = 'high') {
    $fields = array(
        // 'notification' => $notification,
        'data'=>$data,
        'content_available' => true,
        'priority' =>  $priority,
        'to' => $fcm_token
    );

    if ( $curl_response =  send(json_encode($fields), "https://fcm.googleapis.com/fcm/send") ) {
        return json_decode($curl_response);
    }
    else
        return false;
}

 function send_multicast_notification($fcm_tokens, $notification, $data, $priority = 'high') {
    $fields = array(
        'notification' => $notification,
        'data'=>$data,
        'content_available' => true,
        'priority' =>  $priority,
        'registration_ids' => $fcm_tokens
    );

    if ( $curl_response=send(json_encode($fields), "https://fcm.googleapis.com/fcm/send") ) {
        return json_decode($curl_response);
    }
    else
        return false;
}

 function send_notification($notification_key, $notification, $data, $priority = 'high') {
    $fields = array(
        'notification' => $notification,
        'data'=>$data,
        'content_available' => true,
        'priority' =>  $priority ,
        'to' => $notification_key
    );

    if ( $curl_response=send(json_encode($fields), "https://fcm.googleapis.com/fcm/send") ) {
        return json_decode($curl_response);
   }
   else
        return false;

}

 function send($fields,  $url ="", $headers = array() ) {

    if(empty($url)) $url = FIREBASE_URL;

    $headers = array_merge(headers(), $headers);

    $ch = curl_init();

    if (!$ch)  {
        $curl_error = "Couldn't initialize a cURL handle";
        return false;
    }

    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

    $curl_response = curl_exec($ch);

    if(curl_errno($ch))
        $curl_error = curl_error($ch);

    if ($curl_response == FALSE) {
        return false;
    }
    else {
        $curl_info = curl_getinfo($ch);
        //printr($curl_info);
        curl_close($ch);
        return $curl_response;
    }

}

if (!function_exists('getUserId')) {
    function getUserId($access_token)
    {
        $user_id = 0;
        $user = \App\Models\User::where(['user_access_token' => $access_token])->where('user_access_token', '!=', '')->get();
        if ($user->count() > 0) {
            $user_id = $user->first()->id;
        }

        return $user_id;
    }
}
?>
