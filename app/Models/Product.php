<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string|null $short_description
 * @property float $price
 * @property float|null $original_price
 * @property string|null $image
 * @property string $type
 * @property string $status
 * @property array|null $features
 * @property bool $has_certificate
 * @property int|null $duration_hours
 * @property int $total_lessons
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Commission> $commissions
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read \App\Models\Course|null $course

 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product active()
 * @method static \Database\Factories\ProductFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'description',
        'short_description',
        'price',
        'original_price',
        'image',
        'type',
        'status',
        'features',
        'has_certificate',
        'duration_hours',
        'total_lessons',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'price' => 'decimal:2',
        'original_price' => 'decimal:2',
        'features' => 'array',
        'has_certificate' => 'boolean',
        'duration_hours' => 'integer',
        'total_lessons' => 'integer',
    ];

    /**
     * Get the commissions for the product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commissions(): HasMany
    {
        return $this->hasMany(Commission::class);
    }

    /**
     * Get the orders for the product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get the course associated with the product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function course(): HasOne
    {
        return $this->hasOne(Course::class);
    }



    /**
     * Scope a query to only include active products.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}