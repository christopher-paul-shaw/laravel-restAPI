<?php

namespace App\Http\Controllers;

use App\Certification;
use App\Contractor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CertificationController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		return response()->json([
			"message" => "todo"
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
		if (!$request->user()->contractors->find($request->contractor_id)) {
			return response()->json([
				"message" => "You do not have access to this Contractor"
			], 400);
		}
		$contractor = new Certification();
		$contractor->title = $request->title;
		$contractor->body = $request->body;
		$contractor->contractor_id = $request->contractor_id;
		$contractor->achieved = $request->achieved;
		$contractor->expires = $request->expires;
		$contractor->save();

		return response()->json([
			"message" => "Certification has been added"
		], 200);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id, Request $request)
	{
		return response()->json([
			"message" => "todo"
		], 200);
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
		$contractor = $request->user()->contractors->find($request->contractor_id);
		$certification = $contractor->certifications->find($id);
		if (!$certification) {
			return response()->json([
				"message" => "You do not have access to this Contractor"
			], 400);
		}
		$certification->title = $request->title;
		$certification->body = $request->body;
		$certification->contractor_id = $request->contractor_id;
		$certification->achieved = $request->achieved;
		$certification->expires = $request->expires;
		$certification->save();

		return response()->json([
			"message" => "This Certification has Been Updated"
		], 200);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id, Request $request)
	{
		$certification = Certification::find($id);
		$contractor_id = $certification->contractor_id ?? 0;
		if(!$request->user()->contractors->find($contractor_id)) {
			return response()->json([
				"message" => "You do not have access to this Contractor"
			], 400);
		}
		Certification::destroy($id);
		return response()->json([
			"message" => "The certification has been deleted"
		], 200);
	}
}
