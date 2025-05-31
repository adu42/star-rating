<?php
/**
 * Created by PhpStorm.
 * User: Adu42
 * Date: 2018/9/12
 * Time: 16:39
 */

namespace Adu42\StarRating;


use Encore\Admin\Admin;
use Encore\Admin\Form\Field;

class StarRating extends Field
{
    protected $view = 'laravel-admin-star-rating::input';

    protected static $css = [
        'vendor/adu42/star-rating/bootstrap-star-rating-4.0.3/css/star-rating.min.css',
    ];
    protected static $js = [
        'vendor/adu42/star-rating/bootstrap-star-rating-4.0.3/js/star-rating.min.js',
    ];

    public function render()
    {
        $config = config('admin.extensions.star-rating.config');
        if (isset($config['language']) && file_exists(__DIR__ . '/../resources/assets/bootstrap-star-rating-4.0.3/js/locales/' . $config['language'] . '.js')) {
            Admin::js('vendor/adu42/star-rating/bootstrap-star-rating-4.0.3/js/locales/zh.js');
        }
        $config = json_encode(config('admin.extensions.star-rating.config'));
        $config = $config ? $config : '';
        Admin::script("$('#{$this->id}').rating({$config});");
        return parent::render();
    }
}
