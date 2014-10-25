<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Persistencia
 *
 * @author Robson
 */
class Persistencia {
    
    const STRING = 1;
    const INT = 2;
    const PK = 3;
    const FK = 4;
    const BOOLEAN = 5;
    const BIT = 6;
    
    
    public static function prepare($var = '' , $tipo = 1){
        
        if($tipo == self::STRING){
            $var = self::remove($var);
            return empty($var) ? "'NULL'" : "'".$var."'";
        }
        elseif($tipo == self::INT){
            return is_int($var) ? $var : ($var === '0' ? '0' : "'NULL'");
        }
        elseif($tipo == self::PK){
            return (is_int($var) && $var > 0) ? $var : '';
        }
        elseif($tipo == self::FK){
            return (is_int($var) && $var > 0) ? $var : "'NULL'";
        }
        elseif($tipo == self::BOOLEAN){
            return ($var === '0' || $var === 0 || $var === false ) ? "'0'" :  ( $var ? "'1'" : "'NULL'" );
        }
        elseif($tipo == self::BIT){
            return ($var === '0' || $var === 0 || $var === false ) ? "'0'" :  ( $var ? "'1'" : "'NULL'" );
        }
    }
    
    private static function remove($var = ''){
        return str_ireplace(array('=','*', 'from', 'where'), '', $var);
    }
    
}
