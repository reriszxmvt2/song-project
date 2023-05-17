<?php
    include_once 'base-model.php';
    
    class AlbumListModel extends BaseModel
    {
        function delete($deleteRecordId)
        {
            $sql = 'DELETE 
                    FROM album_list 
                    WHERE id_band IN (  
                        SELECT id 
                        FROM band_list 
                        WHERE id_record = :deleteRecordId
                    )';
            $paramValues = [
                ':deleteRecordId' => $deleteRecordId,
            ];

            $preparedSql = $this->connect->prepare($sql);
            $preparedSql->execute($paramValues);
        }
    }
