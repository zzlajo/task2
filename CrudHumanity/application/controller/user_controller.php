<?php

class UserController {

    private $load;
    public $actual_link;

 
    public function __construct() {
        $this->load = new Load();
        $this->actual_link = dirname($_SERVER['PHP_SELF']);
    }

    public function add() {
        $this->load->view('user');
    }

    public function upload() {
        $this->load->view('json');
    }

    public function save($data) {
        $this->load->model('user');
        $user = UserModel::getInstance();

        if (!isset($data['userid']) or $data['userid'] == '') {
            $user->insertar($data);
        } else {
            $user->actualizar($data);
        }
        header("Location:".$this->actual_link);
    }
    public function saveJson($data) {
        $this->load->model('user');
        $user = UserModel::getInstance();
        $user->insertar($data);
        header("Location:".$this->actual_link);
    }

    public function listdata() {
        $this->load->model('user');
        $user = UserModel::getInstance();

        $array['lista'] = $user->listdata();

        $this->load->view('lista', $array);
    }

    public function get($key) {
        $this->load->model('user');
        $user = UserModel::getInstance();

        $data = $user->get($key);
        while ($row = mysqli_fetch_array($data)) {
            $array['userid'] = $row['userid'];
            $array['firstname'] = $row['firstname'];
            $array['lastname'] = $row['lastname'];
            $array['email'] = $row['email'];
        }

        $this->load->view('user', $array);
    }

    public function delete($key) {
        $this->load->model('user');
        $user = UserModel::getInstance();
        $user->delete($key);
        header("Location:".$this->actual_link);
    }

}
