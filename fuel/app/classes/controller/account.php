<?php

class Controller_Account extends Controller_App {

    public function action_view() {
        
        $user_id_array = \Auth::instance()->get_user_id();
        $user_id = $user_id_array[1];
        $data['user'] = Model_User::find($user_id);

        $this->template->title   = "Mon profil";
        $this->template->page_title = "Mon profil";
        $this->template->content = View::forge('account/view', $data);
    }

    public function action_edit() {
        
        $user_id_array = \Auth::instance()->get_user_id();
        $user_id = $user_id_array[1];
        $user = Model_User::find($user_id);

        $val = Model_User::validate('edit');

        if ($val->run()) {
            
            $config = array(
            'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
            'randomize'     => false,
            );

            Upload::process($config); 
            if (Upload::is_valid()) 
            { 						
                $arr = Upload::get_files();
                Upload::save(DOCROOT.'images/users/'.$user_id.'/', array_keys($arr) ); 			

                $user->nom         = Input::post('nom');
                $user->prenom      = Input::post('prenom');
                $user->email       = Input::post('email');
                $user->username    = Input::post('username');
                $user->image       = 'images/users/'.$user_id.'/'.$arr[0]['filename']."_normal.jpg";
                $user->image_small = 'images/users/'.$user_id.'/'.$arr[0]['filename']."_small.jpg";

                if ($user->save()) {
                    
                    // _SMALL
						
                    $image = Image::forge(array(
                            'quality' => 90,
                            'bgcolor' => '#ffffff',
                    ));

                    $image
                    ->load('images/users/'.$user_id.'/'.$arr[0]['filename'].".".$arr[0]['extension'])
                    ->resize(50, 50, true, true)
                    ->save('images/users/'.$user_id.'/'.$arr[0]['filename']."_small.jpg");

                    // _NORMAL

                    $image = Image::forge(array(
                            'quality' => 90,
                            'bgcolor' => '#ffffff',
                    ));
                    $image
                    ->load('images/users/'.$user_id.'/'.$arr[0]['filename'].".".$arr[0]['extension'])
                    ->resize(130, 130, true, true)
                    ->save('images/users/'.$user_id.'/'.$arr[0]['filename']."_normal.jpg");

                    File::delete(DOCROOT.'images/users/'.$user_id.'/'.$arr[0]['filename'].".".$arr[0]['extension']);
                
                    Session::set_flash('success', 'Votre profil à été modifié !');

                    Response::redirect('account/view');
                } else {
                    Session::set_flash('error', 'Erreur d\'interaction avec la base de données.');
                }
            }
            else
            {
                
                $user->nom         = Input::post('nom');
                $user->prenom      = Input::post('prenom');
                $user->email       = Input::post('email');
                $user->username    = Input::post('username');

                if ($user->save()) {
                    Session::set_flash('success', 'Votre profil à été modifié !');

                    Response::redirect('account/view');
                }
            }
        } else {
            if (Input::method() == 'POST') {
                $user->nom = $val->validated('nom');
                $user->prenom = $val->validated('prenom');
                $user->email = $val->validated('email');
                $user->username = $val->validated('username');
                $user->image = $val->validated('image');

                Session::set_flash('error', $val->show_errors());
            }

            $this->template->set_global('user', $user, false);
        }

        $this->template->title = "Modifier mon profil";
        $this->template->page_title = "Modifier mon profil";
        $this->template->content = View::forge('account/edit');
    }

    public function action_delete($id = null) {
        $user_id_array = \Auth::instance()->get_user_id();
        $user_id = $user_id_array[1];
        
        if ($user = Model_User::find($user_id)) {
            $user->delete();

            Session::set_flash('success', 'Compte supprimé...');
        } else {
            Session::set_flash('error', 'Suppression impossibe, contactez l\'administrateur du site');
        }

        Response::redirect('user');
    }

}