<?php
//Declare the namespace for the controller
namespace Drupal\inbox\Controller;
/**
 * Class InboxController
 * @package Drupal\inbox\Controller
 * We extend the main ProcessMaker Controller
 */
class InboxController extends ProcessmakerController{
    /**
     * @return array
     * The main function called to display the page
     */
    public function displayPage(){
        //Check if the user is authorized and get the access token
        if($this->isAuthorized()){
            //Get the list of cases in the inbox from the REST API and assign it to $data
            $data = $this->api_call('/cases')->json();
            //return array for the theme function, we return the theme for the page, the auth which is true and the data returned from the api
            return [
                '#theme' => 'inbox_inbox',
                '#auth' => 'true',
                '#data' => $data
            ];
        }
    }

}