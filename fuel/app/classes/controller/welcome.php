<?php

class Controller_Welcome extends Controller_Template {

    public function action_index() {

        if(\Auth::check()) 
        {
            list(, $user_id) = \Auth::instance()->get_user_id();
            Session::set('user_id', $user_id);
            $this->user_id = $user_id;
            $this->template->user = Model_User::find($user_id);
        }

    	if($id = Cookie::get('Shop&Troc_id', false) && !\Auth::check()) {
            $user_logged = Model_User::find($id);
    		if ($user_logged && Cookie::get('Shop&Troc_hash', 0) == $user_logged->password) {
    			$auth = Auth::instance();
    			if ($auth->force_login($id)) {
    				Cookie::set('Shop&Troc_hash', $user_logged->login_hash, 60 * 60 * 24 * 7);
    				Session::set_flash('success', 'Heureux de vous revoir ' . $user_logged->username . ' !');
    				Response::redirect('welcome');
    			}
    		}
        }
        else {
        	$this->template->title = 'Bienvenue ';
        }

        $this->template->title = 'Bienvenue !';
        $this->template->content = \View::forge('welcome/index');
    }

    public function action_404() {
    	$this->template->title = '4-Oh-4 !';
        $this->template->content = \View::forge('welcome/404', 404);
    }

}
