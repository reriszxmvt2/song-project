<?php
    session_start();
    include '../model/record-model.php';

    if (!isset($_SESSION['username'])) {
        header('location: sign-in-controller.php');
    }

    if (isset($_GET['logout'])) { //todo: refactor.
        session_destroy();
        header('location: ../controller/sign-in-controller.php');
    }

    $recordModel = new RecordModel();

    if (isset($_POST['deleteRecord'])) {
        $idRecordDelete = $_POST['idRecordDelete'];//todo: deleteRecordId name.
        $recordModel->deleteRecord($idRecordDelete);
    }

    $results = $recordModel->getRecordList();

    include '../view/home-view.php';
