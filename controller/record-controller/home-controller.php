<?php
    session_start();
    include '../../model/record-model.php';
    include '../../model/band-model.php';
    include '../../model/album-list-model.php';
    include '../login-status.php';

    if (isset($_POST['logout'])) {
        session_destroy();
        header('location: ../sign-in-controller.php');
    }

    $recordModel = new RecordModel(); 

    if (isset($_GET['deleteRecordId'])) {
        $deleteRecordId = $_GET['deleteRecordId'];

        $albumListModel = new AlbumListModel();
        $albumListModel->delete($deleteRecordId);

        $bandModel = new BandModel();
        $bandModel->delete($deleteRecordId);

        $recordModel->delete($deleteRecordId);
    }

    $results = $recordModel->getList();

    include '../../view/record-view/home-view.php'; //todo: เพิ่ม album total ใน record
