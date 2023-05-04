<?php
    include '../server/connect-db.php';

    class RecordList
    {
        public $connect;

        function __construct()
        {
            $this->connect = connectionDb();
        }

        function fetchRecordList($nameRecord)
        {
            $sql = 'SELECT * FROM record_list WHERE name_record = :nameRecord';
            $paramValues = [
                ':nameRecord' => $nameRecord,
            ];
            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
            $result = $preparedSql->fetch();

            return $result;
        }

        function addRecord($nameRecordAdd)
        {
            $sql = 'INSERT INTO record_list (name_record)  VALUES (:nameRecordAdd)';
            $paramValues = [
                ':nameRecordAdd' => $nameRecordAdd,
            ];
            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
            $result = $preparedSql->fetch();

            return $result;
        }

        function deleteRecord($idRecord)
        {
            $sql = 'DELETE record_list.*, band_list.*, album_list.*, song_list.* 
                FROM record_list 
                LEFT JOIN band_list 
                    ON `record_list`.id = `band_list`.id_record 
                LEFT JOIN album_list 
                    ON `band_list`.id = `album_list`.id_band 
                LEFT JOIN song_list
                    ON `album_list`.id = `song_list`.id_album
                WHERE `record_list`.id = :idRecord';
            $paramValues = [
                ':idRecord' => $idRecord,
            ];
            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
        }

        function updateRecord($nameRecordUpdated, $idRecord)
        {
            $sql = 'UPDATE record_list SET name_record = :nameRecordUpdated WHERE id = :idRecord';
            $paramValues = [
                ':nameRecordUpdated' => $nameRecordUpdated,
                ':idRecord' => $idRecord,
            ];
            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
        }
        
        function showRecordList()
        {
            $sql = 'SELECT * FROM record_list';
            $result = $this->connect->query($sql);

            return $result;
        }
    }
