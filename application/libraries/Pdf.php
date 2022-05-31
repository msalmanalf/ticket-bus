<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pdf {

	public $param;
    public $pdf;

    function __construct() {
        include_once APPPATH . '/third_party/fpdf/fpdf.php';
        $this->param =$param;
        $this->pdf = new \pdf();
    }
}
?>