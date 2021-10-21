<?php
 echo "<h3>This is test file</h3>";
 $file1 = file_get_contents('E:\test\test1.txt');
 echo $file1;

 echo "<h3>This is excel file</h3>";
 require_once 'SimpleXLSX.php';
 if ( $xlsx = SimpleXLSX::parse('E:\test\test2.xlsx')) {
    echo "<table><tbody>";
    $i = 0;
    foreach ($xlsx->rows() as $row) {
      if ($i == 0) {
        echo "<tr><th>" . $row[0] . "</th></tr>";
      } 
      else {
        echo "<tr><td>" . $row[0] . "</td></tr>";
      }      
      $i++;
    }
    echo "</tbody></table>";
  } 
  else {
    echo SimpleXLSX::parseError();
  }

  echo "<h3>This is CSV file</h3>";
  $row = 1;
  if (($file = fopen('E:\test\test3.csv', 'r')) !== FALSE) {
    while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
      $num = count($data);
      echo "<p>fields in line $row: <br /></p>\n";
      $row++;
      for ($c=0; $c < $num; $c++) {
        echo $data[$c] . "<br />\n";
      }
    }
    fclose($file);
  }

  echo "<h3>This is Document(doc) file</h3>";
  function parseWord($userDoc) {
    $fileHandle = fopen($userDoc, 'r');
    $line = @fread($fileHandle, filesize($userDoc));   
    $lines = explode(chr(0x0D),$line);
    $outtext = "";
    foreach($lines as $thisline) {
      $pos = strpos($thisline, chr(0x00));
      if (($pos !== FALSE)||(strlen($thisline)==0)) {
      } 
      else {
        $outtext .= $thisline." ";
      }
    }
    $outtext = preg_replace("/[^a-zA-Z0-9\s\,\.\-\n\r\t@\/\_\(\)]/","",$outtext);
    return $outtext;
  } 
  $userDoc = 'E:\test\test4.doc';
  $text = parseWord($userDoc);
  echo $text;
?>