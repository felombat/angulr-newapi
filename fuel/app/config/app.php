<?php

return array(

	"name"  => 'Ausländerisch',
	"title" => 'Freude der GIZ',
	"author"  => 'F. Elombat',
	"organisation" => 'Astrio',
	"url" => 'http://outlandish.astrio.online',
	"email" => 'support@astrio.online',
	"tel" => '+237 6 xxx xxx xx',
	"admin_email" => 'f.elombat@gmail.com',
	"version" => 1.0,
	"description" => '',
	"support" => '',
	"crdate" => '2018-02-7',
	"mailinglist" => '',
	"community" => '',
	"linkedin_url" => '',
	"currency_label" => "Fr ",
    "currency_code" => "XAF",

	'apis' => array(
			'linkein' => array(
				'secret' => '',
				'auth_token' => '',

				)

			),
    "payment_methods" => array(
            '-' => 'Please Select one option',
            /*'europe' => array(
                'uk' => 'United Kingdom',
                'nl' => 'Netherlands'
            ),*/
            'cash' => 'Cash',
        'cb' => 'Credit Card',
        'cheque' => 'Cheque',
        'ecsah' => 'Electronique Cash (OM, MoMo, Nexttel Credit)',
        'bankwire' => 'Bank Transfert',
        'other' => 'Other',
        ),

	);