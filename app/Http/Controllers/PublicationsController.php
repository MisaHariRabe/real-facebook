<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;


class PublicationsController extends Controller
{


    public $content; // contenu de la notification
    public $user_id; // l'utilisateur qui a publie
    public $receiver_users; // les utilisateurs verront
    public $publication_date; // date de publication

    /***
     * Afficher la publication
     */
    public function index()
    {

    }

    /***
     * Récupérer la publication à laquelle de l'utilisateur a droit
     */
    public function get_publication_user()
    {

    }

    /***
     * Envoyer la publication
     */
    public function send($_content, $_receiverUsers)
    {

    }


    /***
     * Envoyer la notification
     */
    public function edit($_idPublication)
    {

    }

    /**
     * Mettre à jour le statut 
     *
     * @return void
     */
    public function set_statut($_idPublication)
    {

    }

    public function destroy($_idNotification)
    {

    }

}
