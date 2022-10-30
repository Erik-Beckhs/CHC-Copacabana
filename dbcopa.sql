-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-05-2021 a las 22:59:34
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbcopa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agencia`
--

CREATE TABLE `agencia` (
  `idinst` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `agencia`
--

INSERT INTO `agencia` (`idinst`) VALUES
(13),
(14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atractivo`
--

CREATE TABLE `atractivo` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ubicacion` varchar(300) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `dificultad` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `descripcion` varchar(1000) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `temporadaideal` varchar(400) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `img` varchar(300) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `llegada` varchar(300) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `idcat` int(11) DEFAULT NULL,
  `localidad` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `videoAtr` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `atractivo`
--

INSERT INTO `atractivo` (`ID`, `nombre`, `ubicacion`, `dificultad`, `descripcion`, `temporadaideal`, `img`, `llegada`, `activo`, `idcat`, `localidad`, `videoAtr`) VALUES
(1, 'Observatorio Astronómico (Horca del Inca)', 'Cerro Seroka - Copacabana', 'Alta', 'También denominada “Pachataqa”, se encuentra a 500 metros al sur del pueblo de Copacabana, en el cerro Kesanani. Un monumento lítico, enigmático de antigüedad precolombina, y mal denominado “Horca del Inca”, por los españoles, ya que no comprendieron el significado de este monumento, la denominación más cercana, ya mencionada Pachataqa o “lugar donde se mide el tiempo”. Denominada así, porque es un observatorio astronómico, con todos los elementos que permitían verificar los solsticios, y equinoccios. De acuerdo a verificaciones arqueológicas  tendría una antigüedad que data del año 1.764 a. de C.  Pachataqa, es un conjunto labrado en roca, que comprende dos bloques independientes verticales, el mayor mide 6 metros, y una sola piedra, a manera de travesaño.', 'Todo el año', 'horca.jpg', 'Dada la cercanía del atractivo, se recomienda realizar una caminata al lugar, dirigirse al cerro Seroka en las afueras de la zona Wajrapila en la zona norte de la población', 1, 1, 'Copacabana', NULL),
(4, 'Isla del Sol', 'Lago Titicaca Provincia Manco Kapaz', 'Baja', 'La Isla del Sol es un destino de gran belleza con terrazas de cultivos y el lago azul de fondo. Además es un sitio muy especial ya que se considera el lugar donde se inició el imperio Inca. Cuenta la leyenda que en dicha isla, Manco Capac y su mujer, Mama Ocllo, iniciaron la dinastía Inca y desde allí partieron a fundar Cuzco.', 'Todo el año', 'ISLA.jpg', 'La Isla del Sol está ubicada en el Lago Titicaca, a una hora y media de navegación desde Copacabana. Las lanchas y botes parten desde la playa del centro del pueblo y llegan al embarcadero de la isla.  El precio del viaje se puede negociar y depende en parte de la cantidad de personas que viajen a l', 1, 1, 'Isla del Sol', NULL),
(6, 'Basilica de Copacabana', 'Plaza 2 de Febrero', 'Baja', 'La Basilica mayor del santuario de Copacabana es un patrimonio nacional', 'Todo el año, preferentemente Febrero, Mayo, Julio, Agosto, Noviembre y Diciembre', 'a4.jpg', 'Dada la significativa presencia, basta con ubicarse en la plaza principal del Santuario', 0, 2, 'Copacabana', NULL),
(7, 'Museo Kusijata', 'Comunidad Kusijata a 5 Km de Copacabana', 'Baja', 'El museo de Kusijata muestra a sus visitantes importantes reliquias encontradas en el lugar, chullpas, ceramicas y demas pertenecientes a una civilizacion anterior a la inca.', 'Todo el año', 'museokusijata.jpeg', 'Dada la proximidad del mismo con el Santuario se recomienda realizar una caminata, alquilar una bicicleta o tomar los taxis y minibuses con salida hacia la comunidad Yampupata', 1, 2, 'Otros', 'museokusijata.mp4'),
(10, 'Cerro El Calvario', 'Copacabana', 'Alta', 'El cerro El Calvario está ubicado en una colina, que está en medio de la ciudad de Copacabana al oeste de Bolivia, a orillas del Lago Titicaca Unas gradas permiten subir siguiendo las 14 estaciones de la Vía Crucis y alcanzar la cima Este sendero es recomendado a los turistas subirlo al final de la tarde cuando se puede ver el atardecer desde la cima Durante el ascenso, los visitantes pueden comprar camiones y casas en miniatura, hechas de yeso o plástico, rezar pidiendo a la Virgen que les beneficie con una casa o camión de verdad, dependiendo de sus deseos y fe', 'Todo el año', 'atr1.jpeg', 'ubicarse en la plaza de Colquepata y subir hacia la cima', 1, 1, 'Copacabana', NULL),
(11, 'Chinkana', 'Copacabana', 'Moderada', 'Chinkana es un sitio arqueológico en Bolivia es una muestra única del tipo de construcción laberíntica en el mundo Es posible que esta construcción hubiera sido destinada para los momentos de meditación o de iniciación de sacerdotes ligados al culto a lnti y a la Roca Sagrada, situado en la Isla del Sol, una isla del lago Titicaca en Copacabana', 'Todo el año', 'atr2.jpeg', 'Llegar a la Isla del Sol desde la playa de Copacabana', 1, 1, 'Otros', NULL),
(12, 'Isla De La Luna', 'Copacabana', 'Moderada', 'La Isla de la Luna, también llamada Isla Koati, es una isla de Bolivia que se encuentra en el lago Titicaca, junto a la isla del Sol en el departamento de La Paz Es una isla pequeña y cuenta con una superficie de 105 hectáreas Presenta una orografía escarpada por los vientos y además por ser una isla altiplánica', 'Todo el año', 'atr3.jpeg', 'Tomar una lancha para llegar a la isla de la Luna', 1, 1, 'Isla del Sol', NULL),
(13, 'Avenida 6 de Agosto', 'Copacabana', 'Baja', 'La Avenida 6 de Agosto en su trayecto hay numerosas tiendas de artesanías, restaurantes y negocios diversos, la Catedral, la Plaza 2 de Febrero y la Plaza Sucre', 'Todo el año', 'atr4.jpeg', 'Llegar al centro de Copacabana', 1, 2, 'Copacabana', NULL),
(14, 'Monumento De Eduardo Avaroa Copacabana', 'Copacabana', 'Baja', 'El lago Titicaca es un lago en los Andes en la frontera de Perú y una Bolivia grandes, profundos Copacabana es la ciudad boliviana principal en la orilla del lago Titicaca Coronel Eduardo Abaroa Hidalgo era héroe de Bolivia de la guerra del Pacífico', 'Todo el año', 'atr5.jpg', 'Caminar hasta la playa de Copacabana', 1, 2, 'Copacabana', NULL),
(15, 'Península de Copacabana', 'Copacabana', 'Baja', 'La Península Copacabana es la península más grande del lago Titicaca Está unida a tierra firme por el istmo de Yunguyo y separada de la península de Huata por el estrecho conocido como Tiquina', 'Todo el año', 'atr6.jpeg', 'Desde la Plaza 2 de Febrero que se encuentra en el centro de Copacabana caminar hacia el oeste', 1, 1, 'Copacabana', NULL),
(16, 'Yampupata', 'Copacabana', 'Alta', 'Yampupata es una península boliviana del lago Titicaca, ubicada al noroeste de la gran península de Copacabana perteneciente al Departamento de La Paz, limita con la isla de la Luna en su parte norte y con la isla del Sol en su parte noroeste forma el estrecho homónimo con esta última', 'Todo el año', 'atr7.jpg', 'Desde la playa de Copacabana tomar un bote o lancha para llegar hasta Yampupata', 1, 1, 'Otros', NULL),
(17, 'El mercado de Copacabana', 'Copacabana', 'Baja', 'El mercado de Copacabana es un lugar donde todo turista frecuenta para tomar un vaso de api o comer la trucha se encuentra en el centro de Copacabana', 'Todo el año', 'atr8.jpg', 'Para llegar al lugar no es necesario tomar ningún tipo de transporte o caminar lejos porque se encuentra en el mismo centro de Copacabana', 1, 3, 'Copacabana', NULL),
(18, 'Islas Flotantes', 'Copacabana', 'Moderada', 'Las primeras estructuras flotantes de totora fueron construidos, hace una década, por los comunarios de la provincia paceña Manco Kapac quienes idearon esta nueva forma de atracción turística sobre las aguas azules del lago titicaca', 'Otoño e Invierno', 'atr9.jpg', 'Camino a la comunidad de Chani, a 25 minutos de navegación de los puertos de copacabana', 1, 2, 'Otros', NULL),
(19, 'El Observatorio de la Rana Gigante', 'Copacabana', 'Moderada', 'En la localidad de Sahuiña, a menos de 15 minutos de Copacabana por carretera, se encuentra el único observatorio de ranas que flota en una plataforma de totora Desde ahí un grupo de comuneros procura que los visitantes conozcan a la rana gigante, una especie endémica que está en peligro de extinción', 'Todo el año durante la semana', 'atr10.jpg', 'Se encuentra a 15 minutos desde el centro de Copacabana en movilidad', 0, 2, 'Otros', NULL),
(20, 'Isla de Kalauta', 'Copacabana', 'Moderada', 'Antiguo pueblo de piedra y la más grande necrópolis prehispánica, con chullpas (torres mortuorias) de dos y tres pisos Se puede disfrutar del tradicional apthapi (merienda nativa), compartiendo momentos únicos con la gente del lugar', 'Todo el año', 'atr11.jpg', 'Se toma un bote para ir hacia el sur y llegar a la isla de Kalauta', 1, 1, 'Otros', NULL),
(21, 'Puerto Yumani', 'Copacabana', 'Moderada', 'Yumani es un pueblo indio situado en la Isla del Sol, sobre el mítico Lago Titicaca, en Bolivia Al llegar a la mítica isla, cuna de la civilización inca, tendrás que subir una escalera muy antigua para acceder al encantador pueblo de Yumani Lejos de estar confundidos por la presencia de los turistas, los indios quechuas y aymaras se ocupan de sus tareas diarias entre pesca, cría de animales y tejeduría', 'Todo el año', 'atr12.jpg', 'La única opción para llegar es tomar un barco desde la playa de Copacabana', 1, 2, 'Isla del Sol', NULL),
(22, 'Dioses Inca, puerto de Copacabana', 'Copacabana', 'Baja', 'Los dioses Inca son un monumento por la capitanía del puerto y la asociación Unión Marinos Titicaca', 'Todo el año', 'atr13.jpg', 'Caminar hacia la playa de Copacabana', 1, 2, 'Copacabana', NULL),
(23, 'Ruinas del Palacio de Pilkokaina', 'Copacabana', 'Alta', 'Es uno de los sitios arqueológicos más importantes de la Isla del Sol Significa El sitio donde descansa el Ave, es decir el supremo gobernante Inca al que llamaban Ave Esta edificación está situada a 40 minutos a pie desde el puerto y escalinatas de Saxamani o también conocido como Yumani', 'Todo el año', 'atr14.jpg', 'Tomar un ferry para llegar desde la playa de Copacaba', 1, 2, 'Isla del Sol', NULL),
(24, 'Capilla del Señor de la Cruz de Colquepata', 'Copacabana', 'baja', 'La conmemoración del Señor de Colquepata, una de las tantas celebradas en mayo en Bolivia, marca el final del ciclo agrícola, por lo que constituya también, para los creyentes, una fiesta de la cosecha Tuvo su origen en el supuesto hallazgo de una imagen milagrera de un crucificado por Santa Elena, madre del Emperador Constantino, durante el Siglo X, pero aquí ha devenido uno de los símbolos más fehacientes de transculturación y simbiosis desde los tiempos de la colonia', 'Todo el año, pero se realiza una festividad el Mes de Mayo', 'atr15.jpg', 'Del la plaza Sucre en Copacabana caminar dos cuadras hacia el norte', 1, 3, 'Copacabana', NULL),
(25, 'Chissi', 'Copacabana', 'Baja', 'La comunidad de Chissi mantiene formas tradicionales de tejido, que es realizado por las mujeres También se dedica a la agricultura, principalmente de las habas, y a la producción de flores Actualmente se viene impulsando el Agroturismo en la comunidad', 'Todo el año', 'atr16.jpg', 'Al Noreste de Copacabana se encuentra la ex-hacienda Chissi, que posee una extensión de 251 hectáreas', 1, 2, 'Otros', NULL),
(26, 'Museo del Poncho', 'Copacabana', 'Moderada', 'El Museo del Poncho exhibe una amplia variedad de textiles e indumentarias de los Andes Bolivianos Su exposición permanente está principalmente orientada al atuendo masculino y una de sus piezas más destacadas', 'Todo el año', 'atr17.jpg', 'Desde la plaza sucre caminar hacia el oeste dos cuadras', 1, 2, 'Copacabana', NULL),
(27, 'La escalera del Inca', 'Copacabana', 'Moderada', 'La escalera del Inca es, como su nombre lo indica, una escalera construida por los incas en la Isla del Sol, una isla en el Lago Titicaca accesible por ferry desde Copacabana Estas escaleras también permiten llegar al ferry Los peldaños son un poco rígidos, pero me gustó la vista que hay sobre el lago', 'Otoño e Invierno', 'atr18.jpg', 'Ida a la isla del sol', 1, 2, 'Isla del Sol', NULL),
(28, 'Islas Flotantes de Chañi ', 'Copacabana', 'Moderada', 'Las islas de estas comunidad suelen ser confundidas con las islas flotantes del pueblo de los uros que se encuentran en el lago Titicaca, tanto en el lado peruano y boliviano, pero no son de dicho pueblo Mas bien son una puesta en escena de posibles islas flotantes Estas no respetan la construcción tradicional que poseen las islas del pueblo de los uros, no residen personas, mas bien son una atracción y están ancladas en una península que pertenece al sector de la comunidad de Chañi la cual las administra', 'Todo el año', 'atr19.jpg', 'Las islas flotantes de Chañi se encuentran a 20 minutos de viaje en bote desde el muelle de Copacabana, Lago Titicaca', 1, 1, 'Otros', NULL),
(29, 'Ruinas Incas de Chinchana', 'Copacabana', 'Alta', 'Es una edificación laberíntica construida en la época Inca, ubicada en la parte norte de la Isla del Sol, en la Comunidad de Challa pampa Consiste en una construcción que bordea la ladera del cerro con una serie de túneles y pasillos que conducen a dos patios interiores, en uno de los muros se aprecian ocho nichos trapezoidales internos y ocho nichos externos, por lo que se atribuye un carácter ceremonial y religioso', 'Todo el año', 'atr20.jpg', 'Desde copacabana se tiene que llegar a la Isla del Sol, para poder visitar las ruinas', 1, 2, 'Isla del Sol', NULL),
(30, 'Challapampa', 'Copacabana', 'Moderada', 'Challapampa es una aldea situada en el norte de la isla del Sol, en las orillas del mítico lago Titicaca Es el punto de entrada de las ruinas de Chincana', 'Todo el año', 'atr21.jpg', 'Se toma unos 20min en ferry para llegar desde Copacabana', 1, 1, 'Isla del Sol', NULL),
(31, 'Sampaya', 'Copacabana', 'Baja', 'Este pequeño poblado espera la visita de aquellos turistas que aprecian la fusión entre lo moderno y lo ancestral La característica peculiar que resalta a simple vista es el uso de piedras para la edificación de las casas acompañadas de techos de paja, las cuales se encuentran tal y como culturas anteriores las construyeron, esto denota la cultura y costumbres que aún perduran en el lugar', 'Todo el año', 'atr22.jpg', 'Ubicado en el norte de la península de Copacabana, a 25 minutos en movilidad y 4 horas caminando', 1, 2, 'Otros', NULL),
(32, 'Plaza 2 de Febrero', 'Copacabana', 'Baja', 'La plaza central de la ciudad es la Plaza 2 de Febrero, y desde allí la Avenida 6 de Agosto se desliza hacia la orilla del lago Está lleno de tiendas de souvenirs, hostales y restaurantes, en gran parte para turistas extranjeros Avenida Jaregui, a una cuadra al norte, tiene una sensación más local, con mercados callejeros y tiendas de abarrotes', 'Todo el año', 'atr23.jpg', 'Llegar al centro de Copacabana, es donde llegan algunos Buses que parten desde la ciudad de la Paz', 1, 2, 'Copacabana', NULL),
(33, 'Isla Quehuaya', 'Copacabana', 'Moderada', 'La Isla Quehuaya, se encuentra ubicada en el lago menor del Lago Titicaca Es denominada también Kalauta, que significa en idioma aymara Casa de Piedra, llamada así por la ubicación del sitio arqueológico Es una formación geológica con una profunda significación cosmogónica en los pueblos originarios', 'Todo el año', 'atr24.jpg', 'Es la plaza principal del municipio, ubicada en el centro del mismo', 1, 1, 'Otros', NULL),
(34, 'Isla Chelleca', 'Copacabana', 'Alta', 'Isla Chelleca es un pequeño islote boliviano ubicado en el lago Titicaca, del departamento de La Paz, entre la isla del Sol y la península de Yampupata en el estrecho del mismo nombre La isla tiene forma redonda y presenta unas dimensiones de 209 metros de largo por 130 metros de ancho', 'Todo el año', 'atr25.jpg', 'Desde la playa de Copacabana,embarcarse en las lanchas hacia la Isla del Sol y continuar la travesía hasta llegar a la Isla Chelleca, tambien se puede llegar tomando las movilidades que salen de la esuqina del mercado principal cerca a la plaza de armas', 1, 1, 'Otros', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaa`
--

CREATE TABLE `calificaa` (
  `idcal` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idatr` int(11) NOT NULL,
  `valoracion` int(1) DEFAULT NULL,
  `comentario` varchar(1000) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `fechacal` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `calificaa`
--

INSERT INTO `calificaa` (`idcal`, `idusuario`, `idatr`, `valoracion`, `comentario`, `fechacal`) VALUES
(1, 74, 33, 8, 'Un hermoso lugar, no se lo pierdan..', '2020-12-27'),
(2, 74, 33, 9, 'repito, bonito lugar', '2020-12-27'),
(3, 129, 33, 4, 'Interesante lugar aunque nos quedó lejos para el tiempo que nos organizamos', '2020-12-28'),
(6, 135, 32, 6, 'lo que mas me llama la atención del lugar es que hay muy pocas plazas, siendo un municipio tan importante deberian trabajar con muchas mas, pero esta me gustó', '2020-12-28'),
(8, 139, 31, 9, 'No habia visitado antes este lugar y quedé encantado, Copacabana ofrece muchos atractivos turisticos y por ello es conveniente planificar una estadia duradera', '2020-12-28'),
(9, 139, 1, 9, 'me indicaron que la fecha ideal es en 21 de junio durante el año nuevo aymara, nosotros fuimos en noviembre, el lugar es muy bonito e interesante, ademas se pueden tomar bellas fotos de Copacabana desde este lugar', '2020-12-28'),
(13, 2, 34, 5, 'buen lugar', '2021-02-19'),
(14, 101, 34, 7, 'Interesante lugar, no lo habia visitado antes', '2021-03-28'),
(15, 101, 32, 10, 'De mis lugares favoritos, ya fui 5 veces a Copacabana y el quedarme en la plaza para apreciar la iglesia es de mis cosas favoritas', '2021-03-29'),
(16, 184, 33, 8, 'Una isla agradable, vine muchas veces a Copacabana y hasta ahora pude visitar este lugar, se los recomiendo', '2021-04-18'),
(18, 187, 30, 10, 'Es increible como podemos conocer mas de nuestra historia con estas ruinas y reliquias que nos dejan nuestros antepasados, debemos saber cuidarlos y conservarlos', '2021-04-18'),
(19, 203, 26, 7, 'Desde siempre me gustó visitar museos, en Copacabana de los pocos que encontrè me quedo con este', '2021-05-02'),
(20, 203, 24, 9, 'Solía visitarlo desde pequeño, ahora me encuentro con que lo estan remodelando, esperemos no se pierda la esencia de visitar al tata de Kolquepata', '2021-05-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificai`
--

CREATE TABLE `calificai` (
  `idcal` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idinst` int(11) NOT NULL,
  `valoracion` int(1) DEFAULT NULL,
  `comentario` varchar(1000) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `fechacal` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `calificai`
--

INSERT INTO `calificai` (`idcal`, `idcliente`, `idinst`, `valoracion`, `comentario`, `fechacal`) VALUES
(3, 74, 9, 8, 'Estadia agradable', '2020-12-17'),
(4, 2, 9, 4, 'Para mi proxima visita volvere a este hotel', '2021-02-16'),
(5, 2, 9, 4, 'Felicidades al personal, la estadia fue una belleza y ni que decir de las personas que la atienden , muy amables', '2021-02-16'),
(51, 6, 11, 8, 'Copacabana es un lugar muy bonito para quedarse y este hotel hace que la estancia valga la pena', '2021-01-10'),
(52, 7, 11, 8, 'Desde que la vi en las redes sociales me convecio, cuartos limpios, terraza con buena vista, se los recomiendo', '2021-01-12'),
(81, 6, 11, 8, 'Copacabana es un lugar muy bonito para quedarse y este hotel hace que la estancia valga la pena', '2021-01-10'),
(82, 7, 11, 8, 'Desde que la vi en las redes sociales me convecio, cuartos limpios, terraza con buena vista, se los recomiendo', '2021-01-12'),
(83, 74, 33, 6, 'A Copacabana no voy muy seguido pero las veces que fui siempre encontre un lugar aceptable para quedarme y este no se queda atras', '2021-01-14'),
(84, 85, 34, 8, 'Para toda la familia, un lugar agradable y con buena conexion a internet, mis hijos la pasaron bien', '2021-01-16'),
(85, 101, 15, 8, 'Quisieramos que siempre nos toque quedarnos en un lugar asi o aun mas agradable, felicidades a don Mario que se portó bien con nosotros', '2021-01-18'),
(86, 103, 15, 10, 'Es de los mejores hoteles que he visitado, buena comida, buena vista y personal capacitado, se los recomiendo', '2021-01-20'),
(87, 104, 16, 8, 'una maravilla la vista al lago, se los recomiendo', '2021-01-22'),
(89, 106, 37, 9, 'durante los dias de estancia vimos como el hotel se llenaba y no quedaban habitaciones, es por que lo vale, precios modicos, salon de juegos y mucha mas variedad', '2021-01-26'),
(91, 108, 19, 8, 'Perdimos nuestro cargador y el señor administrador muy amable nos lo habia guardado, recomiento el lugar, no solo por eso sino por la atencion y el rico desayuno', '2021-01-30'),
(92, 2, 20, 5, 'A toda la gente que desee visitarla, mi familia y yo la pasamos bien, hay cosas que mejorar pero en general estuvo aceptable la estancia', '2021-01-06'),
(93, 5, 21, 7, 'Solemos visitar este lugar desde hace 5 años y hasta ahora no tenemos quejas', '2021-01-08'),
(94, 6, 22, 8, 'Copacabana es un lugar muy bonito para quedarse y este hotel hace que la estancia valga la pena', '2021-01-10'),
(95, 7, 23, 8, 'Desde que la vi en las redes sociales me convecio, cuartos limpios, terraza con buena vista, se los recomiendo', '2021-01-12'),
(96, 74, 24, 6, 'A Copacabana no voy muy seguido pero las veces que fui siempre encontre un lugar aceptable para quedarme y este no se queda atras', '2021-01-14'),
(97, 85, 25, 8, 'Para toda la familia, un lugar agradable y con buena conexion a internet, mis hijos la pasaron bien', '2021-01-16'),
(98, 101, 26, 8, 'Quisieramos que siempre nos toque quedarnos en un lugar asi o aun mas agradable, felicidades a don Mario que se portó bien con nosotros', '2021-01-18'),
(99, 103, 27, 10, 'Es de los mejores hoteles que he visitado, buena comida, buena vista y personal capacitado, se los recomiendo', '2021-01-20'),
(100, 104, 28, 8, 'una maravilla la vista al lago, se los recomiendo', '2021-01-22'),
(102, 106, 30, 9, 'durante los dias de estancia vimos como el hotel se llenaba y no quedaban habitaciones, es por que lo vale, precios modicos, salon de juegos y mucha mas variedad', '2021-01-26'),
(103, 107, 35, 6, 'Estuvimos dos noches y no tenemos reclamos, lo unico que no nos gusto fue que cierran muy temprano, a las 10', '2021-01-28'),
(104, 108, 32, 8, 'Perdimos nuestro cargador y el señor administrador muy amable nos lo habia guardado, recomiento el lugar, no solo por eso sino por la atencion y el rico desayuno', '2021-01-30'),
(105, 110, 27, 8, 'Hay muchos hoteles en la Isla del Sol, pero sin duda me quedo con este, la vista, la estadia y la atencion muy amena', '2021-03-28'),
(106, 186, 15, 8, 'Muy bueno para quedarse cerca de la playa', '2021-04-18'),
(107, 85, 23, 9, 'Un lugar agradable, trato cordial, recomendadisimo!!! ', '2021-05-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificap`
--

CREATE TABLE `calificap` (
  `idcal` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idpaq` int(11) NOT NULL,
  `valoracion` int(1) DEFAULT NULL,
  `comentario` varchar(1000) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `fechacal` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `calificap`
--

INSERT INTO `calificap` (`idcal`, `idusuario`, `idpaq`, `valoracion`, `comentario`, `fechacal`) VALUES
(1, 85, 8, 4, 'Una experiencia maravillosa, sin duda volveriamos a ir con mis amigos', '2020-12-06'),
(6, 74, 8, 4, 'Una experiencia agradable, recibimos un trato cordial de los organizadores, el lugar bello, mi familia y yo lo aconsejamos..', '2020-12-15'),
(7, 105, 10, 5, 'Para ser nuestra primera experiencia con la empresa estuvo muy bien, recomendado', '2021-01-25'),
(8, 106, 10, 4, 'Divertido, es como puedo calificarlo', '2021-01-25'),
(9, 107, 12, 3, 'Fue una experiencia agradable, sin embargo el costo estuvo algo elevado para la visita', '2021-01-25'),
(10, 108, 12, 5, 'Se los recomiendo', '2021-01-25'),
(11, 109, 14, 4, 'Bastante agradable la estadia y los atractivos que visitamos, siempre es bonito visitar Copacabana y a la mamita de Copacabana', '2021-01-27'),
(12, 110, 14, 3, 'Comparado con las veces que anteriormente visité Copacabana la agencia no hizo la diferencia', '2021-01-27'),
(13, 111, 16, 5, 'Ninguno de mi grupo podría quejarse, paquetes así es lo q hacia falta para mejorar la visita al Santuario', '2021-01-27'),
(14, 112, 16, 4, 'Todo el recorrido nos las pasamos tomando fotografías, es un bello lugar, espero volver pronto', '2021-01-27'),
(15, 113, 18, 3, 'La llegada al lugar tuvo un retraso de al menos 2 horas, deberían preveer esos contratiempos ya que la ruta y el tiempo no son suficientes', '2021-01-27'),
(16, 114, 18, 5, 'Sin duda alguna volveré a ir con la familia, es una experiencia diferente, los guias muy amables', '2021-01-29'),
(17, 115, 20, 4, 'Durante la estadia nos dimos cuenta que necesitabamos mas cosas, como toallas y una muda completa, ya que en el paseo en bote nos mojamos muchos, deberian especificar tambien ellos en los objetos a llevar', '2021-01-29'),
(18, 116, 20, 3, 'Muy caro, es preferible ir de manera independiente porque allá tambien se gasta en otroas cosas', '2021-01-29'),
(19, 117, 21, 5, 'Completamente emocionados por volver, un tour maravilloso....', '2021-02-05'),
(20, 105, 22, 4, 'Facilmente pudimos llevar a un miembro mas, creimos que el cupo era limitado pero ya el guia nos explico que pudimos haber llevado mas gente, la proxima nosvamos con la amilia completa', '2021-02-05'),
(21, 106, 24, 3, 'Copacabana es un lugar muy bello, dependiendo al destino hay que analizar muy bien si vamos con una agencia o no, para este recorrdio no lo recomiendo, es mejor ir solos', '2021-02-05'),
(22, 107, 24, 2, 'No fue de las mejores experiencias, hubo un ruido en la noche que no nos dejaba dormir, el paseo estuvo bien', '2021-02-05'),
(23, 108, 21, 5, 'Absolutamente valió la pena', '2021-02-05'),
(25, 205, 19, 5, 'Una maravillosa experiencia', '2021-05-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristica`
--

CREATE TABLE `caracteristica` (
  `idcar` int(11) NOT NULL,
  `detalle` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `caracteristica`
--

INSERT INTO `caracteristica` (`idcar`, `detalle`) VALUES
(1, 'cortinas blockout'),
(2, 'escritorio'),
(3, 'chimenea'),
(4, 'camas extralargas'),
(5, 'baño privado'),
(6, 'comedor'),
(7, 'kitchenette'),
(8, 'ducha a ras de suelo'),
(9, 'caja fuerte'),
(10, 'sala de estar'),
(11, 'pava electrica'),
(12, 'bañera ducha'),
(13, 'secador de pelo'),
(14, 'balcon privado'),
(15, 'estante para la ropa'),
(16, 'lavavajillas'),
(17, 'utensilios de cocina'),
(18, 'productos de tocador de cortesia'),
(19, 'servicio a la habitacion'),
(20, 'reloj despertador'),
(21, 'tv pantalla plana'),
(22, 'habitaciones para familias'),
(23, 'habitaciones para no fumadores'),
(24, 'instalaciones de habitaciones VIP'),
(25, 'plancha');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idcat` int(11) NOT NULL,
  `nombrecat` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `descripcion` varchar(300) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcat`, `nombrecat`, `descripcion`) VALUES
(1, 'Sitios Naturales', 'montañas, planicies, valles, quebradas, cañones, lagos, lagunas, pantanos, rios, caidas de agua, manantiales, costas, grutas, cavernas, areas, protegidas y demas'),
(2, 'Manifestaciones Culturales', 'museos, arquitectura y espacios urbanos, lugares historicos, restos y lugares arqueologicos y pueblos'),
(3, 'Folklore', 'manifestaciones religiosas y populares, ferias, mercados, musica, danza, artes, artesania, gastronomia'),
(4, 'Etnologico', 'costa, sierra y selva');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriahot`
--

CREATE TABLE `categoriahot` (
  `idcath` int(11) NOT NULL,
  `detalle` varchar(20) COLLATE utf8mb4_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `categoriahot`
--

INSERT INTO `categoriahot` (`idcath`, `detalle`) VALUES
(1, 'Económico'),
(2, 'Valor'),
(3, 'Calidad'),
(4, 'Superior'),
(5, 'Excepcional');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `color` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `img` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `videoUrl` varchar(200) COLLATE utf8mb4_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`, `descripcion`, `img`, `videoUrl`) VALUES
(25, 'Fiesta de la Candelaria', '#FF0000', '2021-01-30 00:00:00', '2021-02-01 00:00:00', 'Es la fiesta dedicada a la Virgen de Copacabana, se festeja con bailes típicos y una procesión con la Virgen.', 'candelaria.jpg', NULL),
(26, 'Fiesta del Señor de la Cruz', '#ff0000', '2021-05-01 00:00:00', '2021-05-03 00:00:00', 'Se conmemora el encuentro de la Cruz de Jesús Cristo por Santa Elena. Se celebra con una misa, música y danzas típicas.', 'kolquepata.jpg', 'mayo.mp4'),
(27, 'Semana Santa', '#008000', '2021-03-28 00:00:00', '2021-04-04 00:00:00', 'Es la celebración más importante de la región. Cada año miles de peregrinos caminan alrededor de 150 km. desde La Paz hasta Copacabana por devoción a la Virgen. La celebración dura 3 días y el calendario está sujeto al Católico.', 'semanta.jpg', NULL),
(28, 'Año Nuevo Aymara', '#008000', '2021-06-21 00:00:00', '2021-06-22 00:00:00', ' Es la celebración más importante de la región. Cada año miles de peregrinos caminan alrededor de 150 km. desde La Paz hasta Copacabana por devoción a la Virgen. La celebración dura 3 días y el calendario está sujeto al Católico.', 'aymara.jpg', NULL),
(29, 'Koya Raymi', '#008000', '2021-09-21 00:00:00', '2021-09-22 00:00:00', 'Llamada también \"Festival de las Ñustas\", se realiza en la Isla de Coati (Isla de la Luna) y coincide con el equinoccio de primavera. Es una fiesta íntegramente ligada al sexo femenino y dedicada a “Chúa Achachila” la deidad del lago. En la celebración se realiza una entrada de danzas y música autóctona al que asisten comunidades invitadas de otras regiones del lago. También se realizan apthapis (almuerzos comunitarios) y se corona a la Ñusta entre las jóvenes participantes.', 'koya.jpg', 'koya.mp4'),
(30, 'Fiesta de Copacabana', '#008000', '2021-08-04 00:00:00', '2021-08-07 00:00:00', 'Se la realiza en honor a nombramiento de la Virgen de Copacabana como “Reina de la Nación”, desde 1925. Se celebra con procesiones, danzas típicas y actos religiosos.', 'agosto.jpg', NULL),
(31, 'LXVII Proclamacion de la Virgen - Policia Bolivian', '#008000', '2021-12-11 00:00:00', '2021-12-13 00:00:00', 'Misa de honor y procesión a la Virgen de Copacabana - Comandante General de la Policía Boliviana', 'ELMBFGOW4AIw_Ps.jfif', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencia`
--

CREATE TABLE `experiencia` (
  `idexp` int(11) NOT NULL,
  `asunto` varchar(60) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `experiencia` varchar(500) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `valoracion` int(1) DEFAULT NULL,
  `idvisitante` int(11) DEFAULT NULL,
  `img` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `fechapub` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `experiencia`
--

INSERT INTO `experiencia` (`idexp`, `asunto`, `experiencia`, `valoracion`, `idvisitante`, `img`, `estado`, `fechapub`) VALUES
(1, 'hermoso viaje', 'bonitos lugares, buenos restaurantes y hoteles, sin duda volvería al lugar', 4, 2, 'g1.jpeg', 1, '2021-01-05'),
(2, 'algo costoso pero lo vale', 'al haber viajado en una fecha en donde se realizaba una fiesta, se nos dificultó encontrar hospedaje, al final encontramos pero el precio fue algo elevado, sin embargo la experiencie en el lugar fue inolvidable', 4, 5, 'g2.jpg', 1, '2021-01-05'),
(3, 'un lugar muy intersante', 'nunca antes lo habiamos visitado, nos llevamos buenos recuerdos junto a mi familia, sobre todo de la Isla del Sol 100% recomendable', 5, 6, 'g3.jpg', 1, '2021-01-07'),
(4, 'Relajante y Bueno', 'Grandes vistas y muy buena comida, el servicio es muy atento, aunque no rápido, pero vale la pena.  Comimos muy bien y con unas estupendas vistas a la bahía de Copacabana. El precio es razonable. Lo recomiendo.', 5, 2, 'g4.jpg', 1, '2021-01-07'),
(5, 'Excelente', 'no hicimos reservacion pero encontramos los mejores lugares de servicio de comida y hospedaje, excelentes precios', 5, 6, 'g5.jpg', 1, '2021-01-09'),
(6, 'Buen lugar', 'Las vistas que ofrece son muy buenas, sin duda volveriamos a ir', 3, 6, 'g6.jpg', 1, '2021-01-09'),
(7, 'Lo más bonito su gente', 'el trato que recibiimos de la gente del lugar fue muy cordial, nos orientaron cuando quisimos llegar al calvario y a la horca del inca, sin duda volveria a ir', 4, 6, 'g7.jpg', 1, '2021-01-09'),
(8, 'totalmente recomendable', 'Lugares limpios pero hace mucho frio, recomiendo llevar bolsas para dormir y escoger un buen hotel', 4, 7, 'g8.jpg', 1, '2021-01-12'),
(9, 'una experiencia gratificante', 'En lo referente a la atención por parte de la agencia de viaje, así como de nuestro guía y del conductor, el trato ha sido excelente. El viaje en sí, muy interesante. Por la mentar, las instalaciones en Copacabana no están todo lo bien cuidadas que debieran. Está claro que el gobierno no invierte lo suficiente en cuidar y mantener el lugar.', 4, 6, 'g9.jpg', 1, '2021-01-12'),
(10, 'perfecto para ir entre amigos', 'organizamos un tour privado y todo salio a la perfección, la coordinación muy bien hecha, agradecemos a Inti travel por toda la ayuda brindada', 5, 7, 'g10.jpg', 1, '2021-01-12'),
(11, 'Copacabana', 'Excelente tour, visitmos un lugar maravilloso, muy bonito realment, el guía, es un genio, se notaba que sabía mucho del tema y que lo hacía con placer La comida en el restaurante exquisita Recomiendo muchísimo Saludos', 4, 6, 'g12.jpg', 1, '2021-01-15'),
(12, 'interesante lugar', 'la gente te hace sentir como en casa', 4, 2, 'e2.jpg', 1, '2021-01-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `idhistorial` int(11) NOT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `ingreso` datetime DEFAULT NULL,
  `salida` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`idhistorial`, `idusuario`, `tipo`, `ingreso`, `salida`) VALUES
(10, 86, 4, '2021-02-28 22:49:58', '2021-02-28 22:51:49'),
(18, 86, 4, '2021-03-01 15:15:08', '2021-03-01 15:15:35'),
(19, 82, 2, '2021-03-01 15:18:57', '2021-03-01 15:19:03'),
(20, 86, 4, '2021-03-01 15:25:47', '2021-03-01 15:37:16'),
(21, 86, 4, '2021-03-01 15:38:07', '2021-03-01 15:38:33'),
(24, 2, 3, '2021-03-02 15:35:06', '2021-03-02 15:35:11'),
(25, 2, 3, '2021-03-13 11:46:47', '2021-03-13 11:49:14'),
(26, 2, 3, '2021-03-13 11:49:42', '2021-03-13 11:49:58'),
(30, 86, 4, '2021-03-14 15:14:38', '2021-03-14 16:00:00'),
(31, 86, 4, '2021-03-15 15:41:05', '2021-03-15 16:00:00'),
(32, 86, 4, '2021-03-24 23:33:11', '2021-03-24 00:00:11'),
(33, 86, 4, '2021-03-25 19:47:52', '2021-03-25 20:47:52'),
(34, 86, 4, '2021-03-25 20:08:53', '2021-03-25 21:08:53'),
(35, 86, 4, '2021-03-25 21:51:44', '2021-03-25 22:51:44'),
(36, 86, 4, '2021-03-26 07:25:54', '2021-03-26 08:25:54'),
(37, 85, 3, '2021-03-27 09:29:38', '2021-03-27 09:59:43'),
(38, 85, 3, '2021-03-27 10:06:44', '2021-03-27 11:06:44'),
(39, 85, 3, '2021-03-27 10:17:35', '2021-04-15 10:06:44'),
(40, 86, 4, '2021-03-27 10:27:17', '2021-04-15 10:06:44'),
(41, 86, 4, '2021-03-27 14:01:02', '2021-04-15 10:06:44'),
(42, 86, 4, '2021-03-27 14:22:45', '2021-04-15 10:06:44'),
(43, 86, 4, '2021-03-27 14:39:28', '2021-04-15 10:06:44'),
(44, 86, 4, '2021-03-27 15:28:28', '2021-04-15 10:06:44'),
(45, 86, 4, '2021-03-27 21:59:31', '2021-03-27 21:59:36'),
(46, 82, 2, '2021-03-27 21:59:46', '2021-03-27 22:06:10'),
(47, 82, 2, '2021-03-27 22:06:18', '2021-03-27 22:54:37'),
(48, 83, 2, '2021-03-27 22:55:54', '2021-03-27 22:56:16'),
(49, 86, 4, '2021-03-27 22:56:21', '2021-05-02 13:20:44'),
(50, 86, 4, '2021-03-28 08:56:23', '2021-05-02 13:20:44'),
(51, 177, 3, '2021-03-28 10:06:29', '2021-03-28 10:08:01'),
(52, 177, 3, '2021-03-28 10:08:15', '2021-03-28 14:25:57'),
(53, 86, 4, '2021-03-28 11:21:55', '2021-05-02 13:20:44'),
(54, 86, 4, '2021-03-28 15:15:41', '2021-05-02 13:20:44'),
(55, 86, 4, '2021-03-28 19:43:22', '2021-05-02 13:20:44'),
(56, 110, 3, '2021-03-28 22:23:11', '2021-05-02 13:20:44'),
(57, 101, 3, '2021-03-28 23:35:53', '2021-03-29 00:07:11'),
(58, 86, 4, '2021-03-29 00:10:24', '2021-05-02 13:20:44'),
(59, 86, 4, '2021-03-29 22:41:33', '2021-05-02 13:20:44'),
(60, 86, 4, '2021-04-03 15:26:42', '2021-04-03 20:43:47'),
(61, 82, 2, '2021-04-03 20:43:59', '2021-05-02 13:20:44'),
(62, 86, 4, '2021-04-03 22:19:21', '2021-05-02 13:20:44'),
(63, 86, 4, '2021-04-03 23:21:43', '2021-05-02 13:20:44'),
(64, 86, 4, '2021-04-10 13:29:34', '2021-04-10 13:31:26'),
(65, 82, 2, '2021-04-10 13:31:39', '2021-05-02 13:20:44'),
(66, 86, 4, '2021-04-10 13:49:49', '2021-05-02 13:20:44'),
(67, 86, 4, '2021-04-10 13:50:13', '2021-05-02 13:20:44'),
(68, 86, 4, '2021-04-10 13:51:33', '2021-05-02 13:20:44'),
(69, 82, 2, '2021-04-10 13:52:35', '2021-04-10 13:56:14'),
(70, 83, 2, '2021-04-10 13:56:23', '2021-05-02 13:20:44'),
(71, 86, 4, '2021-04-10 13:57:58', '2021-04-10 13:58:08'),
(72, 82, 2, '2021-04-10 13:58:16', '2021-04-10 13:59:49'),
(73, 83, 2, '2021-04-10 14:00:02', '2021-05-02 13:20:44'),
(74, 86, 4, '2021-04-10 14:09:27', '2021-05-02 13:20:44'),
(75, 82, 2, '2021-04-10 14:31:48', '2021-05-02 13:20:44'),
(76, 82, 2, '2021-04-10 14:42:19', '2021-05-02 13:20:44'),
(77, 86, 4, '2021-04-10 14:43:02', '2021-05-02 13:20:44'),
(78, 82, 2, '2021-04-10 14:46:10', '2021-05-02 13:20:44'),
(79, 86, 4, '2021-04-10 14:46:31', '2021-05-02 13:20:44'),
(80, 86, 4, '2021-04-11 14:17:43', '2021-04-11 14:17:51'),
(81, 82, 2, '2021-04-11 14:18:02', '2021-04-11 15:52:42'),
(82, 83, 2, '2021-04-11 15:52:51', '2021-04-11 16:47:24'),
(83, 86, 4, '2021-04-11 16:47:33', '2021-05-02 13:20:44'),
(84, 86, 4, '2021-04-12 23:01:55', '2021-05-02 13:20:44'),
(85, 82, 2, '2021-04-12 23:44:17', '2021-05-02 13:20:44'),
(86, 86, 4, '2021-04-17 15:11:56', '2021-05-02 13:20:44'),
(87, 86, 4, '2021-04-18 16:09:23', '2021-05-02 13:20:44'),
(88, 184, 3, '2021-04-18 16:52:54', '2021-04-18 16:55:42'),
(89, 186, 3, '2021-04-18 18:40:10', '2021-04-18 18:44:55'),
(90, 86, 4, '2021-04-18 18:56:21', '2021-05-02 13:20:44'),
(91, 86, 4, '2021-04-23 22:05:56', '2021-05-02 13:20:44'),
(92, 86, 4, '2021-04-23 22:05:57', '2021-05-02 13:20:44'),
(93, 86, 4, '2021-04-24 14:01:57', '2021-05-02 13:20:44'),
(94, 86, 4, '2021-04-24 19:42:46', '2021-05-02 13:20:44'),
(95, 82, 2, '2021-04-24 23:14:37', '2021-05-02 13:20:44'),
(96, 86, 4, '2021-04-25 08:24:56', '2021-04-25 08:25:18'),
(97, 82, 2, '2021-04-25 08:25:28', '2021-04-25 13:17:26'),
(98, 86, 4, '2021-04-25 13:17:31', '2021-04-25 13:17:36'),
(99, 82, 2, '2021-04-25 13:17:50', '2021-04-25 13:29:32'),
(100, 86, 4, '2021-04-25 15:14:09', '2021-04-25 15:14:14'),
(101, 82, 2, '2021-04-25 15:14:26', '2021-05-02 13:20:44'),
(102, 86, 4, '2021-04-26 12:55:00', '2021-05-02 13:20:44'),
(103, 86, 4, '2021-04-26 12:55:01', '2021-05-02 13:20:44'),
(104, 200, 3, '2021-04-26 23:53:45', '2021-04-26 23:54:02'),
(105, 5, 3, '2021-04-27 21:57:55', '2021-05-02 13:20:44'),
(106, 86, 4, '2021-04-27 22:09:57', '2021-04-27 22:10:03'),
(107, 82, 2, '2021-04-27 22:10:10', '2021-05-02 13:20:44'),
(108, 5, 3, '2021-04-27 22:27:28', '2021-05-02 13:20:44'),
(109, 86, 4, '2021-04-27 22:31:22', '2021-04-27 22:32:05'),
(110, 82, 2, '2021-04-27 22:32:15', '2021-05-02 13:20:44'),
(111, 86, 4, '2021-05-01 11:56:14', '2021-05-02 13:20:44'),
(112, 86, 4, '2021-05-01 22:51:20', '2021-05-02 13:20:44'),
(113, 203, 3, '2021-05-02 09:04:54', '2021-05-02 13:20:44'),
(114, 86, 4, '2021-05-02 09:12:17', '2021-05-02 09:12:33'),
(115, 82, 2, '2021-05-02 09:12:43', '2021-05-02 09:14:34'),
(116, 83, 2, '2021-05-02 09:14:44', '2021-05-02 09:28:15'),
(117, 86, 4, '2021-05-02 09:28:20', '2021-05-02 09:54:24'),
(118, 85, 3, '2021-05-02 09:29:21', '2021-05-02 13:20:44'),
(119, 83, 2, '2021-05-02 09:54:42', '2021-05-02 13:20:44'),
(120, 86, 4, '2021-05-02 10:42:19', '2021-05-02 13:20:44'),
(121, 83, 2, '2021-05-02 10:46:41', '2021-05-02 10:54:41'),
(122, 82, 2, '2021-05-02 10:55:17', '2021-05-02 13:20:44'),
(123, 86, 4, '2021-05-02 11:00:14', '2021-05-02 13:20:44'),
(124, 86, 4, '2021-05-02 11:33:10', '2021-05-02 13:20:44'),
(125, 86, 4, '2021-05-02 11:34:02', '2021-05-02 13:20:44'),
(126, 205, 3, '2021-05-02 11:41:26', '2021-05-02 11:42:47'),
(127, 83, 2, '2021-05-02 11:45:46', '2021-05-02 13:20:44'),
(128, 83, 2, '2021-05-02 12:00:02', '2021-05-02 12:05:20'),
(129, 83, 2, '2021-05-02 12:05:50', '2021-05-02 12:06:35'),
(130, 205, 3, '2021-05-02 12:08:07', '2021-05-02 12:29:30'),
(131, 86, 4, '2021-05-02 12:29:39', '2021-05-02 12:30:38'),
(132, 86, 4, '2021-05-02 13:13:42', '2021-05-02 13:20:44'),
(133, 86, 4, '2021-05-02 13:16:08', '2021-05-02 13:20:44'),
(134, 86, 4, '2021-05-02 13:18:50', '2021-05-02 13:20:44'),
(135, 86, 4, '2021-05-02 13:19:33', '2021-05-02 13:20:44'),
(136, 86, 4, '2021-05-02 13:27:40', '2021-05-02 13:20:44'),
(137, 86, 4, '2021-05-02 13:28:50', '2021-05-02 13:30:03');

--
-- Disparadores `historial`
--
DELIMITER $$
CREATE TRIGGER `elimina_promo` AFTER INSERT ON `historial` FOR EACH ROW DELETE FROM promocion WHERE fechafin < CURRENT_DATE()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotcar`
--

CREATE TABLE `hotcar` (
  `idhotel` int(11) NOT NULL,
  `idcar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `hotcar`
--

INSERT INTO `hotcar` (`idhotel`, `idcar`) VALUES
(9, 1),
(9, 2),
(9, 4),
(9, 5),
(9, 6),
(9, 7),
(9, 8),
(9, 10),
(9, 14),
(9, 15),
(9, 19),
(9, 21),
(9, 22),
(9, 23),
(11, 4),
(11, 5),
(11, 8),
(11, 9),
(11, 10),
(11, 12),
(11, 14),
(11, 16),
(12, 1),
(12, 4),
(12, 5),
(12, 6),
(12, 8),
(12, 14),
(12, 19),
(12, 21),
(12, 22),
(12, 23),
(15, 4),
(15, 5),
(15, 6),
(15, 7),
(15, 8),
(15, 9),
(15, 10),
(15, 11),
(16, 5),
(16, 6),
(16, 7),
(16, 8),
(16, 9),
(16, 10),
(16, 11),
(16, 12),
(19, 1),
(19, 2),
(19, 3),
(19, 4),
(19, 5),
(19, 6),
(19, 7),
(19, 8),
(20, 9),
(20, 10),
(20, 11),
(20, 12),
(20, 13),
(20, 14),
(20, 15),
(20, 16),
(21, 10),
(21, 11),
(21, 12),
(21, 13),
(21, 14),
(21, 15),
(21, 16),
(21, 17),
(22, 11),
(22, 12),
(22, 13),
(22, 14),
(22, 15),
(22, 16),
(22, 17),
(22, 18),
(23, 12),
(23, 13),
(23, 14),
(23, 15),
(23, 16),
(23, 17),
(23, 18),
(23, 19),
(24, 1),
(24, 2),
(24, 20),
(24, 21),
(24, 22),
(24, 23),
(24, 24),
(24, 25),
(25, 1),
(25, 2),
(25, 3),
(25, 21),
(25, 22),
(25, 23),
(25, 24),
(25, 25),
(26, 1),
(26, 2),
(26, 3),
(26, 4),
(26, 22),
(26, 23),
(26, 24),
(26, 25),
(27, 1),
(27, 2),
(27, 3),
(27, 4),
(27, 5),
(27, 23),
(27, 24),
(27, 25),
(28, 1),
(28, 2),
(28, 3),
(28, 4),
(28, 5),
(28, 6),
(28, 24),
(28, 25),
(29, 1),
(29, 2),
(29, 3),
(29, 4),
(29, 5),
(29, 6),
(29, 7),
(29, 25),
(30, 2),
(30, 3),
(30, 4),
(30, 5),
(30, 6),
(30, 7),
(30, 8),
(31, 2),
(31, 3),
(31, 4),
(31, 5),
(31, 6),
(31, 7),
(31, 8),
(31, 9),
(32, 11),
(32, 12),
(32, 13),
(32, 14),
(32, 15),
(32, 16),
(32, 17),
(32, 18),
(33, 12),
(33, 13),
(33, 14),
(33, 15),
(33, 16),
(33, 17),
(33, 18),
(33, 19),
(34, 1),
(34, 2),
(34, 20),
(34, 21),
(34, 22),
(34, 23),
(34, 24),
(34, 25),
(35, 1),
(35, 2),
(35, 3),
(35, 21),
(35, 22),
(35, 23),
(35, 24),
(35, 25),
(36, 1),
(36, 2),
(36, 3),
(36, 4),
(36, 22),
(36, 23),
(36, 24),
(36, 25),
(37, 1),
(37, 2),
(37, 3),
(37, 4),
(37, 5),
(37, 23),
(37, 24),
(37, 25),
(38, 1),
(38, 2),
(38, 3),
(38, 4),
(38, 5),
(38, 6),
(38, 24),
(38, 25),
(39, 1),
(39, 2),
(39, 3),
(39, 4),
(39, 5),
(39, 6),
(39, 7),
(39, 25),
(40, 2),
(40, 3),
(40, 4),
(40, 5),
(40, 6),
(40, 7),
(40, 8),
(60, 1),
(60, 2),
(60, 4),
(60, 5),
(60, 8),
(60, 21),
(60, 22),
(66, 1),
(66, 4),
(66, 6),
(66, 8),
(66, 10),
(66, 13),
(66, 14),
(66, 15),
(66, 19),
(66, 20),
(66, 25),
(67, 4),
(67, 8),
(67, 10),
(67, 13),
(67, 14),
(67, 20),
(67, 22),
(67, 24),
(68, 1),
(68, 2),
(68, 8),
(68, 10),
(68, 22),
(68, 23),
(69, 1),
(69, 4),
(69, 14),
(69, 21),
(69, 22),
(69, 23),
(70, 1),
(70, 2),
(70, 4),
(70, 5),
(70, 10),
(70, 19),
(70, 22),
(70, 23),
(71, 1),
(71, 2),
(71, 4),
(71, 8),
(71, 16),
(71, 19),
(71, 20),
(71, 22),
(71, 23),
(72, 1),
(72, 2),
(72, 3),
(72, 4),
(72, 5),
(72, 7),
(72, 10),
(72, 11),
(73, 1),
(73, 2),
(73, 3),
(73, 4),
(73, 5),
(73, 7),
(74, 1),
(74, 2),
(74, 4),
(74, 5),
(74, 6),
(74, 7),
(75, 1),
(75, 2),
(75, 3),
(75, 4),
(75, 5),
(75, 7),
(75, 8),
(75, 15),
(75, 21),
(75, 22),
(76, 1),
(76, 2),
(76, 4),
(76, 21),
(76, 22),
(76, 23),
(77, 1),
(77, 2),
(77, 4),
(77, 5),
(77, 6),
(77, 8),
(77, 10),
(77, 19),
(77, 21),
(78, 1),
(78, 4),
(78, 5),
(78, 8),
(78, 21),
(78, 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotel`
--

CREATE TABLE `hotel` (
  `idinst` int(11) NOT NULL,
  `tarifa` decimal(5,2) DEFAULT NULL,
  `idcat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `hotel`
--

INSERT INTO `hotel` (`idinst`, `tarifa`, `idcat`) VALUES
(9, '296.00', 3),
(11, '544.00', 3),
(12, '244.00', 2),
(15, '480.00', 3),
(16, '364.00', 3),
(19, '822.00', 4),
(20, '240.00', 2),
(21, '249.00', 2),
(22, '208.00', 3),
(23, '398.00', 1),
(24, '97.00', 1),
(25, '165.00', 1),
(26, '187.00', 1),
(27, '553.00', 2),
(28, '296.00', 3),
(29, '113.00', 3),
(30, '124.00', 3),
(31, '155.00', 2),
(32, '366.00', 3),
(33, '151.00', 1),
(34, '96.00', 2),
(35, '512.00', 2),
(36, '88.00', 2),
(37, '185.00', 2),
(38, '959.00', 3),
(39, '454.00', 3),
(40, '175.00', 2),
(60, '120.00', 1),
(66, '80.00', 3),
(67, '70.00', 1),
(68, '50.00', 1),
(69, '60.00', 1),
(70, '50.00', 1),
(71, '100.00', 1),
(72, '120.00', 2),
(73, '150.00', 2),
(74, '80.00', 2),
(75, '100.00', 3),
(76, '50.00', 1),
(77, '130.00', 2),
(78, '60.00', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hottipohab`
--

CREATE TABLE `hottipohab` (
  `idhotel` int(11) NOT NULL,
  `idtipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `hottipohab`
--

INSERT INTO `hottipohab` (`idhotel`, `idtipo`) VALUES
(9, 1),
(9, 2),
(9, 3),
(9, 4),
(9, 7),
(11, 1),
(11, 2),
(11, 3),
(11, 4),
(11, 5),
(11, 6),
(11, 7),
(11, 12),
(12, 1),
(12, 2),
(12, 3),
(12, 4),
(12, 7),
(15, 1),
(15, 2),
(15, 3),
(15, 4),
(16, 2),
(16, 3),
(16, 4),
(16, 5),
(16, 6),
(19, 5),
(19, 6),
(19, 7),
(19, 8),
(19, 9),
(20, 6),
(20, 7),
(20, 8),
(20, 9),
(20, 10),
(21, 7),
(21, 8),
(21, 9),
(21, 10),
(21, 11),
(22, 8),
(22, 9),
(22, 10),
(22, 11),
(22, 12),
(23, 9),
(23, 10),
(23, 11),
(23, 12),
(23, 13),
(24, 1),
(24, 2),
(24, 3),
(24, 4),
(24, 5),
(25, 2),
(25, 3),
(25, 4),
(25, 5),
(25, 6),
(26, 3),
(26, 4),
(26, 5),
(26, 6),
(26, 7),
(27, 4),
(27, 5),
(27, 6),
(27, 7),
(27, 8),
(28, 5),
(28, 6),
(28, 7),
(28, 8),
(28, 9),
(29, 6),
(29, 7),
(29, 8),
(29, 9),
(29, 10),
(30, 7),
(30, 8),
(30, 9),
(30, 10),
(30, 11),
(31, 8),
(31, 9),
(31, 10),
(31, 11),
(31, 12),
(32, 9),
(32, 10),
(32, 11),
(32, 12),
(32, 13),
(33, 1),
(33, 2),
(33, 3),
(33, 4),
(33, 5),
(34, 2),
(34, 3),
(34, 4),
(34, 5),
(34, 6),
(35, 3),
(35, 4),
(35, 5),
(35, 6),
(35, 7),
(36, 4),
(36, 5),
(36, 6),
(36, 7),
(36, 8),
(37, 5),
(37, 6),
(37, 7),
(37, 8),
(37, 9),
(38, 6),
(38, 7),
(38, 8),
(38, 9),
(38, 10),
(39, 7),
(39, 8),
(39, 9),
(39, 10),
(39, 11),
(40, 8),
(40, 9),
(40, 10),
(40, 11),
(40, 12),
(60, 1),
(60, 2),
(60, 3),
(60, 7),
(60, 8),
(60, 9),
(66, 1),
(66, 2),
(66, 3),
(66, 4),
(66, 7),
(67, 1),
(67, 2),
(67, 3),
(67, 4),
(67, 5),
(67, 7),
(68, 1),
(68, 2),
(68, 3),
(68, 4),
(68, 7),
(69, 1),
(69, 2),
(69, 3),
(69, 4),
(69, 5),
(69, 7),
(70, 1),
(70, 2),
(70, 3),
(70, 4),
(70, 7),
(71, 1),
(71, 2),
(71, 3),
(71, 4),
(71, 5),
(71, 7),
(72, 1),
(72, 2),
(72, 3),
(72, 4),
(72, 5),
(72, 7),
(73, 1),
(73, 2),
(73, 3),
(73, 4),
(73, 5),
(73, 7),
(74, 1),
(74, 2),
(74, 3),
(74, 4),
(74, 5),
(74, 7),
(75, 1),
(75, 2),
(75, 3),
(75, 4),
(75, 7),
(75, 11),
(75, 12),
(76, 1),
(76, 2),
(76, 3),
(76, 7),
(77, 1),
(77, 2),
(77, 3),
(77, 4),
(77, 5),
(77, 7),
(78, 1),
(78, 2),
(78, 3),
(78, 4),
(78, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idioma`
--

CREATE TABLE `idioma` (
  `idlang` int(11) NOT NULL,
  `idioma` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `idioma`
--

INSERT INTO `idioma` (`idlang`, `idioma`) VALUES
(1, 'español'),
(2, 'inglés'),
(3, 'frances'),
(4, 'portugues'),
(5, 'aleman'),
(6, 'mandarin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion`
--

CREATE TABLE `institucion` (
  `idinst` int(11) NOT NULL,
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
  `videoUrl` varchar(300) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `institucion`
--

INSERT INTO `institucion` (`idinst`, `nombre`, `direccion`, `telefono`, `imgInst`, `idencargado`, `bioseguridad`, `descripcion`, `pagina`, `correo`, `ubicacion`, `facebook`, `videoUrl`) VALUES
(9, 'La Cúpula', 'Michel Pérez 1-3, Copacabana Bolivia', '2-862-2029', 'cupula.jpg', 75, 1, 'Con vista al lago Titicaca, este hotel artístico con una fachada encalada y una arquitectura de inspiración árabe se encuentra a 12 minutos a pie de la cima del Cerro El Calvar', 'http://www.hotelcupula.com/en_index.php', 'bolivia@hotelcupula.com', 'https://www.google.com/maps/place/Hostal+La+C%C3%BApula/@-16.1638924,-69.0890284,15z/data=!4m2!3m1!1s0x0:0xce1e196fb918443c?sa=X&ved=2ahUKEwix-e73qLrtAhVZH7kGHWS9DNAQ_BIwDHoECBsQBQ', '', 'cupula.mp4'),
(11, 'Rosario del Lago', 'Avenida Costanera Esq Rigoberto Paredes, Copacabana Bolivia', '2-862-2141', 'hotel-rosario-lago-titicaca.jpg', 171, 1, 'Este hotel apacible se encuentra a 2 minutos a pie de la playa de Copacabana, a orillas del lago Titicaca, y a 9 minutos a pie de la Basílica de Nuestra Señora de Copacabana, un santuario del siglo XV', 'https://hotelrosario.com/lago-titicaca/', 'reservas@gruporosario.travel', 'https://www.google.com/maps/place/Hotel+Rosario+Lago+Titicaca/@-16.167947,-69.089381,15z/data=!4m2!3m1!1s0x0:0xcb47ba6107c16975?sa=X&ved=2ahUKEwjX1e7zp7rtAhVhK7kGHZAoDQwQ_BIwDHoECBkQBQ', 'https://www.facebook.com/Hotel-Rosario-Del-Lago-416928608327426', NULL),
(13, 'Milenial Tours', 'Av 6 de Agosto Esq Costanera', '67652777', '78743419_2471218769866137_4271882482439159808_n.png', 82, 1, 'Somos una empresa con mas de 20 años al servicio del turista', '', 'info@milenialtours.com', '', '', NULL),
(14, 'YAT Bolivia', 'Avenida 6 de Agosto esq. Costanera', '2563214', '78770104_3513225385369289_2804586663303446528_n.jpg', 83, 1, 'Ven y disfruta de la variedad de paquetes que ofrece la empresa YAT Bolivia', 'https://www.facebook.com/YATBoliviaOficial/posts/4923165864375227', 'yaturismo@hotmail.com', '', '', NULL),
(15, 'Hotel Onkel Inn Torres de Copacabana', 'Avenida Costanera 257, 0000 Copacabana', '77270083', 'hotel15.jpg', 78, 1, 'El Hotel Onkel Inn Torres de Copacabana está situado en la playa de Copacabana y ofrece vistas panorámicas a la playa, conexión WiFi gratuita y desayuno buffet. Además, hay una zona de barbacoa.\r\nLas ', 'http://www.onkelinn.com/', 'onkelinn@onkelinn.com', 'https://www.google.com/maps/place/Hotel+Onkel+Inn,+Torres+de+Copacabana/@-16.1733244,-69.0934372,15z/data=!4m2!3m1!1s0x0:0x3436cebcb6c0cfc3?sa=X&ved=2ahUKEwjVguWvh8XtAhVAHbkGHcIUCgkQ_BIwDHoECBsQBQ', 'https://www.facebook.com/Onkel-Inn-163080300698012', NULL),
(16, 'Hotel Gloria Copacabana', 'Avenida 16 de julio s/n, Copacabana Bolivia', '68212073', 'hotel16.jpg', 101, 1, 'Descubre por qué tantos viajeros ven Hotel Gloria Copacabana como el hotel ideal cuando visitan Copacabana. Además de aportar la combinación ideal de calidad, comodidad y ubicación, ofrece un ambiente', 'http://www.hotelgloriacopacabana.com/', 'reservas1@hotelgloria.com.bo', 'https://www.google.com/maps/dir/-16.4893187,-68.1526373/-16.1669101,-69.0887521/@-16.3148682,-69.1811136,9z/data=!3m1!4b1!4m4!4m3!1m1!4e1!1m0', 'https://www.facebook.com/HGcopacabana', 'gloria.mp4'),
(19, 'Inca Utama Hotel', 'Ruta Nacional 2 Km 75, Huatajata 4785 Bolivia', '69965565', 'hotel19.jpg', 104, 1, 'En la orilla más panorámica del Lago Titicaca, está situado el \"Inca Utama Hotel & SPA\", un concepto hotelero diferente, diseñado para introducir a los huéspedes a las culturas de los Andes, dentro de', 'https://incautama.business.site/', 'info@titicaca.com', 'https://www.google.com/maps/dir/-16.4893313,-68.1526125/-16.2144938,-68.6831626/@-16.3395436,-68.6981126,10z/data=!3m1!4b1!4m4!4m3!1m1!4e1!1m0', 'https://www.facebook.com/incautama', NULL),
(20, 'Hotel Espejo', 'Calle Jauregui. Frente plaza 2 de febrero, Copacabana Bolivia', '65581849', 'hotel20.jpg', 105, 1, 'Hotel Espejo está Ubicado en pleno centro de la población de Copacabana frente plaza principal y a un minuto del mercado y catedral misma, se encuentra a media cuadra de la llegada de buses que vienen', '', 'hotelespejo.travel@gmail.com', 'https://www.google.com/maps/dir/-16.4893436,-68.1525726/-16.1652185,-69.0857434/@-16.326524,-69.1796115,9z/data=!3m1!4b1!4m4!4m3!1m1!4e1!1m0', 'https://www.facebook.com/hotelespejo', NULL),
(21, 'Hotel Utama', 'Calle Michell Perez esq. San Antonio s/n, Copacabana Bolivia', '2 8622013', 'hotel21.jpg', 170, 1, 'Si buscas un hostal económico en Copacabana, no te pierdas Hotel Utama.\r\nEl hostal ofrece espacio para guardar el equipaje, para que tu estancia sea incluso más agradable. El establecimiento también cuenta con desayuno incluido. Los huéspedes que lleguen en coche tienen acceso a garaje para aparcar.\r\nMientras estás aquí, asegúrate de ir a restaurantes de sushi como Thai Palace y Poshi, que se encuentran cerca de Hotel Utama.\r\nLo mejor de todo es que Hotel Utama es una estupenda base desde la que conocer numerosas atracciones de Copacabana, como Cerro Calvario (0,3 km), Basílica de Nuestra Señora de Copacabana (0,4 km) y Avenida 6 de Agosto (0,4 km), a las que se puede llegar a pie porque están cerca.\r\nEl personal de Hotel Utama está deseando atenderte durante tu visita.', 'http://www.utamahotel.com/', 'hotelutama@hotmail.com', 'https://www.google.com/maps/dir/-16.4893327,-68.1526008/-16.1642447,-69.0887475/@-16.3148682,-69.1811616,9z/data=!3m1!4b1!4m4!4m3!1m1!4e1!1m0', 'https://www.facebook.com/UTAMA-HOTEL-376351346119749/', 'utama.mp4'),
(22, 'Hotel Ecolodge Copacabana', 'Av. Costanera, 9999 Copacabana, Bolivia', '2 8622500', 'hotel22.jpg', 107, 1, 'Este pintoresco establecimiento ecológico está rodeado de 10.000 m² de bosques privados y tiene acceso directo al lago Titicaca. Se abastece tanto de energía solar como de electricidad. Hay conexión WiFi gratuita en las zonas comunes. Todas las mañanas se sirve un desayuno continental.\r\n\r\nLas habitaciones del Ecolodge Copacabana ofrecen vistas al lago y al jardín. Todas están decoradas con muebles de piedra, suelo de parquet y paredes de color crema. También disponen de baño privado y calefacción.\r\n\r\nLa cabaña familiar tiene zona de comedor y cocina equipada con lavavajillas, cafetera y tetera.\r\n\r\nLos huéspedes podrán disfrutar de caminatas por los terrenos del establecimiento o pasear por el lago en barco con o sin motor. El bosque proporciona el entorno perfecto para observar de aves y practicar senderismo. El restaurante prepara una gran variedad de platos locales.\r\n\r\nEl establecimiento se encuentra a 1,5 km de la ciudad de Copacabana, a 4 horas en coche de La Paz y a solo 15 minutos en coche del aeropuerto de Copacabana. Se proporciona aparcamiento privado.', 'http://www.ecocopacabana.com/', 'info@ecocopacabana.com', 'https://www.google.com/maps/dir/-16.4893485,-68.1526341/-16.178936,-69.0994191/@-16.3148682,-69.186585,9z/data=!3m1!4b1!4m4!4m3!1m1!4e1!1m0', 'https://www.facebook.com/Ecolodge-Copacabana-400078746807590', 'ecolodge2.mp4'),
(23, 'Hostal Las Olas', 'Calle Michel Perez Nº1-3 Calle Jauregui, 4132 Copacabana, Bolivia', '72508668', 'hotel23.jpg', 75, 1, 'Estimado turista, el hostal \"Las Olas\" se encuentra en una colina con vista al lago Titicaca. Desde cualquiera de las ocho suites se tiene una vista maravillosa sobre la bahía y el lago. Usted tiene amplios jardines con hamacas y mesas de piedra en las diferentes terrazas que bajan la ladera de la colina. En nuestras instalaciones se puede utilizar una chimenea y tenemos varias mesas de piedra y bancos para comer al aire libre para disfrutar de las vistas. Para los amantes de las plantas y flores, usted encontrará una enorme variedad de especies predominantemente locales. Todas las suites han sido diseñadas de forma individual, utilizando como muchos materiales naturales y locales como sea posible y respetando las formas tradicionales de construcción. Proporcionan una máxima comodidad y encontrará muchos detalles artísticos para el ojo. Desde su sala de estar, desde la cama y casi desde cualquier punto de su habitación tiene una vista perfecta del lago a través de los grandes ventanales. Cada suite está provista de una unidad pequeña cocina, baño privado una hamaca en el interior y una chimenea. También hay un pequeño calentador eléctrico para su uso Hacemos un gran esfuerzo para trabajar ecológicamente. Las cabinas se construyen con un aislamiento térmico completo de poli estireno en el interior del techo, así como en las paredes por debajo de la fachada. Precalentamos el agua con grandes paneles solares y con los cuales alimentamos la caldera eléctrica para garantizar el agua muy caliente las 24 horas del día. Reciclamos todo nuestra agua con un sistema automático de rociadores para humedecer los extensos jardines y también recopilamos cualquier botella de plástico o vidrio dejado para ser reciclados.', 'http://www.olasbolivia.com/', 'info@olasbolivia.com', 'https://www.google.com/maps/dir/-16.4893358,-68.1526487/-16.1638029,-69.0902821/@-16.3148682,-69.1818206,9z/data=!3m1!4b1!4m4!4m3!1m1!4e1!1m0', 'https://www.facebook.com/hostallasolas', 'lasolas.mp4'),
(24, 'Hostal Center', 'Av. 6 Agosto s/n, Copacabana 0012 Bolivia', '76709594', 'hotel24.jpg', 109, 1, ' El CENTER Copacabana se encuentra en Copacabana, a 300 metros de la catedral de Nuestra Señora de Copacabana, y ofrece mostrador de información turística y WiFi gratuita en todas las instalaciones. Todas las habitaciones cuentan con TV de pantalla plana con canales vía satélite y baño privado. El alojamiento cuenta con cajero automático, servicio de conserjería y cambio de divisa.\r\nLas habitaciones están equipadas con armario.\r\nEl CENTER Copacabana sirve un desayuno continental.\r\nEl alojamiento dispone de terraza.\r\nEl CENTER Copacabana está cerca de varios lugares de interés populares, como el mercado de Copacabana, el Calvario y la Horca del Inca.', '', 'centercopa@gmail.com', 'https://www.google.com/maps/place/Hostal+Center/@-16.1656252,-69.0876307,15z/data=!4m2!3m1!1s0x0:0x53dc3bdc565110d8?sa=X&ved=2ahUKEwjPgan34cbtAhX-DrkGHVNMA4QQ_BIwDHoECBYQBQ', 'https://www.facebook.com/Hostal-Center-Copacabana-bolivia-383655532066000', NULL),
(25, 'Willka Kuti Hostal Challapampa ', 'Isla del Sol lado Norte (puerto de challapampa 1500) ', '67076077', 'hotel25.jpg', 110, 1, ' El Willka Kuti Hostal - Lado Norte Isla del Sol ofrece alojamiento en la Isla del Sol y está situado a solo 3 minutos a pie de los restaurantes locales. Este establecimiento queda a 2,5 horas en barco de la ciudad de Copacabana.\r\nAlgunas habitaciones cuentan con baño privado.\r\nEl Willka Kuti Hostal - Lado Norte Isla del Sol ofrece servicio de recepción las 24 horas y mostrador de información turística, y alberga además un jardín. Tanto en el establecimiento como en los alrededores se pueden practicar diversas actividades, como senderismo.\r\nEste establecimiento se encuentra a 3 minutos a pie del lago, desde donde los huéspedes pueden tomar el barco a Copacabana. Se ofrece servicio gratuito de recogida desde el lago.', '', 'hostalchallapampa@hotmail.com', 'https://www.google.com/maps/place/Willka+Kuti+Hostal+-+Lado+Norte+Isla+Del+Sol/@-15.9970367,-69.1845956,15z/data=!4m8!3m7!1s0x0:0xc83acdd3120f8f0e!5m2!4m1!1i2!8m2!3d-15.9970367!4d-69.1845956', 'https://www.facebook.com/Hostal-Challapampa-Lado-Norte-Isla-Del-Sol-109138987576014', NULL),
(26, 'Hostal Palacio Del Inka ', ' Camino Norte-Sur, a 100 metros de la punta del Inca, Comunidad Yumani, Bolivia ', ' 74022018 ', 'hotel26.jpg', 111, 1, 'El Hostal Palacio del Inca está situado en la Comunidad Yumania, en 100 mts de la Fuente Inca. Hay conexión WiFi gratuita.\r\nEl lodge dispone de terraza.\r\nEl establecimiento alberga un jardín.\r\nEl estadio de Copacabana está a 17 km del Hostal palacio del inka.', '', '', ' https://www.booking.com/hotel/bo/hostal-palacio-del-inca.es.html#map_opened-hotel_header ', ' https://www.facebook.com/Hostal-Palacio-Del-Inca-239080996653069 ', NULL),
(27, ' Hotel Utasawa', ' Isla del Sol, Bolivia, Comunidad Yumani, Bolivia', ' 74024787 ', 'hotel27.jpg', 112, 1, ' El Utasawa in Comunidad Yumani ofrece vistas al jardín y alberga un restaurante, un bar, un salón compartido, un jardín y una zona de playa privada. Hay WiFi gratuita en todas las instalaciones.\r\nEl baño es privado e incluye ducha, secador de pelo y artículos de aseo gratuitos.\r\nEl lodge sirve un desayuno continental o buffet.\r\nEl Utasawa alberga una terraza.', '', '8381.oscar@gmail.com', 'https://www.google.com/maps/dir/-16.4893257,-68.1526355/-16.0386782,-69.1468656/@-16.2631799,-69.2101933,9z/data=!3m1!4b1!4m4!4m3!1m1!4e1!1m0', ' https://www.facebook.com/utasawalodge', NULL),
(28, 'Hotel Lago Azul Copacabana', ' \r\nAv. Costanera Nro 1000 zona kolkepata 0000 Copacabana, Bolivia', ' 71968009', 'hotel28.jpg', 113, 1, ' El Hotel Lago Azul se encuentra en Copacabana, a 500 metros del mercado de Copacabana, y ofrece alojamiento con WiFi gratuita y aparcamiento privado gratuito. Todas las habitaciones cuentan con TV de pantalla plana con canales por cable y baño privado. El alojamiento cuenta con recepción 24 horas, servicio de conserjería y organización de excursiones.\r\nTodas las mañanas se sirve un desayuno buffet y americano en el hotel.\r\nCerca del Hotel Lago Azul hay varios lugares de interés populares, como la catedral de Nuestra Señora de Copacabana, el Calvario y la Horca del Inca.', ' https://hotellagoazulcopacabana.club/', 'hotellagoazulcopacabana@gmail.com', ' https://www.google.com/maps?ll=-16.164345,-69.091063&z=15&t=m&hl=es-ES&gl=US&mapclient=embed&cid=6945087228463213549', 'https://www.facebook.com/HotelLagoAzulCopacabana', 'lagoazul.mp4'),
(29, 'Hostal La Casa del Sol', ' Calle José Ballivian, zona Munaypata, Copacabana, Bolivia', ' 63537003', 'hotel29.jpg', 114, 1, ' El Hostal La Casa del Sol se encuentra en Copacabana, a 300 metros de la catedral de Nuestra Señora de Copacabana y a 400 metros del mercado de Copacabana, y ofrece alojamiento con jardín, WiFi gratuita y aparcamiento privado gratuito. El establecimiento se encuentra a 12 km del baño inca. La posada ofrece vistas al jardín, terraza y recepción 24 horas.\r\nTodas las habitaciones de la posada tienen patio. Las habitaciones del Hostal La Casa del Sol están equipadas con baño privado con ducha.\r\nTodos los días se sirve un desayuno buffet.\r\nLos puntos de interés populares cerca del Hostal La Casa del Sol incluyen Horca del Inca, el estadio de Copacabana y el Calvario.', '', 'ligiavrdc628@gmail.com', 'https://www.google.com/maps/dir/-16.4893148,-68.1526226/-16.1666611,-69.0839303/@-16.3148682,-69.1787323,9z/data=!3m1!4b1!4m4!4m3!1m1!4e1!1m0', 'https://www.facebook.com/lacasadelsolcopacabana', 'casadelsol.mp4'),
(30, 'Hostal Puerto Alegre', ' Manuel Mena Mejía 190, Copacabana', ' 71963727', 'hotel30.jpg', 115, 1, ' El Hostal Puerto Alegre se encuentra en Copacabana y ofrece conexión Wi-Fi gratuita y alojamientos con vistas hermosas al lago Titicaca y la montaña Orca del Inca.\r\nLas habitaciones disponen de armario y algunas tienen baño privado.\r\nEl establecimiento alberga recepción las 24 horas, terraza, mostrador de información turística, consigna de equipaje y aparcamiento gratuito. Hay un ordenador de uso gratuito con conexión a internet en el vestíbulo. También se proporciona servicio de lavandería y calefacción por un suplemento.\r\nEl Hostal Puerto Alegre se halla a 100 metros de la catedral de Nuestra Señora de Copacabana y a 300 metros de la Horca del Inca y del mercado de Copacabana. Además, está a solo 5 minutos a pie de varios restaurantes y a 10 minutos a pie del lago Titicaca.', '', '', 'https://www.google.com/maps/dir/-16.4893382,-68.1526456/-16.167132,-69.086552/@-16.3148682,-69.1800611,9z/data=!3m1!4b1!4m4!4m3!1m1!4e1!1m0', 'https://www.facebook.com/Hostal-Puerto-Alegre-1452216488413800 ', NULL),
(32, 'Hotel Estelar del Titicaca', ' Av. Costanera, Copacabana Bolivia', ' 77205013', 'hotel32.jpg', 117, 1, 'Hotel Estelar del Titicaca es una magnífica elección para los viajeros que visiten Copacabana, ya que ofrece un ambiente para familias, además de numerosos servicios diseñados para mejorar tu estancia.\r\nHotel Estelar del Titicaca ofrece espacio para guardar el equipaje, mobiliario exterior y terraza-solario. Además, como huésped de Hotel Estelar del Titicaca puedes disfrutar de restaurante disponible allí mismo. Los huéspedes que lleguen en coche tienen acceso a aparcamiento privado gratuito cerca.\r\nMientras estés en Copacabana no dejes de probar demandados platos de falafel en La Orilla.\r\nLo mejor de todo es que Hotel Estelar del Titicaca es una estupenda base desde la que conocer numerosas atracciones de Copacabana, como Cerro Calvario (0,5 km), Basílica de Nuestra Señora de Copacabana (0,5 km) y Avenida 6 de Agosto (0,4 km), a las que se puede llegar a pie porque están cerca.\r\n¡Disfruta de tu estancia en Copacabana!', 'http://www.titicacabolivia.com/', 'estelardeltiticaca@hotmail.com', 'https://www.google.com/maps/place/Hotel+Estelar+Del+Lago+Titicaca/@-16.1658132,-69.089923,15z/data=!4m8!3m7!1s0x0:0xd4ddfc4b8d6279d5!5m2!4m1!1i2!8m2!3d-16.1658132!4d-69.089923', 'https://www.facebook.com/Hotel.Estelar.del.Titicaca', NULL),
(33, 'Hostal Alvasar', ' Avenida Busch S/N, 5201 Copacabana, Bolivia', ' 68213724', 'hotel33.jpg', 118, 1, 'Este establecimiento se encuentra en Copacabana, a 200 metros de la catedral de Nuestra Señora de Copacabana. El Hostal Alvasar ofrece alojamiento con salón compartido, aparcamiento privado gratuito y jardín. También cuenta con recepción 24 horas, cocina compartida y WiFi gratuita en todas las instalaciones. La posada cuenta con habitaciones familiares.\r\nLas habitaciones de la posada tienen patio. Todas las habitaciones del Hostal Alvasar disponen de TV de pantalla plana con canales por cable.\r\nEl establecimiento alberga un solárium.\r\nLos puntos de interés populares cerca del Hostal Alvasar incluyen el Mercado de Copacabana, El Calvario y la Horca del Inca.', '', '', 'https://www.google.com/maps/place/Hostal+Alvasar/@-16.1664582,-69.0876367,15z/data=!4m8!3m7!1s0x0:0x492111ef3011932a!5m2!4m1!1i2!8m2!3d-16.1664582!4d-69.0876367', '', NULL),
(34, 'Hostal Sonia Copacabana', 'Calle Murillo N° 256, Copacabana', '71968441', 'hotel34.jpg', 119, 1, 'El Hostal Sonia ofrece alojamientos en Copacabana, a 200 metros de la plaza principal y a 100 metros de la catedral de Nuestra Señora de Copacabana. El establecimiento facilita conexión WiFi gratuita y sirve un desayuno diario.\r\nLas habitaciones disponen de TV por cable y algunas tienen vistas a las montañas o al jardín. Todas las habitaciones incluyen baño privado con secador de pelo y artículos de aseo gratuitos.\r\nEl Hostal Sonia cuenta con un restaurante y aparcamiento privado gratuito. Se pueden solicitar servicios de traslado, por un suplemento.\r\nEl Hostal Sonia se encuentra a 200 metros del observatorio astronómico Horca del Inca, a 400 metros del mercado de Copacabana y a 3,5 horas en coche del centro de la ciudad de La Paz.', '', 'hostalsoniacopacabana@gmail.com', 'https://www.google.com/maps/place/Hostal+Sonia/@-16.1680606,-69.0853649,15z/data=!4m8!3m7!1s0x0:0xa92a3282e5327659!5m2!4m1!1i2!8m2!3d-16.1680606!4d-69.0853649', 'https://www.facebook.com/HostalSoniaCopacabana', 'sonia.mp4'),
(35, 'Hotel Casa de La Luna', ' Comunidad Yumani - Isla del Sol / Lado Sur, 9999 Comunidad Yumani, Bolivia ', ' 71908040', 'hotel35.jpg', 120, 1, ' La Casa de la Luna se encuentra en la mágica y misteriosa isla del Sol, frente a la costa de Copacabana, y ofrece alojamiento con vistas impresionantes al lago Titicaca y a las montañas circundantes de los Andes. Se sirve un desayuno gratuito a diario.\r\nLas habitaciones están bien equipadas y disponen de toallas, ropa de cama y baño privado con artículos de aseo gratuitos.\r\nLa Casa de Luna alberga un bar restaurante especializado en platos locales. Además, cuenta con recepción 24 horas, mostrador de información turística, jardín y terraza.\r\nSe puede llegar a la isla del Sol en barco desde la localidad con encanto de Copacabana. Una vez en la isla, se debe subir a pie por un camino en pendiente ascendente durante unos 30 minutos. Los huéspedes pueden alquilar un burro para el transporte del equipaje. El hotel ofrece una ubicación privilegiada en la isla. Se halla a 30 minutos a pie del tempo del Sol (Pilkokaina). La isla de la Luna queda a 8 km. Copacabana se encuentra a unas 3 horas en coche de las ciudades de La Paz y El Alto.', 'http://www.casadelalunabolivia.com', '', 'https://www.google.com/maps/dir/-16.4893459,-68.1526216/-16.0369595,-69.1470359/@-16.2623411,-69.2103055,9z/data=!3m1!4b1!4m4!4m3!1m1!4e1!1m0', 'https://www.facebook.com/hotelcasadelalunaisladelsolbolivia/?ref=page_internal', NULL),
(37, 'Hostal Inti-wayra Isla del Sol', ' Comunidad Yumani', ' 71942015', 'hotel37.jpg', 122, 1, 'El Hostal Inti Wayra está situado en Comunidad Yumani y ofrece jardín. El alojamiento ofrece servicio de habitaciones y conexión WiFi gratuita. Todas las habitaciones de la posada tienen patio con vistas al lago. También incluyen escritorio.', '', '', 'https://www.google.com/maps/place/Inti+Wayra+Hostal/@-16.0376583,-69.1473793,15z/data=!4m8!3m7!1s0x0:0x11b6aec80134df35!5m2!4m1!1i2!8m2!3d-16.0376583!4d-69.1473793', 'https://www.facebook.com/Hostal-Inti-wayra-Isla-del-sol-517467275254054', NULL),
(39, 'Posada del Inca Eco-Lodge', ' Comunidad Yumani, Isla del Sol', '69965565', 'hotel39.jpg', 124, 1, 'La encantadora “Posada del Inca”, está situada en la cima de la Isla del Sol, rodeada de un paisaje bucólico y la majestuosidad de los picos nevados de Los Andes. Es uno de los pocos lugares en el mundo donde aún se puede disfrutar la autenticidad de una naturaleza intacta. Esta casa de hacienda restaurada tiene 20 habitaciones con modernas instalaciones: frazadas eléctricas, baño privado, agua caliente, calefacción individual, restaurante y una vista espectacular del Lago Titicaca. Disfrute de una cálida y acogedora atmósfera, frente a los danzantes llamas de la chimenea en el lounge y bar. Este paraíso- perdido en el tiempo y en el espacio-, es accesible a través de nuestros cruceros de Hydrofoils.', 'https://www.posadadelinca.com/contact', 'info@titicaca.com', 'https://www.google.com/maps/dir/?api=1&destination=-16.036824976588%2C-69.146055377375&fbclid=IwAR1Dw8YAP8YPD58vAvJJS0BidLnMoA2PHTtIE7tteUyLqb7wz0OiuiajOs0', 'https://www.facebook.com/posadadelinca', NULL),
(40, 'Hotel Wendy Mar', ' Avenida 16 de Julio s/n, Copacabana Bolivia', '28624145', 'hotel40.jpg', 125, 1, 'Nuestro hotel al servicio de usted, tiene habitaciones con vista al lago Titicaca, disponemos de habitaciones Matrimoniales, Dobles, tríples y cuádruples, todas con baño privado y servicio de Wi Fi, incluye el desayuno buffet, estamos hubicados a cudra y media de la parada de bueses (Av. 16 de julio)', 'https://www.facebook.com/Hotel-Wendy-Mar-Copacabana-118484406258535', 'reservashotelwendymar19@gmail.com', 'https://www.google.com/maps/place/Hotel+Wendy+Mar/@-16.1673859,-69.088306,15z/data=!4m2!3m1!1s0x0:0xfa89dfa7a4619a62?sa=X&ved=2ahUKEwinuZ3nksftAhWtLLkGHcxrDdAQ_BIwC3oECBYQBQ', 'https://www.facebook.com/Hotel-Wendy-Mar-Copacabana-118484406258535', 'wendymar.mp4'),
(60, 'Hostal Solsticio', 'Z. Wajrapila Av. Felix Rosa Tejada cerca a la Horca del Inca', '28622122', 'solsticio.jfif', 180, 1, 'El Hostal Solsticio se sitúa a 350 metros de distancia de Catedral de Copacabana, y proporciona recepción 24 horas y servicio de aparcacoches. El hotel cuenta con 24 habitaciones. Se ofrece alojamiento con WiFi gratis en zonas comunes.\r\n\r\nLa propiedad está a solo 5 minutos a pie de La Horca del Inca. Se encuentra aproximadamente a 1 km del centro de Copacabana. El hotel proporciona acceso rápido a Basilica de Nuestra Senora de Copacabana.\r\n\r\nPuede disfrutar de un desayuno continental servido en el restaurante. Puede probar la cocina local en el restaurante gastronómico. Para ir a comer, los huéspedes pueden elegir entre Thai Palace, Snack 06 de Agosto y Restaurante El Fogon de la Cabana.', 'https://hostal-solsticio-copacabana-lake-titicaca.hotelmix.es/', 'solsticiocopa@gmail.com', '', 'https://www.facebook.com/solsticiocopa', NULL),
(66, 'Hostal Aldea del Inca', 'Calle San Antonio 3; Entre C/ General Jauregui Y C/Michel Perez, 0001 Copacabana, Bolivia', ' 69989683', 'aldea.jpg', 189, 1, 'El Hotel Aldea del Inca, situado en Copacabana, a 300 metros del mercado de Copacabana, ofrece alojamiento con restaurante, aparcamiento privado gratuito, bar y salón compartido. Todas las habitaciones cuentan con TV de pantalla plana con canales por cable y baño privado. Ofrece recepción 24 horas, cocina compartida y servicio de cambio de divisa.\r\n\r\nTodos los alojamientos del hotel están equipados con zona de estar.\r\n\r\nEl Hotel Aldea del Inca sirve un desayuno bufé todos los días.\r\n\r\nEl alojamiento alberga un parque infantil.\r\n\r\nCerca del Hotel Aldea hay varios lugares de interés. Además, el alojamiento Inca se halla cerca de la catedral del Calvario, la catedral de Nuestra Señora de Copacabana y la Horca del Inca.\r\n\r\n¡Hablamos tu idioma!', '', 'reservas@hotelaldeadelinca.com', 'https://www.booking.com/hotel/bo/aldea-del-inca.es.html?aid=318615&label=New_Spanish_ES_BO_26746722145-dbb_H8zfb_VGEhME4BWYjQS100761268345%3Apl%3Ata%3Ap1%3Ap2%3Aac%3Aap%3Aneg%3Afi%3Atiaud-297601666515%3Adsa-195224484025%3Alp20084%3Ali%3Adec%3Adm&sid=af4946894de76654b3ad8fdfbba17a9a&dest_id=-685854&d', 'https://www.facebook.com/HOTEL-ALDEA-DEL-INCA-105045321604430', 'aldeainca.mp4'),
(67, 'Hostal Estrella del Lago', 'Av. Gonzalo Jauregui cerca Av. Costanera', '63044344', 'estrella.jpg', 190, 1, 'El Estrella del Lago se encuentra en Copacabana, a 400 metros del mercado de Copacabana, y ofrece alojamiento con terraza y aparcamiento privado. Todas las habitaciones disponen de TV por cable y baño privado. El alojamiento cuenta con recepción 24 horas, cocina compartida y servicio de cambio de divisa.\r\n\r\nEl establecimiento sirve un desayuno buffet o americano.\r\n\r\nEntre los lugares de interés cercanos al Estrella del Lago se incluyen la catedral de Nuestra Señora de Copacabana, el Calvario y la Horca del Inca.\r\n\r\nA las parejas les encanta la ubicación — Le han puesto un 8,3 para viajes de dos personas.\r\n\r\n¡Hablamos tu idioma!', '', '', 'https://www.booking.com/hotel/bo/estrella-del-lago.es.html#map_opened-hotel_sidebar_static_map', 'https://www.facebook.com/hostalestrella.dellago', 'estrellalago.mp4'),
(68, 'Hostal Fortaleza del Inca', 'Av. 6 de Agosto esq Calle Oruro', '74023994', 'forataleza.jpg', 191, 1, 'Hostal Fortaleza Del Inca se encuentra en Copacabana (Bolivia). Hostal Fortaleza Del Inca está trabajando en actividades de Otras actividades de alojamiento.', '', '', 'https://www.google.com/maps/place/Hostal+Fortaleza+Del+Inca/@-16.165546,-69.086532,15z/data=!4m5!3m4!1s0x0:0xc0d31cabd64387d7!8m2!3d-16.1655463!4d-69.0865323?hl=es-BO', 'https://www.facebook.com/Hostal-fortaleza-del-inca-2165584026893717/', 'fortalezainca.mp4'),
(69, 'Hostal Las Balsas', 'Av 16 de Julio', '74650830', 'balsas.jpg', 192, 1, 'El Hostal Las Balsas dispone de terraza y se encuentra en Copacabana, en la región de La Paz, a 400 metros de la catedral de Nuestra Señora de Copacabana y del mercado de Copacabana. El establecimiento cuenta con restaurante, recepción 24 horas, cocina compartida y WiFi gratuita. El alojamiento ofrece servicio de habitaciones, salón compartido y cambio de divisa.\r\n\r\nTodas las mañanas se sirve un desayuno continental y americano en la posada.\r\n\r\nEl Hotel Las Balsas se encuentra cerca de lugares de interés populares, como el Calvario, la Horca del Inca y el estadio de Copacabana.\r\n\r\n¡Hablamos tu idioma!', '', '', 'https://www.booking.com/hotel/bo/las-balsas-copacabana.es.html#map_opened-hotel_sidebar_static_map', 'https://www.facebook.com/profile.php?id=100008228593291', 'lasbalsas.mp4'),
(70, 'Hostal Leyenda', 'Avenida Costanera Esq German Busch', '68096252', 'leyenda.jpg', 193, 1, 'Hostal Leyenda cuenta con diferentes habitaciones con baños privados, TV. y wifi, ambientes comodos y desayuno incluido servicio de lavanderia con precios economicos como 50 bs hasta 80 bs', '', 'roberto.huarahuara36@gmail.com', 'https://www.tripadvisor.es/Hotel_Review-g297316-d3704422-Reviews-Hostel_Leyenda-Copacabana_La_Paz_Department.html#MAPVIEW', 'https://www.facebook.com/hostalandino', 'leyenda.mp4'),
(71, 'Hostal Olas del Titicaca', 'Avenida 16 de Julio, Cruce Con Avenida Busch, Copacabana, Bolivia', '78754047', 'olastititi.jpg', 194, 1, 'El Hostal Olas Del Titicaca se encuentra en Copacabana, a 400 metros de la catedral de Nuestra Señora de Copacabana y del mercado de Copacabana, y ofrece alojamiento con salón compartido, WiFi gratuita en todas las instalaciones y aparcamiento privado gratuito. Todas las habitaciones cuentan con TV de pantalla plana con canales por cable y baño privado. El alojamiento cuenta con cocina compartida, servicio de habitaciones y cambio de divisa.\r\n\r\nEl establecimiento sirve un desayuno buffet o americano.\r\n\r\nEl Hostal Olas Del Titicaca ofrece una terraza.\r\n\r\nLos puntos de interés populares cerca del alojamiento incluyen el Calvario, el Horca del Inca y el estadio de Copacabana.\r\n\r\nA las parejas les encanta la ubicación — Le han puesto un 8,6 para viajes de dos personas.\r\n\r\n¡Hablamos tu idioma!', '', 'olasdeltiticac@gmail.com', 'https://www.hoteles.com/ho647201/hostal-olas-del-titicaca-copacabana-bolivia/', 'https://www.facebook.com/Hostal-Olas-del-Titicaca-104129604854837', 'olastiticaca.mp4'),
(72, 'Hostal Piedra Andina', 'Calle Sin Nombre Urbanización Bella Vista Zona Bella Visita Copacabana Bolivia', '67470339', 'piedra.jpg', 195, 1, 'Nuestro estblicimiento se encuentra a 800 metros de la plaza principal y el servicio de taxi de llegada y salida está incluido en el precio y ofrecemos servicio de Labandeira información turística terrazas con jardines hamacas cocina compartida Wi-fi cambio de monedas intercambio de libros tienda en el establecimiento todas las habitaciones cuentan con tv satelital calefacción ducha caliente', 'http://www.hostalpiedra.andina.com/', '', 'https://www.hoteles.com/ho775331040/hostal-piedra-andina-copacabana-bolivia/', 'https://www.facebook.com/Hostal-Piedra-Andina-Copacabana-Bolivia-616545875191961', 'piedraandina.mp4'),
(73, 'Hostal Roca Sagrada', 'Plaza 2 de Febrero', '74042692', '26167968_1950518438607540_7754404896159204785_n.jpg', 196, 1, 'El Hostal Roca sagrada brinda atencion de confort y calidad a todos los visitantes a Copacabana, Ven con Nosotros', 'https://www.southamericanpostcard.com/cgi-bin/hostel.cgi?bolivia-RSAGRADA', 'rocasagradahostalcop@hotmail.com', '', 'https://www.facebook.com/rocasagradahostalcop', 'rocasagrada.mp4'),
(74, 'Residencial Sucre', 'Calle Murillo Frente a la basilica de Copacabana', '74006410', 'descarga.jfif', 197, 1, 'Residencial Sucre tiene todo lo que buscas para pasar unos dias agradables en el Santuario de Copacabana', '', '', 'https://mapcarta.com/es/RESIDENCIAL_SUCRE_1463470', '', 'sucre.mp4'),
(75, 'Camping Suma Samawi Copacabana', 'Av. Costanera Copacabana', '74006410', '41680164_2240497912903673_66664210330812416_n.jpg', 180, 1, 'Camping y hospedaje para viajeros con habitaciones, cocina, patio parrillero con horno de barro, parqueo y Wi Fi. A orillas del lago Titicaca', '', '', 'https://www.google.com/maps/place/Suma+Samawi/@-16.1740113,-69.0941823,15z/data=!4m5!3m4!1s0x0:0x6b3c3a33d9aa234a!8m2!3d-16.1740113!4d-69.0941823', 'https://www.facebook.com/campingcopacabanasumasamawi', 'sumasamawi.mp4'),
(76, 'Hostal Venegas', 'Plaza sucre av. 6 de agosto entre calle bolivar Hostal venegas, Copacabana, Copacabana, Bolivia', '67079158', 'venegas.jpg', 198, 1, 'El Hostal venegas se encuentra en Copacabana, a 200 metros del mercado de Copacabana y de la catedral de Nuestra Señora de Copacabana, y ofrece alojamiento con terraza, WiFi gratuita y aparcamiento privado gratuito. El establecimiento se encuentra a 13 km del baño inca. Por las mañanas se sirve un desayuno americano. Los puntos de interés populares cerca del Hostal venegas incluyen el Calvario, la Horca del Inca y el estadio de Copacabana.', '', '', 'https://www.agoda.com/hostal-venegas/hotel/copacabana-bo.html?cid=1844104', 'https://www.facebook.com/hostal.venegas', 'venegas.mp4'),
(77, 'Hostal Wara', 'Av. 6 de agosto No 3932', '28622346', '', 199, 1, 'Hostal Wara es un hospedaje para los que quieran pasar una buena estadia en copacababna se sientan a gusto a la hora de descansar', '', 'waracopacabana@gmail.com', 'https://www.google.com/maps/place/Hostal+Wara/@-16.1654545,-69.0898485,15z/data=!4m2!3m1!1s0x0:0x5b5e63a09d541621?sa=X&ved=2ahUKEwil2cfVkZjwAhUFppUCHQUSCr8Q_BIwCnoECBYQBQ', 'https://www.facebook.com/Hostal-WARA-1445004872485014', ''),
(78, 'Hostal Plaza', 'Plaza 2 de Febrero', '73300918', 'plaza.jpeg', 181, 1, 'En Hostal Plaza encontrarás habitaciones confortables, ducha caliente, wifi y una excelente atenciòn para hacer de tus dìas en Copacabana, una maravillosa experiencia', '', 'hostalplazacopacabana@gmail.com', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instlang`
--

CREATE TABLE `instlang` (
  `idinst` int(11) NOT NULL,
  `idlang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `instlang`
--

INSERT INTO `instlang` (`idinst`, `idlang`) VALUES
(9, 1),
(9, 2),
(9, 5),
(11, 1),
(11, 2),
(11, 4),
(12, 1),
(12, 2),
(12, 3),
(12, 4),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(14, 3),
(60, 1),
(60, 2),
(66, 1),
(66, 2),
(66, 3),
(66, 4),
(67, 1),
(67, 2),
(68, 1),
(68, 2),
(69, 1),
(69, 2),
(70, 1),
(70, 2),
(71, 1),
(71, 2),
(72, 1),
(72, 2),
(73, 1),
(73, 2),
(74, 1),
(74, 2),
(75, 1),
(75, 2),
(76, 1),
(77, 1),
(77, 2),
(78, 1),
(78, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instserv`
--

CREATE TABLE `instserv` (
  `idinst` int(11) NOT NULL,
  `idservicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `instserv`
--

INSERT INTO `instserv` (`idinst`, `idservicio`) VALUES
(9, 1),
(9, 2),
(9, 3),
(9, 4),
(9, 5),
(9, 7),
(9, 8),
(9, 9),
(9, 10),
(9, 12),
(9, 13),
(9, 14),
(9, 15),
(9, 16),
(9, 17),
(9, 21),
(9, 22),
(9, 23),
(11, 1),
(11, 5),
(11, 8),
(11, 9),
(11, 10),
(11, 14),
(11, 16),
(11, 17),
(11, 18),
(11, 21),
(11, 22),
(12, 2),
(12, 3),
(12, 5),
(12, 6),
(12, 8),
(12, 9),
(12, 10),
(12, 14),
(12, 15),
(12, 16),
(12, 23),
(13, 24),
(13, 25),
(13, 26),
(13, 29),
(13, 30),
(13, 31),
(13, 32),
(14, 24),
(14, 26),
(14, 29),
(14, 30),
(14, 31),
(14, 33),
(15, 1),
(15, 2),
(15, 3),
(15, 4),
(15, 5),
(15, 6),
(15, 7),
(15, 8),
(16, 2),
(16, 3),
(16, 4),
(16, 5),
(16, 6),
(16, 7),
(16, 8),
(16, 9),
(19, 5),
(19, 6),
(19, 7),
(19, 8),
(19, 9),
(19, 10),
(19, 11),
(19, 12),
(20, 6),
(20, 7),
(20, 8),
(20, 9),
(20, 10),
(20, 11),
(20, 12),
(20, 13),
(21, 7),
(21, 8),
(21, 9),
(21, 10),
(21, 11),
(21, 12),
(21, 13),
(21, 14),
(22, 1),
(22, 2),
(22, 3),
(22, 4),
(22, 5),
(22, 6),
(22, 7),
(22, 8),
(23, 2),
(23, 3),
(23, 4),
(23, 5),
(23, 6),
(23, 7),
(23, 8),
(23, 9),
(24, 3),
(24, 4),
(24, 5),
(24, 6),
(24, 7),
(24, 8),
(24, 9),
(24, 10),
(25, 4),
(25, 5),
(25, 6),
(25, 7),
(25, 8),
(25, 9),
(25, 10),
(25, 11),
(26, 5),
(26, 6),
(26, 7),
(26, 8),
(26, 9),
(26, 10),
(26, 11),
(26, 12),
(27, 6),
(27, 7),
(27, 8),
(27, 9),
(27, 10),
(27, 11),
(27, 12),
(27, 13),
(28, 7),
(28, 8),
(28, 9),
(28, 10),
(28, 11),
(28, 12),
(28, 13),
(28, 14),
(29, 1),
(29, 2),
(29, 3),
(29, 4),
(29, 5),
(29, 6),
(29, 7),
(29, 8),
(30, 2),
(30, 3),
(30, 4),
(30, 5),
(30, 6),
(30, 7),
(30, 8),
(30, 9),
(31, 1),
(31, 2),
(31, 3),
(31, 4),
(31, 5),
(31, 6),
(31, 7),
(31, 8),
(32, 3),
(32, 4),
(32, 5),
(32, 6),
(32, 7),
(32, 8),
(32, 9),
(33, 4),
(33, 5),
(33, 6),
(33, 7),
(33, 8),
(33, 9),
(33, 10),
(33, 11),
(34, 5),
(34, 6),
(34, 7),
(34, 8),
(34, 9),
(34, 10),
(34, 11),
(34, 12),
(35, 6),
(35, 7),
(35, 8),
(35, 9),
(35, 10),
(35, 11),
(35, 12),
(35, 13),
(37, 5),
(37, 6),
(37, 7),
(37, 8),
(39, 3),
(39, 4),
(39, 5),
(39, 6),
(39, 7),
(39, 8),
(39, 9),
(39, 10),
(40, 4),
(40, 5),
(40, 6),
(40, 7),
(40, 8),
(40, 9),
(40, 10),
(40, 11),
(60, 1),
(60, 3),
(60, 4),
(60, 5),
(60, 7),
(60, 8),
(60, 10),
(60, 16),
(60, 17),
(66, 1),
(66, 3),
(66, 4),
(66, 6),
(66, 8),
(66, 12),
(66, 16),
(66, 17),
(66, 19),
(66, 22),
(67, 1),
(67, 5),
(67, 6),
(67, 10),
(67, 11),
(67, 14),
(68, 3),
(68, 4),
(68, 13),
(68, 16),
(68, 23),
(69, 1),
(69, 3),
(69, 4),
(69, 7),
(69, 8),
(69, 15),
(69, 18),
(69, 20),
(69, 23),
(70, 2),
(70, 4),
(70, 5),
(70, 7),
(70, 8),
(70, 14),
(70, 16),
(70, 23),
(71, 1),
(71, 2),
(71, 3),
(71, 4),
(71, 5),
(71, 7),
(71, 8),
(71, 10),
(71, 14),
(71, 23),
(72, 1),
(72, 2),
(72, 3),
(72, 4),
(72, 5),
(72, 6),
(72, 7),
(72, 8),
(72, 10),
(72, 11),
(73, 1),
(73, 2),
(73, 3),
(73, 4),
(73, 5),
(73, 6),
(73, 7),
(73, 8),
(73, 10),
(74, 1),
(74, 2),
(74, 3),
(74, 4),
(74, 5),
(74, 7),
(75, 1),
(75, 2),
(75, 3),
(75, 4),
(75, 5),
(75, 6),
(75, 7),
(75, 8),
(75, 14),
(75, 15),
(75, 16),
(75, 17),
(76, 1),
(76, 3),
(76, 4),
(76, 5),
(76, 8),
(76, 23),
(77, 1),
(77, 2),
(77, 3),
(77, 4),
(77, 5),
(77, 7),
(77, 8),
(77, 9),
(77, 10),
(78, 1),
(78, 3),
(78, 4),
(78, 5),
(78, 7),
(78, 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE `noticia` (
  `id` int(11) NOT NULL,
  `titulo` varchar(500) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `detalle` varchar(2000) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `fecha` date DEFAULT curdate(),
  `activo` tinyint(1) DEFAULT 1,
  `image` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`id`, `titulo`, `detalle`, `fecha`, `activo`, `image`) VALUES
(2, 'Presentación de propuestas, candidatos a la Alcaldía', 'Gran presentación de propuestas de los candidatos a la alcaldía gestión 2021 _ 2026 en coordinación con radio Copacabana y la camara hotelera invitan a todo los candidatos que postulan para la gestión municipal a la presentación de PROPUESTAS contamos con su compromiso de asistir a esta invitación el día jueves 11 de febrero  a horas 09 a.m. en los salones del hotel GLORIA COPACABANA.... Informamos a los candidatos que esto no será un debate solo una presentación de propuestas en el marco de respeto ...a su vez se les pide encarecidamente puedan asistir con toda las medidas de bioseguridad', '2021-02-08', 1, 'propuesta.jpg'),
(3, 'Peregrinaciòn Religiosa a Copacabana', 'Cientos de peregrinos iniciaron este miércoles el recorrido de unos 140 kilómetros, de más de dos jornadas de duración, hasta el santuario de la Virgen de Copacabana en el lago Titicaca, en una manifestación de fe tradicional en la Semana Santa en Bolivia.\r\n\r\nEquipados para una larga travesía con barbijos, sombreros, mochilas con ropa liviana, abundante líquido, prendas impermeables para la lluvia y otras térmicas para afrontar el frío, además de un pequeño botiquín, es normal ver a los devotos a un lado de la carretera que conecta a La Paz con la frontera con Perú en el lago.\r\n\r\nLa ruta implica atravesar la meseta altiplánica boliviana por los poblados de Peñas, Huarina, San Pedro y San Pablo de Tiquina, y Tito Yupanqui hasta la sede del colonial templo de Copacabana, en un desafío que implica hacer hasta doce horas de caminata por día.\r\n\r\nLos primeros peregrinos partieron el lunes y martes pasados, con el propósito de transitar los varios de kilómetros a paso lento y continuo para evitar dañarse los pies y poder llegar a destino el Viernes Santo hasta medio día.\r\n\r\nEstán también quienes por su responsabilidad laboral a penas emprenderán la caminata este jueves por la tarde, en algo que implica un esfuerzo adicional ya que deberán recorrer los casi 140 kilómetros sin descanso.', '2021-03-28', 1, 'ruta.jpeg'),
(4, 'noticia nueva2', '<p>detalle4<br></p>', '2021-04-17', 0, '5d90fef61c690c8c664a10d46b8f2237.jpg'),
(5, 'noticia2', '<p>mas texto </p><p>para todos<br></p>', '2021-04-17', 0, '1a338e394c19e9a15ad6a12bcc635110jpeg'),
(6, 'noticia5', '<p>esta noticia llega</p><p>gracias a ti<br></p>', '2021-04-17', 0, '3de97ca903ee7ee824107478ffde1be7.jpg'),
(7, '1era Feria Online de Servicios Turìsticos de Copacabana', '<p><br></p><div class=\"kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"overflow-wrap: break-word; margin: 0px; white-space: pre-wrap; font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 15px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-align: left; text-indent: 0px; text-transform: none; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><div dir=\"auto\" style=\"font-family: inherit; text-align: start;\"><span style=\"background-color: inherit;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px 1px; height: 16px; width: 16px; font-weight: normal; display: inline-flex; vertical-align: middle; font-style: normal; font-family: inherit;\"><img alt=\"😍\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t5b/1.5/16/1f60d.png\" style=\"border: 0px;\" width=\"16\" height=\"16\"></span>TERCERA SEMANA DE FERIA ONLINE DE COPACABANA 2020 <span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px 1px; height: 16px; width: 16px; font-weight: normal; display: inline-flex; vertical-align: middle; font-style: normal; font-family: inherit;\"><img alt=\"💪🏻\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t80/1.5/16/1f4aa_1f3fb.png\" style=\"border: 0px;\" width=\"16\" height=\"16\"></span></span></div><div dir=\"auto\" style=\"font-family: inherit; text-align: start;\"><span style=\"background-color: inherit;\">¿Estas listo para reservar tu hospedaje y actividades turísticas en Copacabana?</span></div><div dir=\"auto\" style=\"font-family: inherit; text-align: start;\"><span style=\"background-color: inherit;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0', '2021-04-17', 0, '0f87eaf94d71785f77a939917c92cdf7.jpg'),
(8, '1era Feria Online de Servicios Turìsticos de Copacabana', '<p>TERCERA SEMANA DE FERIA ONLINE EN COPACABANA 2020</p><p>Estas listo para reservar tu hospedaje y actividades turisticas en Copacabana?</p><p>Los ofertantes explicaran su promoción enfocada a brindarte descuentos de lunes a viernes.</p><p>La FERIA ONLINE DE SERVICIOS TURÍSTICOS DE COPACABANA esta organizada por el periodico digital ACTURISMO con el apoyo de la Camara Hotelera Provincial de Copacabana.</p><p>Desde el lunes 9 de noviembre al domingo 6 de diciembre de 2020, usted podrá observar las video ofertas de los prestadores de servicios turisticos de Copacabana en las siguientes paginas de facebook:</p><p><a href=\"http://www.facebook.com/acturismo.hoteleria/\">http://www.facebook.com/acturismo.hoteleria/</a></p><p><a href=\"http://www.facebook.com/FeriaOnlineCopacabana/\">http://www.facebook.com/FeriaOnlineCopacabana/</a></p><p><br></p>', '2020-11-23', 1, '0f87eaf94d71785f77a939917c92cdf7.jpg'),
(9, 'Copacabana, Una Hermosa visita para Semana Santa con todas las medidas de Bioseguridad', '<p>La Secretaría Departamental de Turismo y Culturas juntamente con la Camara Hotelera Provincial de Copacabana les hacen la invitacion para pasar unos agradables días en los feriados de Semana Santa con toda tu familia. Sin descuidar las medidas de bioseguridad, garantizando todos los protocolos de prevencion en Hoteles, Hostales y Alojamientos a orillas del lago Titicaca<br></p>', '2021-03-31', 1, 'ea9b6a0b425c68be5aac565a1a419a61.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objeto`
--

CREATE TABLE `objeto` (
  `idobj` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `objeto`
--

INSERT INTO `objeto` (`idobj`, `nombre`) VALUES
(1, 'botella / cantimplora'),
(2, 'protector solar'),
(3, 'impermeable'),
(4, 'enchufe triple'),
(5, 'mochila de tela'),
(6, 'linterna'),
(7, 'gafas de sol'),
(8, 'repelente de insectos'),
(9, 'mosquitero'),
(10, 'sleeping'),
(11, 'frazadas'),
(12, 'barbijo'),
(13, 'alcohol en gel'),
(14, 'muda completa'),
(15, 'traje de bioseguridad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paqatr`
--

CREATE TABLE `paqatr` (
  `idpaq` int(11) NOT NULL,
  `idatr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `paqatr`
--

INSERT INTO `paqatr` (`idpaq`, `idatr`) VALUES
(8, 2),
(8, 4),
(8, 6),
(10, 4),
(10, 6),
(10, 10),
(10, 14),
(10, 15),
(10, 21),
(10, 30),
(10, 32),
(11, 4),
(11, 12),
(11, 15),
(11, 16),
(11, 18),
(11, 20),
(11, 30),
(11, 33),
(11, 34),
(12, 1),
(12, 6),
(12, 10),
(12, 13),
(12, 24),
(12, 26),
(12, 32),
(13, 4),
(13, 12),
(13, 21),
(13, 23),
(13, 30),
(14, 4),
(14, 12),
(14, 21),
(14, 23),
(14, 30),
(16, 18),
(17, 18),
(18, 1),
(18, 4),
(18, 10),
(18, 13),
(18, 14),
(18, 15),
(18, 17),
(18, 21),
(18, 22),
(18, 23),
(18, 24),
(18, 27),
(19, 10),
(20, 14),
(20, 15),
(20, 22),
(20, 33),
(21, 4),
(21, 12),
(21, 21),
(21, 23),
(21, 30),
(22, 14),
(22, 18),
(22, 28),
(23, 4),
(23, 6),
(23, 10),
(23, 14),
(23, 15),
(23, 21),
(23, 30),
(23, 32),
(24, 4),
(24, 12),
(24, 15),
(24, 16),
(24, 18),
(24, 20),
(24, 21),
(24, 30),
(24, 33),
(24, 34);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paqhot`
--

CREATE TABLE `paqhot` (
  `idpaq` int(11) NOT NULL,
  `idhot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paqobj`
--

CREATE TABLE `paqobj` (
  `idpaq` int(11) NOT NULL,
  `idobj` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `paqobj`
--

INSERT INTO `paqobj` (`idpaq`, `idobj`) VALUES
(8, 1),
(8, 2),
(8, 4),
(8, 5),
(8, 7),
(8, 10),
(8, 11),
(10, 1),
(10, 2),
(10, 3),
(10, 4),
(10, 5),
(10, 6),
(11, 2),
(11, 3),
(11, 4),
(11, 5),
(11, 6),
(11, 7),
(12, 3),
(12, 4),
(12, 5),
(12, 6),
(12, 7),
(12, 8),
(13, 4),
(13, 5),
(13, 6),
(13, 7),
(13, 8),
(13, 9),
(14, 5),
(14, 6),
(14, 7),
(14, 8),
(14, 9),
(14, 10),
(15, 6),
(15, 7),
(15, 8),
(15, 9),
(15, 10),
(15, 11),
(16, 1),
(16, 2),
(16, 3),
(16, 4),
(16, 5),
(16, 6),
(17, 2),
(17, 3),
(17, 4),
(17, 5),
(17, 6),
(17, 7),
(18, 3),
(18, 4),
(18, 5),
(18, 6),
(18, 7),
(18, 8),
(19, 2),
(19, 5),
(19, 7),
(19, 12),
(19, 13),
(20, 5),
(20, 6),
(20, 7),
(20, 8),
(20, 9),
(20, 10),
(21, 6),
(21, 7),
(21, 8),
(21, 9),
(21, 10),
(21, 11),
(22, 1),
(22, 2),
(22, 3),
(22, 4),
(22, 5),
(22, 6),
(23, 2),
(23, 3),
(23, 4),
(23, 5),
(23, 6),
(23, 7),
(24, 3),
(24, 4),
(24, 5),
(24, 6),
(24, 7),
(24, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paqserv`
--

CREATE TABLE `paqserv` (
  `idpaq` int(11) NOT NULL,
  `idserv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `paqserv`
--

INSERT INTO `paqserv` (`idpaq`, `idserv`) VALUES
(8, 25),
(8, 26),
(8, 27),
(8, 28),
(8, 29),
(8, 31),
(8, 33),
(10, 25),
(10, 26),
(10, 27),
(10, 28),
(10, 29),
(10, 30),
(10, 31),
(11, 25),
(11, 26),
(11, 27),
(11, 28),
(11, 29),
(11, 30),
(11, 31),
(12, 25),
(12, 26),
(12, 27),
(12, 28),
(12, 29),
(12, 30),
(12, 31),
(13, 25),
(13, 26),
(13, 27),
(13, 28),
(13, 29),
(13, 30),
(14, 25),
(14, 26),
(14, 27),
(14, 28),
(14, 29),
(14, 30),
(14, 31),
(15, 27),
(15, 28),
(15, 29),
(15, 30),
(15, 31),
(16, 25),
(16, 26),
(16, 27),
(16, 28),
(16, 29),
(16, 30),
(16, 31),
(17, 25),
(17, 26),
(17, 27),
(17, 28),
(17, 29),
(17, 30),
(17, 31),
(18, 25),
(18, 26),
(18, 28),
(18, 29),
(18, 30),
(18, 31),
(19, 24),
(19, 25),
(19, 26),
(19, 29),
(19, 31),
(19, 32),
(19, 33),
(20, 25),
(20, 26),
(20, 27),
(20, 28),
(20, 29),
(20, 30),
(20, 31),
(21, 25),
(21, 26),
(21, 27),
(21, 28),
(21, 29),
(22, 25),
(22, 26),
(22, 27),
(22, 28),
(22, 29),
(22, 30),
(22, 31),
(23, 25),
(23, 26),
(23, 27),
(23, 28),
(23, 29),
(23, 30),
(23, 31),
(24, 25),
(24, 26),
(24, 27),
(24, 28),
(24, 29),
(24, 30),
(24, 31);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquete`
--

CREATE TABLE `paquete` (
  `idpaq` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `detalle` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `precio` decimal(5,2) DEFAULT NULL,
  `idagencia` int(11) DEFAULT NULL,
  `imgpaq` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cantidadp` int(11) DEFAULT NULL,
  `tipopaq` int(1) DEFAULT NULL,
  `videoPaq` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `paquete`
--

INSERT INTO `paquete` (`idpaq`, `nombre`, `detalle`, `precio`, `idagencia`, `imgpaq`, `cantidadp`, `tipopaq`, `videoPaq`) VALUES
(8, 'COPACABANA + ISLA DEL SOL', '¡Conoce el LAGO SAGRADO!\r\nNosotros proponemos el destino y tu escoges el paquete de tu preferencia', '800.00', 13, '129716923_2812335342421143_1160917439373583466_o.jpg', 30, 3, NULL),
(10, 'COPACABANA E ISLA DEL SOL', '¡Visita Copacabana! un lugar hermoso e imperdible para conocer atractivos turísticos únicos en el Mundo!', '980.00', 13, 'paquete10.jpg', 30, 3, NULL),
(11, 'CRUCERO POR EL LAGO TITICACA', '• Transporte en bus privado La Paz – Guaqui – Tiwanacu - La Paz. • Ingreso y visita guiada a los Museos de Guaqui. • Recorrido por la bahía de Guaqui en el Buque más grande de Bolivia. • Ingresos al s', '500.00', 14, 'paquete11.jpg', 40, 1, NULL),
(12, 'Anio Nuevo en Ecolodge La Estancia', '¡Recibe el 2021 con nuevas energías en la paradisíaca Isla del Sol!', '999.99', 14, 'paquete12.jpg', 40, 2, NULL),
(13, 'TOUR A LA ISLA DEL SOL EN 1 DÍA DESDE COPACABANA', 'Conoce la Isla del Sol, en donde se encuentra los restos Arqueológicos dedicados al culto del sol o Inti. Ven con nosotros y descubre el origen del imperio incaico en el Lago Navegable más alto del mundo. ', '357.00', 13, 'paquete13.jpg', 40, 1, NULL),
(14, 'TOUR ISLA DEL SOL Y LA LUNA 2D/1N', 'Las Islas del Sol y la Luna: La Isla del Sol o isla Titicaca es una isla boliviana situada en el lago Titicaca, es la isla más grande del lago. Por otra parte, la Isla de la Luna, es una pequeña y escarpada isla que en la época del Imperio inca contaba con un templo denominado Iñakuyu o Palacio de las vírgenes de sol, donde habitaban las denominadas vírgenes del sol. ', '875.00', 14, 'paquete14.jpg', 30, 3, NULL),
(15, 'KAYAK A ORILLAS DEL LAGO TITICACA 3 HORAS.', 'Lago Titicaca es el lago navegable más alto del mundo y es un privilegio hacer el deporte de Kayak en él. Este tour es dirigido para todas las personas que deseen experimentar un pequeño paseo en kayak, sin necesidad de tener experiencia en el deporte mencionado; además se disfruta de la diversidad biológica y la utilización sostenible de los recursos de flora, siendo la totora la planta más famosa, y fauna silvestre (anfibios, reptiles, mamíferos y aves).', '280.00', 13, 'paquete15.jpg', 25, 1, NULL),
(16, 'KAYAK Y AVISTAMIENTO DE AVES EN EL LAGO TITICACA 4 HORAS.', 'La Reserva Nacional del Titicaca, forma parte del Sistema Nacional de Áreas Naturales Protegidas por el estado peruano (SINANPE) es un área destinada a la conservación de la diversidad biológica y la utilización sostenible de los recursos de flora, siendo la totora la planta más famosa y fauna (anfibios, reptiles, mamíferos y aves).', '371.00', 14, 'paquete16.jpg', 28, 1, NULL),
(17, 'TOUR PRIVADO A LAS ISLAS FLOTANTES LOS UROS EN 3 HORAS', 'A 5 km. de la ciudad de Puno, en el Lago Titicaca, se encuentran las Islas Flotantes de los Uros, en las más de 80 islas se sigue manteniendo la tradición de la pesca artesanal, especialmente del carachi y el pejerrey; también se dedican a la caza de aves silvestres y a la recolección de huevos de pato. A comienzos del siglo XXI han dirigido sus actividades al turismo y se han convertido en un punto obligado en el recorrido de los turistas que pasan por la ciudad de Puno.', '224.00', 13, 'paquete17.jpg', 28, 1, NULL),
(18, ' Excursion a Copacabana e Isla del Sol desde La Paz', 'Disfruta del famoso Lago Titicaca con este tour por Copacabana e Isla del Sol.¡Es una experiencia completa e imperdible!', '784.00', 14, 'paquete18.jpg', 30, 1, NULL),
(19, 'ZIPLINE COPACABANA', ' ZIPLINE Copacabana es una agencia de servicios de deporte extremo y aventura, que brinda al visitante una manera de vivir y disfrutar de nuevas experiencias en Copacabana.', '250.00', 14, 'paquete19.jpg', 25, 1, 'zipline.mp4'),
(20, ' ISLA SUNATA A COPACABANA ', 'Este fin de semana viaja con nosotros!!Sábado 12 de diciembre : COPACABANA-ISLA SUNATA', '210.00', 13, 'paquete20.jpg', 35, 1, NULL),
(21, 'Copacabana, Isla del Sol', 'En este tour Full Day, podrá conocer uno de los destinos más representativos de La Paz y Bolivia, inicialmente la población de Copacabana que se destaca por ser un centro histórico cultural en Bolivia, además de ser el punto de acceso al Lago Titicaca. el lago navegable más alto del mundo donde podrá visitar la famosa Isla del Sol.  ', '385.00', 14, 'paquete21.jpg', 30, 1, NULL),
(22, 'Copacabana, Islas flotantes', 'En este tour de día completo, podrá conocer uno de los destinos más representativos de La Paz y Bolivia, inicialmente la población de Copacabana que se destaca por ser un centro histórico cultural en Bolivia donde se encuentra la famosa Basílica de Copacabana y El Mirador del Calvario entre otros, además de ser el punto de acceso al Lago Titicaca el lago navegable más alto del mundo donde podrás visitar las islas flotantes.									', '490.00', 13, 'paquete22.jpg', 35, 1, NULL),
(23, 'Isla de la Luna, Isla del Sol, Copacabana', 'En este tour de 2 días / 1 noche podrás conocer los atractivos más importantes de Copacabana y alrededores. La población de Copacabana se destaca por ser un centro histórico cultural en Bolivia donde se ubican la famosa Basílica de Copacabana y El Mirador del Calvario entre otros, además es el punto de acceso al Lago Titicaca, el lago navegable más alto del mundo, donde se se pueden visitar las dos islas más importantes de este lago, una es la Isla del Sol, cuna de la cultura Inca, y la Isla de ', '945.00', 14, 'paquete23.jpg', 35, 3, NULL),
(24, 'Crucero a la Momia Tani', 'PASEA EN EL LAGO NAVEGABLE MAS ALTO DEL MUNDO A BORDO DE UN CRUCERO CATAMARÁN																																	', '398.00', 13, 'crucero.jpg', 50, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promocion`
--

CREATE TABLE `promocion` (
  `id` int(11) NOT NULL,
  `idpaquete` int(11) NOT NULL,
  `fechaini` date DEFAULT NULL,
  `fechafin` date DEFAULT NULL,
  `preciopromo` float DEFAULT NULL,
  `descuento` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `promocion`
--

INSERT INTO `promocion` (`id`, `idpaquete`, `fechaini`, `fechafin`, `preciopromo`, `descuento`) VALUES
(11, 19, '2021-04-28', '2021-05-31', 125, 0.5),
(12, 23, '2021-04-30', '2021-05-21', 756, 0.2),
(13, 16, '2021-04-30', '2021-05-14', 259.7, 0.3),
(14, 12, '2021-04-30', '2021-05-07', 799.992, 0.2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `idres` int(11) NOT NULL,
  `idpaq` int(11) NOT NULL,
  `idus` int(11) NOT NULL,
  `fechareserva` date DEFAULT curdate(),
  `cantper` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 0,
  `fechasol` date DEFAULT NULL,
  `total` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`idres`, `idpaq`, `idus`, `fechareserva`, `cantper`, `estado`, `fechasol`, `total`) VALUES
(4, 8, 85, '2020-12-06', 3, 1, '2020-12-17', '2400.00'),
(5, 8, 74, '2020-12-09', 4, 1, '2020-12-25', '3200.00'),
(6, 8, 74, '2020-12-10', 5, 1, '2020-12-25', '4000.00'),
(7, 20, 5, '2020-12-17', 4, 1, '2020-12-26', '840.00'),
(8, 12, 141, '2021-01-11', 5, 1, '2021-01-01', '4995.00'),
(9, 19, 149, '2021-01-12', 3, 0, '2021-01-20', '750.00'),
(10, 15, 5, '2021-01-18', 3, 1, '2021-01-26', '840.00'),
(12, 24, 167, '2021-02-22', 4, 1, '2021-02-25', '1592.00'),
(13, 12, 2, '2021-02-23', 2, 1, '2021-02-26', '1998.00'),
(14, 19, 2, '2021-02-24', 1, 0, '2021-02-27', '250.00'),
(15, 22, 2, '2021-02-24', 3, 0, '2021-02-27', '1470.00'),
(16, 12, 85, '2021-03-27', 2, 0, '2021-03-31', '1998.00'),
(18, 8, 102, '2021-01-26', 2, 0, '2021-01-16', '1600.00'),
(19, 10, 103, '2021-01-27', 2, 0, '2021-01-17', '1960.00'),
(20, 10, 104, '2021-01-28', 2, 0, '2021-01-18', '1960.00'),
(21, 11, 105, '2021-01-29', 2, 1, '2021-01-19', '1000.00'),
(22, 11, 106, '2021-01-30', 2, 1, '2021-01-20', '1000.00'),
(23, 12, 107, '2021-01-25', 2, 0, '2021-01-15', '1998.00'),
(24, 12, 108, '2021-01-26', 2, 0, '2021-01-16', '1998.00'),
(25, 13, 109, '2021-01-27', 2, 0, '2021-01-15', '714.00'),
(26, 13, 110, '2021-01-28', 2, 0, '2021-01-15', '714.00'),
(27, 14, 111, '2021-01-29', 2, 0, '2021-01-18', '1750.00'),
(28, 14, 112, '2021-01-30', 2, 0, '2021-01-15', '1750.00'),
(29, 15, 113, '2021-02-15', 2, 0, '2021-02-01', '560.00'),
(30, 15, 114, '2021-02-16', 2, 0, '2021-02-05', '560.00'),
(31, 16, 115, '2021-02-17', 2, 0, '2021-02-09', '742.00'),
(32, 23, 101, '2021-03-28', 3, 0, '2021-03-31', '2835.00'),
(33, 23, 101, '2021-03-28', 3, 1, '2021-03-31', '2835.00'),
(34, 24, 178, '2021-03-29', 2, 0, '2021-04-05', '796.00'),
(55, 24, 178, '2021-03-29', 2, 0, '2021-03-21', '796.00'),
(57, 14, 179, '2021-04-03', 2, 1, '2021-04-16', '1750.00'),
(58, 14, 179, '2021-04-03', 2, 1, '2021-04-16', '1750.00'),
(59, 14, 179, '2021-04-03', 2, 0, '2021-04-16', '1750.00'),
(60, 14, 179, '2021-04-03', 2, 1, '2021-04-16', '1750.00'),
(61, 20, 188, '2021-04-18', 2, 0, '2021-04-19', '420.00'),
(62, 24, 200, '2021-04-26', 3, 0, '2021-04-29', '1194.00'),
(63, 24, 201, '2021-04-27', 4, 0, '2021-04-26', '1592.00'),
(64, 24, 5, '2021-04-27', 2, 0, '2021-05-01', '636.00'),
(65, 19, 205, '2021-05-02', 2, 1, '2021-05-08', '250.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `idserv` int(11) NOT NULL,
  `detalle` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tiposer` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`idserv`, `detalle`, `tiposer`) VALUES
(1, 'estacionamiento gratis', 0),
(2, 'desayuno gratis', 0),
(3, 'almacenamiento de equipaje', 0),
(4, 'recepcion disponible las 24 horas', 0),
(5, 'wi-fi gratuito', 0),
(6, 'excursionismo', 0),
(7, 'conserje', 0),
(8, 'servicio de lavanderia', 0),
(9, 'restaurante', 0),
(10, 'cambio de divisas', 0),
(11, 'bañera de hidromasaje', 0),
(12, 'sala de juegos', 0),
(13, 'libros, dvd, musica para niños', 0),
(14, 'comedor al aire libre', 0),
(15, 'actividades infatiles (ideal para la familia)', 0),
(16, 'muebles de exterior', 0),
(17, 'billar', 0),
(18, 'salas de reuniones', 0),
(19, 'tenis de mesa', 0),
(20, 'servicio de planchado', 0),
(21, 'bar/salon', 0),
(22, 'desayuno bufet', 0),
(23, 'hotel para no fumadores', 0),
(24, 'zipline', 1),
(25, 'actividad acuatica', 1),
(26, 'guias especializados', 1),
(27, 'hospedaje', 1),
(28, 'alimentación', 1),
(29, 'trekking', 1),
(30, 'parapente', 1),
(31, 'city tour', 1),
(32, 'equipo de bioseguridad', 1),
(33, 'seguro contra accidentes', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipohab`
--

CREATE TABLE `tipohab` (
  `idtipo` int(11) NOT NULL,
  `detalle` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipohab`
--

INSERT INTO `tipohab` (`idtipo`, `detalle`) VALUES
(1, 'individual'),
(2, 'doble'),
(3, 'triple'),
(4, 'quad'),
(5, 'queen'),
(6, 'king'),
(7, 'doble-doble'),
(8, 'suite'),
(9, 'suite ejecutiva'),
(10, 'suite presidencial'),
(11, 'estadia prolongada'),
(12, 'cabaña'),
(13, 'piso ejecutivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipous`
--

CREATE TABLE `tipous` (
  `idt` int(11) NOT NULL,
  `tipous` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipous`
--

INSERT INTO `tipous` (`idt`, `tipous`) VALUES
(1, 'administrador'),
(2, 'encargado'),
(3, 'cliente'),
(4, 'super admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombrecom` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `pass` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telefono` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `dni` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `idtipou` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombrecom`, `email`, `pass`, `telefono`, `dni`, `idtipou`) VALUES
(2, 'Carla Rimba', 'cris@gmail.com', '12345', '78552545', '8588652', 3),
(5, 'Roberto Lagos', 'robertLee@gmail.com', '1010', '21512455', '4565458', 3),
(6, 'Andrea Murillo', 'mariamurillo25@gmail.com', 'andrea35', '791125653', '4513265', 3),
(7, 'Reemberto Agustin', '25agustinr@gmail.com', 'agus10', '2356664', '2025441', 3),
(52, 'Felix Quispe', 'felixquis254@gmail.com', '12345', '73522585', '2025', 2),
(74, 'Alex Salazar', 'alex@gmail.com', '123456', '76523221', '854232545', 3),
(75, 'Martin Stratker', 'martinstr123@gmail.com', '12345', '72508668', '568542', 2),
(78, 'Jimena Cerruto', 'jimena2@gmail.com', '12345', '61216655', '8542136', 2),
(82, 'José Luis Alanes', 'josealanes@gmail.com', '101010', '72545652', '3524684', 2),
(83, 'Romina García', 'rominagarcia12@gmail.com', '123456789', '75845235', '544663', 2),
(85, 'Ernesto Gutierrez', 'ernst522@gmail.com', '12345', '61245869', '5864523', 3),
(86, 'Erik Maquera', 'admin', 'admin', '61216696', '8286974', 4),
(101, 'Ana Blanco', 'ana@gmas.com', '123123', '76254541', '123123', 3),
(102, 'Daniela Helguera', 'helegueradani@gmail.com', '12345', '2356412', '452255', 2),
(103, 'Delia Espejo', 'delia8541@gmail.com', '12345', '78945211', '12345', 3),
(104, 'Enrique Fernandez', 'enriqueferv@gmail.com', '12345', '65232152', '3356422', 3),
(105, 'German Perez', 'bardock2536@gmail.com', '12345', '77798566', '4512', 3),
(106, 'Fernando Mendoza', 'fernando5men@gmail.com', '12345', '62235264', '5264623', 3),
(107, 'Elgi Rodriguez', 'elgi2r@gmail.com', '12345', '67006699', '5654123', 2),
(108, 'Marco Navia', 'marcona52@gmail.com', '12345', '77254441', '3561233', 3),
(109, 'Omar Pascual', 'pascualparedes34@gmail.com', '12345', '75241552', '253646', 3),
(110, 'Avril Georgina', 'avrilgeo75@gmail.com', '12345', '65245563', '2025', 3),
(111, 'Victor Felipez', 'vicfelipez_23@gmail.com', '12345', '78952663', '2025', 3),
(112, 'Teresa Estrada', 'tere_1991@gmail.com', '12345', '62532112', '2025', 3),
(113, 'Oscar Quispe Yavi', 'quisposcar4@gmail.com', '12345', '71993322', '2025', 2),
(114, 'Samuel Rubín de Céliz', 'samuel_celiz@gmail.com', '12345', '63537003', '2025120', 2),
(115, 'Fernanda Ramos', 'ferisita_g56@gmail.com', '12345', '75246632', '2025', 3),
(116, 'Luis Miguel Quiroga', 'luismiq4@gmail.com', '12345', '72545633', '2025', 3),
(117, 'Esperanza Pardo', 'esperanzap4@outlook.com', '12345', '2213456', '2025', 3),
(118, 'Melissa Cori', 'meli_cori1997@gmail.com', '12345', '78952142', '2025', 3),
(119, 'Nahuel Flores', 'nahuel_dark12@gmail.com', '12345', '71245322', '2025', 3),
(120, 'Omar Palavecino', 'omarchiki@gmail.com', '12345', '74215365', '2025', 3),
(121, 'Kelly Quiroga Soliz', 'kelicita_qs1@gmail.com', '12345', '72589665', '2025', 3),
(122, 'Richard Echeverria', 'richar_prins@gmail.com', '12345', '76212322', '2025', 3),
(123, 'dos mil', 'vvv@gmas.com', '12345', '1', '2025', 2),
(124, 'Carla Nuñez', 'carla_nuñez45@gmas.com', '12345', '75844162', '2025', 3),
(125, 'Roberto Mamani', 'felix_ger14@gmail.com', '12345', '76597886', '2025', 2),
(129, 'Ana Patricia Morales', 'anita_fer4@gmail.com', '12345', '77248556', '2025', 3),
(135, 'Alejandra Quiñonez Hurtado', 'alecita_bb@gmail.com', '12345', '75245662', '2025', 3),
(139, 'Mario Paredes', 'smario_541@gmail.com', '12345', '72541133', '2025', 3),
(141, 'Jimena Vaca', 'jime_estrella54@gmail.com', '12345', '72544332', '2025', 3),
(149, 'Raúl Ontiveros Saravia', 'raul_saravia452@gmail.com', '12345', '72044521', '2025', 3),
(167, 'Bryan Adan Duarte', 'bryanduarte@gmail.com', '265341', '78541220', '265341', 3),
(168, 'Gabriela Zuñiga', 'gabrielaz@gmail.com', '5236411', '75255652', '5236411', 3),
(169, 'Susana Contreras', 'susanacont123@gmail.com', '56232144', '591-75264123', '56232144', 3),
(170, 'Felipe Limachi', 'felipeutama@gmail.com', '5241136', '71573745', '5241136', 2),
(171, 'Ramiro Arzabe', 'ramirina@gmail.com', '1245523', '28624513', '1245523', 2),
(172, 'Marcela Navarro', 'marcelita@gmail.com', '452132', '75441222', '452132', 2),
(174, 'Jhonny Quispe', 'jhonnyquispe@gmail.com', '25653124', '74006410', '25653124', 1),
(175, 'Sebastian Reyes', 'sebasreyes@gmail.com', '6325212', '75899662', '6325212', 2),
(177, 'Domingo Espejo Serrano', 'domingoe@gmail.com', '12345', '75844121', '85421345', 3),
(178, 'David Benavides', 'davidb45@gmail.com', '5212346', '76235622', '5212346', 3),
(179, 'Dominic Ernst', 'dominic@gmail.com', '5864121', '61542365', '5864121', 3),
(180, 'Jhonny Efrain Quispe Uscamayta', 'jhonnyquispeu@gmail.com', '2022564', '74006410', '2022564', 2),
(181, 'René David Maquera Cañasto', 'renemaquera@gmail.com', '5236421', '73300918', '5236421', 2),
(182, 'Oscar Quispe Yavi', 'oscarquispe@gmail.com', '6325422', '78541225', '6325422', 2),
(183, 'Nacho Gonzales', 'nachogonzales@gmail.com', 'nacho12345', '75214523', '58744521', 3),
(184, 'Alvaro Morientes', 'alvaromor@outlook.com', '12345', '2541235', '52346512', 3),
(185, 'Rufina Garcia', 'rufinagarcia@gmail.com', '12345', '78562544', '5241236', 3),
(186, 'Martin del Toro', 'martintoro@gmail.com', '12345', '51-98522563', '52366632', 3),
(187, 'Julia Peña', 'julia12@gmail.com', '12345', '79112285', '2514522', 3),
(188, 'Marco Antonio Guzman', 'marcoantonio@gmail.com', '12345', '2586533', '5213654', 3),
(189, 'Rodrigo Tito', 'rodrigotito@gmail.com', '25365122', '69989683', '25365122', 2),
(190, 'Pamela Quispe', 'pamelaquis21@gmail.com', '6523541', '63044344', '6523541', 2),
(191, 'Jose Corrales', 'corrales25@gmail.com', '5236112', '74023994', '5236112', 2),
(192, 'Antonio Chipana Ferrano', 'antoniochipana@gmail.com', '52364541', '74650830', '52364541', 2),
(193, 'Roberto Huarahuara', 'roberto@gmail.com', '2356522', '68096252', '2356522', 2),
(194, 'Noemi Cespedes', 'noemicespedes@gmail.com', '45874551', '78754047', '45874551', 2),
(195, 'Rene Limachi', 'renelimachi@gmail.com', '5655223', '67470339', '5655223', 2),
(196, 'Daniela Quispe', 'daniela@gmail.com', '9856222', '74042692', '9856222', 2),
(197, 'Fructuoso Quispe', 'sucrecopacabana@gmail.com', '542233', '74006410', '542233', 2),
(198, 'Abigail Venegas', 'abigailven@gmail.com', '8265423', '67079158', '8265423', 2),
(199, 'Wilson Blanco', 'wilsonblanco@gmail.com', '523644', '68007612', '523644', 2),
(200, 'Genaro Willemsen', 'genaroWill@gmail.com', '12345', '78562355', '523221', 3),
(201, 'Andrea Ugarte', 'andreaug@gmail.com', '12345', '591-76237798', '325632', 3),
(202, 'Brigida Condori', 'brigida@gmail.com', '12345', '78544122', '2563221', 3),
(203, 'Adan Bernabé', 'adanb25@gmail.com', '12345', '75896552', '52365211', 3),
(204, 'Roberto Galindo', 'robertgalindo@gmail.com', 'robertGalind', '75285656', '28563225', 3),
(205, 'Roberto Galindo', 'robertgalindo22@gmail.com', '123456789', '75845112', '2565233', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agencia`
--
ALTER TABLE `agencia`
  ADD PRIMARY KEY (`idinst`);

--
-- Indices de la tabla `atractivo`
--
ALTER TABLE `atractivo`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_icat` (`idcat`);

--
-- Indices de la tabla `calificaa`
--
ALTER TABLE `calificaa`
  ADD PRIMARY KEY (`idcal`,`idusuario`,`idatr`),
  ADD KEY `fk_iclient` (`idusuario`),
  ADD KEY `fk_iidatr` (`idatr`);

--
-- Indices de la tabla `calificai`
--
ALTER TABLE `calificai`
  ADD PRIMARY KEY (`idcal`,`idcliente`,`idinst`),
  ADD KEY `fk_iclie` (`idcliente`),
  ADD KEY `fk_iinst` (`idinst`);

--
-- Indices de la tabla `calificap`
--
ALTER TABLE `calificap`
  ADD PRIMARY KEY (`idcal`,`idusuario`,`idpaq`),
  ADD KEY `fk_iclien` (`idusuario`),
  ADD KEY `fk_ipaqq` (`idpaq`);

--
-- Indices de la tabla `caracteristica`
--
ALTER TABLE `caracteristica`
  ADD PRIMARY KEY (`idcar`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcat`);

--
-- Indices de la tabla `categoriahot`
--
ALTER TABLE `categoriahot`
  ADD PRIMARY KEY (`idcath`);

--
-- Indices de la tabla `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `experiencia`
--
ALTER TABLE `experiencia`
  ADD PRIMARY KEY (`idexp`),
  ADD KEY `fk_iu` (`idvisitante`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`idhistorial`),
  ADD KEY `fk_hiu` (`idusuario`);

--
-- Indices de la tabla `hotcar`
--
ALTER TABLE `hotcar`
  ADD PRIMARY KEY (`idhotel`,`idcar`),
  ADD KEY `fk_icar` (`idcar`);

--
-- Indices de la tabla `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`idinst`),
  ADD KEY `fk_idcat` (`idcat`);

--
-- Indices de la tabla `hottipohab`
--
ALTER TABLE `hottipohab`
  ADD PRIMARY KEY (`idhotel`,`idtipo`),
  ADD KEY `fk_ith` (`idtipo`);

--
-- Indices de la tabla `idioma`
--
ALTER TABLE `idioma`
  ADD PRIMARY KEY (`idlang`);

--
-- Indices de la tabla `institucion`
--
ALTER TABLE `institucion`
  ADD PRIMARY KEY (`idinst`),
  ADD KEY `fk_iec` (`idencargado`);

--
-- Indices de la tabla `instlang`
--
ALTER TABLE `instlang`
  ADD PRIMARY KEY (`idinst`,`idlang`),
  ADD KEY `fk_ila` (`idlang`);

--
-- Indices de la tabla `instserv`
--
ALTER TABLE `instserv`
  ADD PRIMARY KEY (`idinst`,`idservicio`),
  ADD KEY `fk_ise` (`idservicio`);

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `objeto`
--
ALTER TABLE `objeto`
  ADD PRIMARY KEY (`idobj`);

--
-- Indices de la tabla `paqatr`
--
ALTER TABLE `paqatr`
  ADD PRIMARY KEY (`idpaq`,`idatr`),
  ADD KEY `fk_idat` (`idatr`);

--
-- Indices de la tabla `paqhot`
--
ALTER TABLE `paqhot`
  ADD PRIMARY KEY (`idpaq`,`idhot`),
  ADD KEY `fk_idhot` (`idhot`);

--
-- Indices de la tabla `paqobj`
--
ALTER TABLE `paqobj`
  ADD PRIMARY KEY (`idpaq`,`idobj`),
  ADD KEY `fk_idob` (`idobj`);

--
-- Indices de la tabla `paqserv`
--
ALTER TABLE `paqserv`
  ADD PRIMARY KEY (`idpaq`,`idserv`),
  ADD KEY `fk_ise1` (`idserv`);

--
-- Indices de la tabla `paquete`
--
ALTER TABLE `paquete`
  ADD PRIMARY KEY (`idpaq`),
  ADD KEY `fk_iag` (`idagencia`);

--
-- Indices de la tabla `promocion`
--
ALTER TABLE `promocion`
  ADD PRIMARY KEY (`id`,`idpaquete`),
  ADD KEY `fk_pro` (`idpaquete`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`idres`,`idpaq`,`idus`),
  ADD KEY `fk_idpaque` (`idpaq`),
  ADD KEY `fk_idclie` (`idus`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`idserv`);

--
-- Indices de la tabla `tipohab`
--
ALTER TABLE `tipohab`
  ADD PRIMARY KEY (`idtipo`);

--
-- Indices de la tabla `tipous`
--
ALTER TABLE `tipous`
  ADD PRIMARY KEY (`idt`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tu` (`idtipou`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `atractivo`
--
ALTER TABLE `atractivo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `calificaa`
--
ALTER TABLE `calificaa`
  MODIFY `idcal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `calificai`
--
ALTER TABLE `calificai`
  MODIFY `idcal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT de la tabla `calificap`
--
ALTER TABLE `calificap`
  MODIFY `idcal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `caracteristica`
--
ALTER TABLE `caracteristica`
  MODIFY `idcar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `categoriahot`
--
ALTER TABLE `categoriahot`
  MODIFY `idcath` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `experiencia`
--
ALTER TABLE `experiencia`
  MODIFY `idexp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `idhistorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT de la tabla `idioma`
--
ALTER TABLE `idioma`
  MODIFY `idlang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `institucion`
--
ALTER TABLE `institucion`
  MODIFY `idinst` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `objeto`
--
ALTER TABLE `objeto`
  MODIFY `idobj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `paquete`
--
ALTER TABLE `paquete`
  MODIFY `idpaq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `promocion`
--
ALTER TABLE `promocion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `idres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `idserv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `tipohab`
--
ALTER TABLE `tipohab`
  MODIFY `idtipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tipous`
--
ALTER TABLE `tipous`
  MODIFY `idt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agencia`
--
ALTER TABLE `agencia`
  ADD CONSTRAINT `fk_idag` FOREIGN KEY (`idinst`) REFERENCES `institucion` (`idinst`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `atractivo`
--
ALTER TABLE `atractivo`
  ADD CONSTRAINT `fk_icat` FOREIGN KEY (`idcat`) REFERENCES `categoria` (`idcat`);

--
-- Filtros para la tabla `calificaa`
--
ALTER TABLE `calificaa`
  ADD CONSTRAINT `fk_iclient` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_iidatr` FOREIGN KEY (`idatr`) REFERENCES `atractivo` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `calificai`
--
ALTER TABLE `calificai`
  ADD CONSTRAINT `fk_iclie` FOREIGN KEY (`idcliente`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_iinst` FOREIGN KEY (`idinst`) REFERENCES `institucion` (`idinst`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `calificap`
--
ALTER TABLE `calificap`
  ADD CONSTRAINT `fk_iclien` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ipaqq` FOREIGN KEY (`idpaq`) REFERENCES `paquete` (`idpaq`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `experiencia`
--
ALTER TABLE `experiencia`
  ADD CONSTRAINT `fk_iu` FOREIGN KEY (`idvisitante`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `fk_hiu` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hotcar`
--
ALTER TABLE `hotcar`
  ADD CONSTRAINT `fk_icar` FOREIGN KEY (`idcar`) REFERENCES `caracteristica` (`idcar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ihot` FOREIGN KEY (`idhotel`) REFERENCES `hotel` (`idinst`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hotel`
--
ALTER TABLE `hotel`
  ADD CONSTRAINT `fk_idcat` FOREIGN KEY (`idcat`) REFERENCES `categoriahot` (`idcath`),
  ADD CONSTRAINT `fk_idins` FOREIGN KEY (`idinst`) REFERENCES `institucion` (`idinst`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hottipohab`
--
ALTER TABLE `hottipohab`
  ADD CONSTRAINT `fk_ihote` FOREIGN KEY (`idhotel`) REFERENCES `hotel` (`idinst`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ith` FOREIGN KEY (`idtipo`) REFERENCES `tipohab` (`idtipo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `instlang`
--
ALTER TABLE `instlang`
  ADD CONSTRAINT `fk_ihotel` FOREIGN KEY (`idinst`) REFERENCES `institucion` (`idinst`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ila` FOREIGN KEY (`idlang`) REFERENCES `idioma` (`idlang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `instserv`
--
ALTER TABLE `instserv`
  ADD CONSTRAINT `fk_iho` FOREIGN KEY (`idinst`) REFERENCES `institucion` (`idinst`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ise` FOREIGN KEY (`idservicio`) REFERENCES `servicio` (`idserv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `paqatr`
--
ALTER TABLE `paqatr`
  ADD CONSTRAINT `fk_idat` FOREIGN KEY (`idatr`) REFERENCES `atractivo` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idp` FOREIGN KEY (`idpaq`) REFERENCES `paquete` (`idpaq`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `paqhot`
--
ALTER TABLE `paqhot`
  ADD CONSTRAINT `fk_idhot` FOREIGN KEY (`idhot`) REFERENCES `hotel` (`idinst`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idpaq` FOREIGN KEY (`idpaq`) REFERENCES `paquete` (`idpaq`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `paqobj`
--
ALTER TABLE `paqobj`
  ADD CONSTRAINT `fk_idob` FOREIGN KEY (`idobj`) REFERENCES `objeto` (`idobj`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idpa` FOREIGN KEY (`idpaq`) REFERENCES `paquete` (`idpaq`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `paqserv`
--
ALTER TABLE `paqserv`
  ADD CONSTRAINT `fk_ipp1` FOREIGN KEY (`idpaq`) REFERENCES `paquete` (`idpaq`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ise1` FOREIGN KEY (`idserv`) REFERENCES `servicio` (`idserv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `paquete`
--
ALTER TABLE `paquete`
  ADD CONSTRAINT `fk_iag` FOREIGN KEY (`idagencia`) REFERENCES `agencia` (`idinst`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `promocion`
--
ALTER TABLE `promocion`
  ADD CONSTRAINT `fk_pro` FOREIGN KEY (`idpaquete`) REFERENCES `paquete` (`idpaq`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `fk_idclie` FOREIGN KEY (`idus`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idpaque` FOREIGN KEY (`idpaq`) REFERENCES `paquete` (`idpaq`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_tu` FOREIGN KEY (`idtipou`) REFERENCES `tipous` (`idt`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
