<?php
require_once(realpath(dirname(__FILE__)) . '/Login.php');
require_once(realpath(dirname(__FILE__)) . '/Report_type.php');
require_once(realpath(dirname(__FILE__)) . '/Offence_type.php');

use Login;
use Report_type;
use Offence_type;

/**
 * @access public
 * @author OGIDI
 * @package class_model
 */
class Complainant {
	/**
	 * @AttributeType int
	 */
	private $_complainantId;
	/**
	 * @AttributeType String
	 */
	private $_fname;
	/**
	 * @AttributeType String
	 */
	private $_mname;
	/**
	 * @AttributeType String
	 */
	private $_lname;
	/**
	 * @AttributeType String
	 */
	private $_program;
	/**
	 * @AttributeType String
	 */
	private $_year;
	/**
	 * @AttributeType String
	 */
	private $_hostel;
	/**
	 * @AttributeType String
	 */
	private $_room_Numb;
	/**
	 * @AttributeType String
	 */
	private $_others;
	/**
	 * @AttributeType String
	 */
	private $_email;
	/**
	 * @AttributeType String
	 */
	private $_contact;
	/**
	 * @AttributeType String
	 */
	private $_relationship;
	/**
	 * @AttributeType String
	 */
	private $_detail_Relation;
	/**
	 * @AttributeType Login
	 * /**
	 *  * @AssociationType Login
	 *  * @AssociationMultiplicity 1
	 *  * /
	 */
	public $_login;
	/**
	 * @AttributeType Report_type
	 * /**
	 *  * @AssociationType Report_type
	 *  * @AssociationMultiplicity 1
	 *  * /
	 */
	public $_report;
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