<?php
require_once(realpath(dirname(__FILE__)) . '/Enough_and_valid_info.php');
require_once(realpath(dirname(__FILE__)) . '/Little_but_valid_info.php');

use Enough_and_valid_info;
use Little_but_valid_info;

/**
 * @access public
 * @author OGIDI
 * @package class_model
 */
class Culprit_information {
	/**
	 * @AttributeType int
	 */
	private $_culprit_Informationid;
	/**
	 * @AttributeType String
	 */
	private $_culprit_Information_Type;
	/**
	 * @AttributeType class model\Enough_and_valid_info
	 * /**
	 *  * @AssociationType class model\Enough_and_valid_info
	 *  * @AssociationMultiplicity 0..*
	 *  * /
	 */
	public $_enough_and_valid_info = array();
	/**
	 * @AttributeType Little_but_valid_info
	 * /**
	 *  * @AssociationType Little_but_valid_info
	 *  * @AssociationMultiplicity 0..*
	 *  * /
	 */
	public $_little_but_valid_info = array();
}
?>