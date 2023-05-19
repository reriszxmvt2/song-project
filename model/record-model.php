<?php
    include_once 'base-model.php';

    class RecordModel extends BaseModel
    {
        public function getList() //todo: review database.
        {
            $sql = 'SELECT 
                        record.id,
                        record.name_record,
                        COUNT(DISTINCT band.id) AS total_band,
                        COUNT(album.id) AS total_album
                    FROM record
                        LEFT JOIN band ON record.id = band.id_record
                        LEFT JOIN album ON band.id = album.id_band
                    GROUP BY record.id
                    ';
            $results = $this->connect->query($sql)->fetchAll();

            return $results;
        }

        public function getByName($recordName)
        {
            $sql = 'SELECT *
                    FROM record
                    WHERE name_record = :recordName';
            $paramValues = [
                ':recordName' => $recordName,
            ];

            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
            $result = $preparedSql->fetch();

            return $result;
        }

        public function add($recordName)
        {
            $sql = 'INSERT INTO record (name_record)
                    VALUES (:recordName)';
            $paramValues = [
                ':recordName' => $recordName,
            ];

            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
        }

        public function delete($deleteRecordId)
        {
            $sql = 'DELETE 
                    FROM record 
                    WHERE id = :deleteRecordId';
            $paramValues = [
                ':deleteRecordId' => $deleteRecordId,
            ];
            
            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
        }

        public function update($newName, $recordId)
        {
            $sql = 'UPDATE record 
                    SET name_record = :newName 
                    WHERE id = :recordId';
            $paramValues = [
                ':newName' => $newName,
                ':recordId' => $recordId,
            ];

            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
        }

        public function getNameById($recordId)
        {
            $sql = 'SELECT name_record
                    FROM record
                    WHERE id = :recordId';
            $paramValues = [
                ':recordId' => $recordId,
            ];

            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
            $result = $preparedSql->fetch();

            return $result;
        }
    }
