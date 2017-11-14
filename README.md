# YouTube Audio Proxy

PHP wrapper for playing audio with `youtube-dl`

## Install

Download from GitHub and then install with Composer:

    composer install

## Usage

Configure your web server (nginx or Apache) to serve `web/index.php`. 
Or run using PHP's built in web server:

    php -S localhost:8080 -t web

Browse to a URL, with the YouTube ID at the end.
If the ID is found then a Redirect response is returned
with the URL to play the file. Eg `http://localhost:8080/RiLe43yIONI`.
