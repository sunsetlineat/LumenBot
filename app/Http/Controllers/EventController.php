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
        //dd($request->all());
        //Log::info('xxx',$request->all());
        print_r($request->all());
        //echo "OK";
        
        $request = file_get_contents('php://input');
        $request_array = json_encode($request,true);
        $POST_HEADER = array('Content-Type: application/json', 'Authorization: Bearer ' . env('LINE_TOKEN'));
       dd($request);
        if ( sizeof($request_array['events']) > 0 ) 
        {
            foreach ($request_array['events'] as $event) 
            {
                $reply_message = '';
                $reply_token = $event['replyToken'];
                 if ( $event['type'] == 'message' )
                 {
                    if( $event['message']['type'] == 'text' )
                    {
                         $text = $event['message']['text'];
                         if(in_array(strtoupper($text), array_keys($priceList)))
                         {
                              $temp = $priceList[strtoupper($text)];
                                $data = [
                                    'replyToken' => $reply_token,
                                    'messages' => [[ 'type' => 'text', 'text' => $temp ]]
                                ];                                               
                                $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);
                                $send_result = send_reply_message( env('LINE_API_URL').'/reply', $POST_HEADER, $post_body);


                         }elseif ($text == 'Bitkub Menu') {
                            $data = '{"to":"'. $event['source']['userId'] .'","messages":[{"type":"flex","altText":"This is a Flex Message","contents":{
                    "type": "bubble",
                    "hero": {
                        "type": "image",
                        "url": "https://preview.ibb.co/hPYGQe/ce1d9357197fa496459f9f62f102ab51ecd4311c.jpg",
                        "size": "full",
                        "aspectRatio": "20:13",
                        "aspectMode": "cover"
                    },
                    "body": {
                        "type": "box",
                        "layout": "vertical",
                        "spacing": "md",
                        "contents": [
                        {
                            "type": "box",
                            "layout": "vertical",
                            "margin": "lg",
                            "spacing": "sm",
                            "contents": [
                            {
                                "type": "text",
                                "text": "FAQ Support",
                                "color": "#1DB446",
                                "weight": "bold",
                                "size": "xl"
                            },
                            {
                                "type": "text",
                                "text": "categories กรุณาเลือกหมวดหมู่คำถาม",
                                "size": "xs",
                                "color": "#aaaaaa",
                                "wrap": true
                            }
                            ]
                        },
                        {
                            "type": "separator",
                            "margin": "lg"
                        },
                        {
                            "type": "box",
                            "layout": "vertical",
                            "margin": "lg",
                            "spacing": "sm",
                            "contents": [
                            {
                                "type": "box",
                                "layout": "vertical",
                                "spacing": "sm",
                                "contents": [
                                {
                                    "type": "button",
                                    "style": "primary",
                                    "action": {
                                    "type": "postback",
                                    "label": "ข้อมูลทั่วไป",
                                    "displayText": "ข้อมูลทั่วไป",
                                    "data": "ข้อมูลทั่วไป"
                                    }
                                },
                                {
                                    "type": "button",
                                    "style": "primary",
                                    "action": {
                                    "type": "postback",
                                    "label": "เริ่มต้นการใช้งาน",
                                    "displayText": "เริ่มต้นการใช้งาน",
                                    "data": "เริ่มต้นการใช้งาน"
                                    }
                                },
                                {
                                    "type": "button",
                                    "style": "primary",
                                    "action": {
                                    "type": "postback",
                                    "label": "ความปลอดภัย",
                                    "displayText": "ความปลอดภัย",
                                    "data": "ความปลอดภัย"
                                    }
                                }
                                ]
                            },
                            {
                                "type": "box",
                                "layout": "vertical",
                                "spacing": "sm",
                                "contents": [
                                {
                                    "type": "button",
                                    "style": "primary",
                                    "action": {
                                    "type": "postback",
                                    "label": "ความรู้เกี่ยวกับการเทรด",
                                    "displayText": "ความรู้เกี่ยวกับการเทรด",
                                    "data": "ความรู้เกี่ยวกับการเทรด"
                                    }
                                },
                                {
                                    "type": "button",
                                    "style": "primary",
                                    "action": {
                                    "type": "postback",
                                    "label": "จัดการบัญชี",
                                    "displayText": "จัดการบัญชี",
                                    "data": "จัดการบัญชี"
                                    }
                                },
                                {
                                    "type": "button",
                                    "style": "primary",
                                    "action": {
                                    "type": "postback",
                                    "label": "ช่วยเหลือ",
                                    "displayText": "ช่วยเหลือ",
                                    "data": "ช่วยเหลือ"
                                    }
                                }
                                ]
                            }
                            ]
                        },
                        {
                            "type": "separator",
                            "margin": "lg"
                        }
                        ]
                    },
                    "footer": {
                        "type": "box",
                        "layout": "vertical",
                        "contents": [
                        {
                            "type": "button",
                            "style": "link",
                            "color": "#1DB446",
                            "height": "sm",
                            "action": {
                            "type": "uri",
                            "label": "Bitkub support",
                            "uri": "https://support.bitkub.com/hc/categories/360000031152-HOW-CAN-WE-HELP-YOU-"
                            }
                        }
                        ]
                    }
                    }}]}';
                    $post_body = $data;
                    $send_result =send_reply_message($API_URL.'/push',$POST_HEADER,$post_body);
                            
                         }

                    }
                 }

            }
        }
   
    }

  

    public function respondMessage(Request $request) {
        dd($request->all());
    }
}

?>