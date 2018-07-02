<?php
class M_kategori extends CI_Model{

	public function hapus_kategori($kode){
		$hsl=$this->db->query("call hapus_kategori('".$kode."')");  
		return $hsl;	  				
	}
	public function update_kategori($kode,$kat){
		$hsl=$this->db->query("call edit_kategori('".$kat."','".$kode."')"); 
		return $hsl; 	
	}

	function tampil_kategori(){
		$hsl = $this->db->get('tbl_kategori');  
		// $hsl=$this->db->query("call tampil_kategori()");  					
   	return $hsl;
	}

	public function simpan_kategori($kat){
		$hsl=$this->db->query("call tambah_kategori('".$kat."')"); 		
		return $hsl;		
	}

}



