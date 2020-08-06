<?php
    include("../../../require_inc.php");
    include("../../../phpexcel/Classes/PHPExcel.php");
    
    $file = $_FILES['file']['tmp_name'];

    $objReader = PHPExcel_IOFactory::createReaderForFile($file);
    // get name all sheet in file excel
    $listWorkSheets = $objReader->listWorksheetNames($file);
    
    $objReader->setLoadSheetsOnly('Sheet1');

    $objExcel = $objReader->load($file);
    $sheetData = $objExcel->getActiveSheet()->toArray('null', true, true, true);

    $getHighestColumn = $objExcel->setActiveSheetIndex()->getHighestColumn();
    $getHighestRow = $objExcel->setActiveSheetIndex()->getHighestRow();
    // get name all sheet in file excel
    //$loadAllSheetNames = $objExcel->setActiveSheetIndex()->listWorksheetNames($file);
    for ($i = 2; $i <= $getHighestRow; $i++) {
        $data['type_question'] = $def['type_question_text'];
        $data['knowledge'] = $sheetData[$i]['A'];
        $data['question'] = $sheetData[$i]['B'];
        $ms_answer = '';
        $aa = array();
        if ($sheetData[$i]['F'] != '' && $sheetData[$i]['C'] != 'null')
            array_push($aa, $sheetData[$i]['C']);
        if ($sheetData[$i]['G'] != '' && $sheetData[$i]['D'] != 'null')
            array_push($aa, $sheetData[$i]['D']);
        if ($sheetData[$i]['H'] != '' && $sheetData[$i]['E'] != 'null')
            array_push($aa, $sheetData[$i]['E']);
        if ($sheetData[$i]['I'] != '' && $sheetData[$i]['F'] != 'null')
            array_push($aa, $sheetData[$i]['F']);
        if ($sheetData[$i]['J'] != '' && $sheetData[$i]['G'] != 'null')
            array_push($aa, $sheetData[$i]['G']);
        if ($sheetData[$i]['K'] != '' && $sheetData[$i]['H'] != 'null')
            array_push($aa, $sheetData[$i]['H']);
        if ($sheetData[$i]['L'] != '' && $sheetData[$i]['I'] != 'null')
            array_push($aa, $sheetData[$i]['I']);
        if ($sheetData[$i]['M'] != '' && $sheetData[$i]['J'] != 'null')
            array_push($aa, $sheetData[$i]['J']);
        if (count($aa) > 0) {
            $data['answer'] = implode(";;;s_answer;;;", $aa);
        } else 
            $data['answer'] = '';
        $data['right_answer'] = $sheetData[$i]['K'];
        $table = 'qandas';
        $user = $_SESSION['is_logined'];
        $n = $h->getNumberByQuestion($data['question']);
        if ($n)
            continue;
        else
            $result = $h->insertDataBy($data, $table, $user['id']);
    }
    echo '1;success';
?>