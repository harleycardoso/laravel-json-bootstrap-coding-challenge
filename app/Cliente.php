<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $fillable = ['tipo','doc','desc','endereco','tb_preco'];
}
