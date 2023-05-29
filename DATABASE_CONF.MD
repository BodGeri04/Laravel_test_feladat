## Adatbázis konfiguráció
Az alábbiakban találhatóak az adatbázis konfigurációs beállítások, amelyeket a projektem használ. Ezeket az adatokat helyi fejlesztői környezetben kell beállítani.

Hozz létre egy .env fájlt a .env.example fájl alapján.<br>
Az .env fájlban módosítsd az alábbi adatokat a saját adatbázisodhoz:
  - DB_CONNECTION=mysql
  - DB_HOST=adatbazis-szerver-cime(pl.127.0.0.1)
  - DB_PORT=adatbazis-port-szama
  - DB_DATABASE=adatbazis-nev
  - DB_USERNAME=adatbazis-felhasznalonev
  - DB_PASSWORD=adatbazis-jelszo

## Adatbázis migráció
  - php artisan migrate
Ez létrehozza a szükséges adatbázis táblákat a projekthez.

## Email konfiguráció a .env-ben 2FA-hoz
Az .env fájlban módosítsd az alábbi adatokat a saját Email fiókodhoz:
  - MAIL_DRIVER=smtp
  - MAIL_HOST=smtp.gmail.com
  - MAIL_PORT=465
  - MAIL_USERNAME=Email_cím
  - MAIL_PASSWORD=Alkalmazás jelszó
  - MAIL_ENCRYPTION=titkosítás
  - MAIL_FROM_NAME=A küldő neve
