<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserAuth\Customer;
use App\Models\VideoChat;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class ManageChat extends Controller
{
    public  function CreateChat(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'agent_id' => 'required',
            'schedule_time' => 'required',
            
        ]);

        if ($validator->fails()) {
            return back();
        }


       $user = Customer::where('id',$request->user_id)->first();
       $agent = Customer::where('id',$request->agent_id)->first();

       $createbooking = new VideoChat();
       $createbooking->uuid = Uuid::generate();;
       $createbooking->user_id = $request->user_id;
       $createbooking->agent_id = $request->agent_id;
       $createbooking->schedule_time = $request->schedule_time;

       $createbooking->status = 0;
       $createbooking->save();
       return redirect()->back();
    }

    public  function ChatListApiDT()
    {
        $invoices = VideoChat::select(
            [
                'id',
                'uuid',
                'user_id',
                'agent_id',
                'schedule_time',
                'start_time',
                'end_time',
                'status',
                'credits',
                'created_at',



            ]);



        return Datatables::of($invoices)


             ->editColumn('user_id', function($invoice) {
                 $user = Customer::find($invoice->user_id);

                return $user->name;

             })


             ->editColumn('agent_id', function($invoice) {
                $user = Customer::find($invoice->agent_id);

                return $user->name;

             })

           ->addColumn('action', function ($invoice) {
                return '<a href="'.route('admin.customer.list.video.chat.delete',$invoice->id).'" class=" btn btn-xs btn-danger" title="delete"><i class="la la-edit"></i>Delete</a>';
            })


            ->rawColumns(['action'])
            ->orderColumn('id', 'created_at $1')
            ->make();
    }

    public  function DeleteChat($id)
    {


       $createbooking =  VideoChat::find($id);
       $createbooking->delete();
       return redirect()->back();
    }


}
