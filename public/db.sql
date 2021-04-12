--
-- Struttura tabella Articoli
--
CREATE TABLE Ricette (
    ID int NOT NULL AUTO_INCREMENT,
    Nome text NOT NULL,
    Difficolta text NOT NULL,
    Tempo text NOT NULL,
    Immagine text NOT NULL,
    AltImmagine varchar(150) NOT NULL,
    Ingredienti text NOT NULL,
    Testo TEXT NOT NULL,
    Hashtag TEXT NOT NULL,
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
("Crostata con panna cotta","Media","5 ore","./public/img/upload/CrostataPannaCotta.jpg",
"Crostata di panna cotta con frutti di bosco","125g Zucchero\n125g Burro\n1 Uovo\n240g Farina\n5g Lievito\npizzico Sale\naroma Limone o Vaniglia\n250ml Panna fresca\n50ml Latte\n4g Gelatina in fogli\nEstratto di Vaniglia\nFrutti di bosco",
"Per il guscio di frolla lavorare il burro morbido con lo zucchero, aggiungere poi l’uovo e l’aroma scelto. Unire quindi la farina, il sale e il lievito e lavorare bene con le mani creando un composto compatto che potrebbe risultare morbido, non preoccupatevi, avvolgerlo nella pellicola e lasciarlo riposare in frigo per 1 ora, meglio 2. 
Una volta rassodata stendere la pasta e inserirla in una teglia imburrata e infarinata, o rivestita di carta forno. Bucherellare la base e riempire il guscio con carta forno e fagioli secchi per una cottura in bianco. Cuocere in forno statico preriscaldato a 180° per circa 20 minuti. 
Mentre il guscio raffredda preparare la panna cotta: mettere in ammollo la gelatina in abbondante acqua fredda e nel frattempo mettere a scaldare la panna e il latte con la vaniglia e lo zucchero. Scaldare a fuoco lento fino a che lo zucchero non sarà sciolto. A questo punto lasciare raffreddare leggermente il composto prima di inserire la gelatina mescolando bene. 
Con un cucchiaio versare un sottile strato di panna cotta sulla base di frolla raffreddata e mettere in frigo per 10 minuti circa a solidificare. Aggiungere poi delicatamente la restante panna cotta e lasciare raffreddare a temperatura ambiente prima di riporla in frigo per circa 3 ore. Decorare con frutta fresca la superficie o se preferite con una marmellata o salsa al cioccolato.",
"torta, crostata, panna cotta, frutti di bosco, estate, frigorifero");

