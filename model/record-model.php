<?php
    include_once 'base-model.php';

    class RecordModel extends BaseModel
    {
        public function getList()
        {
            $sql = 'SELECT 
                        r.id,
                        r.record_name,
                        COUNT(DISTINCT b.id) AS total_band,
                        COUNT(DISTINCT a.id) AS total_album
                    FROM record r
                        LEFT JOIN band b ON r.id = b.record_id
                        LEFT JOIN album a ON r.id = a.record_id
                    GROUP BY r.id
            ';
            $results = $this->connect->query($sql)->fetchAll();

            return $results;
        }

        public function getByName($recordName)
        {
            $sql = 'SELECT *
                    FROM record
                    WHERE record_name = :recordName
            ';
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
            $sql = 'INSERT INTO record (record_name)
                    VALUES (:recordName)
            ';
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
                    WHERE id = :deleteRecordId
            ';
            $paramValues = [
                ':deleteRecordId' => $deleteRecordId,
            ];
            
            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
        }

        public function update($newName, $recordId)
        {
            $sql = 'UPDATE record 
                    SET record_name = :newName 
                    WHERE id = :recordId
            ';
            $paramValues = [
                ':newName' => $newName,
                ':recordId' => $recordId,
            ];

            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
        }

        public function getNameById($recordId)
        {
            $sql = 'SELECT record_name
                    FROM record
                    WHERE id = :recordId
            ';
            $paramValues = [
                ':recordId' => $recordId,
            ];

            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
            $result = $preparedSql->fetch();

            return $result;
        }
    }
