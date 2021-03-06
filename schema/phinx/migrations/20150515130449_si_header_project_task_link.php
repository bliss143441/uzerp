<?php

use Phinx\Migration\AbstractMigration;

class SiHeaderProjectTaskLink extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     *
     * Uncomment this method if you would like to use it.
     *
  
  */
     
    public function change()
    {	
    // save the dependencies for si_header		
		$this->query("select deps_save_and_drop_dependencies('public', 'si_header')");
		
		// update si_header to accept the projects and tasks 
		$siheader = $this->table('si_header');
    	$siheader->addColumn('project_id', 'biginteger', array('null' => true,))
    				->addForeignKey('project_id', 'projects', 'id')
    				->addColumn('task_id', 'biginteger', array('null' => true,))
    				->addForeignKey('task_id', 'tasks', 'id')
    				->save();
    				
		//restore any dependencies    				
		$this->query("select deps_restore_dependencies('public', 'si_header')"); 
    }
      /**
     * Migrate Up.
     */

    public function up()
	 {
	 	
		
   }


    /**
     * Migrate Down.
     */
    public function down()
    {
 

    }
}