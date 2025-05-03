<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use App\Enums\Status;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use  HasFactory, Notifiable;

    protected $fillable = [
        'full_name',
        'user_name',
        'slug',
        'status',
        'email',
        'phone',
        'department_id',
        'parent_user_id',
        'user_access',
        'password',
        'photo',
        'created_by',
        'updated_by',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'status' => Status::class
    ];

    public function scopeOrderByDescId($query)
    {
        return $query->orderByDesc('id');
    }
    public function scopeOrderByAscId($query)
    {
        return $query->orderBy('id', 'asc');
    }
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }
    public function CreatedAtFormatted(): Attribute
    {
        return Attribute::make(
            get: fn () => Carbon::parse($this->created_at)->format('M d, Y, g:i A')
        );
    }
    public function UpdatedAtFormatted(): Attribute
    {
        return Attribute::make(
            get: fn () => Carbon::parse($this->updated_at)->format('M d, Y, g:i A')
        );
    }
    

    public function creator() {
        return $this->belongsTo(User::class,'created_by');
    }

    public function updator() {
        return $this->belongsTo(User::class,'updated_by');
    }


    public function scopeFilter(Builder $query, array $filters, $sortBy = 'id', $sortOrder = 'desc'): Builder
    {
        return $query->where(function ($query) use ($filters) {
            if (isset($filters['name'])) {
                $query->where(function ($query) use ($filters) {
                    $query->where('full_name', 'like', '%' . $filters['name'] . '%')
                        ->orWhere('user_name', 'like', '%' . $filters['name'] . '%');
                });
            }
            if (isset($filters['phone'])) {
                $query->where('phone', 'like', '%' . $filters['phone'] . '%');
            }
          
            if (isset($filters['status'])) {
                $query->where('status', '=', $filters['status']);
            }

            if (isset($filters['created_at'])) {
                $query->whereDate('created_at', '=', $filters['created_at']);
            }
        })
        ->orderBy($sortBy, $sortOrder);
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($user) {
        
        });
    }
}
