<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Course
 *
 * @property int $id
 * @property int $product_id
 * @property string $title
 * @property string $description
 * @property string|null $thumbnail
 * @property string|null $learning_objectives
 * @property string|null $requirements
 * @property int|null $estimated_duration
 * @property bool $certificate_enabled
 * @property string|null $certificate_template
 * @property int $sort_order
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product $product
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Lesson> $lessons
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\StudentProgress> $progress
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Certificate> $certificates
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Course newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Course newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Course query()
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course active()
 * @method static \Database\Factories\CourseFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class Course extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'product_id',
        'title',
        'description',
        'thumbnail',
        'learning_objectives',
        'requirements',
        'estimated_duration',
        'certificate_enabled',
        'certificate_template',
        'sort_order',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'estimated_duration' => 'integer',
        'certificate_enabled' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Get the product that owns the course.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the lessons for the course.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class)->orderBy('sort_order');
    }

    /**
     * Get the progress records for the course.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function progress(): HasMany
    {
        return $this->hasMany(StudentProgress::class);
    }

    /**
     * Get the certificates for the course.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function certificates(): HasMany
    {
        return $this->hasMany(Certificate::class);
    }

    /**
     * Scope a query to only include active courses.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}