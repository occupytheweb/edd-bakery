<?php


class user
{
    private $userID;
    private $firstName;
    private $lastName;
    private $username;
    private $cart;
    private $status;


    public function __construct($userData = null) {
        if($userData === null) {
            $this->userID = $this->firstName = $this->lastName = $this->username = "";
            $this->status['loggedIn'] = false;
        } else {
            $this->userID             = $userData['UserID'   ];
            $this->firstName          = $userData['FirstName'];
            $this->lastName           = $userData['LastName' ];
            $this->username           = $userData['Username' ];
            $this->status['loggedIn'] = true;
        }

        $this->cart             = null;
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
