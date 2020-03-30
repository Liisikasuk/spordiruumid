<?php

class Edit_model extends CI_Model
{

   function fetch_all_event(){
	$this->db->select("*");
	$this->db->select("DATE_FORMAT(bookingTimes.startTime, '%Y-%m-%dT%H:%i') AS startTime", FALSE);
	$this->db->select("DATE_FORMAT(bookingTimes.endTime, '%Y-%m-%dT%H:%i') AS endTime", FALSE);
		$this->db->order_by('bookingTimes.startTime');
		$this->db->join('bookings', 'bookingTimes.bookingID = bookings.id' , 'left');
		$this->db->join('rooms', 'bookingTimes.roomID = rooms.id' , 'left');
		$this->db->join('buildings', 'rooms.buildingID = buildings.id' , 'left');
	//	$this->db->join('bookingTypes', 'bookings.typeID = bookingTypes.id' , 'left');
		return $this->db->get('bookingTimes');
	}


	

	function fetch_all_Booking_times(){
		$this->db->order_by('bookingTimes.timeID');
		$this->db->join('bookings', 'bookingTimes.bookingID = bookings.id' , 'left');
		return $this->db->get('bookingTimes');
		}


	function update_booking($data1, $id){


		$this->db->where('id', $id);
		$this->db->update('bookings', $data1);
	
	}
	
	function update_bookingTimes($insert_data, $id){
			
		//	$this->db->insert('bookingTimes', $data2);
		$this->db->where('timeID', $id);
		$this->db->update('bookingTimes', $insert_data);
	//	var_dump($insert_data);
		}


	function insert($insert_data, $id){
		
		$this->db->where('bookingID', $id);
		$this->db->insert('bookingTimes', $insert_data);
		return $this->db->insert_id();
		}

		public function get_room($insert_data){
		
			$this->db->select("roomID");  
			$this->db->order_by('bookingTimes.startTime');
			$this->db->where('bookingID', $insert_data);
			$query=$this->db->get('bookingTimes');
			return $query->row_array();
		
		}

		public function get_allbookingtimes($bookingID, $timeID){
			
			$this->db->where('bookingID', $bookingID);
			$this->db->where('timeID', $timeID);
			$this->db->join('bookings', 'bookingTimes.bookingID = bookings.id' , 'left');
			$this->db->order_by('bookingTimes.startTime','ASC');
			$query=$this->db->get('bookingTimes');
			return $query->result_array();
		
		}

		public function get_conflictsDates($insert_data, $bookingID ){
		
			$this->db->select("timeID, created_at, startTime, endTime, public_info, workout");  
			$this->db->order_by('bookingTimes.startTime');
			$this->db->join('bookings', 'bookingTimes.bookingID = bookings.id' , 'left');
			$this->db->join('rooms', 'bookingTimes.roomID = rooms.id' , 'left');
			$this->db->join('buildings', 'rooms.buildingID = buildings.id' , 'left');
		//	$this->db->where('buildingID', $insert_data);
			$this->db->where('roomID',  $insert_data);
			$this->db->where('bookingID != ', $bookingID); 
			$this->db->where('DATE(startTime) >=', date('Y-m-d H:i:s',strtotime("-1 day")));
			$query=$this->db->get('bookingTimes');
			return  $query->result();
		
		}


		

	public function can_update_or_not($sessionBuilding,$timeID)
    {
		$this->db->where('timeID',  $timeID);
		$this->db->join('rooms', 'bookingTimes.roomID = rooms.id' , 'left');
		$this->db->where('buildingID',  $sessionBuilding);
		$query = $this->db->get('bookingTimes');
		if ($query->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
      
	}


	public function get_lastDate( $whichWeekDaynumberToSearch,$bookingID,$startingDate)
    {
		$this->db->select("timeID");  
		$this->db->order_by('bookingTimes.startTime');
		 $this->db->where('bookingID',  $bookingID);
		 $this->db->where('startTime>=', $startingDate);
		 $this->db->where('WEEKDAY(startTime)+1=',  $whichWeekDaynumberToSearch);
		$query=$this->db->get('bookingTimes');
		return  $query->result_array();
      
	}
	

}

?>
