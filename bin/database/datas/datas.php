<?php

namespace bin\database\datas;

class datas
{

    /**
     * Liste des types utilisateurs
     * @param int $key
     * @return array
    */
    public function user(?int $key = null)
    {

        $list =
            [
                1 => 'USER',
                2 => 'ADMIN'

            ];

        if ($key === null) {
            return $list;
        } else {
            return $list[$key];
        }

    }

    /**
     * Liste des menus de l'application
     * @param int $key
     * @return array
    */
    public function apps(?int $key = null)
    {

        $list =
            [
                'profil' => 'MON PROFIL' ,
                'right' => 'GEST. DROITS ACCESS',
                'users' => 'GEST. UTILISATEURS',
                'setting' => 'PARAMETRE SYSTEME',

            ];

        if ($key === null) {
            return $list;
        } else {
            return $list[$key];
        }
    }

    /**
     * Liste des contenus des menus de l'application
     * @param int $key
     * @return array
    */
    public function yedidiah(?string $key = null, ?string $value = null)
    {

        $paths =
            [

                'umdp' => ['apps' => 'profil', 'libelle' => "Modifier mot de passe", 'path' => $this->paths->admin('users', 'modifier_mot_de_passe') , 'right' => 'umdp' ],
                'uinfos' => ['apps' => 'profil', 'libelle' => "Modifier mes infos", 'path' => $this->paths->admin('users', 'modifier_infos_perso') , 'right' => 'uinfos' ],
                'guseright' => ['apps' => 'right', 'libelle' => "Gest. droits utilisateurs", 'path' => $this->specific_path('guseright') , 'right' => 'guseright' ],
                'adduright' => ['apps' => 'right', 'libelle' => "Ajouter des droits utilisateurs", 'path' => $this->specific_path('adduright') , 'right' => 'adduright' ],
                'addusers' => ['apps' => 'users', 'libelle' => "Ajouter utilisateurs", 'path' => $this->specific_path('addusers') , 'right' => 'addusers' ],
                'gusers' => ['apps' => 'users', 'libelle' => "Liste utilisateurs", 'path' => $this->specific_path('gusers') , 'right' => 'gusers' ],

            ];
           
            if ($key === null) {
                return $paths;
            } else {
                return $paths[$key][$value];
            }            

    }   

    /**
     * Specific path list
     * @param int $right
     * @return string
    */
    private function specific_path( ?string $right=null ){

        $type = $this->session->type();

        $list =
        [

            'adduright'=>
            [
                 1=>$this->paths->admin('users', 'import_demande_matricule_eleves') , 
                 2=>$this->paths->admin('users', 'import_demande_matricule_eleves') , 
                 3=>NULL , 4=>NULL , 5=>NULL , 6=>NULL,  7=>NULL ,
            ], 
            'guseright'=>
            [
                 1=>$this->paths->admin('users', 'liste_droits_users') , 
                 2=>$this->paths->admin('users', 'liste_droits_users') , 
                 3=>NULL , 4=>NULL , 5=>NULL , 6=>NULL,  7=>NULL ,
            ], 
            'addusers'=>
            [
                 1=>$this->paths->admin('users', 'ajouter_des_utilisateurs') , 
                 2=>$this->paths->admin('users', 'ajouter_des_utilisateurs') , 
                 3=>NULL , 4=>NULL , 5=>NULL , 6=>NULL,  7=>NULL ,
            ],             
            'gusers'=>
            [
                 1=>$this->paths->admin('users', 'liste_des_utilisateurs') , 
                 2=>$this->paths->admin('users', 'liste_des_utilisateurs') , 
                 3=>NULL , 4=>NULL , 5=>NULL , 6=>NULL,  7=>NULL ,
            ], 

        ]; 

        return $list[$right][$type];

    } 
    
    /**
     * Liste des autorisations
     * @param int $key
     * @return array
    */    
    public function autorisation( ?string $key = null ){

        $this->list =
        [
            1 => 'REFUSER',
            2 => 'AUTORISER',
        ];

        if ($key === null) {
            return $this->list;
        } else {
            return $this->list[$key];
        }

    }     

}
