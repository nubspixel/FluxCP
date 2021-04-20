<?php
if (!defined('FLUX_ROOT')) exit;

class GBan
{
	public function __construct($connection)
	{
		$this->connection = $connection;
	}

	public function editGBan($unique_id, $unban_time, $unbanReason)
	{
		# $data = [$unique_id, $unban_time, $unbanReason];
		$sql  = "REPLACE INTO gepard_block (unique_id, unban_time, reason) ";
		$sql .= "VALUES (?, ? , ?)";
		$sth  = $this->connection->getStatement($sql);
		if ($sth->execute(array($unique_id, $unban_time, $unbanReason))) {
			return true;
		} else {
			return false;
		}
	}

	public function addGBan($unique_id, $unbanTime, $banReason, $bannedBy, $bannedByAid)
	{
		$sql  = "REPLACE INTO gepard_block (unique_id, unban_time, reason) ";
		$sql .= "VALUES (?, ?, ?)";
		$sth  = $this->connection->getStatement($sql);
		if($sth->execute(array($unique_id, $unbanTime, $banReason))) {
			$sql  = "INSERT INTO gepard_block_log (unique_id, block_time, unban_time, reason, violator_name, violator_account_id, initiator_name, initiator_account_id) ";
			$sql .= "VALUES (?, NOW(), ?, ?, '', 0, ?, ?) ";
			$sth  = $this->connection->getStatement($sql);
			return $sth->execute(array($unique_id, $unbanTime, $banReason, $bannedBy, $bannedByAid));
		} else {
			return false;
		}
	}

	public function removeGBan($unique_id)
	{
		$sql = "DELETE FROM gepard_block WHERE unique_id = ?";
		$sth  = $this->connection->getStatement($sql);
		if ($sth->execute(array($unique_id))) {
			return true;
		} else {
			return false;
		}
	}

	public function getBanInfo($unique_id)
	{
		$sql  = "SELECT * FROM gepard_block WHERE unban_time > NOW() AND unique_id = ? LIMIT 1";
		$sth  = $this->connection->getStatement($sql);
		$sth->execute(array($unique_id));

		return $sth->fetch();
	}

	public function getBanInfoDetails($unique_id)
	{
		$sql  = "SELECT * FROM gepard_block WHERE unique_id = ? LIMIT 1";
		$sth  = $this->connection->getStatement($sql);
		$sth->execute(array($unique_id));
		$result = $sth->fetch();

		$data = array();
		if($result) {
			$data['status'] = new stdClass;
			$data['status']->unique_id  = $result->unique_id;
			$data['status']->unban_time  = $result->unban_time;
			$data['status']->reason  = $result->reason;
		}

		$sql  = "SELECT * FROM gepard_block_log WHERE unique_id = ? ORDER BY unban_time DESC";
		$sth2  = $this->connection->getStatement($sql);
		$sth2->execute(array($unique_id));
		$result2 = $sth2->fetchAll();

		foreach ($result2 as $key => $value)
		{
			$data['log'][$key] 							= new stdClass;
			$data['log'][$key]->unique_id 				= $value->unique_id;
			$data['log'][$key]->block_time 				= $value->block_time;
			$data['log'][$key]->unban_time 				= $value->unban_time;
			$data['log'][$key]->violator_name 			= $value->violator_name;
			$data['log'][$key]->violator_account_id 	= $value->violator_account_id;
			$data['log'][$key]->initiator_name 			= $value->initiator_name;
			$data['log'][$key]->initiator_account_id 	= $value->initiator_account_id;
			$data['log'][$key]->reason 					= $value->reason;
		}

		return $data;
	}
}

?>