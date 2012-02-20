CREATE TABLE estadisticas (id INT AUTO_INCREMENT, usuarios BIGINT, totales BIGINT, ok BIGINT, fallidas BIGINT, sospechosas BIGINT, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE estadisticas_llamadas (id INT AUTO_INCREMENT, fecha TEXT, llamadas_ok BIGINT, llamadas_sospechosas BIGINT, llamadas_fallidas BIGINT, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE historico_alarmas (id INT AUTO_INCREMENT, nombre TEXT, fecha DATE, detalle TEXT, origen TEXT, user_id BIGINT, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE notificaciones (id INT AUTO_INCREMENT, fecha DATE, accion TEXT, masinfourl TEXT, regla_id INT, user_id BIGINT, leida TINYINT(1), INDEX regla_id_idx (regla_id), INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE usuario_pbx (id INT AUTO_INCREMENT, extension TEXT, tecnologia TEXT, ultimo_registro DATE, conectado TINYINT(1), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE perfil (id INT AUTO_INCREMENT, nombre TEXT, descripcion TEXT, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE prefijo (id INT AUTO_INCREMENT, descripcion TEXT, numero TEXT, costoporminuto FLOAT(18, 2), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE regla (id INT AUTO_INCREMENT, nombre TEXT, importante TINYINT(1), type VARCHAR(255), lunes TINYINT(1), martes TINYINT(1), miercoles TINYINT(1), jueves TINYINT(1), viernes TINYINT(1), sabado TINYINT(1), domingo TINYINT(1), desde TIME, hasta TIME, cantidadllamadas BIGINT, costomaximo FLOAT(18, 2), INDEX regla_type_idx (type), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE regla (id INT AUTO_INCREMENT, nombre TEXT, importante TINYINT(1), type VARCHAR(255), lunes TINYINT(1), martes TINYINT(1), miercoles TINYINT(1), jueves TINYINT(1), viernes TINYINT(1), sabado TINYINT(1), domingo TINYINT(1), desde TIME, hasta TIME, cantidadllamadas BIGINT, costomaximo FLOAT(18, 2), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE regla_perfil (regla_id INT, perfil_id INT, PRIMARY KEY(regla_id, perfil_id)) ENGINE = INNODB;
CREATE TABLE regla_prefijo (regla_id INT, prefijo_id INT, PRIMARY KEY(regla_id, prefijo_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_forgot_password (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, unique_key VARCHAR(255), expires_at DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group_permission (group_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_permission (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_remember_key (id BIGINT AUTO_INCREMENT, user_id BIGINT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user (id BIGINT AUTO_INCREMENT, first_name VARCHAR(255), last_name VARCHAR(255), email_address VARCHAR(255) NOT NULL UNIQUE, username VARCHAR(128) NOT NULL UNIQUE, algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128), is_active TINYINT(1) DEFAULT '1', is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, pbxuser_id INT, perfil_id INT, informaralertas TINYINT(1), telefono TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX is_active_idx_idx (is_active), INDEX pbxuser_id_idx (pbxuser_id), INDEX perfil_id_idx (perfil_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_group (user_id BIGINT, group_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, group_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_permission (user_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, permission_id)) ENGINE = INNODB;
ALTER TABLE historico_alarmas ADD CONSTRAINT historico_alarmas_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id);
ALTER TABLE notificaciones ADD CONSTRAINT notificaciones_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id);
ALTER TABLE notificaciones ADD CONSTRAINT notificaciones_regla_id_regla_id FOREIGN KEY (regla_id) REFERENCES regla(id);
ALTER TABLE regla_perfil ADD CONSTRAINT regla_perfil_regla_id_regla_id FOREIGN KEY (regla_id) REFERENCES regla(id);
ALTER TABLE regla_perfil ADD CONSTRAINT regla_perfil_perfil_id_perfil_id FOREIGN KEY (perfil_id) REFERENCES perfil(id);
ALTER TABLE regla_prefijo ADD CONSTRAINT regla_prefijo_regla_id_regla_id FOREIGN KEY (regla_id) REFERENCES regla(id);
ALTER TABLE regla_prefijo ADD CONSTRAINT regla_prefijo_prefijo_id_prefijo_id FOREIGN KEY (prefijo_id) REFERENCES prefijo(id);
ALTER TABLE sf_guard_forgot_password ADD CONSTRAINT sf_guard_forgot_password_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_remember_key ADD CONSTRAINT sf_guard_remember_key_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user ADD CONSTRAINT sf_guard_user_perfil_id_perfil_id FOREIGN KEY (perfil_id) REFERENCES perfil(id);
ALTER TABLE sf_guard_user ADD CONSTRAINT sf_guard_user_pbxuser_id_usuario_pbx_id FOREIGN KEY (pbxuser_id) REFERENCES usuario_pbx(id);
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
