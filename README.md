# Thermo control

A simple web thermostat (and other random stuff) for my own house

## Directory structure
```
├── bin                                             Console commands
├── config                                          Config files
├── public                                          Public folder
│   ├── assets                                      Published assets used by AssetManager
│   └── css                                         CSS files
│   └── img                                         Image files
│       └── favicon                                 Favicon files
├── resources                                       Resource files
│   └── gii                                         Custom Gii template
│       └── templates
│           └── crud
│               └── simple
│                   └── views
└── src                                             Actual source files
    ├── assets                                      Asset bundles
    ├── commands                                    CLI commands
    ├── controllers                                 Web controllers
    │   └── user                                    User module controllers
    ├── dictionaries                                Dictionaries
    ├── factories                                   Factories
    ├── migrations                                  Migrations
    │   └── demo                                    Migrations related to demo content
    ├── models                                      Models
    │   ├── base                                    
    │   ├── query
    │   └── user
    ├── services                                    Services
    ├── views                                       Views
    │   ├── layouts
    │   ├── site
    │   └── user
    │       ├── admin
    │       ├── mail
    │       │   ├── layouts
    │       │   └── text
    │       ├── permission
    │       ├── profile
    │       ├── recovery
    │       ├── registration
    │       ├── role
    │       ├── rule
    │       ├── security
    │       ├── settings
    │       ├── shared
    │       └── widgets
    │           ├── assignments
    │           └── login
    └── widgets                                     Widgets
```
## Description

An in-depth paragraph about your project and overview of use.

## Getting Started

### Dependencies

* Raspberry Pi
* Bunch of sensors
* PHP 7.2+
* a lot of patience because I'm too lazy to write documentation


### Installing

* `git clone git@github.com:mrbig00/Thermo-Control.git`
* `composer install`
* 

## License

This project is licensed under the _Do What The Fuck You Want To Public License (WTFPL)_ License - see the LICENSE.md file for details

[![Say Thanks!](https://img.shields.io/badge/Say%20Thanks-!-1EAEDB.svg)](https://saythanks.io/to/mrbig00)
[![Yii2](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat)](https://www.yiiframework.com/)
![GitHub](https://img.shields.io/github/license/mrbig00/Thermo-Control.svg)