<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index');
        $this->load->view('templates/footer');
    }

    public function user_role()
    {
        $data['title'] = 'User role';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/user_role');
        $this->load->view('templates/footer');
    }

}