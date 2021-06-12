## Set up
- Create database
- Run command `composer install`
- Run command `copy .env.local .env` or `cp .env.local .env`
- Run command `php artisan install`

## Start server
- Run command `php artisan serve`

## Information
- Home Template: [here]()
- Admin Template: [here](https://github.com/duongvalo/admin-template.git)
- Domain: [youtubestore.vn](https://youtubestore.vn)
- Hosting: `158.247.210.4`
- Database: `miraitech`
- Rate: `0`

# Document
## Command
### Setup
- Reinstall application: `php artisan install:fresh`
- Install application in production: `php artisan install --prod`

### Dump database
- Folder /database/sql/<all|schema|data>.sql
- `php artisan dump schema` to dump schema file `dump-schema.sql`
- `php artisan dump data` to dump data file `dump-data.sql` 
- `php artisan dump` to dump schema and data file `dump-all.sql`

### Develop
- `php artisan make:admin <Model>` to generate crud
- `php artisan remove:admin <Model>` to remove crud
- `php artisan make:dump <Option>` to import sql
- `php artisan make:cms <File>` to generate data-cms
- `php artisan validate:cms` to validate unique data-cms

## Admin view
### Component
- `<x-input />`
- `<x-select />`
- `<x-textarea />`
- `<x-summernote />`
- `<x-dropify />`
- `<x-action />`

## Server Task Scheduling
### VPS Hosting
`cd /home/admin/web/<domain>/public_html && php artisan schedule:run >> /dev/null 2>&1`

### Shared Hosting
`/usr/local/bin/php /home/<username>/public_html/artisan schedule:run >> /dev/null 2>&1`

## Front-end
### CMS
- `data-cms` admin can change text, image tag
- `data-cms-background` admin can change background in css `background-image`
- `data-cms-listener` listener to `data-cms` and `data-cms-background` with same key 
- `data-cms-clone` just clone data from `data-cms` with same key, no event

### Form
- In `<form>` add `class="js-form"`
- Support name `name, phone, email, address, content`. Example: `name="phone"`
- Default: `method="post"`, `action="/customer"`, advance: we can custom `method`, `action` 

### Npm
- Place `.scss` files in `/resources/sass/home`
- Place `.js` files in `/resources/js/home`
- Config in `webpack.mix.js`

#### Support command: 
- `npm run prod` build final file `.css`, `.js`
- `npm run watch` auto build when changing `.scss`, `.js` file
