<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description', 
        'video_demo',
        'thumbnail',
        'category_id',
        'status',
        'link_access', //Liên kết truy cập trang web
        'link_faq', //link_cau_hoi
        'link_call', //link_dat_cuoc
        'link_download', //link_tai_xuong
        'link_pricing', // link_gia_ca
        'link_review' //link_danh_gia

    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
} 