<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Affiliate
 *
 * @property int $id
 * @property int $user_id
 * @property string $affiliate_code
 * @property string $affiliate_link
 * @property float $total_earnings
 * @property float $pending_earnings
 * @property float $paid_earnings
 * @property int $total_referrals
 * @property int $total_sales
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\AffiliateEarning> $earnings
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliate query()
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliate whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliate whereAffiliateCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliate whereStatus($value)
 * @method static \Database\Factories\AffiliateFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class Affiliate extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'affiliate_code',
        'affiliate_link',
        'total_earnings',
        'pending_earnings',
        'paid_earnings',
        'total_referrals',
        'total_sales',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'total_earnings' => 'decimal:2',
        'pending_earnings' => 'decimal:2',
        'paid_earnings' => 'decimal:2',
        'total_referrals' => 'integer',
        'total_sales' => 'integer',
    ];

    /**
     * Get the user that owns the affiliate.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the earnings for the affiliate.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function earnings(): HasMany
    {
        return $this->hasMany(AffiliateEarning::class);
    }

    /**
     * Get the orders for the affiliate.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}