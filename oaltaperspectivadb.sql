-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: dec. 01, 2022 la 08:35 PM
-- Versiune server: 10.4.24-MariaDB
-- Versiune PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `oaltaperspectivadb`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `vkey` varchar(256) NOT NULL,
  `verified` int(11) NOT NULL DEFAULT 0,
  `createdate` datetime NOT NULL DEFAULT current_timestamp(),
  `ifAdmin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `email`, `password`, `vkey`, `verified`, `createdate`, `ifAdmin`) VALUES
(3, 'David', 'dudasdavid221@gmail.com', '0f96d17905c1c0f0670b5ce4c23f54ca', 'fe748384c7510c30801dc4816de85418', 1, '2022-10-21 00:00:00', 1),
(6, 'Dudas', 'david.dudas03@e-uvt.ro', '06d902ded9f3adddb13c041fbc631449', 'd97c07a946fa87e56513732f60e58e4c', 1, '2022-11-14 00:00:00', 0),
(7, 'ASD', 'dlkasjda.djksao@lk.com', '5963e110bad1cd82a0a407a48db9090c', 'b27691e2d9652dc2e412e2d3306f88f7', 0, '2022-11-27 14:58:31', 0);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `titlu` varchar(128) NOT NULL,
  `autor` varchar(128) NOT NULL,
  `text` text NOT NULL,
  `poster` text NOT NULL,
  `posterPosition` varchar(128) NOT NULL DEFAULT 'center center',
  `uploadedBy` varchar(256) NOT NULL,
  `uploadDate` datetime NOT NULL DEFAULT current_timestamp(),
  `views` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `articles`
--

INSERT INTO `articles` (`id`, `titlu`, `autor`, `text`, `poster`, `posterPosition`, `uploadedBy`, `uploadDate`, `views`) VALUES
(12, 'A trăi bine, a trăi corect', 'Dudas David', '<p>&nbsp; &nbsp; &nbsp;“<i>- […] monstruos mi se pare că noi, cei de la țară, căutăm să ne săturăm cât mai repede, ca să ne putem vedea de treabă, pe când aici ne străduim să nu ne săturăm repede și de aceea mâncăm stridii…</i></p><p><i>- Firește, se grăbi să spună Stepan Arkadici… Dar tocmai ăsta e scopul culturii: să-ți faci din orice o plăcere.</i></p><p><i>- Dacă ăsta e scopul culturii, prefer să fiu un sălbatic</i>.” - Lev Tolstoi, Anna Karenina</p><p>&nbsp;</p><p>&nbsp; &nbsp; &nbsp;În viață sunt două mari categorii de personalități: cei care își trăiesc viața ca și cum ar avea un bilet de aur pentru o singură zi în cel mai special parc de distracții, căutând să-și petreacă fiecare fracțiune de secundă cu cele mai desăvârșite amuzamente, încercând orice îndeletnicire posibilă, având un singur scop, acela de a atinge fericirea maximă; și cei pentru care viața este o sarcină, sau un traseu pe parcursul căreia ei trebuie să realizeze cât mai multe lucruri care au un folos oarecare. Cea de-a doua categorie s-ar putea zice că e formată în mare parte din stoici, care sunt detașați de planul sentimental al vieții, care aspiră spre obiective de rang superior, sau obiective care - în viziunea lor despre lume - au un sens nobil. Acestea par a fi niște luptători incapabili de sentimente, care se uită cu o privire care dictează respect în ochii vieții, și o intimidează; și poate unii chiar sunt așa, dar poate există un strat care mai întâi făcea parte din prima categorie, dar după o mulțime de eșecuri, în locul fericirii ca scop al vieții a pus munca grea - ba chiar suferința -, sau s-a vizionat într-o luptă cu viața, uitând complet de fericire și ajungând în cea de-a doua categorie.</p><p>&nbsp;</p><p>&nbsp; &nbsp; &nbsp;Firește, în viață nu e nimic alb sau negru și deci majoritate oamenilor fac parte și din prima, și din a doua categorie, dar sub forma unor raporturi diferite, și în funcție de acest raport oamenii pot aparține un pic mai mult uneia dintre categorii. Un caz interesant e o personalitate care pare a aparține celei de-a doua categorii, dar totuși să caute un fel sentiment de fericire pe care îl găsește pe urma stilului de viață care coincide cu categoria a doua. Cred că am putea numi acest “un fel de sentiment de fericire” mulțumire de sine, și astfel să nu mai fie un caz special, ci unul destul de comun. Dar închid aici această paranteză.</p><p>&nbsp;</p><p>&nbsp; &nbsp; &nbsp;În citatul cu care am început această scriere sunt înfățișate câte un caracter din fiecare categorie. Unul dintre personaje aspiră spre fericire și acțiunile lui oglindesc foarte bine acest lucru: trăiește în lux, are o slujbă care nu prea îl preocupă, este prieten cu toată lumea și tocmai își înșelase soția. Om de cultură. Celălalt preferă să refuze cultura prietenului său și să rămână în cea de a doua categorie. Acesta e preocupat și stresat și de detalii nesemnificative, dar aspiră la o viață bine trăită, sau mai bine zis: corect trăită. E o foarte mare diferență.</p><p>&nbsp;</p><p>&nbsp; &nbsp; &nbsp;Fiecare dintre aceste două personaje abordează altfel viața. Interesant e că niciunul dintre ei nu au o viață liniștită, sau fericită. Deși viața lui Stepan Arkadici pare a fi mai atrăgătoare din cauza luxului și talentului lui de a-și face timp și pentru sexul opus, amuzamentele lui au și consecințe neplăcute - cum ar fi scena în care soția lui află de aventurile de care nu trebuie să afle, după planurile lui Stepan Arkadici. Iar personajul celălalt își face atâtea griji, încât a ales să se ascundă la țară de problemele societății distinse.&nbsp;</p><p>&nbsp;</p><p>&nbsp; &nbsp; &nbsp;Lev Tolstoi a reușit să lumineze astfel ceea ce face diferența adevărată dintre cele două abordări ale vieții: a trăi o viață bună, sau a trăi o viață corectă.&nbsp;</p><p>&nbsp;</p><p>&nbsp; &nbsp; &nbsp;Nici prin gând nu-mi trece a afirma că nu e corect să fim fericiți, dar fericirea nu trebuie să fie scopul, ci consecința vieți pe care o trăim.&nbsp;</p>', '../images/stepanArkadiciWithlevin.jpg', 'center left', 'David', '2022-11-02 00:00:00', 1),
(13, 'Cafea, ceai', 'Slawomir Mrozek', '<p>&nbsp; &nbsp;- Cafea sau ceai? - întreba gospodina. Îmi place și una, și alta, iar acum sunt obligat să aleg. Așa vor ei să economisească.</p><p>&nbsp; &nbsp;Am fost învățat să fiu politicos, așa că nu am arătat cât de mult mă deranja această atitudine. Tocmai eram adânc implicat într-o discuție cu partenerul meu de masă, &nbsp; &nbsp;Profesorul, pe care încercam să-l fac să înțeleagă că idealismul este cel superior, nu materialismul, așa că m-am prefăcut că nici nu am auzit întrebarea.</p><p>&nbsp; &nbsp;- Ceai - răspunde fără nici o ezitare Profesorul. Un materialist idiot, normal că repede se și bagă în seamă.</p><p>&nbsp; &nbsp;- Dumneata? - mă întreba gospodina.&nbsp;</p><p>&nbsp; &nbsp;- Vă rog să mă iertați, trebuie să mă duc la toaletă.</p><p>&nbsp; &nbsp;Am pus batista pe masă, și m-am dus la closet. Nu aveam deloc nevoie să ies, dar am avut nevoie de timp să mă gândesc.</p><p>&nbsp; &nbsp;Dacă aleg cafea, nu primesc ceai, și vice-versa. Dacă omul se naște liber și egal, atunci asta se aplică la fel la cafea și ceai. Dacă aleg ceaiul, cafeaua va fi într-o situație defavorizată, și invers. Prin Drepturile Naturale ale cafelei și ale ceaiului e imposibil să iau decizia corectă.</p><p>&nbsp; &nbsp;Dar nu pot rămâne până la nesfârșit la closet, nu doar pentru că asta nu era Ideea Pură a Closetului, ci existent, adică un closet obișnuit.</p><p>&nbsp; &nbsp;Când m-am întors în sufragerie, toată lumea își sorbea ceaiul sau cafeaua. Era clar că au uitat de mine.&nbsp;</p><p>&nbsp; &nbsp;Asta m-a jignit până la sânge. Individul nu merită nici un fel de atenție sau toleranță. Nu urăsc nimic mai mult decât o societatea lipsită de suflet, de inimă, așa că în doi timpi și trei mișcări m-am și dus în bucătărie pentru a-mi solicita Drepturile Umane. Pe masă am observat samovarul cu cafetiera lângă și mi-am adus aminte că încă nu am rezolvat problema inițială, dacă doresc cafea sau ceai, adică ceai sau cafea. În mod firesc și una și alta - în loc de a mă împăca&nbsp; cu vreun compromis de orice natură. Fiindcă nu sunt doar bine educat, sunt și plin de tact, am rugat-o cât se putea de politicos pe gospodină, care se ocupa de treburile ei din bucătărie:</p><p>&nbsp; &nbsp;- Aș dori o jumătate de ceașcă de ceai și o jumătate de ceașcă de cafea.</p><p>&nbsp; &nbsp;Apoi am strigat:<br>&nbsp; &nbsp;- Și o bere!</p>', '../images/coffee_tea0.jpg', 'top right', 'David', '2022-11-14 00:00:00', 11),
(14, 'Dezvoltarea', 'Slawomir Mrozek', '<p>&nbsp; &nbsp; &nbsp;Trăiesc. Ca un mod de relaxare, îmi place să mă uit la gândacii de bucătărie. Separat nu sunt interesanți, însă împreună au un potențial extraordinar.</p><p>&nbsp; &nbsp; &nbsp;De exemplu, ieri eram în bucătărie, fumam, iar ăștia tot fug dintr-o parte în alta. Și prin fuga lor monotonă dintr-odată se organizează în&nbsp;<i>Cina cea de Taină&nbsp;</i>a lui Leonardo da Vinci. Coincidență? Nu cred. Leagea solidă a dezvoltării, dinamica lui creatoare de grupuri, evoluție. Ajunge dacă societatea aleargă de aici încolo și înapoi, deja și apar rezultate.</p><p>&nbsp; &nbsp; &nbsp;Problema e că s-au și despărțit repede. Leonardo nu a durat mai mult de o secundă. Mi-am propus să mă duc după un spray pentru gândaci și apoi să aștept până ce ajung la un nou rezultat, îi omor și îi fixez. Am spray-ul, stau la pândă.</p><p>&nbsp; &nbsp; &nbsp;Ăștia nu se opresc. De parcă ar fi apărut Manet,&nbsp;<i>Dejunul pe iarbă.&nbsp;</i>Le-am lăsat să continue. Progresul era vizibil pe planul dezvoltării, cred că acum au ajuns la impresionism. Le-aș fixa, dar am eu dreptul să opresc dezvoltarea? Impresionismul este o realizare serioasă, dar dacă îi opresc, cine știe unde nu mai ajung, dar ar fi ajuns.&nbsp;</p><p>&nbsp; &nbsp; &nbsp;Cubismul - să meargă.</p><p>&nbsp; &nbsp; &nbsp;Suprarealismul - să meargă.</p><p>&nbsp; &nbsp; &nbsp;Stau pregătit cu spray-ul în mână, dar nu acționez. Se știe că după ceva nou ceva și mai nou, adică după ceva bun ceva și mai bune trebuie să urmeze. Așa că, nu trebuie să-mi fac griji că au dispărut Leonardo cu cei ce l-au urmat, chiar din contră, asta-i dezvoltarea.</p><p>&nbsp; &nbsp; &nbsp;Deja ne regăsim în prezent. Cel mai superb. De exemplu Warhol. Dar nu mai e ultimul cuvânt, aproape-i clasic. Încă o tură, haideți, realizați ceva ce n-a mai fost. Iar eu aștept modernitatea cea mai la zi, adică ce e cel mai bun.</p><p>&nbsp; &nbsp; &nbsp;Dar ce se întâmplă, nu mai văd nimic, doar niște gândaci care tot fug de ici-colo. S-au obosit? Asta-i ceva decadență? Declinul artei? Mă uit cât se poate de concentrat, dar văd doar gândaci.</p><p>&nbsp; &nbsp; &nbsp;Vai, ce prost sunt! Cum aș putea să văd orice, dacă nu sunt destul de dezvoltat. Evident că deja au ajuns la secolul al XXV-lea (am trecut de miezul nopții, și aleargă destul de repede), iar eu sunt doar la sfârșitul secolului al XX-lea. Percepția nu poate să țină pasul cu ei, asta-i problema.</p><p>&nbsp; &nbsp; &nbsp;Am lăsat spray-ul pe masă și m-am dus la culcare. Revin peste cinci sute de ani.</p>', '../images/468c72921a3fed91f23a9984_rw_1920.jpg', 'center center', 'David', '2022-11-16 08:43:49', 1),
(15, 'Copacul', 'Slawomir Mrozek', '<p>&nbsp; &nbsp; &nbsp;Casa în care trăiesc se află lângă un drum. În cotul drumului e un copac.</p><p>&nbsp; &nbsp; &nbsp;Când eram copil, acest drum a fost unul de câmp, unul obișnuit, adică vara acoperit de praf, primăvara și toamna era noroios, iar iarna era acoperit de zăpadă, la fel ca și câmpia. Acum în fiecare anotimp e acoperit de asfalt.</p><p>&nbsp; &nbsp; &nbsp;Când eram tânăr, pe acest drum umblau care cu boi, dar numai din zori până la apusul soarelui. Îi știam pe toți, deoarece au fost de aici. Foarte rar vedeam trăsură de cai. Acum văd doar mașini, fără pauză, chiar și noaptea. Nu cunosc nici măcar unul. Apar de undeva, iar apoi dispar undeva.</p><p>&nbsp; &nbsp; &nbsp;Doar acest copac a rămas neschimbat, de primăvara până toamna stă verde. E pe suprafața mea de pământ.</p><p>&nbsp; &nbsp; &nbsp;Am primit o scrisoare de la Prefectură. “ Există prea multe șanse - se află în scrisoare - ca în orice moment să se întâmple un accident, ca o mașină să intre în copac, deoarece acesta se află în cotul drumului. Copacul trebuie tăiat.”</p><p>&nbsp; &nbsp; &nbsp;M-am întristat. Ce-i drept, copacul într-adevăr se află în cotul drumului, iar mașini sunt din ce în ce mai multe și din ce în ce mai rapide, mai sălbatice. În orice moment poate intra unul în copac.</p><p>Așa că mi-am luat pușca, m-am pus sub copac, și în momentul în care apare prima mașină, am și tras în el. Dar nu l-am nimerit. Dar m-au arestat și m-au dus în fața instanței.&nbsp;</p><p>&nbsp; &nbsp; &nbsp;Încercam să-i explic judecătorului că nu l-am nimerit doar pentru că nu mai văd așa de bine, dar dacă aș avea ochelari, n-aș mai greși. Dar degeaba.</p><p>&nbsp; &nbsp; &nbsp;Nu există dreptate în lume. Căci e adevărat că în orice moment o mașină poate intra în acel copac și îl poate răni. Dar dacă mi-ar da ei ochelari și muniție destulă, aș sta acolo, sub acel copac, cu cel mai mare drag, și aș avea grijă de el. De ce să-l tăi, dacă poți preveni și astfel accidentul?</p><p>Și nici nu ar costa mult. Doar nu pot fi o cheltuială prea mare gloanțele alea?</p>', '../images/R1.jpg', 'top center', 'David', '2022-11-16 09:05:30', 6),
(16, 'Pe nivele', 'Slawomir Mrozek', '<p>&nbsp; &nbsp; &nbsp;Cu foarte mare grijă am îndepărtat un nivel de cenușă vulcanică și am observat că se afla ceva sub acoperirea acesteia. Capul unui om cu ochelari. Datorită compoziției solului a fost conservat într-o condiție perfectă, de parcă ar fi fost turnat în ipsos.</p><p>&nbsp; &nbsp; &nbsp;- E Japonez - îmi zicea Profesorul, unul dintre cei mai buni arheologi ai secolului XXXXVI-lea.</p><p>&nbsp; &nbsp; &nbsp;L-am dezvăluit până la talie pe japonezul de odinioară. În mâna pietrificată ținea un aparat de fotografiat pietrificat.</p><p>&nbsp; &nbsp; &nbsp;- Uite dovada - spunea Profesorul. Dinastia Nikon, un model echipat cu automatizare de laser din secolul XXXI.</p><p>&nbsp; &nbsp; &nbsp;Cu un metru și jumătate sub japonez am descoperit un bărbat plinuț, cu pantaloni scurți, la fel pietrificat și tot cu un aparat de fotografiat.</p><p>&nbsp; &nbsp; &nbsp;- E Asai, din prima jumătate a secolului al XXII-lea.</p><p>&nbsp; &nbsp; &nbsp;- Deci, Japonez și asta.</p><p>&nbsp; &nbsp; &nbsp;- Nu, doar aparatul de fotografiat, dar omul nu. E din Europa, de undeva din zona Bavariei.</p><p>&nbsp; &nbsp; &nbsp;Cu trei metri mai jos am avut o nouă surpriză. Un autobuz. Cu etaj, cu toaletă chimică. Vreo șaizeci de artefacte stăteau la locurile lor, odinioară făceau poze în stil japonez cu aparatele lor de fotografiat din japonia. &nbsp; &nbsp; &nbsp;Busul, pasagerii, aparatele de fotografiat, toate s-au pietrificat. Și-a și frecat palmele Profesorul.</p><p>&nbsp; &nbsp; &nbsp;- Asta-i descoperirea cea mai serioasă din epoca Democratos. E dovada incontestabilă, că a existat civilizația scandinavă, sub acoperirea deșeurilor din zone Europei de Est.</p><p>&nbsp; &nbsp; &nbsp;- De unde știți?</p><p>&nbsp; &nbsp; &nbsp;- Simplu. Autobuzul are numărul de înmatriculare din Stockholm.</p><p>&nbsp; &nbsp; &nbsp;Am găsit pe cineva sub echipa de turiști, care, după credința Profesorului aparținea secolului al XX-lea și a venea din Detroit (Michigan, USA). A ajuns la această concluzie printr-o metodă deductivă. Era imposibil ca artefactul să fie identificat, așa că asta era singura posibilitate, dacă alta nu mai era. Iar pe de altă parte, datoriile internaționale și-au lăsat urma pe fața lui.</p><p>Americanul ținea și el în mână un aparat de fotografiat din Japonia.</p><p>&nbsp; &nbsp; &nbsp;- Aici mai e și o a treia mână - îi spun Profesorului.</p><p>&nbsp; &nbsp; &nbsp;- Unde?</p><p>&nbsp; &nbsp; &nbsp;- &nbsp;În buzunarul din spate.</p><p>&nbsp; &nbsp; &nbsp;Am îndepărtat cenușa. Mâna aparținea unui bărbat tânăr din zone Mediterana.</p><p>&nbsp; &nbsp; &nbsp;- Tipul tipic al culturii meridionale.&nbsp;</p><p>&nbsp; &nbsp; &nbsp;- După forma buzunarului, se poate vedea că s-a aflat în el un portofel. Toate astea rezultă că totul s-a întâmplat foarte repede. Ce părere aveți?</p><p>&nbsp; &nbsp; &nbsp;- Cred că au fost acoperiți de cenușă.</p><p>&nbsp; &nbsp; &nbsp;-&nbsp; Corect, erupțiile succesive ale Vezuviului la intervale adecvate. Mai întâi pe american, la sfârșitul secolului al XX-lea. Apoi pe fiecare unul după altul, ultima catastrofă având loc acum o mie cinci sute de ani.</p><p>&nbsp; &nbsp; &nbsp;- Dar ce se află sub acest american?</p><p>&nbsp; &nbsp; &nbsp;- Pompei. Un oraș antic din Imperiul Roman, dinaintea creștinismului, din secolul V. Erupția vulcanică a distrus orașul tot dinaintea erei noastre în secolul I. A fost descoperit în secolul al XVII-lea, iar deja în secolul XIX a fost o atracție turistică. Turistul american a fotografiat orașul Pompei în secolul XX, când s-a întâmplat catastrofa. După secole l-au descoperit pe acesta, iar acum el era atracția turistică. Apoi cenușa le-a acoperit și pe cei care făcea poze cu americanul. Au venit noi turiști, dar și ei au sfârșit sub cenușă. Printre ultimii turiști se afla acest japonez. De cincisprezece secole nu s-a mai erupt Vezuviul. Dar dumneata ce faci?!</p><p>&nbsp; &nbsp; &nbsp;- Fac poze. Pe acesta încă nu l-a fotografiat nimeni până acum. Voi fi primul!</p><p>&nbsp; &nbsp; &nbsp;Dar înainte ca profesorul să scoată aparatul de fotografiat din mâinile mele, primele bulgări de fum au decolat din Vezuviu.</p>', '../images/gradient-golden-linear-background_23-2148953816.webp', 'center right\r\n    ', 'David', '2022-11-24 12:21:26', 30);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `changepasswordkeys`
--

CREATE TABLE `changepasswordkeys` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `vkey` varchar(256) NOT NULL,
  `used` int(11) NOT NULL DEFAULT 0,
  `requestDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `changepasswordkeys`
--

INSERT INTO `changepasswordkeys` (`id`, `email`, `vkey`, `used`, `requestDate`) VALUES
(8, 'dudasdavid221@gmail.com', '7a4d3e32722b910a857e9657866a5606', 1, '2022-11-26 15:47:08'),
(20, 'dudasdavid221@gmail.com', 'dfc99d202599d96c7b3c66dcbc0551ef', 1, '2022-11-26 16:21:01'),
(21, 'dudasdavid221@gmail.com', '46e00f0ebd0cae066f4394ccdee1738e', 1, '2022-11-26 16:23:25'),
(22, 'dudasdavid221@gmail.com', '47eb6c3ce00a31d0c8573d2547a8cd6a', 1, '2022-11-26 16:24:47');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `comment` text NOT NULL,
  `articleId` int(11) NOT NULL,
  `commentDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `comments`
--

INSERT INTO `comments` (`id`, `username`, `comment`, `articleId`, `commentDate`) VALUES
(3, 'David', 'comment test 2', 11, '2022-11-04 00:00:00'),
(4, 'David', 'În opinia mea ar fi fost mai bine dacă autorul ar fi dezvoltat partea din mijloc.', 11, '2022-11-04 00:00:00'),
(5, 'David', 'În primul rând, ana nu mai are mere. În al doilea rând, ana nici nu avea mere. Ea e fan pere.', 11, '2022-11-04 00:00:00'),
(10, 'David', 'Se putea si mai rau', 11, '2022-11-06 00:00:00'),
(13, 'David', 'test', 16, '2022-11-27 14:55:34');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `logincookies`
--

CREATE TABLE `logincookies` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `cookieKey` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `logincookies`
--

INSERT INTO `logincookies` (`id`, `email`, `username`, `cookieKey`) VALUES
(9, 'dudasdavid221@gmail.com', 'David', 'cfd8e46a7f8127d292e9834a0eff0397'),
(10, 'david.dudas03@e-uvt.ro', 'Dudas', '9880c35db0db977a88796ae180af1099'),
(11, 'david.dudas03@e-uvt.ro', 'Dudas', 'aa4f21c841d99a71832d0cade2fd0cde'),
(12, 'dudasdavid221@gmail.com', 'David', '94c245771545e4af1434b0360144cdc5'),
(13, 'dudasdavid221@gmail.com', 'David', '3e0b4cf4041ae9c18adf278f1d6584c5'),
(14, 'dudasdavid221@gmail.com', 'David', '422fff80a6c90b2c2a5bd4446432b928'),
(15, 'dudasdavid221@gmail.com', 'David', '87144127e7849698e8ca02224dd4beb8'),
(16, 'dudasdavid221@gmail.com', 'David', '05d9156fd4ab821b7e060fb6bf728bcd'),
(17, 'dudasdavid221@gmail.com', 'David', 'df4efd9963c1d31837e5baa389375fcf'),
(18, 'dudasdavid221@gmail.com', 'David', 'b45b10625a417a76abf8d4eb80d1c3cc'),
(19, 'dudasdavid221@gmail.com', 'David', '4cd40468605457c3b8053f1e0ecbf564'),
(20, 'dudasdavid221@gmail.com', 'David', 'cda86fb777ec53222c07dfb06640bed0'),
(21, 'dudasdavid221@gmail.com', 'David', 'd6cf7b9af3a403401769e031db12eadc'),
(22, 'dudasdavid221@gmail.com', 'David', 'df38589731f9d52af81ff96f1ffc7c7a'),
(23, 'dudasdavid221@gmail.com', 'David', '35603ee9e6800613e9bd564810de4868');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `sent_articles`
--

CREATE TABLE `sent_articles` (
  `id` int(11) NOT NULL,
  `numeAutor` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `titluArticol` varchar(128) NOT NULL,
  `fisierArticol` varchar(128) NOT NULL,
  `dataTrimitere` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `sent_articles`
--

INSERT INTO `sent_articles` (`id`, `numeAutor`, `email`, `titluArticol`, `fisierArticol`, `dataTrimitere`) VALUES
(9, 'David Patric Dudas', 'dudasdavid221@gmail.com', 'Ana are mere', '../sentArticles/David Dudas - CV0.pdf', '2022-11-14 00:00:00'),
(10, 'Dudas David', 'dudasdavid221@gmail.com', 'Ana are mere', '../sentArticles/David Dudas - Scrisoare de intenția - Unicarm.pdf', '2022-11-15 00:00:00'),
(11, 'Dmitri Karamazov', 'dudasdavid221@gmail.com', 'Ana are mere', '../sentArticles/David Dudas - Cover Letter.pdf', '2022-11-15 00:00:00'),
(12, 'Dmitri Karamazov', 'dudasdavid221@gmail.com', 'Ana are mere', '../sentArticles/David Dudas - Cover Letter0.pdf', '2022-11-15 00:00:00'),
(13, 'David Patric Dudas', 'dudasdavid221@gmail.com', 'Ana are mere si nu vrea sa le imparta cu Maria, mama lor de fete plictisite', '../sentArticles/David Dudas - CV1.pdf', '2022-11-15 10:25:39');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `sent_messages`
--

CREATE TABLE `sent_messages` (
  `id` int(11) NOT NULL,
  `nume` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `mesaj` text NOT NULL,
  `dataTrimitere` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `sent_messages`
--

INSERT INTO `sent_messages` (`id`, `nume`, `email`, `mesaj`, `dataTrimitere`) VALUES
(1, 'David Patric Dudas', 'dudasdavid221@gmail.com', 'Test', '2022-11-08 00:00:00'),
(2, 'David Patric Dudas', 'david.dudas03@e-uvt.ro', 'dsa', '2022-11-14 00:00:00');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `suggestedarticles`
--

CREATE TABLE `suggestedarticles` (
  `id` int(11) NOT NULL,
  `titlu` varchar(258) NOT NULL,
  `poster` text NOT NULL,
  `link` text NOT NULL,
  `trimisDe` varchar(128) NOT NULL,
  `dataTrimitere` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `suggestedarticles`
--

INSERT INTO `suggestedarticles` (`id`, `titlu`, `poster`, `link`, `trimisDe`, `dataTrimitere`) VALUES
(4, 'Alegeri în SUA, ultimele rezultate', 'https://media.hotnews.ro/media_server1/image-2022-11-8-25891893-41-miza-alegerilor-jumatate-mandat-din-sua-prin-prisma-rusiei.jpg', 'https://www.hotnews.ro/stiri-international-25892097-alegeri-sua-cele-mai-recente-proiectii-ale-rezultatelor-arata-avantaj-pentru-republicani-camera-cursa-stransa-pentru-controlul-senatului.htm', 'David', '2022-11-09 12:05:34'),
(5, 'România primește un împrumut de 3 miliarde de dolari de la SUA pentru reactoarele 3 și 4 de la Cernavodă', 'https://media.hotnews.ro/media_server1/image-2022-03-25-25457271-41-reactoare-candu-cernavoda.jpg', 'https://economie.hotnews.ro/stiri-energie-25892462-romania-primeste-imprumut-3-miliarde-dolari-sua-pentru-reactoarele-3-4-cernavoda.htm', 'David', '2022-11-09 13:23:55'),
(6, 'Ministrul de externe al Belarusului, Vladimir Makei, a murit „subit”, anunță presa de stat Citeşte întreaga ştire: Ministrul de externe al Belarusului, Vladimir Makei, a murit „subit”, anunță presa de stat', 'https://mediacdn.libertatea.ro/unsafe/1260x708/smart/filters:format(webp):contrast(8):quality(75)/https://static4.libertatea.ro/wp-content/uploads/2022/11/10545433.jpg', 'https://www.libertatea.ro/stiri/vladimir-makei-ministrul-de-externe-belarus-a-murit-4360389', 'David', '2022-11-27 16:10:50'),
(7, 'Ministrul de externe al Belarusului, Vladimir Makei, a murit „subit”, anunță presa de stat', 'https://mediacdn.libertatea.ro/unsafe/1260x708/smart/filters:format(webp):contrast(8):quality(75)/https://static4.libertatea.ro/wp-content/uploads/2022/11/10545433.jpg', 'https://www.libertatea.ro/stiri/vladimir-makei-ministrul-de-externe-belarus-a-murit-4360389', 'David', '2022-11-27 16:11:37'),
(8, 'Ludovic Orban: „Nu exclud ca PNL s-o susțină pe Gabriela Firea pentru Primăria Capitalei”', 'https://mediacdn.libertatea.ro/unsafe/1260x708/smart/filters:format(webp):contrast(8):quality(75)/https://static4.libertatea.ro/wp-content/uploads/2022/11/hepta5688213.jpg', 'https://www.libertatea.ro/stiri/ludovic-orban-nu-exclud-pnl-sustine-gabriela-firea-primaria-capitalei-nicolae-ciuca-chin-imens-premier-4359784', 'David', '2022-11-27 16:14:04');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `changepasswordkeys`
--
ALTER TABLE `changepasswordkeys`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `logincookies`
--
ALTER TABLE `logincookies`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `sent_articles`
--
ALTER TABLE `sent_articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `sent_messages`
--
ALTER TABLE `sent_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `suggestedarticles`
--
ALTER TABLE `suggestedarticles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pentru tabele `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pentru tabele `changepasswordkeys`
--
ALTER TABLE `changepasswordkeys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pentru tabele `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pentru tabele `logincookies`
--
ALTER TABLE `logincookies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pentru tabele `sent_articles`
--
ALTER TABLE `sent_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pentru tabele `sent_messages`
--
ALTER TABLE `sent_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pentru tabele `suggestedarticles`
--
ALTER TABLE `suggestedarticles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
