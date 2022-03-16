<?php

namespace Src\Services;

class General
{
   public function registerService()
   {
      add_filter('get_the_archive_title', [$this, 'removeCategoryOftitle']);
   }

   public function removeCategoryOftitle($title)
   {
      if (is_archive()) {
         $title = single_cat_title('', false);
      }
      return $title;
   }
}
