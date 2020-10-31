<?php

namespace App\Http\Controllers;

use App\Models\BasicControl;
use Illuminate\Http\Request;
Use Validator;

class BasicControlController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
	    $basicControl = BasicControl::firstOrCreate(['id'=>1]);
		$allowFileTypes = config('file-manager.allowFileTypes');
		$maxUploadFileSize = config('file-manager.maxUploadFileSize');

		return view('admin.controlPanel.basicControl')
			->with('basicControl', $basicControl)
			->with('maxUploadFileSize', $maxUploadFileSize)
			->with('allowFileTypes', $allowFileTypes);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$validator = Validator::make($request->all(),[
			'maxUploadFileSize' => 'nullable|integer',
		]);

		if ($validator->fails()) {
			return back()->withErrors($validator)->withInput();
		}

        config(['file-manager.allowFileTypes' => array_values($request->fileType)]);
        config(['file-manager.maxUploadFileSize' => $request->maxUploadFileSize]);
        $text = '<?php return ' . var_export(config('file-manager'), true) . ';';
        file_put_contents(config_path('file-manager.php'), $text);

		return back()->with('success','Successfully Updated');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param \App\Models\BasicControl $basicControl
	 * @return \Illuminate\Http\Response
	 */
	public function show(BasicControl $basicControl)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param \App\Models\BasicControl $basicControl
	 * @return \Illuminate\Http\Response
	 */
	public function edit(BasicControl $basicControl)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \App\Models\BasicControl $basicControl
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, BasicControl $basicControl)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param \App\Models\BasicControl $basicControl
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(BasicControl $basicControl)
	{
		//
	}
}
