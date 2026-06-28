<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Filesystem;
use Masbug\Flysystem\GoogleDriveAdapter;

class GoogleDriveStorageServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Storage::resolved(function ($shared) {
            Storage::extend('google', function ($app, $config) {
                $client = new \Google\Client();
                $client->setClientId($config['clientId'] ?? env('GOOGLE_DRIVE_CLIENT_ID'));
                $client->setClientSecret($config['clientSecret'] ?? env('GOOGLE_DRIVE_CLIENT_SECRET'));
                $client->refreshToken($config['refreshToken'] ?? env('GOOGLE_DRIVE_REFRESH_TOKEN'));

                $service = new \Google\Service\Drive($client);
                $adapter = new GoogleDriveAdapter($service, $config['folderId'] ?? env('GOOGLE_DRIVE_FOLDER_ID'));

                return new \Illuminate\Filesystem\FilesystemAdapter(
                    new Filesystem($adapter, $config),
                    $adapter,
                    $config
                );
            });
        });
    }
}
