<?php
    require_once './db/config.php';
    class Model {
        protected $db;

        public function __construct() {
            $this->crearDb();
            $this->db = new PDO(
                'mysql:host='. MYSQL_HOST .
                ';dbname='. MYSQL_DB .
                ';charset=utf8', MYSQL_USER, MYSQL_PASS
            );
            $this->deploy();
        }

        private function deploy(){
            $query = $this->db->query('SHOW TABLES');
            $tables = $query->fetchAll();
            if(count($tables) == 0) {
                $sql =<<<END
                -- Estructura de tabla para la tabla `libreria`
                --

                CREATE TABLE `libreria` (
                `id_libreria` int(11) NOT NULL,
                `nombre` varchar(70) NOT NULL,
                `direccion` varchar(100) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

                --
                -- Volcado de datos para la tabla `libreria`
                --

                INSERT INTO `libreria` (`id_libreria`, `nombre`, `direccion`) VALUES
                (7, 'Juanes', 'Marconi 1122'),
                (8, 'Don Quijote', 'General Rodriguez 142');

                -- --------------------------------------------------------

                --
                -- Estructura de tabla para la tabla `libros`
                --

                CREATE TABLE `libros` (
                `id_libro` int(11) NOT NULL,
                `nombre_libro` varchar(70) NOT NULL,
                `genero` varchar(50) NOT NULL,
                `editorial` varchar(70) NOT NULL,
                `id_libreria` int(11) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

                --
                -- Volcado de datos para la tabla `libros`
                --

                INSERT INTO `libros` (`id_libro`, `nombre_libro`, `genero`, `editorial`, `id_libreria`) VALUES
                (3, 'Mario', 'Videojuegos', 'Saturno', 7),
                (4, 'El Alquimista', 'Autoayuda', 'Planeta', 7),
                (5, 'El Zorro', 'Accion', 'El mundo', 8);

                --
                -- Índices para tablas volcadas
                --

                --
                -- Indices de la tabla `libreria`
                --
                ALTER TABLE `libreria`
                ADD PRIMARY KEY (`id_libreria`);

                --
                -- Indices de la tabla `libros`
                --
                ALTER TABLE `libros`
                ADD PRIMARY KEY (`id_libro`),
                ADD KEY `id_libreria` (`id_libreria`);

                --
                -- AUTO_INCREMENT de las tablas volcadas
                --

                --
                -- AUTO_INCREMENT de la tabla `libreria`
                --
                ALTER TABLE `libreria`
                MODIFY `id_libreria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

                --
                -- AUTO_INCREMENT de la tabla `libros`
                --
                ALTER TABLE `libros`
                MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

                --
                -- Restricciones para tablas volcadas
                --

                --
                -- Filtros para la tabla `libros`
                --
                ALTER TABLE `libros`
                ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`id_libreria`) REFERENCES `libreria` (`id_libreria`);
                COMMIT;
                END;
                $this->db->query($sql);
            }

        }

        private function crearDb(){
            $nombreDb = MYSQL_DB;
            $pdo = new PDO('mysql:host =' . MYSQL_HOST.';charset = utf8', MYSQL_USER, MYSQL_PASS);
            $query = "CREATE DATABASE IF NOT EXISTS $nombreDb";
            $pdo->exec($query);
        }

    }
