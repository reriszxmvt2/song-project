<?php
    include '../check-login.php';
    include '../../model/band-model.php';
    include '../../model/album-model.php';

    $recordId = $_GET['recordId'];
    $bandId = '';
    
    $bandModel = new BandModel();

    if (isset($_GET['bandId'])) {
        $bandId = $_GET['bandId'];

        $albumModel = new AlbumModel();
        $albumModel->deleteByBandId($bandId);

        $bandModel->delete($bandId);
    }

    $results = $bandModel->getList($recordId);

    include '../../view/band-view/band-view.php';
