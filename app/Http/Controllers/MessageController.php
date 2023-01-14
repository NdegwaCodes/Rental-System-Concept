<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    private $shown = false;
    private $total_messages = 0;
    private $user_data = array();
    private $time = array();
    private $ids = array();
    private $i = 0;

    public function insert(Request $request)
    {
        $con =  ($this->getConversation($request->id1,$request->id2));

        if(count((array)$con)==0)
        {
            $con = new Conversation();
            $con->user_1 = $request->id1;
            $con->user_2 = $request->id2;
            $con->save();

            $con = Conversation::orderBy('id', 'desc')->first();
        }

        if(count((array)$con)!=0)
        {
            $mess = new Message();
            $mess->message_sender_user = $request->id1;
            $mess->message_text = $request->message;
            if($con->user_1 == $request->id1)
            {
                $mess->is_user_1_seen = 1;
                $mess->is_user_2_seen = 0;
            }
            else
            {
                $mess->is_user_1_seen = 0;
                $mess->is_user_2_seen = 1;
            }
            date_default_timezone_set('Asia/Karachi');
            $mess->message_send_at = date('Y-m-d H:i:s');
            $con->message()->save($mess);
        }

    }

    public function typing(Request $request)
    {
        $username = $request->id1;


        $con =  ($this->getConversation($request->id1,$request->id2));

        if ($con->user_1 == $username)

            $con->user_1_typing = 1;

        else

            $con->user_2_typing = 1;

        $con->save();

    }


    public function nottyping(Request $request)
    {
        $username = $request->id1;


        $con =  ($this->getConversation($request->id1,$request->id2));

        if ($con->user_1 == $username)

            $con->user_1_typing = 0;

        else

            $con->user_2_typing = 0;

        $con->save();
    }


    public  function readuserstatus(Request $request)
    {
        $username = $request->id1;

        $con =  ($this->getConversation($request->id1,$request->id2));


        if ($con->user_1 == $username)
        {
            if ($con->user_2_typing )
            {
               return response($con->user_2_reference->user_name);
            }
        }
        else
        {

            if ($con->user_1_typing)
            {
                return response($con->user_1_reference->user_name);
            }

        }

    }


    public function readusermessage(Request $request)
    {

        $con = $this->getConversation($request->id1,$request->id2);

        if(count((array)$con)>0)
        {
            $data = array();
            $ids = array();
            $date = array();
            $time = array();
            $i = 0;
            $user_one = $con->user_1;
            $user_two =$con->user_2;
            if(Auth::id() == $user_one)
            {
                $mess = $con->message()->orderBy('id', 'desc')->limit($request->numberofmessages)->get()->reverse(); //all()->where('message_sender_user', '!=', $request->id1)->where('is_user_1_seen','=',0);
                if(count((array)$mess)>0)
                {
                    foreach ($mess as $me)
                    {
                        $me->is_user_1_seen = 1;
                        $me->save();
                        $data[$i] = $me->message_text;
                        $ids[$i] = $me->message_sender_user;
                        $d = $me->message_send_at;
                        $time[$i] = date('h:i', strtotime($d)) . ' '. date('a', strtotime($d));
                        $date[$i] = date('j',strtotime($d)) . ' '. date('F', strtotime($d));
                        $i++;
                    }
                    return response([$data,$ids,$date,$time,count((array)$mess)==$request->numberofmessages?1:0]);
                }

            }
            else if(Auth::id() == $user_two)
            {
                $mess = $con->message()->orderBy('id', 'desc')->limit($request->numberofmessages)->get()->reverse();//Message::all()->where('message_sender_user', '!=', $request->id1)->where('is_user_2_seen','=',0);
                if(count((array)$mess)>0)
                {
                    foreach ($mess as $me)
                    {
                        $me->is_user_2_seen = 1;
                        $me->save();
                        $data[$i] = $me->message_text;
                        $ids[$i] = $me->message_sender_user;
                        $d = $me->message_send_at;
                        $time[$i] = date('h:i', strtotime($d)) . ' '. date('a', strtotime($d));
                        $date[$i] = date('j',strtotime($d)) . ' '. date('F', strtotime($d));
                        $i++;
                    }
                    return response([$data,$ids,$date,$time,count((array)$mess)==$request->numberofmessages?1:0]);
                }
            }
        }
    }

    public function readunseenmessage(Request $request)
    {
        $con = $this->getConversation($request->id1,$request->id2);
        
        if(count((array)$con)>0)
        {
            $data = array();
            $date = array();
            $time = array();
            $i = 0;
            $user_one = $con->user_1;
            $user_two =$con->user_2;
            if(Auth::id() == $user_one)
            {
                
                $mess = $con->message()->where('message_sender_user', '!=', $request->id1)->where('is_user_1_seen','=',0)->get();
                if(count((array)$mess)>0)
                {
                    foreach ($mess as $me)
                    {
                        $me->is_user_1_seen = 1;
                        $me->save();
                        $data[$i] = $me->message_text;
                        $d = $me->message_send_at;
                        $time[$i] = date('h:i', strtotime($d)) . ' '. date('a', strtotime($d));
                        $date[$i] = date('j',strtotime($d)) . ' '. date('F', strtotime($d));
                        $i++;
                    }
                    return response([$data,$date,$time]);

                }
                return response($mess);
            }
            else if(Auth::id() == $user_two)
            {
                $mess = $con->message()->where('message_sender_user', '!=', $request->id1)->where('is_user_2_seen','=',0)->get();
                if(count((array)$mess)>0)
                {
                    foreach ($mess as $me)
                    {
                        $me->is_user_2_seen = 1;
                        $me->save();
                        $data[$i] = $me->message_text;
                        $d = $me->message_send_at;
                        $time[$i] = date('h:i', strtotime($d)) . ' '. date('a', strtotime($d));
                        $date[$i] = date('j',strtotime($d)) . ' '. date('F', strtotime($d));
                        $i++;
                    }
                    return response([$data,$date,$time]);
                }
//                return response([$data,$date,$time]);
            }
        }
    }


    public function inbox($id)
    {
        
        $user = Auth::user();
        if($user->id==$id)
        {
        
           //Check Message in Message Table
            $u = $user;
            $msgdate = array();
            $msgtimes = array();
            $msgids = array();
            $unseen = array();
            $i = 0;
            $user_col_1_con = $u->user_1_conversation;
            $user_col_2_con = $u->user_2_conversation;
            if(count((array)$user_col_1_con)>0)
            {
                foreach($user_col_1_con as $con)
                {
                    $total_messages = 0;
                    foreach($con->message as $mess) {
                        if ($mess->is_user_1_seen == 0) {
                            $total_messages++;
                        }
                    }
                    $sender_timedate = $con->message()->orderby('id','desc')->first()->message_send_at;
                    $msgtimes[$i] = date('h:i', strtotime($sender_timedate)) . ' '. date('a', strtotime($sender_timedate));
                    $msgdate[$i] = date('j',strtotime($sender_timedate)) . ' '. date('F', strtotime($sender_timedate));
                    $msgids[$i] = $con->user_2;
                    $unseen[$i] = $total_messages;
                    $i++;
                }
                
            }
            if(count((array)$user_col_2_con)>0)
            {
                foreach($user_col_2_con as $con)
                {
                    $total_messages = 0;
                    foreach($con->message as $mess) {
                        if ($mess->is_user_2_seen == 0) {
                            $total_messages++;
                        }
                    }
                    $sender_timedate = $con->message()->orderby('id','desc')->first()->message_send_at;
                    $msgtimes[$i] = date('h:i', strtotime($sender_timedate)) . ' '. date('a', strtotime($sender_timedate));
                    $msgdate[$i] = date('j',strtotime($sender_timedate)) . ' '. date('F', strtotime($sender_timedate));
                    $msgids[$i] = $con->user_1;
                    $unseen[$i] = $total_messages;
                    $i++;
                }

            }
//            if (count($u->user_1_conversation)>0)
//            {
//                $con = $u->user_1_conversation;
//                foreach($con as $c)
//                {
//                    foreach($c->message as $mess)
//                    {
//                        if($mess->is_user_1_seen==0)
//                        {
//                            $total_messages++;
//                            $user_data[$i] = $mess->message_text;
//                            $d = $mess->message_send_at;
//                            $ids[$i]=$mess->conversation->user_2_reference->id;
//                            $time[$i] = date('h:i', strtotime($d)) . ' '. date('a', strtotime($d));
//                            $i++;
//                        }
//                    }
//                }
//            }
//            else
//            {
//                $con = $u->user_2_conversation;
//                foreach($con as $c)
//                {
//                    foreach($c->message as $mess)
//                    {
//                        if($mess->is_user_2_seen==0)
//                        {
//                            $total_messages++;
//                            $user_data[$i] = $mess->message_text;
//                            $d = $mess->message_send_at;
//                            $ids[$i]=$mess->conversation->user_1_reference->id;
//                            $time[$i] = date('h:i', strtotime($d)) . ' '. date('a', strtotime($d));
//                            $i++;
//                        }
//                    }
//                }
//
//            }


            // $this->check_notification($user);

            //Check Message in Message Table
            // $u = $user;


            // $this->check_messages($u);

            return view('Tenet.tenet_conversation')->with('msgdate',$msgdate)->with('msgtimes',$msgtimes)->with('msgids',$msgids)->with('unseen',$unseen)->with('total_message',$this->total_messages)
                ->with('data',$this->user_data)->with('time',$this->time)->with('ids',$this->ids)->with('user',$user);
        }
        else
        {
            return redirect()->route('check_user_role');
        }
        }
        
    


    public function getConversation($id1,$id2)
    {

        $con = Conversation::all()->where('user_1','=',$id1)->where('user_2','=',$id2)->first();

        if(count((array)$con)==0)
        {
            $con = Conversation::all()->where('user_1','=',$id2)->where('user_2','=',$id1)->first();
        }

        return $con;
    }

    public function messagebox($id)
    {
        $user = User::find($id);
        // $this->check_notification($user);

        // //Check Message in Message Table
        // $u = $user;


        // $this->check_messages($u);

        return view('Tenet.tenetinbox')->with('id',$id)->with('shown',$this->shown)->with('total_message',$this->total_messages)
            ->with('data',$this->user_data)->with('time',$this->time)->with('ids',$this->ids)->with('user',$user);
    }

    public function check_notification($user)
    {
        foreach($user->notify as $no) {

            if( $no->is_seen == 0)
            {
                $this->shown = true;
            }

        }
    }

    public function check_messages($u)
    {
       
    }

}
