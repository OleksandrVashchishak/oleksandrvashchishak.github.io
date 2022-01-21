<?php

class WC_Etransactions_Config_my {

	private $_values = array(
		'3ds_enabled' => 'never',
		'3ds_amount' => '',
		'amount' => 0,
		'debug' => 'yes',
		'delay' => 0,
		'environment' => 'PRODUCTION',
		'hmackey' => 'cssfs8iaeGcS4+cbKpxZ5MQd0qVfMPIR7go1zfHReteOZE2r0+sEIXd+hhADwK9nfRu8Y4tGCnCSc1MfCa+ksx3ImvmBz4FwRVUic1rZ2eUGZhwxnDoVE6DdpaTPbBM0bOIn5Y2PYQyMnMudFPf1/fAXWtWd2N8gPaOMHcTZEqMUXwzGI0xOq4gYC8IRsVWxn5t86HkrxwFePTeDHo/UZjHJL9QB6oK0itWXfvIU+J8=',
		'identifier' => 170406868,
		'ips' => '194.2.122.158,195.25.7.166,195.101.99.76',
		'rank' => '01',
		'site' => 2469044
	);




	protected function _getOption($name) {
		if (isset($this->_values[$name])) {
			return $this->_values[$name];
		}
		if (isset($this->_defaults[$name])) {
			return $this->_defaults[$name];
		}
		return null;
	}

	public function get3DSEnabled() {
		return $this->_getOption('3ds_enabled');
	}

	public function get3DSAmount() {
		$value = $this->_getOption('3ds_amount');
		return empty($value) ? null : floatval($value);
	}

	public function getAmount() {
		$value = $this->_getOption('amount');
		return empty($value) ? null : floatval($value);
	}

	public function getAllowedIps() {
		return explode(',', $this->_getOption('ips'));
	}

	public function getDefaults() {
		return $this->_defaults;
	}

	public function getDelay() {
		return (int)$this->_getOption('delay');
	}

	public function getDescription() {
		return $this->_getOption('description');
	}

	public function getHmacAlgo() {
		return 'SHA512';
	}

	public function getHmacKey() {
		$crypto = new ETransactionsEncrypt_new();
		return $crypto->decrypt($this->_values['hmackey']);
	//	return '9289FABFA5068DA7EEFDD9F04E7B02F3CB8630818A2CB140F9009CBBDA9C4DFB6634437AA872D9CA4214B8AE516DC8C267388A11301A26F49454FA133C3A294E';
	}

	public function getIdentifier() {
		return $this->_getOption('identifier');
	}

	public function getRank() {
		return $this->_getOption('rank');
	}

	public function getSite() {
		return $this->_getOption('site');
	}

	public function getSystemProductionUrls() {
		return array(
			'https://tpeweb.e-transactions.fr/cgi/MYchoix_pagepaiement.cgi',
			'https://tpeweb1.e-transactions.fr/cgi/MYchoix_pagepaiement.cgi',
		);
	}

	public function getSystemTestUrls() {
		return array(
			'https://preprod-tpeweb.e-transactions.fr/cgi/MYchoix_pagepaiement.cgi'
		);
	}

	public function getSystemUrls() {
		if ($this->isProduction()) {
			return $this->getSystemProductionUrls();
		}
		return $this->getSystemTestUrls();
	}

	public function getTitle() {
		return $this->_getOption('title');
	}

	public function isDebug() {
		return $this->_getOption('debug') === 'yes';
	}

	public function isProduction() {
		return $this->_getOption('environment') === 'PRODUCTION';
	}
}
