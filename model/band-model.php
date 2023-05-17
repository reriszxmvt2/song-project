<?php
    include_once 'base-model.php';

    class BandModel extends BaseModel
    {
        public function deleteByBandIdAndRecordId($bandId, $recordId)
        {
            $sql = 'DELETE 
                    FROM band_list 
                    WHERE id = :bandId
                        -- AND id_record = :recordId
                    ';
            $paramValues = [
                ':bandId' => $bandId,
                ':recordId' => $recordId,
            ];
            
            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
        }

        public function add($bandName, $recordId)
        {
            $sql = 'INSERT INTO band (name_band,id_record)
                    VALUES (:bandName,:recordId)';
            $paramValues = [
                ':bandName' => $bandName,
                ':recordId' => $recordId,
            ];

            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
        }

        public function getByName($bandName, $recordId)
        {
            $sql = 'SELECT *
                    FROM band
                    WHERE name_band = :bandName
                        AND id_record = :recordId
                    ';
            $paramValues = [
                ':bandName' => $bandName,
                ':recordId' => $recordId,
            ];

            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
            $result = $preparedSql->fetch();

            return $result;
        }

        public function getList($recordId)
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

        public function delete($recordId)
        {
            $sql = 'DELETE 
                    FROM band_list 
                    WHERE id_record = :recordId';
            $paramValues = [
                ':recordId' => $recordId,
            ];
            
            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
        }
    }
