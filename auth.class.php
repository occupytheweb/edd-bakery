<?php

require_once('dbinterface.php');
require_once('user.php');


/**
 * Defines authentication exceptions
 */
class authException extends Exception
{
    private static $reasons;
    private        $reason;


    private function init_reasons() {
        static::$reasons['login'   ] = array('uid'      => '$this->uid[\'target\'] does not exist',
                                             'password' => "Password Incorrect"
                                            );
        static::$reasons['register'] = array('idTaken'         => "Identifier is taken",
                                             'passwordNoMatch' => "Passwords do not match"
                                            );
    }


    public function __construct($reason, $code = 0, Exception $previous = null) {
        self::init_reasons();

        $reasonPattern = "/^(login|register)-(\w+)$/";
        preg_match($reasonPattern, $reason, $r);
        list($buffer, $origin, $type) = $r;

        $this->reason = static::$reasons[$origin][$type];
        $message      = $reason;

        parent::__construct($message, $code, $previous);
    }


    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: " . parent::$message . "\n";
    }


    public function reason() { return $this->reason; }
}


class auth
{
    private        $dbh;
    private        $uid;


    private function resolve_uid($uid) {
        $emailPattern = "/^\w+@\w+\.com$/";
        $type = preg_match($emailPattern, $uid) ? "Email" : "Username";

        $this->uid = [
                      'id'     => $uid,
                      'target' => $type
                     ];
    }


    private function get_user_auth_data() {
        $userAuthData = null;
        $exists       = false;
        $data = $this->dbh->pull( "0 3 4", [
                                             $this->uid['target'] => $this->uid['id']
                                           ],
                                  $exists
                                );
        if($exists) {
            $data = $data[0];
            $userAuthData = [
                             'uid'  => $data[$this->uid['target']],
                             'hash' => $data['Password'          ]
                            ];
        } else {
            throw new authException("login-uid" , 1);
        }

        return $userAuthData;
    }


    private function password_check($inPassword, $storedPassword) {
        $status = password_verify($inPassword, $storedPassword);

        if(!$status) {
            throw new authException("login-password", 2);
        }

        return $status;
    }


    private function fetch_user_data() {
        $exists = false;
        $data   = $this->dbh->pull( "*", [
                                          $this->uid['target'] => $this->uid['id']
                                         ],
                                    $exists
                                  );
        if($exists) {
            $data = $data[0];
            unset($data['Password']);
        }

        return $data;
    }


    private function fail_auth(user $thisUser, $reason) {
        $varPattern = '/\$(\S+)/';

        if( preg_match($varPattern, $reason, $var) ) {
            $reason = preg_replace($varPattern, "%s", $reason);
            //$var    = $var[1];
            //$reason = sprintf($reason, $$var);   //err, cannot reference $this dynamically
            $reason = sprintf($reason, $this->uid['target']);
        }

        $thisUser->set_fail_reason($reason);
    }


    private function reg__validate_passwords($passwords) {
        list($password, $repeatPassword) = $passwords;
        $status = $password == $repeatPassword ? true : false;

        if(!$status) {
            throw new authException("register-passwordNoMatch", 4);
        }

        return $status;
    }


    private function reg__validate_email($email) {
        $emailPattern = "/^\w+@\w+\.com$/";
        $status = preg_match($emailPattern, $email);

        if(!$status) {
            throw new authException("register", 1);
        }
    }

    private function reg__save_user(user $thisUser) {
        if(!$thisUser === null) {

        }
    }


    public function __construct($uid) {
        $this->dbh = new dbinterface\db_handle();
        self::resolve_uid($uid);
    }


    /**
     * Validates a user through its UID
     * @return bool   $status
     * TODO::Deprecate - reason : handled by exceptions
     */
    public function validate_user() {
    }


    /**
     * Authenticates a user
     * @param  string $uid
     * @param  string $password
     * @param  bool   $remeber
     * @return array  $return
     */
    public function login($uid, $password, $remember = false) {
        $user = new user(null);

        try {
            $authData = self::get_user_auth_data();

            $hash     = $authData['hash'];
            $status   = self::password_check($password, $hash);

            $userData = self::fetch_user_data();
            $user     = new user($userData);
        }
        catch (authException $err) {
            self::fail_auth( $user, $err->reason() );
        }
        finally {
            return $user;
        }
    }


    /**
     * Creates a new user & adds them to the db
     * @param string $email
     * @param string $password
     * @param string $repeatPassword
     */
    public function register($uid, $passwords, $userData) {
        $status = true;
        try {
            $status = $status && self::reg__validate_passwords($passwords);
            $status = $status && self::reg__validate_uid($uid);
        }
        catch (authException $err) {
            $reason = $err->reason();
        }


    }


    public function __destruct() {
        $this->dbh = null;
    }

}
