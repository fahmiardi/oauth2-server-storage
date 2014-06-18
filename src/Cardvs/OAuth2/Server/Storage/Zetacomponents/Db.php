<?php

namespace Cardvs\OAuth2\Server\Storage\Zetacomponents;

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
                $params = \ezcDbFactory::parseDSN( $connection );
                $params['driver-opts'] = [\PDO::ATTR_PERSISTENT => true];
                \ezcDbInstance::set( \ezcDbFactory::create( $params ), $driver );

                // set default to first index
                if($idx == 0) {
                    \ezcDbInstance::chooseDefault( $driver );
                }
                $idx ++;
            }
        }
    }
}