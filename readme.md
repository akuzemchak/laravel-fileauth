# FileAuth

A file-based authentication driver for Laravel 3.2+

## Why Would I Use This?

Sometimes, you just need one or two user accounts that never change, but only exist for the purpose of accessing a password-protected area, or something similar. FileAuth allows you to define users in a configuration file, which allows them to be easily added, edited, or removed by you or a client with access to the code... no database necessary!

**Please do not use this for a full-blown user management system... use the built-in Eloquent or Fluent drivers instead!**

## Installation

In a terminal, run the following command:

`php artisan bundle:install fileauth`

Open up `bundles.php` and add the following:

`'fileauth' => array('auto' => true),`

Open `application/config/auth.php` and change the following:

```
'driver'   => 'file',
'username' => 'username',
```

Then, write all your auth functionality as you normally would with the built-in drivers!

## Managing Users

To add or edit users, open up `bundles/fileauth/config/users.php` and make changes to the array. At minimum, each user must have an id, username, and hashed password. You can add any other properties to the array, which will be assesible from the `Auth::user()` method.

There are two default users, which you can see by examining the file mentioned above. **Please do not leave these with their default values!**

## Issues

Please post any issues to the repository's [issue tracker](https://github.com/akuzemchak/laravel-fileauth/issues).

Or, put in a pull request!