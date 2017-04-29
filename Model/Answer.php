<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Answer
 *
 * @author Mohamed
 */
class Answer {
   //put your code here
    private $id;
    private $text;//the answer data
    private $user;//user object 
    private $question;//$question object
    
    public function getId() {
        return $this->id;
    }

    public function getText() {
        return $this->text;
    }

    public function getUser() {
        return $this->user;
    }

    public function getQuestion() {
        return $this->question;
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

    public function setQuestion($question) {
        $this->question = $question;
    }


    
   }
