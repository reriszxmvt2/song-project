<?php
    include_once 'base-model.php';

    class BandModel extends BaseModel
    {
        public function update($newName, $bandId)
        {
            $sql = 'UPDATE band 
                    SET name_band = :newName 
                    WHERE id = :bandId
            ';
            $paramValues = [
                ':newName' => $newName,
                ':bandId' => $bandId,
            ];

            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
        }

        public function getByName($bandName)
        {
            $sql = 'SELECT *
                    FROM band
                    WHERE name_band = :bandName
            ';
            $paramValues = [
                ':bandName' => $bandName,
            ];

            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
            $result = $preparedSql->fetch();

            return $result;
        }

        public function getById($bandId)
        {
            $sql = 'SELECT 
                        name_band
                    FROM band
                    WHERE id = :bandId
            ';
            $paramValues = [
                ':bandId' => $bandId,
            ];

            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
            $result = $preparedSql->fetch();

            return $result;
        }

        public function delete($bandId)
        {
            $sql = 'DELETE 
                    FROM band 
                    WHERE id = :bandId
            ';
            $paramValues = [
                ':bandId' => $bandId,
            ];
            
            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
        }

        public function add($bandName, $recordId)
        {
            $sql = 'INSERT INTO band (name_band,id_record)
                    VALUES (:bandName,:recordId)
            ';
            $paramValues = [
                ':bandName' => $bandName,
                ':recordId' => $recordId,
            ];

            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
        }

        public function getByNameAndRecordId($bandName, $recordId)
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
                        LEFT JOIN album ON band.id = album.id_band
                    WHERE band.id_record = :recordId
                    GROUP BY band.id;
            ';
            $paramValues = [
                ':recordId' => $recordId,
            ];
            
            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
            $results = $preparedSql->fetchAll();

            return $results;
        }

        public function deleteByRecordId($recordId)
        {
            $sql = 'DELETE 
                    FROM band 
                    WHERE id_record = :recordId
            ';
            $paramValues = [
                ':recordId' => $recordId,
            ];
            
            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
        }
    }
