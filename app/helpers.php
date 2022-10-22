<?php

use App\Models\Sms_log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

if (! function_exists('send_sms')) {

    function send_sms($mobile, $message, $msg_for) {

        $sender_id = config('sinfiny.sender_id');
        //dd($sender_id);
        $working_key = config('sinfiny.working_key');
        //dd($working_key);
        $response = Http::get(sprintf("http://alerts.sinfini.com/api/web2sms.php?workingkey=%s&sender=%s&to=%s&message=%s", 
                        $working_key,
                        $sender_id,
                        $mobile,
                        urlencode($message)
                    ));
                    //dd($response);
        $body = $response->body();
            //dd($body);
        //  Message GID=9821701031 ID=9821701031-1
        if($body == "Invalid Mobile Numbers"){
            $smslog = new Sms_log();
            //$selectslab->brand_id = $request->brand_id;
            $smslog->msg_for = $msg_for;
            $smslog->mobile = $mobile;
            $smslog->message = $message;
            $smslog->output = $body;
            $smslog->is_success = "0";
            $smslog->save();
        }else{

            $smslog = new Sms_log();
            //$selectslab->brand_id = $request->brand_id;
            $smslog->msg_for = $msg_for;
            $smslog->mobile = $mobile;
            $smslog->message = $message;
            $smslog->output = $body;
            $smslog->is_success = "1";
            $smslog->save();
        }

        if (! Str::startsWith($body, 'Message GID=')) {
            // Message failed

            return false;
        }

        
        


        return true;

    }

}

if(!function_exists('tiny_url')){
    function tiny_url($url)
    {
        $responce = Http::get(sprintf("http://tinyurl.com/api-create.php?url=%s",
        $url,
        ));
        
        $link = $responce->body();

        





        return $link;
    }
}
