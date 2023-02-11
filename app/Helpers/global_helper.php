<?php

use App\Models\MetaData;

function get_meta_value($meta_key)
{
    $data = MetaData::where('meta_key', $meta_key)->first();

    if($data){
        return $data->meta_value;
    }
};

function set_list_award($isi)
{
    $isi = str_replace("<ul>", '<ul class="fa-ul mb-0">', $isi);
    $isi = str_replace("<li>", '<li><span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>', $isi);
    return $isi;
}

?>