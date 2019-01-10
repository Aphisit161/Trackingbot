<?php

namespace App\Http\Controllers;

use Log;
use DB;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use \LINE\LINEBot;
use \LINE\LINEBot\HTTPClient;
use \LINE\LINEBot\HTTPClient\CurlHTTPClient;
use \LINE\LINEBot\MessageBuilder;
use \LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use \LINE\LINEBot\MessageBuilder\ImageMessageBuilder;

class Event_controller extends BaseController
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }
    /*
    * post_service_reviceive
    * ส่ง Request และ รับ Respone จาก Line develop.
    * @input	request
    * @output	status 200 OK
    * @author	Aphisit Sipalat 58160161
    * @Create Date 2562-01-10
    */

    public function post_service_reviceive(Request $request){

        $data_inputs = $request->all();
        echo("ti");
        try{

            $this->is_events        = true;
            $this->arr_request     = $data_inputs['events'];

            foreach ( $data_inputs['events'] as $event ) 
            {   
                if (array_key_exists('message', $event)) 
                {
                    $message        = (object) $event['message'];
                }

                    $reply_message  = '';
                    $source         = (object) $event['source'];
                    $reply_token    = $event['replyToken'];
                    $timestamp      = $event['timestamp'];
                    $event_type     = $event['type'];
                    $line_user_id   = $event['source']['userId']; 
                   
                if($event_type == 'message') 
                {

                }elseif( $event_type == 'postback') 
                {
            
                }
            }
            return response()->json(['status' => 'ok'], 200);

        }catch(Exception $e){

             \Log::debug('Error '.$e);

            return response()->json(['status' => 'ok'], 200);
        }

    }
}
