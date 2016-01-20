# xDesign Laravel 5 Boilerplate

This repository contains the Laravel 5 boilerplate which should act as a base for every new Laravel project.

## Setup

These instructions apply to developers who are setting up a new application based on this boilerplate.

1. Clone this boilerplate into a directory where you wish to develop the application.  
    ```git clone git@bitbucket.org:xdesign365/laravel5-boilerplate.git foobar.dev```

2. Create a Bitbucket repository for the new project. Replace the origin with the location of the new Bitbucket repository.  
    ```git remote set-url origin git@bitbucket.org:xdesign365/foobar.git```

3. Copy `.env.example` to `.env`.  
    ```cp .env.example .env```

4. Update `.env` with your configuration parameters for your development server (if using Vagrant, your databasesettings are already correct).  

5. Install PHP dependencies via Composer (if using Vagrant, this command can be run inside the virtual machine).  
    ```composer install```

6. Generate an application key.  
    ```php artisan key:generate```

7. Set permissions on the storage directory.  
    ```sudo chmod -R 0776 storage```

8. Rename the application and its root namespace, remember to do this in PascalCase.  
    ```php artisan app:name NewApplicationName```

9. Install Node dependencies via NPM (if using Vagrant, this command can be run inside the virtual machine).  
    ```npm install```

9. Update this file (`readme.md`) to reflect the new project.

10. Start hacking!

## Vagrant development server

**Note:** The use of Vagrant is optional, although highly recommended.

Vagrant is a popular command-line tool to run web applications inside their own isolated development environment. It uses VirtualBox to create a virtual machine which can be provisioned according to a `Vagrantfile`.

The advantage to using a Vagrant machine is that any developer (regardless of operating system or installed software) can clone the project and immediately have all required software and dependencies installed to run the application.

This repository ships with a `Vagrantfile`, which is based on [ScotchBox](https://box.scotch.io/). It will provision a virtual machine with the following installed:

* Ubuntu 14.04 LTS
* Apache 2.4
* Git
* PHP 5.6 (with Composer, cURL, GD, Imagick, Mcrypt)
* Beanstalkd
* NodeJS (with Gulp)
* MySQL, PostgreSQL and SQLite
* Redis, Memcached

### Installing Vagrant and running the virtual machine

1. Vagrant uses VirtualBox to run the virtual machines. [Download and install it](https://www.virtualbox.org/wiki/Downloads).
2. [Download and install](https://www.vagrantup.com/downloads.html) the Vagrant command line utility.
3. Run `vagrant up` in the root of the project and Vagrant will boot your shiny virtual machine, ready for running Laravel.

The first time you run `vagrant up`, Vagrant will download the ScotchBox virtual machine which will take a few minutes. This only happens once.

Now that Vagrant is running, you can access Laravel by visiting [http://192.168.10.10/](http://192.168.10.10/). If you don't want to use an IP address, append this to your hosts file:

    192.168.10.10   foobar.dev

### Vagrant commands

* `vagrant up` - Boots a virtual machine based on the `Vagrantfile`.
* `vagrant ssh` - SSH into a running virtual machine.
* `vagrant suspend` - Shut down a virtual machine, saving its state.
* `vagrant up` - Bring a machine that was previously suspended back up.
* `vagrant destroy` - Completely destroy the virtual machine.

### Database access

The database used by Laravel lives inside the virtual machine. You can follow the [ScotchBox instructions](https://box.scotch.io/) to connect to it.

If you copied your `.env` configuration from `.env.example`, you already have the correct configuration to connect Laravel to the MySQL server running inside the virtual machine.