<?php

namespace App\Models;

use App\Traits\Relationships\CommentRelationshipTrait;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Question extends Model
{
    use CommentRelationshipTrait;

    protected $fillable = [
        'title', 'slug', 'content', 'public_id', 'user_id', 'views',
        'solved',
    ];

    public static function boot() {
    	// Automatikusan hozzáad egy értéket az attribútumhoz a create() függvény meghívásánál.
    	static::creating(function ($model) {
    		$model->generatePublicId();
    	});
    	parent::boot();
    }

    /**
     * Kapcsolat létrehozása a felhasználóval, mivel minden kérdéshez tartozik egy olyan 
     * felhasználó, aki létrehozta magát a kérdést.
     * @return [type] [description]
     */
    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function getPrimaryKey() {
        return $this->primaryKey;
    }

    /**
     * Vissza adja számunkra a kérdés teljes url-jét, hogy ne kelljen sokan gépelni.
     * @return [type] [description]
     */
    public function getFullSlugAttribute() {
    	return $this->attributes['public_id'] . '/' . $this->attributes['slug'];
    }

    /**
     * Automatikusan generálja a publikus azonosítót, ami megjelenik majd az url-ben.
     * @return integer [description]
     */
    public function generatePublicId() {
    	return $this->attributes['public_id'] = mt_rand(1000000000, 9999999999);
    }

    /**
     * Beállítja helyesen a slug értékét, azaz kiveszi az ékezeteket, szóközöket és minden 
     * mást, ami zavart okoz az erőben.
     * Ebből adódva nem kell használni létrehozásnál a str_slug() függvényt. 
     * @param string $value [description]
     */
    public function setSlugAttribute($value) {
    	$this->attributes['slug'] = str_slug($value);
    }

    /**
     * Növeli a megtekintés számát.
     * @return [type] [description]
     */
    public function incrementViews() {
        return $this->update(['views' => $this->attributes['views'] + 1]);
    }

    public function solvedComment() {
        return $this->hasOne(Comment::class, 'id','solved');
    }

}
