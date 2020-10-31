<?php

namespace App\Http\Controllers;

use App\Models\EmailControl;
use Illuminate\Http\Request;
use Stevebauman\Purify\Facades\Purify;
use Validator;

class EmailControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$emailControl = EmailControl::firstOrCreate(['id'=>1]);
		return view('admin.emailControl.emailConfig')
			->with('emailControl',$emailControl);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$purifiedData  = Purify::clean($request->all());
		$selectMail = $purifiedData['selectMail'];
		$validateFor = [
			'selectMail' => 'required'
		];

		if ($selectMail == 'smtp') {
			$validateFor = [
				'selectMail' => 'required',
				'mail_host' => 'required',
				'mail_port' => 'required',
				'mail_username' => 'required',
				'mail_password' => 'required',
				'mail_from' => 'required',
			];
		}

		$validator = Validator::make($purifiedData,$validateFor);
		if ($validator->fails()) {
			return back()->withErrors($validator)->withInput();
		}

		$purifiedData = (object) $purifiedData;
		$emailControl = EmailControl::find(1);
		$emailControl->selectMail = $purifiedData->selectMail;
		$emailControl->mail_host = $purifiedData->mail_host;
		$emailControl->mail_port = $purifiedData->mail_port;
		$emailControl->mail_username = $purifiedData->mail_username;
		$emailControl->mail_password = $purifiedData->mail_password;
		$emailControl->mail_from = $purifiedData->mail_from;
		$emailControl->save();
		return back()->with('success','Successfully Updated');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmailControl  $emailControl
     * @return \Illuminate\Http\Response
     */
    public function show(EmailControl $emailControl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmailControl  $emailControl
     * @return \Illuminate\Http\Response
     */
    public function edit(EmailControl $emailControl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmailControl  $emailControl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmailControl $emailControl)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmailControl  $emailControl
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmailControl $emailControl)
    {
        //
    }
}
