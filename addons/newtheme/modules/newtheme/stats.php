<?php if (!defined('FLUX_ROOT')) exit;
require_once (FLUX_THEME_DIR.'/newtheme/includes/config.php');

// herc needs this for some reason
$sc = $this->defaultData['session']->loginAthenaGroup->athenaServers[0];

$sql  = "SELECT * FROM {$sc->charMapDatabase}.mapreg ";
$sql .= 'WHERE varname = \'$savebest$\'';
$sth  = $sc->connection->getStatement($sql);
$sth->execute();
$t = $sth->fetchAll();

if(! $t) {
	for($i=0; $i<6; $i++) {
		$t[$i] = new stdClass;
		$t[$i]->index = $i;
		$t[$i]->value = "unknown";
	}
}

$bests = array();
foreach($t as $key => $value) {
	$bests[$value->index] = $value->value;
}

?>
