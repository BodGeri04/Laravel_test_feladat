# Laravel_test_feladat

## Felhasználó létrehozása

A felhasználót a rendszer hozza létre random generálva a ***php artisan app:init-script*** kód futtatása után. Konzolon kiírásra kerül minden adat.<br>
Mivel a program tartalmaz Email alapú kétlépcsős azonosítást, ezért a random felhasználó létrehozása után nem fog tudni belépni a tesztelő (nem kapja meg emailben a kódot).<br>

## 2FA
***Teszt erejéig a program kiírja a felhasználó azonosító kódját, amikor azt kéri.***<br>
Amennyiben a tesztelő szeretné élesben tesztelni a kétlépcsős azonosítást az alábbi pontokat kövesse:
- Módosítsd a TwoFAController.php index metódusát a "**return view('2fa');**" kódra. Minden mást törölj!
- Vedd ki a kommentezést a **User.php** Model-ben található generateCode() nevű metódusban!
- 2fa.blade.php nevezetű fájlban a kommentek között (25.sor) található kódot szedd ki!

Mindezek után a program a megadott email címre egy azonosító kódot fog küldeni, amit meg kell adni a belépést követően. Különben az oldalra való belépés meg lesz tagadva minden esetben.

## A projektről röviden
- Az általam megvalósított teszt feladat egy cégeket kezelő admin rendszer. Bootstrap 5 front-end mintát használok, amelynek kizárólag a feladahoz szükséges paraméterei működnek.
- Az oldal reszponzivítását az alap böngésző által kínált módszerével teszteltem.
- Tartalmaz a rendszer:
    - véletlenszerű felhasználó létrehozást 
    - egy lista nézetet a cégekről: /companiesList/
    - egy részletes lista nézetet az adott cégről: /company/{id}/
    - kétlépcsős Email azonosítást minden belépés után

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
