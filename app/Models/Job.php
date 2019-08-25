<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Job extends Model{

	protected $primaryKey = 'jobs';
	
	public function getDurationAsString($months)
	{
		$years = floor($this->months / 12);
		$years = ($years > 0) ? $years . ' years' : '';
		
		$extraMoths = $this->months % 12;
		$extraMoths = ($extraMoths > 0) ? $extraMoths . ' months' : '';
		
		return "Job duration $years $extraMoths";
	}
}