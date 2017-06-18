<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Article
 *
 * @property int                                                                         $id
 * @property int                                                                         $user_id
 * @property string                                                                      $locale
 * @property string                                                                      $title
 * @property string                                                                      $summary
 * @property string                                                                      $body
 * @property string                                                                      $slug
 * @property string                                                                      $image
 * @property bool                                                                        $published
 * @property bool                                                                        $promoted
 * @property bool                                                                        $pinned
 * @property string                                                                      $published_at
 * @property \Carbon\Carbon                                                              $created_at
 * @property \Carbon\Carbon                                                              $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PostTranslation[] $translations
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Post listsTranslations($translationField)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Post notTranslatedIn($locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Post orWhereTranslation($key, $value, $locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Post orWhereTranslationLike($key, $value, $locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Post translated()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Post translatedIn($locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Post whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Post whereImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Post wherePinned($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Post wherePromoted($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Post wherePublishedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Post wherePublished($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Post whereTranslation($key, $value, $locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Post whereTranslationLike($key, $value, $locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Post whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Post withTranslation()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
 */
class Post extends Model
{
    use Translatable;

    public $translatedAttributes = ['title', 'summary', 'body', 'slug'];

    protected $dates = [
        'published_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable
        = [
            'image',
            'published',
        ];

    protected $with = ['translations'];

    /**
     * Get all of the tags for the post.
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
