<?php
    include 'base-model.php';

    class RecordListModel extends BaseModel
    {
        public function getRecordList()
        {
          $sql = 'SELECT * FROM record_list';
          $result = $this->connect->query($sql);

          return $result;
        }

        public function getBandList($rowId)
        {
          $sql = 'SELECT * FROM `band_list` WHERE id_record = ' . $rowId . '';
          $result = $this->connect->query($sql)->fetchAll();

          return $result;
        }

        public function checkRecordForAdd($nameRecord)
        {
            $sql = 'SELECT * FROM record_list WHERE name_record = :nameRecord';
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
            $sql = 'INSERT INTO record_list (name_record)  VALUES (:nameRecordAdd)';
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
            $sql = 'DELETE record_list.*, band_list.*, album_list.*, song_list.* 
                FROM record_list 
                    LEFT JOIN band_list ON `record_list`.id = `band_list`.id_record 
                    LEFT JOIN album_list ON `band_list`.id = `album_list`.id_band 
                    LEFT JOIN song_list ON `album_list`.id = `song_list`.id_album
                WHERE `record_list`.id = :idRecordDelete';
            $paramValues = [
                ':idRecordDelete' => $idRecordDelete,
            ];

            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
        }

        public function checkRecordForUpdate($nameRecord, $idRecord)
        {
            $sql = 'SELECT * FROM record_list WHERE name_record = :nameRecord AND id != :idRecord';
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
            $sql = 'UPDATE record_list SET name_record = :nameRecordUpdated WHERE id = :idRecord';
            $paramValues = [
                ':nameRecordUpdated' => $nameRecordUpdated,
                ':idRecord' => $idRecord,
            ];

            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
        }
    }
