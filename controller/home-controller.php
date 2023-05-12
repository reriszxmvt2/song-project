<?php
    session_start();
    include '../model/record-model.php';

    if (!isset($_SESSION['username'])) {
        header('location: sign-in-controller.php'); //todo: rectactor ให้ใช้ร่วมกัน
    }

    if (isset($_POST['logout'])) { //todo: refactor. 
        session_destroy();
        header('location: ../controller/sign-in-controller.php');
    }

    $recordModel = new RecordModel();
    $deledeleteNameRecord = '';

    if (isset($_POST['deleteRecord'])) {
        $deleteNameRecord = $_POST['deleteNameRecord'];//todo: change name ex. `deleteRecordId`
        $recordModel->deleteRecord($deleteNameRecord);
    }

    $results = $recordModel->getRecordList();

    include '../view/home-view.php';
