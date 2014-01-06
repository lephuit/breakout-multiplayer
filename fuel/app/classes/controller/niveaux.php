<?php

class Controller_Niveaux extends Controller_Rest {

    public function action_index() {
        $this->template->page_title = "Ils vont vous plaire !";
        $this->template->title = "Catégories";
        $this->template->content = View::forge('produit/welcome');
    }

    public function action_view($id = null) {
        $data['produit'] = Model_Produit::find($id);

        is_null($id) and Response::redirect('Produit');

        $this->template->title = "Produit";
        $this->template->page_title = "Vous le voulez ? N'hésitez pas !";
        $this->template->content = View::forge('produit/view', $data);
    }

    public function action_create() {

        if (\Auth::check()) {
            list(, $user_id) = \Auth::instance()->get_user_id();
            $niveau = Model_Niveaux::forge(array(
                        'ligne_1' => Input::get('ligne_1'),
                        'ligne_2' => Input::get('ligne_2'),
                        'ligne_3' => Input::get('ligne_3'),
                        'ligne_4' => Input::get('ligne_4'),
                        'ligne_5' => Input::get('ligne_5'),
                        'briques' => Input::get('briques'),
                        'user_id' => $user_id,
                        'nom'     => Input::get('nom'),
                        'couleur' => Input::get('couleur'),
            ));

            if ($niveau and $niveau->save()) {
                return $this->response('Votre niveau as été enregistré !');
            } else {
                return $this->response('Oups, il y à eu une erreur, votre score n\'as pas pu être enregistré');
            }
        } else {
            return $this->response('non');

        }

    }

    public function action_edit($id = null) {
        is_null($id) and Response::redirect('Produit');

        $produit = Model_Produit::find($id);

        $val = Model_Produit::validate('edit');

        if ($val->run()) {
            $produit->nom = Input::post('nom');
            $produit->produit_category_id = Input::post('produit_category_id');
            $produit->desc = Input::post('desc');
            $produit->prix = Input::post('prix');
            $produit->troc = Input::post('troc');
            $produit->user_id = Input::post('user_id');
            $produit->image = Input::post('image');
            $produit->image_small = Input::post('image_small');

            if ($produit->save()) {
                Session::set_flash('success', 'Updated produit #' . $id);

                Response::redirect('produit');
            } else {
                Session::set_flash('error', 'Could not update produit #' . $id);
            }
        } else {
            if (Input::method() == 'POST') {
                $produit->nom = $val->validated('nom');
                $produit->produit_category_id = $val->validated('produit_category_id');
                $produit->desc = $val->validated('desc');
                $produit->prix = $val->validated('prix');
                $produit->troc = $val->validated('troc');
                $produit->user_id = $val->validated('user_id');
                $produit->image = $val->validated('image');
                $produit->image_small = $val->validated('image_small');

                Session::set_flash('error', $val->show_errors());
            }

            $this->template->set_global('produit', $produit, false);
        }
        $categories = Model_Produit_Category::find('all');
        $this->template->set_global('categories', $categories);
        $this->template->page_title = "Modifier un troc";
        $this->template->title = "Produits";
        $this->template->content = View::forge('produit/edit');
    }

    public function action_delete($id = null) {
        if ($produit = Model_Produit::find($id)) {
            $produit->delete();

            Session::set_flash('success', 'Deleted produit #' . $id);
        } else {
            Session::set_flash('error', 'Could not delete produit #' . $id);
        }

        Response::redirect('produit');
    }

}