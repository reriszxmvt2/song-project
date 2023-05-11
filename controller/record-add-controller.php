<?php 
    include '../model/record-list-model.php';

    if (isset($_POST['nameRecordAdd'])) {
        $nameRecordAdd = $_POST['nameRecordAdd'];

        $recordListModel = new RecordListModel;
        $result = $recordListModel->checkRecordForAdd($nameRecordAdd);

        if ($result) {
            $error = 'username already exits';
        } else {
            $recordListModel->addRecord($nameRecordAdd);
            header('location: index.php');
        }
    }

    include '../view/record-add.php';
