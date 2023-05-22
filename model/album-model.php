<?php
    include_once 'base-model.php';
    
    class AlbumModel extends BaseModel
    {
        public function update($newName, $albumId)
        {
            $sql = 'UPDATE album 
                    SET album_name = :newName 
                    WHERE id = :albumId
            ';
            $paramValues = [
                ':newName' => $newName,
                ':albumId' => $albumId,
            ];

            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
        }

        public function getById($albumId)
        {
            $sql = 'SELECT 
                        album_name
                    FROM album
                    WHERE id = :albumId
                    ';
            $paramValues = [
                ':albumId' => $albumId,
            ];

            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
            $result = $preparedSql->fetch();

            return $result;
        }

        public function delete($albumId){
            $sql = 'DELETE 
                    FROM album 
                    WHERE id = :albumId';
            $paramValues = [
                ':albumId' => $albumId,
            ];

            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
        }
        public function add($albumName, $bandId, $recordId)
        {
            $sql = 'INSERT INTO album (album_name,band_id,record_id)
                    VALUES (:albumName, :bandId, :recordId)';
            $paramValues = [
                ':albumName' => $albumName,
                ':bandId' => $bandId,
                ':recordId' => $recordId,
            ];

            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
        }

        public function getByNameAndBandId($bandId, $albumName)
        {
            $sql = 'SELECT *
                    FROM album
                    WHERE band_id = :bandId
                        AND album_name = :albumName
                    ';
            $paramValues = [
                'bandId' => $bandId,
                'albumName' => $albumName,
            ];

            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
            $results = $preparedSql->fetch();

            return $results;
        }

        public function getByBandId($bandId)
        {
            $sql = 'SELECT *
                    FROM album
                    WHERE band_id = :bandId
                    ';
            $paramValues = [
                'bandId' => $bandId,
            ];

            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
            $results = $preparedSql->fetchAll();

            return $results;
        }

        public function deleteByBandId($bandId)
        {
            $sql = 'DELETE
                    FROM album
                    WHERE band_id = :bandId
            ';
            $paramValues = [
                ':bandId' => $bandId,
            ];

            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
        }

        public function deleteByRecordId($deleteRecordId)
        {
            $sql = 'DELETE 
                    FROM album
                    WHERE record_id = :deleteRecordId
            ';
            $paramValues = [
                ':deleteRecordId' => $deleteRecordId,
            ];

            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
        }
    }
