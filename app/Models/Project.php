<?php 

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $primaryKey = 'project';

    public function getDurationAsString($months)
	{
		$years = floor($this->months / 12);
		$years = ($years > 0) ? $years . ' years' : '';
		
		$extraMoths = $this->months % 12;
		$extraMoths = ($extraMoths > 0) ? $extraMoths . ' months' : '';
		
		return "Project duration $years $extraMoths";
	}
}