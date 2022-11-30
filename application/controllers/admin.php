<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }


    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/user_header', $data);
        $this->load->view('templates/user_sidebar', $data);
        $this->load->view('templates/user_topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/user_footer');
    }


    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user_header', $data);
            $this->load->view('templates/user_sidebar', $data);
            $this->load->view('templates/user_topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/user_footer');
        } else {
            $this->db->insert('user_role', ['role' => $this->input->post('role')]);
            redirect('admin/role');
        }
    }


    public function roleaccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/user_header', $data);
        $this->load->view('templates/user_sidebar', $data);
        $this->load->view('templates/user_topbar', $data);
        $this->load->view('admin/roleaccess', $data);
        $this->load->view('templates/user_footer');
    }


    public function changeaccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
    }

    public function roleedit()
    {

        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');

        $this->load->view('templates/user_header', $data);
        $this->load->view('templates/user_sidebar', $data);
        $this->load->view('templates/user_topbar', $data);
        $this->load->view('admin/roleedit', $data);
        $this->load->view('templates/user_footer');
    }

    public function roleeditAksi()
    {
        $id = $this->input->post('id');
        $role = $this->input->post('role');
        $data = [
            'role' => $role
        ];

        $this->db->set('role', $role);
        $this->db->where('id', $id);
        // $this->db->get_where('user_role', $data);
        $this->db->update('user_role', $data);

        if ($this->db->affected_rows()) {
            redirect('admin/role');
        } else {
            redirect('admin/roleedit');
        }
    }



    public function userakun()
    {
        $data['title'] = 'Account Member';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $data['akun'] = $this->db->get('user')->result_array();

        $data['admin'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/user_header', $data);
        $this->load->view('templates/user_sidebar', $data);
        $this->load->view('templates/user_topbar', $data);
        $this->load->view('admin/userakun', $data);
        $this->load->view('templates/user_footer');
    }

    //hapus Account Member
    public function hapus_user($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
        redirect('admin/userakun');
    }

    //hapus Account role
    public function hapus_role($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_role');
        redirect('admin/role');
    }



    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			You have been logged out!</div>');
        redirect('home');
    }
}


// public function userakunEdit($id)
    // {
    //     $data['title'] = 'Account Member';
    //     $data['user'] = $this->db->get_where('user', ['email' =>
    //     $this->session->userdata('email')])->row_array();


    //     $data['akun'] = $this->db->get('user')->result_array();

    //     $data['admin'] = $this->db->get('user_role')->result_array();

    //     $this->load->view('templates/user_header', $data);
    //     $this->load->view('templates/user_sidebar', $data);
    //     $this->load->view('templates/user_topbar', $data);
    //     $this->load->view('admin/userakun', $data);
    //     $this->load->view('templates/user_footer');

    //     $id = $this->input->post('id');
    //     $role = $this->input->post('role');
    //     $data = [
    //         'role' => $role
    //     ];

    //     $this->db->set('user', $role);
    //     $this->db->where('id', $id);
    //     // $this->db->get_where('user_role', $data);
    //     $this->db->update('user_role', $data);

    //     if ($this->db->affected_rows()) {
    //         redirect('admin/role');
    //     } else {
    //         redirect('admin/roleedit');
    //     }
    // }

    // $this->form_validation->set_rules('title', 'Title', 'required');
    // $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    // $this->form_validation->set_rules('url', 'Url', 'required');
    // $this->form_validation->set_rules('icon', 'Icon', 'required');

    // if ($this->form_validation->run() == false) {
    //     $this->load->view('templates/user_header', $data);
    //     $this->load->view('templates/user_sidebar', $data);
    //     $this->load->view('templates/user_topbar', $data);
    //     $this->load->view('menu/submenu', $data);
    //     $this->load->view('templates/user_footer');
    // } else {
    //     $data = [
    //         'title' => $this->input->post('title'),
    //         'menu_id' => $this->input->post('menu_id'),
    //         'url' => $this->input->post('url'),
    //         'icon' => $this->input->post('icon'),
    //         'is_active' => $this->input->post('is_active'),
    //     ];
    //     $this->db->insert('user_sub_menu', $data);
    //     redirect('menu/submenu');
    // }



    // public function accountuser_edit()
    // {
    //     $data['title'] = 'Account User';
    //     $data['user'] = $this->db->get_where('user', ['email' =>
    //     $this->session->userdata('email')])->row_array();

    //     $this->form_validation->set_rules('name', 'Title', 'required');
    //     $this->form_validation->set_rules('email', 'Menu', 'required');
    //     $this->form_validation->set_rules('image', 'Url', 'required');
    //     $this->form_validation->set_rules('password', 'Icon', 'required');

    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('templates/user_header', $data);
    //         $this->load->view('templates/user_sidebar', $data);
    //         $this->load->view('templates/user_topbar', $data);
    //         $this->load->view('admin/userakun', $data);
    //         $this->load->view('templates/user_footer');
    //     } else {
    //         $image = $_FILES['image']['name'];
    //         $name = $this->input->post('name');
    //         $email = $this->input->post('email');
    //         $password = $this->input->post('password');
    //         $id = $this->input->post('id');

    //         if ($image) {
    //             $config['allowed_types'] = 'png|jpg|gif';
    //             $config['max_size']      = '4048';
    //             // $config['max_width'] = '300';
    //             // $config['max_height'] = '100';
    //             $config['upload_path']   = './assets/img/profile/';

    //             $this->load->library('upload', $config);

    //             if (!$this->upload->do_upload('image')) {
    //                 echo $this->upload->display_errors();
    //             } else {
    //                 $data = [
    //                     'name' => $name,
    //                     'email' => $email,
    //                     'image' => $image,
    //                     'password' => $password
    //                 ];

    //                 $this->db->set('email', $email);
    //                 $this->M_produk->update_produk($data, $id);

    //                 if ($this->db->affected_rows()) {
    //                     redirect('admin/userakun');
    //                 } else {
    //                     redirect('admin/userakun');
    //                 }
    //             }
    //         } else if ($password || $email || $name || $image) {
    //             $imageOld = $this->input->post('image');
    //             // $this->db->get_where('user_crud', array('name_foto' => $name_foto));
    //             // $ID = join(',', $id)

    //             $data = [
    //                 'name' => $name,
    //                 'email' => $email,
    //                 'image' => $imageOld,
    //                 'password' => $password
    //             ];

    //             $this->db->set('email', $email);
    //             $this->db->where('id', $id);
    //             $this->db->update('user', $data);
    //             // $this->M_produk->update_produk($data);

    //             if ($this->db->affected_rows()) {
    //                 redirect('admin/userakun');
    //             } else {
    //                 redirect('admin/userakun');
    //             }
    //         }
    //     }
    // }

    // tmbah user dari admin
    // public function accountuser_tambah()
    // {
    //     $data['title'] = 'Account User';
    //     $data['user'] = $this->db->get_where('user', ['email' =>
    //     $this->session->userdata('email')])->row_array();

    //     // $this->load->model('menu_model', 'menu');

    //     // $data['subMenu'] = $this->menu->getSubmenu();
    //     // $data['menu'] = $this->db->get('user_menu')->result_array();


    //     $this->load->model('menu_model', 'menu');

    //     $data['akun'] = $this->accountuser_tambah();
    //     $data['menu'] = $this->db->get('user_role')->result_array();

    //     $this->form_validation->set_rules('name', 'Title', 'required');
    //     $this->form_validation->set_rules('email', 'Menu', 'required');
    //     $this->form_validation->set_rules('image', 'Url', 'required');
    //     $this->form_validation->set_rules('password', 'Icon', 'required');


    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('templates/user_header', $data);
    //         $this->load->view('templates/user_sidebar', $data);
    //         $this->load->view('templates/user_topbar', $data);
    //         $this->load->view('admin/userakun', $data);
    //         $this->load->view('templates/user_footer');
    //     } else {
    //         $image = $_FILES['image']['name'];
    // $name = $this->input->post('name');
    // $email = $this->input->post('email');
    // $password = $this->input->post('password');

    //         if ($image) {
    //             $config['allowed_types'] = 'png|jpg|gif';
    //             $config['max_size']      = '4048';
    //             // $config['max_width'] = '400';
    //             // $config['max_height'] = '400';
    //             $config['upload_path']   = './assets/img/profile/';

    //             $this->load->library('upload', $config);

    //             if (!$this->upload->do_upload('image')) {
    //                 echo $this->upload->display_errors();
    //                 redirect('admin/userakun');
    //             } else {
    // $data = [
    //     'name' => $this->input->post('name'),
    //     'email' => $this->input->post('email'),
    //     'image' => $image,
    //     'password' => $this->input->post('password')
    // ];

    //                 $this->db->insert('user', $data);
    //                 if ($this->db->affected_rows()) {
    //                     redirect('admin/userakun');
    //                 } else {
    //                     redirect('admin/userakun');
    //                 }
    //             }
    //         } else if (($password && $email && $name) || $image) {
    //             $fotoNull = null;
    //             $data = [
    //                 'name' => $this->input->post('name'),
    //                 'email' => $this->input->post('email'),
    //                 'image' => $fotoNull,
    //                 'password' => $this->input->post('password')
    //             ];

    //             $this->db->insert('user', $data);
    //             if ($this->db->affected_rows()) {
    //                 redirect('admin/userakun');
    //             } else {
    //                 redirect('admin/userakun');
    //             }
    //         }
    //     }
    // }
