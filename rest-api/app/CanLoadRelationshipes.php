<?php

namespace App;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

trait CanLoadRelationshipes
{
    

    public function loadRelationShips(
        Model|Builder | HasMany $for,
        ?array $relations = null
    ): Model| Builder| HasMany
    {
        $relations = $relations ?? $this->relations ?? [];

        foreach($relations as $relation){
            $for->when($this->shouldIncludeRelation($relation),
                fn($q) =>$for instanceof Model ? $for->load($relation) :  $q->with($relation) 
            );
        }

        return $for;
    }


    protected function shouldIncludeRelation($relation)
    {
        $include =  request()->query('include');

        if(!$include){
            return false;
        }

        $relations =array_map('trim', explode(',', $include));
        
        return in_array($relation, $relations);
    }
}
