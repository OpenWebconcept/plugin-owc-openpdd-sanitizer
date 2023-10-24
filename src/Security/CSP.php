<?php
/**
 * CSP.
 *
 * @package OWC_OpenPDD_Sanitizer
 * @author  Yard | Digital Agency
 * @since   0.0.1
 */

declare ( strict_types = 1 );

namespace OWCOpenPDDSanitizer\Security;

/**
 * Exit when accessed directly.
 */
if ( ! defined( 'ABSPATH' )) {
	exit;
}

/**
 * Class to add CSPs.
 *
 * @since 0.0.1
 */
class CSP
{
	protected string $content;

	protected string $nonce_script;

	protected string $nonce_style;

	private function __construct(string $content, string $nonce_script, string $nonce_style )
	{
		$this->content      = $content;
		$this->nonce_script = $nonce_script;
		$this->nonce_style  = $nonce_style;
	}

	public static function make(string $content, string $nonce_script, $nonce_style ): self
	{
		return new static( $content, $nonce_script, $nonce_style );
	}

	public function add(): string
	{
		$content = preg_replace( $this->get_script_regex(), "<$1 nonce=\"{$this->get_nonce_script()}\"$2>", $this->content );
		$content = preg_replace( $this->get_style_regex(), "<$1 nonce=\"{$this->get_nonce_style()}\"$2>", $content );
		$content = preg_replace( $this->get_html_regex(), "$1nonce=\"{$this->get_nonce_script()}\" $2", $content );
		return $content;
	}

	protected function get_script_regex(): string
	{
		return '/<(script)((?:(?!nonce).)*?)>/';
	}

	protected function get_style_regex(): string
	{
		return '/<(style)((?:(?!nonce).)*?)>/';
	}

	protected function get_html_regex(): string
	{
		return '/(<[^>]*)(on(?:change|click|mouseover|mouseout|keydown|load)\s*=\s*(?:\'|")(?:[^>](?:(?!nonce).)*>))/';
	}

	/**
	 * Get the value of script nonce.
	 */
	public function get_nonce_script(): string
	{
		return $this->nonce_script;
	}

	/**
	 * Get the value of style nonce.
	 */
	public function get_nonce_style(): string
	{
		return $this->nonce_style;
	}
}
