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
                                             'passwordNoMatch' => "Passwords do not match",
                                             'emailInvalid'    => "Email is invalid"
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
        return __CLASS__ . ": [{$this->code}]: " . $this->reason . "\n";
    }


    public function reason() { return $this->reason; }
}


class auth
{
    private        $dbh;
    private        $uid;


    private function resolve_uid($uid) {
        $emailPattern = "/^\w+@\w+\.\w+$/";
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
        $emailPattern = "/^\w+@\w+\.\w+$/";
        $status = preg_match($emailPattern, $email);

        if(!$status) {
            throw new authException("register-emailInvalid", 5);
        }

        return $status;
    }

    private function reg__save_user(user $thisUser, $hash) {
        if(!($thisUser === null)) {
            $firstName = $thisUser->firstName;
            $lastName  = $thisUser->lastName;
            $username  = $thisUser->username;
            $email     = $thisUser->email;
            $gender    = $thisUser->gender;


            $this->dbh->set_target("users");
            $values = "{$firstName} {$lastName} {$username} {$hash} {$email} {$gender}";
            $this->dbh->push("1 2 3 4 5 6", $values);

            echo $values;

            return true;
        }
        else {
            return false;
        }
    }


    public function __construct($uid) {
        $this->dbh = new dbinterface\db_handle();
        self::resolve_uid($uid);
    }


    /**
     * Validates a user through its UID
     * @return Array   $status
     */
    public function validate_user() {
        $exists = null;
        $status['valid']      = false;
        try {
            $exists           = self::get_user_auth_data();
            $status['valid' ] = true;
        }
        catch (authException $err) {
            $status['reason'] = $err->reason();
        }
        finally {
            return $status;
        }
    }


    /**
     * Checks if a given uid is available
     * @return Bool   $status
     */
    public function reg__uid_available() {
        $exists = self::validate_user();
        $status = !($exists['valid']);
        if (!$status) {
            throw new authException("register-idTaken", 3);
        }

        return $status;
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
    public function register($uid, $password, $userData) {
        $user                 = new user(null);
        $userData['Username'] = $uid;

        try {
            $status = self::reg__uid_available();

            $hash   = password_hash($password, PASSWORD_BCRYPT);

            $user   = new user($userData);

            self::reg__save_user($user, $hash);
        }
        catch (authException $err) {
            self::fail_auth( $user, $err->reason() );
        }
        finally {
            return $user;
        }
    }


    public function __destruct() {
        $this->dbh = null;
    }

}
