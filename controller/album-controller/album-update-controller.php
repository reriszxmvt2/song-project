<?php
    include '../check-login.php';
    include '../../model/album-model.php';

    $error = '';
    $recordId = $_GET['recordId'];
    $bandId = $_GET['bandId'];
    $albumId = $_GET['albumId'];

    $albumModel = new AlbumModel();
    $result = $albumModel->getById($albumId);
    $nameAlbum = $result['album_name'];

    if (isset($_POST['updateNameAlbum'])) {
        $nameAlbum = $_POST['nameAlbum'];

        $results = $albumModel->getByNameAndBandId($bandId, $nameAlbum);
        $albumIdInDb = $results['id'];

        if ($results && $albumId != $albumIdInDb) {
            $error = 'Album Name Already Exist.';
        } else {
            $albumModel->update($nameAlbum, $albumId);
            header('location: ../album-controller/album-controller.php?recordId=' . $recordId . '&bandId=' . $bandId);
            exit();
        }
    }

    include '../../view/album-view/album-update.php';
