<?php

namespace Src\Plugin;

class Deactivate
{
   public static function deactivate()
   {
      flush_rewrite_rules();
   }
}
