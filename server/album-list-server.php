<?php 
    session_start();
    include ('./connect-db.php');
    $errors = [];
    $userAddAlbum = $_POST['addAlbum'];
    $userDeleteAlbum = $_POST['delete_album'];
    $goToUpdateAlbum = $_POST['update_album_data'];
    $userUpdateAlbum = $_POST['update_album'];
    $goToSongPage = $_POST['song_list'];
    
    // function fetchAlbumList($nameAlbum)
    // {
    //     include('./connect-db.php');
    //     $sql = " SELECT * FROM `album_list` WHERE name_album = '$nameAlbum' AND id_band = '$idBand' ";
    //     $query = mysqli_query($connect, $sql);
    //     $album = mysqli_fetch_assoc($query);

    //     return $album;
    // };

    if (isset($userAddAlbum)) :
        $nameAlbumAdd = $_POST['nameAlbum'];
        $idBand = $_POST['addAlbum'];
        // $album = fetchAlbumList($nameAlbumAdd);
        $sql = " SELECT * FROM `album_list` WHERE name_album = '$nameAlbumAdd' AND id_band = '$idBand'";
        $query = mysqli_query($connect, $sql);
        $album = mysqli_fetch_assoc($query);

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
            $sql = "INSERT INTO `album_list`(`name_album`,`id_band`) VALUES ('$nameAlbumAdd','$idBand')";
            $query = mysqli_query($connect, $sql);
            header('location: ../client/album-list-client.php');
        }
    endif;

    if (isset($userDeleteAlbum)) :
        $album = unserialize($userDeleteAlbum);
        $nameAlbum = $album['name_album'];
        $idAlbum = $album['id'];
        $sql = "DELETE FROM album_list WHERE `album_list`.id = $idAlbum";
        mysqli_query($connect, $sql);
        header('location: ../client/album-list-client.php');
    endif;

    if (isset($goToUpdateAlbum)) :
        $album = unserialize($goToUpdateAlbum);
        $_SESSION['idAlbum'] = $album['id'];
        $_SESSION['nameAlbum'] = $album['name_album'];
        $_SESSION['idBand'] = $album['id_band'];
        header('location: ../client/update-album-list-client.php');
    endif;

    if (isset($userUpdateAlbum)) :
        $nameAlbumUpdated = $_POST['nameAlbum'];
        $idAlbum = $_POST['idAlbum'];
        $idBand = $_POST['idBand'];
        // $album = fetchAlbumList($nameAlbumUpdated);
        $sql = " SELECT * FROM `album_list` WHERE name_album = '$nameAlbumUpdated' AND id_band = '$idBand' AND id != '$idAlbum'";
        $query = mysqli_query($connect, $sql);
        $album = mysqli_fetch_assoc($query);
    
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
            $sql = "UPDATE album_list SET name_album = '$nameAlbumUpdated' WHERE id = '$idAlbum'";
            $query = mysqli_query($connect, $sql);
            header('location: ../client/album-list-client.php');
        }
    endif;

    
