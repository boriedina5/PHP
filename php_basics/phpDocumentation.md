## Alapok
* Szerver oldali nyelv -> szerver nélkül nem működik
    * Védett körülmény
    * Csak a szerver tudja átfordítani -> HTML, CSS kód…
* HiperText Pre Processor a teljes neve
* Scripting Language, ami kifejezetten alkalmas a webfejlesztésre
* Könnyű a html-be ágyazni
* A kód a szerveren hajtódik végre, majd onnan tovább külid a kliensnek <- a kód rejtett
* Folyamatosan fejlesztik és a fogadja az update-eket.
![http request life cycle](https://media.licdn.com/dms/image/v2/D5612AQEkg0xVyzqBjQ/article-cover_image-shrink_600_2000/article-cover_image-shrink_600_2000/0/1695063240988?e=2147483647&v=beta&t=ey3qo0yQENgOSdsgyeVsvoXnNZb8zQfv4Z6Fan8GICU)

## Elérés és használat
* C/xampp/htdocs mappa - virtuális szerver itt ha létrehozzunk bármit weboldalnak minősül
* 3 részre tagolható
    * Maga a php nyelv és abba való kódolás
    * Adatbázis manipulálás
    * Hogyan véd meg a weboldalad vele
* Ha index.php az egyik fájl automatikusan bedobja
* `//` - egy soros komment
* `/**/` - több soros komment
* Felfele is lehet hivatkozni
\
* PHP funkciókkal műkődik
## Szintaxis
`<?php ?>` - php nyitótag, bárhova rakható, akár `<html>` tagen kívül is
* Ha több idézőjel van egy sorban, az alábbi a sorrend: 
    1. ''
    2. ""
* `;` használata fontos, mert az mutatja meg, hol zárod, le a kódot,
    * Alapvetően be van építve a php-ba, de érdemes kitenni
* 

## Változók
* `$` - ez jelöli a változókat
* Nincs típus megkötés -> aként a típusként viselkedik, amilyen érték van benne

#### Dátum
* Több megadási mód is van
* `$datum = "2025-09-17";` - Konkrét
* `$datumMasik = date(format: "yyyy-mm-dd");` - formátumot adunk meg

#### Tömb
* `$tomb = ["nev1", "nev2", "nev3"];` - php 4-től feljebbi verzióban működik
* `$tombMasik = array("nev1", "nev2", "nev3")` - Minden verzióra érvényes
* Array Mindfuck (mehet bele minden): `$arrayMind = ["Lehet benne szöveg", 4, true, 23.2, array(1, 2, 3)];`
#### Assziocatív tömb (C#-ban Dictionary)
* `$dictionary = array("Harry" => "Potter", "Hermione" => "Granger");`
    * Egy érték meghatározása: `$dictionary["Harry"];` eredmény: Potter
    * Kulcsok visszaadás: `array_keys(tömb);`
    * Értékek visszadása: `array_values(tömb)`
    * Egy új kulcs-érték pár hozzáadása: `$dictionary["Ron"] = "Weasly"`
    * Elem eltávolítása a tömbből: `unset(tömb[key])`
    * Keresés a tömben: `array_search(value/key?), tömb)`



## Operátorok
* String operátor
    * Összekapcsoljunk különböző stringeket különböző típusú adatdarabkákkal egy stringen belül
    * `.`-tal kötjük össze a stringeket
* Arithmetic operator
    * `+`
    * `-`
    * `/`
    * `*`
    * `%`
    * `**`
* Assignment operátor
    * `+=`
    * `-=`
* Comparison operátor
    * `==` - nincs adattípus ellenőrzés
    * `===` - van adattípus ellenőrzés
    * `!=` - nem egyenlő, nincs adattípus ellenőrzés
    * `!==` - nem egyenlő, van adattípus ellenőrzés
    * `<`
    * `>`
    * `<=`
    * `>=`
* Logikai operátor - Több feltétel
    * `and/&&` - mindkettő
    * `or/||` - egyik igaz
    * Ha egyszerre használod a `&&` és `||`, akkor `||` ez lesz az utolsó, amit figyelembe vesz a program
* Incrementing/decrementing operátor
    * `változó++`
    * `változó--`
    * `++változó`
    * `--változó`

## Kiíratás
* Két módja van: echo és print
    * `echo` 
        * Példa: `echo "Ez az első PHP által írt kódom.";`
        * Példa2: `echo htmlspecialchars(string: "<br>");`
        * Példa3: `echo "<br>";`
        * Példa4: `echo 8 + 6;`
        * több értéket is ki tud iratni <-> print, 
        * gyorsabb, 
        * nem csak szöveget, hanem html tag-et is tud
    * `print`
        * Példa: `print "Oldie but goodie";`
        * Kiír és visszaadja az értéknek, hogy: 1 <- feltételbe tudod használni (csak akkor menjen tovább ha...) DE soha nem lehet az értéke nulla -> Ricsi nem javasolja 
    * `var_dump(value: tömb)` - a weboldalon jeleníti meg

## Feltételek
* `if`
* `else if`
* `else`
```
switch (amit vizsgálunk változó) {
    case Amire vizsgáljuk érték : 
    utasítás
    break;
    ...
    default: 
    utasítás;
}
```
## Metódusok
* While ciklus, if..else és switch elágazás, operátorok ugyanúgy működnek
    * Switch-be feltételt is meg tudsz adni
* forEach eleve egy asszociatív tömb megadását feltételezi

## Beépített fv
#### String
* `strlen(szöveg)` - visszadja a szöveg karakterszámát
* `strtoupper(szöveg)` - Nagybetűssé teszi az összes karaktert, ha minden betűre akarjuk, hogy működkön -> mb_strtoupper (mb = multibyte)
* `strtolower(szöveg)` - Kisbetűssé teszi az összes karaktert, ha minden betűre akarjuk, hogy működkön -> mb_strtolower (mb = multibyte)
* `strrev(szöveg)` - Megfordítja a string karaktereinek sorrendjét
* `strpos(szöveg, keresett rész)` - megnézi, hogy a keresett részt tartalmazza-e a string
* `substr(szöveg, mettől, meddig)` - A szövegből kivág egy részt a mettől és meddig paraméterek alapján
* `explode('ami alapján elválasztok', szöveg);` - a megadott elválasztó karakter alapján feldarabolja a stringet, és a részeket egy tömbben adja vissza.
* `implode('ami alapján elválasztok', tömb)` - tömb elemeit egyetlen stringgé fűzi össze a megadott elválasztó karakterrel.
* `ucfirst(szöveg)` - Minden szó első betűjét nagybetűssé alakítja.
* `ucwords(szöveg)` - Az első karaktert teszi nagybetűvé.
* `trim($text, 'amit le akarunk szedni');` - automatikusan eltávolítja a következő karaktereket a string elejéről és végéről
    * "\0" - NULL
    * "\t" - tab
    * "\n" - new line
    * "\x0B" - vertical tab
    * "\r" - carriage return
    * " " - ordinary white space
    * "szöveg részlet"
#### Array
* `count(tömb)` - tömb elemeinek megszámlálása
* `array_sum(tömb)` - összeadja a tömb elemeit
* `max(tömb)` - visszadja a tömb legnagyobb elemét
* `min(tömb)` - visszadja a tömb legkisebb elemét
* `in_array(keresett érték, tömb)` - tömbben lévő elemek ellenőrzésére. Igaz és hamis értékkel tér vissza
* `reset(tömb)` - tömb első elemét adja vissza
* `end(tömb)` - tömb utolsó elemét adja vissza
* `array_reverse(tömb)` - megfordítja a tömb elemeinek sorrendjét
* `sort(tömb) ` - növekvő sorrendbe rendezi a tömböt. Igaz vagy hamis értékkel tér vissza (sikerül-e rendezni vagy sem) -> rendezés után ki kell iratni a tömböt ha látni akarjuk a rendezett elemeket.
* `array_merge(tömb1, tömb2)` - Egyesíti a tömböket
* ``


## The Basics of PHP Form Handling
#### HTML
* `<form method="get">` 
    * A method lehet: post vagy get
        * Get: Ha valamit a felhasználónak meg akarsz mutatni a felhasználónak az oldalon belül
        * Post: Ha el akarod küldeni az adatokat és engedni, hogy a felhasználó is elküldhesse
* `<input ... name ="fistname"`>
    * A name mezővel tudunk referálni egy másik oldalon
#### PHP
* `var_dump($_SERVER["REQUEST_METHOD"]);` - kiírja a változó típusát és értékét
    * Ha megnyitod az oldalt böngészőben (`GET`): `string(3) "GET" `
    * Ha egy űrlapot `POST`-tal küldesz: `string(4) "POST" `

## MCV model
* View - ezt látja
* Kontrollerrel irányítja
* Model 
    * ezzel interaktál a felhasználó (például a törpés adatbázisban törpetárnák táblája egy model)
    * visszaküldi a kontrollelnek a válaszokat pl. adat frissítés -> kontroller visszajelez, hogy ez sikerült
![MVC model](https://cdn.bap-software.net/2021/02/mvc-model.jpg)

