<?php
    include 'base-model.php';

    class RecordModel extends BaseModel
    {
        public function getRecordList() //todo: format sql.
        {
            $sql = 'SELECT  record.id,
                            record.name_record,
                            count(band_list.id_record) AS bandLength
                    FROM record
                        LEFT JOIN band_list ON record.id = band_list.id_record
                    GROUP BY record.id';
            $result = $this->connect->query($sql);
            $rowInDb = $result->fetchAll(); //todo: return แค่ fetchAll ไป
            $results = [
                'result' => $result,
                'rowInDb' => $rowInDb,
            ];

            return $results;
        }

        public function getRecordByName($nameRecord) //todo: change name ทำแล้ว
        {
            $sql = 'SELECT *
                    FROM record
                    WHERE name_record = :nameRecord';
            $paramValues = [
                ':nameRecord' => $nameRecord,
            ];

            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
            $result = $preparedSql->fetch();

            return $result;
        }

        public function addRecord($nameRecordAdd)
        {
            $sql = 'INSERT INTO record (name_record)
                    VALUES (:nameRecordAdd)';
            $paramValues = [
                ':nameRecordAdd' => $nameRecordAdd,
            ];

            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
            $result = $preparedSql->fetch();

            return $result;
        }

        public function deleteRecord($idRecordDelete)
        {
            $sql = 'DELETE  record.*,
                            band_list.*,
                            album_list.*,
                            song_list.*
                    FROM record
                        LEFT JOIN band_list ON record.id = band_list.id_record
                        LEFT JOIN album_list ON band_list.id = album_list.id_band
                        LEFT JOIN song_list ON album_list.id = song_list.id_album
                    WHERE `record`.id = :idRecordDelete';
            $paramValues = [
                ':idRecordDelete' => $idRecordDelete,
            ];

            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
        }

        public function getRecordForUpdate($nameRecord, $idRecord)
        {
            $sql = 'SELECT * 
                    FROM record 
                    WHERE name_record = :nameRecord AND id != :idRecord';
            $paramValues = [
                ':nameRecord' => $nameRecord,
                ':idRecord' => $idRecord,
            ];

            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
            $result = $preparedSql->fetch();

            return $result;
        }

        public function updateRecord($nameRecordUpdated, $idRecord)
        {
            $sql = 'UPDATE record 
                    SET name_record = :nameRecordUpdated 
                    WHERE id = :idRecord';
            $paramValues = [
                ':nameRecordUpdated' => $nameRecordUpdated,
                ':idRecord' => $idRecord,
            ];

            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
        }
    }
