GlobalXtreme PHP Storage Package
======

[![Version](http://poser.pugx.org/globalxtreme/php-storage/version)](https://packagist.org/packages/globalxtreme/php-storage)
[![Total Downloads](http://poser.pugx.org/globalxtreme/php-storage/downloads)](https://packagist.org/packages/globalxtreme/php-storage)
[![License](http://poser.pugx.org/globalxtreme/php-storage/license)](https://packagist.org/packages/globalxtreme/php-storage)

### Install with composer

To install with [Composer](https://getcomposer.org/), simply require the
latest version of this package.

```bash
composer require globalxtreme/php-storage
```

## Using
- Setup .env.
    ```php
    STORAGE_BASE_URL=<storage-api-gateway> // OPTIONAL
    STORAGE_CLIENT_ID=<your-client-id>
    STORAGE_CLIENT_SECRET=<your-client-secret>
    ```
- In laravel.
    ```php
      use App\Http\Controllers\Controller;
      use App\Http\Request;
      use GlobalXtreme\PHPStorage\GXStorage;
    
      class CustomController extends Controller
      {
          public function testing(Request $request) 
          {
              // Store from parameter request
              $store = GXStorage::store("path/to", $request->file('file'), "Title");
            
              // Store from file path
              $store = GXStorage::store("path/to", file_get_contents(storage_path('path/to/filename')), "Title");
            
              // 200
              $store->status;
  
              // Success
              $store->message;
  
              // inventories/pdf/4z0Zw5FUCrWfC9oQiian1686389620255618000.xlsx
              $store->path;
  
              // https://storage.globalxtreme-gateway.net/storages/inventories/pdf/4z0Zw5FUCrWfC9oQiian1686389620255618000.xlsx
              $store->fullPath;
  
              // Title
              $store->title;
  
              // Delete file
              $delete = GXStorage::delete("inventories/pdf/4z0Zw5FUCrWfC9oQiian1686389620255618000.xlsx");
  
              // 200
              $delete->status;
          }
      }
    ```
- In PHP Native
    ```php
    include("vendor/autoload.php")

    use GlobalXtreme\PHPStorage\GXStorage;

    // Load .env file
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->safeLoad();

    $store = GXStorage::store("path/to", file_get_contents($_FILES['file']['tmp_name']), "Title");
  
    // 200
    $store->status;
  
    // Success
    $store->message;
  
    // inventories/pdf/4z0Zw5FUCrWfC9oQiian1686389620255618000.xlsx
    $store->path;
  
    // https://storage.globalxtreme-gateway.net/storages/inventories/pdf/4z0Zw5FUCrWfC9oQiian1686389620255618000.xlsx
    $store->fullPath;
  
    // Title
    $store->title;
  
    // Delete file
    $delete = GXStorage::delete("inventories/pdf/4z0Zw5FUCrWfC9oQiian1686389620255618000.xlsx");
  
    // 200
    $delete->status;
    ```