# moneywave
A PHP library to consume flutterwave's moneywave API
## Still Under Development 

## Configuration

You will need to sign up on [Moneywave] https://moneywave.flutterwave.com/:

#### Environment Variables
Get the api key and secret from the moneywave dashboard and add it to the `.env` file.
    `.env`

open the file and add the following lines of code by replacing the `apikey` and `apisecret` with the one you obtain from your moneywave account.
```php
MONEYWAVE_APIKEY = apikey
MONEYWAVE_SECRET = apisecret
MONEYWAVE_ENV= production |staging
```
