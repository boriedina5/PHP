# 🧩 PHP Regex – Gyakorló Feladatok

Ez a feladatsor 30 különböző feladatból áll, amelyek a **reguláris kifejezések (Regex)** használatát gyakoroltatják PHP-ban.  
A feladatok célja, hogy megtanuld, hogyan tudsz **mintákat keresni**, **szöveget validálni**, **adatokat kinyerni** és **átalakítani** reguláris kifejezések segítségével.

---

## 📘 Feladatleírás

A `Regex.php` fájlban található minden függvény helyét előkészítettük.  
A te feladatod, hogy **mindegyik függvényt megírd**, a leírás alapján.  
A `tests/RegexTest.php` automatikusan ellenőrzi a megoldásaidat.

---

### 🟢 Könnyű (1–10)

1. **isValidEmail($email)**  
   Ellenőrizd, hogy a megadott szöveg e-mail cím formátumú-e.  
   Pl.: `valaki@gmail.com` → true  

2. **containsNumber($str)**  
   Térjen vissza `true`-val, ha a szöveg tartalmaz számjegyet.  

3. **containsOnlyLetters($str)**  
   Igazat adjon, ha a szöveg csak betűket tartalmaz (nincs benne szám, szóköz, írásjel).  

4. **isUppercase($str)**  
   Igaz, ha a szöveg minden karaktere nagybetű.  

5. **isLowercase($str)**  
   Igaz, ha minden karakter kisbetű.  

6. **startsWithDigit($str)**  
   Igaz, ha a szöveg első karaktere szám.  

7. **endsWithPunctuation($str)**  
   Igaz, ha a szöveg írásjellel (`.`, `!`, `?`) végződik.  

8. **containsWord($str, $word)**  
   Ellenőrizd, hogy a szöveg tartalmazza-e a megadott szót (szóhatárokat figyelembe véve).  

9. **replaceSpacesWithUnderscore($str)**  
   Cseréld le a szóközöket aláhúzásra.  

10. **removeDigits($str)**  
    Távolíts el minden számjegyet a szövegből.  

---

### 🟡 Közepes (11–20)

11. **extractNumbers($str)**  
    Gyűjtsd ki a szövegben található számokat egy tömbbe.  

12. **countWordsStartingWithA($str)**  
    Számold meg, hány szó kezdődik `A` vagy `a` betűvel.  

13. **hasPhoneNumber($str)**  
    Ellenőrizd, hogy a szöveg tartalmaz-e magyar telefonszámot  
    (pl. `+36 30 123 4567` vagy `06301234567`).  

14. **isPostalCode($str)**  
    Igaz, ha a szöveg pontosan 4 számjegyből áll (pl. `1234`).  

15. **extractHashtags($str)**  
    Találd meg az összes `#`-tel kezdődő szót (pl. `#php`, `#regex`).  

16. **extractEmails($str)**  
    Szedd ki az összes e-mail címet a szövegből.  

17. **validateUsername($str)**  
    Engedélyezett: betűk, számok, aláhúzás, 3–16 karakter hosszúságban.  

18. **replaceMultipleSpaces($str)**  
    Több egymást követő szóközt cserélj le egyetlen szóközre.  

19. **extractDomain($email)**  
    E-mail címből csak a domain részt (`@` utáni) adja vissza.  

20. **maskEmail($email)**  
    E-mail cím elejét cseréld csillagokra.  
    Pl.: `john@example.com` → `****@example.com`.  

---

### 🔴 Nehéz (21–30)

21. **isValidIPv4($ip)**  
    Ellenőrizd, hogy a megadott IP cím érvényes IPv4 cím-e.  

22. **isValidDate($date)**  
    Ellenőrizd, hogy a formátum `YYYY-MM-DD`, és valós dátum.  

23. **extractURLs($str)**  
    Találd meg az összes URL-t a szövegben (pl. `https://valami.hu`).  

24. **findDuplicateWords($str)**  
    Találd meg azokat a szavakat, amelyek egymás után kétszer szerepelnek (pl. „hello hello”).  

25. **isStrongPassword($password)**  
    Legalább 8 karakter, tartalmaz kisbetűt, nagybetűt, számot és speciális karaktert.  

26. **extractHTMLTags($str)**  
    Listázd ki a szövegben előforduló HTML tag neveket (`<div>`, `<p>`, stb.).  

27. **removeHTMLTags($str)**  
    Távolíts el minden HTML taget a szövegből (csak a szöveg maradjon).  

28. **splitCSVLine($str)**  
    Törd fel egy CSV sort értékekre (vesszők mentén, de figyelj az idézőjelekre).  

29. **validateHexColor($color)**  
    Ellenőrizd, hogy a szöveg hexadecimális színkód (pl. `#FF00FF` vagy `#ABC`).  

30. **extractQuotedStrings($str)**  
    Találd meg az összes idézőjel közötti szöveget (pl. `"alma"`, `'körte'`).  

---

## ⚙️ Használati útmutató

### 1. Projekt letöltése GitHub-ról

Kapsz egy GitHub Classroom linket a tanártól.  
Nyisd meg, és hozd létre a saját repository-dat.  
Klónozd le a saját gépedre:

```sh
git clone https://github.com/felhasznalonev/sajat-repo.git
cd sajat-repo
```
A saját mappába a klónozás után külön be kell lépni (mappa megnyitása) vagy a parancssorban a CD paranccsal megbizonyosodni róla, hogy jó helyen vagyunk.

### 2. Függőségek telepítése (Composer)
A projekt a Composer csomagkezelőt használja a PHPUnit telepítésére.

Windows esetén töltsd le innen:
👉 https://getcomposer.org/download/

MacOS esetén telepítheted Homebrew (külön kell telepíteni) segítségével:
👉 brew install composer

Ezután a projekt könyvtárában futtasd:
```sh
composer install
```

### 3. Feladatok megoldása
Nyisd meg a src/Loops.php fájlt.
Keresd meg a // TODO részeket, és írd meg a függvények megoldását.

Példa:
```php
public function forSum(int $n): int {
    $sum = 0;
    for ($i = 1; $i <= $n; $i++) {
        $sum += $i;
    }
    return $sum;
}
```

### 4. Tesztelés (PHPUnit)

Futtasd a teszteket, hogy lásd melyik feladat jó:
```sh
php vendor/bin/phpunit
```
Ha minden helyes, zöld ✓ jelet fogsz látni.
Ha valami nem jó, piros × jelet és hibát kapsz, ami segít kitalálni, mi hiányzik.

### 5. Feltöltés GitHub-ra

Ha kész vagy a megoldással:
```sh
git add .
git commit -m "Megoldottam néhány feladatot"
git push origin main
```