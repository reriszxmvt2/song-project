<?php
    session_start();
    include '../../model/record-model.php';
    include '../login-status.php';

    $recordModel = new RecordModel();
    $deledeleteNameRecord = '';

    if (isset($_GET['deleteRecordId'])) {
        $deleteRecordId = $_GET['deleteRecordId'];
        $recordModel->delete($deleteRecordId);
    }

    $results = $recordModel->getRecordList();

    include '../../view/home-view.php';
