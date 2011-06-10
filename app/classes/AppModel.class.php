<?php

class AppModel
{
  private static $_query_log = '';
  /**
  * It use pg_prepare and exec to bind the params
  * @param query - SQL Query with pg_prepare like binders ($1,$2,etc)
  * @param params array or string, the binded params
  * @return query result resource on success, or FALSE on failure.
  * Example of use
  * query('SELECT * FROM Clients WHERE code_client=$1','nammd');
  **/
  static function query($query,$params='')
  {
    if(strstr($query,'$') === false) {
        self::query_log($query);
        return pg_query($query);
    }
    $result = pg_prepare("",$query);
    if (!$result)
      throw new Exception('AppModel->query exception.');
    if (!is_array($params)) $params = array($params);
    if (DEBUG) {
      self::query_log($query,$params);
    }
    return pg_execute("",$params);
  }
  

  static function fetchAll($query) {
    $result = array();
    if (pg_num_rows($query) == 0)
        return $result;
    return pg_fetch_all($query);
  }
  
  // A function used for debuging
  static function query_log($query,$params='')
  {
    self::$_query_log .= $query . var_export($params,true)."\n";
  }
  
  static function query_log_get()
  {
    return self::$_query_log;
  }
}

?>