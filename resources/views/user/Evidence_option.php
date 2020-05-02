<?php
require_once(realpath(dirname(__FILE__)) . '/Audio.php');
require_once(realpath(dirname(__FILE__)) . '/Picture.php');
require_once(realpath(dirname(__FILE__)) . '/Video.php');

use Audio;
use Picture;
use Video;

/**
 * @access public
 * @author OGIDI
 * @package class_model
 */
class Evidence_option {
	/**
	 * @AttributeType int
	 */
	private $_evidenceId;
	/**
	 * @AttributeType String
	 */
	private $_evidence_Option;
	/**
	 * @AttributeType class model\Audio
	 * /**
	 *  * @AssociationType class model\Audio
	 *  * @AssociationMultiplicity 0..*
	 *  * /
	 */
	public $_audio = array();
	/**
	 * @AttributeType Picture
	 * /**
	 *  * @AssociationType Picture
	 *  * @AssociationMultiplicity 0..*
	 *  * /
	 */
	public $_picture = array();
	/**
	 * @AttributeType Video
	 * /**
	 *  * @AssociationType Video
	 *  * @AssociationMultiplicity 0..*
	 *  * /
	 */
	public $_video = array();
}
?>