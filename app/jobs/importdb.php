<?php
class ImportDbJob {
  static function run() {
    pg_query( file_get_contents(APP_PATH.'db.sql') );
    
    $q = pg_query("select tablename from pg_tables where tablename='participant'");
    if (pg_num_rows($q) == 0) {
      pg_query( file_get_contents(APP_PATH.'db.sql') );
    }
  }
}
ImportDbJob::run();