<?php
if (!defined('FLUX_ROOT')) exit;
require_once (FLUX_ADDON_DIR."/gban/lib/gban.php");

$this->loginRequired();

$title = Flux::message('GBanRemoveTitle');

$guid = $params->get('guid');

if (!$auth->allowedToRemoveIpBan || !$guid) {
	$this->deny();
}

$gepard_ban = new GBan($server->connection);
$gban = $gepard_ban->getBanInfo($guid);

if (count($_POST)) {
	if (!$params->get('remgban')) {
		$this->deny();
	}

	if (!$guid) {
		$errorMessage = Flux::message('GBanEnterGeIDPattern');
	}
	elseif (!preg_match('/^([0-9]+)$/', $guid, $m)) {
		$errorMessage = Flux::message('GBanInvalidPattern');
	}
	elseif (!$gban || !$gban->unique_id) {
		$errorMessage = sprintf(Flux::message('GBanNotBanned'), $guid);
	}
	elseif ($gepard_ban->removeGBan($guid)) {
		$session->setMessageData(sprintf(Flux::message('GBanPatternUnbanned'), $guid));
		$this->redirect($this->url('gban'));
	}
	else {
		$errorMessage = Flux::message('GBanRemoveFailed');
	}
}
?>
