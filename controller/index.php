<?php
    session_start();
    include '../model/record-list-model.php';

    if (!isset($_SESSION['username'])) {
        header('location: sign-in-controller.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        header('location: ../controller/sign-in-controller.php');
    }

    if (isset($_POST['deleteRecord'])) {
        $idRecordDelete = $_POST['idRecordDelete'];

        $recordListModel = new RecordListModel();
        $recordListModel->deleteRecord($idRecordDelete);
    }

    $results = $recordListModel->getRecordList();

    include '../view/home-view.php';
