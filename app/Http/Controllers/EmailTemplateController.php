<?php

namespace App\Http\Controllers;

use App\Models\EmailTemplate;
use Illuminate\Http\Request;
use Stevebauman\Purify\Facades\Purify;
use Validator;

class EmailTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emailTemplates = EmailTemplate::where('id','!=','1')->get();

        return view('admin.emailControl.index')
			->with('emailTemplates',$emailTemplates);
    }

	public function defaultTemplate()
	{
		$emailTemplate = EmailTemplate::firstOrCreate(['id'=>1]);

		return view('admin.emailControl.defaultTemplate')
			->with('emailTemplate',$emailTemplate);
	}

	public function templateStore(Request $request) {
		$purifiedData  = Purify::clean($request->all());

		$validateFor = [
			'notify_email' => 'required'
		];

		$validator = Validator::make($purifiedData,$validateFor);
		if ($validator->fails()) {
			return back()->withErrors($validator)->withInput();
		}

		$purifiedData = (object) $purifiedData;
		$emailTemplate = EmailTemplate::find(1);
		$emailTemplate->name = 'default';
		$emailTemplate->notify_email = $purifiedData->notify_email;
		$emailTemplate->template = $purifiedData->template;
		$emailTemplate->save();
		return back()->with('success','Template Successfully Updated');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmailTemplate  $emailTemplate
     * @return \Illuminate\Http\Response
     */
    public function show(EmailTemplate $emailTemplate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmailTemplate  $emailTemplate
     * @return \Illuminate\Http\Response
     */
    public function edit(EmailTemplate $emailTemplate)
    {
    	$shortcodes = [
    		'2' => [
    			'[[name]]' => 'User\'s Name will replace here.',
				'[[Invoice]]' => 'Invoice number will replace here.',
    			'[[message]]' => 'Application notification message will replace here.'
			],
    		'3' => [
    			'[[name]]' => 'User\'s Name will replace here.',
    			'[[message]]' => 'Application notification message will replace here.'
			],
    		'4' => [
    			'[[name]]' => 'User\'s Name will replace here.',
    			'[[other]]' => 'Application notification message will replace here.'
			]
		];
		$shortcode = $shortcodes[$emailTemplate->id];

        return view('admin.emailControl.edit')
			->with('shortcode',$shortcode)
			->with('emailTemplate',$emailTemplate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmailTemplate  $emailTemplate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmailTemplate $emailTemplate)
    {
		$purifiedData  = Purify::clean($request->all());

		$validateFor = [
			'notify_email' => 'required'
		];

		$validator = Validator::make($purifiedData,$validateFor);
		if ($validator->fails()) {
			return back()->withErrors($validator)->withInput();
		}

		$purifiedData = (object) $purifiedData;
		$emailTemplate->name = $purifiedData->name;
		$emailTemplate->notify_email = $purifiedData->notify_email;
		$emailTemplate->template = $purifiedData->template;
		$emailTemplate->save();
		return back()->with('success','Template Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmailTemplate  $emailTemplate
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmailTemplate $emailTemplate)
    {
        //
    }
}
