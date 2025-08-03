<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Lesson
 *
 * @property int $id
 * @property int $course_id
 * @property string $title
 * @property string|null $description
 * @property string $content_type
 * @property string|null $content
 * @property string|null $video_url
 * @property string|null $video_provider
 * @property string|null $materials
 * @property int|null $duration
 * @property int $sort_order
 * @property bool $is_preview
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Course $course
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\StudentProgress> $progress
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson query()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson active()

 * 
 * @mixin \Eloquent
 */
class Lesson extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'course_id',
        'title',
        'description',
        'content_type',
        'content',
        'video_url',
        'video_provider',
        'materials',
        'duration',
        'sort_order',
        'is_preview',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'duration' => 'integer',
        'sort_order' => 'integer',
        'is_preview' => 'boolean',
    ];

    /**
     * Get the course that owns the lesson.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Get the progress records for the lesson.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function progress(): HasMany
    {
        return $this->hasMany(StudentProgress::class);
    }

    /**
     * Scope a query to only include active lessons.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}