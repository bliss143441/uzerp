<?php
 
/** 
 *	(c) 2017 uzERP LLP (support#uzerp.com). All rights reserved. 
 * 
 *	Released under GPLv3 license; see LICENSE. 
 **/
class ExternalSystemCollection extends DataObjectCollection {

	protected $version='$Revision: 1.3 $';
	
	function __construct($do='ExternalSystem', $tablename='external_systems') {

// Contruct the object
		parent::__construct($do, $tablename);
		
	}

}
?>