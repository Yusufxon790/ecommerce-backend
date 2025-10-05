<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
use Carbon\Carbon;

class Product extends Model
{
    use HasFactory,HasTranslations,SoftDeletes;

    protected $fillable=['category_id','name','price','description'];

    public array $translatable=['name','description'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function stocks(){
        return $this->hasMany(Stock::class);
    }

    public function withStock($stockId){
        $this->stocks=[$this->stocks()->findOrFail($stockId)];
        return $this;
    }

    public function users(){
        return $this->belongsToMany(User::class,'product_user');
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function photos(){
        return $this->morphMany(Photo::class,'photoable');
    }

    public function discount(){
        return $this->hasOne(Discount::class);
    }

    public function getDiscount(){
        if($this->discount){
            if($this->discount->from == null && $this->discount->to == null){
                return $this->discount;
            }
           
            if (Carbon::now()->between(Carbon::parse($this->discount->from),Carbon::parse($this->discount->to))) {
                return $this->discount;
            }
        }
    }
}
