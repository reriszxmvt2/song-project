<?php
    session_start();
    include '../model/record-model.php';

    $recordModel = new RecordModel();
    $results = $recordModel->getRecordList();

    if (!isset($_SESSION['username'])) {
        header('location: sign-in-controller.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        header('location: ../controller/sign-in-controller.php');
    }

    if (isset($_POST['deleteRecord'])) {
        $idRecordDelete = $_POST['idRecordDelete'];
        $recordModel->deleteRecord($idRecordDelete);
    }

    include '../view/home-view.php';
