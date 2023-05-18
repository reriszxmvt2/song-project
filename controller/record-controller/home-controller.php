<?php
    include '../check-login.php';
    include '../../model/record-model.php';
    include '../../model/band-model.php';
    include '../../model/album-model.php';

    $recordModel = new RecordModel(); 

    if (isset($_GET['deleteRecordId'])) {
        $deleteRecordId = $_GET['deleteRecordId'];

        $albumModel = new AlbumModel();
        $albumModel->deleteByRecordId($deleteRecordId);

        $bandModel = new BandModel();
        $bandModel->deleteByRecordId($deleteRecordId);

        $recordModel->delete($deleteRecordId);
    }

    $results = $recordModel->getList();

    include '../../view/record-view/home-view.php';
    