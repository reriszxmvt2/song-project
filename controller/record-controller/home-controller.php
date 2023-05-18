<?php
    include '../check-login.php';
    include '../../model/record-model.php';
    include '../../model/band-model.php';
    include '../../model/album-model.php';

    if (isset($_POST['logout'])) {
        session_destroy();
        header('location: ../sign-in-controller.php');
    }

    $recordModel = new RecordModel(); 

    if (isset($_GET['deleteRecordId'])) {
        $deleteRecordId = $_GET['deleteRecordId'];

        $albumModel = new AlbumModel();
        $albumModel->deleteByRecordId($deleteRecordId);

        $bandModel = new BandModel();
        $bandModel->deleteByRecordId($deleteRecordId);

        $recordModel->delete($deleteRecordId);
    }

    $results = $recordModel->getList();

    function generateDeleteRecordUrl($recordId) {
        return '../record-controller/home-controller.php?deleteRecordId=' . $recordId;
    }
    
    function generateUpdateRecordUrl($recordId) {
        return '../record-controller/record-update-controller.php?updateRecordId=' . $recordId;
    }
    
    function generateBandListUrl($recordId) {
        return '../band-controller/band-controller.php?recordId=' . $recordId;
    }

    function generateAddRecordUrl() {
        return '../record-controller/record-add-controller.php';
    }

    include '../../view/record-view/home-view.php';
