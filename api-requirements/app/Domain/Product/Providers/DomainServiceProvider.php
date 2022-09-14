<?php

namespace CodeHappy\Domain\Product\Providers;

use CodeHappy\Domain\Product\Database\Seeders\ProductSeeder;
use CodeHappy\Support\Product\Helpers\Discount;
use CodeHappy\Support\Product\Helpers\Sku;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use ReflectionClass;

class DomainServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('discount', fn () => new Discount());
        $this->app->bind('sku', fn () => new Sku());
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerMigrations();
        $this->loadRoutesFrom(app_path('App/Http/Routes/api.php'));
        $this->callAfterResolving(
            DatabaseSeeder::class,
            fn ($seeder) => $seeder->call(ProductSeeder::class)
        );
    }

    /**
     * Register migrations.
     *
     * @return void
     */
    public function registerMigrations(): void
    {
        $migrationsDir = $this->domainPath('Database/Migrations');
        if (! File::isDirectory($migrationsDir)) {
            return;
        }
        $this->loadMigrationsFrom($migrationsDir);
    }

    /**
     * Get domain path.
     *
     * @param string $path
     * @return string
     */
    protected function domainPath($path = null): string
    {
        $reflection = new ReflectionClass($this);
        $realPath = realpath(dirname($reflection->getFileName()) . '/../');

        if (! $path) {
            return $realPath;
        }

        return $realPath . Str::start($path, '/');
    }
}
