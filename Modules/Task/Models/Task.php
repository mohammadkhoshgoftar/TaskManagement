<?php

namespace Modules\Task\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Models\Category;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User;

class Task extends Model implements Auditable
{
    use HasApiTokens, HasFactory, SoftDeletes , \OwenIt\Auditing\Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function setDeadlineAttribute($deadline): void
    {
        $this->attributes['deadline'] = jalaliToGregorian($deadline);
    }
}
