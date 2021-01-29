# Sean's TALL Jetstream Stack via Laravel Sail Skeleton

This is a skeleton project to kick start development if you want to build Jetstream with Livewire and 
Tailwind 2.0 project. It has an example Datatable (using the Recipe Model) with filtering, bulk import, csv export 
and advanced sorting set up.

The Datatable uses TailwindUI, so if you are using this you will need to go purchase a license at 
<a href="https://tailwindui.com/">Tailwind UI</a>, which in my opinion you should do anyway.

<a href="https://github.com/alpinejs/alpine">Alpine JS</a> is already included as well 
as <a href="https://github.com/moment/moment">MomentJS</a>, <a href="https://github.com/basecamp/trix">Trix</a> 
and <a href="https://github.com/Pikaday/Pikaday">Pikaday</a>.

The backend uses <a hred="https://jetstream.laravel.com/2.x/introduction.html">Laravel Jetstream</a>.

Local development is using <a href="https://laravel.com/docs/8.x/sail">Laravel Sail</a> to build the docker environment.

Much of the project was built based on the great videos by Caleb Porzio, creator of 
<a href="https://github.com/livewire/livewire">Livewire</a>. From his videos, I was able to build into the skeleton:
- Notifications
- Datatables
- Form elements
- Heroicons

I would first suggest looking in resources/views/components/common to see what is there for icons and form elements. 
It is not an exhaustive list, but I will add more as I need them. One note on the rich text editor, while it does work 
on the formatting side to be submitted, it does not display properly the bullets and indentation in the textarea. I 
need to focus more on that at some point.

## Getting started
Clone the repository. Run the following commands in the new repository folder
```
composer install
cp .env.example .env
./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate --seed
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
```

### Suggested but not required
However, instead of repeatedly typing vendor/bin/sail to execute Sail commands, you may wish to configure a Bash alias 
that allows you to execute Sail's commands more easily:

```
alias sail='bash vendor/bin/sail'
````

Once the Bash alias has been configured, you may execute Sail commands by simply typing sail. The remainder of this 
documentation's examples will assume that you have configured this alias:

```
sail up
```

### Todo
- Tests
- More extraction
- Better documentation
- Possibly move the datatables to a package

