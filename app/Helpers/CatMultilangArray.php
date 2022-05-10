<?php

namespace App\Helpers;

use LaravelLocalization;



class CatMultilangArray
{


    public static function parseArray($categories)
    {
        foreach ($categories as $cat) {
            foreach (json_decode($cat->category_name) as $key => $value) {
                if  (LaravelLocalization::getCurrentLocale() ==$key) {
                dump($key);
                dump($value);
                }
            }
            if (count($cat->children)) {
               CatMultilangArray::Children($cat->children);
            }


        }
      dd(LaravelLocalization::getSupportedLocales());
    }

    static function Children($childs) {
       foreach ($childs as $child) {
           dump(json_decode($child->category_name));

           foreach (json_decode($child->category_name) as $key=>$value) {
               
                if (LaravelLocalization::getCurrentLocale() == $key) {
                    dump($child->parent_id);
                    dump($key);
                    dump($value);
                }
           }
          if(count($child->children)) {
               CatMultilangArray::Children($child->children);
           }
       }

    }
}
