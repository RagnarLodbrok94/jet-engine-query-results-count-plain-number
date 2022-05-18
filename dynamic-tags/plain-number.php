<?php

namespace Query_Results_Count_Plain_Number\Dynamic_Tags;

use Jet_Engine\Query_Builder\Manager;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class Plain_Number extends \Elementor\Core\DynamicTags\Data_Tag {

	public function get_name() {
		return 'jet-query-results-count-plain-number';
	}

	public function get_title() {
		return __( 'Query Results Count: Return Plain Number', 'jet-engine' );
	}

	public function get_group() {
		return \Jet_Engine_Dynamic_Tags_Module::JET_GROUP;
	}

	public function get_categories() {
		return array(
			\Jet_Engine_Dynamic_Tags_Module::TEXT_CATEGORY,
			\Jet_Engine_Dynamic_Tags_Module::NUMBER_CATEGORY,
			\Jet_Engine_Dynamic_Tags_Module::POST_META_CATEGORY,
		);
	}

	protected function register_controls() {
		$this->add_control(
			'query_id',
			array(
				'label'   => __( 'Query', 'jet-engine' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => Manager::instance()->get_queries_for_options(),
			)
		);
	}

	public function get_value( array $options = array() ) {
		$query_id = $this->get_settings( 'query_id' );

		if ( ! $query_id ) {
			return 0;
		}

		$query = Manager::instance()->get_query_by_id( $query_id );

		if ( ! $query ) {
			return 0;
		}

		return $query->get_items_total_count();
	}
}