<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240322145958 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animal ADD habitat_id INT NOT NULL');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231FAFFE2D26 FOREIGN KEY (habitat_id) REFERENCES habitat (id)');
        $this->addSql('CREATE INDEX IDX_6AAB231FAFFE2D26 ON animal (habitat_id)');
        $this->addSql('ALTER TABLE avis ADD user_id INT NOT NULL, ADD animal_id INT NOT NULL');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF08E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id)');
        $this->addSql('CREATE INDEX IDX_8F91ABF0A76ED395 ON avis (user_id)');
        $this->addSql('CREATE INDEX IDX_8F91ABF08E962C16 ON avis (animal_id)');
        $this->addSql('ALTER TABLE rapport_animal ADD animal_id INT NOT NULL, ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE rapport_animal ADD CONSTRAINT FK_BE0EED58E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id)');
        $this->addSql('ALTER TABLE rapport_animal ADD CONSTRAINT FK_BE0EED5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_BE0EED58E962C16 ON rapport_animal (animal_id)');
        $this->addSql('CREATE INDEX IDX_BE0EED5A76ED395 ON rapport_animal (user_id)');
        $this->addSql('ALTER TABLE rapport_habitat ADD habitat_id INT NOT NULL, ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE rapport_habitat ADD CONSTRAINT FK_40E7D28BAFFE2D26 FOREIGN KEY (habitat_id) REFERENCES habitat (id)');
        $this->addSql('ALTER TABLE rapport_habitat ADD CONSTRAINT FK_40E7D28BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_40E7D28BAFFE2D26 ON rapport_habitat (habitat_id)');
        $this->addSql('CREATE INDEX IDX_40E7D28BA76ED395 ON rapport_habitat (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231FAFFE2D26');
        $this->addSql('DROP INDEX IDX_6AAB231FAFFE2D26 ON animal');
        $this->addSql('ALTER TABLE animal DROP habitat_id');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF0A76ED395');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF08E962C16');
        $this->addSql('DROP INDEX IDX_8F91ABF0A76ED395 ON avis');
        $this->addSql('DROP INDEX IDX_8F91ABF08E962C16 ON avis');
        $this->addSql('ALTER TABLE avis DROP user_id, DROP animal_id');
        $this->addSql('ALTER TABLE rapport_animal DROP FOREIGN KEY FK_BE0EED58E962C16');
        $this->addSql('ALTER TABLE rapport_animal DROP FOREIGN KEY FK_BE0EED5A76ED395');
        $this->addSql('DROP INDEX IDX_BE0EED58E962C16 ON rapport_animal');
        $this->addSql('DROP INDEX IDX_BE0EED5A76ED395 ON rapport_animal');
        $this->addSql('ALTER TABLE rapport_animal DROP animal_id, DROP user_id');
        $this->addSql('ALTER TABLE rapport_habitat DROP FOREIGN KEY FK_40E7D28BAFFE2D26');
        $this->addSql('ALTER TABLE rapport_habitat DROP FOREIGN KEY FK_40E7D28BA76ED395');
        $this->addSql('DROP INDEX IDX_40E7D28BAFFE2D26 ON rapport_habitat');
        $this->addSql('DROP INDEX IDX_40E7D28BA76ED395 ON rapport_habitat');
        $this->addSql('ALTER TABLE rapport_habitat DROP habitat_id, DROP user_id');
    }
}
