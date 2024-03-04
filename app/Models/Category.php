<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // melupakan konsep plural dan singular
    // protected $table = 'kategori';

    // untuk menghilangkan created_at dan update_at
    // public $timestamps = false;

    // primary key nya bukan id tapi yang lain
    // protected $primarykey = 'id_kategori';

    public function buku()
    {
        return $this->hasMany(Buku::class, 'kategori_id', 'id');
    }
}
