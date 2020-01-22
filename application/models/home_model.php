<?php

class home_model extends CI_Model {

	function CekHomeLogin($data) {

		$cek['username'] = mysql_real_escape_string($data['username']);
		$cek['password'] = md5(mysql_real_escape_string($data['password']));

		$ceklogin = $this->db->get_where('tbl_users',$cek);

		if (count($ceklogin->result())>0) {

			foreach ($ceklogin->result() as $value) {
				$sess_data['logged_user'] 	= 'LoginOke';
				$sess_data['id_users']  	= $value->id_users;
				$sess_data['username']  	= $value->username;
				$sess_data['email']  		= $value->email;				
				$sess_data['password']  	= $value->password;
				$sess_data['nama_users']  	= $value->nama_users;
				$sess_data['phone']  		= $value->phone;
				$sess_data['alamat']  		= $value->alamat;
				$sess_data['provinsi'] 		= $value->provinsi;				
				$sess_data['kota'] 			= $value->kota;
				$sess_data['kode_pos']  	= $value->kode_pos;


				$this->session->set_userdata($sess_data);

			}

            ?>
            <script type="text/javascript">
                alert("Login Sukses!");
            </script>
            <?php
            echo "<meta http-equiv='refresh' content='0; url=".base_url()."home'>";
	    }
	    else {
            $this->session->set_flashdata("error","Username atau Password Anda Salah!");
            redirect('home/login');
        }
	}

	function InsertPendaftaran($nama,$username,$email,$password,$phone,$alamat,$kode_pos,$provinsi,$kota) {
		return $this->db->query("insert into tbl_users values('','$username','$email','$password','$nama','$phone','$alamat','$provinsi','$kota','$kode_pos')");
	}

    function UsersSama($username) {
        return $this->db->query("select * from tbl_users where binary(username)='$username' ");
    }

	function GetBank() {
		return $this->db->query("select * from tbl_bank order by id_bank desc");
	}

	

	function GetSlider(){
		return $this->db->query("select * from tbl_slider where status='1' order by id_slider desc");
	}

	function GetKategori() {
		return $this->db->query("select * from tbl_kategori order by id_kategori desc");
	}

	function GetProduk() {
		return $this->db->query("select a.*,b.* from tbl_produk a join tbl_kategori b on a.kategori_id=b.id_kategori order by id_produk desc limit 0,6 ");
	}

	function GetRandomProduk() {
		return $this->db->query("select a.*,b.* from tbl_produk a join tbl_kategori b on a.kategori_id=b.id_kategori order by RAND('id_produk') asc limit 0,3 ");
	}

	function GetRandomActiveProduk() {
		return $this->db->query("select a.*,b.* from tbl_produk a join tbl_kategori b on a.kategori_id=b.id_kategori order by RAND('id_produk') desc limit 0,3 ");
	}



	function GetCaraBelanja() {
		return $this->db->query("select * from tbl_carabelanja");
	}

	function InsertHubungiKami($nama,$email,$hp,$alamat,$pesan,$tanggal) {
		return $this->db->query("insert into tbl_pesan values('','$nama','$email','$hp','$alamat','$pesan','$tanggal','')");
	}



	function GetProdukKategori($id_kategori) {
		return $this->db->query("select a.*,b.* from tbl_produk a join tbl_kategori b on a.kategori_id=b.id_kategori  where a.kategori_id='$id_kategori' order by a.id_produk desc");
	}

	function GetNamaKategoriId($id_kategori) {
		return $this->db->query("select * from tbl_kategori where id_kategori='$id_kategori'");
	}




	function GetProdukCari($cari) {
		return $this->db->query("select a.*,b.* from tbl_produk a join tbl_kategori b on a.kategori_id=b.id_kategori  where a.nama_produk like '%".$cari."%' or b.nama_kategori like '%".$cari."%' order by a.id_produk desc");
	} 

	function GetProdukId($id_produk) {
		return $this->db->query("select a.*,b.* from tbl_produk a join tbl_kategori b on a.kategori_id=b.id_kategori  where a.id_produk='$id_produk'");
	}

	function cek_kode($tgl)
	{
		$query=$this->db->query("select MAX(kode_transaksi) as kd from tbl_transaksi where kode_transaksi like '%$tgl%'");
		return $query;
	}


	function update_dibeli($kd,$bl)
	{
		$query=$this->db->query("update tbl_produk set stok='$bl' where kode_produk='$kd'");
	}

	function simpan_pesanan($datainput)
	{
		$q = $this->db->query($datainput);
	}

	function InsertTransaksiHeader($id_users,$kode_trans,$tgl_skr,$bank_id) {
		return $this->db->query("insert into tbl_transaksi values('','$id_users','$kode_trans','$tgl_skr','$bank_id','')");
	}
    function GetKota() {
        return $this->db->query("select * from tbl_kota order by id_kota desc");
    }
    function GetRiwayat($id_users) {

        return $this->db->query("select a.*,b.*,c.* from tbl_transaksi a
		join tbl_bank b on a.bank_id=b.id_bank join  tbl_users c on a.id_users=c.id_users
		where a.id_users='$id_users' order by a.id_transaksi desc");

    }

    function GetKonfirmasi($id_users) {

        return $this->db->query("select a.*,b.*,c.* from tbl_transaksi a
		join tbl_bank b on a.bank_id=b.id_bank join  tbl_users c on a.id_users=c.id_users
		where a.id_users='$id_users' and a.status = '0' order by a.id_transaksi desc");

    }

    function GetTransaksiheader($id_transaksi) {
        return $this->db->query("select a.*,b.*,c.* from tbl_transaksi a
		join tbl_bank b on a.bank_id=b.id_bank join  tbl_users c on a.id_users=c.id_users
                where a.id_transaksi='$id_transaksi' ");
    }

    function GetDetailTransaksi($kode_transaksi) {
        return $this->db->query("select * from tbl_transaksi_detail where kode_transaksi='$kode_transaksi' order by id_transaksi_detail desc ");
    }


    function GetDetailTotal($kode_transaksi) {
        return $this->db->query("select sum(harga) as total from tbl_transaksi_detail where kode_transaksi='$kode_transaksi' order by id_transaksi_detail desc ");
    }

    function GetOngkir($kota) {
        return $this->db->query("select ongkir from tbl_kota where nama_kota='$kota'");
    }
    function InsertPembayaran($kode_transaksi,$tgl,$jmlh,$nama_bank,$no_rek,$atas_nama) {
        return $this->db->query("insert into tbl_pembayaran values('','$kode_transaksi','$tgl','$jmlh','$nama_bank','$no_rek','$atas_nama')");
    }
    function GetDetailPembayaran($kode_transaksi) {
        return $this->db->query("select * from tbl_pembayaran where kode_transaksi='$kode_transaksi' ");

    }
    function update_status($kode_transaksi,$status)
    {
        return $this->db->query("update tbl_transaksi set status='$status' where kode_transaksi='$kode_transaksi'");
    }

    function GetUsers($id_users) {
        return $this->db->query("select *from tbl_users where id_users='$id_users'");
    }


    function InsertProfileUpdate($id_users,$nama,$username,$email,$password,$phone,$alamat,$kode_pos,$provinsi,$kota) {
        return $this->db->query("update tbl_users set username='$username',nama_users='$nama',email='$email',password='$password',phone='$phone',alamat='$alamat',kode_pos='$kode_pos',provinsi='$provinsi',kota='$kota' where id_users='$id_users'");
    }
}