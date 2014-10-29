<?php

use HireMe\Entities\User;
use HireMe\Managers\RegisterManager;
use HireMe\Managers\AccountManager;
use HireMe\Managers\ProfileManager;
use HireMe\Repositories\CandidateRepo;
use HireMe\Repositories\CategoryRepo;

class UserController extends \BaseController {

	protected $candidateRepo;
	protected $categoryRepo;

	public function __construct(CandidateRepo $candidateRepo, CategoryRepo $categoryRepo){

		$this->candidateRepo = $candidateRepo;
		$this->categoryRepo = $categoryRepo;

	}

	public function signUp(){

		return View::make('users/sign-up');

	}

	public function register(){
		
		$user = $this->candidateRepo->newCandidate();
		$manager = new RegisterManager($user, Input::all());

		/*if($manager->save()){
			return Redirect::route('home');
		}*/

		$manager->save();
		return Redirect::route('home');

		//return Redirect::back()->withInput()->withErrors($manager->getErrors());

	}

	public function account(){

		$user = Auth::user();
		return View::make('users/account', compact('user'));

	}

	public function updateAccount(){
		
		$user = Auth::user();
		$manager = new AccountManager($user, Input::all());

		/*if($manager->save()){
			return Redirect::route('home');
		}*/
		/*try {
			$manager->save();
		} catch (\HireMe\Managers\ValidationException $e){
			dd($e->getErrors());
		}*/

		$manager->save();
		return Redirect::route('home');

		//return Redirect::back()->withInput()->withErrors($manager->getErrors());

	}

	public function profile(){

		$user = Auth::user();
		$candidate = $user->getCandidate();
		$categories = $this->categoryRepo->getList();
		$job_types = \Lang::get('utils.job_types');

		return View::make('users/profile', compact('user', 'candidate', 'categories', 'job_types'));

	}

	public function updateProfile()
    {
        $user = Auth::user();
        $candidate = $user->getCandidate();
        $manager = new ProfileManager($candidate, Input::all());
        $manager->save();

        return Redirect::route('home');
    }

}