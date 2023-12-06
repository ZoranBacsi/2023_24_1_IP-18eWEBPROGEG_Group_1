# PHP Csoport ZH

Megszereztétek kedvenc gyakorlatvezetőtök YouTube lejátszási előzményeit. Ezt szeretnétek igényes formátumban megjeleníteni.

Kijelző:
     [] Töltsd be a data.json JSON fájlt (1 pont), VAGY használd az alábbi beágyazott tömböt. ( 0,5 pont )
     [] Az összes dal megjelenítése egy táblázatban, év szerint növekvő sorrendben (1 pont)
     [] A táblázat utolsó sorában számold ki a "Teljes játékidőt" egy egyéni funkcióval, és jelenítd meg nullákkal kiegészítve a következő formátumban: 'mm:ss' ( 1,5 pont )
     [] A "Retro Songs" részben jelenítsd meg az 1990 előtt megjelent összes dalt. ( 1 pont )

Űrlapkezelés és ellenőrzés:
     [] Legyen az űrlap állapottartó (a beszúrt értékeket a sikeres mentésig meg kell őrizni) ( 1 pont )
     [] Hajtsd végre a következő ellenőrzéseket:
         [] Minden mező kitöltése kötelező (1 pont)
         [] Az előadónak legalább 2 karakterből, a címnek pedig legalább 1 karakterből kell állnia (0,5 pont)
         [] A hossznak érvényes időbélyegzőnek kell lennie (1 pont)
         [] Az évnek 1860 és 2023 között kell lennie ( 1 pont )
         [] A felhasználó mentheti a dalt, ha nem jelenik meg egyetlen hiba sem, az alábbiak figyelembe vételével:
             [] A dal mentése után jelenjen meg automatikusan az új dal a táblázatban, és a teljes lejátszási idő automatikusan frissüljön, és ha az év 1990 alatt van, akkor a dal kerüljön fel a retro dalok listájára (0,5 pont)
             [] A dal a data.json fájlba kerüljön mentésre a hozzáadás után (0,5 pont)
             [] Az összes mező és tároló ürüljön ki a hozzáadás után (0,5 pont)
         [] Minden hiba helyesen jelenjen meg minden beviteli mező után (0,5 pont)


SZABÁLYOK:
1. Minden feladat megoldására 45 perc áll rendelkezésére
2. Az utolsó 5 perc a megoldás feltöltésére áll rendelkezésre. Az 50 perc túllépése után nincs lehetőség a megoldás feltöltésére
3. A megoldást a Canvason keresztül kell feltölteni tömörített mappaként a következő formátumban: '<neptun_id>-<név>-phpGroupTest.zip'.
4. Bármilyen emberi vagy AI segítség használata tilos!
5. A megoldások szigorú plágiumellenőrzésen esnek át – a feltűnően hasonló megoldások szerzői kizárhatók az értékelésből!
6. Ebben a tesztben összesen 10 pont szerezhető, minden részfeladat tökéletes megoldása az ott megadott pontot éri! Nincs minimum elérendő pontszám.

Az alábbi nyilatkozat kitöltése kötelező:

<Hallgató neve> 
<Neptun kódja> 
Webprogramozás - számonkérés
Ezt a megoldást a fent írt hallgató küldte be és készítette a Webprogramozás kurzus számonkéréséhez.
Kijelentem, hogy ez a megoldás a saját munkám. Nem másoltam vagy használtam harmadik féltől 
származó megoldásokat. Nem továbbítottam megoldást hallgatótársaimnak, és nem is tettem közzé. 
Az Eötvös Loránd Tudományegyetem Hallgatói Követelményrendszere 
(ELTE szervezeti és működési szabályzata, II. Kötet, 74/C. §) kimondja, hogy mindaddig, 
amíg egy hallgató egy másik hallgató munkáját - vagy legalábbis annak jelentős részét - 
saját munkájaként mutatja be, az fegyelmi vétségnek számít. 
A fegyelmi vétség legsúlyosabb következménye a hallgató elbocsátása az egyetemről.

Minta Tömb:

[
    [
        "artist" => "Bon Jovi",
        "title" => "It's my life",
        "length" => "3:44",
        "year" => "2000",
    ],
    [
        "artist" => "Bon Jovi",
        "title" => "Livin' on a prayer",
        "length" => "4:11",
        "year" => "1986"
    ],
    [
        "artist" => "AC/DC",
        "title" => "Thunderstruck",
        "length" => "4:52",
        "year" => "1990"
    ],
    [
        "artist" => "AC/DC",
        "title" => "Back in black",
        "length" => "4:14",
        "year" => "1980"
    ],
    [
        "artist" => "AC/DC",
        "title" => "Highway to hell",
        "length" => "3:29",
        "year" => "1979"
    ],
    [
        "artist" => "John Denver",
        "title" => "Take me home, country roads",
        "length" => "3:17",
        "year" => "1971"
    ]
]
