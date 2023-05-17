<?php
    session_start();
    include '../../model/band-model.php';
    include '../../model/album-list-model.php';
    include '../login-status.php';

    // if (!isset($_SESSION['username'])) {
    //     header('location: ../../controller/sign-in-controller.php');
    // }

    $deleteBandId = '';
    $recordId = $_GET['recordId'];

    $bandModel = new BandModel();

    if (isset($_GET['deleteBandId'])) {
        $deleteBandId = $_GET['deleteBandId'];

        $bandModel->deleteByBandIdAndRecordId($deleteBandId ,$recordId);
    }

    $results = $bandModel->getBandList($recordId);

    include '../../view/band-view/band-view.php';
