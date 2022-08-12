<?php

namespace bin\database\requests\select;

use bin\database\config\process;

class select{

    /**
     * Get class
     * @return void
    */
    function __construct()
    {
      $this->process = new process;
      $this->datas = new \bin\database\datas\datas;
      $this->session = new \bin\epaphrodite\auth\session_auth;
      $this->json_datas = file_get_contents( _DIR_DATAS_ .'json_data.json');
    }      

    /************************************************************************************************
     * Querybilder constructor
     *
     * @return \bin\database\querybilder\querybuilder
    */    
    private function QueryBuilder(): \bin\database\querybilder\querybuilder
    {
        return new \bin\database\querybilder\querybuilder();
    }  
    
    /**
     * Get users rights datas by @id
     *
     * @param integer $id_user
     * @return array
    */
    public function list_habilitations_users()
    {

      $result = [];
      $index = $this->session->type();

      $json_arr = json_decode($this->json_datas, true);

      foreach ($json_arr as $key => $value) {
          if ($value['idtype_user_rights'] === $index) { 
              $result []= $json_arr[$key];
          }
      }
      
      return $result; 

    }      

    /************************************************************************************************
     * Request to select all users of database
    */
    public function users(){

        $sql = $this->QueryBuilder() 
                    -> table('user_bd') 
                    ->orderby('loginuser_bd', 'ASC')
                    -> SQuery(NULL);

        $result = $this->process->select( $sql , null , null , true , 1 );

        return $result;        

    }



}