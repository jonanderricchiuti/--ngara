CREATE TABLE "Fantasy"."Usuario" (
        "id"                    serial                          NOT NULL,
        "username"        text                            NOT NULL,
        "nombres"               text                            NOT NULL,
        "apellidos"             text                            NOT NULL,		
        "email"                 text                            NOT NULL,

        CONSTRAINT "Usuario PRIMARY KEY"
                PRIMARY KEY ("id"),

        CONSTRAINT "Usuario UNIQUE nombre"
                UNIQUE ("username")
);

CREATE TABLE "Fantasy"."Manager" (
        "usuario"               integer                         NOT NULL,
		"creditos"              integer                         NOT NULL,

        CONSTRAINT "Manager PRIMARY KEY"
                PRIMARY KEY ("usuario"),

        CONSTRAINT "Manager FOREIGN KEY usuario REFERENCES Usuario"
                FOREIGN KEY ("usuario")
                REFERENCES "Fantasy"."Usuario" ("id")
                ON DELETE CASCADE
);

CREATE TABLE "Fantasy"."Administrador" (
        "usuario"               integer                         NOT NULL,

        CONSTRAINT "Administrador PRIMARY KEY"
                PRIMARY KEY ("usuario"),

        CONSTRAINT "Administrador FOREIGN KEY usuario REFERENCES Usuario"
                FOREIGN KEY ("usuario")
                REFERENCES "Fantasy"."Usuario" ("id")
                ON DELETE CASCADE
);

-- No tocar nada de esta tabla.
-- Nadie debe tener permisos sobre esta tabla ni sus columnas.
-- Hacer todo a través de funciones seguras.
CREATE TABLE "Fantasy"."passwd" (
        "usuario"               integer                         NOT NULL,
        "password"              password                        NOT NULL,

        CONSTRAINT "passwd PRIMARY KEY"
                PRIMARY KEY ("usuario"),

        CONSTRAINT "passwd FOREIGN KEY usuario REFERENCES Usuario"
                FOREIGN KEY ("usuario")
                REFERENCES "Fantasy"."Usuario" ("id")
                ON DELETE CASCADE
);

CREATE TABLE "Fantasy"."Liga" (
        "id"                    serial                          NOT NULL,
        "nombre"                text                            NOT NULL,
        "creador"               integer                         NOT NULL,
        "es pública"            bool                            NOT NULL,

        CONSTRAINT "Liga PRIMARY KEY"
                PRIMARY KEY ("id"),

        CONSTRAINT "Liga FOREIGN KEY creador REFERENCES Manager"
                FOREIGN KEY ("creador")
                REFERENCES "Fantasy"."Manager" ("usuario")
                ON DELETE CASCADE
);

CREATE TABLE "Fantasy"."Participa" (
        "manager"               integer                         NOT NULL,
        "liga"                  integer                         NOT NULL,

        CONSTRAINT "Participa PRIMARY KEY"
                PRIMARY KEY ("manager", "liga"),

        CONSTRAINT "Participa FOREIGN KEY manager REFERENCES Manager"
                FOREIGN KEY ("manager")
                REFERENCES "Fantasy"."Manager" ("usuario")
                ON DELETE CASCADE,

        CONSTRAINT "Participa FOREIGN KEY liga REFERENCES Liga"
                FOREIGN KEY ("liga")
                REFERENCES "Fantasy"."Liga" ("id")
                ON DELETE CASCADE
);

CREATE TABLE "Fantasy"."Estadio" (
        "id"                    serial                          NOT NULL,
        "nombre"                text                            NOT NULL,
        "ubicacion"             text                            NOT NULL,
        "propietario"           text                            NOT NULL,		
		"medida_left_field"     integer                             NULL,
        "medida_center_field"   integer                             NULL,
        "medida_right_field"    integer                             NULL,		
        "tipo_terreno"       text                            NOT NULL,
        "fecha_fundacion"    date                             NULL,

        CONSTRAINT "Estadio PRIMARY KEY"
                PRIMARY KEY ("id")
);

CREATE TABLE "Fantasy"."Equipo" (
        "id"                    serial                          NOT NULL,
        "nombre"                text                            NOT NULL,
        "siglas"                char(3)                         NOT NULL,
        "fecha_fundacion"    date                             NULL,
        "home"                  integer                         NOT NULL,

        CONSTRAINT "Equipo PRIMARY KEY"
                PRIMARY KEY ("id"),

        CONSTRAINT "Equipo UNIQUE nombre"
                UNIQUE ("nombre"),

        CONSTRAINT "Equipo UNIQUE siglas"
                UNIQUE ("siglas"),

        CONSTRAINT "Equipo FOREIGN KEY home REFERENCES Estadio"
                FOREIGN KEY ("home")
                REFERENCES "Fantasy"."Estadio" ("id")
                ON DELETE RESTRICT
);

CREATE TABLE "Fantasy"."Jugador" (
        "id"                    serial                          NOT NULL,
        "nombres"               text                            NOT NULL,
        "apellidos"             text                            NOT NULL,		
        "fecha_nacimiento"   date                                NULL,
		"posicion"              varchar(2)                      NOT NULL,
        "numero"                integer                         NOT NULL,
        "precio"                integer                         NOT NULL,		
	    "equipo"                integer                         NOT NULL,

        CONSTRAINT "Jugador PRIMARY KEY"
                PRIMARY KEY ("id"),
				
		CONSTRAINT "Jugador FOREIGN KEY equipo REFERENCES Equipo"
                FOREIGN KEY ("equipo")
                REFERENCES "Fantasy"."Equipo" ("id")
                ON DELETE RESTRICT
);

CREATE TABLE "Fantasy"."Roster" (
        "id"                    serial                          NOT NULL,
        "nombre"                text                            NOT NULL,		
        "manager"               integer                         NOT NULL,
        "liga"                  integer                             NULL,
        "puntaje"               integer                             NULL,
        "fecha_creacion"     timestamp with time zone           NOT NULL,

        CONSTRAINT "Roster PRIMARY KEY"
                PRIMARY KEY ("id"),

        CONSTRAINT "Roster UNIQUE (manager, liga)"
                UNIQUE ("manager", "liga"),
	
        CONSTRAINT "Roster UNIQUE (manager, liga, id, nombre)"
                UNIQUE ("manager", "liga", "id", "nombre"),

        CONSTRAINT "Roster FOREIGN KEY manager REFERENCES Manager"
                FOREIGN KEY ("manager")
                REFERENCES "Fantasy"."Manager" ("usuario")
                ON DELETE CASCADE,

        CONSTRAINT "Roster FOREIGN KEY liga REFERENCES Liga"
                FOREIGN KEY ("liga")
                REFERENCES "Fantasy"."Liga" ("id")
                ON DELETE CASCADE
);

CREATE TABLE "Fantasy"."Contenido_Roster" (
        "roster"                integer                         NOT NULL,
        "jugador"               integer                         NOT NULL,
        "fecha_compra"       timestamp with time zone           NOT NULL,
        "fecha_venta"        timestamp with time zone           NULL,

        CONSTRAINT "Contenido de roster PRIMARY KEY"
                PRIMARY KEY ("roster", "jugador"),

        CONSTRAINT "Contenido_Roster FOREIGN KEY roster REFERENCES Roster"
                FOREIGN KEY ("roster")
                REFERENCES "Fantasy"."Roster" ("id")
                ON DELETE CASCADE,

        CONSTRAINT "Contenido_Roster FOREIGN KEY jugador REFERENCES Jugador"
                FOREIGN KEY ("jugador")
                REFERENCES "Fantasy"."Jugador" ("id")
                ON DELETE CASCADE
);

CREATE TABLE "Fantasy"."Estadistica_Bateo" (
        "jugador"   integer                                     NOT NULL,
        "fecha"     date                                        NOT NULL,
        "ci"        integer                                     NOT NULL,
        "ca"        integer                                     NOT NULL,
        "tb"        integer                                     NOT NULL,
        "br"        integer                                     NOT NULL,
        "bb"        integer                                     NOT NULL,
        "k"         integer                                     NOT NULL,
        "e"         integer                                     NOT NULL,		

        CONSTRAINT "Estadistica_Bateo PRIMARY KEY"
                PRIMARY KEY ("jugador", "fecha"),

        CONSTRAINT "Estadistica_Bateo FOREIGN KEY jugador REFERENCES Jugador"
                FOREIGN KEY ("jugador")
                REFERENCES "Fantasy"."Jugador" ("id")
                ON DELETE CASCADE
);

CREATE TABLE "Fantasy"."Estadistica_Pitcheo" (
        "jugador"   integer                                     NOT NULL,
        "fecha"     date                                        NOT NULL,
        "el"        integer                                     NOT NULL,
        "cl"        integer                                     NOT NULL,
        "i"         integer                                     NOT NULL,
        "bb"        integer                                     NOT NULL,
        "k"         integer                                     NOT NULL,
        "jg"        integer                                     NOT NULL,
        "e"         integer                                     NOT NULL,		

        CONSTRAINT "Estadistica_Pitcheo PRIMARY KEY"
                PRIMARY KEY ("jugador", "fecha"),

        CONSTRAINT "Estadistica_Pitcheo FOREIGN KEY jugador REFERENCES Jugador"
                FOREIGN KEY ("jugador")
                REFERENCES "Fantasy"."Jugador" ("id")
                ON DELETE CASCADE
);

CREATE TABLE "Fantasy"."Juega" (
        "jugador"               integer                         NOT NULL,
        "equipo"                integer                         NOT NULL,
        "número"                integer                         NOT NULL,
        "inicio"                date                            NOT NULL,
        "fin"                   date                                NULL,

        CONSTRAINT "Juega PRIMARY KEY"
                PRIMARY KEY ("jugador", "equipo", "inicio"),

        CONSTRAINT "Juega FOREIGN KEY jugador REFERENCES Jugador"
                FOREIGN KEY ("jugador")
                REFERENCES "Fantasy"."Jugador" ("id")
                ON DELETE CASCADE,

        CONSTRAINT "Juega FOREIGN KEY equipo REFERENCES Equipo"
                FOREIGN KEY ("equipo")
                REFERENCES "Fantasy"."Equipo" ("id")
                ON DELETE CASCADE
);

CREATE TABLE "Fantasy"."Juego" (
        "id"                    serial                          NOT NULL,
        "inicio"                timestamp with time zone        NOT NULL,
        "equipo local"          integer                         NOT NULL,
        "equipo visitante"      integer                         NOT NULL,
        "estadio"               integer                         NOT NULL,

        CONSTRAINT "Juego PRIMARY KEY"
                PRIMARY KEY ("id"),

        CONSTRAINT "Juego FOREIGN KEY equipo local REFERENCES Equipo"
                FOREIGN KEY ("equipo local")
                REFERENCES "Fantasy"."Equipo" ("id")
                ON DELETE CASCADE,

        CONSTRAINT "Juego FOREIGN KEY equipo visitante REFERENCES Equipo"
                FOREIGN KEY ("equipo visitante")
                REFERENCES "Fantasy"."Equipo" ("id")
                ON DELETE CASCADE,

        CONSTRAINT "Juego FOREIGN KEY estadio REFERENCES Estadio"
                FOREIGN KEY ("estadio")
                REFERENCES "Fantasy"."Estadio" ("id")
                ON DELETE CASCADE
);
