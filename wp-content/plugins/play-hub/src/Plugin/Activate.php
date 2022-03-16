<?php

namespace Src\Plugin;

class Activate
{
   public static function activate()
   {
      flush_rewrite_rules();
   }
}
