<?php

class Controller_Editeur extends Controller_Template {

    public function action_index() {

        if(\Auth::check()) 
        {
            list(, $user_id) = \Auth::instance()->get_user_id();
            Session::set('user_id', $user_id);
            $this->user_id = $user_id;
            $this->template->user = Model_User::find($user_id);
        }

        $this->template->title      = "Générateur";
        $this->template->content    = View::forge('generateur/index');
        $this->template->generateur = true;
    }

    public function action_jouer() {

        if(\Auth::check()) 
        {
            list(, $user_id) = \Auth::instance()->get_user_id();
            Session::set('user_id', $user_id);
            $this->user_id = $user_id;
            $this->template->user = Model_User::find($user_id);
        }
            
        $this->template->title      = "Générateur";
        $this->template->content    = View::forge('generateur/index');
        $this->template->generateur = true;
    }

}