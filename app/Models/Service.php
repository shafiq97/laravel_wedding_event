<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use App\Models\Traits\HasLocation;
use App\Models\Traits\HasSlugForRouting;
use App\Models\Traits\HasWebsite;
use App\Options\Visibility;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\QueryBuilder\AllowedFilter;

/**
 * @property-read int $id
 * @property string $name
 * @property string $slug
 * @property string $image
 * @property ?string $description
 * @property Visibility $visibility
 * @property ?Carbon $started_at
 * @property ?Carbon $finished_at
 *
 * @property-read Collection|BookingOption[] $bookingOptions {@see Service::bookingOptions()}
 * @property-read ?ServiceSeries $eventSeries {@see Service::eventSeries()}
 * @property-read Collection|Organization[] $organizations {@see Service::organizations()}
 * @property-read ?Service $parentEvent {@see Service::parentEvent()}
 * @property-read Collection|Service[] $subEvents {@see Service::subEvents()}
 */
class Service extends Model
{
    use Filterable;
    use HasFactory;
    use HasLocation;
    use HasSlugForRouting;
    use HasWebsite;

    protected $table = 'services';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'visibility',
        'started_at',
        'finished_at',
        'website_url',
        'image'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'visibility' => Visibility::class,
        'started_at' => 'datetime',
        'finished_at' => 'datetime',
    ];

    protected $perPage = 12;

    public function bookingOptions(): HasMany
    {
        return $this->hasMany(BookingOption::class, 'event_id');
    }

    public function eventSeries(): BelongsTo
    {
        return $this->belongsTo(ServiceSeries::class, 'event_series_id');
    }

    public function organizations(): BelongsToMany
    {
        return $this->belongsToMany(Organization::class)
            ->orderBy('name')
            ->withTimestamps();
    }

    public function parentEvent(): BelongsTo
    {
        return $this->belongsTo(__CLASS__, 'parent_event_id');
    }

    public function subEvents(): HasMany
    {
        return $this->hasMany(__CLASS__, 'parent_event_id')
            ->orderBy('started_at')
            ->orderBy('finished_at');
    }

    public function fillAndSave(array $validatedData): bool
    {
        $this->fill($validatedData);
        $this->location()->associate($validatedData['location_id'] ?? null);
        $this->eventSeries()->associate($validatedData['event_series_id'] ?? null);
        $this->parentEvent()->associate($validatedData['parent_event_id'] ?? null);

        if (isset($validatedData['image'])) {
            $image = $validatedData['image'];
            $filename = $image->storePublicly('landscape', 'public');
            $this->image = $filename;
        }


        return $this->save()
            && $this->organizations()->sync($validatedData['organization_id'] ?? []);
    }

    public static function allowedFilters(): array
    {
        return [
            AllowedFilter::partial('name'),
            AllowedFilter::exact('location_id'),
            AllowedFilter::exact('organization_id', 'organizations.id'),
        ];
    }
}
