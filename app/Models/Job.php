<?php 

require_once 'BaseElement.php';


class Job extends BaseElement{

	public function __construct($title, $description)
	{
		$newTitle =  'Job: '. $title;
		parent::__construct($newTitle, $description);
	}

	public function getDurationAsString($months)
	{
		$years = floor($this->months / 12);
		$years = ($years > 0) ? $years . ' years' : '';

		$extraMoths = $this->months % 12;
		$extraMoths = ($extraMoths > 0) ? $extraMoths . ' months' : '';

		return "Job duration $years $extraMoths";
	}
}