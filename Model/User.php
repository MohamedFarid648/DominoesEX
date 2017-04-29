<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Mohamed
 */
class User {
    //put your code here
    private $id;
    private $Name;
    private $email;
    private $password;
    private $userTypeObject;
    public function getId() {
        return $this->id;
    }


    public function getName() {
        return $this->Name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setId($id) {
        $this->id = $id;
    }

    

    public function setName($Name) {
        $this->Name = $Name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

   

  


    
}
