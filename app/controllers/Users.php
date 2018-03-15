<?php

class Users extends Controller {

    public function __construct()
    {



    }
    public function login(){
        //Check for Post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Process form



        } else {
            //init data
            $data = [
                'email'               => '',
                'password'            => '',
                'email_err'           => '',
                'password_err'        => ''

            ];

            //Load view
            $this->view('users/login', $data);
        }


    }//end of register function

    public function register(){
        //Check for Post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Process form

            //Sanitize Post Data
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            //init data
            $data = [
                'name'                => trim($_POST['name']),
                'email'               => trim($_POST['email']),
                'password'            => trim($_POST['password']),
                'confirm_password'    => trim($_POST['confirm_password']),
                'name_err'            => '',
                'email_err'           => '',
                'password_err'        => '',
                'confirm_password_err'=> ''
            ];

        } else {
            //init data
            $data = [
              'name'                => '',
              'email'               => '',
              'password'            => '',
              'confirm_password'    => '',
              'name_err'            => '',
              'email_err'           => '',
              'password_err'        => '',
              'confirm_password_err'=> ''
            ];

            //Load view
            $this->view('users/register', $data);
        }


    }//end of register function




}