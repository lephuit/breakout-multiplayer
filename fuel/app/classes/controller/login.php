<?php

class Controller_Login extends Controller_Template {

    public function action_login() {
        if (Auth::check()) {
            Response::redirect('welcome');
        }

        $data = Array();

        $val = Validation::forge('app/index');
        $val->add_field('username', 'Your username', 'required|min_length[3]|max_length[255]');
        $val->add_field('password', 'Your password', 'required|min_length[3]|max_length[255]');
        if ($val->run()) {
            $auth = Auth::instance();
            if ($auth->login($val->validated('username'), $val->validated('password'))) {
                $user_id = Auth::instance()->get_user_id(); $utilisateur = Model_User::find($user_id[1]);
                Cookie::set('Shop&Troc_id',   $utilisateur->id,         60 * 60 * 24 * 7);
                Cookie::set('Shop&Troc_hash', $utilisateur->login_hash, 60 * 60 * 24 * 7);
                Session::set_flash('notice', 'Vous êtes connecté(e) ! Bienvenue ' . $utilisateur->username . ' !');
                Response::redirect('welcome');
            } else {
                $data['username'] = $val->validated('username');
                Session::set_flash('error', 'Identifiant ou mot de passe incorrect !');
            }
        } else {
            if ($_POST) {
                $data['username'] = $val->validated('username');
            } else {
                $log = false;
            }
        }
        $this->template->logged_in  = false;
        $this->template->content    = View::forge('login/login', $data);
        $this->template->title      = 'Connexion';
    }

    public function action_password() {
        if (Auth::check()) {
            Response::redirect('app/index');
        }

        if (Input::post('username') == Input::post('username_confirm')) {
            $val = Validation::forge('app/index');
            $val->add_field('username', 'identifiant', 'required|min_length[3]|max_length[20]');
            $val->add_field('username_confirm', 'deuxième identifiant', 'required|min_length[3]|max_length[20]');

            if ($val->run()) {
                $utilisateur = Model_Utilisateur::find('all', array(
                            'where' => array(
                                array('username', Input::post('username')),
                            ),));

                if ($utilisateur) {
                    $confirm_code = Str::random('distinct', 10);
                    $email = Email::forge();
                    $email->from('no-reply@terminal-methanier.fr', 'Terminal methanier Dunkerque');
                    $email->to($utilisateur->email, $utilisateur->nom . " " . $utilisateur->prenom);
                    $email->subject('Réinitialisation du mot de passe');
                    Session::set('confirmation_code', $confirm_code);
                    Session::set('utilisateur', $utilisateur);
                    $email->html_body(\View::forge('email/confirm_password'));
                    $email->send();
                    Session::set_flash('success', 'Email envoyé !');

                    Response::redirect('login/confirmpassword');
                } else {
                    $data['errors'] = 'Identifiants incorrects !';
                }
            } else {
                if ($_POST) {
                    $data['username'] = $val->validated('username');
                    $data['errors'] = 'Veuillez remplir tous les champs !';
                } else {
                    $data['errors'] = false;
                }
            }
        } else {
            $data['errors'] = 'Vos deux identifiants sont différents.';
        }
        $this->template->errors = @$data['errors'];
        $this->template->wrapper = View::forge('login/password', $data);
    }

    public function action_confirmpassword() {
        if (Auth::check()) {
            Response::redirect('app/index');
        }

        if (Input::post('confirm_code') == Session::get('confirmation_code')) {
            $utilisateur = Session::get('utilisateur');
            $new_password = \Auth::instance()->reset_password(Input::post('username'));
            $email = Email::forge();
            $email->from('no-reply@terminal-methanier.fr', 'Terminal methanier Dunkerque');
            $email->to($utilisateur->email, $utilisateur->nom . " " . $utilisateur->prenom);
            $email->subject('Réinitialisation du mot de passe');
            $email->html_body(\View::forge('email/inscription'));
            $email->send();
            Session::set_flash('success', 'Utilisateur numéro : ' . $utilisateur->id . ' ( ' . $utilisateur->nom . ' ) créé.');
            Session::delete('utilisateur');
            Session::delete('confirmation_code');
            Response::redirect('admin/utilisateurs/index');
        } else {
            $data['errors'] = 'Vos deux identifiants sont différents.';
        }
        $this->template->errors = @$data['errors'];
        $this->template->wrapper = View::forge('login/password', $data);
    }

    public function action_logout() {
        Cookie::delete('Shop&Troc_id');
        Cookie::delete('Shop&Troc_hash');    
        \Auth::instance()->logout();
        Session::set_flash('success', 'Vous êtes déconnectée !');
        Response::redirect('welcome');
    }

}

