<?php
    include '../check-login.php';
    include '../../model/album-model.php';
    
    $recordId = $_GET['recordId'];
    $bandId = $_GET['bandId'];

    $albumModel = new AlbumModel();

    if (isset($_GET['albumId'])) {
        $albumId = $_GET['albumId'];

        $albumModel->delete($albumId);
    }

    $results = $albumModel->getByBandId($bandId);

    include '../../view/path.php';
    include '../../view/album-view/album-view.php';
