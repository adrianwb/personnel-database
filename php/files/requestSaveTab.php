<?php
	//This array is used to make more changelog than the default one.
	$additional_change_logs = Array();
                    //11.07.2013
                    //change to insertQuery and save the result
                    $insert_result = $dbi->insertQuery($query);
                    $ok = ($dbi->isInteger($insert_result));
                    
                    //Artur Neumann ict.projects@nepal.inf.org
                    //11.07.2013
                    //get data for additional change log
                    if ($ok) {
                    		
                    	$additional_change_log['userID'] = $userID;
                    	$additional_change_log['table'] = $extraTable;
                    	$additional_change_log['recordID'] = $insert_result;
                    	$additional_change_log['updateType'] = 'new';
                    	$additional_change_log['changedFor'] = 'tab';
                    	$additional_change_log['nameID'] = $nameID;
                    		
                    	array_push ($additional_change_logs, $additional_change_log);
                    		
                    }
					//Artur Neumann ict.projects@nepal.inf.org
					//12.07.2013
					//get data for additional change log
					if ($ok) {
						 						 
						$additional_change_log['table'] ='leave_adjustment';
						$additional_change_log['recordID'] = $leaveID;
						$additional_change_log['updateType'] = 'update';

						array_push ($additional_change_logs, $additional_change_log);
						 
					}
				//12.07.2013
				//change to insertQuery and save the result
				$insert_result = $dbi->insertQuery($query1);
				$ok = ($dbi->isInteger($insert_result));
				
				//Artur Neumann ict.projects@nepal.inf.org
				//12.07.2013
				//get data for additional change log
				if ($ok) {
						
					$additional_change_log['table'] ='leave_adjustment';
					$additional_change_log['recordID'] = $insert_result;
					$additional_change_log['updateType'] = 'new';
						
					array_push ($additional_change_logs, $additional_change_log);
				}
			//12.07.2013
			//get data for additional change log
			if ($ok) {
			
				$result = $dbi->query("SELECT id FROM `".$extraTable."` WHERE deleted=1 AND ".$extraID."=".$currentID." AND ".$extraField." NOT IN ('".$detailSet."')");
			
				while ($row_last_update = mysql_fetch_array($result)) {
					$additional_change_log['recordID'] = $row_last_update['id'];
					$additional_change_log['updateType'] = 'update';
						
					array_push ($additional_change_logs, $additional_change_log);
			

			
			}
                        //12.07.2013
                        //change to insertQuery and save the result
                        $insert_result = $dbi->insertQuery($query);
                        $ok = ($dbi->isInteger($insert_result));
                        
                        //Artur Neumann ict.projects@nepal.inf.org
                        //12.07.2013
                        //get data for additional change log
                        if ($ok) {
                        
                        	$additional_change_log['table'] =$extraTable;
                        	$additional_change_log['recordID'] = $insert_result;
                        	$additional_change_log['updateType'] = 'new';
                        
                        	array_push ($additional_change_logs, $additional_change_log);
                        }
                        
                        //Artur Neumann ict.projects@nepal.inf.org
                        //12.07.2013
                        //get data for additional change log
                        if ($ok) {
                        
                        	$result = $dbi->query("SELECT id FROM `".$extraTable."` WHERE deleted=0 AND ".$extraID."=".$currentID." AND ".$extraField."='".$detailID."'");
                        
                        	$row_last_update = mysql_fetch_array($result);
                                              	 
                        	$additional_change_log['table'] =$extraTable;
                        	$additional_change_log['recordID'] = $row_last_update['id'];
                        	$additional_change_log['updateType'] = 'update';

                        	array_push ($additional_change_logs, $additional_change_log);
                        
                        }
				//12.07.2013
				//change to insertQuery and save the result
				$insert_result = $dbi->insertQuery($query);
				$ok = ($dbi->isInteger($insert_result));
				
				//Artur Neumann ict.projects@nepal.inf.org
				//12.07.2013
				//get data for additional change log
				if ($ok) {
				
					$additional_change_log['table'] =$extraTable;
					$additional_change_log['recordID'] = $insert_result;
					$additional_change_log['updateType'] = 'new';
				
					array_push ($additional_change_logs, $additional_change_log);
				}
					//12.07.2013
					//get data for additional change log
					if ($ok) {
					
						$result = $dbi->query("SELECT id FROM `".$extraTable."` WHERE ".$extraField."='".$extraValue."' AND name_id=".$nameID);
					
						$row_last_update = mysql_fetch_array($result);
					
						$additional_change_log['table'] =$extraTable;
						$additional_change_log['recordID'] = $row_last_update['id'];
						$additional_change_log['updateType'] = 'update';
					
						array_push ($additional_change_logs, $additional_change_log);
					
					}
					//12.07.2013
					//get data for additional change log
					if ($ok) {
							
						$result = $dbi->query("SELECT id FROM `".$extraTable."` WHERE ".$extraField."='".$extraValue."' AND name_id=".$nameID);
							
						$row_last_update = mysql_fetch_array($result);
							
						$additional_change_log['table'] =$extraTable;
						$additional_change_log['recordID'] = $row_last_update['id'];
						$additional_change_log['updateType'] = 'update';
							
						array_push ($additional_change_logs, $additional_change_log);
							
					}
        	foreach ($additional_change_logs as $additional_change_log) {
        		$ok=$dbi->createChangeLog(
        				$additional_change_log['table'],
        				$additional_change_log['recordID'],
        				$additional_change_log['updateType'],
        				'tab',
        				$nameID);
        		if (!$ok) {
        			break;
        		}
        	}
        }       