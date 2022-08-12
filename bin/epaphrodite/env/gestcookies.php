<?php

namespace bin\epaphrodite\env;

use bin\epaphrodite\crf_token\csrf_secure;

class gestcookies
{

    protected $pathvalue;
    protected $cookievalue;
    protected $initvalue = "";
    private $session;

    /**
     * construct class
     * @return void
     */
    function __construct()
    {
        $this->pathvalue = new \bin\epaphrodite\crf_token\gettokenvalue();
        $this->session = new \bin\epaphrodite\auth\session_auth();
        $this->messages = new \bin\epaphrodite\define\text_messages;
        $this->csrf = new csrf_secure;
    }
    
    /**
     * set session et cookies
     *
     * @param string $lifetime
     * @param string $path
     * @param string $dommaine
     * @param string $secure
     * @param string $httonly
     * @return void
     */
    public function startsession( $lifetime , $path , $dommaine , $secure , $httonly )
    {   
        
        session_set_cookie_params( $lifetime , $path , $dommaine , $secure , $httonly );

        session_name($this->messages->answers('session_name'));

        session_start();

        if($this->session->login()===NULL&&empty($this->session->token_csrf()))
        {

            $this->set_user_cookies( $path, $dommaine, $secure, $httonly , $this->pathvalue->getvalue($this->initvalue) );
            
        }

     }

     /**
      * Set cookies
      *
      * @param string $path
      * @param string $dommaine
      * @param string $secure
      * @param string $httonly
      * @param string $cookievalue
      * @return void
      */
     public function set_user_cookies( $path , $dommaine, $secure, $httonly , $cookievalue)
     {
    
        setcookie($this->messages->answers('token_name'), $cookievalue , time()+60*60*24 , $path , $dommaine , $secure , $httonly);

        $_COOKIE[$this->messages->answers('token_name')] = $cookievalue;

     }

}