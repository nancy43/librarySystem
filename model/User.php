<?php
    class User {
        
        private $user_id; // Must be incremental + unique.  Also used as salt.
        private $password; // Must be unique.
        private $creation_date;

        function __construct($user_id, $password, $creation_date){
            $this->user_id=$user_id;
            $this->password=$password;
            $this->creation_date=$creation_date;
        }
        function getUserID(){
            return $this->user_id;
        }
        function getUserPassword() {
            return $this->password;
        }
       
        function getDate() {
            return $this->creation_date;
        }
    }
?>