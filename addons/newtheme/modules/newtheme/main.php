<?php if (!defined('FLUX_ROOT')) exit;
require_once FLUX_THEME_DIR.'/newtheme/includes/config.php';

$sc = $this->defaultData['session']->loginAthenaGroup->athenaServers[0];

$autopc = 0;
$sql  = "SELECT * FROM `mapreg` WHERE `varname` LIKE '%autopc%'";
$sth  = $sc->connection->getStatement($sql);
$sth->execute();
$ponline = $sth->fetchAll();
if (isset($ponline) && isset($ponline[0]) && $ponline[0]->value > 0)
  $autopc = $ponline[0]->value;

?>