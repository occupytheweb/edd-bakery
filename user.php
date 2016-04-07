<?php
class user
{
    private $userID;
    private $firstName;
    private $lastName;
    private $username;
    private $cart;



    public function __construct($userData) {
        $this->userID    = $userData['UserID'   ];
        $this->firstName = $userData['FirstName'];
        $this->lastName  = $userData['LastName' ];
        $this->username  = $userData['Username' ];
        $this->cart      = null;
    }


    public function __get($property) {
        if(property_exists($this, $property)) {
            return $this->$property;
        }
    }

}
