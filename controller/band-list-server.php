<?php
    session_start();
    include './connect-db.php';
    include '../model/band-list-model.php';
    $errors = [];
    $userAddBand = $_POST['addBand'];
    $userDeleteBand = $_POST['delete_band'];
    $sendDataToUpdate = $_POST['update_band_data'];
    $userUpdateBand = $_POST['update_band'];
    $toAlbumPage = $_POST['toAlbumPage'];

    if (isset($userAddBand)) {
        $nameBandAdd = $_POST['nameBand'];
        $idRecord = $_POST['addBand'];
        $idBand = $_POST['idBand'];
        $sql = 'SELECT * FROM band_list WHERE name_band = :nameBandAdd AND id_record = :idRecord';
        $preparedSql = $connect->prepare($sql);
        $preparedSql->execute([
            ':nameBandAdd' => $nameBandAdd,
            ':idRecord' => $idRecord,
        ]);
        $band = $preparedSql->fetch();
        $band = fetchBandList($nameBandAdd, $idRecord, $idBand, $connect);

        if ($band) {
            $nameBandInDb = $band['name_band'];
            $idRecordInDb = $band['id_record'];
            $idBandInDb = $band['id'];

            if ($nameBandAdd == $nameBandInDb && $idBandInDb != $idBand) {
                array_push($errors, 1);
            }
        }

        $errorsListLength = count($errors);

        if ($errorsListLength != 0) {
            // echo 'failed';
            $_SESSION['error'] = 'Name Band Already Exists.';
            $_SESSION['nameBandAdd'] = $nameBandAdd;
            header('location: ../client/add-band-list-client.php');
        }

        if ($errorsListLength == 0) {
            // echo 'pass';
            addBand($nameBandAdd, $idRecord, $connect);
            header('location: ../client/band-list-client.php');
        }
    }

    if (isset($userDeleteBand)) {
        $band = unserialize($userDeleteBand);
        $idBand = $band['id'];
        deleteBand($idBand, $connect);
        header('location: ../client/band-list-client.php');
    }

    if (isset($sendDataToUpdate)) {
        $band = unserialize($sendDataToUpdate);
        $_SESSION['idBand'] = $band['id'];
        $_SESSION['nameBand'] = $band['name_band'];
        $_SESSION['idRecord'] = $band['id_record'];
        header('location: ../client/update-band-list-client.php');
    }

    if (isset($userUpdateBand)) {
        $nameBand = $_POST['nameBand'];
        $idBand = $_POST['idBand'];
        $idRecord = $_POST['idRecord'];
        $sql = 'SELECT * FROM band_list WHERE name_band = :nameBand AND id_record = :idRecord AND id != :idBand ';
        $preparedSql = $connect->prepare($sql);
        $preparedSql->execute([
            ':nameBand' => $nameBand,
            ':idRecord' => $idRecord,
            ':idBand' => $idBand,
        ]);
        $band = $preparedSql->fetch();

        if ($band) {
            $nameBandInDb = $band['name_band'];
            $idBandInDb = $band['id'];
            $idRecordInDbBand = $band['id_record'];

            echo $nameBand == $nameBandInDb;
            echo $idRecord == $idRecordInDbBand;
            if ($nameBand == $nameBandInDb && $idRecord == $idRecordInDbBand) {
                array_push($errors, 1);
            }
        }

        $errorsLength = count($errors);
        echo $errorsLength;

        if ($errorsLength != 0) {
            $_SESSION['error'] = 'Name Band Already Exists.';
            $_SESSION['nameBand'] = $nameBand;
            header('location: ../client/update-band-list-client.php');
        }

        if ($errorsLength == 0) {
            updateBand($nameBand, $idBand, $connect);
            header('location: ../client/band-list-client.php');
        }
    }

    if (isset($toAlbumPage)) {
        $band = unserialize($_POST['toAlbumPage']);
        $_SESSION['id'] = $band['id'];
        $_SESSION['id_record'] = $band['id_record'];
        $_SESSION['name_band'] = $band['name_band'];
        header('location: ../client/album-list-client.php');
    }
