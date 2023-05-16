<?php
    session_start();
    include '../../model/record-model.php';
    include '../../model/band-list-model.php';
    include '../../model/album-list-model.php';
    include '../login-status.php';

    $recordModel = new RecordModel(); 

    if (isset($_GET['deleteRecordId'])) {
        $deleteRecordId = $_GET['deleteRecordId'];

        $albumListModel = new AlbumListModel();
        $albumListModel->delete($deleteRecordId);

        $bandListModel = new BandListModel();
        $bandListModel->delete($deleteRecordId);

        $recordModel->delete($deleteRecordId);
    }

    $results = $recordModel->getRecordList();

    include '../../view/home-view.php';
