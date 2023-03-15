<?php
/**
 * DVME XSS Special page.
 *
 * @file
 */

namespace MediaWiki\Extension\DVME;

class SpecialXSS extends \FormSpecialPage {

	private $status;

	/**
	 * Initialize the special page.
	 */
	public function __construct() {
		parent::__construct( 'XSS' );
	}

	/**
	 * Display page with XSS vulns
	 */
	public function execute( $par ) {
		$out = $this->getOutput();
		$out->setPageTitle( $this->msg( 'dvme-xss-title' ) );
		$out->disallowUserJs();

		$request = $this->getRequest();
		$errorMsg = $request->getVal( 'errorMsg' );
		$out->addHTML (
			\Html::rawElement( 'span', [], $errorMsg )
		);

		parent::execute( $par );
	}

	public function getDescription() {
		return $this->msg( 'dvme-xss-title-short' )->text();
	}

	protected function getDisplayFormat() {
		return 'ooui';
	}

	public function isListed() {
		return true;
	}

	/**
	 * Get form fields
	 */
	protected function getFormFields() {
		return [
			'FavoriteColor' => [
				'type' => 'text',
				'autofocus' => true,
				'maxlength' => 255,
				'label-message' => 'dvme-xss-favorite-color',
				'default' => '',
			]
		];
	}

	/**
	 * onSubmit
	 */
	public function onSubmit( array $data ) {
		$out = $this->getOutput();
		$html = \Html::rawElement( 'strong', [], $this->msg( 'dvme-xss-favorite-color' ).' ' ) .
			\Html::rawElement( 'span', [], $data['FavoriteColor'] );
 
		$out->addHTML ( $html );
	}
}
