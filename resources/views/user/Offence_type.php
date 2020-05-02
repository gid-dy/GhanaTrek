<?php
require_once(realpath(dirname(__FILE__)) . '/Complainant.php');
require_once(realpath(dirname(__FILE__)) . '/Enough_and_valid_info.php');
require_once(realpath(dirname(__FILE__)) . '/Little_but_valid_info.php');

use Complainant;
use Enough_and_valid_info;
use Little_but_valid_info;

/**
 * @access public
 * @author OGIDI
 * @package class_model
 */
class Offence_type {
	/**
	 * @AttributeType int
	 */
	private $_offenceId;
	/**
	 * @AttributeType String
	 */
	private $_offence_Type;
	/**
	 * @AttributeType String
	 */
	private $_incident_Location;
	/**
	 * @AttributeType Date
	 */
	private $_date;
	/**
	 * @AttributeType Time
	 */
	private $_time;
	/**
	 * @AttributeType String
	 */
	private $_voice_Note_Dir;
	/**
	 * @AttributeType String
	 */
	private $_additional_Info;
	/**
	 * @AttributeType Complainant
	 * /**
	 *  * @AssociationType Complainant
	 *  * @AssociationMultiplicity 0..*
	 *  * /
	 */
	public $_complainant = array();
	/**
	 * @AttributeType Enough_and_valid_info
	 * /**
	 *  * @AssociationType Enough_and_valid_info
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