<?php

class admin_model extends CI_Model {

	function CekAdminLogin($data) {

		$cek['username'] = mysql_real_escape_string($data['username']);
		$cek['password'] = md5(mysql_real_escape_string($data['password']));

		$ceklogin = $this->db->get_where('tbl_admin',$cek);

		if (count($ceklogin->result())>0) {

			foreach ($ceklogin->result() as $value) {
				$sess_data['logged_in'] 	= 'LoginOke';
				$sess_data['id_admin']  	= $value->id_admin;
				$sess_data['nama_admin']  	= $value->nama_admin;
				$sess_data['username']  	= $value->username;
				$sess_data['password']  	= $value->password;


				$this->session->set_userdata($sess_data);

			}
			redirect("adminweb/home");
		}
		else {
			$this->session->set_flashdata("error","Username atau Password Anda Salah!");
			redirect('adminweb/index');
		}

	}


	//Awal Kategori
	function GetKategori() {
		return $this->db->query("select * from tbl_kategori order by id_kategori desc");
	}

	function KategoriSama($nama_kategori) {
		return $this->db->query("select nama_kategori from tbl_kategori where UPPER(nama_kategori)='$nama_kategori' ");
	}

	function KategoriSimpan($nama_kategori) {
		return $this->db->query("insert into tbl_kategori values('','$nama_kategori')");
	}

	function DeleteKategori($id_kategori) {
		return $this->db->query("delete from tbl_kategori where id_kategori='$id_kategori'");
	}

	function GetEditKategori($id_kategori) {
		return $this->db->query("select * from tbl_kategori where id_kategori='$id_kategori'");
	}
	function KategoriUpdate($id_kategori,$nama_kategori) {
		return $this->db->query("update tbl_kategori set nama_kategori='$nama_kategori' where id_kategori='$id_kategori'");
	}
	//Akhir Kategori



	//Awal Kota
	function GetKota() {
		return $this->db->query("select * from tbl_kota order by id_kota desc");
	}

	function KotaSama($nama_kota) {
		return $this->db->query("select * from tbl_kota where UPPER(nama_kota)='$nama_kota' ");
	}

	function KotaSimpan($nama_kota,$ongkir) {
		return $this->db->query("insert into tbl_kota values('','$nama_kota','$ongkir')");
	}

	function DeleteKota($id_kota) {
		return $this->db->query("delete from tbl_kota where id_kota='$id_kota'");
	}

	function GetEditKota($id_kota) {
		return $this->db->query("select * from tbl_kota where id_kota='$id_kota'");
	}
	function KotaUpdate($id_kota,$nama_kota,$ongkir) {
		return $this->db->query("update tbl_kota set nama_kota='$nama_kota' , ongkir='$ongkir'  where id_kota='$id_kota'");
	}
	//Akhir Kategori


	//Awal Bank
	function GetBank() {
		return $this->db->query("select * from tbl_bank order by id_bank desc");
	}
	function DeleteBank($id_bank) {
		return $this->db->query("delete from tbl_bank where id_bank='$id_bank' ");
	}

	function GetBankEdit($id_bank) {
		return $this->db->query("select * from tbl_bank where id_bank='$id_bank' ");
	}
	//Ahir Bank




	//Awal admin
	function Getadmin() {
		return $this->db->query("select *from tbl_admin order by id_admin desc");
	}



    function AdminEdit($id_admin,$nama,$username,$password) {
        return $this->db->query("update tbl_admin set nama_admin='$nama',username='$username',password='$password' where id_admin='$id_admin' ");
    }


	//Akhir admin

    //Awal users
    function GetUsers() {
        return $this->db->query("select *from tbl_users order by id_users desc");
    }

    function Deleteusers($id) {
        return $this->db->query("delete from tbl_users where id_users='$id'");
    }
    //akhir users




	//Awal produk

	function GetProduk() {
		return $this->db->query("select a.*,c.nama_kategori from tbl_produk a join tbl_kategori c on a.kategori_id=c.id_kategori order by a.id_produk desc");
	}

	function GetMaxKodeProduk() {

		$query = $this->db->query("select MAX(RIGHT(kode_produk,5)) as kode_produk from tbl_produk");
		$kode ="";
		if($query->num_rows()>0) {
			foreach ($query->result() as $tampil) {
				$kd = ((int)$tampil->kode_produk)+1;
				$kode = sprintf("%05s",$kd);
			}
		}
		else {
			$kode="00001";
		}
		return "BMW".$kode;
	}

	function DeleteProduk($id_produk) {
		return $this->db->query("delete from tbl_produk where id_produk='$id_produk' ");
	}

	function EditProduk($id_produk){
		return $this->db->query("select * from tbl_produk where id_produk='$id_produk' ");
	}
	//Akhir Produk

	//Awal Pesan

	function GetPesan () {
		return $this->db->query("select * from tbl_pesan order by status asc");
	}

	function DeletePesan($id) {
		return $this->db->query("delete from tbl_pesan where id_pesan='$id'");
	}

	function DetailPesan($id) {
		return $this->db->query("select * from tbl_pesan where id_pesan='$id'");
	}

	function UpdateStatusPesan($status,$id) {
		return $this->db->query("update tbl_pesan set status='$status' where id_pesan='$id'");
	}

	function SimpanPesanAdd($email,$judul,$isi_pesan_terkirim) {
		return $this->db->query("insert into tbl_pesan_terkirim values('','$email','$judul','$isi_pesan_terkirim')");
	}

	function GetPesanKirim() {
		return $this->db->query("select * from tbl_pesan_terkirim order by id_pesan_terkirim desc");
	}

	function DeletePesanKirim($id) {
		return $this->db->query("delete from tbl_pesan_terkirim where id_pesan_terkirim='$id'");
	}

	function DetailPesanKirim($id) {
		return $this->db->query("select * from tbl_pesan_terkirim where id_pesan_terkirim='$id'");
	}
	
	//Akhir Pesan 


	//Awal Transaksi

	function GetTransaksi() {
		return $this->db->query("select a.*,b.*,c.* from tbl_transaksi a
		join tbl_bank b on a.bank_id=b.id_bank join  tbl_users c on a.id_users=c.id_users
		where a.status='0' or a.status='2' order by a.id_transaksi asc  ");
	}

	function UpdateTransaksiHeader($id_transaksi,$status) {
		return $this->db->query("update tbl_transaksi set status='$status' where id_transaksi='$id_transaksi'  ");
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

    function GetTransaksiSudah() {

        return $this->db->query("select a.*,b.*,c.* from tbl_transaksi a
		join tbl_bank b on a.bank_id=b.id_bank join  tbl_users c on a.id_users=c.id_users
		where a.status='1' order by a.id_transaksi asc  ");

    }
    function GetTransaksiTolak() {

        return $this->db->query("select a.*,b.*,c.* from tbl_transaksi a
		join tbl_bank b on a.bank_id=b.id_bank join  tbl_users c on a.id_users=c.id_users
		where a.status='3' order by a.id_transaksi asc  ");

    }

	//Akhir Transaki

    function GetDetailPembayaran($kode_transaksi) {
        return $this->db->query("select * from tbl_pembayaran where kode_transaksi='$kode_transaksi' ");

    }


	
}