<?php
    function fetchBandList($nameBand, $idRecord, $idBand, $connect)
    {
        $sql = 'SELECT * FROM `band_list` WHERE name_band = :nameBand AND id_record = :idRecord AND id != :idBand ';
        $preparedSql = $connect->prepare($sql);
        $preparedSql->execute([
            ':nameBand' => $nameBand,
            ':idRecord' => $idRecord,
            ':idBand' => $idBand,
        ]);
        $result = $preparedSql->fetch();

        return $result;
    }

    function addBand($nameBandAdd, $idRecord, $connect)
    {
        $sql = 'INSERT INTO band_list (name_band, id_record) VALUES (:nameBandAdd, :idRecord)';
        $preparedSql = $connect->prepare($sql);
        $preparedSql->execute([
            ':nameBandAdd' => $nameBandAdd,
            ':idRecord' => $idRecord,
        ]);
    }

    function deleteBand($idBand, $connect)
    {
        $sql = 'DELETE band_list.*, album_list.* 
            FROM band_list 
            LEFT JOIN album_list 
                ON `band_list`.id = `album_list`.id_band 
            WHERE `band_list`.id = :idBand ';
        $preparedSql = $connect->prepare($sql);
        $preparedSql->execute([
            ':idBand' => $idBand,
        ]);
    }

    function updateBand($nameBand, $idBand, $connect)
    {
        $sql = 'UPDATE band_list SET name_band = :nameBand WHERE id = :idBand';
        $preparedSql = $connect->prepare($sql);
        $preparedSql->execute([
            ':nameBand' => $nameBand,
            ':idBand' => $idBand,
        ]);
    }
