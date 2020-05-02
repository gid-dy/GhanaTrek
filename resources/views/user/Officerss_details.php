<?php
require_once(realpath(dirname(__FILE__)) . '/Report_type.php');

use Report_type;

/**
 * @access public
 * @author OGIDI
 * @package class_model
 */
class Officerss_details {
	/**
	 * @AttributeType int
	 */
	private $_officers_DetailsId;
	/**
	 * @AttributeType String
	 */
	private $_off_Fname;
	/**
	 * @AttributeType String
	 */
	private $_off_Mname;
	/**
	 * @AttributeType String
	 */
	private $_off_Lname;
	/**
	 * @AttributeType String
	 */
	private $_off_station;
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
	private $_item_Name;
	/**
	 * @AttributeType Report_type
	 * /**
	 *  * @AssociationType Report_type
	 *  * @AssociationMultiplicity 1
	 *  * /
	 */
	public $_report;
}
?>