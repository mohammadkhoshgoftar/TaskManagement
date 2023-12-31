<?php

namespace Modules\Category\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Category\Events\CategoryDataChanged;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User;
use OwenIt\Auditing\Contracts\Auditable;

class Category extends Model implements Auditable
{
    use HasApiTokens, HasFactory, SoftDeletes , \OwenIt\Auditing\Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    protected $dispatchesEvents = [
        'created' => CategoryDataChanged::class,
        'updated' => CategoryDataChanged::class,
        'deleted' => CategoryDataChanged::class,
    ];

    public function user(){
        return $this->hasMany(User::class);
    }

}
