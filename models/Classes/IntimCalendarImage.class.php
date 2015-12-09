<?php
class IntimCalendarImage extends Connection
{
	public function howLongThisMenstruation($start, $user){
		$db = parent::connect();
		$result = $db->prepare("SELECT * FROM `intim_calendar` WHERE  `user` = ? && `blood` > ? && `date` > ? ORDER BY `date`");
		$result->execute(array($user, 0, $start));
		$events = $result->fetchAll();
		$intim = new IntimCalendar();
		$time = $intim->howLongBetweenMenstruation($user) + $start;
		foreach ($events as $day) {
			if(($day['date'] - $start) > 5*86400){
				$time = $day['date'];
				break;
			}
		}
		return $time;
	}
	
	public function getDayInfo($user, $timestamp){
		$db = parent::connect();
		$result = $db->prepare("SELECT * FROM `intim_calendar` WHERE  `user` = ? && (`date` >= ? && `date` < ?) ");
		$result->execute(array($user, $timestamp, $timestamp + 86400));
		$events = $result->fetch();
		
		return $events;
	}
}