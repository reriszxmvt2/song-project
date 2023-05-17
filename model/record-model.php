<?php
    include_once 'base-model.php';

    class RecordModel extends BaseModel
    {
        public function getList() //todo: review reccommend.
        {
            $sql = 'SELECT 
                        record.id,
                        record.name_record,
                        COUNT(band.id_record) as total_band
                    FROM record
                        LEFT JOIN band
                            ON record.id = band.id_record
                    GROUP BY record.id';
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

        public function delete($deleteRecordId) //todo: ลบทีละ table. `ทำแล้วจ้าา` ( ^ v ^ )/
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

        public function update($newName, $recordId) //todo: change name -> update. review name ex. newName. `ทำแล้วจ้าา` ( ^ v ^ )/
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
