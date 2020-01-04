<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AppsCountry
 * 
 * @property int $id
 * @property string $country_code
 * @property string $country_name
 *
 * @package App\Models
 */
class AppCountry extends Model
{
	public $timestamps = false;
	protected $table = "apps_countries";
    protected $primaryKey = 'id';

	protected $fillable = [
		'country_code',
		'country_name'
	];
}
