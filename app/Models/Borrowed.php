<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Borrowed extends Model
{
    protected $fillable = ['name_std', 'user_id', 'studant_id', 'libro_id', 'token_borrowed','token_returned'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function studant()
    {
        return $this->belongsTo(Studant::class, 'studant_id');
    }

    public function libro()
    {
        return $this->belongsTo(Libro::class, 'libro_id');
    }

    public function setDateBorrowedAttribute($value)
    {
        $this->attributes['token_borrowed'] = $this->convertStringToDate($value);
    }

    public function getDateOfBorrowedAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }

    public function setDateReturnedAttribute($value)
    {
        $this->attributes['token_returned'] = $this->convertStringToDate($value);
    }

    public function getDateOfReturnedAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }

    private function convertStringToDate(?string $param)
    {
        if(empty($param)){
            return null;
        }

        list($day, $month, $year) = explode('/', $param);
        return (new \DateTime($year . '-' . $month . '-' . $day))->format('Y-m-d');
    }
}
