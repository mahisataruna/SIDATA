<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customercare extends CI_Controller 
{
    public function index()
    {
        $data['title'] = 'Candidat';
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        // Tampil view
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('customercare/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function customer()
    {
        $data['title'] = 'Customer';
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        // Tampil view
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('customercare/customer', $data);
        $this->load->view('templates/footer');
    }
}