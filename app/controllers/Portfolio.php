<?php

class Portfolio extends Controller {


    public function index() {
        $data =[];
        $this->view('portfolio/index', $data);


    }

}