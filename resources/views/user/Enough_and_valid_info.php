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
class Enough_and_valid_info {
	/**
	 * @AttributeType int
	 */
	private $_enough_Valid_InfoId;
	/**
	 * @AttributeType String
	 */
	private $_culprit_Fname;
	/**
	 * @AttributeType String
	 */
	private $_culprit_Mname;
	/**
	 * @AttributeType String
	 */
	private $_culprit_Lname;
	/**
	 * @AttributeType String
	 */
	private $_culprit_Program;
	/**
	 * @AttributeType String
	 */
	private $_culprit_Year;
	/**
	 * @AttributeType String
	 */
	private $_culprit_Hostel;
	/**
	 * @AttributeType String
	 */
	private $_culprit_Room_Numb;
	/**
	 * @AttributeType String
	 */
	private $_culprit_OtherInfo;
	/**
	 * @AttributeType String
	 */
	private $_culprit_Contact;
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