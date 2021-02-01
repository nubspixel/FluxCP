<?php
// This is the application configuration file. All values have been set to
// the default, and should be changed as needed.
return array(
	'ServerAddress'				=> 'localhost',				// This value is the hostname:port under which Flux runs. (e.g., example.com or example.com:80)
	'BaseURI'					=> 'demo',						// The base URI is the base web root on which your application lies.
	'InstallerPassword'			=> 'secretpassword',		// Installer/updater password.
	'RequireOwnership'			=> true,					// Require the executing user to be owner of the FLUX_ROOT/data/ directory tree? (Better for security)
															// WARNING: This will be mostly IGNORED on non-POSIX-compliant OSes (e.g. Windows).
	'DefaultLoginGroup'			=> null,
	'DefaultCharMapServer'		=> null,
	'DefaultLanguage'			=> 'en_us',					// Specify the default control panel language (see FLUX_ROOT/lang/ directory for available languages.)
	'SiteTitle'					=> 'Flux Control Panel',	// This value is only used if the theme decides to use it.
	'ThemeName'					=> array('newtheme','default', 'bootstrap'), // Names of the themes you would like list for use in the footer. Themes are in FLUX_ROOT/themes.
	'ScriptTimeLimit'			=> 0,						// Script execution time limit. Specifies (in seconds) how long a page should run before timing out. (0 means forever)
	'MissingEmblemBMP'			=> 'empty.bmp',				//
	'ItemIconNameFormat'		=> '%d.png',				// The filename format for item icons (defaults to {itemid}.png).
	'ItemImageNameFormat'		=> '%d.png',				// The filename format for item images (defaults to {itemid}.png).
	'MonsterImageNameFormat'	=> '%d.gif',				// The filename format for monster images (defaults to {monsterid}.gif).
	'JobImageNameFormat'		=> '%d.gif',				// The filename format for job images (defaults to {jobid}.gif).
	'ForceEmptyEmblem'			=> false,					// Forcefully display empty guild emblems, helpful when you don't have GD2 installed.
	'EmblemCacheInterval'		=> 12,						// Hourly interval to re-cache guild emblems (set to 0 to disable emblem cache).
	'SessionCookieExpire'		=> 48,						// Duration in hours.
	'AdminMenuGroupLevel'		=> AccountLevel::LOWGM,		// The starting group ID for which module actions are moved into the admin menu for display.
	'DateDefaultTimezone'		=> 'UTC',					// The default timezone, consult the PHP manual for valid timezones: http://php.net/timezones (null for defaut system TZ)
	'DateFormat'				=> 'Y-m-d',					// Default DATE format to be displayed in pages.
	'DateTimeFormat'			=> 'Y-m-d H:i:s',			// Default DATETIME format to be displayed in pages.
	'ShowSinglePage'			=> true,					// Whether or not to show the page numbers even if there's only one page.
	'ResultsPerPage'			=> 20,						// The number of results to display in a paged set, per page.
	'PagesToShow'				=> 10,						// The number of page numbers to display at once.
	'PageJumpMinimumPages'		=> 1,						// Minimum number of required pages before page jump box is shown. (0 to always show!)
	'ShowPageJump'				=> true,					// Whether or not to show the "Page Jump" box.
	'SingleMatchRedirect'		=> true,					// Whether or not to redirect to view action from index page if only one match is returned (and action is allowed).
	'SingleMatchRedirectItem'	=> false,					// Same as above, for item module.
	'SingleMatchRedirectMobs'	=> false,					// Same as above, for monster module.
	'UsernameAllowedChars'		=> 'a-zA-Z0-9_',			// PCRE Format Pattern. default: 'a-zA-Z0-9_' (alphanumeric and underscore)
															// WARNING: This string isn't escaped so be careful which chars you use!
															// PCRE Pattern Ref: http://php.net/manual/en/pcre.pattern.php
	'MinUsernameLength'			=> 4,						// Minimum username length.
	'MaxUsernameLength'			=> 23,						// Maximum username length.
	'MinPasswordLength'			=> 8,						// Minimum password length.
	'MaxPasswordLength'			=> 31,						// Maximum password length.
	'PasswordMinUpper'			=> 1,						// Number of upper-case letters to require in passwords.
	'PasswordMinLower'			=> 1,						// Number of lower-case letters to require in passwords.
	'PasswordMinNumber'			=> 1,						// Number of numbers to require in passwords.
	'PasswordMinSymbol'			=> 0,						// Number of symbols to require in passwords.
	'GMMinPasswordLength'		=> 8,						// Minimum password length for GM accounts.
	'GMPasswordMinUpper'		=> 1,						// Number of upper-case letters to require in passwords for GM accounts.
	'GMPasswordMinLower'		=> 1,						// Number of lower-case letters to require in passwords for GM accounts.
	'GMPasswordMinNumber'		=> 1,						// Number of numbers to require in passwords for GM accounts.
	'GMPasswordMinSymbol'		=> 1,						// Number of symbols to require in passwords for GM accounts.
	'RandomPasswordLength'		=> 16,						// This is the length of the random password generated by the "Reset Password" feature. (NOTE: Hardcoded minimum value of 8)
	'AllowUserInPassword'		=> false,					// Whether or not to allow the password to contain the username. (NOTE: A case-insensitive search is performed)
	'AllowDuplicateEmails'		=> false,					// Whether or not to allow duplicate e-mails to be used in registration. (See Mailer config options)
	'RequireEmailConfirm'		=> false,					// Require e-mail confirmation during registration.
	'RequireChangeConfirm'		=> false,					// Require confirmation when changing e-mail addresses.
	'EmailConfirmExpire'		=> 48,						// E-mail confirmations expire hours. Unconfirmed accounts will expire after this period of time.
	'PincodeEnabled'			=> true,					// Whether or not the pincode system is enabled in your server. (Check your char_athena.conf file. Enabled by default.)
	'MailerFromAddress'			=> 'noreply@localhost',		// The e-mail address displayed in the From field.
	'MailerFromName'			=> 'MailerName',			// The name displayed with the From e-mail address.
	'MailerUseSMTP'				=> false,					// Whether or not to use a separate SMTP server for sending mail.
	'MailerSMTPUseSSL'			=> false,					// Whether or not mailer should connect using SSL (yes for GMail).
	'MailerSMTPUseTLS'			=> false,					// Same as above SSL setting, but for TLS.  This setting will override the SSL setting.
	'MailerSMTPPort'			=> null,					// When MailerUseSMTP is true: SMTP server port (mailer will default to 25).
	'MailerSMTPHosts'			=> null,					// When MailerUseSMTP is true: A string host or array of hosts (e.g., 'host1' or array('host1', 'backuphost')).
	'MailerSMTPUsername'		=> null,					// When MailerUseSMTP is true: Authorized username for SMTP server.
	'MailerSMTPPassword'		=> null,					// When MailerUseSMTP is true: Authorized password for SMTP server (for above user).
	'ServerStatusCache'			=> 2,						// Store a cached server status and refresh every X minutes.  Default: 2 minutes (value is measured in minutes).
	'ServerStatusTimeout'		=> 2,						// For each server, spend X amount of seconds to determine whether it's up or not.
	'SessionKey'				=> 'fluxSessionData',		// Shouldn't be changed, just specifies the session key to be used for session data.
	'DefaultModule'				=> 'main',					// This is the module to execute when none has been specified.
	'DefaultAction'				=> 'index',					// This is the default action for any module, probably should leave this alone. (Deprecated)
	'GzipCompressOutput'		=> false,					// Whether or not to compress output using zlib.
	'GzipCompressionLevel'		=> 9,						// zlib compression level. (1~9)
	'OutputCleanHTML'			=> true,					// Use this if you have Tidy installed to clean your HTML output when serving pages.
	'ShowCopyright'				=> true,					// Whether or not to show the copyright footer.
	'ShowRenderDetails'			=> true,					// Shows the "page rendered in X seconds" and "number of queries executed: X" in the default theme.
	'UseCleanUrls'				=> false,					// Set to true if you're running Apache and it supports mod_rewrite and .htaccess files.
	'DebugMode'					=> true,					// Set to false to minimize technical details from being output by Flux. WARNING: DO NOT USE THIS OPTION ON A PUBLICALLY-ACCESSIBLE CP.
	'UseCaptcha'				=> true,					// Use CAPTCHA image for account registration to prevent automated account creations. (Requires GD2/FreeType2)
	'UseLoginCaptcha'			=> false,					// Use CAPTCHA image for account logins. (Requires GD2/FreeType2)
	'EnableReCaptcha'			=> false,					// Enables the use of reCAPTCHA instead of Flux's native GD2 library (http://www.google.com/recaptcha)
	'ReCaptchaPublicKey'		=> '...',					// This is your reCAPTCHA public key [REQUIRED FOR RECAPTCHA] (sign up at http://www.google.com/recaptcha)
	'ReCaptchaPrivateKey'		=> '...',					// This is your reCAPTCHA private key [REQUIRED FOR RECAPTCHA] (sign up at http://www.google.com/recaptcha)
	'ReCaptchaTheme'			=> 'light',					// ReCaptcha theme to use (Value: dark or light) (see: https://developers.google.com/recaptcha/docs/display#render_param)
	'DisplaySinglePages'		=> true,					// Whether or not to display paging for single page results.
	'ForwardYears'				=> 15,						// (Visual) The number of years to display ahead of the current year in date inputs.
	'BackwardYears'				=> 30,						// (Visual) The number of years to display behind the current year in date inputs.
	'ColumnSortAscending'		=> ' ▲',					// (Visual) Text displayed for ascending sorted column names.
	'ColumnSortDescending'		=> ' ▼',					// (Visual) Text displayed for descending sorted column names.
	'CreditExchangeRate'		=> 1.0,						// The rate at which credits are exchanged for dollars.
	'MinDonationAmount'			=> 2.0,						// Minimum donation amount. (NOTE: Actual donations made that are less than this account won't be exchanged)
	'DonationCurrency'			=> 'USD',					// Preferred donation currency. Only donations made in this currency will be processed for credit deposits.
	'MoneyDecimalPlaces'		=> 2,						// (Visual) Number of decimal places to display in amount.
	'MoneyThousandsSymbol'		=> ',',						// (Visual) Thousandths place separator (a period in European currencies).
	'MoneyDecimalSymbol'		=> '.',						// (Visual) Decimal separator (a comma in European currencies).
	'AcceptDonations'			=> true,					// Whether or not to accept donations.
	'PayPalIpnUrl'				=> 'www.paypal.com',		// The ipnpb.paypal.com and ipnpb.sandbox.paypal.com endpoints only accept HTTPS connections. If you currently use www.paypal.com, you should move to ipnpb.paypal.com when you update your code to use HTTPS.
	'PayPalBusinessEmail'		=> 'admin@localhost',		// Enter the e-mail under which you have registered your business account.
	'PayPalReceiverEmails'		=> array(					// These are the receiver e-mail addresses who are allowed to receive payment.
		//'admin2@localhost',								// -- This array may be empty if you only use one e-mail
		//'admin3@localhost'								// -- because your Business Email is also checked.
	),
	'PaypalHackNotify'          => true,                    // Send email notification if hack attempt detected (Notification will be send for each address in list PayPalBusinessEmail and PayPalReceiverEmails)
	'GStorageLeaderOnly'		=> false,					// Only allow guild leader to view guild storage rather than all members?
	'DivorceKeepChild'			=> false,					// Keep child after divorce?
	'DivorceKeepRings'			=> false,					// Keep wedding rings after divorce?
	'IpWhitelistPattern'		=>							// PCRE Format Pattern. It's recommended you add your gameserver, webserver and server owner's IPs here.
		'(127\.0\.0\.1|0(\.[0\*]){3})',						// WARNING: This string isn't escaped so be careful which chars you use!
															// By default, whitelists 127.0.0.1 (localhost) and 0.0.0.0 (all interfaces; whitelists all wildcard bans that can achive this too)
	'AllowIpBanLogin'			=> false,					// Allow logging into account from banned IP.
	'AllowTempBanLogin'			=> false,					// Allow logging in of temporarily banned accounts.
	'AllowPermBanLogin'			=> false,					// Allow logging in of permanently banned accounts.
	'AutoRemoveTempBans'		=> true,					// Automatically remove expired temporary bans on certain pages.
	'ItemShopMaxCost'			=> 99,						// Max price an item can be sold for.
	'ItemShopMaxQuantity'		=> 99,						// Max quantity the item may be sold at once for.
	'ItemShopItemPerPage'		=> 5,						// The number of items to display per page in the "Item Shop" page.
    'ShowItemDesc'              => false,                   // Displays generated item descs from parsed itemInfo.lua
	'HideFromWhosOnline'		=> AccountLevel::LOWGM,		// Levels greater than or equal to this will be hidden from the "Who's Online" page.
	'HideFromMapStats'			=> AccountLevel::LOWGM,		// Levels greater than or equal to this will be hidden from the "Map Stats" page.
	'EnableGMPassSecurity'		=> AccountLevel::LOWGM,		// Levels greater than or equal to this will be required to use passwords that meet the earlier GM Password settings.
	'ChargeGenderChange'		=> 0,						// You can specify this as the number of credits to charge for gender change.  Can be 0 for free change.
	'BanPaymentStatuses'		=> array(					// Payment statuses that will automatically ban the account owner if received.
		'Cancelled_Reversal',								// -- 'Cancelled_Reversal'
		'Reversed',											// -- 'Reversed'
	),

	'HoldUntrustedAccount'		=> 0,						// This is the time in hours to hold a donation crediting process for, if the account
															// isn't a trusted account. Specify 0 or false to disable this feature.

	'AutoUnholdAccount'			=> false,					// Enable this to auto-unhold an account and credit it if the transaction is still
															// valid.  This only applies if you are using the HoldUnstrustedAccount feature.
															// If you want to run a cron job instead, you can make a request to the '/donate/update'
															// module/action with the InstallerPassword as the password to run the update task.
															// With clean URLs: http://<server>/<baseURI>/donate/update?password=<InstallerPassword>
															// Without clean URLs: http://<server>/<baseURI>?module=donate&action=update&password=<InstallerPassword>
															// NOTE: This option is HIGHLY inefficient, it's recommended to run a cron job instead.

	'AutoPruneAccounts'			=> false,					// Enable this to automatically prune expired accounts. Enabling this is a performance
															// performance killer. See 'AutoUnholdAccount' for running this task as a cron job,
															// the module is 'account' and the action is 'prune'.
															// With clean URLs: http://<server>/<baseURI>/account/prune?password=<InstallerPassword>
															// Without clean URLs: http://<server>/<baseURI>?module=account&action=prune&password=<InstallerPassword>

	'ShopImageExtensions'		=> array(					// These are the image extensions allowed for uploading in the item shop.
		'png', 'jpg', 'gif', 'bmp', 'jpeg'
	),
	'NoResetPassGroupLevel'		=> AccountLevel::LOWGM,		// Minimum group level of account to prevent password reset using control panel.

	'CharRankingLimit'			=> 20,						//
	'GuildRankingLimit'			=> 20,						//
	'ZenyRankingLimit'			=> 20,						//
	'DeathRankingLimit'			=> 20,						//
	'AlchemistRankingLimit'		=> 20,						//
	'BlacksmithRankingLimit'	=> 20,						//
	'HomunRankingLimit'			=> 20,						//
	'MVPRankingLimit'			=> 20,						//

	'RankingHideGroupLevel'		=> AccountLevel::LOWGM,		//
	'InfoHideZenyGroupLevel'	=> AccountLevel::LOWGM,		// Minimum group level of account to hide zeny from in server information page.

	'CharRankingThreshold'		=> 0,						// Number of days the character must have logged in within to be listed in character ranking. (0 = disabled)
	'ZenyRankingThreshold'		=> 0,						// Number of days the character must have logged in within to be listed in zeny ranking. (0 = disabled)
	'DeathRankingThreshold'		=> 0,						// Number of days the character must have logged in within to be listed in death ranking. (0 = disabled)
	'AlchemistRankingThreshold'	=> 0,						// Number of days the character must have logged in within to be listed in death ranking. (0 = disabled)
	'HomunRankingThreshold'		=> 0,						// Number of days the character must have logged in within to be listed in homunculus ranking. (0 = disabled)

	'HideTempBannedCharRank'	=> false,					// Hide temporarily banned characters from ranking.
	'HidePermBannedCharRank'	=> true,					// Hide permanently banned characters from ranking.

	'HideTempBannedZenyRank'	=> false,					// Hide temporarily banned characters from ranking.
	'HidePermBannedZenyRank'	=> true,					// Hide permanently banned characters from ranking.

	'HideTempBannedDeathRank'	=> false,					// Hide temporarily banned characters from ranking.
	'HidePermBannedDeathRank'	=> true,					// Hide permanently banned characters from ranking.

	'HideTempBannedAlcheRank'	=> false,					// Hide temporarily banned characters from ranking.
	'HidePermBannedAlcheRank'	=> true,					// Hide permanently banned characters from ranking.

	'HideTempBannedSmithRank'	=> false,					// Hide temporarily banned characters from ranking.
	'HidePermBannedSmithRank'	=> true,					// Hide permanently banned characters from ranking.

	'HideTempBannedStats'		=> false,					// Hide temporarily banned accounts from statistics.
	'HidePermBannedStats'		=> true,					// Hide permanently banned accounts from statistics.

	'HideTempBannedHomunRank'	=> false,					// Hide temporarily banned characters from ranking.
	'HidePermBannedHomunRank'	=> true,					// Hide permanently banned characters from ranking.

	'SortJobsByAmount'			=> false,					// Sort job class information on statistics page by descending quantity (false = Sort by Job ID).

	'CpLoginLogShowPassword'	=> false,					// Show password in CP login log (also see access.php's SeeCpLoginLogPass).

	'CpResetLogShowPassword'	=> false,					// Show password in CP "password resets" log (also see access.php's SeeCpResetPass).

	'CpChangeLogShowPassword'	=> false,					// Show password in CP "password changes" log (also see access.php's SeeCpChangePass).

	'AdminMenuNewStyle'			=> true,					// Use new-style admin menu;  Applies to 'default' theme.
	'EnablePeakDisplay'			=> true,					// Display Peak User count on Server Status page.


// News Options
	'CMSNewsOnHomepage'			=> true,					// Display News on Home Page instead of "You've Just Installed FluxCP" message?
	'CMSNewsType'				=> 1,						// Type = source of news feed:
															//	1 = Built-in news page
															//	2 = RSS Import

	'CMSNewsRSS'				=> 'https://rathena.org/board/rss/1-latest-community-announcements.xml/',		// Use if CMSNewsType = 2
	'CMSNewsLimit'				=> 4,						// Number of news items to display
	'CMSDisplayModifiedBy'		=> false,					// If a news item has been modified, display modified date under news item?

// Service Desk
	'StaffReplyColour'			=> 'brown',
	'FontResolvedColour'		=> 'green',
	'FontPendingColour'			=> 'orange',
	'FontClosedColour'			=> 'darkgrey',
	'SDEnableCreditRewards'		=> true,					// Show option in Service Desk to reward player X credits for reporting bugs/abuse/etc.
	'SDCreditReward'			=> 10,						// Number of credits to award account.

// Discord Webhooks
	'DiscordUseWebhook'			=> false,
	'DiscordWebhookURL'			=> 'enter_webhook_url_from_discord_here',
	'DiscordSendOnRegister'			=> true,
	'DiscordSendOnNewTicket'		=> true,
	'DiscordSendOnWebCommand'		=> true,
	'DiscordSendOnMarketing'		=> true,

	// These are the main menu items that should be displayed by themes.
	// They route to modules and actions.  Whether they are displayed or
	// not at any given time depends on the user's account group level and/or
	// their login status.
	'MenuItems'		=> array(
		'MainMenuLabel'		=> array(
			'HomeLabel'			=> array('module' => 'main'),
			//'ForumLabel'		=> array('exturl' => 'http://www.fluxro.com/community'),	// External forum link
			//'ForumLabel'		=> array('module' => 'forums'), 						// Built-in forum link
			'NewsLabel'			=> array('module' => 'news'),
			// Sample items for pages function.
			'DownloadsLabel'		=> array('module' => 'pages','action'=>'content&path=downloads'),
			'RulesLabel'			=> array('module' => 'pages','action'=>'content&path=rules'),
			// End sample items for pages function.
		),
		'AccountLabel'		=> array(
			'AccountCreateHeading'		=> array('module' => 'account', 'action' => 'create'),
			'LoginTitle'			=> array('module' => 'account', 'action' => 'login'),
			'MyAccountLabel'	=> array('module' => 'account', 'action' => 'view'),
			'HistoryLabel'		=> array('module' => 'history'),
			'ServiceDeskLabel'	=> array('module' => 'servicedesk'),
			'LogoutTitle'		=> array('module' => 'account', 'action' => 'logout'),
		),
		'DonationsLabel'		=> array(
			'PurchaseLabel'		=> array('module' => 'purchase'),
			'DonateLabel'		=> array('module' => 'donate'),
		),
		'InformationLabel'	=> array(
			'ServerInfoLabel'	=> array('module' => 'server', 'action' => 'info'),
			'ServerStatusLabel'	=> array('module' => 'server', 'action' => 'status'),
			'WoeHoursLabel'		=> array('module' => 'woe'),
			'CastlesLabel'		=> array('module' => 'castle'),
			'WhosOnlineLabel'	=> array('module' => 'character', 'action' => 'online'),
			'MapStaticsLabel'=> array('module' => 'character', 'action' => 'mapstats'),
			'RankingInfoLabel'	=> array('module' => 'ranking', 'action' => 'character'),
			'VendingInfoLabel'	=> array('module' => 'vending'),
			'BuyingstoreInfoLabel'	=> array('module' => 'buyingstore'),
		),
		'DatabaseLabel'		=> array(
			'ItemDatabaseLabel'	=> array('module' => 'item'),
			'MobDatabaseLabel'	=> array('module' => 'monster'),
		),
		'SocialLabel'		=> array(
			'JoinUsInFacebookLabel'	=> array('exturl' => 'https://www.facebook.com/<change_me>'),
			'RateUsOnRMSLabel'		=> array('exturl' => '<link_to_RMS>'),
		),
		'Service Desk'	=> array(
			'ServiceDeskLabel'	=> array('module' => 'servicedesk', 'action' => 'staffindex'),
		),
		'Misc. Stuff'	=> array(
			'AccountLabel'		=> array('module' => 'account'),
			'CharacterLabel'	=> array('module' => 'character'),
			'CPLogsLabel'		=> array('module' => 'cplog'),
			'PagesLabel'		=> array('module' => 'pages'),
			'NewsLabel'			=> array('module' => 'news', 'action' => 'manage'),
			'GuildsLabel'		=> array('module' => 'guild'),
			'IPBanListLabel'	=> array('module' => 'ipban'),
			'rALogsLabel'		=> array('module' => 'logdata'),
			'ReInstallLabel'	=> array('module' => 'install', 'action' => 'reinstall'),
			'SendMailLabel'		=> array('module' => 'mail'),
			'WCTitleLabel'		=> array('module' => 'webcommands'),
			'Cash Shop'			=> array('module' => 'cashshop'),
			//'Auction'		=> array('module' => 'auction'),
			//'Economy'		=> array('module' => 'economy')
		)
	),

	// Sub-menu items that are displayed for any action belonging to a
	// particular module. The format it simple.
	'SubMenuItems'	=> array(
		'history'		=> array(
			'gamelogin'		=> 'Game Logins',
			'cplogin'		=> 'CP Logins',
			'emailchange'	=> 'E-Mail Changes',
			'passchange'	=> 'Password Changes',
			'passreset'		=> 'Password Resets'
		),
		'account'		=> array(
			'index'			=> 'List Accounts',
			'view'			=> 'View Account',
			'changepass'	=> 'Change Password',
			'changemail'	=> 'Change E-mail',
			'changesex'		=> 'Change Gender',
			'transfer'		=> 'Transfer Credits',
			'xferlog'		=> 'Credit Transfer History',
			'cart'			=> 'Go to Shopping Cart',
			'login'			=> 'Login',
			'create'		=> 'Register',
			'resetpass'		=> 'Reset Password',
			'resend'		=> 'Resend E-mail Confirmation'
		),
		'guild'			=> array(
			'index'			=> 'List Guilds',
			'export'		=> 'Export Guild Emblems'
		),
		'server'		=> array(
			'status'		=> 'View Status',
			'status-xml'	=> 'View Status as XML'
		),
		'logdata'		=> array(
			'branch'		=> 'Branches',
			'char'			=> 'Characters',
			'cashpoints'	=> 'CashPoints',
			'chat'			=> 'Chat Messages',
			'command'		=> 'Commands',
			'feeding'		=> 'Feeding',
			'inter'			=> 'Interactions',
			'pick'			=> 'Item Picks',
			'login'			=> 'Logins',
			'mvp'			=> 'MVP',
			'npc'			=> 'NPC',
			'zeny'			=> 'Zeny'
		),
		'cplog'			=> array(
			'paypal'		=> 'PayPal Transactions',
			'create'		=> 'Account Registrations',
			'login'			=> 'Logins',
			'resetpass'		=> 'Password Resets',
			'changepass'	=> 'Password Changes',
			'changemail'	=> 'E-mail Changes',
			'ban'			=> 'Account Bans',
			'ipban'			=> 'IP Bans'
		),
		'purchase'		=> array(
			'index'			=> 'Shop',
			'cart'			=> 'Go to Cart',
			'checkout'		=> 'Checkout',
			'clear'			=> 'Empty Cart',
			'pending'		=> 'Pending Redemption'
		),
		'donate'		=> array(
			'index'			=> 'Make a Donation',
			'history'		=> 'Donation History',
			'trusted'		=> 'Trusted PayPal E-mails'
		),
		'ipban'			=> array(
			'index'			=> 'IP Ban List',
			'add'			=> 'Add IP Ban'
		),
		'ranking'		=> array(
			'character'		=> 'Characters',
			'death'			=> 'Deaths',
			'alchemist'		=> 'Alchemists',
			'blacksmith'	=> 'Blacksmiths',
			'homunculus'	=> 'Homunculus',
			'mvp'			=> 'MVPs',
			'guild'			=> 'Guilds',
			'zeny'			=> 'Zeny'
		),
		'item'			=> array(
			'index'			=> 'List Items',
			'add'			=> 'Add Item',
			'iteminfo'		=> 'Add Item Info',
		),
		'pages'			=> array(
			'index'			=> 'Manage Pages',
			'add'			=> 'Add New Page',
		),
		'news'			=> array(
			'index'			=> 'Latest News',
			'manage'			=> 'Manage',
			'add'			=> 'Add News',
		),
		'servicedesk'	=> array(
			'staffindex'	=> 'View Active',
			'staffviewclosed'=> 'View Closed',
			'staffsettings'	=> 'Staff Settings',
			'catcontrol'	=> 'Category Control',
		),
		'vending'			=> array(
			'index'			=> 'Vendors',
		),
		'buyingstore'		=> array(
			'index'			=> 'Buyers',
		),
	),

	'AllowMD5PasswordSearch'		=> false,
	'ReallyAllowMD5PasswordSearch'	=> false, // Are you POSITIVELY sure?

	// Specifies which modules and actions should be ignored by Tidy
	// (enabled/disabled by the OutputCleanHTML option).
	'TidyIgnore'	=> array(
		array('module' => 'captcha'),
		array('module' => 'guild', 'action' => 'emblem')
	),

	// Job classes, loaded from another file to avoid cluttering this one.
	// There isn't normally a need to modify this file, unless it's been
	// modified in an update. (In English: DON'T TOUCH THIS.)
	'JobClasses'					=> include('jobs.php'),

	// Alchemist job classes, mostly used for alchemist rankings.
	// Should be left alone unless new alchemist-related job classes are introduced.
	'AlchemistJobClasses'			=> include('jobs_alchemist.php'),

	// Blacksmith job classes, mostly used for blacksmith rankings.
	// Should be left alone unless new blacksmith-related job classes are introduced.
	'BlacksmithJobClasses'			=> include('jobs_blacksmith.php'),

	// Gender-linked Job class IDs and their corresponding names.
	// Should be left alone unless new gender-specific job classes are introduced.
	'GenderLinkedJobClasses'		=> include('jobs_gender_linked.php'),

	// Homunculus class IDs and their corresponding names.
	// Best not to mess with this either.
	'HomunClasses'					=> include('homunculus.php'),

	// Item Types with their corresponding names.
	// Shouldn't touch this either.
	'ItemTypes'						=> include('itemtypes.php'),

	// Special Item Types with their corresponding names (For Weapons & Ammo by default).
	// Shouldn't touch this either.
	'ItemTypes2'					=> include('itemtypes2.php'),

	// Common Equip Location Combinations with their corresponding names.
	// Shouldn't touch this unless you've added custom combinations.
	'EquipLocationCombinations'		=> include('equip_location_combinations.php'),

	// Error Code -> Error Type mapping.
	// Shouldn't need touching, however modifying loginerrors.php should be relatively safe.
	'LoginErrors'					=> include('loginerrors.php'),

	// rA equip jobs mapping.
	'EquipJobs'						=> include('equip_jobs.php'),

	// rA equip locations mapping.
	'EquipLocations'				=> include('equip_locations.php'),

	// rA equip upper mapping.
	'EquipUpper'					=> include('equip_upper.php'),

	// rA monster sizes mapping.
	'MonsterSizes'					=> include('sizes.php'),

	// rA monster races mapping.
	'MonsterRaces'					=> include('races.php'),

	// rA elements mapping.
	'Elements'						=> include('elements.php'),

	// rA attributes mapping.
	'Attributes'					=> include('attributes.php'),

	// rA monster modes mapping.
	'MonsterModes'					=> include('monstermode.php'),

	// Item shop categories.
	'ShopCategories'				=> include('shopcategories.php'),

	// Cash shop categories.
	'CashShopCategories'			=> include('cashshopcategories.php'),

	// Item pick and zeny log types.
	'PickTypes'						=> include('picktypes.php'),

	// Type of feeding
	'FeedingTypes'					=> include('feedingtypes.php'),

	// Castle names.
	'CastleNames'					=> include('castlenames.php'),

	// DON'T TOUCH. THIS IS FOR DEVELOPERS.
	'FluxTables'		=> array(
		'CreditsTable'			=> 'cp_credits',
		'CreditTransferTable'	=> 'cp_xferlog',
		'ItemShopTable'			=> 'cp_itemshop',
		'TransactionTable'		=> 'cp_txnlog',
		'RedemptionTable'		=> 'cp_redeemlog',
		'AccountCreateTable'	=> 'cp_createlog',
		'AccountBanTable'		=> 'cp_banlog',
		'IpBanTable'			=> 'cp_ipbanlog',
		'DonationTrustTable'	=> 'cp_trusted',
		'AccountPrefsTable'		=> 'cp_loginprefs',
		'CharacterPrefsTable'	=> 'cp_charprefs',
		'ResetPasswordTable'	=> 'cp_resetpass',
		'ChangeEmailTable'		=> 'cp_emailchange',
		'LoginLogTable'			=> 'cp_loginlog',
		'ChangePasswordTable'	=> 'cp_pwchange',
		'OnlinePeakTable'		=> 'cp_onlinepeak',
		'CMSNewsTable'			=> 'cp_cmsnews',
		'CMSPagesTable'			=> 'cp_cmspages',
		'CMSSettingsTable'		=> 'cp_cmssettings',
		'ServiceDeskTable'		=> 'cp_servicedesk',
		'ServiceDeskATable'		=> 'cp_servicedeska',
		'ServiceDeskCatTable'	=> 'cp_servicedeskcat',
		'ServiceDeskSettingsTable'	=> 'cp_servicedesksettings',
		'WebCommandsTable'		=> 'cp_commands',
        'ItemDescTable'     	=> 'cp_itemdesc',
	)
);
?>
