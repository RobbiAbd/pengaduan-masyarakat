<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;
class Pdf extends Dompdf{

    public $filename;
    public function __construct(){
        parent::__construct();
        $this->filename = "laporan.pdf";
    }

    protected function ci()
    {
        return get_instance();
    }

    public function load_view($view, $data = array()){
        $html = $this->ci()->load->view($view, $data, TRUE);
        $this->load_html($html);
        // Render the PDF
        $this->render();
            // Output the generated PDF to Browser
               $this->stream($this->filename, array("Attachment" => false)); // true for download and false for preview
    }
}