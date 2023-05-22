<?php
    include_once 'base-model.php';

    class BandModel extends BaseModel
    {
        public function update($newName, $bandId)
        {
            $sql = 'UPDATE band 
                    SET band_name = :newName 
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
                    WHERE band_name = :bandName
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
                        band_name
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
            $sql = 'INSERT INTO band (band_name, record_id)
                    VALUES (:bandName, :recordId)
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
                    WHERE band_name = :bandName
                        AND record_id = :recordId
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
                        b.id,
                        b.band_name,
                        COUNT(a.band_id) as total_album
                    FROM band b
                        LEFT JOIN album a ON b.id = a.band_id
                    WHERE b.record_id = :recordId
                    GROUP BY b.id;
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
                    WHERE record_id = :recordId
            ';
            $paramValues = [
                ':recordId' => $recordId,
            ];
            
            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
        }
    }
