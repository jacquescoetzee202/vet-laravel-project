<?php

namespace App\Models;

use App\Models\Owner;
use App\Models\Treatment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = ['name','type','date_of_birth','weight','height','biteyness','owner_id'];

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function treatments()
    {
        return $this->belongsToMany(Treatment::class);
    }

    public function dangerous()
    {
        return $this->biteyness > 2;
    }

    public function setTreatments(array $strings) : Animal
    {
        $treatments = Treatment::fromStrings($strings);

        // get all the treatments form animal model -> sync(feed in treatement id's) to let laravel neatly sort treatment additions and deletions from database
        $this->treatments()->sync($treatments->pluck("id"));

        //to help chaining
        return $this;
    }
}



