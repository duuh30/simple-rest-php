<?php
/**
 * Created by PhpStorm.
 * User: Duh
 * Date: 24/10/2018
 * Time: 01:17
 */

namespace config;

class Conexao
{

    /**
     * @var
     */
    private static $instance;


    /**
     * @return PDO
     */
    public static function getInstance() {
        if (!isset(self::$instance)) {
            try{
                self::$instance = new PDO('mysql:host=localhost;dbname=rest_native', 'root', 'root');
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            } catch (PDOExeception $e){
                echo $e->getMessage();
            }//final catch
        }//final if

        return self::$instance;
    }

    /**
     * @param $sql
     * @return mixed
     */
    public static function prepare($sql){
        return self::getInstance()->prepare($sql);
    }

}
