<?php

namespace bin\database\requests\insert;

use \bin\database\config\process;

class if_not_exist{

    /**
     * **********************************************************************************************
     * Get class
     * @return void
    */   
    function __construct()
    {
      $this->request = new process;
    } 

    /**
     * **********************************************************************************************
     * Create auth_secure if not exist
    */
    private function create_auth_secure_if_not_exist()
    {

      $sql = "CREATE TABLE IF NOT EXISTS auth_secure (idtoken_secure int(11) NOT NULL auto_increment , auth varchar(300)NOT NULL , auth_key varchar(700)NOT NULL , PRIMARY KEY(idtoken_secure) , INDEX (auth) )";        

      $this->request->insert( $sql , NULL , NULL , false , 1 );

    }  
    
    /**
     * ********************************************************************************************** 
     * Create user if not exist
    */
    private function create_user_if_not_exist()
    {

      $sql = "CREATE TABLE IF NOT EXISTS user_bd (iduser_bd int(11) NOT NULL auto_increment , loginuser_bd varchar(200)NOT NULL , mdpuser_bd varchar(700)NOT NULL , type_user_bd int(1)NOT NULL , PRIMARY KEY(iduser_bd) , INDEX (loginuser_bd) )";        

      $this->request->insert( $sql , NULL , NULL , false , 1 );

    }  
    
    /**
     * ********************************************************************************************** 
     * Create user right if not exist
    */
    private function create_user_right_if_not_exist()
    {

      $sql = "CREATE TABLE IF NOT EXISTS user_rights (iduser_rights int(11) NOT NULL auto_increment , modules varchar(200)NOT NULL  , idpages varchar(200)NOT NULL , idtype_user_rights int(11)NOT NULL  , menus varchar(200)NOT NULL , autorisations int(1)NOT NULL , PRIMARY KEY(iduser_rights) , INDEX (idtype_user_rights) , INDEX(menus) )";        

      $this->request->insert( $sql , NULL , NULL , false , 1 );

    }   
       
    
    /** 
     * **********************************************************************************************
     * Create user and auth_secure if not exist
    */    
    public function create_table()
    {

        $this->create_user_right_if_not_exist();
        
        $this->create_user_if_not_exist();
        
        $this->create_auth_secure_if_not_exist();

    }

}