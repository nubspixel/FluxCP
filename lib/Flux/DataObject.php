<?php
require_once 'Flux/Config.php';
require_once 'Flux/Error.php';

/**
 * Objectifies a given object.
 */
class Flux_DataObject {
	/**
	 * Storage object.
	 *
	 * @access protected
	 * @var array
	 */
	protected $_data = array();

	/**
	 *
	 */
	protected $_dbConfig;

	/**
	 *
	 */
	protected $_encFrom;

	/**
	 *
	 */
	protected $_encTo;

	/**
	 * Create new DataObject.
	 *
	 * @param StdClass $object
	 * @param array $default Default values
	 * @access public
	 */
	public function __construct(array $data = null, $defaults = array())
	{
		if (array_key_exists('dbconfig', $defaults) && $defaults['dbconfig'] instanceOf Flux_Config) {
			$this->_dbConfig = $defaults['dbconfig'];
			unset($defaults['dbconfig']);
		}
		else {
			$tmpArr = array();
			$this->_dbConfig = new Flux_Config($tmpArr);
		}

		$this->_encFrom = $this->_dbConfig->getEncoding();
		$this->_encTo   = $this->_encFrom ? $this->_dbConfig->get('Convert') : false;

		if (!is_null($data)) {
			$this->_data = $data;
		}

		foreach ($defaults as $prop => $value) {
			if (!isset($this->_data[$prop])) {
				$this->_data[$prop] = $value;
			}
		}

		if ($this->_encTo) {
			foreach ($this->_data as $prop => $value) {
				$this->_data[$prop] = iconv($this->_encFrom, $this->_encTo, $value);
			}
		}
	}

	public function __set($prop, $value)
	{
		$this->_data[$prop] = $value;
		return $value;
	}

	public function __get($prop)
	{
		if (isset($this->_data[$prop])) {
			return $this->_data[$prop];
		}
		else {
			return null;
		}
	}

	public function removeAttributes($attrs = array()) {
		if(!empty($attrs) && sizeof($attrs)) {
			foreach ($attrs as $key => $value) {
				unset($this->_data[$value]);
			}
		}
	}

	public function groupAttributes($parent_name = "", $childs = array(), $trim = "")
	{
		if(!isset($this->$parent_name) || ! is_array($this->$parent_name))
			$this->_data[$parent_name] = array();

		foreach ($childs as $key => $child_name) {
			if($this->$child_name) {
				$key_name = (! empty($trim) ? str_replace($trim, "", $child_name) : $child_name);
				$this->_data[$parent_name][] = $key_name;
			}
		}
		$this->removeAttributes($childs);
	}

	public function groupLocationAttributes() {
		$attrs = array('location_head_top','location_head_mid','location_head_low','location_armor','location_right_hand','location_left_hand','location_garment','location_shoes','location_right_accessory','location_left_accessory','location_costume_head_top','location_costume_head_mid','location_costume_head_low','location_costume_garment','location_ammo','location_shadow_armor','location_shadow_weapon','location_shadow_shield','location_shadow_shoes','location_shadow_right_accessory','location_shadow_left_accessory');
		$this->groupAttributes('location_data', $attrs, array('location_'));
	}

	public function groupClassAttributes() {
		$attrs = array('class_all', 'class_normal', 'class_upper', 'class_baby', 'class_third', 'class_third_upper', 'class_third_baby');
		$this->groupAttributes('class_data', $attrs, array('class_'));
	}

	public function groupJobAttributes() {
		$attrs = array('job_all', 'job_acolyte', 'job_alchemist', 'job_archer', 'job_assassin', 'job_barddancer', 'job_blacksmith', 'job_crusader', 'job_gunslinger', 'job_hunter', 'job_kagerouoboro', 'job_knight', 'job_mage', 'job_merchant', 'job_monk', 'job_ninja', 'job_novice', 'job_priest', 'job_rebellion', 'job_rogue', 'job_sage', 'job_soullinker', 'job_stargladiator', 'job_summoner', 'job_supernovice', 'job_swordman', 'job_taekwon', 'job_thief', 'job_wizard');
		$this->groupAttributes('jobs_data', $attrs, array('jobs_'));
	}
}
?>
