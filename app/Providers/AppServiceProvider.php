<?php

namespace App\Providers;

use Form;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::defaultView('components.pagination');

        Form::component('formText', 'components.form.text', ['label', 'name', 'value' => null, 'attributes' => []]);
        Form::component('formDate', 'components.form.date', ['label', 'name', 'value' => null, 'attributes' => []]);
        Form::component('formNumber', 'components.form.number', ['label', 'name', 'value' => null, 'attributes' => []]);
        Form::component('formEmail', 'components.form.email', ['label', 'name', 'value' => null, 'attributes' => []]);
        Form::component('formFile', 'components.form.file', ['label', 'name', 'value' => null, 'attributes' => []]);
        Form::component('formSelect', 'components.form.select', ['label', 'name', 'value' => null, 'selected' => null, 'attributes' => []]);
        Form::component('formSelectMulti', 'components.form.select-multi', ['label', 'name', 'value' => null, 'selected' => null, 'attributes' => []]);
        Form::component('formPassword', 'components.form.password', ['label', 'name', 'value' => null, 'attributes' => []]);
        Form::component('formCheckbox', 'components.form.checkbox', ['label', 'name', 'value' => null, 'checked' => null, 'attributes' => []]);

        Blade::directive('currency', function ($expression) {
            return "Rp <?php echo number_format($expression,0,',','.'); ?>";
        });
    }
}
