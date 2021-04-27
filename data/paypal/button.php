<?php
if (!defined('FLUX_ROOT')) exit;
$donate_bundles = [
	['$' => '4.99',    'cp' => 100],
	['$' => '9.99',    'cp' => 250],
	['$' => '19.99',   'cp' => 400],
	['$' => '49.99',   'cp' => 1000],
	['$' => '99.99',   'cp' => 2500],
	['$' => '149.99',  'cp' => 3500],
	['$' => '199.99',  'cp' => 4500],
];
$index = $amount;
$amount = $donate_bundles[$index]['$'];

if (empty($amount)) {
	return false;
}

$session            = Flux::$sessionData;
$customDataArray    = array('server_name' => $session->loginAthenaGroup->serverName, 'account_id' => $session->account->account_id);
$customDataEscaped  = htmlspecialchars(base64_encode(serialize($customDataArray)));
$businessEmail      = htmlspecialchars(Flux::config('PayPalBusinessEmail'));
$donationCurrency   = htmlspecialchars(Flux::config('DonationCurrency'));
$creditExchangeRate = Flux::config('CreditExchangeRate');
$donationCredits    = floor($amount / $creditExchangeRate);
$itemName           = htmlspecialchars(sprintf('Donation Credits: %s CREDIT(s)', number_format($donationCredits)));
?>
<form action="https://<?php echo Flux::config('PayPalIpnUrl') ?>/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_donations" />
<input type="hidden" name="notify_url" value="<?php echo $this->url('donate', 'notify', array('_host' => true)) ?>" />
<input type="hidden" name="return" value="<?php echo $this->url('main', 'index', array('_host' => true)) ?>" />
<input type="hidden" name="custom" value="<?php echo $customDataEscaped ?>" />
<input type="hidden" name="business" value="<?php echo $businessEmail ?>" />
<input type="hidden" name="item_name" value="<?php echo $itemName ?>" />
<input type="hidden" name="amount" value="<?php echo (float)$amount ?>" />
<input type="hidden" name="no_shipping" value="0" />
<input type="hidden" name="no_note" value="1" />
<input type="hidden" name="currency_code" value="<?php echo $donationCurrency ?>" />
<input type="hidden" name="tax" value="0" />
<input type="hidden" name="lc" value="US" />
<input type="hidden" name="bn" value="PP-DonationsBF" />

<button class="btn btn-outline-primary btn-lg btn-block" type="submit" name="submit" alt="PayPal - The safer, easier way to pay online!">
	<span><?php echo $donate_bundles[$index]['cp'] ?>x CREDIT(s)</span>
	<span class="text-bold"><?php echo $donationCurrency ?> <?php echo $donate_bundles[$index]['$'] ?></span>
</button>
</form>
