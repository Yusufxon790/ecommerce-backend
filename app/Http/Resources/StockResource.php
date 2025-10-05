<?php

namespace App\Http\Resources;

use App\Models\Attribute;
use App\Models\Value;
use Illuminate\Http\Request;


use Illuminate\Http\Resources\Json\JsonResource;

class StockResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $result= [
            'stock_id'=>$this->id,
            'quantity'=>$this->quantity,
            'added_price'=>$this->added_price
        ];
        
        return $this->getAttributes($result);
    }
    
    public function getAttributes($result){
        $attributes=json_decode($this->attributes);
        foreach($attributes as $stock_attribute){
            $attribute=Attribute::find($stock_attribute->attribute_id);
            $value=Value::find($stock_attribute->value_id);

            $result[$attribute->name]=$value->getTranslations('name');
        }
        return $result;
    }
}


