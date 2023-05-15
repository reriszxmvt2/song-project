<?php
    include 'base-model.php';

    class RecordModel extends BaseModel
    {
        public function getRecordList() //todo: review reccommend. as ต้อง งูcase. bandLength -> total_band. `ทำแล้วจ้าา` ( ^ v ^ )/
        {
            $sql = 'SELECT 
                        record.id,
                        record.name_record,
                        COUNT(band_list.id_record) as total_band
                    FROM record
                        LEFT JOIN band_list
                            ON record.id = band_list.id_record
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
            $result = $preparedSql->fetch();

            return $result;
        }

        public function delete($deleteRecordId) //todo: ลบทีละ table. `ทำแล้วจ้าา` ( ^ v ^ )/
        {
            $paramValues = [
                ':deleteRecordId' => $deleteRecordId,
            ];

            $sql = 'DELETE
                    FROM song_list
                    WHERE id_album IN (
                        SELECT id
                        FROM album_list
                        WHERE id_band IN (
                            SELECT id
                            FROM band_list
                            WHERE id_record = :deleteRecordId 
                        )
                    )';
            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);

            $sql = 'DELETE 
                    FROM album_list 
                    WHERE id_band IN (  
                        SELECT id 
                        FROM band_list 
                        WHERE id_record = :deleteRecordId
                    )';
            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);

            $sql = 'DELETE 
                    FROM band_list 
                    WHERE id_record = :deleteRecordId';
            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);

            $sql = 'DELETE 
                    FROM record 
                    WHERE id = :deleteRecordId';
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
    }
