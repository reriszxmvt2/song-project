<?php
    include '../server/connect-db.php';

    class RecordList
    {
        function fetchRecordList($nameRecord)
        {
            global $connect;
            $sql = 'SELECT * FROM record_list WHERE name_record = :nameRecord';
            $paramValues = [
                ':nameRecord' => $nameRecord,
            ];
            $preparedSql = $connect->prepare($sql);
            $preparedSql->execute($paramValues);
            $result = $preparedSql->fetch();

            return $result;
        }

        function addRecord($nameRecordAdd)
        {
            global $connect;
            $sql = 'INSERT INTO record_list (name_record)  VALUES (:nameRecordAdd)';
            $paramValues = [
                ':nameRecordAdd' => $nameRecordAdd,
            ];
            $preparedSql = $connect->prepare($sql);
            $preparedSql->execute($paramValues);
            $result = $preparedSql->fetch();

            return $result;
        }

        function deleteRecord($idRecord)
        {
            global $connect;
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
            $preparedSql = $connect->prepare($sql);
            $preparedSql->execute($paramValues);
        }

        function updateRecord($nameRecordUpdated, $idRecord)
        {
            global $connect;
            $sql = 'UPDATE record_list SET name_record = :nameRecordUpdated WHERE id = :idRecord';
            $paramValues = [
                ':nameRecordUpdated' => $nameRecordUpdated,
                ':idRecord' => $idRecord,
            ];
            $preparedSql = $connect->prepare($sql);
            $preparedSql->execute($paramValues);
        }
    }
