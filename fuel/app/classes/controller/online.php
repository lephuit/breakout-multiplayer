<?php

class Controller_Online extends Controller_App {

    public function action_index() {
        $this->template->title = "Online";
        $this->template->content = View::forge('online/jouer');
        $this->template->jeux_online = true;
    }

    public function action_jouer() {
        $this->template->title = "Online";
        $this->template->content = View::forge('online/jouer');
        $this->template->jeux_online = true;
    }

}