<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Owner extends Model
{
    use HasFactory;

    protected $fillable = ['first_name','last_name','telephone','email','address_1','postcode'];

    public function fullName()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function fullAddress()
    {
        return "{$this->address_1}\n{$this->address_2}\n{$this->town}\n{$this->postcode}";
    }

    public function formattedPhoneNumber()
    {
        $prefix = Str::substr($this->telephone,0,4);
        $area = Str::substr($this->telephone,4,3);
        $unique = Str::substr($this->telephone,7);

        return "{$prefix} {$area} {$unique}";
    }

    public static function haveWeBananas($number)
    {
        if ($number === 0) {
            return "No we have no bananas";
        }

        if ($number === 1) {
            return "Yes we have 1 banana";
        }

        return "Yes we have {$number} bananas";
    }

    public static function emailExists($email)
    {
        $dbEmails = Owner::where('email','=',$email)->get();
        
        if ($dbEmails->count() === 0){
            return true;
        } else {
            return false;
        }
    }
}
