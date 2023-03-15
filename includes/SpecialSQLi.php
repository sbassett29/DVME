<?php
/**
 * DVME SQLi Special page.
 *
 * @file
 */

namespace MediaWiki\Extension\DVME;

class SpecialSQLi extends \SpecialPage {

	/**
	 * Initialize the special page.
	 */
	public function __construct() {
		// A special page should at least have a name.
		// We do this by calling the parent class (the SpecialPage class)
		// constructor method with the name as first and only parameter.
		parent::__construct( 'SQLi' );
	}

	/**
	 * Display page with XSS vulns
	 */
	public function execute() {
		$out = $this->getOutput();
		$out->setPageTitle( $this->msg( 'dvme-sqli-title' ) );
	}
}
