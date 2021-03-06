<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Audit;
use App\Customer;
use App\Region;
use App\Distributor;
use App\AuditTemplate;
use App\Store;

class AuditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $audits = Audit::all();
        return view('audit.index',compact('audits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('audit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'description' => 'required|max:100',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $audit = new Audit;
        $audit->description = $request->description;
        $audit->start_date = date('Y-m-d',strtotime($request->start_date));
        $audit->end_date = date('Y-m-d',strtotime($request->end_date));
        $audit->save();

        Session::flash('flash_message', 'Audit successfully added!');

        return redirect()->route("audits.index");
    }


    public function stores($id)
    {
        $audit = Audit::findOrFail($id);
        $stores = Store::all();
        return view('audit.show',compact('audit', 'stores'));
    }

}
