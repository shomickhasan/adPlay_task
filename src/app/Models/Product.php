<?php

namespace App\Models;

use App\Models\Backend\Category;
use Carbon\Carbon;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name','price','description',
        'image','slug',
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
    public function productQuantitys()
    {
        return $this->hasMany(ProductQuantity::class);
    }

    public function productColors()
    {
        return $this->hasMany(ProductColor::class);
    }

    public function productGalleries()
    {
        return $this->hasMany(ProductGallery::class);
    }
    public function scopeFilters(Builder $query, array $filters)
    {
        return $query->when(Arr::get($filters, 'created_at'), function ($q, $createdAt) {
            $q->whereDate('created_at', $createdAt);
        })->when(Arr::get($filters, 'product_name'), function ($q, $productName) {
                $q->where('product_name', 'like', "%{$productName}%");
            })
            ->when(Arr::get($filters, 'status'), function ($q, $status) {
                $q->where('status', $status);
            })
            ->when(Arr::get($filters, 'ordering'), function ($q, $ordering) {
                $q->orderBy('ordering', $ordering);
            })
            ->when(Arr::get($filters, 'category_id'), function ($q, $categoryId) {
                $q->where('id', $categoryId);
            });
    }
}
