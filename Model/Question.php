<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Question
 *
 * @author Mohamed
 */
class Question {
    //put your code here
    private $id;
    private $text;//the question data
    private $user;//user object 
   
    public function getId() {
        return $this->id;
    }

    public function getText() {
        return $this->text;
    }

    public function getUser() {
        return $this->user;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setText($text) {
        $this->text = $text;
    }

    public function setUser($user) {
        $this->user = $user;
    }



}
