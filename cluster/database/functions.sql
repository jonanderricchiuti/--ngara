CREATE OR REPLACE FUNCTION "Fantasy"."autenticar"(IN "username" text, IN "password" text) RETURNS integer
        STABLE
        STRICT
        SECURITY DEFINER
        LANGUAGE SQL
AS $BODY$
        SELECT
                "Fantasy"."Usuario"."id"
        FROM
                "Fantasy"."Usuario",
                "Fantasy"."passwd"
        WHERE
                "Fantasy"."Usuario"."username"  = $1                           AND
                "Fantasy"."Usuario"."id"      = "Fantasy"."passwd"."usuario" AND
                "Fantasy"."passwd"."password" = $2
$BODY$;



-- TODO: manejar errores (parametros nulos, usuario ya existente, etc)
CREATE OR REPLACE FUNCTION "Fantasy"."registrar"(
        IN      "parametro: nombre"             text,
        IN      "parametro: nombres"            text,
        IN      "parametro: apellidos"          text,		
        IN      "parametro: password"           text
) RETURNS void
        VOLATILE
        STRICT
        SECURITY DEFINER
        LANGUAGE 'plpgsql'
AS $BODY$
        BEGIN
                INSERT INTO "Fantasy"."Usuario" (
                        "username",
                        "nombres",
						"apellidos"
                ) VALUES (
                        "parametro: username",
                        "parametro: nombres",
						"parametro: apellidos"
                );

                INSERT INTO "Fantasy"."passwd"
                SELECT
                        "Fantasy"."Usuario"."id",
                        "parametro: password"
                FROM
                        "Fantasy"."Usuario"
                WHERE
                        "username" = "parametro: username";
        END;
$BODY$;