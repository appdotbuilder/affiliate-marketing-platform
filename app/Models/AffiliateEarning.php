<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\AffiliateEarning
 *
 * @property int $id
 * @property int $affiliate_id
 * @property int $product_id
 * @property int $buyer_id
 * @property string $order_reference
 * @property float $order_amount
 * @property float $commission_amount
 * @property float $commission_percentage
 * @property int $commission_level
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $paid_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Affiliate $affiliate
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\User $buyer
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliateEarning newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliateEarning newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliateEarning query()
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliateEarning whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliateEarning whereAffiliateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliateEarning whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliateEarning pending()

 * 
 * @mixin \Eloquent
 */
class AffiliateEarning extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'affiliate_id',
        'product_id',
        'buyer_id',
        'order_reference',
        'order_amount',
        'commission_amount',
        'commission_percentage',
        'commission_level',
        'status',
        'paid_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'order_amount' => 'decimal:2',
        'commission_amount' => 'decimal:2',
        'commission_percentage' => 'decimal:2',
        'commission_level' => 'integer',
        'paid_at' => 'datetime',
    ];

    /**
     * Get the affiliate that owns the earning.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function affiliate(): BelongsTo
    {
        return $this->belongsTo(Affiliate::class);
    }

    /**
     * Get the product that the earning is for.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the buyer that generated the earning.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function buyer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    /**
     * Scope a query to only include pending earnings.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }
}