<?php 
	class PhRoom
	{
		function __construct($link)
		{
			$this->connection = $link ;
		}
		function retrieveMessage(){
			$messages = array();
			$query = "SELECT msg_id,id,name,message,vote,time FROM chat NATURAL JOIN users ORDER BY time";
			if($result = $this->connection->query($query))
			{
				while ($row = $result->fetch_assoc()) {
					$messages[] = $row ;
					// echo json_encode($messages);
				}	
				echo json_encode($messages);
				// return $messages;
			}
		}
		function sendMessage($userId,$message){
			$time = time();
			$query = "INSERT  INTO chat (id,message,time) VALUES('$userId','$message','$time')";
			if($this->connection->query($query))
				return true;
			else 
				return false;
		}
		function clearChat($userId){
			$query = "TRUNCATE TABLE chat";
			if($this->connection->query($query)){
				// $query = "INSERT INTO "
				return true;
			}
			// return false;
			return true;
		}
	}
 ?>