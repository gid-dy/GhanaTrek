<?php
require_once(realpath(dirname(__FILE__)) . '/Culprit_information.php');
require_once(realpath(dirname(__FILE__)) . '/Offence_type.php');

use Culprit_information;
use Offence_type;

/**
 * @access public
 * @author OGIDI
 * @package class_model
 */
class Little_but_valid_info {
	/**
	 * @AttributeType int
	 */
	private $_little_Valid_InfoId;
	/**
	 * @AttributeType String
	 */
	private $_just_Little_Contact;
	/**
	 * @AttributeType String
	 */
	private $_just_Little_OtherInfo;
	/**
	 * @AttributeType Culprit_information
	 * /**
	 *  * @AssociationType Culprit_information
	 *  * @AssociationMultiplicity 1
	 *  * /
	 */
	public $_culprit_Information;
	/**
	 * @AttributeType Offence_type
	 * /**
	 *  * @AssociationType Offence_type
	 *  * @AssociationMultiplicity 1
	 *  * /
	 */
	public $_offence;
}
?>