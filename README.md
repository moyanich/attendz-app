## About Attendz

Attendz is a web application used for the management of HRM of employees with robust authentication and access manangement system made in lastest Laravel 8.0 Framework and MySQL.

## Usage

### Functions

**Admin** has:
- Employee module
	- Add employee
	<p align="center">Employee Profile</p>

	- View employees
	<p align="center">Employee Profile</p>


### Configuration

Make sure that this project has proper file permissions.
To run this project, you will need to set up a database and a smtp server for password reset and add it to your .env file

After that, you run migration to get it running.

```console
php artisan migrate
```

And link public folder to storage for file uploads

```console
php artisan storage:link
```

To get initial test data in database

```console
php artisan db:seed
```

## Themes, plugins, packages used for developement
Following are the assets used for this project
-	[DaisyUI](https://daisyui.com/) Tailwind CSS Components
-	[DataTables](https://datatables.net/) for responsive table