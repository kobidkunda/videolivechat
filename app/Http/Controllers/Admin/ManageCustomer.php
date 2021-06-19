<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserAuth\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Webpatser\Uuid\Uuid;
use Yajra\DataTables\DataTables;


class ManageCustomer extends Controller
{
    public function blankpage(){
        return view('admin.base');
    }


    public function CustomerListApi(){


        $invoices = Customer::select(
            [
                'id',
                'name',
                'email',
                'phone',
                'type',
                'prof_pic',
                'active',
                'balance',
                'ip',
                'created_at',
                'uuid'


            ]);



        return Datatables::of($invoices)


             ->editColumn('type', function($invoice) {
                 if($invoice->type === '1'){

                    return '<button class="btn btn-info">Agent</button>';
                 } else {
                    return '<button class="btn btn-danger">User</button>';
                 }

             })


             ->editColumn('prof_pic', function($invoice) {
                 if($invoice->prof_pic === null){

                    return '  <img class="image-center-prof" src="https://via.placeholder.com/150" width="100">';
                 } else {
                    return '<img class="image-center-prof" src="'.$invoice->prof_pic.'" width="100">';
                 }

             })

           ->addColumn('action', function ($invoice) {
                return '<a href="'.route('admin.customer.details',$invoice->uuid).'" class=" btn btn-xs btn-primary" title="View details"><i class="la la-edit"></i>View Details</a>';
            })


            ->rawColumns(['action','type','prof_pic'])
            ->orderColumn('id', 'created_at $1')
            ->make();


    }

     public function UserProfile($uuid)
    {
        $user = Customer::where('uuid', $uuid)->first();

        $agent = $user->where('type', '1')->get();

        //return $agent;

        return view('admin.pages.userprofiledetails')->with([
            'user' => $user,
            'agents' => $agent
        ]);


    }


    public function AddUserProfile()
    {
        return view('admin.pages.userprofileadd');
    }


    public function AddUserProfileSave(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'phone' => 'required|numeric|digits:10|unique:customers',
            'password' => 'required',
            'type' => 'required',
           // 'uuid' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect(route('admin.customer.add'))
                        ->withErrors($validator)
                        ->withInput();
        }


        $a = new Customer();
        $a->name = $request->name;
        $a->email = $request->email;
        $a->phone = $request->phone;
        $a->password = bcrypt($request->password);
        $a->uuid = Uuid::generate();
        $a->type = $request->type;
        $a->save();

        return redirect()->route('admin.customer.all');

    }

    public  function UploadProfile(Request $request)
    {
        $image = $request->file('file');
        $fileInfo = $image->getClientOriginalName();
        $filename = pathinfo($fileInfo, PATHINFO_FILENAME);
        $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
        $file_name= $filename.'-'.time().'.'.$extension;
        $image->move(public_path('uploads/gallery'),$file_name);

        $user = Customer::where('id', $request->user_id)->first();
        $user->prof_pic = env('APP_URL').'/uploads/gallery/'.$file_name;
        $user->save();


        return response()->json(['success'=>$user]);
    }

    public function ChangePassword(Request $request)
    {
       $a = Customer::find($request->user_id);
       $a->password = bcrypt($request->password);
       $a->save();
       return back();
    }
}
