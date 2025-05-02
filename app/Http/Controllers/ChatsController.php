<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;


class ChatsController extends Controller
{
    public $content; // contenu de la notification
    public $sender_id; // l'utilisateur envoyeur
    public $receiver_id; // l'utilisateur receveur
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
    public function get_mp_user()
    {

    }

    /***
     * Envoyer la mp
     */
    public function send($_content, $çreceiver_id)
    {

    }

    /***
     * Envoyer la notification
     */
    public function edit($_idMp)
    {

    }

    /**
     * Mettre à jour le statut 
     *
     * @return void
     */
    public function set_statut($_idMp)
    {

    }

    public function destroy($_idMp)
    {

    }

}
