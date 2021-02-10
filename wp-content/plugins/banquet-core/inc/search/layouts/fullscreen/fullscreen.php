<?php
class FullscreenSearch extends BanquetCoreSearch {
	private static $instance;

	public function __construct() {
		parent::__construct();
		add_action('banquet_action_page_footer_template', array($this, 'load_template'), 11); //after footer
	}

	public static function get_instance() {
		if ( self::$instance == null ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function load_template() {
		if(is_active_widget(false,false,'banquet_core_search_opener')) {
			banquet_core_template_part('search/layouts/' . $this->search_layout, 'templates/' . $this->search_layout);
		}
	}
}