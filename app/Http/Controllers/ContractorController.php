<?php

namespace App\Http\Controllers;

use App\Contractor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContractorController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{


		$company = $request->user()->id;

/*
		$contactor = \App\Contractor::where("company",$company);

		if (count($contactor) < 1) {
			return response()->json([
				"message" => "No Contractors Found"
			],404);
		}
*/
		return response()->json([
			"message" => "This will list current contractors"
		], 200);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$contractor = new Contractor();
		$contractor->name = $request->name;
		$contractor->contactNumber = $request->contactNumber;
	#	$contractor->company = $request->user()->id;
		$contractor->save();

		return response()->json([
			"message" => "Contractor has been added"
		], 200);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$contactor = \App\Contractor::find($id);
		if (!$contactor) {
			return response()->json([
				"message" => "Contractor Not Found"
			],404);
		}

		return response()->json([
			"name" => $contactor->name,
			"contactNumber" => $contactor->contactNumber,
		], 200);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{

		return response()->json([
			"message" => "This will be contractor updated"
		], 200);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		Contractor::destroy($id);
		return response()->json([
			"message" => "The contractor has been deleted"
		], 200);
	}
}
