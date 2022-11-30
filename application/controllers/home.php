<?php
defined('BASEPATH') or exit('No direct script access allowed');

class home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_produk');
    }

    public function index()
    {
        // if ($this->session->userdata('views')) {
        //     redirect('crud');
        // }

        $data['title'] = 'Nostra Gallery - Gallery Kita Semua';
        $this->load->view('home/index', $data);
    }

    public function home1() //waktu input create galeri
    {

        $data['title'] = 'Nostra Gallery - Gallery Kita Semua';
        $this->load->view('home/home1', $data);
    }

    public function tambah_gallery() //*
    {
        // $this->form_validation->set_rules('name_gallery', 'Name_gallery', 'required|trim|max_length[20]');
        // $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|max_length[30]');
        // ./assets/img/galeri/
        $data['title'] = 'Form Tambah';
        $this->load->view('home/form_tambah_gallery', $data);
    }

    public function aksi_simpan_gallery()
    {
        $this->form_validation->set_rules('name_gallery', 'Name_gallery', 'required|trim|max_length[450]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Form Tambah';
            $this->load->view('home/form_tambah_gallery', $data);
        } else {
            $name_gallery = $this->input->post('name_gallery');
            $deskripsi = $this->input->post('deskripsi');
            $name_foto = $_FILES['name_foto']['name'];

            if ($name_foto) {
                $config['allowed_types'] = 'png|jpg|gif';
                $config['max_size']      = '4048';
                // $config['max_width'] = '400';
                // $config['max_height'] = '400';
                $config['upload_path']   = './assets/img/galeri/';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('name_foto')) {
                    echo $this->upload->display_errors();
                    redirect('home/tambah_gallery');
                } else {
                    $data = array(
                        'name_gallery' => $name_gallery,
                        'name_foto' => $name_foto,
                        'deskripsi' => $deskripsi
                    );

                    $this->M_produk->insert_produk($data);
                    if ($this->db->affected_rows()) {
                        redirect('home/crud');
                    } else {
                        redirect('home/tambah_gallery');
                    }
                }
            } else if (($deskripsi && $name_gallery) || $deskripsi || $name_gallery) {
                $name_fotoNull = null;
                $data = array(
                    'name_gallery' => $name_gallery,
                    'name_foto' => $name_fotoNull,
                    'deskripsi' => $deskripsi
                );
                $this->M_produk->insert_produk($data);
                if ($this->db->affected_rows()) {
                    redirect('home/crud');
                } else {
                    redirect('home/tambah_gallery');
                }
            }
        }
    }


    public function crud() //*
    {
        $data['title'] = 'Nostra Gallery - Gallery Kita Semua';
        $data['user_crud'] = $this->M_produk->get_produk()->result_array();
        $this->load->view('home/crud', $data);
    }



    public function edit($id) //*
    {
        $data['title'] = 'Form Edit';
        $data['user_crud'] = $this->M_produk->get_data_by_id($id)->row_array();
        $this->load->view('home/form_edit', $data);
    }

    public function aksi_edit()
    {
        $name_gallery = $this->input->post('name_gallery');
        $deskripsi = $this->input->post('deskripsi');
        $name_foto = $_FILES['name_foto']['name'];
        // $name_foto = $this->input->post('name_foto');

        $id = $this->input->post('id');

        if ($name_foto) {
            $config['allowed_types'] = 'png|jpg|gif';
            $config['max_size']      = '4048';
            // $config['max_width'] = '300';
            // $config['max_height'] = '100';
            $config['upload_path']   = './assets/img/galeri/';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('name_foto')) {
                echo $this->upload->display_errors();
            } else {
                $data = array(
                    'name_gallery' => $name_gallery,
                    'name_foto' => $name_foto,
                    'deskripsi' => $deskripsi
                );

                $this->db->set('name_gallery', $name_gallery);
                $this->M_produk->update_produk($data, $id);

                if ($this->db->affected_rows()) {
                    redirect('home/crud');
                } else {
                    redirect('home/tambah_gallery');
                }
            }
        } else if (($deskripsi && $name_gallery) || $deskripsi || $name_gallery) {
            $name_fotoOld = $this->input->post('name_foto');
            // $this->db->get_where('user_crud', array('name_foto' => $name_foto));
            $id = $this->input->post('id');
            // $ID = join(',', $id)

            $data = array(
                'name_gallery' => $name_gallery,
                'name_foto' => $name_fotoOld,
                'deskripsi' => $deskripsi
            );

            $this->db->set('name_gallery', $name_gallery);
            $this->db->where('id', $id);
            $this->db->update('user_crud', $data);
            // $this->M_produk->update_produk($data);

            if ($this->db->affected_rows()) {
                redirect('home/crud');
            } else {
                redirect('home/edit');
            }
        }
    }



    public function hapus($id)
    {
        $this->M_produk->hapus_produk($id);
        if ($this->db->affected_rows()) {
            redirect('home/crud');
        } else {
            echo "Data gagal dihapus";
        }
    }

    // public function logout()
    // {
    //     $this->session->unset_userdata('name_gallery');
    //     $this->session->unset_userdata('role_id');

    //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    // 		You have been logged out!</div>');
    //     redirect('home/home1');
    // }



    // public function tambah_produk()
    // {
    //     $this->load->view('home/form_tambah');
    // }

    // public function aksi_simpan()
    // {
    //     $name_gallery = $this->input->post('name_gallery');
    //     $name_foto = $_FILES['name_foto']['name'];
    //     $deskripsi = $this->input->post('deskripsi');

    //     $this->form_validation->set_rules('name_gallery', 'Name_gallery', 'required|trim|max_length[20]');
    //     $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|max_length[30]');

    //     if ($this->form_validation->run() == false) {
    //         $data['title'] = 'Nostra Gallery - Gallery Kita Semua';
    //         $this->load->view('home/home1', $data);
    //     } else {
    //         $config['allowed_types'] = 'png|jpg|gif|jpeg';
    //         $config['max_size']      = '4048';
    //         $config['upload_path']   = './assets/img/galeri/';

    //         $this->load->library('upload', $config);
    //         if (!$this->upload->do_upload('name_foto')) {
    //             echo $this->upload->display_errors();
    //         } else {
    //             $data = array(
    //                 'name_gallery' => $name_gallery,
    //                 'name_foto' => $name_foto,
    //                 'deskripsi' => $deskripsi
    //             );

    //             $this->M_produk->insert_produk($data);
    //             if ($this->db->affected_rows()) {
    //                 redirect('home/crud');
    //             } else {
    //                 redirect('home/tambah_produk');
    //             }
    //         }
    //     }
    // }




    // public function update()
    // {
    //     $old_name_foto = $this->input->post('name_foto');
    //     $new_name_foto = $_FILES['new_name_foto']['name'];
    //     $id = $this->input->post('id');

    //     if ($new_name_foto == true) {
    //         $update_filename = time() . "-" . str_replace(' ', '-', $_FILES['name_foto']['name']);

    //         $config['allowed_types'] = 'png|jpg|gif|jpeg';
    //         $config['max_size']      = '4048';
    //         $config['upload_path']   = './assets/img/galeri/';

    //         $this->load->library('upload', $config);

    //         if ($this->upload->do_upload('new_name_foto')) {
    //             if (file_exists("./assets/img/galeri/" . $old_name_foto)) {
    //                 unlink('./assets/img/galeri/' . $old_name_foto);
    //             }
    //         } else {
    //             $update_filename = $old_name_foto;
    //         }
    //         $data = array(
    //             'name_gallery' => $this->input->post('name_gallery'),
    //             'name_foto' => $update_filename,
    //             'deskripsi' => $this->input->post('deskripsi')
    //         );

    //         $product = new M_produk;
    //         $res = $product->update_produk($data, $id);
    //         redirect(base_url('home/crud/' . $id));
    //     } else {
    //         return $this->edit($id);
    //     }
    // }






    // $this->db->set('name_gallery', $name_gallery);

    //         $this->M_produk->update_produk($data, $id);
    //         if ($this->db->affected_rows()) {
    //             redirect('home/crud');
    //         } else {
    //             redirect('home/edit');
    //         }
    //     } else {
    //         $upload_data = $this->upload->data();
    //         $name = $upload_data['file_name'];

    //         $data = array(
    //             'name_gallery' => $name_gallery,
    //             'name_foto' => $name,
    //             'deskripsi' => $deskripsi
    //         );

    //         $this->db->set('name_gallery', $name_gallery);

    //         $this->M_produk->update_produk($data, $id);
    //         if ($this->db->affected_rows()) {
    //             redirect('home/crud');
    //         } else {
    //             redirect('home/edit');
    //         }
    //     }
    // }

    // $name_gallery = $this->input->post('name_gallery');
    // $deskripsi = $this->input->post('deskripsi');
    // $name_foto = $this->input->post('name_foto');

    // $id = $this->input->post('id');
    // $data = $this->M_produk->get_data_by_id($id)->row();

    // $nama = './assets/img/galeri/' . $data->name_foto;
    // var_dump($nama);
    // die;

    // if (is_readable($nama) && unlink($nama)) {
    //     $config['allowed_types'] = 'png|jpg|gif|jpeg';
    //     $config['max_size']      = '4048';
    //     $config['upload_path']   = './assets/img/galeri/';

    //     $this->load->library('upload', $config);
    //     if (!$this->upload->do_upload('name_foto')) {
    //         $data = array(
    //             'name_gallery' => $name_gallery,
    //             'name_foto' => $name_foto,
    //             'deskripsi' => $deskripsi
    //         );

    //         $this->db->set('name_gallery', $name_gallery);

    //         $this->M_produk->update_produk($data, $id);
    //         if ($this->db->affected_rows()) {
    //             redirect('home/crud');
    //         } else {
    //             redirect('home/edit');
    //         }
    //     } else {
    //         $upload_data = $this->upload->data();
    //         $name = $upload_data['file_name'];

    //         $data = array(
    //             'name_gallery' => $name_gallery,
    //             'name_foto' => $name,
    //             'deskripsi' => $deskripsi
    //         );

    //         $this->db->set('name_gallery', $name_gallery);

    //         $this->M_produk->update_produk($data, $id);
    //         if ($this->db->affected_rows()) {
    //             redirect('home/crud');
    //         } else {
    //             redirect('home/edit');
    //         }
    //     }
    // }





    // if ($upload_image) {
    //     $config['allowed_types'] = 'png|jpg|gif|jpeg';
    //     $config['max_size']      = '4048';
    //     $config['upload_path']   = './assets/img/galeri/';

    //     $this->load->library('upload', $config);

    //     if (!$this->upload->do_upload('name_foto')) {
    //         echo $this->upload->display_errors();
    //     } else {
    //         $def_image = $data['user_crud']['name_foto'];

    //         if ($def_image != 'default.png') {
    //             unlink(FCPATH . 'assets/img/galeri/' . $def_image);
    //         }

    //         $new_image = $this->upload->data('file_name');
    //         $this->db->set('name_foto', $new_image);
    //     }

    //     $this->db->set('name_gallery', $name_gallery);

    //     $this->M_produk->update_produk($data, $id);
    //     if ($this->db->affected_rows()) {
    //         redirect('home/crud');
    //     } else {
    //         redirect('home/edit');
    //     }
    // }


}
