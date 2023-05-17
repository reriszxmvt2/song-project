<?php
    session_start();
    include '../../model/album-model.php';
    include '../login-status.php';

    print_r($_REQUEST);

    $error = '';
    $addAlbumName = '';
    $recordId = $_GET['recordId'] ? $_GET['recordId'] : '' ;
    $bandId = $_GET['bandId'] ? $_GET['bandId'] : '' ;

    if (isset($_POST['addAlbumName'])) {
        $addAlbumName = $_POST['addAlbumName'];
        echo 'phet';

        $albumModel = new AlbumModel();
        $result = $albumModel->getByNameAndBandId($bandId, $addAlbumName);

        if ($result) {
            $error = 'album name already exits.';
        } else {
            $albumModel->add($addAlbumName, $bandId);
            header('location: ../album-controller/album-controller.php?recordId=' . $recordId . '&bandId=' . $bandId);
            exit();
        }

    }

    include '../../view/album-view/album-add.php';
