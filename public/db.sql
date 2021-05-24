--
-- Struttura tabella Articoli
--
CREATE TABLE Ricette (
    ID int NOT NULL AUTO_INCREMENT,
    Nome varchar(150) NOT NULL,
    Difficolta varchar(50) NOT NULL,
    Tempo varchar(50) NOT NULL,
    Immagine varchar(50) NOT NULL,
    AltImmagine varchar(150) NOT NULL,
    Ingredienti text NOT NULL,
    Testo TEXT NOT NULL,
    Hashtag varchar(150) NOT NULL,
    PRIMARY KEY (ID)
);

CREATE TABLE Login (
    Username VARCHAR(150) NOT NULL,
    Password VARCHAR(150) NOT NULL,
    PRIMARY KEY (Username, Password)
);
INSERT INTO Login (Username, Password) VALUES 
("21232f297a57a5a743894a0e4a801fc3","21232f297a57a5a743894a0e4a801fc3");



INSERT INTO Ricette(Nome,Difficolta,Tempo,Immagine,AltImmagine,Ingredienti,Testo,Hashtag) VALUES
("Crostata con panna cotta","Media","2 ore","./public/img/upload/CrostataPannaCotta.jpg",
"Crostata di panna cotta con frutti di bosco","125g Zucchero\n125g Burro\n1 Uovo\n240g Farina\n5g Lievito\npizzico Sale\naroma Limone o Vaniglia\n250ml Panna fresca\n50ml Latte\n4g Gelatina in fogli\nEstratto di Vaniglia\nFrutti di bosco",
"Per il guscio di frolla lavorare il burro morbido con lo zucchero, aggiungere poi l’uovo e l’aroma scelto. Unire quindi la farina, il sale e il lievito e lavorare bene con le mani creando un composto compatto che potrebbe risultare morbido, non preoccupatevi, avvolgerlo nella pellicola e lasciarlo riposare in frigo per 1 ora, meglio 2. 
Una volta rassodata stendere la pasta e inserirla in una teglia imburrata e infarinata, o rivestita di carta forno. Bucherellare la base e riempire il guscio con carta forno e fagioli secchi per una cottura in bianco. Cuocere in forno statico preriscaldato a 180° per circa 20 minuti. 
Mentre il guscio raffredda preparare la panna cotta: mettere in ammollo la gelatina in abbondante acqua fredda e nel frattempo mettere a scaldare la panna e il latte con la vaniglia e lo zucchero. Scaldare a fuoco lento fino a che lo zucchero non sarà sciolto. A questo punto lasciare raffreddare leggermente il composto prima di inserire la gelatina mescolando bene. 
Con un cucchiaio versare un sottile strato di panna cotta sulla base di frolla raffreddata e mettere in frigo per 10 minuti circa a solidificare. Aggiungere poi delicatamente la restante panna cotta e lasciare raffreddare a temperatura ambiente prima di riporla in frigo per circa 3 ore. Decorare con frutta fresca la superficie o se preferite con una marmellata o salsa al cioccolato.",
"torta, crostata, panna cotta, frutti di bosco, estate, frigorifero");

INSERT INTO Ricette(Nome,Difficolta,Tempo,Immagine,AltImmagine,Ingredienti,Testo,Hashtag) VALUES
("Pastiera","Difficile","2 ore","./public/img/upload/Pastiera.jpg","Pastiera napoletana","1 Uovo\n125g Burro\n125g Zucchero\n240g Farina\n5g Lievito\nVaniglia\npizzico Sale\n200g Grano cotto\n
80ml + 20ml Latte\n25g Burro\nScorza Limone e Arancia\n200g Ricotta (di pecora)\n180g Zucchero\n2 Uova + 1 Tuorlo\n50g Canditi\n20ml Miele\nAroma Arancia","Preparare la frolla unendo al burro morbido lo zucchero e l’uovo. 
Aggiungere poi la farina, il lievito e il sale e avvolgere il panetto ottenuto nella pellicola. Lasciare riposare in frigo. Preparare ora la crema di grano unendo in un pentolino il grano, 80ml di latte, il burro e la scorza di arancia e limone. 
Portare a bollore a fuoco lento schiacciando con una forchetta il grano. Lasciare raffreddare. Preparare poi la crema di ricotta lavorando la ricotta con lo zucchero e lasciandola riposare in frigo per un ora. Dopo un ora riprendere la crema di grano e frullarla grossolanamente con il frullatore ad immersione. 
Aggiungere alla ricotta la crema di grano, le uova, il miele, i canditi e l’aroma all’arancia. Stendere ora la frolla e rivestire uno stampo da 22 cm tenendo un bordo abbastanza alto. Bucherellare la base di frolla e versarci il ripieno. Creare le strisce per il reticolo superiore. 
La tradizione prevede che le strisce siano 7, 4 sotto e 3 sopra incrociate. Cuocere in forno statico preriscaldato a 180° per 50/55 minuti nel ripiano più basso del forno. Lasciare raffreddare prima di sformare e servire la pastiera, meglio ancora se la lasciare riposare in frigo qualche ora. Spolverizzare con lo zucchero a velo e servire.",
"pastiera, torta, napoli, frolla, ricotta, canditi, grano");

INSERT INTO Ricette(Nome,Difficolta,Tempo,Immagine,AltImmagine,Ingredienti,Testo,Hashtag) VALUES
("Torta Mousse al caffè","Media","1 ora","./public/img/upload/Mousse.PNG",
"Torta Mousse al caffè","225g Cioccolato fondente\n225g Burro\n225g Zucchero(100g semolato e 125 di canna)\n135g Farina\n15g Cacao\n1 pizzico Sale\n4 uova\nMezzo cucchiaino di liveto\n350ml Latte\n120g Zucchero\n25g Amido di mais\n3 Cucchiai di caffè solubile",
"Sciogliere il cioccolato con il burro e far raffreddare leggermente. 
Nel frattempo montare con le fruste le uova con lo zucchero fino a creare un composto chiaro e spumoso.
Unire il cioccolato alle uova e unire la farina, il cacao e il lievito setacciati e il sale. 
Mescolare bene e versare l’impasto in uno stampo quadrato da 20x20cm o in uno rotondo da 22/24cm ricoperto di carta forno.
Cuocere in forno statico preriscaldato a 180° per 30 minuti, asl termine dei quali si sarà formata la tipica crosticina in superficie. 
Sfornare e lasciare raffreddare completamente. Nel frattempo preparare la mousse al caffè mettendo ad ammollare in acqua fredda i fogli di gelatina e a scaldare il latte. 
In una ciotola unire il caffè, lo zucchero, l’amido di mais e aggiungere poco alla volta il latte per non creare grumi. 
Riportare il tutto sul fuoco e far addensare continuando a mescolare. Lasciare raffreddare un po’ la crema e nel frattempo montare a neve la panna. 
Aggiungere la gelatina alla crema intiepidita e farla sciogliere bene. una volta completamente raffreddata la crema aggiungere la panna delicatamente e versare il la mousse ottenuta sopra alla base di brownies ora ben fredda. 
Mettere in frigo a solidificare per almeno 3 ore. A piacere prima di servire spolverizzare la superficie con del cacao amaro.","torta, mousse, caffè, estiva");

INSERT INTO Ricette(Nome,Difficolta,Tempo,Immagine,AltImmagine,Ingredienti,Testo,Hashtag) VALUES
("French Toast","Facile","30 minuti","./public/img/upload/Toast.PNG","French Toast","2 Fette di Pan Brioche o Pane in cassetta con la crosta\n25ml Latte\n1 Tuorlo\n1 Pizzico cannella\n1 Pizzico sale(facoltativo)\nBurro q.b.\nSciroppo d'acero\nFrutta fresca\nMarmellata",
"In una ciotola unire il tuorlo, il latte, la cannella e a piacere il sale. 
In un pentolino mettere a sciogliere una noce di burro. 
Immergere le fette di pane nel composto di latte e uovo, da entrambi i lati, e metterle sulla padella calda. 
Cuocere per circa 3-4 minuti per ogni lato, fino a quando saranno ben dorati. 
Servire con frutta fresca e sciroppo d'acero o con qualsiasi cosa vogliate. 
Buona colazione alternativa, e un po’ americana.", "francese, colazione, toast, frutta, veloce, salutare");

INSERT INTO Ricette(Nome,Difficolta,Tempo,Immagine,AltImmagine,Ingredienti,Testo,Hashtag) VALUES
("Castagnole di carnevale","Facile","1 ora","./public/img/upload/Castagnole.PNG","Castagnole","40g Brurro\n50g Zucchero\n2 Uova\n200g Farina\n8g Lievito\nScorza di arancia e/o limone\n1 Cucchiaio di grappa o rum\n1 Pizzico di sale\nOlio di semi per friggere",
"In una ciotola lavorare il burro morbido con lo zucchero fino ad ottenere un composto spumoso. 
Aggiungere le uova, il liquore e la scorza di limone o arancia e mescolare bene. 
Unte quindi la farina, il lievito e il pizzico di sale e lavorare il composto prima con un cucchiaio in legno poi con le mani. 
Se dovesse risultare appiccicoso non aggiungete farina ma lasciatelo riposare in frigorifero per qualche minuto. 
Scaldare l’olio di semi fino a 150-160°C, se non avete un termometro utilizzare il retro di un cucchiaio di legno: sarà pronto quando attorno al cucchiaio si formeranno delle bollicine. 
Formare delle palline grandi quanti una nocciola e cuocerle nell’olio ben caldo per circa 5 minuti, fino a che non sono belle durate. Asciugare bene con carta assorbente e una volta intiepidite spolverare a piacere con zucchero a velo. ", "carnevale, fritto, festa, tradizionale");