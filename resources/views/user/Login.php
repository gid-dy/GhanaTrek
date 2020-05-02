<?php
require_once(realpath(dirname(__FILE__)) . '/Complainant.php');
require_once(realpath(dirname(__FILE__)) . '/Missing_item.php');
require_once(realpath(dirname(__FILE__)) . '/News.php');

use Complainant;
use Missing_item;
use News;

/**
 * @access public
 * @author OGIDI
 * @package class_model
 */
class Login {
	/**
	 * @AttributeType int
	 */
	private $_loginId;
	/**
	 * @AttributeType String
	 */
	private $_username;
	/**
	 * @AttributeType String
	 */
	private $_password;
	/**
	 * @AttributeType class model\Complainant
	 * /**
	 *  * @AssociationType class model\Complainant
	 *  * @AssociationMultiplicity 0..*
	 *  * /
	 */
	public $_complainant = array();
	/**
	 * @AttributeType Missing_item
	 * /**
	 *  * @AssociationType Missing_item
	 *  * @AssociationMultiplicity 0..*
	 *  * /
	 */
	public $_missing_item = array();
	/**
	 * @AttributeType News
	 * /**
	 *  * @AssociationType News
	 *  * @AssociationMultiplicity 0..*
	 *  * /
	 */
	public $_news = array();
}
?>