<?php
/**
 * DVME SQLi Special page.
 *
 * @file
 */

namespace MediaWiki\Extension\DVME;

use MediaWiki\MediaWikiServices;

class SpecialSQLi extends \FormSpecialPage {

	private $status;

	/**
	 * Initialize the special page.
	 */
	public function __construct() {
		parent::__construct( 'SQLi' );
	}

	/**
	 * Display page with SQLi vulns
	 */
	public function execute( $par ) {
		$out = $this->getOutput();
		$out->setPageTitle( $this->msg( 'dvme-sqli-title' ) );
		$out->disallowUserJs();
		parent::execute( $par );
	}

	protected function getDisplayFormat() {
		return 'ooui';
	}

	public function getDescription() {
		return $this->msg( 'dvme-sqli-title-short' )->text();
	}

	public function isListed() {
		return true;
	}

	/**
	 * Get form fields
	 */
	protected function getFormFields() {
		$user = $this->getUser();
		return [
			'FavoriteDatabase' => [
				'type' => 'text',
				'autofocus' => true,
				'maxlength' => 255,
				'label-message' => 'dvme-sqli-favorite-database',
				'default' => '',
			]
		];
	}

	/**
	 * onSubmit
	 */
	public function onSubmit( array $data ) {
		# try db insert
		$lb = MediaWikiServices::getInstance()->getDBLoadBalancer();
		$dbw = $lb->getConnectionRef( DB_PRIMARY );

		

		$out = $this->getOutput();
		$html = "hello";
		$out->addHTML ( $html );
	}
}
