# BookVerse PHP edition

This is a standalone PHP edition of BookVerse. It uses native PHP sessions and a small JSON-file store so it runs with the PHP CLI available on this computer and needs no Composer packages or database extensions. Data is saved in `data/store.json`.

## Run it

From this folder:

```powershell
php -S 127.0.0.1:8000
```

Open <http://127.0.0.1:8000>. PHP 8.1+ is recommended. The included `data/store.json` has sample books and categories. To create the first admin, run:

```powershell
php create-admin.php
```

The script prompts for name, email, and password (12+ characters). Demo customer: `reader@bookverse.local` / `Reader123!`.

## Storage note

This edition uses a locked JSON file because this PHP environment has neither `pdo_mysql` nor another PDO database driver enabled. The original Node/MongoDB project remains in the parent folder. For a class deployment on MySQL, migrate `Store` methods to PDO and create relational tables; the PHP app keeps the UI and business actions in a compact beginner-readable format.
