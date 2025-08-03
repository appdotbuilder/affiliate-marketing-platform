<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Commission
 *
 * @property int $id
 * @property int $product_id
 * @property int $level
 * @property float $percentage
 * @property float|null $fixed_amount
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product $product
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Commission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Commission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Commission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Commission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commission whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commission whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commission whereType($value)

 * 
 * @mixin \Eloquent
 */
class Commission extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'product_id',
        'level',
        'percentage',
        'fixed_amount',
        'type',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'level' => 'integer',
        'percentage' => 'decimal:2',
        'fixed_amount' => 'decimal:2',
    ];

    /**
     * Get the product that owns the commission.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}