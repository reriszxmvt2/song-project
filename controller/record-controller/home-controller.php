<?php
    session_start();
    include '../../model/record-model.php';
    include '../login-status.php';

    $recordModel = new RecordModel();
    $deledeleteNameRecord = '';
    $addUrl = "../record-controller/record-add-controller.php"; 

    if (isset($_GET['deleteRecordId'])) {
        $deleteRecordId = $_GET['deleteRecordId'];
        $recordModel->delete($deleteRecordId);
    }

    $results = $recordModel->getRecordList();

    include '../../view/home-view.php';
