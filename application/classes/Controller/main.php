<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Main extends Controller {

	public function action_index()
	{
		$this->response->body('hello, world!');
	}

    public function action_login()
    {
        $auth = Auth::instance();
        if(isset($_POST['btnsubmit']))
        {
            $login = Arr::get($_POST, 'login');
            $password = Arr::get($_POST, 'password');
            $chkbox = Arr::get($_POST, 'chkbox');
            if($auth->login($login, $password, $chkbox))
            {
                echo 'success';
            }
            else
            {
                echo 'error';
            }
            die();
        }
    }

    public function action_logout()
    {
        $auth = Auth::instance();
        $auth->logout();
        HTTP::redirect($_SERVER['HTTP_REFERER']);
    }
} // End Welcome
