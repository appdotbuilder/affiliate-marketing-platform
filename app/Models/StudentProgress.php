<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\StudentProgress
 *
 * @property int $id
 * @property int $user_id
 * @property int $course_id
 * @property int $lesson_id
 * @property bool $completed
 * @property int $watch_time
 * @property float $completion_percentage
 * @property \Illuminate\Support\Carbon|null $started_at
 * @property \Illuminate\Support\Carbon|null $completed_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @property-read \App\Models\Course $course
 * @property-read \App\Models\Lesson $lesson
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProgress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProgress newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProgress query()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProgress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProgress whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProgress whereCompleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProgress completed()

 * 
 * @mixin \Eloquent
 */
class StudentProgress extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'course_id',
        'lesson_id',
        'completed',
        'watch_time',
        'completion_percentage',
        'started_at',
        'completed_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'completed' => 'boolean',
        'watch_time' => 'integer',
        'completion_percentage' => 'decimal:2',
        'started_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    /**
     * Get the user that owns the progress.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the course for the progress.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Get the lesson for the progress.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }

    /**
     * Scope a query to only include completed progress.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCompleted($query)
    {
        return $query->where('completed', true);
    }
}