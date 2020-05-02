<?php
require_once(realpath(dirname(__FILE__)) . '/Complainant.php');
require_once(realpath(dirname(__FILE__)) . '/Officerss_details.php');

use Complainant;
use Officerss_details;

/**
 * @access public
 * @author OGIDI
 * @package class_model
 */
class Report_type {
	/**
	 * @AttributeType int
	 */
	private $_reportId;
	/**
	 * @AttributeType String
	 */
	private $_report_Type;
	/**
	 * @AttributeType Complainant
	 * /**
	 *  * @AssociationType Complainant
	 *  * @AssociationMultiplicity 0..*
	 *  * /
	 */
	public $_complainant = array();
	/**
	 * @AttributeType Officerss_details
	 * /**
	 *  * @AssociationType Officerss_details
	 *  * @AssociationMultiplicity 0..*
	 *  * /
	 */
	public $_officerss_details = array();
}
?>