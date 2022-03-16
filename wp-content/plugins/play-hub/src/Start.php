<?php

namespace Src;

use Src\Services\General;
use Src\Services\PostType;
use Src\Services\Taxonomy;
use Src\Services\MetaBox;

final class Start
{
   public static function registerServices(): void
   {
      foreach (self::getServices() as $class) {
         $service = self::instantiate($class);

         if (method_exists($service, 'registerService')) {
            $service->registerService();
         }
      }
   }

   public static function getServices(): array
   {
      return [
         General::class,
         PostType::class,
         Taxonomy::class,
         MetaBox::class,
      ];
   }

   private static function instantiate($class): object
   {
      return new $class();
   }
}
