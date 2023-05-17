<?php
    session_start();
    include '../../model/band-model.php';
    include '../../model/album-list-model.php';
    include '../login-status.php';

    $recordId = $_GET['recordId'];

    $bandModel = new BandModel();

    if (isset($_GET['deleteBandId'])) {
        $deleteBandId = $_GET['deleteBandId'];
        echo $deleteBandId;

        // $bandModel->deleteByBandIdAndRecordId($deleteBandId ,$recordId);
    }

    $results = $bandModel->getList($recordId);

    include '../../view/band-view/band-view.php';
