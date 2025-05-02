<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;


class FriendsController extends Controller
{
    public $sender_id; // l'utilisateur envoyeur
    public $receiver_id; // l'utilisateur receveur
    public $demand_date; // date de publication


    /***
     * Demande d'ajout
     */
    public function add_friend()
    {

    }

    /***
     * Envoyer la mp
     */
    public function get_demand()
    {

    }

    /***
     * Accepter ou refuser la demande
     */
    public function reply_demand($_idMp)
    {

    }

    /**
     * Envoyer la notification au demandeur et receveur
     *
     * @return void
     */
    public function send_notification($_idDemande)
    {

    }
}
