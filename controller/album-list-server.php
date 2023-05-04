<?php 
    session_start();
    include ('./connect-db.php');
    $errors = [];
    $userAddAlbum = $_POST['addAlbum'];
    $userDeleteAlbum = $_POST['delete_album'];
    $goToUpdateAlbum = $_POST['update_album_data'];
    $userUpdateAlbum = $_POST['update_album'];
    $goToSongPage = $_POST['song_list'];

    if (isset($userAddAlbum)) {
        $nameAlbumAdd = $_POST['nameAlbum'];
        $idBand = $_POST['addAlbum'];
        
        $sql = ' SELECT * FROM `album_list` WHERE name_album = :nameAlbumAdd AND id_band = :idBand ';
        $preparedSql = $connect->prepare($sql);
        $preparedSql->execute([
            ':nameAlbumAdd' => $nameAlbumAdd,
            ':idBand' => $idBand
        ]);
        $album = $preparedSql->fetch();

        if ($album) {
            $nameAlbumInDb = $album['name_album'];
            $idBandInDb = $album['id_band'];
            if ($nameAlbumAdd == $nameAlbumInDb) {
                array_push($errors, 1);
            }
        }

        $errorsLength = count($errors);

        if ($errorsLength != 0) {
            $_SESSION['error'] = 'Name Album Already Exists.';
            $_SESSION['nameAlbumAdd'] = $nameAlbumAdd;
            header('location: ../client/add-album-list-client.php');
        }

        if ($errorsLength == 0) {
            $sql = ' INSERT INTO  album_list(name_album, id_band) VALUES (:nameAlbumAdd, :idBand) ';
            $preparedSql = $connect->prepare($sql);
            $preparedSql->execute([
                ':nameAlbumAdd' => $nameAlbumAdd,
                ':idBand' => $idBand
            ]);
            header('location: ../client/album-list-client.php');
        }
    }

    if (isset($userDeleteAlbum)) {
        $album = unserialize($userDeleteAlbum);
        $nameAlbum = $album['name_album'];
        $idAlbum = $album['id'];

        $sql = 'DELETE FROM album_list WHERE `album_list`.id = :nameAlbum';
        $preparedSql = $connect->prepare($sql);
        $preparedSql->execute([
            ':nameAlbum' => $nameAlbum,
        ]);
        header('location: ../client/album-list-client.php');
    }

    if (isset($goToUpdateAlbum)) {
        $album = unserialize($goToUpdateAlbum);
        $_SESSION['idAlbum'] = $album['id'];
        $_SESSION['nameAlbum'] = $album['name_album'];
        $_SESSION['idBand'] = $album['id_band'];
        header('location: ../client/update-album-list-client.php');
    }
 
    if (isset($userUpdateAlbum)) {
        $nameAlbumUpdated = $_POST['nameAlbum'];
        $idAlbum = $_POST['idAlbum'];
        $idBand = $_POST['idBand'];

        $sql = 'SELECT * FROM `album_list` WHERE name_album = :nameAlbumUpdated AND id_band = :idBand AND id != :idAlbum';
        $preparedSql = $connect->prepare($sql);
        $preparedSql->execute([
            ':nameAlbumUpdated' => $nameAlbumAdd,
            ':idBand' => $idBand,
            ':idAlbum' => $idAlbum,
        ]);
        $album = $preparedSql->fetch();
    
        if ($album) {
            $nameAlbumInDb = $album['name_album'];
            $idAlbumInDb = $album['id'];
            $idBandInDbAlbum = $album['id_band'];
    
            if ($nameAlbumUpdated == $nameAlbumInDb && $idAlbum != $idAlbumInDb) {
                array_push($errors, 1);
            }
        }
    
        $errorsLength = count($errors);
    
        if ($errorsLength != 0) {
            $_SESSION['error'] = 'Name Album Already Exists.';
            $_SESSION['nameAlbum'] = $nameAlbumUpdated;
            header('location: ../client/update-album-list-client.php');
        }
    
        if ($errorsLength == 0) {
            $sql = 'UPDATE album_list SET name_album = :nameAlbumAdd WHERE id = :idAlbum';
            // $query = mysqli_query($connect, $sql);
            $preparedSql = $connect->prepare($sql);
            $preparedSql->execute([
                ':nameAlbumAdd' => $nameAlbumAdd,
                ':idAlbum' => $idAlbum,
            ]);
            header('location: ../client/album-list-client.php');
        }
    }
