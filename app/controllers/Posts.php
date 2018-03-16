<?php

class Posts extends Controller {

    public function __construct() {

        if(!isLoggedIn()) {

            redirect('/users/login');
        }

        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');





    }

    public function index() {
        //Get posts
        $posts = $this->postModel->getPosts();

        $data =[
            'posts' => $posts

        ];

        $this->view('posts/index',$data);


    }

    public function edit($id) {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            //sanatize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data =[
                'id'        => $id,
                'title'     => trim($_POST['title']),
                'body'      => trim($_POST['body']),
                'user_id'   => $_SESSION['user_id'],
                'title_err' => '',
                'body_err'  => ''
            ];

            //Validate Title
            if(empty($data['title'])) {

                $data['title_err'] = 'Title is required field';
            }

            if(empty($data['body'])) {

                $data['body_err'] = 'Content is required field';
            }

            //Make sure no error

            if(empty($data['title_err']) && empty($data['body_err'])) {
                //Validated
                if($this->postModel->updatePost($data)){

                    flash('post_message','Post Updated');
                    redirect('posts');


                } else {
                    die('Something went wrong');
                }


            } else {
                //load View with errors
                $this->view('posts/edit',$data);


            }


        }   else {

            //Check Post
            $post = $this->postModel->getPostById($id);

            //check of owner
            if($post->user_id != $_SESSION['user_id']){
                redirect('posts');
            } else {

            }

            $data =[
                'id'    => $id,
                'title' => $post->title,
                'body'  => $post->body

            ];

            $this->view('posts/edit',$data);


        }  }//end of EDIT function


    public function add() {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            //sanatize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data =[
                'title'     => trim($_POST['title']),
                'body'      => trim($_POST['body']),
                'user_id'   => $_SESSION['user_id'],
                'title_err' => '',
                'body_err'  => ''
            ];

            //Validate Title
            if(empty($data['title'])) {

                $data['title_err'] = 'Title is required field';
            }

            if(empty($data['body'])) {

                $data['body_err'] = 'Content is required field';
            }

            //Make sure no error

            if(empty($data['title_err']) && empty($data['body_err'])) {
                //Validated
                if($this->postModel->addPost($data)){

                    flash('post_message','Post Added');
                    redirect('posts');


                } else {
                    die('Something went wrong');
                }


            } else {
                //load View with errors
                $this->view('posts/add',$data);


            }


        }   else {

            $data =[
                'title' => '',
                'body'  => ''

            ];

            $this->view('posts/add',$data);


        }  }//end of Add function


    public function show($id) {

            $post = $this->postModel->getPostById($id);
            $user = $this->userModel->getUserById($post->user_id);


            $data = [

                'post' => $post,
                'user' => $user
            ];

            $this->view('posts/show',$data);

        }

    public function delete($id) {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Check Post
            $post = $this->postModel->getPostById($id);

            //check of owner
            if($post->user_id != $_SESSION['user_id']){
                redirect('posts');
            }

            if($this->postModel->deletePost($id)) {

                flash('post_message', 'Post Removed');
                redirect('posts');
            } else {
                die('Something want Wrong');
            }

        } else {
            redirect('posts');

        }

    }



}