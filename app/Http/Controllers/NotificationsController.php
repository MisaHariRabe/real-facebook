<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;


class NotificationsController extends Controller
{

    public $event_type;  // activité declanchant evenement (demande d'ami, publication,......)
    public $content; // contenu de la notification
    public $user_id; // l'utilisateur qui a fait envoyé la notif
    public $receiver_users; // les utilisateurs recevant la notif
    public $statut; // lu ou non lu
    public $receiver_date; // date de reception

    /***
     * Afficher la notification
     */
    public function index()
    {

    }

    /***
     * Récupérer la notification de l'utilisateur connecte
     */
    public function get_notification_user($_statut = false)
    {

    }


    /***
     * Envoyer la notification
     */
    public function send_user($_eventType, $_receiverUser)
    {

    }

    /**
     * Mettre à jour le statut après avoir lu la message
     *
     * @return void
     */
    public function set_statut($_idNotification)
    {

    }

    public function destroy($_idNotification)
    {

    }

}
