<?php

class Pages extends Controller {

    public function __construct() {



    }

    public function index(){

        if(isLoggedIn()) {

            redirect('posts');

        }

        $data = array(
            'title' => 'PHP Website on own PHP Framework',
            'small-title' => 'Used Technologies&Tools',
            'description' =>'PHP, Own MVC PHP Framework, JS, HTML5, CSS3, Bootstrap4'

        );



        $this->view('pages/index', $data);


    }

    public function about(){
        $data = array(
            'title' => 'About me',
            'small-title' => 'This is custom About Page',
            'description' =>'Short description of Page'
        );

        $this->view('pages/about',$data);


    }


}