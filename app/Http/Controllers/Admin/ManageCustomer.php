<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserAuth\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
                'active',
                'balance',
                'ip',


            ]);



        return Datatables::of($invoices)


            // ->editColumn('id', function($invoice) {
            //     return 'EMPL/2020-21-';
            // })

           ->addColumn('action', function ($invoice) {
                return '<a href="#" class=" btn btn-xs btn-primary" title="View details"><i class="la la-edit"></i>View Details</a>';
            })


            ->rawColumns(['action'])
            ->orderColumn('id', 'created_at $1')
            ->make();


    }
}
