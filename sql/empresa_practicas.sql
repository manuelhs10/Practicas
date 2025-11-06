CREATE TABLE IF NOT EXISTS empresas_practicas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  razon_social VARCHAR(255) NOT NULL,
  nombre_empresa VARCHAR(255) NOT NULL,
  cif_nif CHAR(9) NOT NULL,
  resp_nombre VARCHAR(100) NOT NULL,
  resp_apellido VARCHAR(100) NOT NULL,
  resp_dni CHAR(9) NOT NULL,
  resp_email VARCHAR(150) NOT NULL,
  tutor_nombre VARCHAR(100) NOT NULL,
  tutor_apellido VARCHAR(100) NOT NULL,
  tutor_dni CHAR(9) NOT NULL,
  tutor_email VARCHAR(150) NOT NULL,
  direccion VARCHAR(255) NOT NULL,
  horario INT NOT NULL DEFAULT 0,
  compensacion ENUM('si','no') NOT NULL DEFAULT 'no',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
