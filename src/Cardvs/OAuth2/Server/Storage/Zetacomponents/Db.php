<?php

namespace Cdv\OAuth2\Server\Storage\Zetacomponents;

/**
*
*/
class Db
{

    public function __construct($dsn = array())
    {
        if(is_array($dsn)) {
            $idx = 0;
            foreach($dsn as $driver => $connection) {
                $$driver = \ezcDbFactory::create( $connection );
                \ezcDbInstance::set( $$driver, $driver );

                // set default to first index
                if($idx == 0) {
                    \ezcDbInstance::chooseDefault( $driver );
                }
                $idx ++;
            }
        }
    }
}