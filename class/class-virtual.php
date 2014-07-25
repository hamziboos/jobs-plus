<?php

if( !class_exists('Jobs_Plus_Virtual') ):
class Jobs_Plus_Virtual{

	function __construct(){

		global $Jobs_Plus_Core;
		
		$core = &$Jobs_Plus_Core;  //reference for convienience
		
	/**
	* Create the default virtual pages.
	* @return void
	*/
		/* Create neccessary pages */
		$current_user = wp_get_current_user();

		//Default button set
		$warning = __("<!-- You may edit this page, the title and the slug, but it requires a minimum of the correct page shortcode to function. You can recreate the original default page by deleting this one. -->\n", $core->text_domain) . PHP_EOL;
		$buttons = '<p style="text-align: center;">[jbp-expert-post-btn][jbp-job-post-btn][jbp-expert-browse-btn][jbp-job-browse-btn][jbp-expert-profile-btn][jbp-job-list-btn]</p>' . PHP_EOL;

		/**
		* JOB VIRTUALS
		*/

		/**
		* jbp_job Archive
		*/
		$page_id = $core->get_post_id_by_meta(JBP_JOB_VIRTUAL_KEY, JBP_JOB_ARCHIVE_FLAG );
		if ( empty($page_id) ) {
			/* Construct args for the new post */
			$args = array(
			'post_title'     => sprintf( __('%s Listing Page', JBP_TEXT_DOMAIN), $core->job_labels->singular_name),
			'post_name'      => sprintf( __('%s-listing-page', JBP_TEXT_DOMAIN), $core->job_slug ),
			'post_status'    => 'virtual',
			'post_author'    => $current_user->ID,
			'post_type'      => 'jbp_job',
			'post_content'   => $warning . $buttons . '[jbp-job-archive-page]',
			'ping_status'    => 'closed',
			'comment_status' => 'closed'
			);
			$page_id = wp_insert_post( $args );
			$page = get_post($page_id);
			add_post_meta( $page_id, JBP_JOB_VIRTUAL_KEY, JBP_JOB_ARCHIVE_FLAG);
		} else {
			$page = get_post($page_id);
			//Make sure it stays virtual
			if( !in_array($page->post_status, array('virtual', 'trash') ) ) 
			wp_update_post( array('ID' => $page_id, 'post_status' => 'virtual') );
		}
		$core->_job_archive_page_id = $page_id; //Remember the number

		/**
		* jbp_job Taxonomy
		*/
		$page_id = $core->get_post_id_by_meta(JBP_JOB_VIRTUAL_KEY, JBP_JOB_TAXONOMY_FLAG );
		if ( empty($page_id) ) {
			/* Construct args for the new post */
			$args = array(
			'post_title'     => sprintf( __('%s Taxonomy Virtual', JBP_TEXT_DOMAIN), $core->job_labels->singular_name),
			'post_name'      => sprintf( __('%s-taxonomy-virtual', JBP_TEXT_DOMAIN), $core->job_slug ),
			'post_status'    => 'virtual',
			'post_author'    => $current_user->ID,
			'post_type'      => 'jbp_job',
			'post_content'   => $warning . $buttons . '[jbp-job-taxonomy-page]',
			'ping_status'    => 'closed',
			'comment_status' => 'closed'
			);
			$page_id = wp_insert_post( $args );
			$page = get_post($page_id);
			add_post_meta( $page_id, JBP_JOB_VIRTUAL_KEY, JBP_JOB_TAXONOMY_FLAG);
		} else {
			$page = get_post($page_id);
			//Make sure it stays virtual
			if( !in_array($page->post_status, array('virtual', 'trash') ) ) 
			wp_update_post( array('ID' => $page_id, 'post_status' => 'virtual') );
		}
		$core->_job_taxonomy_page_id = $page_id; //Remember the number

		/**
		* jbp_job Contact
		*/
		$page_id = $core->get_post_id_by_meta(JBP_JOB_VIRTUAL_KEY, JBP_JOB_CONTACT_FLAG );
		if ( empty($page_id) ) {
			/* Construct args for the new post */
			$args = array(
			'post_title'     => sprintf( __('%s Contact Virtual', JBP_TEXT_DOMAIN), $core->job_labels->singular_name),
			'post_name'      => sprintf( __('%s-contact-virtual', JBP_TEXT_DOMAIN), $core->job_slug ),
			'post_status'    => 'virtual',
			'post_author'    => $current_user->ID,
			'post_type'      => 'jbp_job',
			'post_content'   => $warning . $buttons . '[jbp-job-contact-page]',
			'ping_status'    => 'closed',
			'comment_status' => 'closed'
			);
			$page_id = wp_insert_post( $args );
			$page = get_post($page_id);
			add_post_meta( $page_id, JBP_JOB_VIRTUAL_KEY, JBP_JOB_CONTACT_FLAG);
		} else {
			//Make sure it stays virtual
			if( !in_array($page->post_status, array('virtual', 'trash') ) ) 
			wp_update_post( array('ID' => $page_id, 'post_status' => 'virtual') );
		}
		$core->_job_contact_page_id = $page_id; //Remember the number

		/**
		* jbp_job Search
		*/
		$page_id = $core->get_post_id_by_meta(JBP_JOB_VIRTUAL_KEY, JBP_JOB_SEARCH_FLAG );
		if ( empty($page_id) ) {
			/* Construct args for the new post */
			$args = array(
			'post_title'     => sprintf( __('%s Search Virtual', JBP_TEXT_DOMAIN), $core->job_labels->singular_name),
			'post_name'      => sprintf( __('%s-search-virtual', JBP_TEXT_DOMAIN), $core->job_slug ),
			'post_status'    => 'virtual',
			'post_author'    => $current_user->ID,
			'post_type'      => 'jbp_job',
			'post_content'   => $warning . $buttons . '[jbp-job-search-page]',
			'ping_status'    => 'closed',
			'comment_status' => 'closed'
			);
			$page_id = wp_insert_post( $args );
			$page = get_post($page_id);
			add_post_meta( $page_id, JBP_JOB_VIRTUAL_KEY, JBP_JOB_SEARCH_FLAG);
		} else {
			//Make sure it stays virtual
			if( !in_array($page->post_status, array('virtual', 'trash') ) ) 
			wp_update_post( array('ID' => $page_id, 'post_status' => 'virtual') );
		}
		$core->_job_search_page_id = $page_id; //Remember the number

		/**
		* jbp_job Single
		*/
		$page_id= $core->get_post_id_by_meta(JBP_JOB_VIRTUAL_KEY, JBP_JOB_SINGLE_FLAG );
		if ( empty($page_id) ) {
			/* Construct args for the new post */
			$args = array(
			'post_title'     => sprintf( __('%s Single Virtual', JBP_TEXT_DOMAIN), $core->job_labels->singular_name),
			'post_name'      => sprintf( __('%s-single-virtual', JBP_TEXT_DOMAIN), $core->job_slug ),
			'post_status'    => 'virtual',
			'post_author'    => $current_user->ID,
			'post_type'      => 'jbp_job',
			'post_content'   => $warning . $buttons . '[jbp-job-single-page]',
			'ping_status'    => 'closed',
			'comment_status' => 'closed'
			);
			$page_id = wp_insert_post( $args );
			$page = get_post($page_id);
			add_post_meta( $page_id, JBP_JOB_VIRTUAL_KEY, JBP_JOB_SINGLE_FLAG);
		} else {
			//Make sure it stays virtual
			if( !in_array($page->post_status, array('virtual', 'trash') ) ) 
			wp_update_post( array('ID' => $page_id, 'post_status' => 'virtual') );
		}
		$core->_job_single_page_id = $page_id; //Remember the number

		/**
		* jbp_pro Update
		*/
		$page_id = $core->get_post_id_by_meta(JBP_JOB_VIRTUAL_KEY, JBP_JOB_UPDATE_FLAG );
		if ( empty($page_id) ) {
			/* Construct args for the new post */
			$args = array(
			'post_title'     => sprintf( __('Add a %s', JBP_TEXT_DOMAIN), $core->job_labels->singular_name),
			'post_name'      => sprintf( __('add-a-%s', JBP_TEXT_DOMAIN), $core->job_slug ),
			'post_status'    => 'virtual',
			'post_author'    => $current_user->ID,
			'post_type'      => 'jbp_job',
			'post_content'   => $warning . $buttons . '[jbp-job-update-page]',
			'ping_status'    => 'closed',
			'comment_status' => 'closed'
			);
			$page_id = wp_insert_post( $args );
			$page = get_post($page_id);
			add_post_meta( $page_id, JBP_JOB_VIRTUAL_KEY, JBP_JOB_UPDATE_FLAG);
		} else {
			//Make sure it stays virtual
			if( !in_array($page->post_status, array('virtual', 'trash') ) ) 
			wp_update_post( array('ID' => $page_id, 'post_status' => 'virtual') );
		}
		$core->_job_update_page_id = $page_id; //Remember the number
		/**
		 * jbp_job when empty job
		 */

		$page_id = $core->get_post_id_by_meta(JBP_JOB_VIRTUAL_KEY, JBP_JOB_EMPTY_FLAG );
		if ( empty($page_id) ) {
			/* Construct args for the new post */
			$args = array(
				'post_title'     => sprintf( __('No %s Found', JBP_TEXT_DOMAIN), $core->job_labels->name),
				'post_name'      => sprintf( __('no-%s-found', JBP_TEXT_DOMAIN), $core->job_slug ),
				'post_status'    => 'virtual',
				'post_author'    => $current_user->ID,
				'post_type'      => 'jbp_job',
				'post_content'   => $warning . $buttons . '[jbp-job-archive-page]',
				'ping_status'    => 'closed',
				'comment_status' => 'closed'
			);
			$page_id = wp_insert_post( $args );
			$page = get_post($page_id);
			add_post_meta( $page_id, JBP_JOB_VIRTUAL_KEY, JBP_JOB_EMPTY_FLAG);
		} else {
			//Make sure it stays virtual
			if( !in_array($page->post_status, array('virtual', 'trash') ) )
				wp_update_post( array('ID' => $page_id, 'post_status' => 'virtual') );
		}
		$core->_job_update_page_id = $page_id; //Remember the number

		/**
		* PRO VIRTUALS
		*/

		/**
		* jbp_pro Archive
		*/
		$page_id = $core->get_post_id_by_meta(JBP_PRO_VIRTUAL_KEY, JBP_PRO_ARCHIVE_FLAG );
		if ( empty($page_id) ) {
			/* Construct args for the new post */
			$args = array(
			'post_title'     => sprintf( __('%s Listing Page', JBP_TEXT_DOMAIN), $core->pro_labels->singular_name),
			'post_name'      => sprintf( __('%s-archive-virtual', JBP_TEXT_DOMAIN), $core->pro_slug ),
			'post_status'    => 'virtual',
			'post_author'    => $current_user->ID,
			'post_type'      => 'jbp_pro',
			'post_content'   => $warning . $buttons . '[jbp-expert-archive-page]',
			'ping_status'    => 'closed',
			'comment_status' => 'closed'
			);
			$page_id = wp_insert_post( $args );
			$page = get_post($page_id);
			add_post_meta( $page_id, JBP_PRO_VIRTUAL_KEY, JBP_PRO_ARCHIVE_FLAG);
		} else {
			//Make sure it stays virtual
			if( !in_array($page->post_status, array('virtual', 'trash') ) ) 
			wp_update_post( array('ID' => $page_id, 'post_status' => 'virtual') );
		}
		$core->_pro_archive_page_id = $page_id; //Remember the number

		/**
		* jbp_pro Taxonomy
		*/
		$page_id = $core->get_post_id_by_meta(JBP_PRO_VIRTUAL_KEY, JBP_PRO_TAXONOMY_FLAG );
		if ( empty($page_id) ) {
			/* Construct args for the new post */
			$args = array(
			'post_title'     => sprintf( __('%s Taxonomy Virtual', JBP_TEXT_DOMAIN), $core->pro_labels->singular_name),
			'post_name'      => sprintf( __('%s-taxonomy-virtual', JBP_TEXT_DOMAIN), $core->pro_slug ),
			'post_status'    => 'virtual',
			'post_author'    => $current_user->ID,
			'post_type'      => 'jbp_pro',
			'post_content'   => $warning . $buttons . '[jbp-expert-taxonomy-page]',
			'ping_status'    => 'closed',
			'comment_status' => 'closed'
			);
			$page_id = wp_insert_post( $args );
			$page = get_post($page_id);
			add_post_meta( $page_id, JBP_PRO_VIRTUAL_KEY, JBP_PRO_TAXONOMY_FLAG);
		} else {
			//Make sure it stays virtual
			if( !in_array($page->post_status, array('virtual', 'trash') ) ) 
			wp_update_post( array('ID' => $page_id, 'post_status' => 'virtual') );
		}
		$core->_pro_taxonomy_page_id = $page_id; //Remember the number

		/**
		* jbp_pro Contact
		*/
		$page_id = $core->get_post_id_by_meta(JBP_PRO_VIRTUAL_KEY, JBP_PRO_CONTACT_FLAG );
		if ( empty($page_id) ) {
			/* Construct args for the new post */
			$args = array(
			'post_title'     => sprintf( __('%s Contact Virtual', JBP_TEXT_DOMAIN), $core->pro_labels->singular_name),
			'post_name'      => sprintf( __('%s-contact-virtual', JBP_TEXT_DOMAIN), $core->pro_slug ),
			'post_status'    => 'virtual',
			'post_author'    => $current_user->ID,
			'post_type'      => 'jbp_pro',
			'post_content'   => $warning . $buttons . '[jbp-expert-contact-page]',
			'ping_status'    => 'closed',
			'comment_status' => 'closed'
			);
			$page_id = wp_insert_post( $args );
			$page = get_post($page_id);
			add_post_meta( $page_id, JBP_PRO_VIRTUAL_KEY, JBP_PRO_CONTACT_FLAG);
		} else {
			//Make sure it stays virtual
			if( !in_array($page->post_status, array('virtual', 'trash') ) ) 
			wp_update_post( array('ID' => $page_id, 'post_status' => 'virtual') );
		}
		$core->_pro_contact_page_id = $page_id; //Remember the number

		/**
		* jbp_pro Search
		*/
		$page_id = $core->get_post_id_by_meta(JBP_PRO_VIRTUAL_KEY, JBP_PRO_SEARCH_FLAG );
		if ( empty($page_id) ) {
			/* Construct args for the new post */
			$args = array(
			'post_title'     => sprintf( __('%s Search Virtual', JBP_TEXT_DOMAIN), $core->pro_labels->singular_name),
			'post_name'      => sprintf( __('%s-search-virtual', JBP_TEXT_DOMAIN), $core->pro_slug ),
			'post_status'    => 'virtual',
			'post_author'    => $current_user->ID,
			'post_type'      => 'jbp_pro',
			'post_content'   => $warning . $buttons . '[jbp-expert-search-page]',
			'ping_status'    => 'closed',
			'comment_status' => 'closed'
			);
			$page_id = wp_insert_post( $args );
			$page = get_post($page_id);
			add_post_meta( $page_id, JBP_PRO_VIRTUAL_KEY, JBP_PRO_SEARCH_FLAG);
		} else {
			//Make sure it stays virtual
			if( !in_array($page->post_status, array('virtual', 'trash') ) ) 
			wp_update_post( array('ID' => $page_id, 'post_status' => 'virtual') );
		}
		$core->_pro_search_page_id = $page_id; //Remember the number

		/**
		* jbp_pro Single
		*/
		$page_id = $core->get_post_id_by_meta(JBP_PRO_VIRTUAL_KEY, JBP_PRO_SINGLE_FLAG );
		if ( empty($page_id) ) {
			/* Construct args for the new post */
			$args = array(
			'post_title'     => sprintf( __('%s Single Virtual', JBP_TEXT_DOMAIN), $core->pro_labels->singular_name),
			'post_name'      => sprintf( __('%s-single-virtual', JBP_TEXT_DOMAIN), $core->pro_slug ),
			'post_status'    => 'virtual',
			'post_author'    => $current_user->ID,
			'post_type'      => 'jbp_pro',
			'post_content'   => $warning . $buttons . '[jbp-expert-single-page]',
			'ping_status'    => 'closed',
			'comment_status' => 'closed'
			);
			$page_id = wp_insert_post( $args );
			$page = get_post($page_id);
			add_post_meta( $page_id, JBP_PRO_VIRTUAL_KEY, JBP_PRO_SINGLE_FLAG);
		} else {
			//Make sure it stays virtual
			if( !in_array($page->post_status, array('virtual', 'trash') ) ) 
			wp_update_post( array('ID' => $page_id, 'post_status' => 'virtual') );
		}
		$core->_pro_single_page_id = $page_id; //Remember the number

		/**
		* jbp_pro Update
		*/
		$page_id = $core->get_post_id_by_meta(JBP_PRO_VIRTUAL_KEY, JBP_PRO_UPDATE_FLAG );
		if ( empty($page_id) ) {
			/* Construct args for the new post */
			$args = array(
			'post_title'     => sprintf( __('Add a new %s', JBP_TEXT_DOMAIN), $core->pro_labels->singular_name),
			'post_name'      => sprintf( __('add-a-new-%s', JBP_TEXT_DOMAIN), $core->pro_slug ),
			'post_status'    => 'virtual',
			'post_author'    => $current_user->ID,
			'post_type'      => 'jbp_pro',
			'post_content'   => $warning . $buttons . '[jbp-expert-update-page]',
			'ping_status'    => 'closed',
			'comment_status' => 'closed'
			);
			$page_id = wp_insert_post( $args );
			$page = get_post($page_id);
			add_post_meta( $page_id, JBP_PRO_VIRTUAL_KEY, JBP_PRO_UPDATE_FLAG);
		} else {
			//Make sure it stays virtual
			if( !in_array($page->post_status, array('virtual', 'trash') ) ) 
			wp_update_post( array('ID' => $page_id, 'post_status' => 'virtual') );
		}
		$core->_pro_update_page_id = $page_id; //Remember the number

		/*****************************************************************************************
		* DEMO PAGES
		*/
		$page_id = $core->get_post_id_by_meta(JBP_DEMO_VIRTUAL_KEY, JBP_DEMO_LANDING_FLAG );
		if ( empty($page_id) ) {
			/* Construct args for the new post */
			$args = array(
			'post_title'     => __('Jobs & Experts', JBP_TEXT_DOMAIN),
			'post_name'      => __('jobs-experts', JBP_TEXT_DOMAIN),
			'post_status'    => 'publish',
			'post_author'    => $current_user->ID,
			'post_type'      => 'page',
			'post_content'   => $warning . $buttons . '[jbp-landing-page]',
			'ping_status'    => 'closed',
			'comment_status' => 'closed'
			);
			$page_id = wp_insert_post( $args );
			$page = get_post($page_id);
			add_post_meta( $page_id, JBP_DEMO_VIRTUAL_KEY, JBP_DEMO_LANDING_FLAG);
		} else {
		}
		//$core->_demo_landing_page_id = $page_id; //Remember the number

	}	
}

new Jobs_Plus_Virtual;

endif;
