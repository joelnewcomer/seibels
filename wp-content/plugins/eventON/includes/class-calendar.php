<?php
/**
 * EVO Calendar
 * @version 2.6.1
 */

class EVO_Calendar{
	private $props = false;
	public function __construct($tab, $options_pre = 'evcal_options_', $init=false, $options_values=''){
		$this->tab = $tab;
		$this->pre = $options_pre;

		if($init){
			$this->init();
		}else{
			if(!empty($options_values)){
				$this->props = $options_values;
			}else{
				$this->props = get_option( $this->pre .$this->tab);
			}			
		}
	}

// INIT
	private function init(){	
		if(array_key_exists('EVO_Settings', $GLOBALS) && isset($GLOBALS['EVO_Settings'][$this->pre .$this->tab])){
			global $EVO_Settings;
			$this->props  = $EVO_Settings[$this->pre .$this->tab];
		}else{
			$this->props = get_option( $this->pre .$this->tab);
			$GLOBALS['EVO_Settings'][$this->pre .$this->tab] = $this->props;
		}
		
	}

	private function set_prop($options_field_name){
		$this->props = get_option( $options_field_name );
	}

	function get_prop($field){
		if(!isset($this->props[$field])) return false;
		return maybe_unserialize($this->props[$field]);
	}

	// @since 2.6.7
	function is_yes($field){
		if(!isset($this->props[$field])) return false;
		if( $this->props[$field]!= 'yes') return false;
		return true;
	}


}