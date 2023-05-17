<?php 
    session_start();
    include '../../model/band-model.php';
    include '../login-status.php';

    $error = '';
    $recordId = $_GET['recordId'];
    $bandId = $_GET['updateBandId'];

    $bandModel = new BandModel();
    $result = $bandModel->getById($bandId);
    $nameBand = $result['name_band'];

    if (isset($_POST['updateNameBand'])) {
        $nameBand = $_POST['nameBand'];

        $results = $bandModel->getByName($nameBand);
        $bandIdInDb = $results['id'];

        if ($results && $bandId != $bandIdInDb) {
            $error = 'Band Name Already Exist.';
        } else {
            $bandModel->update($nameBand, $bandId);
            header('location: ../band-controller/band-controller.php?bandId ='. $bandId . '&recordId=' . $recordId );
            exit();
        }
    }
    
    include '../../view/band-view/band-update.php';