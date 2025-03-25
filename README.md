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
              $store = GXStorage::store(new GXStorageForm(
                  file: $request->file('file'), // Required: Ambil langsung dari parameter request
                  path: "images/attachments/", // Required: Isi dengan path dimana kamu mau simpan file ini. pastikan path sudah terdaftar dan locked
                  mimeType: "image/jpeg", // Optional: Jika bisa langsung kirim juga untuk meringankan beban public storage
                  savedUntil: 10, // Optional: Isi jika ingin menghapus setelah disimpan selama beberapa hari
                  title: "", // Optional: Isi jika perlu title
                  ownerId: "", // Optional: Isi jika ingin menentukan pemilik file dan agar saat folder di lock dengan password, pemilik file tidak perlu memasukan password
                  ownerType: "", // Optional: (employee, customer). Hanaya untuk identifikasi id yang dikirim adalah employee atau customer
                  createdBy: "", // Optional: Isi jika kamu perlu menyimpan siapa yang upload file tersebut
                  createdByName: "", // Optional: Isi jika kamu perlu menyimpan siapa yang upload file tersebut
              ));

              // Store from file path
              $store = GXStorage::store(new GXStorageForm(
                  file: storage_path('path/to/filename'), // Required: Ambil langsung dari parameter request
                  path: "images/attachments/", // Required: Isi dengan path dimana kamu mau simpan file ini. pastikan path sudah terdaftar dan locked
                  mimeType: "image/jpeg", // Optional: Jika bisa langsung kirim juga untuk meringankan beban public storage
                  savedUntil: 10, // Optional: Isi jika ingin menghapus setelah disimpan selama beberapa hari
                  title: "", // Optional: Isi jika perlu title
                  ownerId: "", // Optional: Isi jika ingin menentukan pemilik file dan agar saat folder di lock dengan password, pemilik file tidak perlu memasukan password
                  ownerType: "", // Optional: (employee, customer). Hanaya untuk identifikasi id yang dikirim adalah employee atau customer
                  createdBy: "", // Optional: Isi jika kamu perlu menyimpan siapa yang upload file tersebut
                  createdByName: "", // Optional: Isi jika kamu perlu menyimpan siapa yang upload file tersebut
              ));
              
              // Copy file to another service
              $copy = GXStorage::copyToAnotherService(new GXStorageMoveCopyForm(
                  file: "https://dev.storage.globalxtreme-gateway.net/link/path/filename", // Required: full path (link) yang ingin di copy
                  toClientId: 111111111111, // Required: Client id tempat tujuan file di copy
                  toPath: "photos/attachments/" // Required: Path tempat file ingin di copy
              ));
  
              // Move file to another service
              $copy = GXStorage::moveToAnotherService(new GXStorageMoveCopyForm(
                  file: "https://dev.storage.globalxtreme-gateway.net/link/path/filename", // Required: full path (link) yang ingin di copy
                  toClientId: 111111111111, // Required: Client id tempat tujuan file di copy
                  toPath: "photos/attachments/" // Required: Path tempat file ingin di copy
              ));
  
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
  
              // Saved Until
              $store->savedUntil;
  
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

    // Store from file path
    $store = GXStorage::store(new GXStorageForm(
        file: $_FILES['file']['tmp_name'], // Required: Ambil langsung dari parameter request
        path: "images/attachments/", // Required: Isi dengan path dimana kamu mau simpan file ini. pastikan path sudah terdaftar dan locked
        originalName: $_FILES['file']['original_name'], // Optional: Isi jika perlu menyimpan original name juga
        mimeType: "image/jpeg", // Optional: Jika bisa langsung kirim juga untuk meringankan beban public storage
        savedUntil: 10, // Optional: Isi jika ingin menghapus setelah disimpan selama beberapa hari
        title: "", // Optional: Isi jika perlu title
        ownerId: "", // Optional: Isi jika ingin menentukan pemilik file dan agar saat folder di lock dengan password, pemilik file tidak perlu memasukan password
        ownerType: "", // Optional: (employee, customer). Hanaya untuk identifikasi id yang dikirim adalah employee atau customer
        createdBy: "", // Optional: Isi jika kamu perlu menyimpan siapa yang upload file tersebut
        createdByName: "", // Optional: Isi jika kamu perlu menyimpan siapa yang upload file tersebut
    ));
  
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
  
    // Saved Until
    $store->savedUntil;
  
    // Delete file
    $delete = GXStorage::delete("inventories/pdf/4z0Zw5FUCrWfC9oQiian1686389620255618000.xlsx");
  
    // 200
    $delete->status;
    ```