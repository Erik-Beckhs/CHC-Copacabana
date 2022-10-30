SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS dbcopa;

USE dbcopa;

DROP TABLE IF EXISTS agencia;

CREATE TABLE `agencia` (
  `idinst` int(11) NOT NULL,
  PRIMARY KEY (`idinst`),
  CONSTRAINT `fk_idag` FOREIGN KEY (`idinst`) REFERENCES `institucion` (`idinst`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO agencia VALUES("13");
INSERT INTO agencia VALUES("14");
INSERT INTO agencia VALUES("18");



DROP TABLE IF EXISTS atractivo;

CREATE TABLE `atractivo` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ubicacion` varchar(300) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `dificultad` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `descripcion` varchar(1000) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `temporadaideal` varchar(400) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `img` varchar(300) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `llegada` varchar(300) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `idcat` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_icat` (`idcat`),
  CONSTRAINT `fk_icat` FOREIGN KEY (`idcat`) REFERENCES `categoria` (`idcat`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO atractivo VALUES("1","Observatorio Astronómico (Horca del Inca)","Cerro Seroka - Copacabana","Alta","También denominada “Pachataqa”, se encuentra a 500 metros al sur del pueblo de Copacabana, en el cerro Kesanani. Un monumento lítico, enigmático de antigüedad precolombina, y mal denominado “Horca del Inca”, por los españoles, ya que no comprendieron el significado de este monumento, la denominación más cercana, ya mencionada Pachataqa o “lugar donde se mide el tiempo”. Denominada así, porque es un observatorio astronómico, con todos los elementos que permitían verificar los solsticios, y equinoccios. De acuerdo a verificaciones arqueológicas  tendría una antigüedad que data del año 1.764 a. de C.  Pachataqa, es un conjunto labrado en roca, que comprende dos bloques independientes verticales, el mayor mide 6 metros, y una sola piedra, a manera de travesaño.","Todo el año","horca.jpg","Dada la cercanía del atractivo, se recomienda realizar una caminata al lugar, dirigirse al cerro Seroka en las afueras de la zona Wajrapila en la zona norte de la población","1","1");
INSERT INTO atractivo VALUES("4","Isla del Sol","Lago Titicaca Provincia Manco Kapaz","Baja","La Isla del Sol es un destino de gran belleza con terrazas de cultivos y el lago azul de fondo. Además es un sitio muy especial ya que se considera el lugar donde se inició el imperio Inca. Cuenta la leyenda que en dicha isla, Manco Capac y su mujer, Mama Ocllo, iniciaron la dinastía Inca y desde allí partieron a fundar Cuzco.","Todo el año","ISLA.jpg","La Isla del Sol está ubicada en el Lago Titicaca, a una hora y media de navegación desde Copacabana. Las lanchas y botes parten desde la playa del centro del pueblo y llegan al embarcadero de la isla.  El precio del viaje se puede negociar y depende en parte de la cantidad de personas que viajen a l","1","1");
INSERT INTO atractivo VALUES("5","Iglesia de Copacabana","Plaza 2 de Febrero - Copacabana","Baja","La Iglesia de Copacabana, ubicada en la plaza 2 de febrero fué construida con un estilo renacentista en 1550 sobre los periodos de una “huaca” o lugar sagrado, pero la construcción actual data de 1805. Es un conjunto arquitectónico que conserva la Capilla de Indios para el oficio al aire libre y en el atrio cuatro capillas menores o miserere. En su interior las bóvedas son de cruz, destacando el altar con un retablo dorado que alberga la efigie de la Virgen de la Candelaria, de maguey y terminada en estuco, obra tallada por Francisco Tito Yupanqui en 1583 quien era descendiente del Inca Huayna Capac. En 1949 recibió el nombramiento de basílica y en 1913 se erigió el actual camarín de la Virgen .","Todo el año","rosario.jpg","La Iglesia se encuentra a un lado de la plaza principal del santuario de Copacabana","0","1");
INSERT INTO atractivo VALUES("6","Basilica de Copacabana","Plaza 2 de Febrero","Baja","La Basilica mayor del santuario de Copacabana es un patrimonio nacional","Todo el año, preferentemente Febrero, Mayo, Julio, Agosto, Noviembre y Diciembre","a4.jpg","Dada la significativa presencia, basta con ubicarse en la plaza principal del Santuario","0","2");
INSERT INTO atractivo VALUES("7","Museo Kusijata","Comunidad Kusijata a 5 Km de Copacabana","Baja","El museo de Kusijata muestra a sus visitantes importantes reliquias encontradas en el lugar, chullpas, ceramicas y demas pertenecientes a una civilizacion anterior a la inca.","Todo el año","museokusijata.jpeg","Dada la proximidad del mismo con el Santuario se recomienda realizar una caminata, alquilar una bicicleta o tomar los taxis y minibuses con salida hacia la comunidad Yampupata","1","2");
INSERT INTO atractivo VALUES("10","Cerro El Calvario","Copacabana","Alta","El cerro El Calvario está ubicado en una colina, que está en medio de la ciudad de Copacabana al oeste de Bolivia, a orillas del Lago Titicaca Unas gradas permiten subir siguiendo las 14 estaciones de la Vía Crucis y alcanzar la cima Este sendero es recomendado a los turistas subirlo al final de la tarde cuando se puede ver el atardecer desde la cima Durante el ascenso, los visitantes pueden comprar camiones y casas en miniatura, hechas de yeso o plástico, rezar pidiendo a la Virgen que les beneficie con una casa o camión de verdad, dependiendo de sus deseos y fe","Todo el año","atr1.jpeg","ubicarse en la plaza de Colquepata y subir hacia la cima","1","1");
INSERT INTO atractivo VALUES("11","Chinkana","Copacabana","Moderada","Chinkana es un sitio arqueológico en Bolivia es una muestra única del tipo de construcción laberíntica en el mundo Es posible que esta construcción hubiera sido destinada para los momentos de meditación o de iniciación de sacerdotes ligados al culto a lnti y a la Roca Sagrada, situado en la Isla del Sol, una isla del lago Titicaca en Copacabana","Todo el año","atr2.jpeg","Llegar a la Isla del Sol desde la playa de Copacabana","0","1");
INSERT INTO atractivo VALUES("12","Isla De La Luna","Copacabana","Moderada","La Isla de la Luna, también llamada Isla Koati, es una isla de Bolivia que se encuentra en el lago Titicaca, junto a la isla del Sol en el departamento de La Paz Es una isla pequeña y cuenta con una superficie de 105 hectáreas Presenta una orografía escarpada por los vientos y además por ser una isla altiplánica","Todo el año","atr3.jpeg","Tomar una lancha para llegar a la isla de la Luna","1","1");
INSERT INTO atractivo VALUES("13","Avenida 6 de Agosto","Copacabana","Baja","La Avenida 6 de Agosto en su trayecto hay numerosas tiendas de artesanías, restaurantes y negocios diversos, la Catedral, la Plaza 2 de Febrero y la Plaza Sucre","Todo el año","atr4.jpeg","Llegar al centro de Copacabana","1","2");
INSERT INTO atractivo VALUES("14","Monumento De Eduardo Avaroa Copacabana","Copacabana","Baja","El lago Titicaca es un lago en los Andes en la frontera de Perú y una Bolivia grandes, profundos Copacabana es la ciudad boliviana principal en la orilla del lago Titicaca Coronel Eduardo Abaroa Hidalgo era héroe de Bolivia de la guerra del Pacífico","Todo el año","atr5.jpg","Caminar hasta la playa de Copacabana","1","2");
INSERT INTO atractivo VALUES("15","Península de Copacabana","Copacabana","Baja","La Península Copacabana es la península más grande del lago Titicaca Está unida a tierra firme por el istmo de Yunguyo y separada de la península de Huata por el estrecho conocido como Tiquina","Todo el año","atr6.jpeg","Desde la Plaza 2 de Febrero que se encuentra en el centro de Copacabana caminar hacia el oeste","1","1");
INSERT INTO atractivo VALUES("16","Yampupata","Copacabana","Alta","Yampupata es una península boliviana del lago Titicaca, ubicada al noroeste de la gran península de Copacabana perteneciente al Departamento de La Paz, limita con la isla de la Luna en su parte norte y con la isla del Sol en su parte noroeste forma el estrecho homónimo con esta última","Todo el año","atr7.jpg","Desde la playa de Copacabana tomar un bote o lancha para llegar hasta Yampupata","1","1");
INSERT INTO atractivo VALUES("17","El mercado de Copacabana","Copacabana","Baja","El mercado de Copacabana es un lugar donde todo turista frecuenta para tomar un vaso de api o comer la trucha se encuentra en el centro de Copacabana","Todo el año","atr8.jpg","Para llegar al lugar no es necesario tomar ningún tipo de transporte o caminar lejos porque se encuentra en el mismo centro de Copacabana","1","3");
INSERT INTO atractivo VALUES("18","Islas Flotantes","Copacabana","Moderada","Las primeras estructuras flotantes de totora fueron construidos, hace una década, por los comunarios de la provincia paceña Manco Kapac quienes idearon esta nueva forma de atracción turística sobre las aguas azules del lago titicaca","Otoño e Invierno","atr9.jpg","Camino a la comunidad de Chani, a 25 minutos de navegación de los puertos de copacabana","1","2");
INSERT INTO atractivo VALUES("19","El Observatorio de la Rana Gigante","Copacabana","Moderada","En la localidad de Sahuiña, a menos de 15 minutos de Copacabana por carretera, se encuentra el único observatorio de ranas que flota en una plataforma de totora Desde ahí un grupo de comuneros procura que los visitantes conozcan a la rana gigante, una especie endémica que está en peligro de extinción","Todo el año durante la semana","atr10.jpg","Se encuentra a 15 minutos desde el centro de Copacabana en movilidad","0","2");
INSERT INTO atractivo VALUES("20","Isla de Kalauta","Copacabana","Moderada","Antiguo pueblo de piedra y la más grande necrópolis prehispánica, con chullpas (torres mortuorias) de dos y tres pisos Se puede disfrutar del tradicional apthapi (merienda nativa), compartiendo momentos únicos con la gente del lugar","Todo el año","atr11.jpg","Se toma un bote para ir hacia el sur y llegar a la isla de Kalauta","1","1");
INSERT INTO atractivo VALUES("21","Puerto Yumani","Copacabana","Moderada","Yumani es un pueblo indio situado en la Isla del Sol, sobre el mítico Lago Titicaca, en Bolivia Al llegar a la mítica isla, cuna de la civilización inca, tendrás que subir una escalera muy antigua para acceder al encantador pueblo de Yumani Lejos de estar confundidos por la presencia de los turistas, los indios quechuas y aymaras se ocupan de sus tareas diarias entre pesca, cría de animales y tejeduría","Todo el año","atr12.jpg","La única opción para llegar es tomar un barco desde la playa de Copacabana","1","2");
INSERT INTO atractivo VALUES("22","Dioses Inca, puerto de Copacabana","Copacabana","Baja","Los dioses Inca son un monumento por la capitanía del puerto y la asociación Unión Marinos Titicaca","Todo el año","atr13.jpg","Caminar hacia la playa de Copacabana","1","2");
INSERT INTO atractivo VALUES("23","Ruinas del Palacio de Pilkokaina","Copacabana","Alta","Es uno de los sitios arqueológicos más importantes de la Isla del Sol Significa El sitio donde descansa el Ave, es decir el supremo gobernante Inca al que llamaban Ave Esta edificación está situada a 40 minutos a pie desde el puerto y escalinatas de Saxamani o también conocido como Yumani","Todo el año","atr14.jpg","Tomar un ferry para llegar desde la playa de Copacaba","1","2");
INSERT INTO atractivo VALUES("24","Capilla del Señor de la Cruz de Colquepata","Copacabana","baja","La conmemoración del Señor de Colquepata, una de las tantas celebradas en mayo en Bolivia, marca el final del ciclo agrícola, por lo que constituya también, para los creyentes, una fiesta de la cosecha Tuvo su origen en el supuesto hallazgo de una imagen milagrera de un crucificado por Santa Elena, madre del Emperador Constantino, durante el Siglo X, pero aquí ha devenido uno de los símbolos más fehacientes de transculturación y simbiosis desde los tiempos de la colonia","Todo el año, pero se realiza una festividad el Mes de Mayo","atr15.jpg","Del la plaza Sucre en Copacabana caminar dos cuadras hacia el norte","1","3");
INSERT INTO atractivo VALUES("25","Chissi","Copacabana","Baja","La comunidad de Chissi mantiene formas tradicionales de tejido, que es realizado por las mujeres También se dedica a la agricultura, principalmente de las habas, y a la producción de flores Actualmente se viene impulsando el Agroturismo en la comunidad","Todo el año","atr16.jpg","Al Noreste de Copacabana se encuentra la ex-hacienda Chissi, que posee una extensión de 251 hectáreas","1","2");
INSERT INTO atractivo VALUES("26","Museo del Poncho","Copacabana","Moderada","El Museo del Poncho exhibe una amplia variedad de textiles e indumentarias de los Andes Bolivianos Su exposición permanente está principalmente orientada al atuendo masculino y una de sus piezas más destacadas","Todo el año","atr17.jpg","Desde la plaza sucre caminar hacia el oeste dos cuadras","1","2");
INSERT INTO atractivo VALUES("27","La escalera del Inca","Copacabana","Moderada","La escalera del Inca es, como su nombre lo indica, una escalera construida por los incas en la Isla del Sol, una isla en el Lago Titicaca accesible por ferry desde Copacabana Estas escaleras también permiten llegar al ferry Los peldaños son un poco rígidos, pero me gustó la vista que hay sobre el lago","Otoño e Invierno","atr18.jpg","Ida a la isla del sol","1","2");
INSERT INTO atractivo VALUES("28","Islas Flotantes de Chañi ","Copacabana","Moderada","Las islas de estas comunidad suelen ser confundidas con las islas flotantes del pueblo de los uros que se encuentran en el lago Titicaca, tanto en el lado peruano y boliviano, pero no son de dicho pueblo Mas bien son una puesta en escena de posibles islas flotantes Estas no respetan la construcción tradicional que poseen las islas del pueblo de los uros, no residen personas, mas bien son una atracción y están ancladas en una península que pertenece al sector de la comunidad de Chañi la cual las administra","Todo el año","atr19.jpg","Las islas flotantes de Chañi se encuentran a 20 minutos de viaje en bote desde el muelle de Copacabana, Lago Titicaca","1","1");
INSERT INTO atractivo VALUES("29","Ruinas Incas de Chinchana","Copacabana","Alta","Es una edificación laberíntica construida en la época Inca, ubicada en la parte norte de la Isla del Sol, en la Comunidad de Challa pampa Consiste en una construcción que bordea la ladera del cerro con una serie de túneles y pasillos que conducen a dos patios interiores, en uno de los muros se aprecian ocho nichos trapezoidales internos y ocho nichos externos, por lo que se atribuye un carácter ceremonial y religioso","Todo el año","atr20.jpg","Desde copacabana se tiene que llegar a la Isla del Sol, para poder visitar las ruinas","1","2");
INSERT INTO atractivo VALUES("30","Challapampa","Copacabana","Moderada","Challapampa es una aldea situada en el norte de la isla del Sol, en las orillas del mítico lago Titicaca Es el punto de entrada de las ruinas de Chincana","Todo el año","atr21.jpg","Se toma unos 20min en ferry para llegar desde Copacabana","1","1");
INSERT INTO atractivo VALUES("31","Sampaya","Copacabana","Baja","Este pequeño poblado espera la visita de aquellos turistas que aprecian la fusión entre lo moderno y lo ancestral La característica peculiar que resalta a simple vista es el uso de piedras para la edificación de las casas acompañadas de techos de paja, las cuales se encuentran tal y como culturas anteriores las construyeron, esto denota la cultura y costumbres que aún perduran en el lugar","Todo el año","atr22.jpg","Ubicado en el norte de la península de Copacabana, a 25 minutos en movilidad y 4 horas caminando","1","2");
INSERT INTO atractivo VALUES("32","Plaza 2 de Febrero","Copacabana","Baja","La plaza central de la ciudad es la Plaza 2 de Febrero, y desde allí la Avenida 6 de Agosto se desliza hacia la orilla del lago Está lleno de tiendas de souvenirs, hostales y restaurantes, en gran parte para turistas extranjeros Avenida Jaregui, a una cuadra al norte, tiene una sensación más local, con mercados callejeros y tiendas de abarrotes","Todo el año","atr23.jpg","Llegar al centro de Copacabana, es donde llegan algunos Buses que parten desde la ciudad de la Paz","1","2");
INSERT INTO atractivo VALUES("33","Isla Quehuaya","Copacabana","Moderada","La Isla Quehuaya, se encuentra ubicada en el lago menor del Lago Titicaca Es denominada también Kalauta, que significa en idioma aymara Casa de Piedra, llamada así por la ubicación del sitio arqueológico Es una formación geológica con una profunda significación cosmogónica en los pueblos originarios","Todo el año","atr24.jpg","Es la plaza principal del municipio, ubicada en el centro del mismo","1","1");
INSERT INTO atractivo VALUES("34","Isla Chelleca","Copacabana","Alta","Isla Chelleca es un pequeño islote boliviano ubicado en el lago Titicaca, del departamento de La Paz, entre la isla del Sol y la península de Yampupata en el estrecho del mismo nombre La isla tiene forma redonda y presenta unas dimensiones de 209 metros de largo por 130 metros de ancho","Todo el año","atr25.jpg","Desde la playa de Copacabana,embarcarse en las lanchas hacia la Isla del Sol y continuar la travesía hasta llegar a la Isla Chelleca, tambien se puede llegar tomando las movilidades que salen de la esuqina del mercado principal cerca a la plaza de armas","1","1");



DROP TABLE IF EXISTS calificaa;

CREATE TABLE `calificaa` (
  `idcal` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `idatr` int(11) NOT NULL,
  `valoracion` int(1) DEFAULT NULL,
  `comentario` varchar(1000) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `fechacal` date DEFAULT curdate(),
  PRIMARY KEY (`idcal`,`idusuario`,`idatr`),
  KEY `fk_iclient` (`idusuario`),
  KEY `fk_iidatr` (`idatr`),
  CONSTRAINT `fk_iclient` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_iidatr` FOREIGN KEY (`idatr`) REFERENCES `atractivo` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO calificaa VALUES("1","74","33","8","Un hermoso lugar, no se lo pierdan..","2020-12-27");
INSERT INTO calificaa VALUES("2","74","33","9","repito, bonito lugar","2020-12-27");
INSERT INTO calificaa VALUES("3","129","33","4","Interesante lugar aunque nos quedó lejos para el tiempo que nos organizamos","2020-12-28");
INSERT INTO calificaa VALUES("6","135","32","6","lo que mas me llama la atención del lugar es que hay muy pocas plazas, siendo un municipio tan importante deberian trabajar con muchas mas, pero esta me gustó","2020-12-28");
INSERT INTO calificaa VALUES("8","139","31","9","No habia visitado antes este lugar y quedé encantado, Copacabana ofrece muchos atractivos turisticos y por ello es conveniente planificar una estadia duradera","2020-12-28");
INSERT INTO calificaa VALUES("9","139","1","9","me indicaron que la fecha ideal es en 21 de junio durante el año nuevo aymara, nosotros fuimos en noviembre, el lugar es muy bonito e interesante, ademas se pueden tomar bellas fotos de Copacabana desde este lugar","2020-12-28");
INSERT INTO calificaa VALUES("13","2","34","5","buen lugar","2021-02-19");



DROP TABLE IF EXISTS calificai;

CREATE TABLE `calificai` (
  `idcal` int(11) NOT NULL AUTO_INCREMENT,
  `idcliente` int(11) NOT NULL,
  `idinst` int(11) NOT NULL,
  `valoracion` int(1) DEFAULT NULL,
  `comentario` varchar(1000) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `fechacal` date DEFAULT curdate(),
  PRIMARY KEY (`idcal`,`idcliente`,`idinst`),
  KEY `fk_iclie` (`idcliente`),
  KEY `fk_iinst` (`idinst`),
  CONSTRAINT `fk_iclie` FOREIGN KEY (`idcliente`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_iinst` FOREIGN KEY (`idinst`) REFERENCES `institucion` (`idinst`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO calificai VALUES("1","74","12","1","Un hotel muy confortable, el precio algo elevado","2020-12-07");
INSERT INTO calificai VALUES("2","74","12","5","5 estrellas para todos","2020-12-08");
INSERT INTO calificai VALUES("3","74","9","8","Estadia agradable","2020-12-17");
INSERT INTO calificai VALUES("4","2","9","4","Para mi proxima visita volvere a este hotel","2021-02-16");
INSERT INTO calificai VALUES("5","2","9","4","Felicidades al personal, la estadia fue una belleza y ni que decir de las personas que la atienden , muy amables","2021-02-16");
INSERT INTO calificai VALUES("21","2","38","10","Una fantastica experiencia, no tengo mas palabras para describir el lugar","2021-02-19");
INSERT INTO calificai VALUES("22","2","38","7","una mas","2021-02-19");



DROP TABLE IF EXISTS calificap;

CREATE TABLE `calificap` (
  `idcal` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `idpaq` int(11) NOT NULL,
  `valoracion` int(1) DEFAULT NULL,
  `comentario` varchar(1000) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `fechacal` date DEFAULT curdate(),
  PRIMARY KEY (`idcal`,`idusuario`,`idpaq`),
  KEY `fk_iclien` (`idusuario`),
  KEY `fk_ipaqq` (`idpaq`),
  CONSTRAINT `fk_iclien` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_ipaqq` FOREIGN KEY (`idpaq`) REFERENCES `paquete` (`idpaq`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO calificap VALUES("1","85","8","4","Una experiencia maravillosa, sin duda volveriamos a ir con mis amigos","2020-12-06");
INSERT INTO calificap VALUES("6","74","8","4","Una experiencia agradable, recibimos un trato cordial de los organizadores, el lugar bello, mi familia y yo lo aconsejamos..","2020-12-15");



DROP TABLE IF EXISTS caracteristica;

CREATE TABLE `caracteristica` (
  `idcar` int(11) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`idcar`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO caracteristica VALUES("1","cortinas blockout");
INSERT INTO caracteristica VALUES("2","escritorio");
INSERT INTO caracteristica VALUES("3","chimenea");
INSERT INTO caracteristica VALUES("4","camas extralargas");
INSERT INTO caracteristica VALUES("5","baño privado");
INSERT INTO caracteristica VALUES("6","comedor");
INSERT INTO caracteristica VALUES("7","kitchenette");
INSERT INTO caracteristica VALUES("8","ducha a ras de suelo");
INSERT INTO caracteristica VALUES("9","caja fuerte");
INSERT INTO caracteristica VALUES("10","sala de estar");
INSERT INTO caracteristica VALUES("11","pava electrica");
INSERT INTO caracteristica VALUES("12","bañera ducha");
INSERT INTO caracteristica VALUES("13","secador de pelo");
INSERT INTO caracteristica VALUES("14","balcon privado");
INSERT INTO caracteristica VALUES("15","estante para la ropa");
INSERT INTO caracteristica VALUES("16","lavavajillas");
INSERT INTO caracteristica VALUES("17","utensilios de cocina");
INSERT INTO caracteristica VALUES("18","productos de tocador de cortesia");
INSERT INTO caracteristica VALUES("19","servicio a la habitacion");
INSERT INTO caracteristica VALUES("20","reloj despertador");
INSERT INTO caracteristica VALUES("21","tv pantalla plana");
INSERT INTO caracteristica VALUES("22","habitaciones para familias");
INSERT INTO caracteristica VALUES("23","habitaciones para no fumadores");
INSERT INTO caracteristica VALUES("24","instalaciones de habitaciones VIP");
INSERT INTO caracteristica VALUES("25","plancha");



DROP TABLE IF EXISTS categoria;

CREATE TABLE `categoria` (
  `idcat` int(11) NOT NULL AUTO_INCREMENT,
  `nombrecat` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `descripcion` varchar(300) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`idcat`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO categoria VALUES("1","Sitios Naturales","montañas, planicies, valles, quebradas, cañones, lagos, lagunas, pantanos, rios, caidas de agua, manantiales, costas, grutas, cavernas, areas, protegidas y demas");
INSERT INTO categoria VALUES("2","Manifestaciones Culturales","museos, arquitectura y espacios urbanos, lugares historicos, restos y lugares arqueologicos y pueblos");
INSERT INTO categoria VALUES("3","Folklore","manifestaciones religiosas y populares, ferias, mercados, musica, danza, artes, artesania, gastronomia");
INSERT INTO categoria VALUES("4","Etnologico","costa, sierra y selva");



DROP TABLE IF EXISTS categoriahot;

CREATE TABLE `categoriahot` (
  `idcath` int(11) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(20) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`idcath`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO categoriahot VALUES("1","Económico");
INSERT INTO categoriahot VALUES("2","Valor");
INSERT INTO categoriahot VALUES("3","Calidad");
INSERT INTO categoriahot VALUES("4","Superior");
INSERT INTO categoriahot VALUES("5","Excepcional");



DROP TABLE IF EXISTS events;

CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `color` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `img` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO events VALUES("25","Fiesta de la Candelaria","#008000","2021-01-30 00:00:00","2021-02-01 00:00:00","Es la fiesta dedicada a la Virgen de Copacabana, se festeja con bailes típicos y una procesión con la Virgen.","candelaria.jpg");
INSERT INTO events VALUES("26","Fiesta del Señor de la Cruz","#ff0000","2021-05-01 00:00:00","2021-05-03 00:00:00","Se conmemora el encuentro de la Cruz de Jesús Cristo por Santa Elena. Se celebra con una misa, música y danzas típicas.","kolquepata.jpg");
INSERT INTO events VALUES("27","Semana Santa","#ff0000","2021-03-28 00:00:00","2021-04-04 00:00:00","Es la celebración más importante de la región. Cada año miles de peregrinos caminan alrededor de 150 km. desde La Paz hasta Copacabana por devoción a la Virgen. La celebración dura 3 días y el calendario está sujeto al Católico.","semanta.jpg");
INSERT INTO events VALUES("28","Año Nuevo Aymara","#008000","2021-06-21 00:00:00","2021-06-22 00:00:00"," Es la celebración más importante de la región. Cada año miles de peregrinos caminan alrededor de 150 km. desde La Paz hasta Copacabana por devoción a la Virgen. La celebración dura 3 días y el calendario está sujeto al Católico.","aymara.jpg");
INSERT INTO events VALUES("29","Koya Raymi","#008000","2021-09-21 00:00:00","2021-09-22 00:00:00","Llamada también \"Festival de las Ñustas\", se realiza en la Isla de Coati (Isla de la Luna) y coincide con el equinoccio de primavera. Es una fiesta íntegramente ligada al sexo femenino y dedicada a “Chúa Achachila” la deidad del lago. En la celebración se realiza una entrada de danzas y música autóctona al que asisten comunidades invitadas de otras regiones del lago. También se realizan apthapis (almuerzos comunitarios) y se corona a la Ñusta entre las jóvenes participantes.","koya.jpg");
INSERT INTO events VALUES("30","Fiesta de Copacabana","#008000","2021-08-04 00:00:00","2021-08-07 00:00:00","Se la realiza en honor a nombramiento de la Virgen de Copacabana como “Reina de la Nación”, desde 1925. Se celebra con procesiones, danzas típicas y actos religiosos.","agosto.jpg");
INSERT INTO events VALUES("31","LXVII Proclamacion de la Virgen - Policia Bolivian","#008000","2021-12-11 00:00:00","2021-12-13 00:00:00","Misa de honor y procesión a la Virgen de Copacabana - Comandante General de la Policía Boliviana","ELMBFGOW4AIw_Ps.jfif");



DROP TABLE IF EXISTS experiencia;

CREATE TABLE `experiencia` (
  `idexp` int(11) NOT NULL AUTO_INCREMENT,
  `asunto` varchar(60) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `experiencia` varchar(500) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `valoracion` int(1) DEFAULT NULL,
  `idvisitante` int(11) DEFAULT NULL,
  `img` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `fechapub` date DEFAULT curdate(),
  PRIMARY KEY (`idexp`),
  KEY `fk_iu` (`idvisitante`),
  CONSTRAINT `fk_iu` FOREIGN KEY (`idvisitante`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO experiencia VALUES("1","hermoso viaje","bonitos lugares, buenos restaurantes y hoteles, sin duda volvería al lugar","4","2","g1.jpeg","1","2020-12-02");
INSERT INTO experiencia VALUES("2","algo costoso pero lo vale","al haber viajado en una fecha en donde se realizaba una fiesta, se nos dificultó encontrar hospedaje, al final encontramos pero el precio fue algo elevado, sin embargo la experiencie en el lugar fue inolvidable","4","5","g2.jpg","1","2020-12-02");
INSERT INTO experiencia VALUES("3","un lugar muy intersante","nunca antes lo habiamos visitado, nos llevamos buenos recuerdos junto a mi familia, sobre todo de la Isla del Sol 100% recomendable","5","6","g3.jpg","1","2020-12-02");
INSERT INTO experiencia VALUES("4","Relajante y Bueno","Grandes vistas y muy buena comida, el servicio es muy atento, aunque no rápido, pero vale la pena.  Comimos muy bien y con unas estupendas vistas a la bahía de Copacabana. El precio es razonable. Lo recomiendo.","5","2","g4.jpg","1","2020-12-02");
INSERT INTO experiencia VALUES("5","Excelente","no hicimos reservacion pero encontramos los mejores lugares de servicio de comida y hospedaje, excelentes precios","5","6","g5.jpg","1","2020-12-02");
INSERT INTO experiencia VALUES("6","Buen lugar","Las vistas que ofrece son muy buenas, sin duda volveriamos a ir","3","6","g6.jpg","1","2020-12-02");
INSERT INTO experiencia VALUES("7","Lo más bonito su gente","el trato que recibiimos de la gente del lugar fue muy cordial, nos orientaron cuando quisimos llegar al calvario y a la horca del inca, sin duda volveria a ir","4","6","g7.jpg","1","2020-12-02");
INSERT INTO experiencia VALUES("8","totalmente recomendable","Lugares limpios pero hace mucho frio, recomiendo llevar bolsas para dormir y escoger un buen hotel","4","7","g8.jpg","1","2020-12-02");
INSERT INTO experiencia VALUES("9","una experiencia gratificante","En lo referente a la atención por parte de la agencia de viaje, así como de nuestro guía y del conductor, el trato ha sido excelente. El viaje en sí, muy interesante. Por la mentar, las instalaciones en Copacabana no están todo lo bien cuidadas que debieran. Está claro que el gobierno no invierte lo suficiente en cuidar y mantener el lugar.","4","6","g9.jpg","1","2020-12-02");
INSERT INTO experiencia VALUES("10","\nperfecto para ir entre amigos","organizamos un tour privado y todo salio a la perfección, la coordinación muy bien hecha... agradecemos a Inti travel por toda la ayuda brindada","5","7","g10.jpg","1","2020-12-02");
INSERT INTO experiencia VALUES("11","Copacabana","Excelente tour, visitmos un lugar maravilloso, muy bonito realment, el guía, es un genio, se notaba que sabía mucho del tema y que lo hacía con placer La comida en el restaurante exquisita Recomiendo muchísimo Saludos","4","6","g12.jpg","1","2020-12-02");
INSERT INTO experiencia VALUES("12","interesante lugar","la gente te hace sentir como en casa","4","2","e2.jpg","1","2020-12-02");



DROP TABLE IF EXISTS historial;

CREATE TABLE `historial` (
  `idhist` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `fechaingreso` datetime DEFAULT NULL,
  `fechasalida` datetime DEFAULT NULL,
  PRIMARY KEY (`idhist`,`idusuario`),
  KEY `fk_iuu` (`idusuario`),
  CONSTRAINT `fk_iuu` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;




DROP TABLE IF EXISTS hotcar;

CREATE TABLE `hotcar` (
  `idhotel` int(11) NOT NULL,
  `idcar` int(11) NOT NULL,
  PRIMARY KEY (`idhotel`,`idcar`),
  KEY `fk_icar` (`idcar`),
  CONSTRAINT `fk_icar` FOREIGN KEY (`idcar`) REFERENCES `caracteristica` (`idcar`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_ihot` FOREIGN KEY (`idhotel`) REFERENCES `hotel` (`idinst`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO hotcar VALUES("9","1");
INSERT INTO hotcar VALUES("9","2");
INSERT INTO hotcar VALUES("9","4");
INSERT INTO hotcar VALUES("9","5");
INSERT INTO hotcar VALUES("9","6");
INSERT INTO hotcar VALUES("9","7");
INSERT INTO hotcar VALUES("9","8");
INSERT INTO hotcar VALUES("9","10");
INSERT INTO hotcar VALUES("9","14");
INSERT INTO hotcar VALUES("9","15");
INSERT INTO hotcar VALUES("9","19");
INSERT INTO hotcar VALUES("9","21");
INSERT INTO hotcar VALUES("9","22");
INSERT INTO hotcar VALUES("9","23");
INSERT INTO hotcar VALUES("10","4");
INSERT INTO hotcar VALUES("10","5");
INSERT INTO hotcar VALUES("10","10");
INSERT INTO hotcar VALUES("10","11");
INSERT INTO hotcar VALUES("10","12");
INSERT INTO hotcar VALUES("10","14");
INSERT INTO hotcar VALUES("10","16");
INSERT INTO hotcar VALUES("10","18");
INSERT INTO hotcar VALUES("10","20");
INSERT INTO hotcar VALUES("10","21");
INSERT INTO hotcar VALUES("10","22");
INSERT INTO hotcar VALUES("11","4");
INSERT INTO hotcar VALUES("11","5");
INSERT INTO hotcar VALUES("11","8");
INSERT INTO hotcar VALUES("11","9");
INSERT INTO hotcar VALUES("11","10");
INSERT INTO hotcar VALUES("11","12");
INSERT INTO hotcar VALUES("11","14");
INSERT INTO hotcar VALUES("11","16");
INSERT INTO hotcar VALUES("12","1");
INSERT INTO hotcar VALUES("12","4");
INSERT INTO hotcar VALUES("12","5");
INSERT INTO hotcar VALUES("12","6");
INSERT INTO hotcar VALUES("12","8");
INSERT INTO hotcar VALUES("12","14");
INSERT INTO hotcar VALUES("12","19");
INSERT INTO hotcar VALUES("12","21");
INSERT INTO hotcar VALUES("12","22");
INSERT INTO hotcar VALUES("12","23");
INSERT INTO hotcar VALUES("15","4");
INSERT INTO hotcar VALUES("15","5");
INSERT INTO hotcar VALUES("15","6");
INSERT INTO hotcar VALUES("15","7");
INSERT INTO hotcar VALUES("15","8");
INSERT INTO hotcar VALUES("15","9");
INSERT INTO hotcar VALUES("15","10");
INSERT INTO hotcar VALUES("15","11");
INSERT INTO hotcar VALUES("16","5");
INSERT INTO hotcar VALUES("16","6");
INSERT INTO hotcar VALUES("16","7");
INSERT INTO hotcar VALUES("16","8");
INSERT INTO hotcar VALUES("16","9");
INSERT INTO hotcar VALUES("16","10");
INSERT INTO hotcar VALUES("16","11");
INSERT INTO hotcar VALUES("16","12");
INSERT INTO hotcar VALUES("17","6");
INSERT INTO hotcar VALUES("17","7");
INSERT INTO hotcar VALUES("17","8");
INSERT INTO hotcar VALUES("17","9");
INSERT INTO hotcar VALUES("17","10");
INSERT INTO hotcar VALUES("17","11");
INSERT INTO hotcar VALUES("17","12");
INSERT INTO hotcar VALUES("17","13");
INSERT INTO hotcar VALUES("18","7");
INSERT INTO hotcar VALUES("18","8");
INSERT INTO hotcar VALUES("18","9");
INSERT INTO hotcar VALUES("18","10");
INSERT INTO hotcar VALUES("18","11");
INSERT INTO hotcar VALUES("18","12");
INSERT INTO hotcar VALUES("18","13");
INSERT INTO hotcar VALUES("18","14");
INSERT INTO hotcar VALUES("19","1");
INSERT INTO hotcar VALUES("19","2");
INSERT INTO hotcar VALUES("19","3");
INSERT INTO hotcar VALUES("19","4");
INSERT INTO hotcar VALUES("19","5");
INSERT INTO hotcar VALUES("19","6");
INSERT INTO hotcar VALUES("19","7");
INSERT INTO hotcar VALUES("19","8");
INSERT INTO hotcar VALUES("20","9");
INSERT INTO hotcar VALUES("20","10");
INSERT INTO hotcar VALUES("20","11");
INSERT INTO hotcar VALUES("20","12");
INSERT INTO hotcar VALUES("20","13");
INSERT INTO hotcar VALUES("20","14");
INSERT INTO hotcar VALUES("20","15");
INSERT INTO hotcar VALUES("20","16");
INSERT INTO hotcar VALUES("21","10");
INSERT INTO hotcar VALUES("21","11");
INSERT INTO hotcar VALUES("21","12");
INSERT INTO hotcar VALUES("21","13");
INSERT INTO hotcar VALUES("21","14");
INSERT INTO hotcar VALUES("21","15");
INSERT INTO hotcar VALUES("21","16");
INSERT INTO hotcar VALUES("21","17");
INSERT INTO hotcar VALUES("22","11");
INSERT INTO hotcar VALUES("22","12");
INSERT INTO hotcar VALUES("22","13");
INSERT INTO hotcar VALUES("22","14");
INSERT INTO hotcar VALUES("22","15");
INSERT INTO hotcar VALUES("22","16");
INSERT INTO hotcar VALUES("22","17");
INSERT INTO hotcar VALUES("22","18");
INSERT INTO hotcar VALUES("23","12");
INSERT INTO hotcar VALUES("23","13");
INSERT INTO hotcar VALUES("23","14");
INSERT INTO hotcar VALUES("23","15");
INSERT INTO hotcar VALUES("23","16");
INSERT INTO hotcar VALUES("23","17");
INSERT INTO hotcar VALUES("23","18");
INSERT INTO hotcar VALUES("23","19");
INSERT INTO hotcar VALUES("24","1");
INSERT INTO hotcar VALUES("24","2");
INSERT INTO hotcar VALUES("24","20");
INSERT INTO hotcar VALUES("24","21");
INSERT INTO hotcar VALUES("24","22");
INSERT INTO hotcar VALUES("24","23");
INSERT INTO hotcar VALUES("24","24");
INSERT INTO hotcar VALUES("24","25");
INSERT INTO hotcar VALUES("25","1");
INSERT INTO hotcar VALUES("25","2");
INSERT INTO hotcar VALUES("25","3");
INSERT INTO hotcar VALUES("25","21");
INSERT INTO hotcar VALUES("25","22");
INSERT INTO hotcar VALUES("25","23");
INSERT INTO hotcar VALUES("25","24");
INSERT INTO hotcar VALUES("25","25");
INSERT INTO hotcar VALUES("26","1");
INSERT INTO hotcar VALUES("26","2");
INSERT INTO hotcar VALUES("26","3");
INSERT INTO hotcar VALUES("26","4");
INSERT INTO hotcar VALUES("26","22");
INSERT INTO hotcar VALUES("26","23");
INSERT INTO hotcar VALUES("26","24");
INSERT INTO hotcar VALUES("26","25");
INSERT INTO hotcar VALUES("27","1");
INSERT INTO hotcar VALUES("27","2");
INSERT INTO hotcar VALUES("27","3");
INSERT INTO hotcar VALUES("27","4");
INSERT INTO hotcar VALUES("27","5");
INSERT INTO hotcar VALUES("27","23");
INSERT INTO hotcar VALUES("27","24");
INSERT INTO hotcar VALUES("27","25");
INSERT INTO hotcar VALUES("28","1");
INSERT INTO hotcar VALUES("28","2");
INSERT INTO hotcar VALUES("28","3");
INSERT INTO hotcar VALUES("28","4");
INSERT INTO hotcar VALUES("28","5");
INSERT INTO hotcar VALUES("28","6");
INSERT INTO hotcar VALUES("28","24");
INSERT INTO hotcar VALUES("28","25");
INSERT INTO hotcar VALUES("29","1");
INSERT INTO hotcar VALUES("29","2");
INSERT INTO hotcar VALUES("29","3");
INSERT INTO hotcar VALUES("29","4");
INSERT INTO hotcar VALUES("29","5");
INSERT INTO hotcar VALUES("29","6");
INSERT INTO hotcar VALUES("29","7");
INSERT INTO hotcar VALUES("29","25");
INSERT INTO hotcar VALUES("30","2");
INSERT INTO hotcar VALUES("30","3");
INSERT INTO hotcar VALUES("30","4");
INSERT INTO hotcar VALUES("30","5");
INSERT INTO hotcar VALUES("30","6");
INSERT INTO hotcar VALUES("30","7");
INSERT INTO hotcar VALUES("30","8");
INSERT INTO hotcar VALUES("31","2");
INSERT INTO hotcar VALUES("31","3");
INSERT INTO hotcar VALUES("31","4");
INSERT INTO hotcar VALUES("31","5");
INSERT INTO hotcar VALUES("31","6");
INSERT INTO hotcar VALUES("31","7");
INSERT INTO hotcar VALUES("31","8");
INSERT INTO hotcar VALUES("31","9");
INSERT INTO hotcar VALUES("32","11");
INSERT INTO hotcar VALUES("32","12");
INSERT INTO hotcar VALUES("32","13");
INSERT INTO hotcar VALUES("32","14");
INSERT INTO hotcar VALUES("32","15");
INSERT INTO hotcar VALUES("32","16");
INSERT INTO hotcar VALUES("32","17");
INSERT INTO hotcar VALUES("32","18");
INSERT INTO hotcar VALUES("33","12");
INSERT INTO hotcar VALUES("33","13");
INSERT INTO hotcar VALUES("33","14");
INSERT INTO hotcar VALUES("33","15");
INSERT INTO hotcar VALUES("33","16");
INSERT INTO hotcar VALUES("33","17");
INSERT INTO hotcar VALUES("33","18");
INSERT INTO hotcar VALUES("33","19");
INSERT INTO hotcar VALUES("34","1");
INSERT INTO hotcar VALUES("34","2");
INSERT INTO hotcar VALUES("34","20");
INSERT INTO hotcar VALUES("34","21");
INSERT INTO hotcar VALUES("34","22");
INSERT INTO hotcar VALUES("34","23");
INSERT INTO hotcar VALUES("34","24");
INSERT INTO hotcar VALUES("34","25");
INSERT INTO hotcar VALUES("35","1");
INSERT INTO hotcar VALUES("35","2");
INSERT INTO hotcar VALUES("35","3");
INSERT INTO hotcar VALUES("35","21");
INSERT INTO hotcar VALUES("35","22");
INSERT INTO hotcar VALUES("35","23");
INSERT INTO hotcar VALUES("35","24");
INSERT INTO hotcar VALUES("35","25");
INSERT INTO hotcar VALUES("36","1");
INSERT INTO hotcar VALUES("36","2");
INSERT INTO hotcar VALUES("36","3");
INSERT INTO hotcar VALUES("36","4");
INSERT INTO hotcar VALUES("36","22");
INSERT INTO hotcar VALUES("36","23");
INSERT INTO hotcar VALUES("36","24");
INSERT INTO hotcar VALUES("36","25");
INSERT INTO hotcar VALUES("37","1");
INSERT INTO hotcar VALUES("37","2");
INSERT INTO hotcar VALUES("37","3");
INSERT INTO hotcar VALUES("37","4");
INSERT INTO hotcar VALUES("37","5");
INSERT INTO hotcar VALUES("37","23");
INSERT INTO hotcar VALUES("37","24");
INSERT INTO hotcar VALUES("37","25");
INSERT INTO hotcar VALUES("38","1");
INSERT INTO hotcar VALUES("38","2");
INSERT INTO hotcar VALUES("38","3");
INSERT INTO hotcar VALUES("38","4");
INSERT INTO hotcar VALUES("38","5");
INSERT INTO hotcar VALUES("38","6");
INSERT INTO hotcar VALUES("38","24");
INSERT INTO hotcar VALUES("38","25");
INSERT INTO hotcar VALUES("39","1");
INSERT INTO hotcar VALUES("39","2");
INSERT INTO hotcar VALUES("39","3");
INSERT INTO hotcar VALUES("39","4");
INSERT INTO hotcar VALUES("39","5");
INSERT INTO hotcar VALUES("39","6");
INSERT INTO hotcar VALUES("39","7");
INSERT INTO hotcar VALUES("39","25");
INSERT INTO hotcar VALUES("40","2");
INSERT INTO hotcar VALUES("40","3");
INSERT INTO hotcar VALUES("40","4");
INSERT INTO hotcar VALUES("40","5");
INSERT INTO hotcar VALUES("40","6");
INSERT INTO hotcar VALUES("40","7");
INSERT INTO hotcar VALUES("40","8");



DROP TABLE IF EXISTS hotel;

CREATE TABLE `hotel` (
  `idinst` int(11) NOT NULL,
  `tarifa` decimal(5,2) DEFAULT NULL,
  `idcat` int(11) DEFAULT NULL,
  PRIMARY KEY (`idinst`),
  KEY `fk_idcat` (`idcat`),
  CONSTRAINT `fk_idcat` FOREIGN KEY (`idcat`) REFERENCES `categoriahot` (`idcath`),
  CONSTRAINT `fk_idins` FOREIGN KEY (`idinst`) REFERENCES `institucion` (`idinst`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO hotel VALUES("9","296.00","3");
INSERT INTO hotel VALUES("10","145.00","2");
INSERT INTO hotel VALUES("11","544.00","3");
INSERT INTO hotel VALUES("12","244.00","2");
INSERT INTO hotel VALUES("15","480.00","3");
INSERT INTO hotel VALUES("16","364.00","3");
INSERT INTO hotel VALUES("17","364.00","3");
INSERT INTO hotel VALUES("18","298.00","2");
INSERT INTO hotel VALUES("19","822.00","4");
INSERT INTO hotel VALUES("20","240.00","2");
INSERT INTO hotel VALUES("21","249.00","2");
INSERT INTO hotel VALUES("22","208.00","3");
INSERT INTO hotel VALUES("23","398.00","1");
INSERT INTO hotel VALUES("24","97.00","1");
INSERT INTO hotel VALUES("25","165.00","1");
INSERT INTO hotel VALUES("26","187.00","1");
INSERT INTO hotel VALUES("27","553.00","2");
INSERT INTO hotel VALUES("28","296.00","3");
INSERT INTO hotel VALUES("29","113.00","3");
INSERT INTO hotel VALUES("30","124.00","3");
INSERT INTO hotel VALUES("31","155.00","2");
INSERT INTO hotel VALUES("32","366.00","3");
INSERT INTO hotel VALUES("33","151.00","1");
INSERT INTO hotel VALUES("34","96.00","2");
INSERT INTO hotel VALUES("35","512.00","2");
INSERT INTO hotel VALUES("36","88.00","2");
INSERT INTO hotel VALUES("37","185.00","2");
INSERT INTO hotel VALUES("38","959.00","3");
INSERT INTO hotel VALUES("39","454.00","3");
INSERT INTO hotel VALUES("40","175.00","2");



DROP TABLE IF EXISTS hottipohab;

CREATE TABLE `hottipohab` (
  `idhotel` int(11) NOT NULL,
  `idtipo` int(11) NOT NULL,
  PRIMARY KEY (`idhotel`,`idtipo`),
  KEY `fk_ith` (`idtipo`),
  CONSTRAINT `fk_ihote` FOREIGN KEY (`idhotel`) REFERENCES `hotel` (`idinst`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_ith` FOREIGN KEY (`idtipo`) REFERENCES `tipohab` (`idtipo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO hottipohab VALUES("9","1");
INSERT INTO hottipohab VALUES("9","2");
INSERT INTO hottipohab VALUES("9","3");
INSERT INTO hottipohab VALUES("9","4");
INSERT INTO hottipohab VALUES("9","7");
INSERT INTO hottipohab VALUES("10","1");
INSERT INTO hottipohab VALUES("10","2");
INSERT INTO hottipohab VALUES("10","3");
INSERT INTO hottipohab VALUES("10","4");
INSERT INTO hottipohab VALUES("10","7");
INSERT INTO hottipohab VALUES("11","1");
INSERT INTO hottipohab VALUES("11","2");
INSERT INTO hottipohab VALUES("11","3");
INSERT INTO hottipohab VALUES("11","4");
INSERT INTO hottipohab VALUES("11","5");
INSERT INTO hottipohab VALUES("11","6");
INSERT INTO hottipohab VALUES("11","7");
INSERT INTO hottipohab VALUES("11","12");
INSERT INTO hottipohab VALUES("12","1");
INSERT INTO hottipohab VALUES("12","2");
INSERT INTO hottipohab VALUES("12","3");
INSERT INTO hottipohab VALUES("12","4");
INSERT INTO hottipohab VALUES("12","7");
INSERT INTO hottipohab VALUES("15","1");
INSERT INTO hottipohab VALUES("15","2");
INSERT INTO hottipohab VALUES("15","3");
INSERT INTO hottipohab VALUES("15","4");



DROP TABLE IF EXISTS idioma;

CREATE TABLE `idioma` (
  `idlang` int(11) NOT NULL AUTO_INCREMENT,
  `idioma` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`idlang`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO idioma VALUES("1","español");
INSERT INTO idioma VALUES("2","inglés");
INSERT INTO idioma VALUES("3","frances");
INSERT INTO idioma VALUES("4","portugues");
INSERT INTO idioma VALUES("5","aleman");
INSERT INTO idioma VALUES("6","mandarin");



DROP TABLE IF EXISTS institucion;

CREATE TABLE `institucion` (
  `idinst` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(300) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `direccion` varchar(400) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telefono` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `imgInst` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `idencargado` int(11) DEFAULT NULL,
  `bioseguridad` tinyint(1) DEFAULT NULL,
  `descripcion` varchar(2000) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `pagina` varchar(300) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `correo` varchar(80) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ubicacion` varchar(300) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `facebook` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`idinst`),
  KEY `fk_iec` (`idencargado`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO institucion VALUES("9","La Cúpula","Michel Pérez 1-3, Copacabana","2-862-2029","cupula.jpg","75","1","Con vista al lago Titicaca, este hotel artístico con una fachada encalada y una arquitectura de inspiración árabe se encuentra a 12 minutos a pie de la cima del Cerro El Calvar","http://www.hotelcupula.com/en_index.php","bolivia@hotelcupula.com","https://www.google.com/maps/place/Hostal+La+C%C3%BApula/@-16.1638924,-69.0890284,15z/data=!4m2!3m1!1s0x0:0xce1e196fb918443c?sa=X&ved=2ahUKEwix-e73qLrtAhVZH7kGHWS9DNAQ_BIwDHoECBsQBQ","");
INSERT INTO institucion VALUES("10","Utama","C. Michelle Perez, esq. San Antonio","2-862-2013","patio.jpg","51","1","Disfrute de nuestra perfecta\nubicación y excelente servicio\n\nNuestro Hotel se encuentra ubicado en la ciudad de Copacabana, La Paz, Bolivia.\nA unas cuadras de la orilla del lago, del centro de la ","http://www.utamahotel.com/","hotelutama@hotmail.com","https://www.google.com/maps/place/Hotel+Utama/@-16.1625529,-69.0883511,17.07z/data=!4m18!1m9!3m8!1s0x915dd27c71bae709:0x372840aa7aeec9b0!2sHotel+Utama!5m2!4m1!1i2!8m2!3d-16.16357!4d-69.088684!3m7!1s0x915dd27c71bae709:0x372840aa7aeec9b0!5m2!4m1!1i2!8m2!3d-16.16357!4d-69.088684","");
INSERT INTO institucion VALUES("11","Rosario del Lago","Avenida Costanera Esq Rigoberto Paredes, Copacabana","2-862-2141","hotel-rosario-lago-titicaca.jpg","52","1","Este hotel apacible se encuentra a 2 minutos a pie de la playa de Copacabana, a orillas del lago Titicaca, y a 9 minutos a pie de la Basílica de Nuestra Señora de Copacabana, un santuario del siglo XV","https://hotelrosario.com/lago-titicaca/","reservas@gruporosario.travel","https://www.google.com/maps/place/Hotel+Rosario+Lago+Titicaca/@-16.167947,-69.089381,15z/data=!4m2!3m1!1s0x0:0xcb47ba6107c16975?sa=X&ved=2ahUKEwjX1e7zp7rtAhVhK7kGHZAoDQwQ_BIwDHoECBkQBQ","https://www.facebook.com/Hotel-Rosario-Del-Lago-416928608327426");
INSERT INTO institucion VALUES("13","MIlenial Tours","Av 6 de Agosto Esq Costanera","67652777","78743419_2471218769866137_4271882482439159808_n.png","82","1","Somos una empresa con mas de 20 años al servicio del turista","https://www.facebook.com/MilenialTours/posts/2805561369765207","info@milenialtours.com","","");
INSERT INTO institucion VALUES("14","YAT Bolivia","Avenida 6 de Agosto esq. Costanera","2563214","78770104_3513225385369289_2804586663303446528_n.jpg","83","1","Ven y disfruta de la variedad de paquetes que ofrece la empresa YAT Bolivia","https://www.facebook.com/YATBoliviaOficial/posts/4923165864375227","yaturismo@hotmail.com","","");
INSERT INTO institucion VALUES("15","Hotel Onkel Inn Torres de Copacabana","Avenida Costanera 257, 0000 Copacabana","77270083","hotel15.jpg","78","1","El Hotel Onkel Inn Torres de Copacabana está situado en la playa de Copacabana y ofrece vistas panorámicas a la playa, conexión WiFi gratuita y desayuno buffet. Además, hay una zona de barbacoa.\nLas ","http://www.onkelinn.com/","onkelinn@onkelinn.com","https://www.google.com/maps/place/Hotel+Onkel+Inn,+Torres+de+Copacabana/@-16.1733244,-69.0934372,15z/data=!4m2!3m1!1s0x0:0x3436cebcb6c0cfc3?sa=X&ved=2ahUKEwjVguWvh8XtAhVAHbkGHcIUCgkQ_BIwDHoECBsQBQ","https://www.facebook.com/Onkel-Inn-163080300698012");
INSERT INTO institucion VALUES("16","Hotel Gloria Copacabana","Avenida 16 de julio s/n, Copacabana Bolivia","68212073","hotel16.jpg","101","1","Descubre por qué tantos viajeros ven Hotel Gloria Copacabana como el hotel ideal cuando visitan Copacabana. Además de aportar la combinación ideal de calidad, comodidad y ubicación, ofrece un ambiente","http://www.hotelgloriacopacabana.com/","reservas1@hotelgloria.com.bo","https://www.google.com/maps/dir/-16.4893187,-68.1526373/-16.1669101,-69.0887521/@-16.3148682,-69.1811136,9z/data=!3m1!4b1!4m4!4m3!1m1!4e1!1m0","https://www.facebook.com/HGcopacabana");
INSERT INTO institucion VALUES("17","Hotel Rosario Lago Titicaca","Av. Costanera Esq. Rigoberto Paredes y Manco Kapac S/N La Paz, Copacabana Bolivia","76254988","hotel17.jpg","102","1","Hotel Rosario Lago Titicaca es una magnífica elección para los viajeros que visiten Copacabana, ya que ofrece un ambiente romántico, además de numerosos servicios diseñados para mejorar tu estancia.\n","http://www.hotelrosario.com/","reservas@gruporosario.travel","https://www.google.com/maps/dir/-16.4893356,-68.1526148/-16.1679801,-69.0894127/@-16.3148682,-69.1817776,9z/data=!3m1!4b1!4m4!4m3!1m1!4e1!1m0","https://www.facebook.com/hotel.rosario");
INSERT INTO institucion VALUES("18","Hotel La Cupula","Calle Michel Perez 1-3, Copacabana Bolivia","67088464","hotel18.jpg","103","1","El Hotel La Cupula es un lugar de 2 estrellas en las inmediaciones del Sucre Square. El hotel cuenta con 20 habitaciones. En toda la propiedad se ofrece Wi-Fi gratis.\n\nUbicación\nSe sitúa a 1 km del","http://www.hotelcupula.com/","bolivia@hotelcupula.com","https://www.google.com/maps/dir/-16.4893427,-68.1526396/-16.1636934,-69.0894127/@-16.3148682,-69.1814622,9z/data=!3m1!4b1!4m4!4m3!1m1!4e1!1m0","https://www.facebook.com/hotelcupula");
INSERT INTO institucion VALUES("19","Inca Utama Hotel","Ruta Nacional 2 Km 75, Huatajata 4785 Bolivia","69965565","hotel19.jpg","104","1","En la orilla más panorámica del Lago Titicaca, está situado el \"Inca Utama Hotel & SPA\", un concepto hotelero diferente, diseñado para introducir a los huéspedes a las culturas de los Andes, dentro de","https://incautama.business.site/","info@titicaca.com","https://www.google.com/maps/dir/-16.4893313,-68.1526125/-16.2144938,-68.6831626/@-16.3395436,-68.6981126,10z/data=!3m1!4b1!4m4!4m3!1m1!4e1!1m0","https://www.facebook.com/incautama");
INSERT INTO institucion VALUES("20","Hotel Espejo","Calle Jauregui. Frente plaza 2 de febrero, Copacabana Bolivia","65581849","hotel20.jpg","105","1","Hotel Espejo está Ubicado en pleno centro de la población de Copacabana frente plaza principal y a un minuto del mercado y catedral misma, se encuentra a media cuadra de la llegada de buses que vienen","","hotelespejo.travel@gmail.com","https://www.google.com/maps/dir/-16.4893436,-68.1525726/-16.1652185,-69.0857434/@-16.326524,-69.1796115,9z/data=!3m1!4b1!4m4!4m3!1m1!4e1!1m0","https://www.facebook.com/hotelespejo");
INSERT INTO institucion VALUES("21","Hotel Utama","Calle Michell Perez esq. San Antonio s/n, Copacabana Bolivia","2 8622013","hotel21.jpg","106","1","Si buscas un hostal económico en Copacabana, no te pierdas Hotel Utama.\nEl hostal ofrece espacio para guardar el equipaje, para que tu estancia sea incluso más agradable. El establecimiento también cuenta con desayuno incluido. Los huéspedes que lleguen en coche tienen acceso a garaje para aparcar.\nMientras estás aquí, asegúrate de ir a restaurantes de sushi como Thai Palace y Poshi, que se encuentran cerca de Hotel Utama.\nLo mejor de todo es que Hotel Utama es una estupenda base desde la que conocer numerosas atracciones de Copacabana, como Cerro Calvario (0,3 km), Basílica de Nuestra Señora de Copacabana (0,4 km) y Avenida 6 de Agosto (0,4 km), a las que se puede llegar a pie porque están cerca.\nEl personal de Hotel Utama está deseando atenderte durante tu visita.","http://www.utamahotel.com/","hotelutama@hotmail.com","https://www.google.com/maps/dir/-16.4893327,-68.1526008/-16.1642447,-69.0887475/@-16.3148682,-69.1811616,9z/data=!3m1!4b1!4m4!4m3!1m1!4e1!1m0","https://www.facebook.com/UTAMA-HOTEL-376351346119749/");
INSERT INTO institucion VALUES("22","Hotel Ecolodge Copacabana","Av. Costanera, 9999 Copacabana, Bolivia","2 8622500","hotel22.jpg","107","1","Este pintoresco establecimiento ecológico está rodeado de 10.000 m² de bosques privados y tiene acceso directo al lago Titicaca. Se abastece tanto de energía solar como de electricidad. Hay conexión WiFi gratuita en las zonas comunes. Todas las mañanas se sirve un desayuno continental.\n\nLas habitaciones del Ecolodge Copacabana ofrecen vistas al lago y al jardín. Todas están decoradas con muebles de piedra, suelo de parquet y paredes de color crema. También disponen de baño privado y calefacción.\n\nLa cabaña familiar tiene zona de comedor y cocina equipada con lavavajillas, cafetera y tetera.\n\nLos huéspedes podrán disfrutar de caminatas por los terrenos del establecimiento o pasear por el lago en barco con o sin motor. El bosque proporciona el entorno perfecto para observar de aves y practicar senderismo. El restaurante prepara una gran variedad de platos locales.\n\nEl establecimiento se encuentra a 1,5 km de la ciudad de Copacabana, a 4 horas en coche de La Paz y a solo 15 minutos en coche del aeropuerto de Copacabana. Se proporciona aparcamiento privado.","http://www.ecocopacabana.com/","info@ecocopacabana.com","https://www.google.com/maps/dir/-16.4893485,-68.1526341/-16.178936,-69.0994191/@-16.3148682,-69.186585,9z/data=!3m1!4b1!4m4!4m3!1m1!4e1!1m0","https://www.facebook.com/Ecolodge-Copacabana-400078746807590");
INSERT INTO institucion VALUES("23","Hostal Las Olas","Calle Michel Perez Nº1-3 Calle Jauregui, 4132 Copacabana, Bolivia","72508668","hotel23.jpg","108","1","Estimado turista, el hostal \"Las Olas\" se encuentra en una colina con vista al lago Titicaca. Desde cualquiera de las ocho suites se tiene una vista maravillosa sobre la bahía y el lago. Usted tiene amplios jardines con hamacas y mesas de piedra en las diferentes terrazas que bajan la ladera de la colina. En nuestras instalaciones se puede utilizar una chimenea y tenemos varias mesas de piedra y bancos para comer al aire libre para disfrutar de las vistas. Para los amantes de las plantas y flores, usted encontrará una enorme variedad de especies predominantemente locales. Todas las suites han sido diseñadas de forma individual, utilizando como muchos materiales naturales y locales como sea posible y respetando las formas tradicionales de construcción. Proporcionan una máxima comodidad y encontrará muchos detalles artísticos para el ojo. Desde su sala de estar, desde la cama y casi desde cualquier punto de su habitación tiene una vista perfecta del lago a través de los grandes ventanales. Cada suite está provista de una unidad pequeña cocina, baño privado una hamaca en el interior y una chimenea. También hay un pequeño calentador eléctrico para su uso Hacemos un gran esfuerzo para trabajar ecológicamente. Las cabinas se construyen con un aislamiento térmico completo de poli estireno en el interior del techo, así como en las paredes por debajo de la fachada. Precalentamos el agua con grandes paneles solares y con los cuales alimentamos la caldera eléctrica para garantizar el agua muy caliente las 24 horas del día. Reciclamos todo nuestra agua con un sistema automático de rociadores para humedecer los extensos jardines y también recopilamos cualquier botella de plástico o vidrio dejado para ser reciclados.","http://www.olasbolivia.com/","info@olasbolivia.com","https://www.google.com/maps/dir/-16.4893358,-68.1526487/-16.1638029,-69.0902821/@-16.3148682,-69.1818206,9z/data=!3m1!4b1!4m4!4m3!1m1!4e1!1m0","https://www.facebook.com/hostallasolas");
INSERT INTO institucion VALUES("24","Hostal Center","Av. 6 Agosto s/n, Copacabana 0012 Bolivia","76709594","hotel24.jpg","109","1"," El CENTER Copacabana se encuentra en Copacabana, a 300 metros de la catedral de Nuestra Señora de Copacabana, y ofrece mostrador de información turística y WiFi gratuita en todas las instalaciones. Todas las habitaciones cuentan con TV de pantalla plana con canales vía satélite y baño privado. El alojamiento cuenta con cajero automático, servicio de conserjería y cambio de divisa.\nLas habitaciones están equipadas con armario.\nEl CENTER Copacabana sirve un desayuno continental.\nEl alojamiento dispone de terraza.\nEl CENTER Copacabana está cerca de varios lugares de interés populares, como el mercado de Copacabana, el Calvario y la Horca del Inca.","","centercopa@gmail.com","https://www.google.com/maps/place/Hostal+Center/@-16.1656252,-69.0876307,15z/data=!4m2!3m1!1s0x0:0x53dc3bdc565110d8?sa=X&ved=2ahUKEwjPgan34cbtAhX-DrkGHVNMA4QQ_BIwDHoECBYQBQ","https://www.facebook.com/Hostal-Center-Copacabana-bolivia-383655532066000");
INSERT INTO institucion VALUES("25","Willka Kuti Hostal Challapampa ","Isla del Sol lado Norte (puerto de challapampa 1500) ","67076077","hotel25.jpg","110","1"," El Willka Kuti Hostal - Lado Norte Isla del Sol ofrece alojamiento en la Isla del Sol y está situado a solo 3 minutos a pie de los restaurantes locales. Este establecimiento queda a 2,5 horas en barco de la ciudad de Copacabana.\nAlgunas habitaciones cuentan con baño privado.\nEl Willka Kuti Hostal - Lado Norte Isla del Sol ofrece servicio de recepción las 24 horas y mostrador de información turística, y alberga además un jardín. Tanto en el establecimiento como en los alrededores se pueden practicar diversas actividades, como senderismo.\nEste establecimiento se encuentra a 3 minutos a pie del lago, desde donde los huéspedes pueden tomar el barco a Copacabana. Se ofrece servicio gratuito de recogida desde el lago.","","hostalchallapampa@hotmail.com","https://www.google.com/maps/place/Willka+Kuti+Hostal+-+Lado+Norte+Isla+Del+Sol/@-15.9970367,-69.1845956,15z/data=!4m8!3m7!1s0x0:0xc83acdd3120f8f0e!5m2!4m1!1i2!8m2!3d-15.9970367!4d-69.1845956","https://www.facebook.com/Hostal-Challapampa-Lado-Norte-Isla-Del-Sol-109138987576014");
INSERT INTO institucion VALUES("26","Hostal Palacio Del Inka "," Camino Norte-Sur, a 100 metros de la punta del Inca, Comunidad Yumani, Bolivia "," 74022018 ","hotel26.jpg","111","1","El Hostal Palacio del Inca está situado en la Comunidad Yumania, en 100 mts de la Fuente Inca. Hay conexión WiFi gratuita.\nEl lodge dispone de terraza.\nEl establecimiento alberga un jardín.\nEl estadio de Copacabana está a 17 km del Hostal palacio del inka.","",""," https://www.booking.com/hotel/bo/hostal-palacio-del-inca.es.html#map_opened-hotel_header "," https://www.facebook.com/Hostal-Palacio-Del-Inca-239080996653069 ");
INSERT INTO institucion VALUES("27"," Hotel Utasawa"," Isla del Sol, Bolivia, Comunidad Yumani, Bolivia"," 74024787 ","hotel27.jpg","112","1"," El Utasawa in Comunidad Yumani ofrece vistas al jardín y alberga un restaurante, un bar, un salón compartido, un jardín y una zona de playa privada. Hay WiFi gratuita en todas las instalaciones.\nEl baño es privado e incluye ducha, secador de pelo y artículos de aseo gratuitos.\nEl lodge sirve un desayuno continental o buffet.\nEl Utasawa alberga una terraza.","","8381.oscar@gmail.com","https://www.google.com/maps/dir/-16.4893257,-68.1526355/-16.0386782,-69.1468656/@-16.2631799,-69.2101933,9z/data=!3m1!4b1!4m4!4m3!1m1!4e1!1m0"," https://www.facebook.com/utasawalodge");
INSERT INTO institucion VALUES("28","Hotel Lago Azul Copacabana"," \nAv. Costanera Nro 1000 zona kolkepata 0000 Copacabana, Bolivia"," 71968009","hotel28.jpg","113","1"," El Hotel Lago Azul se encuentra en Copacabana, a 500 metros del mercado de Copacabana, y ofrece alojamiento con WiFi gratuita y aparcamiento privado gratuito. Todas las habitaciones cuentan con TV de pantalla plana con canales por cable y baño privado. El alojamiento cuenta con recepción 24 horas, servicio de conserjería y organización de excursiones.\nTodas las mañanas se sirve un desayuno buffet y americano en el hotel.\nCerca del Hotel Lago Azul hay varios lugares de interés populares, como la catedral de Nuestra Señora de Copacabana, el Calvario y la Horca del Inca."," https://hotellagoazulcopacabana.club/","hotellagoazulcopacabana@gmail.com"," https://www.google.com/maps?ll=-16.164345,-69.091063&z=15&t=m&hl=es-ES&gl=US&mapclient=embed&cid=6945087228463213549","https://www.facebook.com/HotelLagoAzulCopacabana");
INSERT INTO institucion VALUES("29","Hostal La Casa del Sol"," Calle José Ballivian, zona Munaypata, Copacabana, Bolivia"," 63537003","hotel29.jpg","114","1"," El Hostal La Casa del Sol se encuentra en Copacabana, a 300 metros de la catedral de Nuestra Señora de Copacabana y a 400 metros del mercado de Copacabana, y ofrece alojamiento con jardín, WiFi gratuita y aparcamiento privado gratuito. El establecimiento se encuentra a 12 km del baño inca. La posada ofrece vistas al jardín, terraza y recepción 24 horas.\nTodas las habitaciones de la posada tienen patio. Las habitaciones del Hostal La Casa del Sol están equipadas con baño privado con ducha.\nTodos los días se sirve un desayuno buffet.\nLos puntos de interés populares cerca del Hostal La Casa del Sol incluyen Horca del Inca, el estadio de Copacabana y el Calvario.","","ligiavrdc628@gmail.com","https://www.google.com/maps/dir/-16.4893148,-68.1526226/-16.1666611,-69.0839303/@-16.3148682,-69.1787323,9z/data=!3m1!4b1!4m4!4m3!1m1!4e1!1m0","https://www.facebook.com/lacasadelsolcopacabana");
INSERT INTO institucion VALUES("30","Hostal Puerto Alegre"," Manuel Mena Mejía 190, Copacabana"," 71963727","hotel30.jpg","115","1"," El Hostal Puerto Alegre se encuentra en Copacabana y ofrece conexión Wi-Fi gratuita y alojamientos con vistas hermosas al lago Titicaca y la montaña Orca del Inca.\nLas habitaciones disponen de armario y algunas tienen baño privado.\nEl establecimiento alberga recepción las 24 horas, terraza, mostrador de información turística, consigna de equipaje y aparcamiento gratuito. Hay un ordenador de uso gratuito con conexión a internet en el vestíbulo. También se proporciona servicio de lavandería y calefacción por un suplemento.\nEl Hostal Puerto Alegre se halla a 100 metros de la catedral de Nuestra Señora de Copacabana y a 300 metros de la Horca del Inca y del mercado de Copacabana. Además, está a solo 5 minutos a pie de varios restaurantes y a 10 minutos a pie del lago Titicaca.","","","https://www.google.com/maps/dir/-16.4893382,-68.1526456/-16.167132,-69.086552/@-16.3148682,-69.1800611,9z/data=!3m1!4b1!4m4!4m3!1m1!4e1!1m0","https://www.facebook.com/Hostal-Puerto-Alegre-1452216488413800 ");
INSERT INTO institucion VALUES("32","Hotel Estelar del Titicaca"," Av. Costanera, Copacabana Bolivia"," 77205013","hotel32.jpg","117","1","Hotel Estelar del Titicaca es una magnífica elección para los viajeros que visiten Copacabana, ya que ofrece un ambiente para familias, además de numerosos servicios diseñados para mejorar tu estancia.\nHotel Estelar del Titicaca ofrece espacio para guardar el equipaje, mobiliario exterior y terraza-solario. Además, como huésped de Hotel Estelar del Titicaca puedes disfrutar de restaurante disponible allí mismo. Los huéspedes que lleguen en coche tienen acceso a aparcamiento privado gratuito cerca.\nMientras estés en Copacabana no dejes de probar demandados platos de falafel en La Orilla.\nLo mejor de todo es que Hotel Estelar del Titicaca es una estupenda base desde la que conocer numerosas atracciones de Copacabana, como Cerro Calvario (0,5 km), Basílica de Nuestra Señora de Copacabana (0,5 km) y Avenida 6 de Agosto (0,4 km), a las que se puede llegar a pie porque están cerca.\n¡Disfruta de tu estancia en Copacabana!","http://www.titicacabolivia.com/","estelardeltiticaca@hotmail.com","https://www.google.com/maps/place/Hotel+Estelar+Del+Lago+Titicaca/@-16.1658132,-69.089923,15z/data=!4m8!3m7!1s0x0:0xd4ddfc4b8d6279d5!5m2!4m1!1i2!8m2!3d-16.1658132!4d-69.089923","https://www.facebook.com/Hotel.Estelar.del.Titicaca");
INSERT INTO institucion VALUES("33","Hostal Alvasar"," Avenida Busch S/N, 5201 Copacabana, Bolivia"," 68213724","hotel33.jpg","118","1","Este establecimiento se encuentra en Copacabana, a 200 metros de la catedral de Nuestra Señora de Copacabana. El Hostal Alvasar ofrece alojamiento con salón compartido, aparcamiento privado gratuito y jardín. También cuenta con recepción 24 horas, cocina compartida y WiFi gratuita en todas las instalaciones. La posada cuenta con habitaciones familiares.\nLas habitaciones de la posada tienen patio. Todas las habitaciones del Hostal Alvasar disponen de TV de pantalla plana con canales por cable.\nEl establecimiento alberga un solárium.\nLos puntos de interés populares cerca del Hostal Alvasar incluyen el Mercado de Copacabana, El Calvario y la Horca del Inca.","","","https://www.google.com/maps/place/Hostal+Alvasar/@-16.1664582,-69.0876367,15z/data=!4m8!3m7!1s0x0:0x492111ef3011932a!5m2!4m1!1i2!8m2!3d-16.1664582!4d-69.0876367","");
INSERT INTO institucion VALUES("34","Hostal Sonia Copacabana","Calle Murillo N° 256, Copacabana","71968441","hotel34.jpg","119","1","El Hostal Sonia ofrece alojamientos en Copacabana, a 200 metros de la plaza principal y a 100 metros de la catedral de Nuestra Señora de Copacabana. El establecimiento facilita conexión WiFi gratuita y sirve un desayuno diario.\nLas habitaciones disponen de TV por cable y algunas tienen vistas a las montañas o al jardín. Todas las habitaciones incluyen baño privado con secador de pelo y artículos de aseo gratuitos.\nEl Hostal Sonia cuenta con un restaurante y aparcamiento privado gratuito. Se pueden solicitar servicios de traslado, por un suplemento.\nEl Hostal Sonia se encuentra a 200 metros del observatorio astronómico Horca del Inca, a 400 metros del mercado de Copacabana y a 3,5 horas en coche del centro de la ciudad de La Paz.","","hostalsoniacopacabana@gmail.com","https://www.google.com/maps/place/Hostal+Sonia/@-16.1680606,-69.0853649,15z/data=!4m8!3m7!1s0x0:0xa92a3282e5327659!5m2!4m1!1i2!8m2!3d-16.1680606!4d-69.0853649","https://www.facebook.com/HostalSoniaCopacabana");
INSERT INTO institucion VALUES("35","Hotel Casa de La Luna"," Comunidad Yumani - Isla del Sol / Lado Sur, 9999 Comunidad Yumani, Bolivia "," 71908040","hotel35.jpg","120","1"," La Casa de la Luna se encuentra en la mágica y misteriosa isla del Sol, frente a la costa de Copacabana, y ofrece alojamiento con vistas impresionantes al lago Titicaca y a las montañas circundantes de los Andes. Se sirve un desayuno gratuito a diario.\nLas habitaciones están bien equipadas y disponen de toallas, ropa de cama y baño privado con artículos de aseo gratuitos.\nLa Casa de Luna alberga un bar restaurante especializado en platos locales. Además, cuenta con recepción 24 horas, mostrador de información turística, jardín y terraza.\nSe puede llegar a la isla del Sol en barco desde la localidad con encanto de Copacabana. Una vez en la isla, se debe subir a pie por un camino en pendiente ascendente durante unos 30 minutos. Los huéspedes pueden alquilar un burro para el transporte del equipaje. El hotel ofrece una ubicación privilegiada en la isla. Se halla a 30 minutos a pie del tempo del Sol (Pilkokaina). La isla de la Luna queda a 8 km. Copacabana se encuentra a unas 3 horas en coche de las ciudades de La Paz y El Alto.","http://www.casadelalunabolivia.com","","https://www.google.com/maps/dir/-16.4893459,-68.1526216/-16.0369595,-69.1470359/@-16.2623411,-69.2103055,9z/data=!3m1!4b1!4m4!4m3!1m1!4e1!1m0","https://www.facebook.com/hotelcasadelalunaisladelsolbolivia/?ref=page_internal");
INSERT INTO institucion VALUES("37","Hostal Inti-wayra Isla del sol"," Comunidad Yumani"," \n71942015","hotel37.jpg","122","1","El Hostal Inti Wayra está situado en Comunidad Yumani y ofrece jardín. El alojamiento ofrece servicio de habitaciones y conexión WiFi gratuita. Todas las habitaciones de la posada tienen patio con vistas al lago. También incluyen escritorio.","","","https://www.google.com/maps/place/Inti+Wayra+Hostal/@-16.0376583,-69.1473793,15z/data=!4m8!3m7!1s0x0:0x11b6aec80134df35!5m2!4m1!1i2!8m2!3d-16.0376583!4d-69.1473793","https://www.facebook.com/Hostal-Inti-wayra-Isla-del-sol-517467275254054");
INSERT INTO institucion VALUES("39","Posada del Inca Eco-Lodge"," Comunidad Yumani, Isla del Sol","69965565","hotel39.jpg","124","1","La encantadora “Posada del Inca”, está situada en la cima de la Isla del Sol, rodeada de un paisaje bucólico y la majestuosidad de los picos nevados de Los Andes. Es uno de los pocos lugares en el mundo donde aún se puede disfrutar la autenticidad de una naturaleza intacta. Esta casa de hacienda restaurada tiene 20 habitaciones con modernas instalaciones: frazadas eléctricas, baño privado, agua caliente, calefacción individual, restaurante y una vista espectacular del Lago Titicaca. Disfrute de una cálida y acogedora atmósfera, frente a los danzantes llamas de la chimenea en el lounge y bar. Este paraíso- perdido en el tiempo y en el espacio-, es accesible a través de nuestros cruceros de Hydrofoils.","https://www.posadadelinca.com/contact","info@titicaca.com","https://www.google.com/maps/dir/?api=1&destination=-16.036824976588%2C-69.146055377375&fbclid=IwAR1Dw8YAP8YPD58vAvJJS0BidLnMoA2PHTtIE7tteUyLqb7wz0OiuiajOs0","https://www.facebook.com/posadadelinca");
INSERT INTO institucion VALUES("40","Hotel Wendy Mar"," Avenida 16 de Julio s/n, Copacabana Bolivia","76597886","hotel40.jpg","125","1","Nuestro hotel al servicio de usted, tiene habitaciones con vista al lago Titicaca, disponemos de habitaciones Matrimoniales, Dobles, tríples y cuádruples, todas con baño privado y servicio de Wi Fi, incluye el desayuno buffet, estamos hubicados a cudra y media de la parada de bueses (Av. 16 de julio)","http://www.hotelwendymar.com.bo/","reservashotelwendymar19@gmail.com","https://www.google.com/maps/place/Hotel+Wendy+Mar/@-16.1673859,-69.088306,15z/data=!4m2!3m1!1s0x0:0xfa89dfa7a4619a62?sa=X&ved=2ahUKEwinuZ3nksftAhWtLLkGHcxrDdAQ_BIwC3oECBYQBQ","https://www.facebook.com/Hotel-Wendy-Mar-Copacabana-118484406258535");



DROP TABLE IF EXISTS instlang;

CREATE TABLE `instlang` (
  `idinst` int(11) NOT NULL,
  `idlang` int(11) NOT NULL,
  PRIMARY KEY (`idinst`,`idlang`),
  KEY `fk_ila` (`idlang`),
  CONSTRAINT `fk_ihotel` FOREIGN KEY (`idinst`) REFERENCES `institucion` (`idinst`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_ila` FOREIGN KEY (`idlang`) REFERENCES `idioma` (`idlang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO instlang VALUES("9","1");
INSERT INTO instlang VALUES("9","2");
INSERT INTO instlang VALUES("9","5");
INSERT INTO instlang VALUES("10","1");
INSERT INTO instlang VALUES("10","2");
INSERT INTO instlang VALUES("11","1");
INSERT INTO instlang VALUES("11","2");
INSERT INTO instlang VALUES("11","4");
INSERT INTO instlang VALUES("12","1");
INSERT INTO instlang VALUES("12","2");
INSERT INTO instlang VALUES("12","3");
INSERT INTO instlang VALUES("12","4");
INSERT INTO instlang VALUES("13","1");
INSERT INTO instlang VALUES("13","2");
INSERT INTO instlang VALUES("14","1");
INSERT INTO instlang VALUES("14","2");
INSERT INTO instlang VALUES("14","3");



DROP TABLE IF EXISTS instserv;

CREATE TABLE `instserv` (
  `idinst` int(11) NOT NULL,
  `idservicio` int(11) NOT NULL,
  PRIMARY KEY (`idinst`,`idservicio`),
  KEY `fk_ise` (`idservicio`),
  CONSTRAINT `fk_iho` FOREIGN KEY (`idinst`) REFERENCES `institucion` (`idinst`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_ise` FOREIGN KEY (`idservicio`) REFERENCES `servicio` (`idserv`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO instserv VALUES("9","1");
INSERT INTO instserv VALUES("9","2");
INSERT INTO instserv VALUES("9","3");
INSERT INTO instserv VALUES("9","4");
INSERT INTO instserv VALUES("9","5");
INSERT INTO instserv VALUES("9","7");
INSERT INTO instserv VALUES("9","8");
INSERT INTO instserv VALUES("9","9");
INSERT INTO instserv VALUES("9","10");
INSERT INTO instserv VALUES("9","12");
INSERT INTO instserv VALUES("9","13");
INSERT INTO instserv VALUES("9","14");
INSERT INTO instserv VALUES("9","15");
INSERT INTO instserv VALUES("9","16");
INSERT INTO instserv VALUES("9","17");
INSERT INTO instserv VALUES("9","21");
INSERT INTO instserv VALUES("9","22");
INSERT INTO instserv VALUES("9","23");
INSERT INTO instserv VALUES("10","1");
INSERT INTO instserv VALUES("10","2");
INSERT INTO instserv VALUES("10","3");
INSERT INTO instserv VALUES("10","4");
INSERT INTO instserv VALUES("10","5");
INSERT INTO instserv VALUES("10","7");
INSERT INTO instserv VALUES("10","8");
INSERT INTO instserv VALUES("10","12");
INSERT INTO instserv VALUES("10","18");
INSERT INTO instserv VALUES("10","21");
INSERT INTO instserv VALUES("10","22");
INSERT INTO instserv VALUES("10","23");
INSERT INTO instserv VALUES("11","1");
INSERT INTO instserv VALUES("11","5");
INSERT INTO instserv VALUES("11","8");
INSERT INTO instserv VALUES("11","9");
INSERT INTO instserv VALUES("11","10");
INSERT INTO instserv VALUES("11","14");
INSERT INTO instserv VALUES("11","16");
INSERT INTO instserv VALUES("11","17");
INSERT INTO instserv VALUES("11","18");
INSERT INTO instserv VALUES("11","21");
INSERT INTO instserv VALUES("11","22");
INSERT INTO instserv VALUES("12","2");
INSERT INTO instserv VALUES("12","3");
INSERT INTO instserv VALUES("12","5");
INSERT INTO instserv VALUES("12","6");
INSERT INTO instserv VALUES("12","8");
INSERT INTO instserv VALUES("12","9");
INSERT INTO instserv VALUES("12","10");
INSERT INTO instserv VALUES("12","14");
INSERT INTO instserv VALUES("12","15");
INSERT INTO instserv VALUES("12","16");
INSERT INTO instserv VALUES("12","23");
INSERT INTO instserv VALUES("13","24");
INSERT INTO instserv VALUES("13","25");
INSERT INTO instserv VALUES("13","26");
INSERT INTO instserv VALUES("13","29");
INSERT INTO instserv VALUES("13","30");
INSERT INTO instserv VALUES("13","31");
INSERT INTO instserv VALUES("13","32");
INSERT INTO instserv VALUES("14","24");
INSERT INTO instserv VALUES("14","26");
INSERT INTO instserv VALUES("14","29");
INSERT INTO instserv VALUES("14","30");
INSERT INTO instserv VALUES("14","31");
INSERT INTO instserv VALUES("14","33");
INSERT INTO instserv VALUES("15","1");
INSERT INTO instserv VALUES("15","2");
INSERT INTO instserv VALUES("15","3");
INSERT INTO instserv VALUES("15","4");
INSERT INTO instserv VALUES("15","5");
INSERT INTO instserv VALUES("15","6");
INSERT INTO instserv VALUES("15","7");
INSERT INTO instserv VALUES("15","8");
INSERT INTO instserv VALUES("16","2");
INSERT INTO instserv VALUES("16","3");
INSERT INTO instserv VALUES("16","4");
INSERT INTO instserv VALUES("16","5");
INSERT INTO instserv VALUES("16","6");
INSERT INTO instserv VALUES("16","7");
INSERT INTO instserv VALUES("16","8");
INSERT INTO instserv VALUES("16","9");
INSERT INTO instserv VALUES("17","3");
INSERT INTO instserv VALUES("17","4");
INSERT INTO instserv VALUES("17","5");
INSERT INTO instserv VALUES("17","6");
INSERT INTO instserv VALUES("17","7");
INSERT INTO instserv VALUES("17","8");
INSERT INTO instserv VALUES("17","9");
INSERT INTO instserv VALUES("17","10");
INSERT INTO instserv VALUES("18","4");
INSERT INTO instserv VALUES("18","5");
INSERT INTO instserv VALUES("18","6");
INSERT INTO instserv VALUES("18","7");
INSERT INTO instserv VALUES("18","8");
INSERT INTO instserv VALUES("18","9");
INSERT INTO instserv VALUES("18","10");
INSERT INTO instserv VALUES("18","11");
INSERT INTO instserv VALUES("19","5");
INSERT INTO instserv VALUES("19","6");
INSERT INTO instserv VALUES("19","7");
INSERT INTO instserv VALUES("19","8");
INSERT INTO instserv VALUES("19","9");
INSERT INTO instserv VALUES("19","10");
INSERT INTO instserv VALUES("19","11");
INSERT INTO instserv VALUES("19","12");
INSERT INTO instserv VALUES("20","6");
INSERT INTO instserv VALUES("20","7");
INSERT INTO instserv VALUES("20","8");
INSERT INTO instserv VALUES("20","9");
INSERT INTO instserv VALUES("20","10");
INSERT INTO instserv VALUES("20","11");
INSERT INTO instserv VALUES("20","12");
INSERT INTO instserv VALUES("20","13");
INSERT INTO instserv VALUES("21","7");
INSERT INTO instserv VALUES("21","8");
INSERT INTO instserv VALUES("21","9");
INSERT INTO instserv VALUES("21","10");
INSERT INTO instserv VALUES("21","11");
INSERT INTO instserv VALUES("21","12");
INSERT INTO instserv VALUES("21","13");
INSERT INTO instserv VALUES("21","14");
INSERT INTO instserv VALUES("22","1");
INSERT INTO instserv VALUES("22","2");
INSERT INTO instserv VALUES("22","3");
INSERT INTO instserv VALUES("22","4");
INSERT INTO instserv VALUES("22","5");
INSERT INTO instserv VALUES("22","6");
INSERT INTO instserv VALUES("22","7");
INSERT INTO instserv VALUES("22","8");
INSERT INTO instserv VALUES("23","2");
INSERT INTO instserv VALUES("23","3");
INSERT INTO instserv VALUES("23","4");
INSERT INTO instserv VALUES("23","5");
INSERT INTO instserv VALUES("23","6");
INSERT INTO instserv VALUES("23","7");
INSERT INTO instserv VALUES("23","8");
INSERT INTO instserv VALUES("23","9");
INSERT INTO instserv VALUES("24","3");
INSERT INTO instserv VALUES("24","4");
INSERT INTO instserv VALUES("24","5");
INSERT INTO instserv VALUES("24","6");
INSERT INTO instserv VALUES("24","7");
INSERT INTO instserv VALUES("24","8");
INSERT INTO instserv VALUES("24","9");
INSERT INTO instserv VALUES("24","10");
INSERT INTO instserv VALUES("25","4");
INSERT INTO instserv VALUES("25","5");
INSERT INTO instserv VALUES("25","6");
INSERT INTO instserv VALUES("25","7");
INSERT INTO instserv VALUES("25","8");
INSERT INTO instserv VALUES("25","9");
INSERT INTO instserv VALUES("25","10");
INSERT INTO instserv VALUES("25","11");
INSERT INTO instserv VALUES("26","5");
INSERT INTO instserv VALUES("26","6");
INSERT INTO instserv VALUES("26","7");
INSERT INTO instserv VALUES("26","8");
INSERT INTO instserv VALUES("26","9");
INSERT INTO instserv VALUES("26","10");
INSERT INTO instserv VALUES("26","11");
INSERT INTO instserv VALUES("26","12");
INSERT INTO instserv VALUES("27","6");
INSERT INTO instserv VALUES("27","7");
INSERT INTO instserv VALUES("27","8");
INSERT INTO instserv VALUES("27","9");
INSERT INTO instserv VALUES("27","10");
INSERT INTO instserv VALUES("27","11");
INSERT INTO instserv VALUES("27","12");
INSERT INTO instserv VALUES("27","13");
INSERT INTO instserv VALUES("28","7");
INSERT INTO instserv VALUES("28","8");
INSERT INTO instserv VALUES("28","9");
INSERT INTO instserv VALUES("28","10");
INSERT INTO instserv VALUES("28","11");
INSERT INTO instserv VALUES("28","12");
INSERT INTO instserv VALUES("28","13");
INSERT INTO instserv VALUES("28","14");
INSERT INTO instserv VALUES("29","1");
INSERT INTO instserv VALUES("29","2");
INSERT INTO instserv VALUES("29","3");
INSERT INTO instserv VALUES("29","4");
INSERT INTO instserv VALUES("29","5");
INSERT INTO instserv VALUES("29","6");
INSERT INTO instserv VALUES("29","7");
INSERT INTO instserv VALUES("29","8");
INSERT INTO instserv VALUES("30","2");
INSERT INTO instserv VALUES("30","3");
INSERT INTO instserv VALUES("30","4");
INSERT INTO instserv VALUES("30","5");
INSERT INTO instserv VALUES("30","6");
INSERT INTO instserv VALUES("30","7");
INSERT INTO instserv VALUES("30","8");
INSERT INTO instserv VALUES("30","9");
INSERT INTO instserv VALUES("31","1");
INSERT INTO instserv VALUES("31","2");
INSERT INTO instserv VALUES("31","3");
INSERT INTO instserv VALUES("31","4");
INSERT INTO instserv VALUES("31","5");
INSERT INTO instserv VALUES("31","6");
INSERT INTO instserv VALUES("31","7");
INSERT INTO instserv VALUES("31","8");
INSERT INTO instserv VALUES("32","3");
INSERT INTO instserv VALUES("32","4");
INSERT INTO instserv VALUES("32","5");
INSERT INTO instserv VALUES("32","6");
INSERT INTO instserv VALUES("32","7");
INSERT INTO instserv VALUES("32","8");
INSERT INTO instserv VALUES("32","9");



DROP TABLE IF EXISTS objeto;

CREATE TABLE `objeto` (
  `idobj` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`idobj`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO objeto VALUES("1","botella / cantimplora");
INSERT INTO objeto VALUES("2","protector solar");
INSERT INTO objeto VALUES("3","impermeable");
INSERT INTO objeto VALUES("4","enchufe triple");
INSERT INTO objeto VALUES("5","mochila de tela");
INSERT INTO objeto VALUES("6","linterna");
INSERT INTO objeto VALUES("7","gafas de sol");
INSERT INTO objeto VALUES("8","repelente de insectos");
INSERT INTO objeto VALUES("9","mosquitero");
INSERT INTO objeto VALUES("10","sleeping");
INSERT INTO objeto VALUES("11","frazadas");



DROP TABLE IF EXISTS paqatr;

CREATE TABLE `paqatr` (
  `idpaq` int(11) NOT NULL,
  `idatr` int(11) NOT NULL,
  PRIMARY KEY (`idpaq`,`idatr`),
  KEY `fk_idat` (`idatr`),
  CONSTRAINT `fk_idat` FOREIGN KEY (`idatr`) REFERENCES `atractivo` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_idp` FOREIGN KEY (`idpaq`) REFERENCES `paquete` (`idpaq`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO paqatr VALUES("8","2");
INSERT INTO paqatr VALUES("8","4");
INSERT INTO paqatr VALUES("8","6");
INSERT INTO paqatr VALUES("10","4");
INSERT INTO paqatr VALUES("10","5");
INSERT INTO paqatr VALUES("10","6");
INSERT INTO paqatr VALUES("10","10");
INSERT INTO paqatr VALUES("10","14");
INSERT INTO paqatr VALUES("10","15");
INSERT INTO paqatr VALUES("10","21");
INSERT INTO paqatr VALUES("10","30");
INSERT INTO paqatr VALUES("10","32");
INSERT INTO paqatr VALUES("11","2");
INSERT INTO paqatr VALUES("11","4");
INSERT INTO paqatr VALUES("11","12");
INSERT INTO paqatr VALUES("11","15");
INSERT INTO paqatr VALUES("11","16");
INSERT INTO paqatr VALUES("11","18");
INSERT INTO paqatr VALUES("11","20");
INSERT INTO paqatr VALUES("11","21");
INSERT INTO paqatr VALUES("11","30");
INSERT INTO paqatr VALUES("11","33");
INSERT INTO paqatr VALUES("11","34");
INSERT INTO paqatr VALUES("12","1");
INSERT INTO paqatr VALUES("12","5");
INSERT INTO paqatr VALUES("12","6");
INSERT INTO paqatr VALUES("12","10");
INSERT INTO paqatr VALUES("12","13");
INSERT INTO paqatr VALUES("12","24");
INSERT INTO paqatr VALUES("12","26");
INSERT INTO paqatr VALUES("12","32");
INSERT INTO paqatr VALUES("13","4");
INSERT INTO paqatr VALUES("13","12");
INSERT INTO paqatr VALUES("13","21");
INSERT INTO paqatr VALUES("13","23");
INSERT INTO paqatr VALUES("13","30");
INSERT INTO paqatr VALUES("14","4");
INSERT INTO paqatr VALUES("14","12");
INSERT INTO paqatr VALUES("14","21");
INSERT INTO paqatr VALUES("14","23");
INSERT INTO paqatr VALUES("14","30");
INSERT INTO paqatr VALUES("15","2");
INSERT INTO paqatr VALUES("16","2");
INSERT INTO paqatr VALUES("16","18");
INSERT INTO paqatr VALUES("17","18");
INSERT INTO paqatr VALUES("18","1");
INSERT INTO paqatr VALUES("18","4");
INSERT INTO paqatr VALUES("18","5");
INSERT INTO paqatr VALUES("18","10");
INSERT INTO paqatr VALUES("18","13");
INSERT INTO paqatr VALUES("18","14");
INSERT INTO paqatr VALUES("18","15");
INSERT INTO paqatr VALUES("18","17");
INSERT INTO paqatr VALUES("18","21");



DROP TABLE IF EXISTS paqhot;

CREATE TABLE `paqhot` (
  `idpaq` int(11) NOT NULL,
  `idhot` int(11) NOT NULL,
  PRIMARY KEY (`idpaq`,`idhot`),
  KEY `fk_idhot` (`idhot`),
  CONSTRAINT `fk_idhot` FOREIGN KEY (`idhot`) REFERENCES `hotel` (`idinst`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_idpaq` FOREIGN KEY (`idpaq`) REFERENCES `paquete` (`idpaq`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;




DROP TABLE IF EXISTS paqobj;

CREATE TABLE `paqobj` (
  `idpaq` int(11) NOT NULL,
  `idobj` int(11) NOT NULL,
  PRIMARY KEY (`idpaq`,`idobj`),
  KEY `fk_idob` (`idobj`),
  CONSTRAINT `fk_idob` FOREIGN KEY (`idobj`) REFERENCES `objeto` (`idobj`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_idpa` FOREIGN KEY (`idpaq`) REFERENCES `paquete` (`idpaq`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO paqobj VALUES("8","1");
INSERT INTO paqobj VALUES("8","2");
INSERT INTO paqobj VALUES("8","4");
INSERT INTO paqobj VALUES("8","5");
INSERT INTO paqobj VALUES("8","7");
INSERT INTO paqobj VALUES("8","10");
INSERT INTO paqobj VALUES("8","11");
INSERT INTO paqobj VALUES("10","1");
INSERT INTO paqobj VALUES("10","2");
INSERT INTO paqobj VALUES("10","3");
INSERT INTO paqobj VALUES("10","4");
INSERT INTO paqobj VALUES("10","5");
INSERT INTO paqobj VALUES("10","6");
INSERT INTO paqobj VALUES("11","2");
INSERT INTO paqobj VALUES("11","3");
INSERT INTO paqobj VALUES("11","4");
INSERT INTO paqobj VALUES("11","5");
INSERT INTO paqobj VALUES("11","6");
INSERT INTO paqobj VALUES("11","7");
INSERT INTO paqobj VALUES("12","3");
INSERT INTO paqobj VALUES("12","4");
INSERT INTO paqobj VALUES("12","5");
INSERT INTO paqobj VALUES("12","6");
INSERT INTO paqobj VALUES("12","7");
INSERT INTO paqobj VALUES("12","8");
INSERT INTO paqobj VALUES("13","4");
INSERT INTO paqobj VALUES("13","5");
INSERT INTO paqobj VALUES("13","6");
INSERT INTO paqobj VALUES("13","7");
INSERT INTO paqobj VALUES("13","8");
INSERT INTO paqobj VALUES("13","9");
INSERT INTO paqobj VALUES("14","5");
INSERT INTO paqobj VALUES("14","6");
INSERT INTO paqobj VALUES("14","7");
INSERT INTO paqobj VALUES("14","8");
INSERT INTO paqobj VALUES("14","9");
INSERT INTO paqobj VALUES("14","10");
INSERT INTO paqobj VALUES("15","6");
INSERT INTO paqobj VALUES("15","7");
INSERT INTO paqobj VALUES("15","8");
INSERT INTO paqobj VALUES("15","9");
INSERT INTO paqobj VALUES("15","10");
INSERT INTO paqobj VALUES("15","11");
INSERT INTO paqobj VALUES("16","1");
INSERT INTO paqobj VALUES("16","2");
INSERT INTO paqobj VALUES("16","3");
INSERT INTO paqobj VALUES("16","4");
INSERT INTO paqobj VALUES("16","5");
INSERT INTO paqobj VALUES("16","6");
INSERT INTO paqobj VALUES("17","2");
INSERT INTO paqobj VALUES("17","3");
INSERT INTO paqobj VALUES("17","4");
INSERT INTO paqobj VALUES("17","5");
INSERT INTO paqobj VALUES("17","6");
INSERT INTO paqobj VALUES("17","7");
INSERT INTO paqobj VALUES("18","3");
INSERT INTO paqobj VALUES("18","4");
INSERT INTO paqobj VALUES("18","5");
INSERT INTO paqobj VALUES("18","6");
INSERT INTO paqobj VALUES("18","7");
INSERT INTO paqobj VALUES("18","8");
INSERT INTO paqobj VALUES("19","4");
INSERT INTO paqobj VALUES("19","5");
INSERT INTO paqobj VALUES("19","6");
INSERT INTO paqobj VALUES("19","7");
INSERT INTO paqobj VALUES("19","8");
INSERT INTO paqobj VALUES("19","9");
INSERT INTO paqobj VALUES("20","5");
INSERT INTO paqobj VALUES("20","6");
INSERT INTO paqobj VALUES("20","7");
INSERT INTO paqobj VALUES("20","8");
INSERT INTO paqobj VALUES("20","9");
INSERT INTO paqobj VALUES("20","10");
INSERT INTO paqobj VALUES("21","6");
INSERT INTO paqobj VALUES("21","7");
INSERT INTO paqobj VALUES("21","8");
INSERT INTO paqobj VALUES("21","9");
INSERT INTO paqobj VALUES("21","10");
INSERT INTO paqobj VALUES("21","11");
INSERT INTO paqobj VALUES("22","1");
INSERT INTO paqobj VALUES("22","2");
INSERT INTO paqobj VALUES("22","3");
INSERT INTO paqobj VALUES("22","4");
INSERT INTO paqobj VALUES("22","5");
INSERT INTO paqobj VALUES("22","6");
INSERT INTO paqobj VALUES("23","2");
INSERT INTO paqobj VALUES("23","3");
INSERT INTO paqobj VALUES("23","4");
INSERT INTO paqobj VALUES("23","5");
INSERT INTO paqobj VALUES("23","6");
INSERT INTO paqobj VALUES("23","7");
INSERT INTO paqobj VALUES("24","3");
INSERT INTO paqobj VALUES("24","4");
INSERT INTO paqobj VALUES("24","5");
INSERT INTO paqobj VALUES("24","6");
INSERT INTO paqobj VALUES("24","7");
INSERT INTO paqobj VALUES("24","8");



DROP TABLE IF EXISTS paqserv;

CREATE TABLE `paqserv` (
  `idpaq` int(11) NOT NULL,
  `idserv` int(11) NOT NULL,
  PRIMARY KEY (`idpaq`,`idserv`),
  KEY `fk_ise1` (`idserv`),
  CONSTRAINT `fk_ipp1` FOREIGN KEY (`idpaq`) REFERENCES `paquete` (`idpaq`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_ise1` FOREIGN KEY (`idserv`) REFERENCES `servicio` (`idserv`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO paqserv VALUES("8","25");
INSERT INTO paqserv VALUES("8","26");
INSERT INTO paqserv VALUES("8","27");
INSERT INTO paqserv VALUES("8","28");
INSERT INTO paqserv VALUES("8","29");
INSERT INTO paqserv VALUES("8","31");
INSERT INTO paqserv VALUES("8","33");
INSERT INTO paqserv VALUES("10","25");
INSERT INTO paqserv VALUES("10","26");
INSERT INTO paqserv VALUES("10","27");
INSERT INTO paqserv VALUES("10","28");
INSERT INTO paqserv VALUES("10","29");
INSERT INTO paqserv VALUES("10","30");
INSERT INTO paqserv VALUES("10","31");
INSERT INTO paqserv VALUES("11","25");
INSERT INTO paqserv VALUES("11","26");
INSERT INTO paqserv VALUES("11","27");
INSERT INTO paqserv VALUES("11","28");
INSERT INTO paqserv VALUES("11","29");
INSERT INTO paqserv VALUES("11","30");
INSERT INTO paqserv VALUES("11","31");
INSERT INTO paqserv VALUES("12","25");
INSERT INTO paqserv VALUES("12","26");
INSERT INTO paqserv VALUES("12","27");
INSERT INTO paqserv VALUES("12","28");
INSERT INTO paqserv VALUES("12","29");
INSERT INTO paqserv VALUES("12","30");
INSERT INTO paqserv VALUES("12","31");
INSERT INTO paqserv VALUES("13","25");
INSERT INTO paqserv VALUES("13","26");
INSERT INTO paqserv VALUES("13","27");
INSERT INTO paqserv VALUES("13","28");
INSERT INTO paqserv VALUES("13","29");
INSERT INTO paqserv VALUES("13","30");
INSERT INTO paqserv VALUES("14","25");
INSERT INTO paqserv VALUES("14","26");
INSERT INTO paqserv VALUES("14","27");
INSERT INTO paqserv VALUES("14","28");
INSERT INTO paqserv VALUES("14","29");
INSERT INTO paqserv VALUES("14","30");
INSERT INTO paqserv VALUES("14","31");
INSERT INTO paqserv VALUES("15","27");
INSERT INTO paqserv VALUES("15","28");
INSERT INTO paqserv VALUES("15","29");
INSERT INTO paqserv VALUES("15","30");
INSERT INTO paqserv VALUES("15","31");
INSERT INTO paqserv VALUES("16","25");
INSERT INTO paqserv VALUES("16","26");
INSERT INTO paqserv VALUES("16","27");
INSERT INTO paqserv VALUES("16","28");
INSERT INTO paqserv VALUES("16","29");
INSERT INTO paqserv VALUES("16","30");
INSERT INTO paqserv VALUES("16","31");
INSERT INTO paqserv VALUES("17","25");
INSERT INTO paqserv VALUES("17","26");
INSERT INTO paqserv VALUES("17","27");
INSERT INTO paqserv VALUES("17","28");
INSERT INTO paqserv VALUES("17","29");
INSERT INTO paqserv VALUES("17","30");
INSERT INTO paqserv VALUES("17","31");
INSERT INTO paqserv VALUES("18","25");
INSERT INTO paqserv VALUES("18","26");
INSERT INTO paqserv VALUES("18","28");
INSERT INTO paqserv VALUES("18","29");
INSERT INTO paqserv VALUES("18","30");
INSERT INTO paqserv VALUES("18","31");
INSERT INTO paqserv VALUES("19","25");
INSERT INTO paqserv VALUES("19","26");
INSERT INTO paqserv VALUES("19","27");
INSERT INTO paqserv VALUES("19","28");
INSERT INTO paqserv VALUES("19","29");
INSERT INTO paqserv VALUES("19","30");
INSERT INTO paqserv VALUES("19","31");
INSERT INTO paqserv VALUES("20","25");
INSERT INTO paqserv VALUES("20","26");
INSERT INTO paqserv VALUES("20","27");
INSERT INTO paqserv VALUES("20","28");
INSERT INTO paqserv VALUES("20","29");
INSERT INTO paqserv VALUES("20","30");
INSERT INTO paqserv VALUES("20","31");
INSERT INTO paqserv VALUES("21","25");
INSERT INTO paqserv VALUES("21","26");
INSERT INTO paqserv VALUES("21","27");
INSERT INTO paqserv VALUES("21","28");
INSERT INTO paqserv VALUES("21","29");
INSERT INTO paqserv VALUES("22","25");
INSERT INTO paqserv VALUES("22","26");
INSERT INTO paqserv VALUES("22","27");
INSERT INTO paqserv VALUES("22","28");
INSERT INTO paqserv VALUES("22","29");
INSERT INTO paqserv VALUES("22","30");
INSERT INTO paqserv VALUES("22","31");
INSERT INTO paqserv VALUES("23","25");
INSERT INTO paqserv VALUES("23","26");
INSERT INTO paqserv VALUES("23","27");
INSERT INTO paqserv VALUES("23","28");
INSERT INTO paqserv VALUES("23","29");
INSERT INTO paqserv VALUES("23","30");
INSERT INTO paqserv VALUES("23","31");
INSERT INTO paqserv VALUES("24","25");
INSERT INTO paqserv VALUES("24","26");
INSERT INTO paqserv VALUES("24","27");
INSERT INTO paqserv VALUES("24","28");
INSERT INTO paqserv VALUES("24","29");
INSERT INTO paqserv VALUES("24","30");
INSERT INTO paqserv VALUES("24","31");



DROP TABLE IF EXISTS paquete;

CREATE TABLE `paquete` (
  `idpaq` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `detalle` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `precio` decimal(5,2) DEFAULT NULL,
  `idagencia` int(11) DEFAULT NULL,
  `imgpaq` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cantidadp` int(11) DEFAULT NULL,
  `tipopaq` int(1) DEFAULT NULL,
  PRIMARY KEY (`idpaq`),
  KEY `fk_iag` (`idagencia`),
  CONSTRAINT `fk_iag` FOREIGN KEY (`idagencia`) REFERENCES `agencia` (`idinst`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO paquete VALUES("8","COPACABANA + ISLA DEL SOL","¡Conoce el LAGO SAGRADO!\nNosotros proponemos el destino y tu escoges el paquete de tu preferencia","800.00","13","129716923_2812335342421143_1160917439373583466_o.jpg","30","3");
INSERT INTO paquete VALUES("10","COPACABANA E ISLA DEL SOL","¡Visita Copacabana! un lugar hermoso e imperdible para conocer atractivos turísticos únicos en el Mundo!","980.00","13","paquete10.jpg","30","3");
INSERT INTO paquete VALUES("11","CRUCERO POR EL LAGO TITICACA","• Transporte en bus privado La Paz – Guaqui – Tiwanacu - La Paz. • Ingreso y visita guiada a los Museos de Guaqui. • Recorrido por la bahía de Guaqui en el Buque más grande de Bolivia. • Ingresos al s","500.00","14","paquete11.jpg","40","1");
INSERT INTO paquete VALUES("12","Anio Nuevo en Ecolodge La Estancia","¡Recibe el 2021 con nuevas energías en la paradisíaca Isla del Sol!","999.99","14","paquete12.jpg","40","2");
INSERT INTO paquete VALUES("13","TOUR A LA ISLA DEL SOL EN 1 DÍA DESDE COPACABANA","Conoce la Isla del Sol, en donde se encuentra los restos Arqueológicos dedicados al culto del sol o Inti. Ven con nosotros y descubre el origen del imperio incaico en el Lago Navegable más alto del mundo. ","357.00","13","paquete13.jpg","40","1");
INSERT INTO paquete VALUES("14","TOUR ISLA DEL SOL Y LA LUNA 2D/1N","Las Islas del Sol y la Luna: La Isla del Sol o isla Titicaca es una isla boliviana situada en el lago Titicaca, es la isla más grande del lago. Por otra parte, la Isla de la Luna, es una pequeña y escarpada isla que en la época del Imperio inca contaba con un templo denominado Iñakuyu o Palacio de las vírgenes de sol, donde habitaban las denominadas vírgenes del sol. ","875.00","14","paquete14.jpg","30","3");
INSERT INTO paquete VALUES("15","KAYAK A ORILLAS DEL LAGO TITICACA 3 HORAS.","Lago Titicaca es el lago navegable más alto del mundo y es un privilegio hacer el deporte de Kayak en él. Este tour es dirigido para todas las personas que deseen experimentar un pequeño paseo en kayak, sin necesidad de tener experiencia en el deporte mencionado; además se disfruta de la diversidad biológica y la utilización sostenible de los recursos de flora, siendo la totora la planta más famosa, y fauna silvestre (anfibios, reptiles, mamíferos y aves).","280.00","13","paquete15.jpg","25","1");
INSERT INTO paquete VALUES("16","KAYAK Y AVISTAMIENTO DE AVES EN EL LAGO TITICACA 4 HORAS.","La Reserva Nacional del Titicaca, forma parte del Sistema Nacional de Áreas Naturales Protegidas por el estado peruano (SINANPE) es un área destinada a la conservación de la diversidad biológica y la utilización sostenible de los recursos de flora, siendo la totora la planta más famosa y fauna (anfibios, reptiles, mamíferos y aves).","371.00","14","paquete16.jpg","28","1");
INSERT INTO paquete VALUES("17","TOUR PRIVADO A LAS ISLAS FLOTANTES LOS UROS EN 3 HORAS","A 5 km. de la ciudad de Puno, en el Lago Titicaca, se encuentran las Islas Flotantes de los Uros, en las más de 80 islas se sigue manteniendo la tradición de la pesca artesanal, especialmente del carachi y el pejerrey; también se dedican a la caza de aves silvestres y a la recolección de huevos de pato. A comienzos del siglo XXI han dirigido sus actividades al turismo y se han convertido en un punto obligado en el recorrido de los turistas que pasan por la ciudad de Puno.","224.00","13","paquete17.jpg","28","1");
INSERT INTO paquete VALUES("18"," Excursion a Copacabana e Isla del Sol desde La Paz","Disfruta del famoso Lago Titicaca con este tour por Copacabana e Isla del Sol.¡Es una experiencia completa e imperdible!","784.00","14","paquete18.jpg","30","1");
INSERT INTO paquete VALUES("19","ZIPLINE COPACABANA"," ZIPLINE Copacabana es una agencia de servicios de deporte extremo y aventura, que brinda al visitante una manera de vivir y disfrutar de nuevas experiencias en Copacabana.","250.00","14","paquete19.jpg","25","1");
INSERT INTO paquete VALUES("20"," ISLA SUNATA A COPACABANA ","Este fin de semana viaja con nosotros!!Sábado 12 de diciembre : COPACABANA-ISLA SUNATA","210.00","13","paquete20.jpg","35","1");
INSERT INTO paquete VALUES("21","Copacabana, Isla del Sol","En este tour Full Day, podrá conocer uno de los destinos más representativos de La Paz y Bolivia, inicialmente la población de Copacabana que se destaca por ser un centro histórico cultural en Bolivia, además de ser el punto de acceso al Lago Titicaca. el lago navegable más alto del mundo donde podrá visitar la famosa Isla del Sol.  ","385.00","14","paquete21.jpg","30","1");
INSERT INTO paquete VALUES("22","Copacabana, islas flotantes","En este tour de día completo, podrá conocer uno de los destinos más representativos de La Paz y Bolivia, inicialmente la población de Copacabana que se destaca por ser un centro histórico cultural en Bolivia donde se encuentra la famosa Basílica de Copacabana y El Mirador del Calvario entre otros, además de ser el punto de acceso al Lago Titicaca el lago navegable más alto del mundo donde podrás visitar las islas flotantes.","490.00","13","paquete22.jpg","35","1");
INSERT INTO paquete VALUES("23","Isla de la Luna, Isla del Sol, Copacabana","En este tour de 2 días / 1 noche podrás conocer los atractivos más importantes de Copacabana y alrededores. La población de Copacabana se destaca por ser un centro histórico cultural en Bolivia donde se ubican la famosa Basílica de Copacabana y El Mirador del Calvario entre otros, además es el punto de acceso al Lago Titicaca, el lago navegable más alto del mundo, donde se se pueden visitar las dos islas más importantes de este lago, una es la Isla del Sol, cuna de la cultura Inca, y la Isla de ","945.00","14","paquete23.jpg","35","3");
INSERT INTO paquete VALUES("24","CRUCERO EN CATAMARAN, LAGO TITICACA (TITIKAKA)","PASEA EN EL LAGO NAVEGABLE MAS ALTO DEL MUNDO A BORDO DE UN CRUCERO CATAMARÁN","398.00","13","paquete24.jpg","50","3");



DROP TABLE IF EXISTS reserva;

CREATE TABLE `reserva` (
  `idres` int(11) NOT NULL AUTO_INCREMENT,
  `idpaq` int(11) NOT NULL,
  `idus` int(11) NOT NULL,
  `fechareserva` date DEFAULT curdate(),
  `cantper` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 0,
  `fechasol` date DEFAULT NULL,
  PRIMARY KEY (`idres`,`idpaq`,`idus`),
  KEY `fk_idpaque` (`idpaq`),
  KEY `fk_idclie` (`idus`),
  CONSTRAINT `fk_idclie` FOREIGN KEY (`idus`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_idpaque` FOREIGN KEY (`idpaq`) REFERENCES `paquete` (`idpaq`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO reserva VALUES("4","8","85","2020-12-06","3","1","2020-12-17");
INSERT INTO reserva VALUES("5","8","74","2020-12-09","4","1","2020-12-25");
INSERT INTO reserva VALUES("6","8","74","2020-12-10","5","1","2020-12-25");
INSERT INTO reserva VALUES("7","20","5","2020-12-17","4","1","2020-12-26");
INSERT INTO reserva VALUES("8","12","141","2021-01-11","5","0","2021-01-01");
INSERT INTO reserva VALUES("9","19","149","2021-01-12","3","0","2021-01-20");
INSERT INTO reserva VALUES("10","15","5","2021-01-18","3","1","2021-01-26");
INSERT INTO reserva VALUES("12","24","167","2021-02-22","4","1","2021-02-25");
INSERT INTO reserva VALUES("13","12","2","2021-02-23","2","0","2021-02-26");
INSERT INTO reserva VALUES("14","19","2","2021-02-24","1","0","2021-02-27");
INSERT INTO reserva VALUES("15","22","2","2021-02-24","3","0","2021-02-27");



DROP TABLE IF EXISTS servicio;

CREATE TABLE `servicio` (
  `idserv` int(11) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tiposer` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`idserv`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO servicio VALUES("1","estacionamiento gratis","0");
INSERT INTO servicio VALUES("2","desayuno gratis","0");
INSERT INTO servicio VALUES("3","almacenamiento de equipaje","0");
INSERT INTO servicio VALUES("4","recepcion disponible las 24 horas","0");
INSERT INTO servicio VALUES("5","wi-fi gratuito","0");
INSERT INTO servicio VALUES("6","excursionismo","0");
INSERT INTO servicio VALUES("7","conserje","0");
INSERT INTO servicio VALUES("8","servicio de lavanderia","0");
INSERT INTO servicio VALUES("9","restaurante","0");
INSERT INTO servicio VALUES("10","cambio de divisas","0");
INSERT INTO servicio VALUES("11","bañera de hidromasaje","0");
INSERT INTO servicio VALUES("12","sala de juegos","0");
INSERT INTO servicio VALUES("13","libros, dvd, musica para niños","0");
INSERT INTO servicio VALUES("14","comedor al aire libre","0");
INSERT INTO servicio VALUES("15","actividades infatiles (ideal para la familia)","0");
INSERT INTO servicio VALUES("16","muebles de exterior","0");
INSERT INTO servicio VALUES("17","billar","0");
INSERT INTO servicio VALUES("18","salas de reuniones","0");
INSERT INTO servicio VALUES("19","tenis de mesa","0");
INSERT INTO servicio VALUES("20","servicio de planchado","0");
INSERT INTO servicio VALUES("21","bar/salon","0");
INSERT INTO servicio VALUES("22","desayuno bufet","0");
INSERT INTO servicio VALUES("23","hotel para no fumadores","0");
INSERT INTO servicio VALUES("24","zipline","1");
INSERT INTO servicio VALUES("25","actividad acuatica","1");
INSERT INTO servicio VALUES("26","guias especializados","1");
INSERT INTO servicio VALUES("27","hospedaje","1");
INSERT INTO servicio VALUES("28","alimentación","1");
INSERT INTO servicio VALUES("29","trekking","1");
INSERT INTO servicio VALUES("30","parapente","1");
INSERT INTO servicio VALUES("31","city tour","1");
INSERT INTO servicio VALUES("32","equipo de bioseguridad","1");
INSERT INTO servicio VALUES("33","seguro contra accidentes","1");



DROP TABLE IF EXISTS tipohab;

CREATE TABLE `tipohab` (
  `idtipo` int(11) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`idtipo`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO tipohab VALUES("1","individual");
INSERT INTO tipohab VALUES("2","doble");
INSERT INTO tipohab VALUES("3","triple");
INSERT INTO tipohab VALUES("4","quad");
INSERT INTO tipohab VALUES("5","queen");
INSERT INTO tipohab VALUES("6","king");
INSERT INTO tipohab VALUES("7","doble-doble");
INSERT INTO tipohab VALUES("8","suite");
INSERT INTO tipohab VALUES("9","suite ejecutiva");
INSERT INTO tipohab VALUES("10","suite presidencial");
INSERT INTO tipohab VALUES("11","estadia prolongada");
INSERT INTO tipohab VALUES("12","cabaña");
INSERT INTO tipohab VALUES("13","piso ejecutivo");



DROP TABLE IF EXISTS tipous;

CREATE TABLE `tipous` (
  `idt` int(11) NOT NULL AUTO_INCREMENT,
  `tipous` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`idt`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO tipous VALUES("1","administrador");
INSERT INTO tipous VALUES("2","encargado");
INSERT INTO tipous VALUES("3","cliente");
INSERT INTO tipous VALUES("4","super admin");



DROP TABLE IF EXISTS usuario;

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombrecom` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `pass` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telefono` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `dni` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `idtipou` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tu` (`idtipou`),
  CONSTRAINT `fk_tu` FOREIGN KEY (`idtipou`) REFERENCES `tipous` (`idt`)
) ENGINE=InnoDB AUTO_INCREMENT=168 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO usuario VALUES("2","Carla Rimba","cris@gmail.com","12345","78552545","8588652","3");
INSERT INTO usuario VALUES("5","Roberto Lagos","robertLee@gmail.com","1010","21512455","4565458","3");
INSERT INTO usuario VALUES("6","Andrea Murillo","mariamurillo25@gmail.com","andrea35","791125653","4513265","3");
INSERT INTO usuario VALUES("7","Reemberto Agustin","25agustinr@gmail.com","agus10","2356664","2025441","3");
INSERT INTO usuario VALUES("51","Juan F. Limachi","juanlimachi@gmail.com","12345","78945214","2632155","2");
INSERT INTO usuario VALUES("52","Felix Quispe","felixquis254@gmail.com","12345","73522585","2025","2");
INSERT INTO usuario VALUES("74","Alex Salazar","alex@gmail.com","123456","76523221","854232545","3");
INSERT INTO usuario VALUES("75","Martin Stratker","martinstr123@gmail.com","12345","67088464","568542","2");
INSERT INTO usuario VALUES("78","Jimena Cerruto","jimena2@gmail.com","12345","61216655","8542136","2");
INSERT INTO usuario VALUES("82","José Luis Alanes","josealanes@gmail.com","101010","72545652","3524684","2");
INSERT INTO usuario VALUES("83","Romina García","beluugarcia12@gmail.com","12345","75845235","544663","2");
INSERT INTO usuario VALUES("85","Ernesto Gutierrez","ernst522@gmail.com","12345","61245869","5864523","3");
INSERT INTO usuario VALUES("86","Erik Maquera","admin","admin","61216696","8286974","4");
INSERT INTO usuario VALUES("101","Ana Blanco","ana@gmas.com","123123","76254541","123123","3");
INSERT INTO usuario VALUES("102","Daniela Helguera","helegueradani@gmail.com","12345","2356412","452255","2");
INSERT INTO usuario VALUES("103","Delia Espejo","delia8541@gmail.com","12345","78945211","12345","3");
INSERT INTO usuario VALUES("104","Enrique Fernandez","enriqueferv@gmail.com","12345","65232152","3356422","3");
INSERT INTO usuario VALUES("105","German Perez","bardock2536@gmail.com","12345","77798566","4512","3");
INSERT INTO usuario VALUES("106","Fernando Mendoza","fernando5men@gmail.com","12345","62235264","5264623","3");
INSERT INTO usuario VALUES("107","Katherinne Lima","katylima2@gmail.com","12345","65256521","5654123","3");
INSERT INTO usuario VALUES("108","Marco Navia","marcona52@gmail.com","12345","77254441","3561233","3");
INSERT INTO usuario VALUES("109","Omar Pascual","pascualparedes34@gmail.com","12345","75241552","253646","3");
INSERT INTO usuario VALUES("110","Avril Georgina","avrilgeo75@gmail.com","12345","65245563","2025","3");
INSERT INTO usuario VALUES("111","Victor Felipez","vicfelipez_23@gmail.com","12345","78952663","2025","3");
INSERT INTO usuario VALUES("112","Teresa Estrada","tere_1991@gmail.com","12345","62532112","2025","3");
INSERT INTO usuario VALUES("113","Guadalupe Reinaga","reinaguad4@gmail.com","12345","79112325","2025","3");
INSERT INTO usuario VALUES("114","Leticia Diaz","mali_leti4@gmail.com","12345","79135421","2025","3");
INSERT INTO usuario VALUES("115","Fernanda Ramos","ferisita_g56@gmail.com","12345","75246632","2025","3");
INSERT INTO usuario VALUES("116","Luis Miguel Quiroga","luismiq4@gmail.com","12345","72545633","2025","3");
INSERT INTO usuario VALUES("117","Esperanza Pardo","esperanzap4@outlook.com","12345","2213456","2025","3");
INSERT INTO usuario VALUES("118","Melissa Cori","meli_cori1997@gmail.com","12345","78952142","2025","3");
INSERT INTO usuario VALUES("119","Nahuel Flores","nahuel_dark12@gmail.com","12345","71245322","2025","3");
INSERT INTO usuario VALUES("120","Omar Palavecino","omarchiki@gmail.com","12345","74215365","2025","3");
INSERT INTO usuario VALUES("121","Kelly Quiroga Soliz","kelicita_qs1@gmail.com","12345","72589665","2025","3");
INSERT INTO usuario VALUES("122","Richard Echeverria","richar_prins@gmail.com","12345","76212322","2025","3");
INSERT INTO usuario VALUES("123","dos mil","vvv@gmas.com","12345","1","2025","2");
INSERT INTO usuario VALUES("124","Carla Nuñez","carla_nuñez45@gmas.com","12345","75844162","2025","3");
INSERT INTO usuario VALUES("125","Gerardo Felix Mendoza","felix_ger14@gmail.com","12345","78954411","2025","3");
INSERT INTO usuario VALUES("129","Ana Patricia Morales","anita_fer4@gmail.com","12345","77248556","2025","3");
INSERT INTO usuario VALUES("135","Alejandra Quiñonez Hurtado","alecita_bb@gmail.com","12345","75245662","2025","3");
INSERT INTO usuario VALUES("139","Mario Paredes","smario_541@gmail.com","12345","72541133","2025","3");
INSERT INTO usuario VALUES("141","Jimena Vaca","jime_estrella54@gmail.com","12345","72544332","2025","3");
INSERT INTO usuario VALUES("149","Raúl Ontiveros Saravia","raul_saravia452@gmail.com","12345","72044521","2025","3");
INSERT INTO usuario VALUES("167","Bryan Adan Duarte","bryanduarte@gmail.com","265341","78541220","265341","3");



SET FOREIGN_KEY_CHECKS=1;