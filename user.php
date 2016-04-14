<?php

require_once('cart.class.php');


class user
{
    private $userID;
    private $firstName;
    private $lastName;
    private $username;
    private $cart;
    private $status;
    private $email;
    private $gender;


    public function __construct($userData = null) {
        if($userData === null) {
            $this->userID = $this->firstName = $this->lastName = $this->username = $this->email = $this->gender = "";
            $this->status['loggedIn'] = false;
            $this->cart               = null;
        } else {
            $this->firstName          = $userData['FirstName'];
            $this->lastName           = $userData['LastName' ];
            $this->username           = $userData['Username' ];
            $this->email              = $userData['Email'    ];
            $this->gender             = $userData['Gender'   ];
            $this->cart               = new cart();
            $this->status['loggedIn'] = true;
        }

        $this->userID = isset($userData['UserID']) ? $userData['UserID'] : "";
        $this->status['reason'] = "";
    }


    public function __get($property) {
        if(property_exists($this, $property)) {
            return $this->$property;
        }
    }


    public function set_fail_reason($reason) {
        $this->status['reason'] = $reason;
    }


    public function authenticated() { return $this->status['loggedIn']; }


    public function fail_reason()   { return $this->status['reason'  ]; }

}
