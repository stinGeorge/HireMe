<?php

use HireMe\Repositories\CategoryRepo;
use HireMe\Repositories\CandidateRepo;

class CandidateController extends \BaseController {

	protected $categoryRepo;
	protected $candidateRepo;

	public function __construct(CategoryRepo $categoryRepo, CandidateRepo $candidateRepo){

		$this->categoryRepo = $categoryRepo;
		$this->candidateRepo = $candidateRepo;

	}

	public function category($slug, $id){
		$category = $this->categoryRepo->find($id);

		$this->notFoundUnless($category);

		return View::make('candidates/category', compact('category'));
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug, $id)
	{
		$candidate = $this->candidateRepo->find($id);

		$this->notFoundUnless($candidate);

		return View::make('candidates/show', compact('candidate'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
