# Movie Review — Laravel Application

## Overview

Movie Review is a Laravel-based web application for publishing and reviewing movies. It provides a public-facing site where visitors can browse published movies, view movie details, search movies, and leave ratings. Administrators can manage movies, casts, genres, carousel entries and statuses via an admin dashboard.

Problem it solves
- Provides a lightweight CMS for movie listings and a simple review/rating system.
- Separates public browsing and admin management, with role-based access via a small `isAdmin` middleware.

Who it's for
- Developers: example app demonstrating Laravel resource controllers, file uploads, relations and Socialite integration.
- Small teams or students: a starting point for a movie catalogue and review site.
- Educators / portfolios: contains a full stack of features suitable for demonstrations or assignments.

---

## Features

**Core (Public-facing)**
- Browse published movies with pagination and search (movie title, details, casts) (`MovieWatchController@index`, `Movie::scopeFilter`).
- Movie detail page with optional rating controls for authenticated non-admin users (`MovieWatchController@show`, `RatingController@newstore`).
- Calendar view showing movies and statuses (`MovieWatchController@calendar`).

**Authentication & User**
- Full user registration, login, password reset, email verification and profile management (using Laravel Breeze-like auth controllers in `routes/auth.php`).
- Social login via Laravel Socialite (drivers supported via `SocialiteController`).
- Role flag `isAdmin` on users to gate administrative routes (`isAdmin` middleware).

**Admin / Management**
- Movie Management: create, edit, list, delete movies with image and carousel image uploads (`MovieController`).
- Casts Management: add and remove casts (`CastController`).
- Genres Management: add and remove genres (`GenreController`).
- Carousel Management: select movies for the homepage carousel (`CarouselController`).
- Statuses Management: add and remove statuses (`StatusController`).
- Admin dashboard listing recent movies (`AdminController@index`).

**Ratings**
- Authenticated users (non-admins) can submit a rating (1–5) for a movie (`RatingController::newstore`) and delete their review (`RatingController::destroy`).

**Testing**
- Feature tests covering controllers and some auth flows are present under `tests/Feature`.

---

## Tech Stack

- Languages: PHP (requires PHP ^8.1)
- Frameworks & libraries:
  - Laravel Framework (>= 10.x)
  - Laravel Sanctum (installed)
  - Laravel Socialite (social login)
  - Laravel Breeze (auth scaffolding / view components present)
- Frontend / build tools:
  - Vite, Tailwind CSS, Alpine.js, Axios
- Database: Eloquent with migrations (MySQL/Postgres/SQLite — DB type configurable via `.env`)
- Dev & testing tools: PHPUnit (tests), Laravel Sail (dev container available in composer dev deps)

---

## Installation & Setup

> NOTE: this project uses standard Laravel conventions. The steps below assume macOS / Linux or a compatible environment.

Prerequisites
- PHP ^8.1
- Composer
- Node.js (for frontend assets)
- A database (MySQL, Postgres or SQLite)

Setup (local)
1. Clone the repository
   ```bash
   git clone <repo-url>
   cd Movie-review
   ```
2. Install PHP dependencies
   ```bash
   composer install
   ```
3. Copy and configure environment
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   - Set your database connection in `.env` (DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD).
4. Run database migrations and seeders (seeders exist in `database/seeders`)
   ```bash
   php artisan migrate --seed
   ```
5. Install frontend tooling and build assets
   ```bash
   npm install
   npm run dev   # or `npm run build` for production
   ```
6. Start the local server
   ```bash
   php artisan serve
   ```

Running tests
- Run PHPUnit tests:
  ```bash
  ./vendor/bin/phpunit
  ```

Environment notes
- Social logins require driver configuration (client ID/secret) in `.env` (providers are wired through `SocialiteController`).
- Image uploads are stored under `public/movieimages` and `public/carouselimages`.

---

## Folder Structure (high level)

- `app/` — core application code (Controllers, Models, Middleware, Providers)
  - `Http/Controllers` — resource controllers for movies, casts, genre, carousel, status, ratings, socialite
  - `Models` — Eloquent models: `Movie`, `Rating`, `Carousel`, `Cast`, `Genre`, `Status`, `Socialite`, `User`
  - `Http/Middleware/isAdmin.php` — middleware enforcing admin-only routes
- `routes/` — application routes
  - `web.php` — web routes (public, admin, socialite)
  - `auth.php` — authentication routes (registration/login/password reset/verification)
- `resources/views/` — Blade templates (client views, admin views, components)
- `database/migrations/` and `database/seeders/` — schema and seed data
- `public/` — web assets incl. `movieimages/` and `carouselimages/`
- `tests/` — PHPUnit feature tests for controllers and authentication

---

## Future Scope & Recommendations

The following are realistic improvements based on the current codebase:

- API endpoints: implement RESTful API endpoints (with Sanctum token support) for movies, ratings and admin actions to support mobile or SPA clients.
- Authorization: replace boolean `isAdmin` flag with Laravel Policies or a role-based system for finer-grained permissions.
- File storage: move images to a cloud-backed storage (S3) using Laravel's Filesystem for scalability and backup.
- Caching & performance: cache frequently-read pages (home, movie lists) and use eager-loading for relations to reduce DB queries.
- Validation & UX: add server & client-side validation error display consistency, and improve multi-select UI for casts/genres.
- Tests: expand unit tests and add API tests to cover more business logic and edge cases.

---

## What I couldn't determine confidently
- Exact Socialite drivers to enable (the controller accepts a `{driver}` param, but provider settings and intended providers are not committed).
- Production deployment strategy—no deployment scripts or CI workflows are present in the repository.

---

If you want, I can also:
- Add a CONTRIBUTING guide and PR templates
- Add more tests (API and unit tests) or a GitHub Actions workflow for CI

-----

If you want this README tuned for a specific audience (e.g., hiring managers, students, or for a demo), tell me which audience and I'll adjust tone and detail. 
Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
