<?php
    function fetchRecordList($nameRecord ,$connect)
    {
        $sql = 'SELECT * FROM record_list WHERE name_record = :nameRecord';
        $preparedSql = $connect->prepare($sql);
        $preparedSql->execute([
            ':nameRecord' => $nameRecord,
        ]);
        $result = $preparedSql->fetch();

        return $result;
    }

    function addRecord($nameRecordAdd, $connect)
    {
        $sql = 'INSERT INTO record_list (name_record)  VALUES (:nameRecordAdd)';
        $preparedSql = $connect->prepare($sql);
        $preparedSql->execute([
            ':nameRecordAdd' => $nameRecordAdd
        ]);
        $result = $preparedSql->fetch();

        return $result;
    }

    function deleteRecord($idRecord, $connect)
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
        $preparedSql = $connect->prepare($sql);
        $preparedSql->execute([
            ':idRecord' => $idRecord,
        ]);
    }

    function updateRecord($nameRecordUpdated, $idRecord, $connect)
    {
        $sql = 'UPDATE record_list SET name_record = :nameRecordUpdated WHERE id = :idRecord';
        $preparedSql = $connect->prepare($sql);
        $preparedSql->execute([
            ':nameRecordUpdated' => $nameRecordUpdated,
            ':idRecord' => $idRecord,
        ]);
    }
