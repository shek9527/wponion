<?php
/**
 *
 * Initial version created 21-07-2018 / 09:46 AM
 *
 * @author Varun Sridharan <varunsridharan23@gmail.com>
 * @version 1.0
 * @since 1.0
 * @package
 * @link
 * @copyright 2018 Varun Sridharan
 * @license GPLV3 Or Greater (https://www.gnu.org/licenses/gpl-3.0.txt)
 */

namespace WPOnion;
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

if ( ! class_exists( '\WP_List_Table' ) ) {
	require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

if ( ! class_exists( '\WPOnion\WP_List_Table' ) ) {
	/**
	 * Class WP_List_Table
	 *
	 * @package WPOnion
	 * @author Varun Sridharan <varunsridharan23@gmail.com>
	 * @since 1.0
	 */
	class WP_List_Table extends \WP_List_Table {
		/**
		 * WP_List_Table constructor.
		 *
		 * @param array $args
		 */
		public function __construct( $args = array() ) {
			$args           = wp_parse_args( $args, array(
				'plural'           => '',
				'singular'         => '',
				'ajax'             => true,
				'columns'          => array(),
				'bulk_actions'     => array(),
				'sortable_columns' => array(),
				'sort_callback'    => false,
			) );
			$args['screen'] = false;
			parent::__construct( $args );//$this->_args
		}

		/**
		 * @todo Need To Check if its required.
		 */
		public function ajax_user_can() {
			parent::ajax_user_can(); // TODO: Change the autogenerated stub
		}

		/**
		 * @return array
		 */
		public function get_columns() {
			if ( isset( $this->_args['columns'] ) && ! empty( $this->_args['columns'] ) ) {
				return $this->_args['columns'];
			}
			return array();
		}

		/**
		 * @return array
		 */
		public function get_sortable_columns() {
			if ( isset( $this->_args['sortable_columns'] ) && ! empty( $this->_args['sortable_columns'] ) ) {
				return $this->_args['sortable_columns'];
			}
			return array();
		}

		/**
		 * @return array
		 */
		public function get_bulk_actions() {
			$bulk_actions = array();
			if ( isset( $this->_args['bulk_actions'] ) && ! empty( $this->_args['bulk_actions'] ) ) {
				foreach ( $this->_args['bulk_actions'] as $id => $data ) {
					$bulk_actions[ $id ] = ( isset( $data['title'] ) ) ? $data['title'] : $data;
				}
			}

			return $bulk_actions;
		}

		/**
		 * @param object $item
		 * @param string $column_name
		 *
		 * @return mixed
		 */
		public function column_default( $item, $column_name ) {
			if ( isset( $this->_args['render'][ $column_name ] ) ) {
				$_col = $this->_args['render'][ $column_name ];
				if ( isset( $_col ) && is_callable( $_col ) ) {
					return call_user_func_array( $_col, array( $item, &$this ) );
				}
			}
			return print_r( $item, true );
		}

		public function process_bulk_action() {
		}

		/**
		 * @param array $data
		 */
		public function prepare_items( $data = array() ) {
			$per_page              = 5;
			$columns               = $this->get_columns();
			$hidden                = array();
			$sortable              = $this->get_sortable_columns();
			$this->_column_headers = array( $columns, $hidden, $sortable );

			if ( isset( $this->_args['sort_callback'] ) && false !== $this->_args['sort_callback'] && is_callable( $this->_args['sort_callback'] ) ) {
				$data = call_user_func_array( $this->_args['sort_callback'], array( $data, &$this ) );
			}


			$current_page = $this->get_pagenum();
			$total_items  = count( $data );
			$data         = array_slice( $data, ( ( $current_page - 1 ) * $per_page ), $per_page );
			$this->items  = $data;

			$this->process_bulk_action(); // @todo Fix it.

			$this->set_pagination_args( array(
				'total_items' => $total_items,
				'per_page'    => $per_page,
				'total_pages' => ceil( $total_items / $per_page ),
			) );
		}
	}
}