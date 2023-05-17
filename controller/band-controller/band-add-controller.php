<?php
    session_start();
    include '../../model/band-model.php';
    include '../login-status.php';

    $error = '';
    $addBandName = '';
    $recordId = $_GET['recordId'];

    if (isset($_POST['addBandName'])) {
        $addBandName = $_POST['addBandName'];

        $bandModel = new BandModel();
        $result = $bandModel->getByNameAndRecordId($addBandName, $recordId);

        if ($result) {
            $error = 'band name already exits.';
        } else {
            $bandModel->add($addBandName, $recordId);
            header('location: ../band-controller/band-controller.php?recordId=' . $recordId);
            exit();
        }
    }

    include '../../view/band-view/band-add.php';
