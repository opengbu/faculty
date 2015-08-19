<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class m_pdf {
    
    function m_pdf()
    {
        $CI = & get_instance();
        log_message('Debug', 'mPDF class is loaded.');
    }
 
    function load($param=NULL)
    {
        include_once APPPATH.'/third_party/mpdf/mpdf.php';
         
        if ($params == NULL)
        {
            $param = '"en-GB-x","A4","","",2,2,2,2,6,3';          
        }
         
        return new mPDF('c', 'A4','','','','',0,0,0,0,0,0); 
    
	
	}
}