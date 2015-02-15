<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	protected function showLogin(){
		return View::make('/login');
	}

	protected function doLogin(){
		// validate the info, create rules for the inputs
		$rules = array(
			'email'    => 'required|email', // make sure the email is an actual email
			'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);
		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);
		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('/login')
			->withErrors($validator) // send back all errors to the login form
			->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {
			// create our user data for the authentication
			$userdata = array(
				// 'type' 		=> Input::get('logintype'),
				'email'     => Input::get('email'),
				'password'  => Input::get('password')
			);

			// attempt to do the login
			switch(Input::get('logintype')){
				case "admin":
					$fail_redirect = "/admin";
					$success_redirect = "/admin/posts";
				break;

				case "login":
					$fail_redirect = "/login";
					$success_redirect = "/";
				break;

				default:
					$fail_redirect = "/login";
					$success_redirect = "/";
				break;
			}

			if (Auth::attempt($userdata)) {
				// validation successful!
				// redirect them to the secure section or whatever

				if(User::checkUserRole(Input::get('email')) > 1) {
					return Redirect::to($success_redirect);
				} else {
					return Redirect::to("/notallowed");
				}

			} else {
				// validation not successful, send back to form
				return Redirect::to($fail_redirect);
			}
		}
	}

	protected function doLogout(){
		Auth::logout();
		return Redirect::to('/');
	}

}
