<?php
    include('./connect-db.php');
    session_start();
    $errors = [];
    $userAddBand = $_POST['addBand'];
    $userDeleteBand = $_POST['delete_band'];
    $sendDataToUpdate = $_POST['update_band_data'];
    $userUpdateBand = $_POST['update_band'];
    $toAlbumPage = $_POST['toAlbumPage'];

    function fetchBand($nameBand)
    {
        include('./connect-db.php');
        $sql = "SELECT * FROM `band_list` WHERE name_band = '$nameBand'";
        $query = mysqli_query($connect, $sql);
        $band = mysqli_fetch_assoc($query);

        return $band;
    };

    if (isset($userAddBand)):
        // print_r($_REQUEST);
        $nameBandAdd = $_POST['nameBand'];
        $idRecord = $_POST['addBand'];
        $idBand = $_POST['idBand'];
        $band = fetchBand($nameBandAdd);

        if ($band) {
            $nameBandInDb = $band['name_band'];
            $idRecordInDb = $band['id_record'];
            $idBandInDb = $band['id'];
          
            if ($nameBandAdd == $nameBandInDb && $idRecordInDb == $idRecord) {
                array_push($errors, 1);
            }
        }

        $errorsListLength = count($errors);

        if ($errorsListLength != 0) {

            $_SESSION['error'] = 'Name Band Already Exists.';
            $_SESSION['nameBandAdd'] = $nameBandAdd;
            header('location: ../client/add-band-list-client.php');
        }

        if ($errorsListLength == 0) {

            $sql = "INSERT INTO `band_list`(`name_band`, `id_record`) VALUES ('$nameBandAdd', '$idRecord')";
            $query = mysqli_query($connect, $sql);
            header('location: ../client/band-list-client.php');
        }
    endif;

    if (isset($userDeleteBand)):
        $band = unserialize($userDeleteBand);
        $nameBand = $band['name_band'];
        $idBand = $band['id'];
        // $sql = "DELETE FROM `band_list` WHERE id = '$nameBand'";
        $sql = "DELETE band_list.*, album_list.* 
        FROM band_list 
        LEFT JOIN album_list 
        ON `band_list`.id = `album_list`.id_band 
        WHERE `band_list`.id = $idBand ";
        $query = mysqli_query($connect, $sql);
        header('location: ../client/band-list-client.php');
    endif;

    if (isset($sendDataToUpdate)):
        $band = unserialize($sendDataToUpdate);
        $_SESSION['idBand'] = $band['id'];
        $_SESSION['nameBand'] = $band['name_band'];
        $_SESSION['idRecord'] = $band['id_record'];
        header('location: ../client/update-band-list-client.php');
    endif;

    if (isset($userUpdateBand)):
        $nameBand = $_POST['nameBand'];
        $idBand = $_POST['idBand'];
        $idRecord = $_POST['idRecord'];
        $band = fetchBand($nameBand);

        if ($band) {
            $nameBandInDb = $band['name_band'];
            $idBandInDb = $band['id'];
            $idRecordInDbBand = $band['id_record'];

            if ($nameBand == $nameBandInDb && $idBand != $idBandInDb) {
                array_push($errors, 1);
            }
        }

        $errorsLength = count($errors);

        if ($errorsLength != 0) {
            $_SESSION['error'] = 'Name Band Already Exists.';
            $_SESSION['nameBand'] = $nameBand;
            header('location: ../client/update-band-list-client.php');
        }

        if ($errorsLength == 0) {
            $sql = "UPDATE band_list SET name_band = '$nameBand' WHERE id = '$idBand'";
            $query = mysqli_query($connect, $sql);
            header('location: ../client/band-list-client.php');
        }
    endif;

    if (isset($toAlbumPage)):
        $band = unserialize($_POST['toAlbumPage']);
        $_SESSION['id'] = $band['id'];
        $_SESSION['id_record'] = $band['id_record'];
        $_SESSION['name_band'] = $band['name_band'];
        header('location: ../client/album-list-client.php');
    endif;