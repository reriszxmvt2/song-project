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

    include '../../view/album-view/album-view.php';
