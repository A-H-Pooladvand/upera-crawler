<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Genre
 *
 * @property int $id
 * @property string $title
 * @property int $position
 * @method static \Illuminate\Database\Eloquent\Builder|Genre newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Genre newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Genre query()
 * @method static \Illuminate\Database\Eloquent\Builder|Genre whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Genre wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Genre whereTitle($value)
 */
	class Genre extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Media
 *
 * @property int $id
 * @property string|null $titre
 * @property string $url
 * @property string $type
 * @property string $extension
 * @property string $date
 * @property int $enabled
 * @method static \Illuminate\Database\Eloquent\Builder|Media newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media query()
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereExtension($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereTitre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereUrl($value)
 */
	class Media extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Poster
 *
 * @property int $id
 * @property int|null $cover_id
 * @property int|null $posted_id
 * @property int|null $trailer_id
 * @property string $title
 * @property string|null $duration
 * @property string|null $playas
 * @property string|null $downloadas
 * @property string $type
 * @property string|null $tags
 * @property float $rating
 * @property float|null $imdb
 * @property string|null $classification
 * @property int|null $year
 * @property string|null $description
 * @property int $downloads
 * @property int $shares
 * @property int $views
 * @property string $created
 * @property int $enabled
 * @property int $comment
 * @property string $slug
 * @property string|null $label
 * @property string|null $sublabel
 * @method static \Illuminate\Database\Eloquent\Builder|Poster newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Poster newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Poster query()
 * @method static \Illuminate\Database\Eloquent\Builder|Poster whereClassification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poster whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poster whereCoverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poster whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poster whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poster whereDownloadas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poster whereDownloads($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poster whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poster whereEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poster whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poster whereImdb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poster whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poster wherePlayas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poster wherePostedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poster whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poster whereShares($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poster whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poster whereSublabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poster whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poster whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poster whereTrailerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poster whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poster whereViews($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poster whereYear($value)
 */
	class Poster extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Source
 *
 * @property int $id
 * @property int|null $cover_id
 * @property int|null $posted_id
 * @property int|null $trailer_id
 * @property string $title
 * @property string|null $duration
 * @property string|null $playas
 * @property string|null $downloadas
 * @property string $type
 * @property string|null $tags
 * @property float $rating
 * @property float|null $imdb
 * @property string|null $classification
 * @property int|null $year
 * @property string|null $description
 * @property int $downloads
 * @property int $shares
 * @property int $views
 * @property string $created
 * @property int $enabled
 * @property int $comment
 * @property string $slug
 * @property string|null $label
 * @property string|null $sublabel
 * @method static \Illuminate\Database\Eloquent\Builder|Source newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Source newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Source query()
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereClassification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereCoverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereDownloadas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereDownloads($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereImdb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source wherePlayas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source wherePostedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereShares($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereSublabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereTrailerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereViews($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereYear($value)
 */
	class Source extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 */
	class User extends \Eloquent {}
}

