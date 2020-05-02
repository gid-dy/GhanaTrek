<?php
require_once(realpath(dirname(__FILE__)) . '/Evidence_option.php');

use Evidence_option;

/**
 * @access public
 * @author OGIDI
 * @package class_model
 */
class Video {
	/**
	 * @AttributeType int
	 */
	private $_videoId;
	/**
	 * @AttributeType String
	 */
	private $_video_Dir;
	/**
	 * @AttributeType Evidence_option
	 * /**
	 *  * @AssociationType Evidence_option
	 *  * @AssociationMultiplicity 1
	 *  * /
	 */
	public $_evidence;
}
?>