# Double Site

make your project with this scheme files

# Installation

Clone this repo

```
git clone https://github.com/danidoble/site
```

Or with gh cli

```
gh repo clone danidoble/site 
```

Or just download as a zip

# Install composer

Once you have the project in your PC, go to "<b>dd</b>" directory in there open a terminal or a command line and install
composer.

This is important because the files of other projects are not in this skeleton

```
composer install
```

# Install NPM

(Optional) If you want to modify files (hope so) you must install npm

```
npm install
```

In this project it's used laravel mix for easy use of webpack, check the docs of mix here
([laravel mix](https://laravel-mix.com/docs/))
You have the next command to run mix

```
"dev"
"development"
"watch"
"watch-poll"
"hot"
"prod"
"production"
```

To run one of these commands do:

```
npm run "your_command"
Example
$/> npm run dev
```