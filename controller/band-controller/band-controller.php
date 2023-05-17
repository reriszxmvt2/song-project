<?php
    session_start();
    include '../../model/band-model.php';
    include '../../model/album-model.php';
    include '../login-status.php';

    $recordId = $_GET['recordId'];
    $bandId = '';
    
    $bandModel = new BandModel();

    if (isset($_GET['bandId'])) {
        $bandId = $_GET['bandId'];

        $albumModel = new AlbumModel();
        $albumModel->deleteByBandId($bandId);

        $bandModel->delete($bandId);
    }

    $results = $bandModel->getList($recordId);

    function generateDeleteBandUrl($bandId, $recordId) {
        return '../band-controller/band-controller.php?bandId=' . $bandId . '&recordId=' . $recordId ;;
    }
    
    function generateUpdateBandUrl($bandId, $recordId) {
        return '../band-controller/band-update-controller.php?updateBandId=' . $bandId . '&recordId=' . $recordId;
    }
    
    function generateAlbumUrl($bandId, $recordId) {
        return '../album-controller/album-controller.php?bandId=' . $bandId . '&recordId=' . $recordId;
    }

    function generateAddBandUrl($recordId) {
        return '../band-controller/band-add-controller.php?recordId=' . $recordId;
    }

    function generateBackToRecordUrl() {
        return '../record-controller/home-controller.php';
    }

    include '../../view/band-view/band-view.php';
