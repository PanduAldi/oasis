<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terbilang
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

function nominal($x)
{
	$abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");

	if ($x < 12){
		return " " . $abil[$x];
	}
	elseif ($x < 20){
		return $this->nominal($x - 10) . "belas";
	}
	elseif ($x < 100){
		return $this->nominal($x / 10) . " puluh" . $this->nominal($x % 10);
	}
	elseif ($x < 200){
		return " seratus" . $this->nominal($x - 100);
	}
	elseif ($x < 1000){
		return $this->nominal($x / 100) . " ratus" . $this->nominal($x % 100);
	}
	elseif ($x < 2000){
		return " seribu" . $this->nominal($x - 1000);
	}
	elseif ($x < 1000000){
		return $this->nominal($x / 1000) . " ribu" . $this->nominal($x % 1000);
	}
	elseif ($x < 1000000000){
		return $this->nominal($x / 1000000) . " juta" . $this->nominal($x % 1000000);
	}
}

}

/* End of file terbilang.php */
/* Location: ./application/libraries/terbilang.php */
