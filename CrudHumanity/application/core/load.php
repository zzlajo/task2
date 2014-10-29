<?php

class Load {

    public function controller($name) {
        include_once 'application/controller/' . $name . '_controller.php';
    }
 
    public function model($name) {
        include_once 'application/model/' . $name . '_model.php';
    }

    public function view($name, $array = NULL) {
        include_once 'application/view/' . $name . '.php';
    }

    public function error_404() {
        include_once 'application/errors/404.php';
    }
 
}

class Data {

    private $load;

    public function __construct() {
        $this->load = new Load();
        $ctl = NULL;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_POST['form'] == 'user') {
                $this->load->controller('user');
                $ctl = new UserController();

                $data['userid'] = $_POST['userid'];
                $data['firstname'] = $_POST['firstname'];
                $data['lastname'] = $_POST['lastname'];
                $data['email'] = $_POST['email'];

                $ctl->save($data);
            } elseif ($_POST['form'] == 'json') {
                $this->load->controller('user');
                $ctl = new UserController();
		$string = file_get_contents($_FILES['ufile']['name']);
		$jsonRS = json_decode ($string,true);
		foreach ($jsonRS as $rs) {
		    $data['firstname'] = stripslashes($rs["firstname"]);
		    $data['lastname'] = stripslashes($rs["lastname"]);
		    $data['email'] = stripslashes($rs["email"]);
		    $ctl->saveJson($data);
		}

	}
        } else {
            $this->load->error_404();
        }
    }

}

class Index {

    private $load;

    public function __construct() {
        $this->load = new Load();
        $ctl = NULL;

        if (!isset($_GET['page'])) {
            $this->load->controller('user');
            $ctl = new UserController();
            $ctl->listdata();
        } else
        if ($_GET['page'] == "json") {
            $this->load->controller('user');
            $ctl = new UserController();
            $ctl->upload();
        } else
        if ($_GET['page'] == "insert") {
            $this->load->controller('user');
            $ctl = new UserController();
            $ctl->add();
        } else
        if ($_GET['page'] == "edit") {
            $this->load->controller('user');
            $ctl = new UserController();
            $ctl->get($_GET['id']);
        } else
        if ($_GET['page'] == "delete") {
            $this->load->controller('user');
            $ctl = new UserController();
            $ctl->delete($_GET['id']);
        }
    }

}
