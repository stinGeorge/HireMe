<?php

namespace HireMe\Entities;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends \Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	protected $fillable = ['full_name', 'email', 'password'];

    public function candidate(){

        return $this->hasOne('HireMe\Entities\Candidate', 'id', 'id');

    }

    public function getCandidate(){
        $candidate = $this->candidate;

        if (is_null ($candidate))
        {
            $candidate = new Candidate();
            $candidate->id = $this->id;
        }

        return $candidate;
    }

	public function setPasswordAttribute($value){

		if (! empty($value)){
			$this->attributes['password'] = \Hash::make($value);
		}

	}

}
