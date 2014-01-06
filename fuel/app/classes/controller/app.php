<?php

class Controller_App extends Controller_Template {

    public $template = 'template';

    public function before($data = null) {
        parent::before(); // 	OBLIGATOIRE!

        if($id = Cookie::get('Shop&Troc_id', false) && !\Auth::check()) {
            $user_logged = Model_User::find($id);
            if (Cookie::get('Shop&Troc_hash', 0) == $user_logged->password) {
                $auth = Auth::instance();
                if ($auth->force_login($id)) {
                    Cookie::set('Shop&Troc_hash', $user_logged->login_hash, 60 * 60 * 24 * 7);
                    Session::set_flash('success', 'Heureux de vous revoir ' . $user_logged->username . ' !');
                    Response::redirect('welcome');
                }
            }
        }

        $uri_string = explode('/', Uri::string());

        if ($uri_string[0] == 'connexion') {
            return;
        } elseif (!\Auth::check()) {

            \Response::redirect('connexion');
        }

        $current = Uri::segment(2);
        $this->template->set_global('current', $current, false);

        // Récupération des infos de l'utilisateur courant
        list(, $user_id) = \Auth::instance()->get_user_id();
        Session::set('user_id', $user_id);
        $this->user_id = $user_id;
        $this->template->user = Model_User::find($user_id);
    }

    public function after($response) {
        // Charge automatiquement la vue assocé à l'action si elle n'a pas été chargé par l'action
        if (!isset($this->template->content)) {
            $view_file = $this->request->route->translation;
            foreach (array_reverse($this->request->method_params) as $param) {
                $view_file = preg_replace("`/{$param}$`", '', $view_file);
            }
            if ($this->request->action == 'index' && strpos($view_file, 'index') === false) {
                $view_file = trim($view_file . '/index', '/');
            }
            $this->template->content = \View::forge($view_file);
        }

        return parent::after($response);
    }

}

?>
