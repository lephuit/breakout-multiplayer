<?php

use \Social\Facebook;

class Controller_User extends Controller_Template
{

	public function action_index()
	{
		$data['users'] = Model_User::find('all');
		$this->template->title      = "Utilisateurs";
		$this->template->page_title = "Utilisateurs";
		$this->template->content    = View::forge('user/index', $data);

	}

	public function action_view($id = null)
	{
		$data['user'] = Model_User::find($id);

		is_null($id) and Response::redirect('User');
		$this->template->page_title = "Fiche";
		$this->template->title      = "Utilisateurs";
		$this->template->content    = View::forge('user/view', $data);

	}

	public function action_choix()
	{
		$this->template->title   = "Inscription";
		$this->template->set_global('page_title','Choisisez votre méthode d\'inscription',false);
		$this->template->content = View::forge('user/choix');
	}

	public function action_create()
	{

		if (Input::method() == 'POST')
		{
			if(Model_User::find('all', array("where" => array("email" => Input::post('email')))) == null)
			{
				if(Model_User::find('all', array("where" => array("username" => Input::post('username')))) == null)
				{
					$val = Model_User::validate('create');
					
					if ($val->run())
					{
						
						$user = Model_User::forge(array(
							'id'          => Input::post('id'),
							'nom'         => Input::post('nom'),
							'prenom'      => Input::post('prenom'),
							'email'       => Input::post('email'),
							'image'       => '',
							'image_small' => '',
							'password'    => 'fXCTyZUZsrI3UwXylG2Qrb1AOV9qzXA7ui43VzmRYhw=',
							'username'    => Input::post('username'),
							'login_hash'  => '',
						));

						if ($user and $user->save())
						{
							$auth = Auth::instance();
							$auth->login($user->username, 'temp');

							// COOKIE DELETING AND CREATION

							$user_id = $auth->get_user_id();
							$utilisateur = Model_User::find($user_id[1]);
							$auth->change_password('temp', Input::post('password'), null);

							Cookie::delete('Shop&Troc_id');
							Cookie::delete('Shop&Troc_hash');
							Cookie::set('Shop&Troc_id',   $utilisateur->id,         60 * 60 * 24 * 7);
							Cookie::set('Shop&Troc_hash', $utilisateur->login_hash, 60 * 60 * 24 * 7);

							Session::set_flash('success', 'Votre compte a été créé ! Bienvenue parmis nous !');
							Response::redirect('online/jouer');
						}

						else
						{
							Session::set_flash('error', 'Oups! Il y à quelque chose qui cloche dans l\'inscription des utilisateurs, réessayez dans quelques minutes ! :)');
						}
					}
					else
					{
						Session::set_flash('error', $val->show_errors());
						$this->template->set_global('open','ouais gros!');
					}
					}
				else
				{
					Session::set_flash('error', 'Désolé mais un compte est déjà enregistré sous le pseudo « ' . Input::post('username') . ', veuillez en choisir un autre. »');
				}

				}
			else
			{
				Session::set_flash('error', 'Désolé mais un compte est déjà enregistré avec l\'email « ' . Input::post('email') . ' »');
			}
		}

		$this->template->title   = "Inscription";
		$this->template->set_global('page_title','<strong>Vous êtes sur le point de devenir une personne d\'exception !</strong>',false);
		$this->template->content = View::forge('login/login');

	}
}