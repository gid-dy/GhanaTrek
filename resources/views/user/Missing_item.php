<?php
require_once(realpath(dirname(__FILE__)) . '/Login.php');

use Login;

/**
 * @access public
 * @author OGIDI
 * @package class_model
 */
class Missing_item {
	/**
	 * @AttributeType int
	 */
	private $_missing_ItemId;
	/**
	 * @AttributeType String
	 */
	private $_title;
	/**
	 * @AttributeType String
	 */
	private $_missing_Content;
	/**
	 * @AttributeType String
	 */
	private $_picture_Dir;
	/**
	 * @AttributeType String
	 */
	private $_contact;
	/**
	 * @AttributeType Date
	 */
	private $_date;
	/**
	 * @AttributeType Time
	 */
	private $_time;
	/**
	 * @AttributeType Login
	 * /**
	 *  * @AssociationType Login
	 *  * @AssociationMultiplicity 1
	 *  * /
	 */
	public $_login;
}
?>