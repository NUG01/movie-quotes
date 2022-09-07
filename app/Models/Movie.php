<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Movie extends Model
{
	use HasFactory, HasTranslations;

	public $translatable=['name'];

	protected $guarded = ['id'];

	public function quote(): HasMany
	{
	return	$this->hasMany(Quote::class);
	}
}
