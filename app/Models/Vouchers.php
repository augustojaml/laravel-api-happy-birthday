<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vouchers extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'whatsapp', 'token', 'date_of_birth', 'how_did_you_find_us', 'voucher'];

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = $this->convertStringToDate($value);
    }

    public function getDateOfBirthAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }

    private function convertStringToDate(string $value)
    {
        if (empty($value)) {
            return null;
        }

        list($day, $month, $year) = explode('/', $value);
        return (new \DateTime($year . '-' . $month . '-' . $day))->format('Y-m-d');
    }
}
