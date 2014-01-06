<?php

class Controller_Offline extends Controller_Template {

    public function action_index() {

        if(\Auth::check()) 
        {
            list(, $user_id) = \Auth::instance()->get_user_id();
            Session::set('user_id', $user_id);
            $this->user_id = $user_id;
            $this->template->user = Model_User::find($user_id);
        }

        $this->template->title = "Hors-ligne";
        $this->template->content = View::forge('offline/jouer');
        $this->template->jeux_offline = true;
    }

    public function action_jouer() {

        if(\Auth::check()) 
        {
            list(, $user_id) = \Auth::instance()->get_user_id();
            Session::set('user_id', $user_id);
            $this->user_id = $user_id;
            $this->template->user = Model_User::find($user_id);
        }
            
        $this->template->title = "Hors-ligne";
        $this->template->content = View::forge('offline/jouer');
        $this->template->jeux_offline = true;
    }

}