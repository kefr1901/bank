# bankSystemet ska ha stöd för olika användare, säg 5-10 stycken. Ni behöver dock inte göra någon inloggning utan när man går in på sidan kan ni se till att ni redan är inloggade som en av era användare, typ som att ni har gått igenom en inloggning. Ni får lov att spara den aktuella användaren i en session eller liknande om det underlättar.
[X]Ett konto får inte ha negativ balans, dvs saldot måste alltid vara minst 0.

[X] Varje användare ska ha ett kono med en egen balans. Konton och användare ska ligga i olika tabeller i databasen. 

[X] Er inloggade användare ska kunna föra över pengar från sitt konto till en annan användares konto. Anävndartabellen behöver ha det data ni behöver för att kunna göra en överföring, t ex kontonummer, mobilnr (om ni har tänkt göra en Swish-överföring) eller liknande.

[X] En överföring måste felkontrolleras, t ex att mottagaren finns, att det finns tillräckligt med pengar på avsändarens konto osv.
Om ett fel uppstår (t ex att det saknas pengar) ska ni kasta ett exception. Ni måste också kunna hantera exceptions med en try ... catch så att skriptet inte dör.

[X] Ni behöver inte visa upp ett kontoutdrag eller liknande på sidan, men i databasen ska man kunna se alla transaktioner som involverar ett visst konto, t ex att Kalle har fått x kr från Olle vid tidpunkten y eller skickat pengar till Lisa vid tidpunkten z. Det som måste finnas på varje rad är alltså sändarens kontonr, mottagarens kontonr, tidpunkt, belopp och ev valuta.

[X] Allt som rör databasen (främst överföringar, tänker jag då) ska ske med hjälp av API-anrop och PDO.

[X] Ni ska visa att ni kan använda AJAX, t ex genom att hämta en mottagarlista med AJAX, göra API-anropet som hanterar en överföring eller liknande.

[X] Ni ska visa att ni kan använda dependency injection. Om ni t ex behöver ett databasobjekt för att hämta användare eller skapa en överföring så får det inte finnas dependencies i klassen utan det måste lösas genom att man t ex skickar med databasobjektet till konstruktorn. Typ:
public function __construct(Database $db) {
  // ...
}