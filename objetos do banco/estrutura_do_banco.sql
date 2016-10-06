

CREATE TABLE laptops (
  id int(10) UNSIGNED NOT NULL,
  name varchar(40) NOT NULL,
  brand varchar(40) NOT NULL,
  model varchar(40) NOT NULL,
  patrimony varchar(40) NOT NULL,
  dtaacquisition date NOT NULL,
  status varchar(1) NOT NULL DEFAULT 'A',
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

INSERT INTO laptops (id, name, brand, model, patrimony, dtaacquisition, status, created_at, updated_at) VALUES
(1, 'Nenhum', ' ', ' ', ' ', '2016-09-07', 'A', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `microphones`
--

CREATE TABLE microphones (
  id int(10) UNSIGNED NOT NULL,
  name varchar(40) NOT NULL,
  brand varchar(40) NOT NULL,
  model varchar(40) NOT NULL,
  patrimony varchar(40) NOT NULL,
  dtaacquisition date NOT NULL,
  status varchar(1) NOT NULL DEFAULT 'A',
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

--
-- Extraindo dados da tabela `microphones`
--

INSERT INTO microphones (id, name, brand, model, patrimony, dtaacquisition, status, created_at, updated_at) VALUES
(1, 'Nenhum', ' ', ' ', ' ', '2016-09-07', 'A', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_09_26_222537_create_romms_table', 1),
('2016_09_26_222619_create_laptops_table', 1),
('2016_09_26_222644_create_projectors_table', 1),
('2016_09_26_222707_create_sounds_table', 1),
('2016_09_26_222747_create_microphones_table', 1),
('2016_09_27_234644_create_reserves_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE password_resets (
  email varchar(255)  NOT NULL,
  token varchar(255)  NOT NULL,
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `projectors`
--

CREATE TABLE projectors (
  id int(10) UNSIGNED NOT NULL,
  name varchar(40) NOT NULL,
  brand varchar(40) NOT NULL,
  model varchar(40) NOT NULL,
  patrimony varchar(40) NOT NULL,
  dtaacquisition date NOT NULL,
  status varchar(1) NOT NULL DEFAULT 'A',
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

--
-- Extraindo dados da tabela projectors
--

INSERT INTO projectors (id, name, brand, model, patrimony, dtaacquisition, status, created_at, updated_at) VALUES
(1, 'Nenhum', ' ', ' ', ' ', '2016-09-07', 'A', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserves`
--

CREATE TABLE reserves (
  id int(10) UNSIGNED NOT NULL,
  id_user int(10) DEFAULT NULL,
  id_romm int(10) DEFAULT NULL,
  id_mic int(10) DEFAULT NULL,
  id_proj int(10) DEFAULT NULL,
  id_not int(10) DEFAULT NULL,
  id_sound int(10) DEFAULT NULL,
  date date NOT NULL,
  hbegin time NOT NULL,
  hend time NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);



-- --------------------------------------------------------

--
-- Estrutura da tabela `romms`
--

CREATE TABLE romms (
  id int(10) UNSIGNED NOT NULL,
  name varchar(40) NOT NULL,
  status varchar(1) NOT NULL DEFAULT 'A',
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

--
-- Extraindo dados da tabela `romms`
--

INSERT INTO romms (id, name, status, created_at, updated_at) VALUES
(1, 'Nenhuma', 'A', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sounds`
--

CREATE TABLE sounds (
  id int(10) UNSIGNED NOT NULL,
  name varchar(40) NOT NULL,
  brand varchar(40) NOT NULL,
  model varchar(40) NOT NULL,
  patrimony varchar(40) NOT NULL,
  dtaacquisition date NOT NULL,
  status varchar(1) NOT NULL DEFAULT 'A',
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

--
-- Extraindo dados da tabela `sounds`
--

INSERT INTO sounds (id, name, brand, model, patrimony, dtaacquisition, status, created_at, updated_at) VALUES
(1, 'Nenhum', ' ', ' ', ' ', '2016-09-07', 'A', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE users (
  id int(10) UNSIGNED NOT NULL,
  name varchar(60) NOT NULL,
  cpf varchar(12) NOT NULL,
  office int(11) NOT NULL,
  email varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  remember_token varchar(100) DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

--
-- Extraindo dados da tabela `users`
--

INSERT INTO users (id, name, cpf, office, email, password, remember_token, created_at, updated_at) VALUES
(1, 'Felipe Novaes Medeiros', '34101023883', 1, 'felipenovaesmedeiros@gmail.com', '$2y$10$v85Ve/P4S4hDAfdwJQ79weOYodX5gRHg/Acs3dmm3n7LqLUbYiuua', 'FaDgIMwUegdCfSh3HH336AqfgYAx5qk432AUBGkPbzT4RC4eU6bw7o0GyYYR', '2016-09-28 03:25:23', '2016-09-30 16:58:58');


-- --------------------------------------------------------

--
-- Structure for view `v_reservas`
--
CREATE or replace VIEW v_reservas AS
SELECT
  b.id as id_usuario,
  b.name AS usuario,
  c.id as id_sala,
  c.name AS sala,
  d.id as id_projetor,
  d.name AS projetor,
  e.id as id_notebook,
  e.name AS notebook,
  f.id as id_som,
  f.name AS som,
  g.id as id_microfone,
  g.name AS microfone,
  a.date AS data,
  a.hbegin AS inicio,
  a.hend AS fim
FROM
reserves a,
users b,    
romms c,    
projectors d,
laptops e,
sounds f,
microphones g
  
WHERE a.id_user = b.id
AND a.id_romm = c.id 
AND a.id_proj = d.id 
AND a.id_not = e.id 
AND a.id_sound = f.id 
AND a.id_mic = g.id;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `laptops`
--
ALTER TABLE `laptops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `microphones`
--
ALTER TABLE `microphones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `projectors`
--
ALTER TABLE `projectors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserves`
--
ALTER TABLE `reserves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `romms`
--
ALTER TABLE `romms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sounds`
--
ALTER TABLE `sounds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_cpf_unique` (`cpf`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laptops`
--
ALTER TABLE `laptops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `microphones`
--
ALTER TABLE `microphones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `projectors`
--
ALTER TABLE `projectors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `reserves`
--
ALTER TABLE `reserves`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `romms`
--
ALTER TABLE `romms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sounds`
--
ALTER TABLE `sounds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

-- criar a procedure para reservar uma sala varios dias

DELIMITER $$

CREATE PROCEDURE reservar_salas(  dia_inicio    DATE,
                                  dia_fim         DATE,
                                  dia_semana      integer,
                                  h_inicio        time,
                                  h_fim           time,
                                  id_laboratorio  integer,
                                  id_user         integer)
DECLARE @vdData data;

BEGIN
  set @vdData = dia_inicio;
    
    WHILE (@vdData <= @ia_fim) DO
      /* codigo do while aqui */
      if (DATE_FORMAT(@vdData,'%w') = dia_semana) then
          insert into reserves (id_user, id_romm, date, hbegin, hend)
            values (id_user, id_laboratorio, @vdData, h_inicio, h_fim);
      end if;


      SET @vdData = date_add(@vdData, interval 1 day);
    END WHILE;
END $$
DELIMITER ;

-- fim criação da procedure  


CREATE DEFINER=`root`@`localhost` PROCEDURE reservar_salas(  dia_inicio    DATE,
                                            dia_fim         DATE,
                                            dia_semana      integer,
                                            h_inicio        time,
                                            h_fim           time,
                                            id_laboratorio  integer,
                                            id_user         integer)
BEGIN
          #DECLARE vdData DATE;
          
            #set vdData = dia_inicio;
    
            WHILE (dia_inicio <= dia_fim) DO
              /* codigo do while aqui */
              if(DATE_FORMAT(dia_inicio,'%w')=dia_semana)then
                  insert into reserves (id_user, id_romm, date, hbegin, hend)
                    values (id_user, id_laboratorio, dia_inicio, h_inicio, h_fim);
              end if;


              SET dia_inicio = date_add(dia_inicio, interval 1 day);
            END WHILE;
                
       END
