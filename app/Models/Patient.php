<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    // $table->string('name');
    // $table->date('birth_date');
    // $table->enum('sex', ['male', 'female']);
    // $table->string('phone_number')->nullable();
    // $table->string('email')->nullable();
    // $table->string('ethnicity')->nullable();
    // $table->string('address');

    protected $fillable = [
        'name',
        'birth_date',
        'sex',
        'phone_number',
        'email',
        'ethnicity',
        'address'
    ];

    public function immunizations() {
        return $this->hasMany(Immunization::class);
    }
}
