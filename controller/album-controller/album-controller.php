<?php
    session_start();
    include '../../model/album-model.php';
    include '../login-status.php';
    
    $recordId = $_GET['recordId'];
    $bandId = $_GET['bandId'];

    $albumModel = new AlbumModel();

    if (isset($_GET['albumId'])) {
        $albumId = $_GET['albumId'];

        $albumModel->delete($albumId);
    }

    $results = $albumModel->getByBandId($bandId);

    function generateDeleteAlbumUrl($bandId, $recordId, $albumId) {
        return '../album-controller/album-controller.php?bandId=' . $bandId . '&recordId=' . $recordId . '&albumId=' . $albumId;
    }
    
    function generateUpdateAlbumUrl($bandId, $recordId, $albumId) {
        return '../album-controller/album-update-controller.php?bandId=' . $bandId . '&recordId=' . $recordId . '&albumId=' . $albumId;
    }

    function generateAddAlbumUrl($recordId, $bandId) {
        return '../album-controller/album-add-controller.php?recordId=' . $recordId . '&bandId=' . $bandId;
    }

    function generateBacktoBandUrl($recordId) {
        return '../band-controller/band-controller.php?recordId=' . $recordId;
    }

    include '../../view/album-view/album-view.php';
