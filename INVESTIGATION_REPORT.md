# Cinemoto investigation and local setup

Investigation date: 15 November 2026. No Cinemoto PHP, CSS, JavaScript, or SQL source file was edited. XAMPP configuration was changed only so MySQL can start on port 3301 and the existing site can be opened.

## 1. Project overview

Cinemoto (styled CINEMO'TO in the pages) is a college cinema website. A visitor can browse a hardcoded movie catalog, open a few movie detail pages, look at branch photos, browse a snack menu, and create an account. Login and registration are the only features that read and write the database. Ticket selection, the food cart, and the contact form stay in the browser and are not saved.

The project is one PHP site. There is no separate frontend application, no API, and no framework.

## 2. Technology stack

| Piece | What the project actually uses |
| --- | --- |
| Language | PHP 8.2.12 (XAMPP, ZTS, Visual C++ 2019 x64) |
| Web server | Apache from XAMPP 8.2.12-0, already using port 80 |
| Database | MariaDB 10.4.32, MySQL protocol, through XAMPP |
| Database access | `mysqli` in the PHP pages |
| Frontend | Hand-written HTML, CSS, and JavaScript |
| UI libraries from CDNs | Boxicons, Font Awesome, Remix Icon, Swiper 9 |
| Dependency files | None. No `composer.json`, `package.json`, `.env`, or lockfile |
| Framework | None. This is not Laravel, and `php artisan serve` does not apply |
| Migrations | None. One SQL dump: `database/cinemoto_db.sql` |
| Version control metadata | No application version file |

A second database server is already installed on this PC: the Windows service **MySQL80** (`C:\Program Files\MySQL\MySQL Server 8.0`). It listens on port 3306. That is the process XAMPP could not name ("Unable to open process"). XAMPP's own MariaDB was moved to port **3301** so the two servers can run together. MySQL80 was not stopped, and no existing database was dropped.

## 3. Project folder structure

Project path: `C:\Users\carl.wong\Documents\Proj1\cinemoto`

```
cinemamoto/
  database/cinemoto_db.sql     Schema and six branch rows
  include/                     Shared header, footer, and movie-page connection
  pages/                       Home, login, register, cart, food, branches, contact
  pages/moviepages/            Individual movie pages
  resources/css/               Page styles
  resources/js/script.js       Menu, search box, trailer modal
  resources/images/            Posters, branch photos, food photos
  resources/trailer/           Local mp4 trailers
```

There is no `index.php` in the project root. The home page is `pages/index.php`.

Links and styles use site-root paths such as `/pages/...` and `/resources/...`. PHP includes use a fixed filesystem path, `/xampp/htdocs/cinemamoto/...`, which on this PC is `C:\xampp\htdocs\cinemoto\...`. The project folder itself lives under Documents, so a directory junction was created:

`C:\xampp\htdocs\cinemamoto` → `C:\Users\carl.wong\Documents\Proj1\cinemamoto`

The junction does not copy the project. Removing the junction later does not delete the files in Documents.

Apache is serving that folder as its own site on port **8088**, so those root-relative URLs resolve. The XAMPP dashboard on port 80 is unchanged.

## 4. Existing features

### Account

- `pages/register.php` inserts a row into `customers`. The password is stored with `password_hash`.
- `pages/login-conn.php` looks the email up with a prepared statement and checks it with `password_verify`. On success it stores `user_id`, `user_email`, and `name` in the session.
- `pages/logout.php` clears the session and returns to the home page.
- `pages/index.php`, `pages/branch.php`, `pages/contact.php`, and `pages/foodacc.php` each contain two full copies of the page: one for a logged-in session and one for a guest. The guest home page includes the login and registration modals.

### Catalog and booking UI

- The home page and movie cards are hardcoded HTML. Show dates and times are hardcoded in JavaScript, and the sample dates are in July 2024.
- Movie detail pages (`twister.php`, `flymetothemoon.php`, `if.php`, `daedpoolandwol.php`, `movies.php`) include `include/movies-con.php`, then render a static layout, a location/date/time/seat form, and a trailer modal.
- `include/movies-con.php` and `pages/cartpage.php` run `SELECT * FROM movies` and never use the result.
- Seat picking on the detail pages only changes the page in the browser.

### Other pages

- `pages/branch.php` shows branch images for Valenzuela, Alabang, Caloocan, Makati, Malabon, and Marikina.
- `pages/foodacc.php` shows snacks, drinks, and combos. The cart badge is hardcoded to `0`.
- `pages/cartpage.php` builds cart rows in JavaScript and calculates a subtotal, tax, and total in the browser. The Checkout button has no server request.
- `pages/contact.php` shows a contact form. Both buttons are `disabled`, and the form has no `action`.

### How the pieces depend on each other

```
Browser
  -> Apache
       -> pages/*.php
            -> session
            -> mysqli  (login, register, and the unused movie query)
                 -> MariaDB cinemoto_db on 127.0.0.1:3301
            -> include/*.php at C:\xampp\htdocs\cinemamoto\include
            -> /resources CSS, JS, images, trailers
```

Login, registration, and logout are the only completed server features. The movie, food, branch, ticket, and contact screens do not depend on each other's data.

## 5. Database architecture

Original system: MySQL-compatible MariaDB, distributed with XAMPP. The dump uses `AUTO_INCREMENT`, `ENUM`, `ENGINE=InnoDB`, and `utf8mb4_general_ci`.

Database created for this setup: **`cinemoto_db`**.

The name in every connection file and in `database/cinemoto_db.sql` is `cinemoto_db`. The requested name `cine_practice-db` was not created. Pointing the app at that name would require editing the PHP connections, which was left for approval. The import used `CREATE DATABASE IF NOT EXISTS` and `CREATE TABLE IF NOT EXISTS`. Nothing was dropped.

Current row counts after import:

| Table | Rows | Role |
| --- | --- | --- |
| `customers` | 0 | Accounts. Written by `pages/register.php` |
| `movies` | 0 | Defined, never filled, query result unused |
| `foods` | 0 | Defined, food page does not read it |
| `branches` | 6 | Seeded by the dump, branch page does not read it |
| `tickets` | 0 | Defined, no page inserts a ticket |

Relationships, all declared on `tickets`:

- `tickets.customer_id` → `customers.customer_id`
- `tickets.movie_id` → `movies.movie_id`
- `tickets.food_id` → `foods.food_id` (nullable)
- `tickets.branch_id` → `branches.branch_id`

`tickets` also copies branch name, movie type, food name, prices, tax, and totals onto the ticket row. There is no separate orders, seats, or showtimes table. There is no migration history.

### PostgreSQL and pgAdmin

Cinemoto does not use PostgreSQL, and pgAdmin is not part of this setup. The running database is MariaDB on port 3301, which phpMyAdmin already reaches at `http://localhost/phpmyadmin`.

Loading `cinemoto_db.sql` into PostgreSQL would fail until the dump is rewritten. The parts that are MariaDB/MySQL-specific are `AUTO_INCREMENT`, `ENUM`, `ENGINE=InnoDB`, the backtick quoting, `AUTOCOMMIT`, and the `mysqli` calls. A later move would replace `mysqli` with `pdo_pgsql` and rewrite the five tables. That migration was not started.

## 6. Current issues and bugs

### MySQL could not stay up on 3306

- What: XAMPP MariaDB aborted because port 3306 was already taken, then crashed once the port was free.
- Where: Windows service MySQL80 holds 3306. XAMPP log `C:\xampp\mysql\data\mysql_error.log`. Config `C:\xampp\mysql\bin\my.ini`.
- Why: Two MySQL servers cannot listen on the same port. After the port change, MariaDB 10.4.32 still hit an InnoDB assertion (`os0file.cc`, assertion `slot`) on this Windows build and exited.
- Fix already applied in XAMPP config: listen on 3301, and set `innodb_flush_method=normal`. MariaDB then logged `ready for connections` on port 3301.
- Still to do: `C:\xampp\xampp-control.ini` is writable only by Administrators, so the Control Panel can still be watching 3306. Run **XAMPP Control Panel as Administrator**, open **Config → Service and Port Settings**, set MySQL to **3301**, and save. Do not press MySQL **Stop** before that. The panel's stop helper is `killprocess.bat`, and that script taskkills every process named `mysqld.exe`, which includes MySQL80.

### Movie pages and the home page point at missing URLs

- What: Several "Buy Your Ticket Now" buttons go to `/pages/movies.php`. That file does not exist. The catalog page is `/pages/moviepages/movies.php`.
- Where: `pages/index.php`. Many other ticket buttons have no destination at all.
- Why: Those clicks 404 or do nothing, so the booking path is unfinished.
- Recommended fix: point the buttons at the real movie pages, and give every ticket button a destination. Wait for approval before editing.

### Food registration posts to a missing script

- What: The guest registration form on the food page posts to `registration-conn.php`, which is not in the project. The working script is `pages/register.php`.
- Where: `pages/foodacc.php`.
- Why: Registration from the food page fails even though registration from the home page works.
- Recommended fix: post that form to `register.php`.

### Includes only work from the XAMPP path

- What: Pages call `include('/xampp/htdocs/cinemamoto/include/...')`.
- Where: `pages/index.php`, `pages/branch.php`, `pages/contact.php`, `pages/foodacc.php`, `pages/cartpage.php`, and every file in `pages/moviepages/`.
- Why: Opening the project from any other folder, or with the PHP built-in server alone, makes the footer and movie layout fail.
- Recommended fix: include with a path relative to the project, such as `__DIR__`. The junction at `C:\xampp\htdocs\cinemamoto` is what makes the current path work.

### Database results are unused, and the catalog is empty

- What: `movies-con.php` and `cartpage.php` query `movies` and ignore `$result`. The dump inserts branches only.
- Where: `include/movies-con.php`, `pages/cartpage.php`, `database/cinemoto_db.sql`.
- Why: Adding movies in MariaDB does not change the site. Showtimes, seats, and tickets are not stored. `tickets` and `foods` stay empty.
- Recommended fix: either drive the cards from the tables, or stop querying until that work starts. Seed `movies` and `foods` when the pages actually read them.

### Booking and cart never reach the server

- What: Seat, date, and food choices are not posted. Checkout has no PHP handler. The cart count is the literal `0`.
- Where: `pages/moviepages/*.php`, `pages/cartpage.php`, `pages/foodacc.php`.
- Why: A visitor cannot buy a ticket or save an order. The `tickets` foreign keys are never used.
- Recommended fix: one booking script that checks the session, validates the movie, branch, seat, and quantities, and inserts one `tickets` row inside a transaction.

### Contact form cannot be submitted

- What: Submit and Reset are disabled. The form has no action. The branch list (Bataan, Manila, Ayala Mall, Greenhills) does not match the six branches in the database.
- Where: `pages/contact.php`.
- Why: The page cannot send a message, and the two branch lists will drift apart.
- Recommended fix: decide whether contact mail is in scope. If it is, enable the form, post it to a PHP handler, and read branch names from `branches`.

### Duplicate page markup

- What: Logged-in and guest versions of the same page are copied in full, including the header and navigation.
- Where: `pages/index.php` (about 2,100 lines), and the same pattern in `branch.php`, `contact.php`, and `foodacc.php`.
- Why: A visual fix has to be made twice, and the copies have already drifted (the food page posts to the wrong register script).
- Recommended fix: one header/footer include and one page body, with the login modal rendered only when there is no session.

### Movie detail pages share the same bugs

- What: Two `<select>` elements on each detail page use `id="type"`. The trailer `<video>` points at `/resources/trailer/avengersendgame.mp4` on the Twister, IF, Fly Me to the Moon, and Deadpool pages as well. `script.js` calls `play()` on `#movie-video` whenever the script is loaded, including pages that have no trailer element.
- Where: `pages/moviepages/*.php`, `resources/js/script.js`.
- Why: The seat dropdown and the format dropdown collide. The wrong trailer plays. On pages without that video node, the script throws and can stop the menu script after it.
- Recommended fix: unique ids, one trailer file per movie, and guard the trailer code with a null check.

### Stale show dates

- What: The location schedule in the movie pages lists dates in July 2024.
- Where: the `locationOptions` object in each movie page.
- Why: Every show is in the past relative to November 2026, so the picker cannot represent a real upcoming screening.
- Recommended fix: store showtimes in the database when booking is implemented.

### Small correctness gaps in registration

- What: The confirm-password field on `pages/login.php` has no `name`, and `register.php` never compares the two passwords. `register.php` also does not check that the prepared statements were created before it uses them.
- Where: `pages/login.php`, `pages/register.php`.
- Why: A mismatched confirmation is still saved. A database error becomes a PHP warning instead of the existing "registration failed" redirect.
- Recommended fix: validate the confirmation on the server and abort when `prepare` returns false.

## 7. Security concerns

- The PHP files connect as the XAMPP root account with an empty password, and they name the host, account, and database directly. phpMyAdmin is set to `auth_type` `config` with `AllowNoPassword`. That is acceptable only on this private PC. It is unsafe if Apache is reachable from the network.
- Login and registration use prepared statements. The movie query is a fixed `SELECT *` and does not concatenate user input. No SQL injection was found in the current queries.
- Failed connections call `die()` with the driver error, so a database outage prints server details to the visitor.
- Login does not call `session_regenerate_id`. There is no CSRF token on login, registration, or a future checkout.
- The session name is escaped with `htmlspecialchars` in the header. Movie text is not printed from the database today. Any future echo of movie or food fields needs the same escaping.
- `C:\xampp\passwords.txt` exists in the XAMPP folder. It was not opened for this report. Treat that file as sensitive and do not commit it.

No application `.env` and no API keys were found.

## 8. Dependencies that need attention

Do not upgrade these until you approve it.

- MariaDB 10.4.32 is the database inside this XAMPP. The 10.4 line is old, and this build crashes on Windows unless `innodb_flush_method=normal` is set. Upgrading XAMPP or MariaDB is a separate decision.
- PHP 8.2.12 matches the XAMPP package. The pages use `mysqli`, which is the right extension. They do not call the old `mysql_*` functions removed in PHP 7.
- `php.ini` still has a `[MySQL]` section for that removed extension. It is unused by Cinemoto. `mysqli.default_port` was set to 3301 so `new mysqli("localhost", ...)` reaches XAMPP.
- Swiper, Boxicons, Font Awesome, and Remix Icon are loaded from public CDNs. The site needs internet for those assets. There is no `package.json` to pin them.
- Apache, PHP, and MariaDB are managed by XAMPP. There is no Composer install and no npm install.

## 9. MySQL setup that is already done

These XAMPP files now use port **3301**:

- `C:\xampp\mysql\bin\my.ini` — client and server `port`, plus `innodb_flush_method=normal`
- `C:\xampp\properties.ini` — `mysql_port` and the client `-P` argument
- `C:\xampp\php\php.ini` — `mysqli.default_port` and `mysql.default_port`
- `C:\xampp\phpMyAdmin\config.inc.php` — server port
- `C:\xampp\apache\conf\extra\httpd-vhosts.conf` — Cinemoto on port 8088

`C:\xampp\xampp-control.ini` could not be saved because Administrators are the only writers. Comments inside `my.ini` that mention 3306 as a historical default were left as comments.

MariaDB is running and reported:

`Version: '10.4.32-MariaDB' port: 3301  ready for connections`

`cinemoto_db` is imported. phpMyAdmin on port 80 lists that database. Apache is listening on 80 and 8088.

Checked responses:

- `http://localhost:8088/pages/index.php` returned the home page
- `http://localhost:8088/resources/css/super.css` returned the stylesheet
- `http://localhost:8088/pages/moviepages/twister.php` returned the movie page, which means the include path and the database connection both worked
- `http://localhost/phpmyadmin/` opened and included `cinemoto_db`

The click-by-click booking flow was not exercised in a browser. Those controls are unfinished in the source, as listed above.

## 10. Run it locally

Apache and MariaDB were already started during setup. Use this when you need to start them again.

1. Open **XAMPP Control Panel as Administrator** once, and set MySQL's port to **3301** under **Config → Service and Port Settings**. Save.
2. Start **Apache** and **MySQL** from that panel. If they already show running, leave them. Avoid MySQL **Stop** until the panel port is 3301, so the stop action is not aimed at the other MySQL service.
3. The project directory is already the folder you have open:

```powershell
cd C:\Users\carl.wong\Documents\Proj1\cinemamoto
```

4. There are no Composer or npm dependencies to install.
5. There is no `.env` to create. Database settings are the four PHP files `include/movies-con.php`, `pages/cartpage.php`, `pages/login-conn.php`, and `pages/register.php`. They use host `localhost`, database `cinemoto_db`, and the XAMPP default account. PHP's default MySQL port is 3301.
6. The schema is already imported. To import it again on a new empty server without dropping anything, the dump is safe to re-run only while the tables are empty. Re-running it after branches exist would insert those six branches again, because that insert is not guarded.

```powershell
Get-Content -Raw "C:\Users\carl.wong\Documents\Proj1\cinemamoto\database\cinemoto_db.sql" | & "C:\xampp\mysql\bin\mysql.exe" --protocol=TCP -h 127.0.0.1 -P 3301 -u root --default-character-set=utf8mb4
```

7. There is no migration command.
8. There is no separate backend or frontend dev server. Apache serves both.

Open:

**http://localhost:8088/pages/index.php**

phpMyAdmin, connected to port 3301:

**http://localhost/phpmyadmin**

## 11. Recommended order of work

Wait for approval before any of these code changes.

1. Keep the current MariaDB 10.4 data. Save the Control Panel port as 3301 so the panel and `my.ini` agree.
2. Replace the hardcoded includes and the duplicated headers with one shared layout, and fix the broken `/pages/movies.php` and `registration-conn.php` targets.
3. Add one database connection file and stop copying the host and database name into four scripts.
4. Decide the booking model, then make the movie pages and cart write a real `tickets` row. Seed `movies` and `foods` as part of that work.
5. Guard `script.js` so pages without a trailer do not throw, and give each movie its own trailer file.
6. Add a local database user that can only use `cinemoto_db`, and turn off phpMyAdmin's passwordless config login before this Apache port is shared.
7. Only after the above, consider a newer XAMPP or a PostgreSQL port. Neither is required to keep developing this site.
