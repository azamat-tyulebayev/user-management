<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    private $domain = "localhost:8000";
    public function __construct() {
        parent::__construct();
    }

    private function quickDirtyCurl(string $endpoint, string $requestMethod = 'GET', $data = ''){
        $cSession = curl_init();
        curl_setopt($cSession,CURLOPT_URL,$this->domain . '/' . $endpoint);
        curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($cSession,CURLOPT_HEADER, false);
        curl_setopt($cSession, CURLOPT_CUSTOMREQUEST, $requestMethod);
        curl_setopt($cSession, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($cSession);
        curl_close($cSession);
        return json_decode($result);
    }

    public function index() {
        $users = $this->quickDirtyCurl('users');
        if (200 == $users->statusCode){
            $this->load->view('users', ['users' => $users->data]);
        }
    }

    public function create(){
        $data = [
            'username' => $this->input->post('username'),
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname')
        ];
        $user = $this->quickDirtyCurl('users', 'POST', json_encode($data));
        if (200 == $user->statusCode) {
            echo json_encode($user);
        }
        echo json_encode($user);
    }

    public function getUpdate(int $id){
        $this->load->view('update', ['id' => $id]);
    }

    public function update(){
        $data = [
            'id' => (int)$this->input->post('id'),
            'username' => $this->input->post('username'),
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname')
        ];
        $user = $this->quickDirtyCurl('users', 'PUT', json_encode($data));
        if (200 == $user->statusCode) {
            echo json_encode($user);
        }
        echo json_encode($user);
    }

    public function view(int $id){
        $user = $this->quickDirtyCurl('users/' . $id);
        if (200 == $user->statusCode) {
            $this->load->view('view', ['user' => $user->data]);
        }
    }

    public function delete(int $id) {
        $request = $this->quickDirtyCurl('users/' . $id, 'DELETE');
        if (200 == $request->statusCode){
            $this->load->view('delete', ['id' => $id]);
        }
    }
}