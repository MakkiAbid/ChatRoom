# ChatRoom
This Application will register the user & redirect it to the chat room where all of the users can chat at one place 

- Smileys 
- Bad words Detection + Replacing them with asterisk

## Configuration
```php
    session_start();
	$conn = mysqli_connect("SERVER_NAME","USERNAME","PASSWORD","DATABASE");
```

Replace following words with your own credentials

SERVER_NAME = Your Server Name e.g localhost
USERNAME = Username on the server e.g root
PASSWORD = Users Password
DATABASE = Name of the database