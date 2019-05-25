<?php
class Config {
	public function parse()
	{
		$data = yaml_parse_file('core/config/config.yaml');
		return $data;
	}
}