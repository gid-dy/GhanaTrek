<?php
require_once(realpath(dirname(__FILE__)) . '/Login.php');

use Login;

/**
 * @access public
 * @author OGIDI
 * @package class_model
 */
class News {
	/**
	 * @AttributeType int
	 */
	private $_newsId;
	/**
	 * @AttributeType String
	 */
	private $_title;
	/**
	 * @AttributeType String
	 */
	private $_news_Content;
	/**
	 * @AttributeType String
	 */
	private $_source_Or_Link;
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