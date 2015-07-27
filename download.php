<?
	
	function download($con, $userID, $sql, $filename){
		
		$num = mysqli_num_rows($sql);
		
		if ($num > 0){
			
			ob_clean();
			$filename = $filename.date("Y-m-d H:i:s").'.csv';
			// open raw memory in write mode as file so no temp files needed
			$fp = fopen('php://output', "w");
			
			$row = mysqli_fetch_assoc($sql);
			
			$seperator = "";
			$comma = "";
			
			//write in table headers
			foreach($row as $name => $value) {
				$seperator .= $comma . '' .str_replace('','""',$name);
				$comma = ",";
			}
			$seperator .= "\n";
			fputs($fp, $seperator);
			
			//skip past the 0th value
			mysqli_data_seek($sql,0);
			
			//write in the table data
			while($row = mysqli_fetch_assoc($sql)){
				$seperator = "";
				$comma = "";
				
				foreach($row as $name => $value) {
					//take any commas out initially which would confuse the csv file
					$value = str_replace(",", " ", $value);
					$seperator .= $comma . '' .str_replace('','""',$value);
					$comma = ",";
				}
				$seperator .= "\n";
				fputs($fp, $seperator);
			}
			
			fclose($fp);
			// tell the browser it's going to be a csv file
			header('Content-Type: application/csv');
			// tell the browser to save it instead of displaying it
			header('Content-Disposition: attachement; filename="'.$filename.'";');
			exit();
		}
	}
		
?>
