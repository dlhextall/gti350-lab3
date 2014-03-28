<?php

require_once 'DatabaseConnection.php';

/**
 * Functions to set or get the app's settings
 */
class ConfigFunctions {

    /**
     * Get all possible configuration names
     * @return array An array containing all the names as objects
     */
    public static function getConfigIndexes() {
        $dbh = DatabaseConnection::singleton();
        $stmt = $dbh->get()->prepare("SELECT ac_index FROM App_Config");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * Get the users' session length in minutes
     * @param  boolean $seconds     wether the return value must be in minutes or seconds
     * @return int                  the session's duration
     */
    public static function getSessionLength($seconds = false) {
        $dbh = DatabaseConnection::singleton();
        $stmt = $dbh->get()->prepare("SELECT ac_value FROM App_Config WHERE ac_index='session_length' LIMIT 1");
        $stmt->execute();
        return ($seconds) ? $stmt->fetchColumn() : $stmt->fetchColumn() / 60;
    }

    /**
     * Set the user's session length in minutes
     * @param int $_sLength         the session's duration
     * @return int                  The number of rows affected
     */
    public static function setSessionLength($_sLength) {
        $dbh = DatabaseConnection::singleton();
        $stmt = $dbh->get()->prepare("UPDATE App_Config SET (ac_value) = (? * 60) WHERE ac_index='session_length'");
        $stmt->bindParam(1, $_sLength, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

}

?>