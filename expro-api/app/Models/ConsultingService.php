<?php

  namespace App\Models;

  use Illuminate\Database\Eloquent\Model;
  use Illuminate\Database\Eloquent\Factories\HasFactory;

  class ConsultingService extends Model
  {
      use HasFactory;

      protected $table = 'consulting_services';

      protected $fillable = [
          'parent_id',
          'title',
          'slug',
          'category',
          'image',
          'short_description',
          'long_description',
      ];

      public function parent()
      {
          return $this->belongsTo(self::class, 'parent_id');
      }

      public function children()
      {
          return $this->hasMany(self::class, 'parent_id');
      }
  }