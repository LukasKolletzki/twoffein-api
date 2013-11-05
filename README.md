#twoffein-api
A simple PHP class providing methods to interact with the API of Twoffein

##Usage
You should take a look at the official API-FAQ of Twoffein: https://twoffein.com/api-faq/

Basically there are two methods, `get($ressource, $params)` and `post($ressource, $params)` that perform requests to Twoffein.
You can use any ressource of the Twoffein API.

You do not have to submit `screen_name` and `api_key` as parameter, this is automatically done. Also `encoding` is set by the class. If you want to change it, you can use `configure($setting, $value)` to change it.

If you have more questions, feel free to ask.

##Example
```php
<?php

//including it and creating an instance
include "twoffein.class.php";
$twfn = new Twoffein("Harvey", "A1B2C3D4E5");

//set encoding to xml (default: json);
$twfn::configure("encode", "xml");

//get all drinks
$drinks = $twfn->get("drinks");

//get a user profile, in this case "Mckbrother"
$profile = $twfn->get("profile", ["target_screen_name" => "Mckbrother"]);

//send a tweet
$tweet = $twfn->post("tweet", ["drink" => "leetmate"]);

//send a cookie to "Mckbrother"
$cookie = $twfn->post("cookie", ["target_screen_name" => "Mckbrother"]);

?>
```

##License
twoffein-api is a simple class for accessing the Twoffein API
Copyright (C) 2013 Lukas Kolletzki

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see http://www.gnu.org/licenses/.