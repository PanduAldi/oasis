<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dompdf_gen
{
	public function __construct()
	{

		require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';

		$pdf   = new DOMPDF();

        $ci =& get_instance();
        $ci->cetak = $pdf;
	}

}

/* End of file libraryName.php */
/* Location: ./application/libraries/libraryName.php */
