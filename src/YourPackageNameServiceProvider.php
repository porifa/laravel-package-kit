<?php

namespace VendorName\YourPackageName;

use Illuminate\Support\ServiceProvider;
use VendorName\YourPackageName\Console\Commands\YourPackageNameCommand;

class YourPackageNameServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishConfig();

            $this->publishViews();

            $migrationFileName = 'create_your_package_name_table.php';
            if (!$this->migrationFileExists($migrationFileName)) {
                $this->publishes([
                    __DIR__ . "/../database/migrations/{$migrationFileName}.stub" => database_path('migrations/' . date('Y_m_d_His', time()) . '_' . $migrationFileName),
                ], 'migrations');
            }

            $this->commands([
                YourPackageNameCommand::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'your_package_name');
    }

    public function register()
    {
        $this->mergeConfig();
    }

    public static function migrationFileExists(string $migrationFileName): bool
    {
        $len = strlen($migrationFileName);
        foreach (glob(database_path('migrations/*.php')) as $filename) {
            if ((substr($filename, -$len) === $migrationFileName)) {
                return true;
            }
        }

        return false;
    }

    protected function publishConfig(): void
    {
        $this->publishes([
            __DIR__ . '/../config/your_package_name.php' => config_path('your_package_name.php'),
        ], 'config');
    }

    protected function publishViews(): void
    {
        $this->publishes([
            __DIR__ . '/../resources/views' => base_path('resources/views/vendor/your_package_name'),
        ], 'views');
    }

    protected function mergeConfig(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/your_package_name.php', 'your_package_name');
    }
}
