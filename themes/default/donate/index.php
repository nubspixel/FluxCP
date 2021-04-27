<?php if (!defined('FLUX_ROOT')) exit;
$donate_bundles = [
	['$' => '4.99',    'cp' => 100],
	['$' => '9.99',    'cp' => 250],
	['$' => '19.99',   'cp' => 400],
	['$' => '49.99',   'cp' => 1000],
	['$' => '99.99',   'cp' => 2500],
	['$' => '149.99',  'cp' => 3500],
	['$' => '199.99',  'cp' => 4500],
];
?>
<h2>Donate</h2>
<?php if (Flux::config('AcceptDonations')): ?>
	<?php if (!empty($errorMessage)): ?>
		<p class="red"><?php echo htmlspecialchars($errorMessage) ?></p>
	<?php endif ?>

	<p>By donating, you're supporting the costs of <em>running</em> this server and <em>maintaining</em> it.  In return, you will be rewarded <span class="keyword">donation credits</span> that you may use to purchase items from our <a href="<?php echo $this->url('purchase') ?>">item shop</a>.</p>
	<h3>Are you ready to donate?</h3>
	<p>All donations towards us are received by PayPal, but don't worry!  Even if you don't have an account with PayPal, you can still use your credit card to donate!</p>

	<?php
	$currency         = Flux::config('DonationCurrency');
	$dollarAmount     = (float)+Flux::config('CreditExchangeRate');
	$creditAmount     = 1;
	$rateMultiplier   = 10;
	$hoursHeld        = +(int)Flux::config('HoldUntrustedAccount');

	while ($dollarAmount < 1) {
		$dollarAmount  *= $rateMultiplier;
		$creditAmount  *= $rateMultiplier;
	}
	?>

	<?php if ($hoursHeld): ?>
		<p>To prevent fraudulent payments, our server currently locks the crediting process for
			<span class="hold-hours"><?php echo number_format($hoursHeld) ?> hours</span>
			after the donation has been made to ensure legitimate gameplay and a healthy PayPal reputation.</p>
		<p>This hold is applied only once for the associated PayPal e-mail and RO account.</p>
	<?php endif ?>

	<div class="generic-form-div" style="margin-bottom: 10px">
		<table class="generic-form-table">
			<tr>
				<th><label>Current Credit Exchange Rate:</label></th>
				<td><p><?php echo $this->formatCurrency($dollarAmount) ?> <?php echo htmlspecialchars($currency) ?>
				= <?php echo number_format($creditAmount) ?> credit(s).</p></td>
			</tr>
			<tr>
				<th><label>Minimum Donation Amount:</label></th>
				<td><p><?php echo $this->formatCurrency(Flux::config('MinDonationAmount')) ?> <?php echo htmlspecialchars($currency) ?></p></td>
			</tr>
		</table>
	</div>

	<div class="donate-buttons">
	  <div class="row">
	  <?php foreach ($donate_bundles as $price => $CP): ?>
	    <div class="col-12 col-md-6 mb-2">
	  <?php echo $this->donateButton($price) ?>
	    </div>
	  <?php endforeach; ?>
	  </div>
	</div>
<?php else: ?>
	<p><?php echo Flux::message('NotAcceptingDonations') ?></p>
<?php endif ?>
