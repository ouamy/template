# Laravel Secure Template

A simple, secure, Laravel website template.

This template offers a minimal yet robust foundation for building Laravel applications that adhere to the OWASP Top Ten security guidelines.

---

## Prerequisites
Ensure you have the following installed on your system:

- Composer

- Caddy

⚠️ Don't forget to adapt your Caddyfile to match your actual domain name or local environment setup.

## Installation & Setup

### 1. Clone the Repository

```bash
git clone https://github.com/ouamy/template.git your-project-name
cd your-project-name
```

### 2. Clean the Project
Remove the .git folder to detach the project from the template's Git history:

```bash
rm -rf .git
```

You may also want to:

- Update README.md for your new project
- Create a new .env file

### 3. Initialize a New Git Repository
After cleaning, initialize your own Git history:

```bash
git init
git add .
git commit -m "first commit"
git branch -M main
git remote add origin https://github.com/your_username/your_repo.git
git push -u origin main
```

Replace your_username and your_repo with your actual GitHub account and repository name.

### 4. PHP-FPM and Hosts Configuration

- Open your PHP-FPM pool config file `/etc/php/8.3/fpm/pool.d/www.conf` and find the line:

```bash
listen = /run/php/php8.3-fpm.sock
```

Temporarily change it to:

```bash
listen = 127.0.0.1:9000
```

- Add the following line to your `/etc/hosts` file to map a local hostname for phpMyAdmin access:

```bash
127.0.0.1 phpmyadmin.localhost
```

## Run & Configure

```bash
# Start Caddy (for local HTTPS and reverse proxy)
caddy run
```

```bash
# Update and install dependencies
composer update
composer install
```

```bash
# Generate the app key
php artisan key:generate
```

```bash
# Launch the development server
php artisan serve
```

## Secure Coding Practices

Use the following as development reminders to keep your Laravel app secure:

✅ Escape User Input (Blade)
Always use Laravel's built-in escaping:

```bash
{{ $userInput }} {{-- Safe --}}
```

✅ Use Eloquent ORM for DB Queries
Avoid raw queries to prevent SQL injection:

```bash
User::where('email', $email)->first();
```

✅ Sanitize HTML Input
Use Mews Purifier to clean potentially dangerous input:

```bash
$cleanInput = Purifier::clean($input);
```

✅ Validate Requests in Controllers
Apply strict validation using form requests:

```bash
$request->validate([
    'email' => 'required|email',
    'password' => 'required|min:8'
]);
```

✅ Enforce Principle of Least Privilege
Configure route access via:

- Jetstream team and user policies
- Middleware like auth, can, role

✅ Audit and Maintain Dependencies
Run these regularly:

```bash
composer audit        # Security vulnerabilities
composer outdated     # Outdated packages
```

✅ Parse URLs Properly
Never trust user input directly. Always parse:

```bash
parse_url($userInputUrl);
```

## Summary

This template is designed to help you code faster while staying secure. Use it as your foundation for Laravel projects and a constant reminder of best practices.

## OWASP Top 10

| Threat Category | Mitigation Implemented      |
|------------------------------------------------|----------------------------------------------------------------------|
| ✅ 1. Broken Access Control                    | Jetstream roles & teams, Spatie Permissions                         |
| ✅ 2. Cryptographic Failures                   | Laravel hashing (argon2id), HTTPS with Caddy                          |
| ✅ 3. Injection                                | Eloquent ORM, Blade auto-escaping, Mews Purifier                    |
| ✅ 4. Insecure Design                          | Input validation, Jetstream structure, middleware usage             |
| ✅ 5. Security Misconfiguration                | Secure Headers, `.env` defaults, Caddy, `composer audit`           |
| ✅ 6. Vulnerable & Outdated Components         | `composer audit`, `composer outdated`                              |
| ✅ 7. Identification & Authentication Failures | Jetstream authentication & optional 2FA                             |
| ✅ 8. Software & Data Integrity Failures       | Laravel Auditing, HTTPS, controlled dependencies                   |
| ✅ 9. Logging & Monitoring Failures            | Sentry integration (optional or replaceable)                        |
| ⚠️ 10. SSRF (Server-Side Request Forgery)     | `parse_url()`, manual domain/IP whitelisting recommended           |

