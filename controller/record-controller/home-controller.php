<?php
    session_start();
    include '../../model/record-model.php';
    include '../../model/band-model.php';
    include '../../model/album-model.php';
    include '../login-status.php';

    if (isset($_POST['logout'])) {
        session_destroy();
        header('location: ../sign-in-controller.php');
    }

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

    include '../../view/record-view/home-view.php'; //todo: เพิ่ม album total ใน record
