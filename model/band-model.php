<?php
    include_once 'base-model.php';
    class BandModel extends BaseModel
    {
        public function getBandList($recordId)
        {
            $sql = 'SELECT 
                        band.id,
                        band.name_band,
                        COUNT(album.id_band) as total_album
                    FROM band
                        LEFT JOIN album
                            ON band.id = album.id_band
                    WHERE band.id_record = :recordId
                    GROUP BY band.id';
            $paramValues = [
                ':recordId' => $recordId,
            ];

            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
            $results = $preparedSql->fetchAll();

            return $results;
        }

        public function delete($deleteRecordId)
        {
            $sql = 'DELETE 
                    FROM band_list 
                    WHERE id_record = :deleteRecordId';
            $paramValues = [
                ':deleteRecordId' => $deleteRecordId,
            ];
            
            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
        }
    }
    
    // function fetchBandList($nameBand, $idRecord, $idBand, $connect)
    // {
    //     $sql = 'SELECT * FROM `band_list` WHERE name_band = :nameBand AND id_record = :idRecord AND id != :idBand ';
    //     $paramValues = [
    //         ':nameBand' => $nameBand,
    //         ':idRecord' => $idRecord,
    //         ':idBand' => $idBand,
    //     ];
    //     $preparedSql = $connect->prepare($sql);
    //     $preparedSql->execute($paramValues);
    //     $result = $preparedSql->fetch();

    //     return $result;
    // }

    // function addBand($nameBandAdd, $idRecord, $connect)
    // {
    //     $sql = 'INSERT INTO band_list (name_band, id_record) VALUES (:nameBandAdd, :idRecord)';
    //     $paramValues = [
    //         ':nameBandAdd' => $nameBandAdd,
    //         ':idRecord' => $idRecord,
    //     ];
    //     $preparedSql = $connect->prepare($sql);
    //     $preparedSql->execute($paramValues);
    // }

    // function deleteBand($idBand, $connect)
    // {
    //     $sql = 'DELETE band_list.*, album_list.* 
    //         FROM band_list 
    //         LEFT JOIN album_list 
    //             ON `band_list`.id = `album_list`.id_band 
    //         WHERE `band_list`.id = :idBand ';
    //     $paramValues = [
    //         ':idBand' => $idBand,
    //     ];
    //     $preparedSql = $connect->prepare($sql);
    //     $preparedSql->execute($paramValues);
    // }

    // function updateBand($nameBand, $idBand, $connect)
    // {
    //     $sql = 'UPDATE band_list SET name_band = :nameBand WHERE id = :idBand';
    //     $paramValues = [
    //         ':nameBand' => $nameBand,
    //         ':idBand' => $idBand,
    //     ];
    //     $preparedSql = $connect->prepare($sql);
    //     $preparedSql->execute($paramValues);
    // }

    
