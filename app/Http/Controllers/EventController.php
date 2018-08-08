<?php 
namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Classes\LineService;
use Illuminate\Http\Request;
use Log;


class EventController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function eventMessage(Request $request){
        // dd($request->all());
        Log::info('xxx',$request->all());

        echo "OK";
        // $request = file_get_contents('php://input');
        // $request_array = json_encode($request,true);
        // $POST_HEADER = array('Content-Type: application/json', 'Authorization: Bearer ' . env('LINE_TOKEN'));
       // dd($request);
        // if ( sizeof($request_array['events']) > 0 ) 
        // {
        //     foreach ($request_array['events'] as $event) 
        //     {
        //         $reply_message = '';
        //         $reply_token = $event['replyToken'];
        //          if ( $event['type'] == 'message' )
        //          {
        //             if( $event['message']['type'] == 'text' )
        //             {
        //                  $text = $event['message']['text'];
        //                  if(in_array(strtoupper($text), array_keys($priceList)))
        //                  {
        //                       $temp = $priceList[strtoupper($text)];
        //                         $data = [
        //                             'replyToken' => $reply_token,
        //                             'messages' => [[ 'type' => 'text', 'text' => $temp ]]
        //                         ];                                               
        //                         $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);
        //                         $send_result = send_reply_message( env('LINE_API_URL').'/reply', $POST_HEADER, $post_body);


        //                  }elseif($text == )

        //             }
        //          }

        //     }
        // }
   
    }

    public function bot() {
        $line = new LineService();
        $line->callMessage();
    }

    public function respondMessage(Request $request) {
        dd($request->all());
    }
}

?>