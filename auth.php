<?php

require_once('dbinterface.php');
require_once('user.php');

class auth
{
    private $dbh;
    private $uid;


    private function resolve_uid($uid) {
        $emailPattern = "/^\w+@\w+\.com$/";
        $type = preg_match($emailPattern, $uid) ? "Email" : "Username";

        $this->uid = [
                      'id'     => $uid,
                      'target' => $type
                     ];
    }


    private function get_user_auth_data($uid) {
        $data = $this->dbh->pull("0 3 4", [
                                           $this->uid['target'] => $this->uid['id']
                                          ]
                                )[0];

        $userAuthData = [
                         'uid'  => $data[$this->uid['target']],
                         'hash' => $data['Password'          ]
                        ];

        return $userAuthData;
    }


    private function fetch_user_data($uid) {
        echo "data: $this->uid['id'] <br /> $this->uid['target']";

        $data = $this->dbh->pull( "*", [
                                          $this->uid['target'] => $this->uid['id']
                                        ]
                                )[0];
        unset($data['Password']);

        return $data;
    }


    public function __construct($uid) {
        $this->dbh = new dbinterface\db_handle();
        self::resolve_uid($uid);
    }


    /**
     *Validates a user through its UID
     *@param  string $uid
     *@return bool   $status
     */
    public function validate_user($uid) {
        //validate
    }


    /**
     * Authenticates a user
     * @param  string $uid
     * @param  string $password
     * @param  bool   $remeber
     * @return user   $user
     */
    public function login($uid, $password, $remember = false) {
        $userData  = self::get_user_auth_data($uid);

        $hash   = $userData['hash'];
        $status = password_verify( $password, $hash );


        if($status) {
            //login success
          echo "login success";

        } else {
          echo "login failed";
            //login failed

        }

    }


    public function __destruct() {
        $this->dbh = null;
    }

}
