<?php

class adminweb extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index() {
		$this->load->view('adminweb/login');
	}

	public function login() {

		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if ($this->form_validation->run()==FALSE) {

		$this->load->view('adminweb/login');

		}
		else {

			$data['username'] = $this->input->post('username');
			$data['password'] = $this->input->post('password');

			$this->admin_model->CekAdminLogin($data);

		}
	}

	public function home() {

		if($this->session->userdata("logged_in")!=="") {
			$this->template->load('template','adminweb/home');
		}
		else{
			redirect('adminweb');

		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect("adminweb");
	}







	//Awal Kategori
	public function kategori() {

		$data['data_kategori']= $this->admin_model->GetKategori();
		$this->template->load('template','adminweb/kategori/index',$data);
	}

	public function kategori_simpan()
    {

        $nama_kategori = $this->input->post("nama_kategori");
        if ($nama_kategori != "") {

            $cek = $this->admin_model->KategoriSama(strtoupper($nama_kategori));

            if ($cek->num_rows() > 0) {
                $success = "1";
            } else {
                $this->session->set_flashdata('berhasil', 'Kategori Berhasil Disimpan');
                $this->admin_model->KategoriSimpan($nama_kategori);
                $success = "0";
            }

            echo $success;
        }
        else{
            $this->session->set_flashdata('gagal', 'Kategori Gagal Disimpan');
            redirect("adminweb/kategori");
        }
    }

	public function kategori_edit() {
		$id_kategori = $this->uri->segment(3);
		$query = $this->admin_model->GetEditKategori($id_kategori);
		foreach ($query->result_array() as $tampil) {
			$data['id_kategori'] = $tampil['id_kategori'];
			$data['nama_kategori'] = $tampil['nama_kategori'];
		}

		$this->template->load('template','adminweb/kategori/edit',$data);
	}

	public function kategori_delete() {
		$id_kategori = $this->uri->segment(3);
		$this->admin_model->DeleteKategori($id_kategori);

		$this->session->set_flashdata('message','Kategori Berhasil Dihapus');
		redirect("adminweb/kategori");
	}

	public function kategori_update()
    {
        $id_kategori = $this->input->post('id_kategori');
        $nama_kategori = $this->input->post('nama_kategori');

        $cek = $this->admin_model->KategoriSama(strtoupper($nama_kategori));
        if ($nama_kategori != "") {
            if ($cek->num_rows() > 0) {
                $success = "1";
            } else {
                $this->session->set_flashdata('berhasil', 'Kategori Berhasil Disimpan');
                $this->admin_model->KategoriUpdate($id_kategori, $nama_kategori);
                $success = "0";
            }

            echo $success;
        }
        else{
            $this->session->set_flashdata('gagal', 'Kategori Gagal Disimpan');
            redirect("adminweb/kategori");
        }
    }
	//Akhir kategori



	//Awal Kota
	public function kota() {

		$data['data_kota']= $this->admin_model->GetKota();
		$this->template->load('template','adminweb/kota/index',$data);
	}

	public function kota_simpan()
    {
        $nama_kota = $this->input->post("nama_kota");
        $ongkir = $this->input->post("ongkir");
        $cek = $this->admin_model->KotaSama(strtoupper($nama_kota));
        if ($nama_kota != "" and     $ongkir != "") {
            if ($cek->num_rows() > 0) {
                $success = "1";
            } else {
                $this->session->set_flashdata('berhasil', 'Kota Berhasil Disimpan');
                $this->admin_model->KotaSimpan($nama_kota, $ongkir);
                $success = "0";
            }

            echo $success;
        }else{
            $this->session->set_flashdata('gagal', 'Kota Gagal Disimpan');
            redirect("adminweb/kota");
        }
    }

	public function kota_edit() {
		$id_kota = $this->uri->segment(3);
		$query = $this->admin_model->GetEditKota($id_kota);
		foreach ($query->result_array() as $tampil) {
			$data['id_kota'] = $tampil['id_kota'];
            $data['nama_kota'] = $tampil['nama_kota'];
            $data['ongkir'] = $tampil['ongkir'];
		}

		$this->template->load('template','adminweb/kota/edit',$data);
	}

	public function kota_delete() {
		$id_kota = $this->uri->segment(3);
		$this->admin_model->DeleteKota($id_kota);

		$this->session->set_flashdata('message','Kota Berhasil Dihapus');
		redirect("adminweb/kota");
	}

	public function kota_update()
    {
        $id_kota = $this->input->post('id_kota');
        $nama_kota = $this->input->post('nama_kota');
        $ongkir = $this->input->post('ongkir');
        if ($nama_kota != "" and $ongkir != "") {
            $cek = $this->admin_model->KotaSama(strtoupper($nama_kota));

            $query = $this->admin_model->GetEditKota($id_kota);
            $cek_ongkir = null;
            foreach ($query->result_array() as $tampil) {
                $cek_ongkir = $tampil['ongkir'];
            }

            if ($cek->num_rows() > 0) {

                if ($ongkir != $cek_ongkir) {
                    $this->session->set_flashdata('berhasil', 'Kota Berhasil Disimpan');
                    $this->admin_model->KotaUpdate($id_kota, $nama_kota, $ongkir);
                    $success = "0";

                } else {
                    $success = "1";
                }
            } else {
                $this->session->set_flashdata('berhasil', 'Kota Berhasil Disimpan');
                $this->admin_model->KotaUpdate($id_kota, $nama_kota, $ongkir);
                $success = "0";
            }

            echo $success;
        }else{
            $this->session->set_flashdata('gagal', 'Kota Gagal Disimpan');
            redirect("adminweb/kota");
        }
    }
	//Akhir Kota

	//Awal Bank
	public function bank() {

		$data['data_bank'] = $this->admin_model->GetBank();
		$this->template->load('template','adminweb/bank/index',$data);

	}

	public function bank_tambah() {

		$this->template->load('template','adminweb/bank/add');
	}

	public function bank_simpan() {


			$this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required');
			$this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'required');
			$this->form_validation->set_rules('no_rekening', 'No Rekening', 'required');

			if ($this->form_validation->run() == FALSE)
			{

				$this->template->load('template','adminweb/bank/add');
			}
			else {

				if(empty($_FILES['userfile']['name']))
				{

						$in_data['nama_bank'] = $this->input->post('nama_bank');
						$in_data['nama_pemilik'] = $this->input->post('nama_pemilik');
						$in_data['no_rekening'] = $this->input->post('no_rekening');
						$this->db->insert("tbl_bank",$in_data);

					$this->session->set_flashdata('berhasil','Bank Berhasil Disimpan');
					redirect("adminweb/bank");
				}
				else
				{
					$config['upload_path'] = './images/bank/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;
					$config['max_size']     = '3000';
					$config['max_width']  	= '3000';
					$config['max_height']  	= '3000';


					$this->load->library('upload', $config);

					if ($this->upload->do_upload("userfile")) {
						$data	 	= $this->upload->data();

						/* PATH */
						$source             = "./images/bank/".$data['file_name'] ;
						$destination_thumb	= "./images/bank/thumb/" ;
						$destination_medium	= "./images/bank/medium/" ;
						// Permission Configuration
						chmod($source, 0777) ;

						/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
						$this->load->library('image_lib') ;
						$img['image_library'] = 'GD2';
						$img['create_thumb']  = TRUE;
						$img['maintain_ratio']= TRUE;

						/// Limit Width Resize
						$limit_medium   = 800 ;
						$limit_thumb    = 270 ;

						// Size Image Limit was using (LIMIT TOP)
						$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;

						// Percentase Resize
						if ($limit_use > $limit_thumb) {
							$percent_medium = $limit_medium/$limit_use ;
							$percent_thumb  = $limit_thumb/$limit_use ;
						}

						//// Making THUMBNAIL ///////
						$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
						$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;

						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_thumb ;

						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;

						$img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
						$img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;

			 			// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_medium ;

						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;

						$in_data['nama_bank'] = $this->input->post('nama_bank');
						$in_data['nama_pemilik'] = $this->input->post('nama_pemilik');
						$in_data['no_rekening'] = $this->input->post('no_rekening');
						$in_data['gambar'] = $data['file_name'];


						$this->db->insert("tbl_bank",$in_data);



						$this->session->set_flashdata('berhasil','Bank Berhasil Disimpan');
						redirect("adminweb/bank");

					}
					else
					{
						$this->template->load('template','adminweb/bank/error');
					}
				}

			}

	}

	public function bank_delete() {
		$id_bank = $this->uri->segment(3);
		$this->admin_model->DeleteBank($id_bank);

		$this->session->set_flashdata('message','Bank Berhasil Dihapus');
		redirect('adminweb/bank');

	}

	public function bank_edit() {
		$id_bank = $this->uri->segment(3);
		$query = $this->admin_model->GetBankEdit($id_bank);
		foreach ($query->result_array() as $tampil) {
			$data['id_bank'] = $tampil['id_bank'];
			$data['nama_bank'] = $tampil['nama_bank'];
			$data['nama_pemilik'] = $tampil['nama_pemilik'];
			$data['no_rekening'] = $tampil['no_rekening'];
			$data['gambar'] = $tampil['gambar'];
		}
		$this->template->load('template','adminweb/bank/edit',$data);
	}

	public function bank_update() {
		$id['id_bank'] = $this->input->post("id_bank");

		if(empty($_FILES['userfile']['name']))
				{

						$in_data['nama_bank'] = $this->input->post('nama_bank');
						$in_data['nama_pemilik'] = $this->input->post('nama_pemilik');
						$in_data['no_rekening'] = $this->input->post('no_rekening');

						$this->db->update("tbl_bank",$in_data,$id);

					$this->session->set_flashdata('update','Bank Berhasil Diupdate');
					redirect("adminweb/bank");
				}
				else
				{
					$config['upload_path'] = './images/bank/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;
					$config['max_size']     = '3000';
					$config['max_width']  	= '260';
					$config['max_height']  	= '100';


					$this->load->library('upload', $config);

					if ($this->upload->do_upload("userfile")) {
						$data	 	= $this->upload->data();

						/* PATH */
						$source             = "./images/bank/".$data['file_name'] ;
						$destination_thumb	= "./images/bank/thumb/" ;
						$destination_medium	= "./images/bank/medium/" ;

						// Permission Configuration
						chmod($source, 0777) ;

						/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
						$this->load->library('image_lib') ;
						$img['image_library'] = 'GD2';
						$img['create_thumb']  = TRUE;
						$img['maintain_ratio']= TRUE;

						/// Limit Width Resize
						$limit_medium   = 90 ;
						$limit_thumb    = 60 ;

						// Size Image Limit was using (LIMIT TOP)
						$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;

						// Percentase Resize
						if ($limit_use > $limit_thumb) {
							$percent_medium = $limit_medium/$limit_use ;
							$percent_thumb  = $limit_thumb/$limit_use ;
						}

						//// Making THUMBNAIL ///////
						$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
						$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;

						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_thumb ;

						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;

						////// Making MEDIUM /////////////
						$img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
						$img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;

						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_medium ;

						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;

						$in_data['nama_bank'] = $this->input->post('nama_bank');
						$in_data['nama_pemilik'] = $this->input->post('nama_pemilik');
						$in_data['no_rekening'] = $this->input->post('no_rekening');
						$in_data['gambar'] = $data['file_name'];

						$this->db->update("tbl_bank",$in_data,$id);


						$this->session->set_flashdata('update','Bank Berhasil Diupdate');
						redirect("adminweb/bank");

					}
					else
					{
						$this->template->load('template','adminweb/bank/error');
					}
				}

	}
	//Akhir Bank



    //Awal Admin
    public function admin() {
        if($this->session->userdata("logged_in")!=="") {

            $query = $this->admin_model->GetAdmin();
            foreach ($query->result_array() as $tampil) {
                $data['id_admin'] = $tampil['id_admin'];
                $data['nama'] = $tampil['nama_admin'];
                $data['username'] = $tampil['username'];

            }
            $this->template->load('template','adminweb/admin/index',$data);
        }
        else {
            redirect("adminweb");
        }
    }


    public function admin_edit() {
        $id_admin =$this->input->post("id_admin");
        $nama =$this->input->post("nama");
        $username =$this->input->post("username");
        $password =md5($this->input->post("password"));


        $this->admin_model->AdminEdit($id_admin,$nama,$username,$password);
    }


    //Akhir Admin

    //Awal Admin
    public function users() {
        if($this->session->userdata("logged_in")!=="") {
            $data['data_users'] = $this->admin_model->GetUsers();
            $this->template->load('template','adminweb/users/index',$data);
        }
        else {
            redirect("adminweb");
        }
    }

    public function users_delete() {
        $id = $this->uri->segment(3);
        $this->admin_model->Deleteusers($id);

        $this->session->set_flashdata('message','Users Berhasil Dihapus');
        redirect('adminweb/users');
    }

    //Akhir User



	//Awal Produk
	public function produk () {

		$data['data_produk'] = $this->admin_model->GetProduk();
		$this->template->load('template','adminweb/produk/index',$data);
	}
	//Akhir Produk

	public function produk_tambah(){
		$data['kode_produk'] = $this->admin_model->GetMaxKodeProduk();
		$data['data_kategori'] = $this->admin_model->GetKategori();
		$this->template->load('template','adminweb/produk/add',$data);
	}

	public function produk_simpan() {
		$this->form_validation->set_rules('nama_produk','Nama Produk','required');
		$this->form_validation->set_rules('kategori_id','Kategori','required');
		$this->form_validation->set_rules('harga','Harga','required');
		$this->form_validation->set_rules('stok','Stok','required');
		$this->form_validation->set_rules('deskripsi','Deskripsi','required');

		if ($this->form_validation->run()==FALSE) {

			$data['kode_produk'] = $this->admin_model->GetMaxKodeProduk();
			$data['data_kategori'] = $this->admin_model->GetKategori();
			$this->template->load('template','adminweb/produk/add',$data);

		}
		else {

			if(empty($_FILES['userfile']['name']))
				{

						$in_data['kode_produk'] = $this->input->post('kode_produk');
						$in_data['nama_produk'] = $this->input->post('nama_produk');
						$in_data['harga'] = $this->input->post('harga');
						$in_data['stok'] = $this->input->post('stok');
						$in_data['deskripsi'] = $this->input->post('deskripsi');
						$in_data['kategori_id'] = $this->input->post('kategori_id');
						$this->db->insert("tbl_produk",$in_data);

					$this->session->set_flashdata('berhasil','Produk Berhasil Disimpan');
					redirect("adminweb/produk");
				}
				else
				{
					$config['upload_path'] = './images/produk/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;
					$config['max_size']     = '3000';
					$config['max_width']  	= '268';
					$config['max_height']  	= '249';


					$this->load->library('upload', $config);

					if ($this->upload->do_upload("userfile")) {
						$data	 	= $this->upload->data();

						/* PATH */
						$source             = "./images/produk/".$data['file_name'] ;
						$destination_thumb	= "./images/produk/thumb/" ;
						$destination_medium	= "./images/produk/medium/" ;
						// Permission Configuration
						chmod($source, 0777) ;

						/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
						$this->load->library('image_lib') ;
						$img['image_library'] = 'GD2';
						$img['create_thumb']  = TRUE;
						$img['maintain_ratio']= TRUE;

						/// Limit Width Resize
						$limit_medium   = 268 ;
						$limit_thumb    = 249 ;

						// Size Image Limit was using (LIMIT TOP)
						$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;

						// Percentase Resize
						if ($limit_use > $limit_thumb) {
							$percent_medium = $limit_medium/$limit_use ;
							$percent_thumb  = $limit_thumb/$limit_use ;
						}

						//// Making THUMBNAIL ///////
						$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
						$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;

						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_thumb ;

						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;

						$img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
						$img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;

			 			// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_medium ;

						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;

						$in_data['kode_produk'] = $this->input->post('kode_produk');
						$in_data['nama_produk'] = $this->input->post('nama_produk');
						$in_data['harga'] = $this->input->post('harga');
						$in_data['stok'] = $this->input->post('stok');
						$in_data['deskripsi'] = $this->input->post('deskripsi');
						$in_data['kategori_id'] = $this->input->post('kategori_id');
						$in_data['gambar'] = $data['file_name'];



						$this->db->insert("tbl_produk",$in_data);





						$this->session->set_flashdata('berhasil','Produk Berhasil Disimpan');
						redirect("adminweb/produk");

					}
					else
					{
						$this->template->load('template','adminweb/produk/error');
					}
				}

		}
	}

	public function produk_delete() {
		$id_produk = $this->uri->segment(3);
		$this->admin_model->DeleteProduk($id_produk);

		$this->session->set_flashdata('message','Produk Berhasil Dihapus');
		redirect('adminweb/produk');

	}

	public function produk_edit() {
		$id_produk = $this->uri->segment(3);
		$query = $this->admin_model->EditProduk($id_produk);
		foreach ($query->result_array() as $tampil) {

			$data['id_produk']= $tampil['id_produk'];
			$data['kode_produk']= $tampil['kode_produk'];
			$data['nama_produk']= $tampil['nama_produk'];
			$data['harga']= $tampil['harga'];
			$data['stok']= $tampil['stok'];
			$data['deskripsi']= $tampil['deskripsi'];
			$data['kategori_id']= $tampil['kategori_id'];

		}
		$data['data_kategori'] = $this->admin_model->GetKategori();
		$this->template->load('template','adminweb/produk/edit',$data);
	}

	public function produk_update() {
		$id['id_produk'] = $this->input->post("id_produk");

		if(empty($_FILES['userfile']['name']))
				{

						$in_data['kode_produk'] = $this->input->post('kode_produk');
						$in_data['nama_produk'] = $this->input->post('nama_produk');
						$in_data['harga'] = $this->input->post('harga');
						$in_data['stok'] = $this->input->post('stok');
						$in_data['deskripsi'] = $this->input->post('deskripsi');
						$in_data['kategori_id'] = $this->input->post('kategori_id');

						$this->db->update("tbl_produk",$in_data,$id);

					$this->session->set_flashdata('update','Produk Berhasil Diupdate');
					redirect("adminweb/produk");
				}
				else
				{
					$config['upload_path'] = './images/produk/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;
					$config['max_size']     = '3000';
					$config['max_width']  	= '268';
					$config['max_height']  	= '249';


					$this->load->library('upload', $config);

					if ($this->upload->do_upload("userfile")) {
						$data	 	= $this->upload->data();

						/* PATH */
						$source             = "./images/produk/".$data['file_name'] ;
						$destination_thumb	= "./images/produk/thumb/" ;
						$destination_medium	= "./images/produk/medium/" ;

						// Permission Configuration
						chmod($source, 0777) ;

						/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
						$this->load->library('image_lib') ;
						$img['image_library'] = 'GD2';
						$img['create_thumb']  = TRUE;
						$img['maintain_ratio']= TRUE;

						/// Limit Width Resize
						$limit_medium   = 268 ;
						$limit_thumb    = 249 ;

						// Size Image Limit was using (LIMIT TOP)
						$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;

						// Percentase Resize
						if ($limit_use > $limit_thumb) {
							$percent_medium = $limit_medium/$limit_use ;
							$percent_thumb  = $limit_thumb/$limit_use ;
						}

						//// Making THUMBNAIL ///////
						$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
						$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;

						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_thumb ;

						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;

						////// Making MEDIUM /////////////
						$img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
						$img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;

						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_medium ;

						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;

						$in_data['kode_produk'] = $this->input->post('kode_produk');
						$in_data['nama_produk'] = $this->input->post('nama_produk');
						$in_data['harga'] = $this->input->post('harga');
						$in_data['stok'] = $this->input->post('stok');
						$in_data['deskripsi'] = $this->input->post('deskripsi');
						$in_data['kategori_id'] = $this->input->post('kategori_id');
						$in_data['gambar'] = $data['file_name'];

						$this->db->update("tbl_produk",$in_data,$id);


						$this->session->set_flashdata('update','Produk Berhasil Diupdate');
						redirect("adminweb/produk");

					}
					else
					{
						$this->template->load('template','adminweb/produk/error');
					}
				}

	}

	//Akhir Produk


	//Awal pesan
	public function pesan() {

		if($this->session->userdata("logged_in")!=="") {

			$data['data_pesan'] = $this->admin_model->GetPesan();

			$this->template->load('template','adminweb/pesan/index',$data);
		}
		else {
			redirect("adminweb");
		}
	}

	public function pesan_hapus() {

		$id = $this->uri->segment(3);
		$this->admin_model->DeletePesan($id);

		$this->session->set_flashdata('message','Pesan Berhasil Dihapus');
		redirect("adminweb/pesan");
	}

	public function pesan_detail() {

		$id = $this->uri->segment(3);
		$status ="1";
		$query = $this->admin_model->DetailPesan($id);
		foreach ($query->result_array() as $tampil) {
			$data['id_pesan'] = $tampil['id_pesan'];
			$data['nama'] = $tampil['nama'];
			$data['email'] = $tampil['email'];
			$data['hp'] = $tampil['hp'];
			$data['alamat'] = $tampil['alamat'];
			$data['pesan'] = $tampil['pesan'];
			$data['tanggal'] = $tampil['tanggal'];
		}

		$this->admin_model->UpdateStatusPesan($status,$id);

		$this->template->load('template','adminweb/pesan/detail',$data);
	}

	public function pesan_balas() {
		if($this->session->userdata("logged_in")!=="") {



			$id = $this->uri->segment(3);
			$query = $this->admin_model->DetailPesan($id);
			foreach ($query->result_array() as $tampil) {
				$data['id_pesan'] = $tampil['id_pesan'];
				$data['nama'] = $tampil['nama'];
				$data['email'] = $tampil['email'];
				$data['hp'] = $tampil['hp'];
				$data['alamat'] = $tampil['alamat'];
				$data['pesan'] = $tampil['pesan'];
				$data['tanggal'] = $tampil['tanggal'];
			}

			$this->template->load('template','adminweb/pesan/balas',$data);
		}
		else {
			redirect("adminweb");
		}
	}

	public function pesan_balas_simpan() {
        $config = [
            'useragent' => 'CodeIgniter',
            'protocol'  => 'smtp',
            'mailpath'  => '/usr/sbin/sendmail',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_user' => 'celcosiven@gmail.com',   // Ganti dengan email gmail Anda.
            'smtp_pass' => 'LUP@PASSWORD21',             // Password gmail Anda.
            'smtp_port' => 465,
            'smtp_keepalive' => TRUE,
            'smtp_crypto' => 'SSL',
            'wordwrap'  => TRUE,
            'wrapchars' => 80,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'validate'  => TRUE,
            'crlf'      => "\r\n",
            'newline'   => "\r\n",
        ];
		$email = $this->input->post("email");
		$judul = $this->input->post("judul");
		$isi_pesan_terkirim = $this->input->post("isi_pesan_terkirim");

		$this->admin_model->SimpanPesanAdd($email,$judul,$isi_pesan_terkirim);

		$this->load->library('email', $config);
		$this->email->from('celcosiven@gmail.com', 'Muhamad Rezki');
		$this->email->to($email);
		$this->email->subject($judul);
		$this->email->message($isi_pesan_terkirim);
		$this->email->send();
	}


	public function pesan_add() {
		if($this->session->userdata("logged_in")!=="") {

			$this->template->load('template','adminweb/pesan/add');
		}
		else {
			redirect("adminweb");
		}
	}

	public function pesan_add_simpan() {
        $config = [
            'useragent' => 'CodeIgniter',
            'protocol'  => 'smtp',
            'mailpath'  => '/usr/sbin/sendmail',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_user' => 'celcosiven@gmail.com',   // Ganti dengan email gmail Anda.
            'smtp_pass' => 'LUP@PASSWORD21',             // Password gmail Anda.
            'smtp_port' => 465,
            'smtp_keepalive' => TRUE,
            'smtp_crypto' => 'SSL',
            'wordwrap'  => TRUE,
            'wrapchars' => 80,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'validate'  => TRUE,
            'crlf'      => "\r\n",
            'newline'   => "\r\n",
        ];
		$email = $this->input->post("email");
		$judul = $this->input->post("judul");
		$isi_pesan_terkirim = $this->input->post("isi_pesan_terkirim");

		$this->admin_model->SimpanPesanAdd($email,$judul,$isi_pesan_terkirim);

		$this->load->library('email', $config);
		$this->email->from('celcosiven@gmail.com', 'Muhamad Rezki');
		$this->email->to($email);
		$this->email->subject($judul);
		$this->email->message($isi_pesan_terkirim);
		$this->email->send();
	}

	public function pesan_kirim() {

		if($this->session->userdata("logged_in")!=="") {

			$data['data_pesan_kirim'] = $this->admin_model->GetPesanKirim();

			$this->template->load('template','adminweb/pesan/kirim',$data);
		}
		else {
			redirect("adminweb");
		}
	}

	public function pesan_kirim_hapus() {

		$id = $this->uri->segment(3);
		$this->admin_model->DeletePesanKirim($id);

		$this->session->set_flashdata('message','Pesan Berhasil Dihapus');
		redirect("adminweb/pesan_kirim");
	}

	public function pesan_kirim_detail() {

		$id = $this->uri->segment(3);
		$query = $this->admin_model->DetailPesanKirim($id);
		foreach ($query->result_array() as $tampil) {
			$data['id_pesan_terkirim'] = $tampil['id_pesan_terkirim'];
			$data['kepada'] = $tampil['kepada'];
			$data['judul'] = $tampil['judul'];
			$data['isi_pesan_terkirim'] = $tampil['isi_pesan_terkirim'];

		}


		$this->template->load('template','adminweb/pesan/detail_kirim',$data);
	}
	//Akhir pesan


	public function transaksi() {


		if($this->session->userdata("logged_in")!=="") {

			$data['data_transaksi'] = $this->admin_model->GetTransaksi();

			$this->template->load('template','adminweb/transaksi/index',$data);
		}
		else {
			redirect("adminweb");
		}

	}

    public function transaksi_proses () {

        if($this->session->userdata("logged_in")!=="") {

            $id  = $this->uri->segment(3);

            $this->admin_model->UpdateTransaksiHeader($id,'1');

            $this->session->set_flashdata('berhasil','Transaksi Berhasil Di Proses');
            redirect("adminweb/transaksi");




        }
        else {
            redirect("adminweb");
        }

    }
    public function transaksi_tolak () {

        if($this->session->userdata("logged_in")!=="") {

            $id  = $this->uri->segment(3);

            $this->admin_model->UpdateTransaksiHeader($id,'3');

            $this->session->set_flashdata('tolak','Transaksi Berhasil Di Proses');
            redirect("adminweb/transaksi");




        }
        else {
            redirect("adminweb");
        }

    }

	public function transaksi_detail () {

		if($this->session->userdata("logged_in")!=="") {

			$id  			= $this->uri->segment(3);
			$kode_transaksi = $this->uri->segment(4);

			$data['data_header'] 	= $this->admin_model->GetTransaksiheader($id);
			$data['data_detail']	= $this->admin_model->GetDetailTransaksi($kode_transaksi);
            $data['data_total']		= $this->admin_model->GetDetailTotal($kode_transaksi);
            $data['detail_byr']		= $this->admin_model->GetDetailPembayaran($kode_transaksi);

			$this->template->load('template','adminweb/transaksi/detail',$data);

		}
		else {
			redirect("adminweb");
		}

	}

	public function semua_transaksi () {

		if($this->session->userdata("logged_in")!=="") {

			$data['data_transaksi'] = $this->admin_model->GetTransaksiSudah();

			$this->template->load('template','adminweb/transaksi/sudah',$data);


		}
		else {
			redirect("adminweb");
		}

	}

	public function semua_transaksi_detail () {

		if($this->session->userdata("logged_in")!=="") {

			$id  			= $this->uri->segment(3);
			$kode_transaksi = $this->uri->segment(4);

			$data['data_header'] 	= $this->admin_model->GetTransaksiheader($id);
			$data['data_detail']	= $this->admin_model->GetDetailTransaksi($kode_transaksi);
			$data['data_total']		= $this->admin_model->GetDetailTotal($kode_transaksi);
            $data['detail_byr']		= $this->admin_model->GetDetailPembayaran($kode_transaksi);
			$this->template->load('template','adminweb/transaksi/detail_semua',$data);

		}
		else {
			redirect("adminweb");
		}

	}
    public function transaksi_ditolak()
    {


        if ($this->session->userdata("logged_in") !== "") {

            $data['data_transaksi'] = $this->admin_model->GetTransaksiTolak();

            $this->template->load('template', 'adminweb/transaksi/gagal', $data);


        } else {
            redirect("adminweb");
        }
    }

}