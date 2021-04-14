<?php
if (!defined('FLUX_ROOT')) exit;
require_once (FLUX_ADDON_DIR."/gban/lib/gban.php");

$this->loginRequired();

$title = Flux::message('GBanEditTitle');

$banID = $params->get('guid');

if (!$auth->allowedToModifyIpBan || !$banID) {
	$this->deny();
}

$sql  = "SELECT unique_id, unban_time, reason FROM {$server->loginDatabase}.gepard_block ";
$sql .= "WHERE unique_id = ? LIMIT 1";
$sth  = $server->connection->getStatement($sql);
$sth->execute(array($banID));

$gban = $sth->fetch();

if (count($_POST)) {
	if (!$params->get('modgban')) {
		$this->deny();
	}

	$Y = trim($params->get('unban_time_year'));
	$m = str_pad(trim($params->get('unban_time_month')), 2, '0', STR_PAD_LEFT);
	$d = str_pad(trim($params->get('unban_time_day')), 2, '0', STR_PAD_LEFT);
	$h = str_pad(trim($params->get('unban_time_hour')), 2, '0', STR_PAD_LEFT);
	$i = str_pad(trim($params->get('unban_time_minute')), 2, '0', STR_PAD_LEFT);
	$s = str_pad(trim($params->get('unban_time_second')), 2, '0', STR_PAD_LEFT);
	$unban_time = sprintf('%s-%s-%s %s:%s:%s', $Y, $m, $d, $h, $i, $s);

	$guid       = trim($params->get('newguid'));
	$reason     = trim($params->get('reason'));

	if (!$guid) {
		$errorMessage = Flux::message('GBanEnterGeIDPattern');
	}
	elseif (!preg_match('/^([0-9]+)$/', $guid, $m)) {
		$errorMessage = Flux::message('GBanInvalidPattern');
	}
	elseif (!$reason) {
		$errorMessage = Flux::message('GBanEnterReason');
	}
	elseif (!$unban_time) {
		$errorMessage = Flux::message('GBanSelectUnbanDate');
	}
	elseif (strtotime($unban_time) <= time()) {
		$errorMessage = Flux::message('GBanFutureDate');
	}
	else {
		if ($guid != $gban->guid) {
			$bind   = array();
			$bind[] = $guid;

			$sql  = "SELECT unique_id FROM {$server->loginDatabase}.gepard_block WHERE unban_time > NOW() AND ";
			$sql .= "(unique_id = ?) LIMIT 1";
			$sth  = $server->connection->getStatement($sql);

			$sth->execute($bind);
			$gban2 = $sth->fetch();

			if ($gban2 && $gban2->list) {
				$errorMessage = sprintf(Flux::message('GBanAlreadyBanned'), $gban2->list);
			}
		}

		if (empty($errorMessage)) {
			$gepard_ban = new GBan($server->connection);
			if ($gepard_ban->editGBan($guid, $unban_time, $reason)) {
		 		$session->setMessageData(sprintf(Flux::message('GBanPatternBanned'), $list));
		 		$this->redirect($this->url('gban'));
			}
		 	else {
		 		$errorMessage = Flux::message('GBanEditFailed');
		 	}
		}
	}
}
?>
