<?php

class home extends CI_controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('home_model');

    }

	public function index() {
		$data['bank'] 			= $this->home_model->GetBank();
		 
		$data['kategori'] 		= $this->home_model->GetKategori(); 
		$data['produk']			= $this->home_model->GetProduk();
		$data['random']			= $this->home_model->GetRandomProduk();
		$data['random_active']	= $this->home_model->GetRandomActiveProduk();


		$this->load->view('home/index',$data);
	}

	public function login() {
        if($this->session->userdata("logged_user")!="LoginOke") {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == FALSE) {

                $data['bank'] = $this->home_model->GetBank();
                $data['kategori'] = $this->home_model->GetKategori();
                $data['produk'] = $this->home_model->GetProduk();
                $data['random'] = $this->home_model->GetRandomProduk();
                $data['random_active'] = $this->home_model->GetRandomActiveProduk();


                $this->load->view('home/login', $data);

            } else {

                $data['username'] = $this->input->post('username');
                $data['password'] = $this->input->post('password');

                $this->home_model->CekHomeLogin($data);

            }
        }
        else{
            redirect("home");
        }
	}

    public function logout() {
        $this->session->sess_destroy();
        ?>
        <script type="text/javascript">
            alert("Anda Telah Berhasil Logout!");
        </script>
        <?php
        echo "<meta http-equiv='refresh' content='0; url=".base_url()."home'>";
    }

    public function daftar() {

		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if ($this->form_validation->run()==FALSE) {

		$data['bank'] 			= $this->home_model->GetBank();
		$data['kategori'] 		= $this->home_model->GetKategori();
		$data['produk']			= $this->home_model->GetProduk();
		$data['random']			= $this->home_model->GetRandomProduk();
		$data['random_active']	= $this->home_model->GetRandomActiveProduk();

		$data['kota']	= $this->home_model->GetKota();
		$this->load->view('home/daftar',$data);

		}
	}
		public function daftar_kirim() {

		$nama 		= $this->input->post('nama_users');
		$username 	= $this->input->post('username');
		$email 		= $this->input->post('email');
		$password	= md5($this->input->post('password'));
		$phone 		= $this->input->post('phone');
		$alamat 	= $this->input->post('alamat');
		$kode_pos	= $this->input->post('kode_pos');
		$provinsi	= $this->input->post('provinsi');
		$kota 		= $this->input->post('kota');

            $cek = $this->home_model->UsersSama($username);

            if ($cek->num_rows() > 0) {
                ?>
                <script type="text/javascript">
                    alert("Pendaftaran Gagal, Username yang anda gunakan telah ada. Silahkan gunakan username lain\nTerima Kasih");
                </script>
                <?php
                echo "<meta http-equiv='refresh' content='0; url=".base_url()."home/login'>";
            } else {
                $this->home_model->InsertPendaftaran($nama,$username,$email,$password,$phone,$alamat,$kode_pos,$provinsi,$kota);

                $this->session->set_flashdata('sukses','Data Berhasil Dikirim');
                ?>
                <script type="text/javascript">
                    alert("Pendaftaran Berhasil, Silahkan Login Menggunakan Username dan Passowrd Anda.\n Terima Kasih");
                </script>
                <?php
                echo "<meta http-equiv='refresh' content='0; url=".base_url()."home/login'>";
            }


	}


	public function tentang_kami () {
		$data['bank'] 			= $this->home_model->GetBank();
		$data['kategori'] 		= $this->home_model->GetKategori();
		$data['produk']			= $this->home_model->GetProduk();

		
		$this->load->view('home/tentang_kami',$data);
	}

	public function cara_belanja() {


		$data['bank'] 			= $this->home_model->GetBank();
        $data['kategori'] 		= $this->home_model->GetKategori();
        



		$this->load->view('home/cara_belanja',$data);
	}

	public function hubungi_kami () {
		$data['bank'] 			= $this->home_model->GetBank();
		$data['kategori'] 		= $this->home_model->GetKategori();


		
		$this->load->view('home/hubungi_kami',$data);
	}

	public function hubungi_kami_kirim() {
		$tanggal 	= date('Y-m-d');
		$nama 		= $this->input->post('nama');
		$email 		= $this->input->post('email');
		$hp 		= $this->input->post('hp');
		$alamat 		= $this->input->post('alamat');
		$pesan 		= $this->input->post('pesan');

		$this->home_model->InsertHubungiKami($nama,$email,$hp,$alamat,$pesan,$tanggal);

		$this->session->set_flashdata('sukses','Data Berhasil Dikirim');
		redirect("home/hubungi_kami");
	}

	public function kategori() {
		$id_kategori= $this->uri->segment(3);
		$data['bank'] 			= $this->home_model->GetBank();
		$data['kategori'] 		= $this->home_model->GetKategori();
		$data['nama_kategori']  = $this->home_model->GetNamaKategoriId($id_kategori);


			$page=$this->uri->segment(4);
			$limit=12;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$data['tot'] = $offset;
			$tot_hal = $this->home_model->GetProdukKategori($id_kategori);
			$config['base_url'] = base_url() . 'home/kategori/'.$id_kategori.'/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['first_link'] = 'Awal';
	        $config['last_link'] = 'Akhir';
	        $config['next_link'] = 'Selanjutnya';
	        $config['prev_link'] = 'Sebelumnya';
	        $config['full_tag_open'] = '<ul class="pagination">';
	        $config['full_tag_close'] = '</ul>';

	        $config['first_link'] = 'Awal';
	        $config['first_tag_open'] = '<li class="prev page">';
	        $config['first_tag_close'] = '</li>';

	        $config['last_link'] = 'Akhir';
	        $config['last_tag_open'] = '<li class="next page">';
	        $config['last_tag_close'] = '</li>';

	        $config['next_link'] = 'Selanjutnya';
	        $config['next_tag_open'] = '<li class="next page">';
	        $config['next_tag_close'] = '</li>';

	        $config['prev_link'] = 'Sebelumnya';
	        $config['prev_tag_open'] = '<li class="prev page">';
	        $config['prev_tag_close'] = '</li>';

	        $config['cur_tag_open'] = '<li class="active"><a href="">';
	        $config['cur_tag_close'] = '</a></li>';

	        $config['num_tag_open'] = '<li class="page">';
	        $config['num_tag_close'] = '</li>';

			$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
			
			$data['produk_kategori'] = $this->db->query("select a.*,b.* from tbl_produk a join tbl_kategori b on a.kategori_id=b.id_kategori  where a.kategori_id='$id_kategori' order by a.id_produk desc 
			LIMIT ".$offset.",".$limit."");

		$this->load->view('home/kategori',$data);

	}



	public function cari () {
		$cari = $this->input->post('cari');

		if ($cari=="") {

		}
		else {

			$data['bank'] 			= $this->home_model->GetBank();
			$data['kategori'] 		= $this->home_model->GetKategori();
			$data['produk_cari']	= $this->home_model->GetProdukCari($cari);

			$this->load->view('home/cari',$data);

		}
	}

	public function produk () {
		$id_produk = $this->uri->segment(3);

		$data['bank'] 			= $this->home_model->GetBank();
		$data['kategori'] 		= $this->home_model->GetKategori();
		$data['random']			= $this->home_model->GetRandomProduk();
		$data['random_active']	= $this->home_model->GetRandomActiveProduk();
		$data['data_produk']    = $this->home_model->GetProdukId($id_produk);

		$this->load->view('home/produk',$data);
	}



	public function keranjang () {



            $data['bank'] 			= $this->home_model->GetBank();
            $data['kategori'] 		= $this->home_model->GetKategori();
            $kota                   = $this->session->userdata("kota");
            $data['ongkir']		    = $this->home_model->GetOngkir($kota);

            $id_produk = $this->uri->segment(3);

            if ($id_produk!="") {

                $query  = $this->home_model->GetProdukId($id_produk);

                foreach ($query->result_array() as $value) {

                    $kode_produk = $value['kode_produk'];
                    $harga = $value['harga'];
                    $nama_produk = $value['nama_produk'];
                    $gambar = $value['gambar'];
                    $stok 	= 1;
                    $stok_brg = $value['stok'];

                }

                $masuk = array(
                    'id'      => $kode_produk,
                    'qty'     => $stok,
                    'price'   => $harga,
                    'name'    => $nama_produk,
                    'stok_brg'=> $stok_brg,
                    'gbar'    => $gambar);
                $this->cart->insert($masuk);

            }
            else {

            }

        if($this->session->userdata("logged_user")=="LoginOke") {
            $this->load->view('home/keranjang',$data);;
        }
        else{
            $this->session->set_flashdata("checkout","Login untuk melakukan pesanan!");
            redirect('home/login');

        }


	}

	public function keranjang_hapus($kode) {

		$data = array(
			'rowid' => $kode,
			'qty'   => 0);
			$this->cart->update($data);
		redirect('home/keranjang');

	}

	public function keranjang_update() {
		$total = $this->cart->total_items();
		$item = $this->input->post('rowid');
		$qty = $this->input->post('qty');
		for($i=0;$i < $total;$i++)
		{
			$data = array(
			'rowid' => $item[$i],
			'qty'   => $qty[$i]);
			$this->cart->update($data);
		}
		redirect('home/keranjang');
	}

	public function keranjang_invoice () {


		$this->form_validation->set_rules('bank_id','Bank','required');

		if ($this->form_validation->run()==FALSE) {

				$data['logo'] 			= $this->home_model->GetLogo();

                $kota               = $this->session->userdata("kota");
                $data['ongkir']		= $this->home_model->GetOngkir($kota);
				$data['bank'] 		= $this->home_model->GetBank();
				$data['kategori'] 	= $this->home_model->GetKategori();


			$this->load->view('home/keranjang',$data);

		}
		else {

			$tgl_skr = date('Ymd');
			$cek_kode = $this->home_model->cek_kode($tgl_skr);
			$kode_trans = "";
			foreach($cek_kode->result() as $ck)
			{
				if($ck->kd==NULL)
				{
					$kode_trans = $tgl_skr.'001';
				}
				else
				{
					$kd_lama = $ck->kd;
					$kode_trans = $kd_lama+1;
				}
			}
            $id_users			= $this->session->userdata('id_users');
			$bank_id 			= $this->input->post("bank_id");




			$this->home_model->InsertTransaksiHeader($id_users,$kode_trans,$tgl_skr,$bank_id);
			foreach($this->cart->contents() as $items)
						{
							$this->home_model->simpan_pesanan("insert into tbl_transaksi_detail (kode_transaksi,kode_produk,nama_produk,harga,jumlah) values('".$kode_trans."','".$items['id']."','".$items['name']."','".$items['price']."','".$items['qty']."')");
							$stok_now = $items['stok_brg']-$items['qty'];
							$this->home_model->update_dibeli($items['id'],$stok_now);

						}
						$this->cart->destroy();
						?>
						<script type="text/javascript">
						alert("Pesanan anda telah terkirim, Silahkan melakukan Konfirmasi Pembayaran dalam waktu 1x24 jam. Kami akan memproses pesanan anda ketika telah melakukan Konfirmasi Pembayaran.\n Terima Kasih");
						</script>
						<?php
						echo "<meta http-equiv='refresh' content='0; url=".base_url()."home/'>";

		}
	}

    public function riwayat () {
        if($this->session->userdata("logged_user")=="LoginOke") {
           $data['bank']            = $this->home_model->GetBank();
            $data['kategori']       = $this->home_model->GetKategori();
            $id_users               = $this->session->userdata("id_users");
            $data['data_riwayat']   = $this->home_model->GetRiwayat($id_users);

            $this->load->view('home/riwayat_pesanan', $data);
        }
        else{
            $this->session->set_flashdata("checkout","Login untuk melakukan pesanan!");
            redirect('home/login');

        }
    }
    public function detail_riwayat () {
        if($this->session->userdata("logged_user")=="LoginOke") {
            $data['bank']       = $this->home_model->GetBank();
            $data['kategori']   = $this->home_model->GetKategori();
            $kota               = $this->session->userdata("kota");

            if ($this->session->userdata("logged_in") !== "") {

                $id = $this->uri->segment(3);
                $kode_transaksi = $this->uri->segment(4);

                $data['data_header'] = $this->home_model->GetTransaksiheader($id);
                $data['data_detail'] = $this->home_model->GetDetailTransaksi($kode_transaksi);
                $data['ongkir'] = $this->home_model->GetOngkir($kota);
                $data['detail_bayar'] = $this->home_model->GetDetailPembayaran($kode_transaksi);
                $data['data_total'] = $this->home_model->GetDetailTotal($kode_transaksi);

                $this->load->view('home/detail_riwayat', $data);

            } else {
                redirect("adminweb");
            }

        }
        else{
            $this->session->set_flashdata("checkout","Login untuk melakukan pesanan!");
            redirect('home/login');

        }




    }
    public function konfirmasi_halaman () {
        if($this->session->userdata("logged_user")=="LoginOke") {
            $data['bank']               = $this->home_model->GetBank();
            $data['kategori']           = $this->home_model->GetKategori();
            $id_users                   = $this->session->userdata("id_users");
            $data['data_konfirmasi']    = $this->home_model->GetKonfirmasi($id_users);


            $this->load->view('home/konfirmasi_bayar', $data);
        }
        else{
            $this->session->set_flashdata("checkout","Login untuk melakukan pesanan!");
            redirect('home/login');

        }
    }
    public function konfirmasi_pembayaran() {

        if($this->session->userdata("logged_user")=="LoginOke") {

            if ($this->form_validation->run() == FALSE) {
                $data['bank']           = $this->home_model->GetBank();
                $data['kategori']       = $this->home_model->GetKategori();
                $data['produk']         = $this->home_model->GetProduk();
                $data['random']         = $this->home_model->GetRandomProduk();
                $data['random_active']  = $this->home_model->GetRandomActiveProduk();
                $data['kota']           = $this->home_model->GetKota();

                $this->load->view('home/konfirmasi_pembayaran', $data);

            }
        }
        else{
            $this->session->set_flashdata("checkout","Login untuk melakukan pesanan!");
            redirect('home/login');

        }
    }
    public function kirim_konfirmasi() {
	    $id         = $this->input->post('id');
        $kode  		= $this->input->post('kode');
        $tgl 		= $this->input->post('tgl_byr');
        $jmlh    	= $this->input->post('jmlh_byr');
        $nama_bank	= $this->input->post('nama_bank');
        $no_rek	    = $this->input->post('no_rek');
        $atas_nama 	= $this->input->post('atas_nama');


        $this->home_model->InsertPembayaran($kode,$tgl,$jmlh,$nama_bank,$no_rek,$atas_nama);
        $this->home_model->update_status($kode,'2');

        $this->session->set_flashdata('sukses','Data Berhasil Dikirim');
        ?>
        <script type="text/javascript">
            alert("Anda telah berhasil melakukan Konfirmasi Pembayaran. Transaksi anda akan segera di proses.\nTerima Kasih");
        </script>
        <?php
        echo "<meta http-equiv='refresh' content='0; url=".base_url()."home/detail_riwayat/$id/$kode'>";

    }
    public function profile () {
        $data['bank'] 			= $this->home_model->GetBank();
        $data['kategori'] 		= $this->home_model->GetKategori();
        $data['produk']			= $this->home_model->GetProduk();
        $id                     = $this->uri->segment(3);
        $data['kota']	        = $this->home_model->GetKota();
        $data['detail_users']	= $this->home_model->GetUsers($id);

        $this->load->view('home/profile',$data);
    }
    public function profil_update() {

	    $id 		= $this->input->post('id_users');
        $nama 		= $this->input->post('nama_users');
        $username 	= $this->input->post('username');
        $email 		= $this->input->post('email');
        $password	= md5($this->input->post('password'));
        $phone 		= $this->input->post('phone');
        $alamat 	= $this->input->post('alamat');
        $kode_pos	= $this->input->post('kode_pos');
        $provinsi	= $this->input->post('provinsi');
        $kota 		= $this->input->post('kota');


        $this->home_model->InsertProfileUpdate($id,$nama,$username,$email,$password,$phone,$alamat,$kode_pos,$provinsi,$kota);

        $this->session->set_flashdata('sukses','Data Berhasil Dikirim');
        ?>
        <script type="text/javascript">
            alert("Data Berhasil Di Update!");
        </script>
        <?php
        echo "<meta http-equiv='refresh' content='0; url=".base_url()."home/profile/$id'>";
    }
}