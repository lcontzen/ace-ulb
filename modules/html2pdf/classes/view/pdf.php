<?php defined('SYSPATH') or die('No direct script access.');

/**
 * View file PDF using HTML2PDF
 * [!] more details in http://www.html2pdf.fr/
 *
 * @author     Bernardo Castro
 * @copyright  (c) 2012 Rede Sudeste
 * @license    GNU GPL
 */
class View_PDF extends View {
		
	// Merged configuration settings
    protected $_config = array(
        'author'   => 'Empty author',
        'title'    => 'Empty title',
        'subject'  => 'Empty subject',
        'keywords' => 'pdf, reports, exemple',
        'name'     => 'exemple.pdf',
    );
        
    // Defines the author of the document
    protected $_author;
    
    // Defines the title of the document
    protected $_title;
    
    // Defines the subject of the documen
    protected $_subject;
    
    // Associates keywords with the document
    protected $_keywords;
    
    // Name the document
    protected $_name;
    
    // locale in folder /html/locale/
    protected $_langue;
        
    
	public static function factory($file = NULL, array $data = NULL) {
        
		return new View_PDF($file, $data);
	}
	
	
	/**
	 * Cria config PDF View object
	 *
	 * @param string file html
	 * @param array config
	 * @return void
	 */
	public function __construct($file = NULL, array $data) {
		
		parent::__construct($file);
		       
		// Array Merge
		$config = Arr::merge($this->_config, $data);
		
		$this->_author   = $config['author'];
		$this->_title    = $config['title'];
		$this->_subject  = $config['subject'];
		$this->_keywords = $config['keywords'];
		$this->_name     = $config['name'];
		
		// Config locale
		$this->_langue  = Kohana::$config->load('html2pdf')->get('langue');
	}
	
	
	public function render($file = NULL) {
		
		$html = parent::render($file);
                
		$html2pdf = new HTML2PDF('P','A4', $this->_langue);
		
        $html2pdf->pdf->SetAuthor( $this->_author );
        $html2pdf->pdf->SetTitle( $this->_title );
        $html2pdf->pdf->SetSubject( $this->_subject );
        $html2pdf->pdf->SetKeywords( $this->_keywords );
        
        		
		$html2pdf->WriteHTML($html);
        $html2pdf->Output($this->_name, 'D');
	}


}