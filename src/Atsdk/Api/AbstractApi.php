<?php

namespace ATSDK\Api;

use ATSDK\Infusionsoft;

abstract class AbstractApi {

	public function __construct(
		public Infusionsoft $client
	){ }

}
