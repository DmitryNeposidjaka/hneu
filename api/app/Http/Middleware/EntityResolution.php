<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Student\UserController;
use App\Models\News;
use App\Models\Product;
use Closure;

class EntityResolution
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $models = [
            'product' => Product::class,
            'news' => News::class,
        ];

        if(isset($request->model) && array_key_exists($request->model, $models)) {
            $model = $models[$request->model];
            $request->entity = $model;
            $request->model = call_user_func([$model, 'find'], $request->id);
        }

        return $next($request);
    }
}
