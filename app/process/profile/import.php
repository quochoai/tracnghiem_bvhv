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
        $block_name = $sheetData[$i]['A'];
        $block = $h->getBlockByName($block_name);
        $data['block_id'] = $block['id'];
        $department_name = $sheetData[$i]['B'];
        $dp = $h->getDepartmentByName($department_name);
        $data['department_id'] = $dp['id'];
        $title_name = $sheetData[$i]['C'];
        $title = $h->getTitleByName($title_name);
        $data['title_id'] = $title['id'];
        
        $data['profile_code'] = $sheetData[$i]['D'].'.bvhv';
        $data['password'] = $h->mahoa('12345');
        $data['fullname'] = $sheetData[$i]['E'];
        $data['birthday'] = $sheetData[$i]['F'];
        $data['email'] = $sheetData[$i]['G'];
        $data['phone'] = '0'.$sheetData[$i]['H'];
        $data['role'] = $def['role_candidate'];
        $data['active'] = $def['actived'];
        $data['active_exam'] = $def['actived'];
        $table = 'profiles';
        $user = $_SESSION['is_logined'];
        $n = $h->getNumberProfileByCode($data['profile_code']);
        if ($n)
            continue;
        else
            $result = $h->insertDataBy($data, $table, $user['id']);
    }
    echo '1;success';
?>