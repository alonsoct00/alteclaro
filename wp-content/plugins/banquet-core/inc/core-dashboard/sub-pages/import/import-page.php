<?php
if ( ! function_exists( 'banquet_core_add_import_sub_page_to_list' ) ) {
	function banquet_core_add_import_sub_page_to_list( $sub_pages ) {
		$sub_pages[] = 'BanquetCoreImportPage';
		return $sub_pages;
	}
	
	add_filter( 'banquet_core_filter_add_welcome_sub_page', 'banquet_core_add_import_sub_page_to_list', 11 );
}

if ( class_exists( 'BanquetCoreSubPage' ) ) {
	class BanquetCoreImportPage extends BanquetCoreSubPage {
		
		public function __construct() {
			parent::__construct();
		}
		
		public function add_sub_page() {
			$this->set_base( 'import' );
			$this->set_title( esc_html__('Import', 'banquet-core'));
			$this->set_atts( $this->set_atributtes());
		}

		public function set_atributtes(){
			$params = array();

			$iparams = BanquetCoreDashboard::get_instance()->get_import_params();
			if(is_array($iparams) && isset($iparams['submit'])) {
				$params['submit'] = $iparams['submit'];
			}

			return $params;
		}
	}
}