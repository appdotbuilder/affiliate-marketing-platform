<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Certificate
 *
 * @property int $id
 * @property string $certificate_number
 * @property int $user_id
 * @property int $course_id
 * @property string $student_name
 * @property string $course_name
 * @property \Illuminate\Support\Carbon $issued_at
 * @property \Illuminate\Support\Carbon $completed_at
 * @property string|null $certificate_url
 * @property array|null $metadata
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @property-read \App\Models\Course $course
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate query()
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate whereCertificateNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate whereUserId($value)

 * 
 * @mixin \Eloquent
 */
class Certificate extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'certificate_number',
        'user_id',
        'course_id',
        'student_name',
        'course_name',
        'issued_at',
        'completed_at',
        'certificate_url',
        'metadata',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'issued_at' => 'datetime',
        'completed_at' => 'datetime',
        'metadata' => 'array',
    ];

    /**
     * Get the user that owns the certificate.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the course for the certificate.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}