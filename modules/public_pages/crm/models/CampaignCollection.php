<?php
 
/** 
 *	(c) 2017 uzERP LLP (support#uzerp.com). All rights reserved. 
 * 
 *	Released under GPLv3 license; see LICENSE. 
 **/
class CampaignCollection extends DataObjectCollection {
	
	public $field;
		
	function __construct($do='Campaign', $tablename='campaignsoverview') {
		parent::__construct($do, $tablename);
			
		$this->view='';
	}
		
}
?>