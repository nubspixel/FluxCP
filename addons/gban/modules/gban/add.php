<?php
if (!defined('FLUX_ROOT')) exit;
require_once (FLUX_ADDON_DIR."/gban/lib/gban.php");

$this->loginRequired();

$title = Flux::message('GBanAddTitle');

if (count($_POST)) {
	if (!$params->get('addgban')) {
		$this->deny();
	}

	$Y = trim($params->get('unban_time_year'));
	$m = str_pad(trim($params->get('unban_time_month')), 2, '0', STR_PAD_LEFT);
	$d = str_pad(trim($params->get('unban_time_day')), 2, '0', STR_PAD_LEFT);
	$h = str_pad(trim($params->get('unban_time_hour')), 2, '0', STR_PAD_LEFT);
	$i = str_pad(trim($params->get('unban_time_minute')), 2, '0', STR_PAD_LEFT);
	$s = str_pad(trim($params->get('unban_time_second')), 2, '0', STR_PAD_LEFT);
	$unban_time = sprintf('%s-%s-%s %s:%s:%s', $Y, $m, $d, $h, $i, $s);

	$guid   	= trim($params->get('guid'));
	$reason 	= trim($params->get('reason'));

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
		$bind   = array();
		$bind[] = $guid;

		$gepard_ban = new GBan($server->connection);
		if ($gepard_ban->addGBan($guid, $unban_time, $reason, $session->account->userid, $session->account->account_id)) {
			$session->setMessageData(sprintf(Flux::message('GBanPatternBanned'), $guid));
			$this->redirect($this->url('gban'));
		}
		else {
			$errorMessage = Flux::message('GBanAddFailed');
		}
	}
}
?>
