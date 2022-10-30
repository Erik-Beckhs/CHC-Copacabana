cambiar el nombre de la tabla usuario a admin en el codigo anterior

create table usuarios(
id int auto_increment primary key,
nombrecomp varchar(200),
telefono numeric,
correo varchar(50),
contraseña varchar(30),
fechareg date,
fechamod date
)

insert into usuarios (nombrecomp, telefono, correo, contraseña, fechareg) 
values ('erik maquera', 61216696, 'erikmaquera@gmail.com', '123454', '01/02/2020')


--para el ultimo ya en chc3--
create table experiencia(
    idexp int auto_increment primary key,
    asunto varchar(60),
    experiencia varchar(500),
    valoracion int(1),
    idvisitante int,
    img varchar(100),
    estado boolean,
    constraint fk_iu foreign key (idvisitante) references usuario(id)
)
alter table experiencia 
add column fechapub date default curdate()

--modificar estado--
update experiencia set estado=1

--datos experiencia
insert into experiencia (asunto, experiencia, valoracion, idvisitante, img)
values ('hermoso viaje', 'bonitos lugares, buenos restaurantes y hoteles, sin duda volvería al lugar', 4, 2, 'e1.jpg'), 
('algo costoso pero lo vale', 'al haber viajado en una fecha en donde se realizaba una fiesta, se nos dificultó encontrar hospedaje, al final encontramos pero el precio fue algo elevado, sin embargo la experiencie en el lugar fue inolvidable',
4, 5,'e2.jpg'), 
('un lugar muy intersante', 'nunca antes lo habiamos visitado, nos llevamos buenos recuerdos junto a mi familia, sobre todo de la Isla del Sol 100% recomendable', 5, 6,'e3.jpg'),('Relajante y Bueno', 
'Grandes vistas y muy buena comida, el servicio es muy atento, aunque no rápido, pero vale la pena.  Comimos muy bien y con unas estupendas vistas a la bahía de Copacabana. El precio es razonable. Lo recomiendo.', 5, 2, 'e1.jpg'), 
('Excelente', 'no hicimos reservacion pero encontramos los mejores lugares de servicio de comida y hospedaje, excelentes precios', 5, 6, 'e2.jpg'),('Buen lugar', 'Las vistas que ofrece son muy buenas, sin duda volveriamos a ir', 3, 6, 'e3.jpg'), ('Lo más bonito su gente', 'el trato que recibiimos de la gente del lugar fue muy cordial, nos orientaron cuando quisimos llegar al calvario y a la horca del inca, sin duda volveria a ir', 4, 6, 'e4.jpg'), ('totalmente recomendable', 'Lugares limpios pero hace mucho frio, recomiendo llevar bolsas para dormir y escoger un buen hotel', 4, 7, 'e5.jpg'), (
'una experiencia gratificante', 'En lo referente a la atención por parte de la agencia de viaje, así como de nuestro guía y del conductor, el trato ha sido excelente. El viaje en sí, muy interesante. Por la mentar, las instalaciones en Copacabana no están todo lo bien cuidadas que debieran. Está claro que el gobierno no invierte lo suficiente en cuidar y mantener el lugar.', 4, 6, 'e6.jpg'), ('
perfecto para ir entre amigos', 'organizamos un tour privado y todo salio a la perfección, la coordinación muy bien hecha... agradecemos a Inti travel por toda la ayuda brindada', 5, 7, 'e7.jpg' ), ('Copacabana', 'Excelente tour, visitmos un lugar maravilloso, muy bonito realment, el guía, es un genio, se notaba que sabía mucho del tema y que lo hacía con placer La comida en el restaurante exquisita Recomiendo muchísimo Saludos', 4, 6, 'e8.jpg');

---cambiar la e por la g en el anterior
update experiencia set img='g1.jpg' where img='e1.jpg';
update experiencia set img='g2.jpg' where img='e2.jpg';
update experiencia set img='g3.jpg' where img='e3.jpg';
update experiencia set img='g4.jpg' where img='e4.jpg';
update experiencia set img='g5.jpg' where img='e5.jpg';
update experiencia set img='g6.jpg' where img='e6.jpg';
update experiencia set img='g7.jpg' where img='e7.jpg';
update experiencia set img='g8.jpg' where img='e8.jpg';

--eliminamos servicios y volvemos a crear 
create table servicio(
idserv int AUTO_INCREMENT primary key,
detalle varchar(150),
tiposer boolean default 0
);

insert into servicio(detalle) values ('estacionamiento gratis'),('desayuno gratis'),('almacenamiento de equipaje'),('recepcion disponible las 24 horas'),('wi-fi gratuito'),('excursionismo'),('conserje'),('servicio de lavanderia'), ('restaurante'), ('cambio de divisas'), ('bañera de hidromasaje'), ('sala de juegos'),('libros, dvd, musica para niños'),('comedor al aire libre'),('actividades infatiles (ideal para la familia)'),('muebles de exterior'),('billar'),('salas de reuniones'),('tenis de mesa'),('servicio de planchado'),('bar/salon'),('desayuno bufet'),('hotel para no fumadores');

create table caracteristica(
    idcar int auto_increment primary key,
    detalle varchar(500)
)

insert into caracteristica(detalle) values ('cortinas blockout'),('escritorio'),('chimenea'),('camas extralargas'),('baño privado'),('comedor'),('kitchenette'),('ducha a ras de suelo'),('caja fuerte'),('sala de estar'),('pava electrica'),('bañera ducha'),('secador de pelo'),('balcon privado'),('estante para la ropa'),('lavavajillas'),('utensilios de cocina'),('productos de tocador de cortesia'),('servicio a la habitacion'),('reloj despertador'),('tv pantalla plana'),('habitaciones para familias'),('habitaciones para no fumadores'),('instalaciones de habitaciones VIP'),('plancha')

create table tipohab(
    idtipo int auto_increment primary key,
    detalle varchar(100)
);

insert into tipohab (detalle) VALUES ('individual'), ('doble'),('triple'),('quad'),('queen'),('king'),('doble-doble'),('suite'),('suite ejecutiva'),('suite presidencial'),('estadia prolongada'),('cabaña'),('piso ejecutivo')

create table idioma(
    idlang int auto_increment primary key,
    idioma varchar(50)
);

insert into idioma (idioma) values ('español'), ('inglés'), ('frances'), ('portugues');
insert into idioma (idioma) values ('aleman'), ('mandarin');



alter table hotel
drop constraint fk_idenc5

create table galeriahot(
    idg int auto_increment,
    idhot int,
    ruta varchar(200),
    constraint pk_ig primary key (idg, idhot),
    constraint fk_ii foreign key (idhot) references hotel (idhot) on delete cascade on update cascade
);

create table calificai(
    idcal int auto_increment,
    idcliente int,
    idinst int,
    valoracion int(1),
    comentario varchar(1000),
    fechacal date default curdate(),
    constraint pk_icii primary key (idcal,idcliente, idinst),
    constraint fk_iclie foreign key (idcliente) references usuario (id) on delete cascade on update cascade,
    constraint fk_iinst foreign key (idinst) references institucion (idinst) on delete cascade on update cascade
);

drop constraint



select * 
from hotel h inner join hotserv hs on h.idhot=hs.idhotel 
inner join servicio s on s.idserv=hs.idservicio left join calificah c on h.idhot=c.idhot 
where h.bioseguridad=1


alter table servicio
add column tiposer boolean default 0

insert into servicio (detalle, tiposer) values ('zipline', 1), ('actividad acuatica', 1), ('guias especializados', 1), ('hospedaje', 1), ('alimentación', 1), ('trekking', 1), ('parapente', 1), ('city tour', 1),('equipo de bioseguridad', 1), ('seguro contra accidentes', 1) 

--paquetes--
create table paquete(
    idpaq int auto_increment primary key,
    nombre varchar(100),
    detalle varchar(200),
    precio decimal(5,2),
    fechaini date,
    fechafin date,
    idagencia int,
    imgpaq varchar(100),
    constraint fk_iag foreign key (idagencia) references agencia (id) on delete cascade on update cascade
);

create table programa_estancia(
    idpaq int,
    constraint fk_ipa foreign key (idpaq) references paquete (idpaq) on delete cascade on update cascade
);

create table circuito(
    idpaq int,
    constraint fk_ipaq foreign key (idpaq) references paquete (idpaq) on delete cascade on update cascade
);

create table premium(
    idpaq int,
    constraint fk_ipaqu foreign key (idpaq) references paquete (idpaq) on delete cascade on update cascade
);

create table objeto(
    idobj int auto_increment primary key,
    nombre varchar(100)
);

create table paqatr(
    idpaq int,
    idatr int,
    constraint pk_ipa primary key(idpaq, idatr),
    constraint fk_idp foreign key (idpaq) references paquete (idpaq) on delete cascade on update cascade,
    constraint fk_idat foreign key (idatr) references atractivo (ID) on delete cascade on update cascade
);

create table paqobj(
    idpaq int,
    idobj int,
    constraint pk_ipo primary key(idpaq, idobj),
    constraint fk_idpa foreign key (idpaq) references paquete (idpaq) on delete cascade on update cascade,
    constraint fk_idob foreign key (idobj) references objeto (idobj) on delete cascade on update cascade
);

create table paqhot(
    idpaq int,
    idhot int,
    constraint pk_ipho primary key(idpaq, idhot),
    constraint fk_idpaq foreign key (idpaq) references paquete (idpaq) on delete cascade on update cascade,
    constraint fk_idhot foreign key (idhot) references hotel (idinst) on delete cascade on update cascade
);

create table reserva(
    idres int auto_increment,
    idpaq int,
    idus int,
    fechareserva date default curdate(),
    cantper int,
    estado boolean default 0,
    constraint pk_ipa primary key(idres, idpaq, idus),
    constraint fk_idpaque foreign key (idpaq) references paquete (idpaq) on delete cascade on update cascade,
    constraint fk_idclie foreign key (idus) references usuario (id) on delete cascade on update cascade
);

alter table reserva
add column fechasol date;

insert into objeto (nombre) values ('botella / cantimplora'), ('protector solar'), ('impermeable'), ('enchufe triple'), ('mochila de tela'), ('linterna'), ('gafas de sol'), ('repelente de insectos'), ('mosquitero'), ('sleeping'),('frazadas');

create table paqserv (
    idpaq int,
    idserv int,
    constraint pk_ips1 primary key (idpaq, idserv),
    constraint fk_ipp1 foreign key (idpaq) references paquete(idpaq) on delete cascade on update cascade,
    constraint fk_ise1 foreign key (idserv) references servicio(idserv) on delete cascade on update cascade
)

alter table paquete 
add column cantidadp int;

alter table hotel
add column categoriahot int default 1


eliminar la clasificacion de paquetes
 y adicionar tipo a paquetes

 alter table paquete 
 add column tipopaq int(1)

 create table calificap(
    idcal int auto_increment,
    idusuario int,
    idpaq int,
    valoracion int(1),
    comentario varchar(1000),
    fechacal date default curdate(),
    constraint pk_ipaci primary key (idcal, idusuario, idpaq),
    constraint fk_iclien foreign key (idusuario) references usuario (id) on delete cascade on update cascade,
    constraint fk_ipaqq foreign key (idpaq) references paquete (idpaq) on delete cascade on update cascade
);

alter table usuario change ci dni varchar(20)

create table tipous(
id int auto_increment primary key,
tipous varchar(15)
);

insert into tipous (tipous) values ('administrador'), ('encargado'), ('cliente');

alter table usuario
add column idtipou int,
add constraint fk_tu foreign key (idtipou) references tipous (idt)


create table calificaa(
    idcal int auto_increment,
    idusuario int,
    idatr int,
    valoracion int(1),
    comentario varchar(1000),
    fechacal date default curdate(),
    constraint pk_iciiat primary key (idcal, idusuario, idatr),
    constraint fk_iclient foreign key (idusuario) references usuario (id) on delete cascade on update cascade,
    constraint fk_iidatr foreign key (idatr) references atractivo (id) on delete cascade on update cascade
);

**** cambios en la estructura para institucion y hotel
alter table institucion
change imgGoogle imgInst varchar(200);

alter table institucion
add column bioseguridad boolean,
add column descripcion varchar(200);
drop table cliente


create table hotel(
    idinst int primary key,
    tarifa decimal(5,2),
    idcat int,
    constraint fk_idins foreign key (idinst) references institucion (idinst) on delete cascade on update cascade,
    constraint fk_idcat foreign key (idcat) references categoriahot (idcath)
);

create table categoriahot(
    idcath int auto_increment primary key,
    detalle varchar(20)
);

insert into categoriahot(detalle) values ('Económico'), ('Valor'), ('Calidad'), ('Superior'), ('Excepcional');

create table instserv(
    idinst int,
    idservicio int,
    constraint pk_ihis primary key(idinst, idservicio),
    constraint fk_iho foreign key (idinst) references institucion (idinst) on delete cascade on update cascade,
    constraint fk_ise foreign key (idservicio) references servicio (idserv) on delete cascade on update cascade
);



create table hotcar(
    idhotel int,
    idcar int,
    constraint pk_ihic primary key(idhotel, idcar),
    constraint fk_ihot foreign key (idhotel) references hotel (idinst) on delete cascade on update cascade,
    constraint fk_icar foreign key (idcar) references caracteristica (idcar) on delete cascade on update cascade
);

create table hottipohab(
    idhotel int,
    idtipo int,
    constraint pk_iht primary key(idhotel, idtipo),
    constraint fk_ihote foreign key (idhotel) references hotel (idinst) on delete cascade on update cascade,
    constraint fk_ith foreign key (idtipo) references tipohab (idtipo) on delete cascade on update cascade
);

create table instlang(
    idinst int,
    idlang int,
    constraint pk_ihl primary key(idinst, idlang),
    constraint fk_ihotel foreign key (idinst) references institucion (idinst) on delete cascade on update cascade,
    constraint fk_ila foreign key (idlang) references idioma (idlang) on delete cascade on update cascade
);

alter table institucion 
add column pagina varchar(300),
add column correo VARCHAR(80),
add column ubicacion varchar(300);

alter table institucion
change telefono telefono varchar(30);

insert into paqhot values (3, 3);

 $sql="select p.nombre, count(*) cantidad
 from reserva r, paquete p
 where r.idpaq=p.idpaq
 group by p.nombre
 order by p.nombre";
 $query = $dbh->prepare($sql);
 $query->execute();
 $results=$query->fetchAll(PDO::FETCH_OBJ);
 $array=$results;
 if($query->rowCount()>0)
 {
     foreach($results as $result)
     {  


        --before
    create table agencia(
    idinst int primary key,
    constraint fk_idag foreign key (idinst) references institucion (idinst) on delete cascade on update cascade
)
alter table institucion
add column facebook varchar(150)

alter table festividad
change fecha fechaini datetime

alter table festividad
add fechafin datetime,
add color varchar(30)

alter table festividad
change fechaini start datetime,
change fechafin end datetime,
add column color varchar(30)

alter table events 
add column descripcion varchar(500)


10..24
insert into paqserv values (10, 25), (10, 26), (10, 27), (10, 28), (10, 29), (10, 30), (10, 31), (11, 25), (11, 26), (11, 27), (11, 28), (11, 29), (11, 30), (11, 31), (12, 25), (12, 26), (12, 27), (12, 28), (12, 29), (12, 30), (12, 31), (13, 25), (13, 26), (13, 27), (13, 28), (13, 29), (13, 30), (14, 25), (14, 26), (14, 27), (14, 28), (14, 29), (14, 30), (14, 31), (15, 27), (15, 28), (15, 29), (15, 30), (15, 31), (16, 25), (16, 26), (16, 27), (16, 28), (16, 29), (16, 30), (16, 31), (17, 25), (17, 26), (17, 27), (17, 28), (17, 29), (17, 30), (17, 31), (18, 25), (18, 26),  (18, 28), (18, 29), (18, 30), (18, 31), (19, 25), (19, 26), (19, 27), (19, 28), (19, 29), (19, 30), (19, 31), (20, 25), (20, 26), (20, 27), (20, 28), (20, 29), (20, 30), (20, 31), (21, 25), (21, 26), (21, 27), (21, 28), (21, 29), (22, 25), (22, 26), (22, 27), (22, 28), (22, 29), (22, 30), (22, 31), (23, 25), (23, 26), (23, 27), (23, 28), (23, 29), (23, 30), (23, 31), (24, 25), (24, 26), (24, 27), (24, 28), (24, 29), (24, 30), (24, 31)

15...40
insert into instserv (idinst, idservicio) values (15, 1), (15, 2), (15, 3), (15, 4), (15, 5), (15, 6), (15, 7), (15, 8), (16, 2), (16, 3), (16, 4), (16, 5), (16, 6), (16, 7), (16, 8), (16, 9), (17, 3), (17, 4), (17, 5), (17, 6), (17, 7), (17, 8), (17, 9), (17, 10), (18, 4), (18, 5), (18, 6), (18, 7), (18, 8), (18, 9), (18, 10), (18,11), (19, 5), (19, 6), (19, 7), (19, 8), (19, 9), (19, 10), (19,11), (19,12), (20, 6), (20, 7), (20, 8), (20, 9), (20, 10), (20,11), (20,12), (20, 13), (21, 7), (21, 8), (21, 9), (21, 10), (21,11), (21,12), (21, 13), (21,14), (22, 1), (22, 2), (22, 3), (22, 4), (22, 5), (22, 6), (22, 7), (22, 8), (23, 2), (23, 3), (23, 4), (23, 5), (23, 6), (23, 7), (23, 8), (23, 9), (24, 3), (24, 4), (24, 5), (24, 6), (24, 7), (24, 8), (24, 9), (24, 10), (25, 4), (25, 5), (25, 6), (25, 7), (25, 8), (25, 9), (25, 10), (25,11), (26, 5), (26, 6), (26, 7), (26, 8), (26, 9), (26, 10), (26,11), (26,12), (27, 6), (27, 7), (27, 8), (27, 9), (27, 10), (27,11), (27,12), (27, 13), (28, 7), (28, 8), (28, 9), (28, 10), (28,11), (28,12), (28, 13), (28,14), (29, 1), (29, 2), (29, 3), (29, 4), (29, 5), (29, 6), (29, 7), (29, 8), (30, 2), (30, 3), (30, 4), (30, 5), (30, 6), (30, 7), (30, 8), (30, 9), (32, 3), (32, 4), (32, 5), (32, 6), (32, 7), (32, 8), (32, 9), (32, 10), (33, 4), (33, 5), (33, 6), (33, 7), (33, 8), (33, 9), (33, 10), (33,11), (34, 5), (34, 6), (34, 7), (34, 8), (34, 9), (34, 10), (34,11), (34,12), (35, 6), (35, 7), (35, 8), (35, 9), (35, 10), (35,11), (35,12), (35, 13), (36, 7), (36, 8), (36, 9), (36, 10), (36,11), (36,12), (36, 13), (36,14), (37, 1), (37, 2), (37, 3), (37, 4), (37, 5), (37, 6), (37, 7), (37, 8), (38, 2), (38, 3), (38, 4), (38, 5), (38, 6), (38, 7), (38, 8), (38, 9), (39, 3), (39, 4), (39, 5), (39, 6), (39, 7), (39, 8), (39, 9), (39, 10), (40, 4), (40, 5), (40, 6), (40, 7), (40, 8), (40, 9), (40, 10), (40,11), (41, 5), (41, 6)


insert into usuario (id, nombrecom, email, pass, telefono, dni) 
values (101, 'Ana Blanco', 'ana@gmail.com', '123123', '76254541', '123123'),
(102, 'Bruno Caceres', 'bruno@gmail.com', '133133', '73585842', '133133'),
(103, 'Delia Espejo', 'deliaes@gmail.com', '234234', '76585842', '234234'),
(104, 'Enrique Fernandez', 'ferdenri@hotmail.com', '533533', '73585841', '533533'),
(105, 'Gabriela Huerta', 'gabi777@gmail.com', '222333', '73585844', '222333'),
(106, 'Ismael Jusino', 'ismaj444@gmail.com', '444555', '77585842', '444555'),
(107, 'Katherinne Lima', 'katylima1991@gmail.com', '666777', '76578842', '666777'),
(108, 'Marco Navia', 'navia4755@gmail.com', '888999', '77285847', '888999'),
(109, 'Oriana Paye', 'orianapris@gmail.com', '10111011', '79585842', '10111011'),
(110, 'Ruben Santiago', 'santi8525@gmail.com', '155155', '79112858', '155155'),
(111, 'Tania Humerez', 'taniahu4@gmail.com', '166166', '71985842', '166166'),
(112, 'Ivan Juarez', 'ivancho4545@gmail.com', '177177', '79185542', '177177'),
(113, 'Karen Mendez', 'karencitam77@gmail.com', '188188', '72585842', '188188'),
(114, 'Norberto Ortega', 'norberto@gmail.com', '199199', '73286862', '199199'),
(115, 'Patricia Quispe', 'pattyquis5@gmail.com', '233233', '77212842', '233233'),
(116, 'Ramiro Sarmiento', 'ramiro2121@gmail.com', '433133', '73585844', '433133'),
(117, 'Teresa Uzquiano', 'uzquianotere_21@gmail.com', '255255', '79112859', '255255'),
(118, 'Victor Wenseslao', 'vicmanw12@gmail.com', '167167', '71985849', '167167')
insert into usuario (id, nombrecom, email, pass, telefono, dni) 
values
(119, 'Zenobia Aranda', 'zenobia23a@gmail.com', '178178', '79185552', '178178'),
(120, 'Bernardo Callisaya', 'bernaam77@gmail.com', '189189', '72554541', '189189'),
(121, 'Doris Ergueta', 'dorisitaergueta12@gmail.com', '116116', '71286863', '116116'),
(122, 'Fabricio Gandía', 'gandiafabo@gmail.com', '235235', '77212872', '235235'),
(123, 'Hortencia Illatarco', 'horte210@gmail.com', '433139', '73585840', '433139'),
(124, 'Javier Quispe', 'javiquis_21@gmail.com', '258258', '79131214', '258258'),
(125, 'Reina Salinas', 'reina_sali@gmail.com', '164164', '71985850', '164164')

hotel 15...40
caracteristicas 1..25

insert into hotcar (idhotel, idcar) values (15, 4), (15, 5), (15, 6), (15, 7), (15, 8), (15, 9), (15, 10), (15, 11),  (16, 5), (16, 6), (16, 7), (16, 8), (16, 9), (16, 10), (16, 11), (16, 12), (17, 6), (17, 7), (17, 8), (17, 9), (17, 10), (17, 11), (17, 12), (17, 13), (18, 7), (18, 8), (18, 9), (18, 10), (18, 11), (18, 12), (18, 13), (18, 14),  (19, 1), (19, 2), (19, 3), (19, 4), (19, 5), (19, 6), (19, 7), (19, 8), (20, 9), (20, 10), (20, 11), (20, 12), (20, 13), (20, 14), (20, 15), (20, 16),  (21, 10), (21, 11), (21, 12), (21, 13), (21, 14), (21, 15), (21, 16), (21, 17),  (22, 11), (22, 12), (22, 13), (22, 14), (22, 15), (22, 16), (22, 17), (22, 18), (23, 12), (23, 13), (23, 14), (23, 15), (23, 16), (23, 17), (23, 18), (23, 19), (24, 20), (24, 21), (24, 22), (24, 23), (24, 24), (24, 25), (24, 1), (24, 2),  (25, 21), (25, 22), (25, 23), (25, 24), (25, 25), (25, 1), (25, 2), (25, 3), (26, 22), (26, 23), (26, 24), (26, 25), (26, 1), (26, 2), (26, 3), (26, 4), (27, 23), (27, 24), (27, 25), (27, 1), (27, 2), (27, 3), (27, 4), (27, 5),  (28, 24), (28, 25), (28, 1), (28, 2), (28, 3), (28, 4), (28, 5), (28, 6),  (29, 25), (29, 1), (29, 2), (29, 3), (29, 4), (29, 5), (29, 6), (29, 7), (30, 2), (30, 3), (30, 4), (30, 5), (30, 6), (30, 7), (30, 8),  (31, 2), (31, 3), (31, 4), (31, 5), (31, 6), (31, 7), (31, 8), (31,9), (32, 11), (32, 12), (32, 13), (32, 14), (32, 15), (32, 16), (32, 17), (32, 18), (33, 12), (33, 13), (33, 14), (33, 15), (33, 16), (33, 17), (33, 18), (33, 19), (34, 20), (34, 21), (34, 22), (34, 23), (34, 24), (34, 25), (34, 1), (34, 2),  (35, 21), (35, 22), (35, 23), (35, 24), (35, 25), (35, 1), (35, 2), (35, 3), (36, 22), (36, 23), (36, 24), (36, 25), (36, 1), (36, 2), (36, 3), (36, 4), (37, 23), (37, 24), (37, 25), (37, 1), (37, 2), (37, 3), (37, 4), (37, 5),  (38, 24), (38, 25), (38, 1), (38, 2), (38, 3), (38, 4), (38, 5), (38, 6),  (39, 25), (39, 1), (39, 2), (39, 3), (39, 4), (39, 5), (39, 6), (39, 7), (40, 2), (40, 3), (40, 4), (40, 5), (40, 6), (40, 7), (40, 8)


insert into instserv values (38, 3), (38, 4), (38, 5),(38, 6),(38, 7), (38, 8), (38, 9),(38, 10),(38, 11), (38, 12), (39, 13), (39, 14), (39, 15),(39, 16),(39, 17), (39, 18), (39, 19),(39, 20),(39, 21), (39, 22),(40, 3), (40, 23), (40, 1),(40, 2),(40, 3), (40, 4), (40, 5),(40, 6),(40, 7), (40, 8)

insert into hottipohab values (15, 1), (15, 2), (15, 3), (15, 4), (15, 5), (16, 2), (16, 3), (16, 4), (16, 5), (16, 6), (17, 3), (17, 4), (17, 5), (17, 6),  (17, 7),  (18, 4), (18, 5), (18, 6),  (18, 7), (18, 8),  (19, 5), (19, 6),  (19, 7), (19, 8), (19, 9),  (20, 6),  (20, 7), (20, 8), (20, 9), (20, 10),   (21, 7), (21, 8), (21, 9), (21, 10), (21, 11),  (22, 8), (22, 9), (22, 10), (22, 11), (22, 12),  (23, 9), (23, 10), (23, 11), (23, 12), (23, 13), (24, 1), (24, 2), (24, 3), (24, 4), (24, 5), (25, 2), (25, 3), (25, 4), (25, 5), (25, 6), (26, 3), (26, 4), (26, 5), (26, 6),  (26, 7),  (27, 4), (27, 5), (27, 6),  (27, 7), (27, 8),  (28, 5), (28, 6),  (28, 7), (28, 8), (28, 9),  (29, 6),  (29, 7), (29, 8), (29, 9), (29, 10),   (30, 7), (30, 8), (30, 9), (30, 10), (30, 11),  (31, 8), (31, 9), (31, 10), (31, 11), (31, 12),  (32, 9), (32, 10), (32, 11), (32, 12), (32, 13), (33, 1), (33, 2), (33, 3), (33, 4), (33, 5), (34, 2), (34, 3), (34, 4), (34, 5), (34, 6), (35, 3), (35, 4), (35, 5), (35, 6),  (35, 7),  (36, 4), (36, 5), (36, 6),  (36, 7), (36, 8),  (37, 5), (37, 6),  (37, 7), (37, 8), (37, 9),  (38, 6),  (38, 7), (38, 8), (38, 9), (38, 10),   (39, 7), (39, 8), (39, 9), (39, 10), (39, 11),  (40, 8), (40, 9), (40, 10), (40, 11), (40, 12);

select *
from hotel h, (select i.idinst, tmp.val from institucion i left join (select idinst, avg(valoracion) val from calificai group by idinst) tmp on i.idinst=tmp.idinst
order by tmp.val) tmp2
where h.idinst=tmp2.idinst

insert into paqobj values (10, 1), (10, 2), (10, 3), (10, 4),(10, 5),(10, 6), (11, 2), (11, 3), (11, 4),(11, 5),(11, 6), (11, 7), (12, 3), (12, 4),(12, 5),(12, 6), (12, 7), (12, 8),  (13, 4),(13, 5),(13, 6), (13, 7), (13, 8), (13, 9), (14, 5),(14, 6), (14, 7), (14, 8), (14, 9), (14, 10), (15, 6), (15, 7), (15, 8), (15, 9), (15, 10), (15, 11), (16, 1), (16, 2), (16, 3), (16, 4),(16, 5),(16, 6), (17, 2), (17, 3), (17, 4),(17, 5),(17, 6), (17, 7), (18, 3), (18, 4),(18, 5),(18, 6), (18, 7), (18, 8),  (19, 4),(19, 5),(19, 6), (19, 7), (19, 8), (19, 9), (20, 5),(20, 6), (20, 7), (20, 8), (20, 9), (20, 10), (21, 6), (21, 7), (21, 8), (21, 9), (21, 10), (21, 11), (22, 1), (22, 2), (22, 3), (22, 4),(22, 5),(22, 6), (23, 2), (23, 3), (23, 4),(23, 5),(23, 6), (23, 7), (24, 3), (24, 4),(24, 5),(24, 6), (24, 7), (24, 8);

INSERT INTO paqatr values (10, 4), (10, 5) , (10, 6), (10, 10), (10, 14) , (10, 15), (10, 21), (10, 30) , (10, 32), (11, 4) , (11, 12), (11, 15), (11, 16) , (11, 18), (11, 20), (11, 21) , (11, 30), (11, 33), (11, 34) , (12, 1), (12, 5) , (12, 6), (12, 10), (12, 13) , (12, 24), (12, 26), (12, 32) , (13, 4), (13, 12), (13, 21) , (13, 23), (13, 30), (14, 4), (14, 12), (14, 21) , (14, 23), (14, 30), (16, 18), (17, 18), (18, 1), (18, 4), (18, 5), (18, 10), (18, 13) , (18, 14), (18, 15),  (18, 17), (18, 21), (18, 22), (18, 23), (18, 24), (18, 27), (19, 10), (20, 14), (20, 15), (20, 22), (20, 33), (21, 4), (21, 12), (21, 21) , (21, 23), (21, 30), (22, 14) , (22, 18), (22, 28), (23, 4), (23, 5) , (23, 6), (23, 10), (23, 14) , (23, 15), (23, 21), (23, 30) , (23, 32), (24, 4) , (24, 12), (24, 15), (24, 16) , (24, 18), (24, 20), (24, 21) , (24, 30), (24, 33), (24, 34);

select r.* from reserva r where estado=1 and r.idpaq in (select p.idpaq
from paquete p, (select i.idinst from institucion i, usuario u 
where u.id=i.idencargado and u.id=82) tmp
where p.idagencia = tmp.idinst)

agrupar por paq y salida

select idpaq, fechasol, sum(cantper)
from reserva
group by idpaq, fechasol


create table historial(
    idhistorial auto_increment primary key,
    idusuario int,
    tipo int,
    ingreso datetime;
    salida datetime;
    constraint fk_hiu foreign key (idusuario) references usuario (id) on delete cascade on update cascade
)

alter table atractivo
add column localidad varchar(30)

create table noticia(
id int AUTO_INCREMENT PRIMARY key,
titulo varchar(500),
detalle varchar(2000),
fecha date default CURRENT_DATE,
activo boolean default 1,
image varchar(50)
)

insert into noticia (titulo, detalle, fecha, image) values ('Presentación de propuestas, candidatos a la Alcaldía', 'Gran presentación de propuestas de los candidatos a la alcaldía gestión 2021 _ 2026 en coordinación con radio Copacabana y la camara hotelera invitan a todo los candidatos que postulan para la gestión municipal a la presentación de PROPUESTAS contamos con su compromiso de asistir a esta invitación el día jueves 11 de febrero  a horas 09 a.m. en los salones del hotel GLORIA COPACABANA.... Informamos a los candidatos que esto no será un debate solo una presentación de propuestas en el marco de respeto ...a su vez se les pide encarecidamente puedan asistir con toda las medidas de bioseguridad', '2021/02/08', 'propuesta.jpg')

insert into calificai (idcliente, idinst, valoracion, comentario, fechacal) values 
(2, 10, 5, 'A toda la gente que desee visitarla, mi familia y yo la pasamos bien, hay cosas que mejorar pero en general estuvo aceptable la estancia', '2021-01-06'),
(5, 10, 7, 'Solemos visitar este lugar desde hace 5 años y hasta ahora no tenemos quejas', '2021-01-08'),
(6, 11, 8, 'Copacabana es un lugar muy bonito para quedarse y este hotel hace que la estancia valga la pena', '2021-01-10'),
(7, 11, 8, 'Desde que la vi en las redes sociales me convecio, cuartos limpios, terraza con buena vista, se los recomiendo', '2021-01-12'),
(74, 33, 6, 'A Copacabana no voy muy seguido pero las veces que fui siempre encontre un lugar aceptable para quedarme y este no se queda atras', '2021-01-14'),
(85, 34, 8, 'Para toda la familia, un lugar agradable y con buena conexion a internet, mis hijos la pasaron bien', '2021-01-16'),
(101, 15, 8, 'Quisieramos que siempre nos toque quedarnos en un lugar asi o aun mas agradable, felicidades a don Mario que se portó bien con nosotros', '2021-01-18'),
(103, 15, 10, 'Es de los mejores hoteles que he visitado, buena comida, buena vista y personal capacitado, se los recomiendo', '2021-01-20'),
(104, 16, 1, 'Que lugar mas espantoso, sobretodo el de administracion, es un señor muy grosero, no vuelvo a visitar el lugar', '2021-01-22'),
(105, 16, 4, 'Creimos que la ibamos a pasar bien pero apenas duramos una noche, mala atencion, mala señal y los precios no lo valen', '2021-01-24'),
(106, 37, 9, 'durante los dias de estancia vimos como el hotel se llenaba y no quedaban habitaciones, es por que lo vale, precios modicos, salon de juegos y mucha mas variedad', '2021-01-26'),
(107, 18, 6, 'Estuvimos dos noches y no tenemos reclamos, lo unico que no nos gusto fue que cierran muy temprano, a las 10', '2021-01-28'),
(108, 19, 8, 'Perdimos nuestro cargador y el señor administrador muy amable nos lo habia guardado, recomiento el lugar, no solo por eso sino por la atencion y el rico desayuno', '2021-01-30'),
(2, 20, 5, 'A toda la gente que desee visitarla, mi familia y yo la pasamos bien, hay cosas que mejorar pero en general estuvo aceptable la estancia', '2021-01-06'),
(5, 21, 7, 'Solemos visitar este lugar desde hace 5 años y hasta ahora no tenemos quejas', '2021-01-08'),
(6, 22, 8, 'Copacabana es un lugar muy bonito para quedarse y este hotel hace que la estancia valga la pena', '2021-01-10'),
(7, 23, 8, 'Desde que la vi en las redes sociales me convecio, cuartos limpios, terraza con buena vista, se los recomiendo', '2021-01-12'),
(74, 24, 6, 'A Copacabana no voy muy seguido pero las veces que fui siempre encontre un lugar aceptable para quedarme y este no se queda atras', '2021-01-14'),
(85, 25, 8, 'Para toda la familia, un lugar agradable y con buena conexion a internet, mis hijos la pasaron bien', '2021-01-16'),
(101, 26, 8, 'Quisieramos que siempre nos toque quedarnos en un lugar asi o aun mas agradable, felicidades a don Mario que se portó bien con nosotros', '2021-01-18'),
(103, 27, 10, 'Es de los mejores hoteles que he visitado, buena comida, buena vista y personal capacitado, se los recomiendo', '2021-01-20'),
(104, 28, 1, 'Que lugar mas espantoso, sobretodo el de administracion, es un señor muy grosero, no vuelvo a visitar el lugar', '2021-01-22'),
(105, 29, 4, 'Creimos que la ibamos a pasar bien pero apenas duramos una noche, mala atencion, mala señal y los precios no lo valen', '2021-01-24'),
(106, 30, 9, 'durante los dias de estancia vimos como el hotel se llenaba y no quedaban habitaciones, es por que lo vale, precios modicos, salon de juegos y mucha mas variedad', '2021-01-26'),
(107, 35, 6, 'Estuvimos dos noches y no tenemos reclamos, lo unico que no nos gusto fue que cierran muy temprano, a las 10', '2021-01-28'),
(108, 32, 8, 'Perdimos nuestro cargador y el señor administrador muy amable nos lo habia guardado, recomiento el lugar, no solo por eso sino por la atencion y el rico desayuno', '2021-01-30');

insert into reserva (idpaq, idus, fechareserva, cantper, fechasol) values 
(8, 101,'2021-01-25',2, '2021-01-15'),
(8, 102,'2021-01-26',2, '2021-01-16'),
(10, 103,'2021-01-27',2, '2021-01-17'),
(10, 104,'2021-01-28',2, '2021-01-18'),
(11, 105,'2021-01-29',2, '2021-01-19'),
(11, 106,'2021-01-30',2, '2021-01-20'),
(12, 107,'2021-01-25',2, '2021-01-15'),
(12, 108,'2021-01-26',2, '2021-01-16'),
(13, 109,'2021-01-27',2, '2021-01-15'),
(13, 110,'2021-01-28',2, '2021-01-15'),
(14, 111,'2021-01-29',2, '2021-01-18'),
(14, 112,'2021-01-30',2, '2021-01-15'),
(15, 113,'2021-02-15',2, '2021-02-01'),
(15, 114,'2021-02-16',2, '2021-02-05'),
(16, 115,'2021-02-17',2, '2021-02-09')

insert into calificap (idusuario, idpaq, valoracion, comentario, fechacal) values 
(105, 10,5,'Para ser nuestra primera experiencia con la empresa estuvo muy bien, recomendado','2021-01-25'),
(106, 10,4,'Divertido, es como puedo calificarlo','2021-01-25'),
(107, 12,3,'Fue una experiencia agradable, sin embargo el costo estuvo algo elevado para la visita','2021-01-25'),
(108, 12,5,'Se los recomiendo','2021-01-25'),
(109, 14,4,'Bastante agradable la estadia y los atractivos que visitamos, siempre es bonito visitar Copacabana y a la mamita de Copacabana','2021-01-27'),
(110, 14,3,'Comparado con las veces que anteriormente visité Copacabana la agencia no hizo la diferencia','2021-01-27'),
(111, 16,5,'Ninguno de mi grupo podría quejarse, paquetes así es lo q hacia falta para mejorar la visita al Santuario','2021-01-27'),
(112, 16,4,'Todo el recorrido nos las pasamos tomando fotografías, es un bello lugar, espero volver pronto','2021-01-27'),
(113, 18,3,'La llegada al lugar tuvo un retraso de al menos 2 horas, deberían preveer esos contratiempos ya que la ruta y el tiempo no son suficientes','2021-01-27'),
(114, 18,5,'Sin duda alguna volveré a ir con la familia, es una experiencia diferente, los guias muy amables','2021-01-29'),
(115, 20,4,'Durante la estadia nos dimos cuenta que necesitabamos mas cosas, como toallas y una muda completa, ya que en el paseo en bote nos mojamos muchos, deberian especificar tambien ellos en los objetos a llevar','2021-01-29'),
(116, 20,3,'Muy caro, es preferible ir de manera independiente porque allá tambien se gasta en otroas cosas','2021-01-29'),
(117, 21,5,'Completamente emocionados por volver, un tour maravilloso....','2021-02-05'),
(105, 22,4,'Facilmente pudimos llevar a un miembro mas, creimos que el cupo era limitado pero ya el guia nos explico que pudimos haber llevado mas gente, la proxima nosvamos con la amilia completa','2021-02-05'),
(106, 24,3,'Copacabana es un lugar muy bello, dependiendo al destino hay que analizar muy bien si vamos con una agencia o no, para este recorrdio no lo recomiendo, es mejor ir solos','2021-02-05'),
(107, 24,2,'No fue de las mejores experiencias, hubo un ruido en la noche que no nos dejaba dormir, el paseo estuvo bien','2021-02-05'),
(108, 21,5,'Absolutamente valió la pena','2021-02-05')

create table promocion(
    id int auto_increment,
    idpaquete int,
    tipopromo int,
    fechaini date,
    fechafin date,
    preciopromo money,
    cantidad int,
    constraint pk_pro primary key (id, idpaquete),
    constraint fk_pro foreign key (idpaquete) references paquete (idpaq) on update cascade on delete cascade
)
