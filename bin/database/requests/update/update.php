<?php

namespace bin\database\requests\update;

use bin\database\config\process;

class update{

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

    /** **********************************************************************************************
     * Request to update users rights
     * 
     * @param int|null $idtype_user
     * @param int|null $etat
     * @return bool
    */
    public function users_rights( ?int $idtype_user=null , ?int $etat=null )
    {

        $json_arr = json_decode($this->json_datas, true);

        foreach ($json_arr as $key => $value) {
            
            if ($value['iduser_rights'] == $idtype_user) { 

                $json_arr[$key]['autorisations'] = $etat;
            }
        }

        file_put_contents( _DIR_DATAS_ .'json_data.json', json_encode($json_arr));

        return true;        

    }      

    /************************************************************************************************
     * Request to select all users of database
    */
    public function users(){

        $sql = $this->QueryBuilder() 
                    -> table('user_bd') 
                    -> UQuery(NULL);

        $result = $this->process->update( $sql , null , null , true , 1);

        return $result;        

    }



}