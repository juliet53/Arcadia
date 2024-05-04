CREATE DATABASE IF NOT EXISTS `arcadia2024` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `arcadia2024`;




--  table `alimentation_jour`


CREATE TABLE `alimentation_jour` (
  `id` int(11) NOT NULL,
  `nourrituredonne` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `quantite` varchar(255) NOT NULL,
  `animal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--  données de la table `alimentation_jour`


INSERT INTO `alimentation_jour` (`id`, `nourrituredonne`, `date`, `quantite`, `animal_id`, `user_id`) VALUES
(3, 'Fruits, Légumes', '2024-04-14', '4.8', 26, 1),
(4, 'Viande bovine', '2024-04-14', '5', 25, 1);




--  table `animal`


CREATE TABLE `animal` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `race` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `habitat_id` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `image_size` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- données de la table `animal`


INSERT INTO `animal` (`id`, `nom`, `race`, `image`, `habitat_id`, `description`, `image_name`, `image_size`, `updated_at`) VALUES
(12, 'Léa', 'Antilope', 'image antilope', 12, 'L\'antilope, avec sa grâce et sa rapidité, incarne l\'essence de la savane africaine. Dotée d\'une silhouette élégante et de cornes effilées, elle évoque la liberté et l\'agilité. Ses yeux vifs témoignent d\'une vigilance constante, essentielle pour échapper aux prédateurs qui rôdent dans les vastes plaines où elle évolue. Son pelage brun clair, parfois tacheté, lui offre un camouflage efficace dans son environnement naturel. L\'antilope, agile et gracieuse, est un symbole de la beauté sauvage de la nature africaine.', 'antelope-660eeaf18fb31496891417.jpg', 74277, '2024-04-04 20:01:21'),
(13, 'Charlie', 'guépard', 'image guépard', 12, 'Le guépard, majestueux félin des terres africaines, incarne la quintessence de la vitesse et de la grâce. Avec son corps élancé et ses taches caractéristiques, il se fond parfaitement dans les vastes étendues de savane où il chasse avec une précision redoutable. Ses longues pattes fines propulsent ce félin à des vitesses fulgurantes, faisant de lui l\'animal terrestre le plus rapide au monde. Son regard perçant témoigne de sa détermination et de son agilité, des qualités essentielles pour capturer ses proies. Le guépard, symbole de puissance et d\'élégance, règne en souverain sur les plaines dorées de l\'Afrique.', 'cheetahs-660eeb502be9b335926378.jpg', 128608, '2024-04-04 20:02:56'),
(14, 'Melmane', 'Girafe', 'image de girafe', 12, 'La girafe, avec son cou élancé et sa silhouette altière, est l\'icône des vastes étendues de la savane africaine. Gracieuse et imposante, elle se dresse parmi les acacias, atteignant des hauteurs vertigineuses pour se nourrir des feuilles les plus tendres. Son pelage tacheté et sa démarche élégante captivent les regards, tandis que ses grands yeux expriment une douce sagesse. La girafe, avec sa tranquillité empreinte de majesté, incarne la beauté et la quiétude des paysages sauvages africains.', 'giraffe-660eebbf49438927341005.jpg', 109655, '2024-04-04 20:04:47'),
(15, 'Luna', 'Hyène', 'image de hyène', 12, 'La hyène, avec son allure svelte et ses yeux perçants, évoque une aura de mystère et de puissance dans les plaines arides de la savane. Reconnaissable à son rire sinistre et à sa silhouette profilée, elle est à la fois redoutée et respectée. Dotée d\'une intelligence remarquable et d\'une agilité redoutable, la hyène occupe une place unique dans l\'écosystème africain. C\'est un prédateur opportuniste, capable de s\'adapter à une grande variété de proies et de conditions environnementales. Sa présence évoque le frisson de l\'inconnu et rappelle la complexité fascinante de la nature sauvage.', 'hyena-660eec21abe0c795056174.jpg', 94471, '2024-04-04 20:06:25'),
(16, 'Rocky', 'Rhinocéros', 'image de Rhinocéros', 12, 'Le rhinocéros, avec sa peau épaisse et ses impressionnantes cornes, incarne la force brute et la robustesse de la savane africaine. Ces géants paisibles se déplacent lentement à travers les vastes étendues herbeuses, semblant protéger leur territoire avec une détermination inébranlable. Malgré leur apparence imposante, les rhinocéros sont des herbivores doux, se nourrissant principalement de plantes et de feuillages. Leurs cornes, cependant, sont convoitées pour leur prétendue valeur médicinale, les plaçant au centre d\'un triste commerce illégal. Symboles de la lutte pour la préservation de la faune sauvage, les rhinocéros sont des gardiens emblématiques des vastes paysages africains.', 'rhinoceros-660eec942d57e451031352.jpg', 119835, '2024-04-04 20:08:20'),
(17, 'Charlie', 'Zèbre', 'image de zèbre', 12, 'Le zèbre, avec son pelage rayé noir et blanc distinctif, est l\'un des animaux les plus reconnaissables de la savane africaine. Il appartient à la famille des équidés, tout comme les chevaux et les ânes. Ces magnifiques créatures se déplacent en troupeaux dans les vastes plaines herbeuses, où ils se nourrissent principalement d\'herbes et de plantes. Les zèbres sont également connus pour leur comportement social complexe, utilisant leurs rayures uniques pour se camoufler et se reconnaître entre eux. Avec leur allure élégante et leur dynamisme dans la nature, les zèbres ajoutent une touche distinctive à la vie sauvage de la savane.', 'zebras-660eecf390e13578258804.jpg', 71088, '2024-04-04 20:09:55'),
(18, 'Oscar', 'hippopotame', 'hippo image', 13, 'L\'hippopotame est un grand mammifère semi-aquatique d\'Afrique. Avec son corps massif, sa peau gris foncé et son large museau, il passe la majeure partie de son temps dans l\'eau pour se protéger du soleil et se nourrit la nuit d\'herbe et de plantes aquatiques. Bien qu\'ils aient l\'air paisible, les hippopotames peuvent être agressifs pour défendre leur territoire ou leurs petits.', 'hippo-66100b42c757b893293847.jpg', 77301, '2024-04-05 16:31:30'),
(19, 'Rosa', 'Flamant rose', 'image flamand rose', 13, 'Le flamant rose est un bel oiseau connu pour sa couleur rose vif caractéristique. Avec son long cou, son bec recourbé et ses pattes fines, il vit souvent en colonies dans les zones humides où il se nourrit de petits crustacés et d\'algues. Son plumage rose est dû à sa consommation de caroténoïdes présents dans les crevettes et les crustacés. Ils sont connus pour leurs parades nuptiales élaborées et leurs nids en forme de monticules construits dans les eaux peu profondes', 'flamant-rose-66100be3f2252669688887.jpg', 100721, '2024-04-05 16:34:00'),
(20, 'Buddy', 'Crocodile', 'Crocodile image', 13, 'Le crocodile est un reptile semi-aquatique redoutable. Avec sa peau rugueuse et ses mâchoires puissantes garnies de dents acérées, il règne en maître des eaux douces et salées. Son allure préhistorique et sa capacité à rester immobile pendant de longues périodes en font un redoutable prédateur. Il chasse en embuscade, attendant patiemment sa proie avant de fondre sur elle avec une vitesse surprenante. Les crocodiles sont des animaux fascinants, à la fois craints et respectés dans leur habitat naturel.', 'crocodile-66100c5e14c43594613195.jpg', 55836, '2024-04-05 16:36:14'),
(21, 'Sophie', 'Loutre', 'image Loutre', 13, 'La loutre est un mammifère aquatique joueur et agile. Avec son corps fuselé et ses pattes palmées, elle évolue avec aisance dans les rivières et les étangs. Sa fourrure dense et imperméable la protège du froid lorsqu\'elle plonge à la recherche de poissons et d\'autres proies aquatiques. Dotée d\'un sens aigu de l\'odorat et de la vue, elle explore habilement son environnement à la recherche de nourriture. La loutre est également connue pour son comportement ludique, effectuant des acrobaties dans l\'eau et jouant avec ses congénères. Elle occupe une place importante dans les écosystèmes aquatiques, contribuant à maintenir l\'équilibre des populations de poissons et d\'invertébrés.', 'loutre-caroussel-66100d3764de9175137203.jpg', 169488, '2024-04-05 16:39:51'),
(22, 'Milo', 'Python', 'Python image', 13, 'Le python est un serpent non venimeux connu pour sa grande taille, sa puissance et son allure impressionnante. Son corps musclé est recouvert d\'écailles brillantes, généralement dans des tons de brun ou de beige, avec des motifs distinctifs tels que des taches ou des bandes sombres. Bien qu\'il puisse atteindre des dimensions impressionnantes, le python se déplace avec une grâce étonnante, utilisant ses muscles puissants pour se déplacer silencieusement à travers les environnements forestiers et tropicaux où il vit. Son régime alimentaire est varié, allant des petits mammifères aux oiseaux et même à d\'autres reptiles. Malgré sa réputation intimidante, le python joue un rôle important dans l\'équilibre écologique de son habitat en régulant les populations de proies et en contribuant à la biodiversité.', 'python-66100d93d622f750668314.jpg', 287642, '2024-04-05 16:41:23'),
(23, 'Zoe', 'Tortue', 'Tortue image', 13, 'La tortue des marais est une créature fascinante, bien adaptée à son environnement aquatique et terrestre. Reconnaissable par sa carapace plate et allongée, elle arbore généralement des tons de brun, de vert et de jaune, qui lui permettent de se fondre parfaitement dans son habitat. Ces tortues passent une grande partie de leur temps dans l\'eau, se déplaçant avec grâce et agilité grâce à leurs membres palmés. Elles sont également capables de s\'aventurer sur la terre ferme, où elles peuvent se réfugier sous les feuilles ou la boue pour se protéger du soleil ou des prédateurs. La tortue des marais est principalement herbivore, se nourrissant de plantes aquatiques, d\'insectes et parfois de petits poissons. Avec leur rythme de vie paisible et leur contribution à l\'équilibre des écosystèmes aquatiques, ces tortues sont des habitants précieux des marais et des zones humides', 'tortue-66100dfc77c60709188577.jpg', 96834, '2024-04-05 16:43:08'),
(24, 'Tigrou', 'Tigre', 'tigre  image', 14, 'Le tigre est le plus grand félin du monde, vivant principalement dans les jungles d\'Asie. Reconnaissable à ses rayures caractéristiques, il est un prédateur redoutable, chassant principalement la nuit. Malheureusement, le tigre est une espèce menacée en raison de la destruction de son habitat et du braconnage.', 'photo-tigre-66100f0befb0c157597946.jpg', 513164, '2024-04-05 16:47:39'),
(25, 'Lune', 'Panthère', 'Panthère image', 14, 'Également connue sous le nom de léopard noir, la panthère noire est une variante sombre du léopard, caractérisée par sa robe entièrement noire. Agile et furtive, elle est un redoutable chasseur qui se fond parfaitement dans l\'obscurité de la jungle.', 'panther-640-66100f9ea71ef936476501.webp', 24578, '2024-04-05 16:50:06'),
(26, 'Kong', 'Gorille', 'Gorille image', 14, 'Le gorille est l\'un des plus grands primates de la jungle, vivant en groupes familiaux dirigés par un mâle dominant. Omnivore, il se nourrit principalement de fruits, de feuilles et parfois de petits insectes. Le gorille est menacé par la perte de son habitat et le braconnage pour le commerce de la viande de brousse.', 'gorilla-66101058982c1791481299.jpg', 46511, '2024-04-05 16:53:12'),
(27, 'John', 'Boa', 'Boa image', 14, 'Le serpent boa est l\'un des plus grands serpents de la jungle, se nourrissant principalement de petits mammifères et d\'oiseaux. Sa capacité à se camoufler et à se faufiler discrètement lui permet de capturer ses proies avec une efficacité redoutable.', 'jamaican-boa-66101412b072f092959281.jpg', 55760, '2024-04-05 17:09:06');




--  la table `avis`


CREATE TABLE `avis` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `commentaire` longtext NOT NULL,
  `valide` tinyint(1) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `animal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--  données de la table `avis`


INSERT INTO `avis` (`id`, `nom`, `commentaire`, `valide`, `user_id`, `animal_id`) VALUES
(5, 'John', ';', 1, NULL, 26),
(6, 'John', 'trop beau', 1, NULL, 19),
(7, 'John', 'gsj', 1, NULL, 26),
(8, 'Paul33', 'John est un magnifique boa', 1, NULL, 27),
(9, 'John', 'trop beau', 1, NULL, 26),
(10, 'John', 'Magnifique', 0, NULL, 25),
(11, 'John', 'Magnifique couleur', 0, NULL, 22),
(12, 'John', 'Super', 0, NULL, 22),
(13, 'John', 'Super', 0, NULL, 20),
(14, 'John', 'super', 0, NULL, 20);




--  la table `habitat`


CREATE TABLE `habitat` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `image_size` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--  données de la table `habitat`


INSERT INTO `habitat` (`id`, `nom`, `image`, `description`, `image_name`, `image_size`, `updated_at`) VALUES
(12, 'L\'incroyable habitat de la savane au cœur de notre zoo', 'savane.jpg', 'Plongez au cœur des vastes plaines africaines et découvrez la magie de ce paysage emblématique où la nature règne en maître.\r\n\r\nDans notre habitat savane, vous serez transporté dans un monde où les horizons s\'étendent à perte de vue, ponctués par les silhouettes majestueuses des acacias et des baobabs. L\'air vibre de l\'énergie palpitante de la vie sauvage, où les lions règnent en rois incontestés et les éléphants parcourent paisiblement les étendues herbeuses.', 'photo-savane-660c58333fb3f269374641.jpg', 91774, '2024-04-02 21:10:00'),
(13, 'L\'habitat fascinant des marais', 'marais.webp', 'Plongez dans un écosystème unique où la vie foisonne et où chaque recoin cache une multitude de merveilles.\r\nDans notre habitat marais, vous serez transporté dans un monde d\'une biodiversité étonnante, où l\'eau joue un rôle central dans la vie de toutes les créatures qui y habitent. Marchez le long des sentiers bordés de roseaux et découvrez la beauté tranquille des étendues d\'eau miroitantes, où les nénuphars flottent paisiblement à la surface.\r\nExplorez les berges marécageuses et observez les habitants de ce milieu exceptionnel.', 'marais-660c5973cc734820166962.webp', 38390, '2024-04-02 21:16:03'),
(14, 'L\'habitat exotique de la jungle', 'jungle.jpg', 'Explorez les sentiers sinueux qui serpentent à travers la jungle dense, à la découverte d\'une faune et d\'une flore d\'une incroyable diversité. Attendez-vous à croiser le chemin de singes facétieux bondissant de branche en branche, de toucans aux couleurs vives perchés sur les hauts arbres et de serpents mystérieux se faufilant dans les sous-bois.\r\nNe manquez pas de lever les yeux pour contempler les majestueux rapaces survolant la canopée et les papillons aux ailes chatoyantes voltigeant parmi les fleurs tropicales. Écoutez les appels des oiseaux exotiques et les bruits mystérieux de la jungle, tandis que les cascades lointaines ajoutent une symphonie naturelle à cette expérience sensorielle unique.', 'jungle-660c5aba602e5745086410.jpg', 100391, '2024-04-02 21:21:30');




--  table `habitat_animal`


CREATE TABLE `habitat_animal` (
  `habitat_id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;






-- la table `rapport_animal`


CREATE TABLE `rapport_animal` (
  `id` int(11) NOT NULL,
  `etat` longtext NOT NULL,
  `nourriturepropose` varchar(255) NOT NULL,
  `grammage_nourriture` varchar(255) NOT NULL,
  `date_passage` date NOT NULL,
  `detail_etat_animal` longtext DEFAULT NULL,
  `animal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--  données de la table `rapport_animal`


INSERT INTO `rapport_animal` (`id`, `etat`, `nourriturepropose`, `grammage_nourriture`, `date_passage`, `detail_etat_animal`, `animal_id`, `user_id`) VALUES
(3, 'Kong est en super forme!', '-Fruits , légumes', '4', '2024-04-14', NULL, 26, 1),
(4, 'Lune est en super forme', 'Viande Rouge', '4/5', '2024-04-14', NULL, 25, 1),
(5, 'Lune va très bien et va féter son 5eme anniversaire', 'Viande Rouge', '4/5', '2024-04-14', NULL, 25, 1);




-- la table `rapport_habitat`


CREATE TABLE `rapport_habitat` (
  `id` int(11) NOT NULL,
  `etat` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `habitat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--  données de la table `rapport_habitat`


INSERT INTO `rapport_habitat` (`id`, `etat`, `date`, `habitat_id`, `user_id`) VALUES
(5, 'bdkzdb', '2024-03-31', 12, 1),
(6, 'ad', '2024-03-31', 12, 3),
(7, 'L\'habitat est super', '2024-04-15', 14, 1);




--  la table `service`


CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `photo` varchar(255) NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `image_size` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- données de la table `service`


INSERT INTO `service` (`id`, `nom`, `description`, `photo`, `image_name`, `image_size`, `updated_at`) VALUES
(3, 'Restaurant', 'Notre restaurant propose une expérience culinaire unique, où vous pourrez déguster une délicieuse cuisine tout en profitant d\'une vue imprenable sur nos espaces verts et nos habitats animaliers. Que vous soyez en famille, entre amis ou en couple, notre équipe chaleureuse et accueillante vous réserve un service de qualité dans un cadre naturel et apaisant.\r\nDécouvrez notre menu varié, mettant en valeur des plats savoureux inspirés de la cuisine locale et internationale. Des options végétariennes et végétaliennes sont également disponibles pour satisfaire tous les palais.', 'Photo Restaurant', 'restaurant-660c50bac1d0a635617034.jpg', 633697, '2024-04-02 20:38:50'),
(4, 'Explorez les Habitats Naturels au Cœur du Zoo !', 'Plongez dans les habitats naturels de nos animaux et découvrez un monde fascinant de biodiversité au sein du Zoo. Notre service de visite des habitats vous invite à voyager à travers différents écosystèmes, offrant une expérience immersive et éducative pour toute la famille.\r\nAccompagnés de nos guides expérimentés, vous parcourrez des sentiers sinueux à travers des paysages authentiques, allant des forêts tropicales luxuriantes aux vastes savanes africaines. Observez nos résidents à fourrure, à plumes et à écailles évoluer dans des environnements soigneusement recréés pour reproduire leur habitat naturel.', 'visite habitat', 'visite-habitat-660c52150b44d776211787.jpg', 271899, '2024-04-02 20:44:37'),
(5, 'Découvrez le Zoo d\'une Nouvelle Perspective : à Bord de Notre Petit Train !', 'Embarquez à bord de notre petit train pour une aventure unique à travers les merveilles du zoo ! Idéal pour les petits explorateurs et les familles en quête d\'une expérience ludique, notre service de visite en petit train offre une manière confortable et divertissante de découvrir tous les recoins de notre vaste parc animalier.\r\nInstallez-vous confortablement dans nos wagons pittoresques et laissez-vous transporter à travers des paysages enchanteurs, des habitats exotiques aux vastes plaines verdoyantes. En chemin, vous aurez l\'occasion de rencontrer nos résidents les plus emblématiques, des majestueux lions aux adorables pandas, le tout sous l\'œil attentif de nos guides expérimentés.', 'petit train', '2-petit-train-1180x786-660c52ede3dad903951772.jpg', 226484, '2024-04-02 20:48:13');




--  la table `user`


CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--  données de la table `user`


INSERT INTO `user` (`id`, `email`, `roles`, `password`) VALUES
(1, 'admin1@test.com', '[\"ROLE_ADMIN\"]', '$2y$13$0IUIFMS8G4ZsFHYPiUnzF.L6l1dmV/1PmP4raL6iTpG7XbpqN6m/q'),
(2, 'employer@test.com', '[\"ROLE_EMPLOYER\"]', '$2y$13$oI94XiZe4JraAA1.vXj8WOup459pNUoUkarCalOy0Do4fT0gBohyW'),
(3, 'veterinaire@test.com', '[\"ROLE_VETERINAIRE\"]', '$2y$13$PKXx22al7S7hsyQk948ASuQf/hiroXFKOOPmPw8wtW3anuqP9yrky');



--
-- Index pour la table `alimentation_jour`
--
ALTER TABLE `alimentation_jour`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_623E23898E962C16` (`animal_id`),
  ADD KEY `IDX_623E2389A76ED395` (`user_id`);

--
-- Index pour la table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6AAB231FAFFE2D26` (`habitat_id`);

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8F91ABF0A76ED395` (`user_id`),
  ADD KEY `IDX_8F91ABF08E962C16` (`animal_id`);

--
-- Index pour la table `habitat`
--
ALTER TABLE `habitat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `habitat_animal`
--
ALTER TABLE `habitat_animal`
  ADD PRIMARY KEY (`habitat_id`,`animal_id`),
  ADD KEY `IDX_C0FE85A4AFFE2D26` (`habitat_id`),
  ADD KEY `IDX_C0FE85A48E962C16` (`animal_id`);



--
-- Index pour la table `rapport_animal`
--
ALTER TABLE `rapport_animal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_BE0EED58E962C16` (`animal_id`),
  ADD KEY `IDX_BE0EED5A76ED395` (`user_id`);

--
-- Index pour la table `rapport_habitat`
--
ALTER TABLE `rapport_habitat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_40E7D28BAFFE2D26` (`habitat_id`),
  ADD KEY `IDX_40E7D28BA76ED395` (`user_id`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `alimentation_jour`
--
ALTER TABLE `alimentation_jour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `animal`
--
ALTER TABLE `animal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `habitat`
--
ALTER TABLE `habitat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `rapport_animal`
--
ALTER TABLE `rapport_animal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `rapport_habitat`
--
ALTER TABLE `rapport_habitat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `alimentation_jour`
--
ALTER TABLE `alimentation_jour`
  ADD CONSTRAINT `FK_623E23898E962C16` FOREIGN KEY (`animal_id`) REFERENCES `animal` (`id`),
  ADD CONSTRAINT `FK_623E2389A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `FK_6AAB231FAFFE2D26` FOREIGN KEY (`habitat_id`) REFERENCES `habitat` (`id`);

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `FK_8F91ABF08E962C16` FOREIGN KEY (`animal_id`) REFERENCES `animal` (`id`),
  ADD CONSTRAINT `FK_8F91ABF0A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `habitat_animal`
--
ALTER TABLE `habitat_animal`
  ADD CONSTRAINT `FK_C0FE85A48E962C16` FOREIGN KEY (`animal_id`) REFERENCES `animal` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_C0FE85A4AFFE2D26` FOREIGN KEY (`habitat_id`) REFERENCES `habitat` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `rapport_animal`
--
ALTER TABLE `rapport_animal`
  ADD CONSTRAINT `FK_BE0EED58E962C16` FOREIGN KEY (`animal_id`) REFERENCES `animal` (`id`),
  ADD CONSTRAINT `FK_BE0EED5A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `rapport_habitat`
--
ALTER TABLE `rapport_habitat`
  ADD CONSTRAINT `FK_40E7D28BA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_40E7D28BAFFE2D26` FOREIGN KEY (`habitat_id`) REFERENCES `habitat` (`id`);
COMMIT;