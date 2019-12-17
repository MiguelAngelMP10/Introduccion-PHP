<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Traits\HasDefaultImage;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{

	use HasDefaultImage;
	use SoftDeletes;

	protected $primaryKey = 'id';
	protected $table = 'jobs';

	public function getDurationAsString($months)
	{
		$years = floor($this->months / 12);
		$years = ($years > 0) ? $years . ' years' : '';

		$extraMoths = $this->months % 12;
		$extraMoths = ($extraMoths > 0) ? $extraMoths . ' months' : '';

		return "Job duration $years $extraMoths";
	}
}